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

function esgi_customize_register($customize) // permet de rendre customisable n'importe quel champs (image, texte, etc) mais ne fonctionne pas. à revoir
{
    $customize->add_section('aboutus_title_section', array(
        'title' => __('About Us', 'exam_esgi'),
        'priority' => 100,
    ));

    $customize->add_setting('aboutus_title_setting', array(
        'default' => '',
    ));

    $customize->add_control(new WP_Customize_Control(
        $customize,
        'aboutus_title_control',
        array(
            'label' => __('Title', 'exam_esgi'),
            'section' => 'aboutus_title_section',
            'settings' => 'aboutus_title_setting',
            'type' => 'text',
        )
    ));
}
add_action('customize_register', 'esgi_customize_register');


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

function esgi_search_posts($search_query)
{
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        's'              => $search_query,
    );

    $query = new WP_Query($args);
    $result = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); // refaire ele baslisage avec taillwind
            $result .= '<h2>' . get_the_title() . '</h2>';
            $result .= '<p>' . get_the_excerpt() . '</p>';
        }
    } else {
        return 'Aucun article ne corespond à votre recherche.';
    }
    wp_reset_postdata();
    return $result;
}

function esgi_display_posts()
{
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="custom-posts-wrapper">';

        while ($query->have_posts()) {
            $query->the_post();

            // todo faire le balisage propremement avec taillwind
        }

        echo '</div>';
    } else {
        echo 'Auncun articles n\'a été publier pour le moment';
    }

    wp_reset_postdata();
}

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