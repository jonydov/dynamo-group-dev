<?php

function register_my_menus() {
    register_nav_menus( array(
        'main-menu' => __( 'Main Navigation'),
        'main-menu-buttons' => __( 'Main Navigation Buttons'),
        'footer-menu' => __( 'Footer Navigation'),
        'footer-menu-bottom' => __( 'Footer Bottom Navigation'),
    ) );
}
add_action( 'init', 'register_my_menus' );

?>