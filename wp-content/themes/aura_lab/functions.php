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

// Google Fonts
wp_enqueue_style('rajdhani', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script');

add_action('wp_enqueue_scripts', 'aura_lab_scripts');

function aura_lab_config()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

    register_nav_menus(
        array(
            'aura_lab_main_menu'     => esc_html__('Aura Lab Menu', 'aura-lab'),
            'aura_lab_footer_menu' => esc_html__('Aura Footer Menu', 'aura-lab')
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
    ));

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    if (!isset($content_width)) {
        $content_width = 600;
    }
}

add_action('after_setup_theme', 'aura_lab_config', 0);

require get_template_directory() . '/inc/wc-modifications.php';
