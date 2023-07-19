<?php

/**
 * Register asset
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    $args = array(
        'default-color' => '000000',
    );

    add_theme_support('contact-form-7');
    add_theme_support('custom-background', $args);
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_register_script('taillwind', 'https://cdn.tailwindcss.com');
    wp_enqueue_script('taillwind');
});

/**
 * Get js uri
 */
function js_uri()
{
    return get_theme_file_uri('/assets/js/');
}

/**
 * Get img uri
 */
function img_uri()
{
    return get_theme_file_uri('/assets/images/');
}

function esgi_custom_router()
{
    add_rewrite_rule('^custom-route/([^/]+)/?', 'home.php?custom_param=$matches[1]', 'top');
}
add_action('init', 'esgi_custom_router');

function esgi_query_vars($vars)
{
    $vars[] = 'custom_param';
    return $vars;
}
add_filter('query_vars', 'esgi_query_vars');

function esgi_handle_custom_route()
{
    $custom_param = get_query_var('custom_param');

    if ($custom_param) {
        wp_redirect(home_url('template/' . $custom_param . ' /?custom_param=' . $custom_param));
    }
}
add_action('template_redirect', 'esgi_handle_custom_route');

function get_all_pages()
{
    $pages = get_pages();
    $page_list = array();

    foreach ($pages as $page) {
        $page_list[] = array(
            'id'    => $page->ID,
            'title' => $page->post_title,
            'link'  => get_permalink($page->ID),
        );
    }
    return $page_list;
}

function page_uri(string $page)
{
    $pages = get_all_pages();
    echo $pages[0]['link'] . '&action=' . $page;
}

//section SOCIAL NETWORK

add_action('customize_register', 'esgi_social_network_customize_register');
function esgi_social_network_customize_register($wp_customize)
{
    // section facebook
    $wp_customize->add_section('esgi_social_network_facebook', array(
        'title'    => __('Facebook', 'esgi'),
        'priority' => 100,
    ));

    $wp_customize->add_setting('esgi_social_network_facebook_url', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('esgi_social_network_facebook_url', array(
        'type'        => 'text',
        'label'       => __('URL de la page Facebook', 'esgi'),
        'description' => __('Saisissez l\'URL de la page Facebook à afficher dans le thème.', 'esgi'),
        'section'     => 'esgi_social_network_facebook',
    ));

    //section linkedin
    $wp_customize->add_section('esgi_social_network_linkedin', array(
        'title'    => __('Linkedin', 'esgi'),
        'priority' => 100,
    ));

    $wp_customize->add_setting('esgi_social_network_linkedin_url', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('esgi_social_network_linkedin_url', array(
        'type'        => 'text',
        'label'       => __('URL de la page Linkedin', 'esgi'),
        'description' => __('Saisissez l\'URL de la page Linkedin à afficher dans le thème.', 'esgi'),
        'section'     => 'esgi_social_network_linkedin',
    ));
}

function esgi_get_social_networks()
{
    $social_networks = array();

    $social_networks['facebook'] = array(
        'url'  => get_theme_mod('esgi_social_network_facebook_url'),
        'icon' => 'fab fa-facebook',
    );

    $social_networks['linkedin'] = array(
        'url'  => get_theme_mod('esgi_social_network_linkedin_url'),
        'icon' => 'fab fa-linkedin',
    );

    return $social_networks;
}


// section CONTACT
add_action('customize_register', 'esgi_contact_customize_register');
function esgi_contact_customize_register($wp_customize)
{
    $wp_customize->add_section('esgi_contact_contact_form', array(
        'title'    => __('Formulaire de contact', 'esgi'),
        'priority' => 100,
    ));

    $wp_customize->add_setting('esgi_contact_selected_contact_form', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('esgi_contact_selected_contact_form', array(
        'type'        => 'select',
        'label'       => __('Sélectionner un formulaire de contact', 'esgi'),
        'description' => __('Sélectionnez le formulaire de contact à afficher dans le thème.', 'esgi'),
        'section'     => 'esgi_contact_contact_form',
        'choices'     => esgi_contact_get_contact_form_choices(),
    ));
}

function esgi_contact_get_contact_form_choices()
{
    $contact_forms = get_posts(array(
        'post_type'      => 'wpcf7_contact_form',
        'posts_per_page' => 1,
    ));

    $choices = array();

    foreach ($contact_forms as $form) {
        $choices[$form->ID] = $form->post_title;
    }

    return $choices;
}

function form_contact()
{
    $contact_form_id = get_theme_mod('esgi_contact_selected_contact_form');
    if ($contact_form_id) {
        echo do_shortcode('[contact-form-7 id="' . $contact_form_id . '" title="Formulaire de contact"]');
    }
}

// section BLOG
function get_post_by_category($category, $page)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $page,
        'category_name' => $category,
    );

    $query = new WP_Query($args);
    $result = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $current_post = array(
                'title' => get_the_title(),
                'content' => get_the_excerpt(),
                'permalink' => get_the_permalink(),
            );
            array_push($result, $current_post);
        }
    } else {
        return 'Aucun article ne corespond à votre recherche.';
    }
    wp_reset_postdata();
    return $result;
}

function get_current_uri(): string
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";

    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];

    return $url;
}

// section PAGINATION
function enqueue_custom_scripts(){
    wp_enqueue_script('pagination-ajax', get_template_directory_uri() . '/assets/js/pagination-ajax.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
  

//section SERVICES
add_action('customize_register', 'esgi_services_customize_resgister');
function esgi_services_customize_resgister($wp_customize)
{
    //section location desk
    $wp_customize->add_section('esgi_services_location_desk', array(
        'title' => __('Location de bureau', 'esgi'),
        'description' => __('Personnaliser la localaisation du bureau', 'esgi'),
        'priority' => 160,
    ));
    // settings street and region
    $wp_customize->add_setting('esgi_services_location_desk_street', array(
        'default' => 'Rue de la paix',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_services_location_desk_region', array(
        'default' => 'Paris',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // control street and region
    $wp_customize->add_control('esgi_services_location_desk_street', array(
        'label' => __('Rue', 'esgi'),
        'section' => 'esgi_services_location_desk',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_services_location_desk_region', array(
        'label' => __('Région', 'esgi'),
        'section' => 'esgi_services_location_desk',
        'type' => 'text',
    ));

    //section mnager
    $wp_customize->add_section('esgi_services_manager', array(
        'title' => __('Manager', 'esgi'),
        'description' => __('Personnaliser les infos du manager', 'esgi'),
        'priority' => 160,
    ));
    // settings phone and email
    $wp_customize->add_setting('esgi_services_manager_phone', array(
        'default' => '+33 1 53 31 25 23',
        'description' => __('Saisisser le numéro de téléphone du manager', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_services_manager_email', array(
        'default' => 'info@company.com',
        'description' => __('Saissiser l\'email du manager', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // control phone and email
    $wp_customize->add_control('esgi_services_manager_phone', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_services_manager',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_services_manager_email', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_services_manager',
        'type' => 'text',
    ));

    //section CEO
    $wp_customize->add_section('esgi_services_ceo', array(
        'title' => __('CEO', 'esgi'),
        'description' => __('Personnaliser les infos du CEO', 'esgi'),
        'priority' => 160,
    ));
    // settings phone and email
    $wp_customize->add_setting('esgi_services_ceo_phone', array(
        'default' => '+33 1 53 31 25 23',
        'description' => __('Saisisser le numéro de téléphone du CEO', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_services_ceo_email', array(
        'default' => 'ceo@company.com',
        'description' => __('Saissiser l\'email du CEO', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // control phone and email
    $wp_customize->add_control('esgi_services_ceo_phone', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_services_ceo',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_services_ceo_email', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_services_ceo',
        'type' => 'text',
    ));
}

function esgi_get_services()
{
    $result = array();
    $result['location_desk'] = array(
        'street' => get_theme_mod('esgi_services_location_desk_street'),
        'region' => get_theme_mod('esgi_services_location_desk_region'),
    );
    $result['manager'] = array(
        'phone' => get_theme_mod('esgi_services_manager_phone'),
        'email' => get_theme_mod('esgi_services_manager_email'),
    );
    $result['ceo'] = array(
        'phone' => get_theme_mod('esgi_services_ceo_phone'),
        'email' => get_theme_mod('esgi_services_ceo_email'),
    );

    return $result;
}

// section team members
add_action('customize_register', 'esgi_team_members_customize_resgister');
function esgi_team_members_customize_resgister($wp_customize)
{
    // section team members
    $wp_customize->add_section('esgi_team_members', array(
        'title' => __('Membres de l\'équipe', 'esgi'),
        'description' => __('Personnaliser les membres de l\'équipe', 'esgi'),
        'priority' => 160,
    ));
    // add first member settings
    $wp_customize->add_setting('esgi_team_members_work_1', array(
        'default' => 'Web developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_phone_1', array(
        'default' => '+33 1 53 31 25 23',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_email_1', array(
        'default' => 'work@company.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_image_1', array(
        'default' => get_template_directory_uri() . '/assets/images/png/5.png',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // add second member settings
    $wp_customize->add_setting('esgi_team_members_work_2', array(
        'default' => 'Web developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_phone_2', array(
        'default' => '+33 1 53 31 25 23',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_email_2', array(
        'default' => 'work@company.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_image_2', array(
        'default' => get_template_directory_uri() . '/assets/images/png/6.png',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // add third member settings
    $wp_customize->add_setting('esgi_team_members_work_3', array(
        'default' => 'Web developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_phone_3', array(
        'default' => '+33 1 53 31 25 23',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_email_3', array(
        'default' => 'work@company.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_image_3', array(
        'default' => get_template_directory_uri() . '/assets/images/png/7.png',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // add fourth member settings
    $wp_customize->add_setting('esgi_team_members_work_4', array(
        'default' => 'Web developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_phone_4', array(
        'default' => '+33 1 53 31 25 23',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_email_4', array(
        'default' => 'work@company.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('esgi_team_members_image_4', array(
        'default' => get_template_directory_uri() . '/assets/images/png/8.png',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // control first member
    $wp_customize->add_control('esgi_team_members_work_1', array(
        'label' => __('Poste', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_phone_1', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_email_1', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_team_members_image_1', array(
        'label' => __('Image', 'esgi'),
        'section' => 'esgi_team_members',
        'settings' => 'esgi_team_members_image_1',
    )));
    // control second member
    $wp_customize->add_control('esgi_team_members_work_2', array(
        'label' => __('Poste', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_phone_2', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_email_2', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_team_members_image_2', array(
        'label' => __('Image', 'esgi'),
        'section' => 'esgi_team_members',
        'settings' => 'esgi_team_members_image_2',
    )));
    // control third member
    $wp_customize->add_control('esgi_team_members_work_3', array(
        'label' => __('Poste', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_phone_3', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_email_3', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_team_members_image_3', array(
        'label' => __('Image', 'esgi'),
        'section' => 'esgi_team_members',
        'settings' => 'esgi_team_members_image_3',
    )));
    // control fourth member
    $wp_customize->add_control('esgi_team_members_work_4', array(
        'label' => __('Poste', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_phone_4', array(
        'label' => __('Téléphone', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control('esgi_team_members_email_4', array(
        'label' => __('Email', 'esgi'),
        'section' => 'esgi_team_members',
        'type' => 'text',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_team_members_image_4', array(
        'label' => __('Image', 'esgi'),
        'section' => 'esgi_team_members',
        'settings' => 'esgi_team_members_image_4',
    )));
}

function esgi_get_team_members()
{
    $team_members = array();
    for ($i = 1; $i <= 4; $i++) {
        if (get_theme_mod('esgi_team_members_work_' . $i) != '') {
            $team_members[$i - 1]['work'] = get_theme_mod('esgi_team_members_work_' . $i);
        } else {
            $team_members[$i - 1]['work'] = 'work';
        }
        if (get_theme_mod('esgi_team_members_phone_' . $i) != '') {
            $team_members[$i - 1]['phone'] = get_theme_mod('esgi_team_members_phone_' . $i);
        } else {
            $team_members[$i - 1]['phone'] = '+33 6 12 34 56 78';
        }
        if (get_theme_mod('esgi_team_members_email_' . $i) != '') {
            $team_members[$i - 1]['email'] = get_theme_mod('esgi_team_members_email_' . $i);
        } else {
            $team_members[$i - 1]['email'] = 'work@company.com';
        }
        if (get_theme_mod('esgi_team_members_image_' . $i) != '') {
            $team_members[$i - 1]['image'] = get_theme_mod('esgi_team_members_image_' . $i);
        } else {
            $team_members[$i - 1]['image'] = get_template_directory_uri() . '/assets/images/png/5.png';
        }
    }
    return $team_members;
}

// section site logo
add_action('customize_register', 'esgi_customize_register_site_logo');
function esgi_customize_register_site_logo($wp_customize)
{
    // section logo
    $wp_customize->add_section('esgi_site_logo', array(
        'title' => __('Logo du site', 'esgi'),
        'description' => __('Personnaliser le logo du site', 'esgi'),
        'priority' => 1,
    ));
    // setting dark
    $wp_customize->add_setting('esgi_site_logo', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/logo.svg',
        'description' => __('Logo du site', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting white
    $wp_customize->add_setting('esgi_site_logo_white', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/logo-white.svg',
        'description' => __('Logo du site blanc', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_site_logo', array(
        'label' => __('Logo', 'esgi'),
        'section' => 'esgi_site_logo',
        'settings' => 'esgi_site_logo',
    )));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_site_logo_white', array(
        'label' => __('Logo blanc', 'esgi'),
        'section' => 'esgi_site_logo',
        'settings' => 'esgi_site_logo_white',
    )));
}

function esgi_get_site_logo()
{

    $site_logo = array();
    if (get_theme_mod('esgi_site_logo')) {
        $site_logo['logo'] = get_theme_mod('esgi_site_logo');
    } else {
        $site_logo['logo'] = get_template_directory_uri() . '/assets/images/svg/logo.svg';
    }
    if (get_theme_mod('esgi_site_logo_white')) {
        $site_logo['logo_white'] = get_theme_mod('esgi_site_logo_white');
    } else {
        $site_logo['logo_white'] = get_template_directory_uri() . '/assets/images/svg/logo-white.svg';
    }
    return $site_logo;
}

// section partners
add_action('customize_register', 'esgi_customize_register_partners');
function esgi_customize_register_partners($wp_customize)
{
    // section partners
    $wp_customize->add_section('esgi_partners', array(
        'title' => __('Partenaires', 'esgi'),
        'description' => __('Personnaliser les partenaires', 'esgi'),
        'priority' => 1,
    ));
    // setting logo partner 1
    $wp_customize->add_setting('esgi_partners_logo_1', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-1.png',
        'description' => __('Logo du partenaire 1', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting logo partner 2
    $wp_customize->add_setting('esgi_partners_logo_2', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-2.png',
        'description' => __('Logo du partenaire 2', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting logo partner 3
    $wp_customize->add_setting('esgi_partners_logo_3', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-3.png',
        'description' => __('Logo du partenaire 3', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting logo partner 4
    $wp_customize->add_setting('esgi_partners_logo_4', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-4.png',
        'description' => __('Logo du partenaire 4', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting logo partner 5
    $wp_customize->add_setting('esgi_partners_logo_5', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-5.png',
        'description' => __('Logo du partenaire 5', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // setting logo partner 6
    $wp_customize->add_setting('esgi_partners_logo_6', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/partner-6.png',
        'description' => __('Logo du partenaire 6', 'esgi'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // control logo partner 1
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_1', array(
        'label' => __('Logo du partenaire 1', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_1',
    )));
    // control logo partner 2
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_2', array(
        'label' => __('Logo du partenaire 2', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_2',
    )));
    // control logo partner 3
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_3', array(
        'label' => __('Logo du partenaire 3', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_3',
    )));
    // control logo partner 4
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_4', array(
        'label' => __('Logo du partenaire 4', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_4',
    )));
    // control logo partner 5
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_5', array(
        'label' => __('Logo du partenaire 5', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_5',
    )));
    // control logo partner 6
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_6', array(
        'label' => __('Logo du partenaire 6', 'esgi'),
        'section' => 'esgi_partners',
        'settings' => 'esgi_partners_logo_6',
    )));
}

function esgi_get_partners()
{
    $partners = array();
    for ($i = 1; $i <= 6; $i++) {
        $partners['logo_' . $i] = get_theme_mod('esgi_partners_logo_' . $i);
    }
    return $partners;
}

function get_theme_path($path)
{
    return getcwd() . '/wp-content/themes/examESGI/' . $path;
}

add_action('wp_ajax_foobar', 'esgi_search_posts');
function esgi_search_posts($search_query)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        's' => $search_query,
    );

    $query = new WP_Query($args);
    $result = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $categories = get_the_category();
            $categories_name = [];
            foreach ($categories as $category) {
                array_push($categories_name, $category->name);
            }
            $current_post = array(
                'title' => get_the_title(),
                'content' => get_the_excerpt(),
                'permalink' => get_the_permalink(),
                'date' => get_the_date(),
                'category' => $categories_name,
            );
            array_push($result, $current_post);
        }
    } else {
        return 'Aucun article ne corespond à votre recherche.';
    }
    wp_reset_postdata();
    return $result;
}

function delete_argument_uri($param): void
{
    $cur = remove_query_arg($param, get_current_uri());
}

function get_post_by_id($id)
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'p' => $id,
    );

    $query = new WP_Query($args);
    $result = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $current_post = array(
                'title' => get_the_title(),
                'content' => get_the_content(),
            );
            $result = $current_post;
        }
    } else {
        return 'Aucun article ne corespond à votre recherche.';
    }
    wp_reset_postdata();
    return $result;
}

function get_comments_by_post_id($post_id)
{
    $args = array(
        'post_id' => $post_id,
        'status' => 'approve',
    );

    $comments = get_comments($args);
    $result = [];

    if ($comments) {
        foreach ($comments as $comment) {
            if (!empty($comment->comment_author) && !empty($comment->comment_content)) {
                $current_comment = array(
                    'author' => $comment->comment_author,
                    'content' => $comment->comment_content,
                );
                array_push($result, $current_comment);
            }
        }
    } else {
        return 'Aucun commentaire ne corespond à votre recherche.';
    }
    return $result;
}

function add_comment($post_id, $comment, $author)
{
    $data = array(
        'comment_post_ID' => $post_id,
        'comment_author' => $author,
        'comment_content' => $comment,
    );
    wp_insert_comment($data);
}
