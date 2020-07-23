<footer>
    <section class="footer-widgets">
        <div class="container">
            <div class="row">
                Widgets do rodapé
            </div>
        </div>
    </section>
    <section class="copyrigth">
        <div class="container">
            <div class="row">
                <div class="copyrigth col12 col-md-6">
                    <p><?php echo get_theme_mod('set_copyright', 'Copyright'); ?></p>
                </div>
                <div class="footer-menu col-12 col-md-6 txt-left text-md-right">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'aura_lab_footer_menu'
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
</footer>
</div>
<?php wp_footer() ?>
</body>

</html>