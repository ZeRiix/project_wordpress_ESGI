<?php

function esgi_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}


function esgi_register_asset()
{
    wp_register_script('taillwind', 'https://cdn.tailwindcss.com');
    wp_enqueue_script('taillwind');
}

add_action('after_setup_theme', 'esgi_theme_support');
add_action('wp_enqueue_scripts', 'esgi_register_asset');