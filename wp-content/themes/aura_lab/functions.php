<?php

require_once get_template_directory() . '/inc/customizer.php';


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

// Flexlider javascript and CSS files
wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '', true);
wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all');
wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array('jquery'), '', true);

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

    add_theme_support('custom-logo', array(
        'height'      => 85,
        'width'       => 160,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'aura-lab-slider', 1920, 800, array( 'center', 'center' ) );
    add_image_size( 'aura-lab-blog', 960, 640, array( 'center', 'center' ) );
    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }


    if (!isset($content_width)) {
        $content_width = 600;
    }
}

add_action('after_setup_theme', 'aura_lab_config', 0);

if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'aura_lab_woocommerce_header_add_to_cart_fragment');
function aura_lab_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <span class="items"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
<?php
    $fragments['span.items'] = ob_get_clean();
    return $fragments;
}
