<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 * @package Aura Provocativa
 */

get_header(); ?>
<div class="content-area">
    <main>
        <div class="container">
            <div class="row">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                        <article>
                            <h1><?php the_title(); ?></h1>
                            <div><?php the_content(); ?></div>
                        </article>
                    <?php
                    endwhile;
                else :
                    ?>
                    <p>Nada para mostrar</p>
                <?php
                endif;
                ?>
            </div>
            </section>
    </main>
</div>
<?php get_footer(); ?>