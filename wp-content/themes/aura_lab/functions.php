<?php
function aura_lab_scripts()
{
    wp_enqueue_style('aura-provocativa-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
}

add_action('wp_enqueue_scripts', 'aura_lab_scripts');
