<?php
function aura_lab_scripts()
{
    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/inc/bootstrap.min.js',
        array('jquery'),
        '4.4.1',
        true
    );

    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/inc/bootstrap.min.css',
        array(),
        '4.4.1',
        'all'
    );

    wp_enqueue_style(
        'aura-provocativa-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_template_directory() . '/style.css'),
        'all'
    );
}

add_action('wp_enqueue_scripts', 'aura_lab_scripts');

function aura_lab_config()
{
    register_nav_menus(
        array(
            'aura_lab_main_menu' => 'Aura Lab Menu',
            'aura_lab_footer_menu' => 'Aura Footer Menu',
        )
    );

    add_theme_support('woocommerce', array(
        'thumbnail_image_width'     => 255,
        'single_image_width'        => 255,
        'product_grid'              => array(
            'default_rows'      => 10,
            'min_rows'          => 10,
            'default_columns'   => 1,
            'min_columns'       => 1,
            'max_columns'       => 1,
        )
    ) );

    add_theme_support( 'wc-product-gallery-zoom');
    add_theme_support( 'wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider');

    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }
}

add_action('after_setup_theme', 'aura_lab_config', 0);
