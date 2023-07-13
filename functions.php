<?php

/**
 * Register asset
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
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