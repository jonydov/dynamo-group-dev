<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title><?php wp_title(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.png"/>

    <?php echo get_field('header_scripts', 'option'); ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="wrapper">

    <header>
        <div class="shell">
            <nav class="navbar">

                <a class="logo" href="<?php bloginfo('url'); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" />
                </a>

                <button class="c-hamburger c-hamburger--htx show-mobile">
                    <span>toggle menu</span>
                </button>

                <?php
                    wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'depth' => 2,
                            'container' => false,
                            'fallback_cb' => 'wp_page_menu',
                            'menu_class' => 'main-nav cf',
                            'walker' => new wp_bootstrap_navwalker())
                    );
                ?>


                <?php
                    wp_nav_menu(array(
                            'theme_location' => 'main-menu-buttons',
                            'depth' => 2,
                            'container' => false,
                            'fallback_cb' => 'wp_page_menu',
                            'menu_class' => 'main-nav-buttons cf',
                            'walker' => new wp_bootstrap_navwalker())
                    );
                ?>
            </nav>
        </div>
    </header>