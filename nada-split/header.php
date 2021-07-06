<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <?php wp_head();  ?>
</head>
<body <?php body_class(); ?> data-post-id="<?php echo get_the_ID(); ?>">
<header class="header">
    <nav class="navbar">
        <div class="navbar-collapse">
            <div class="navbar-nav d-flex justify-content-between bgd-light">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                    <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false ); ?>
                </a>
                <?php
                require_once('classes/nada-menu-walker.php');
                wp_nav_menu( [
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav__menu',
                    'echo'            => true,
                    'walker'          => new Nada_Menu_walker,
                ] );
                ?>
                <div class="navbar-nav__user">
                    <a href="#" class="added_to_cart wc-forward"><img src="<?php echo get_theme_image_url('cart.svg')?>" alt="card"></a>
                    <a class="navbar-nav__user-icon" href="#"><img src="<?php echo get_theme_image_url('profile.svg')?>" alt="profile"></a>
                </div>
                <div class="navbar-mobile-menu">
                    <button class="hamburger hamburger--slider" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="navbar-tablet hide-menu">
	        <?php
	        wp_nav_menu( [
		        'theme_location'  => 'primary',
		        'container'       => false,
		        'echo'            => true,
		        'menu_class'      => 'menu-tablet',
	        ] );
	        ?>
        </div>
    </nav>
</header>