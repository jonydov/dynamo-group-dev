
    <footer>
        <div class="shell">
            <div class="col">
                <a href="<?php bloginfo('url'); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" />
                </a>
                <div class="text">
                    <?php the_field('footer_text', 'option'); ?>
                </div>
            </div>
            <div class="col">
                <div class="holder">
	                <?php
	                wp_nav_menu(array(
			                'theme_location' => 'footer-menu',
			                'depth' => 1,
			                'container' => false,
			                'fallback_cb' => 'wp_page_menu',
			                'menu_class' => 'footer-nav-buttons cf',
			                'walker' => new wp_bootstrap_navwalker())
	                );
	                ?>
                </div>
            </div>
        </div>
    </footer>

    </div>
</body>
</html>

<?php echo get_field('footer_scripts'); ?>


<?php wp_footer(); ?>


</body>
</html>