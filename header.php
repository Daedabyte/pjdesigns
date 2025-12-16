<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Scroll Progress Indicator -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Mobile Nav Overlay -->
<div class="nav-overlay" id="navOverlay"></div>

<!-- Navigation -->
<nav id="navbar">
    <div class="nav-container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <?php
            $logo_white = get_field('logo_white', 'option');
            $logo_color = get_field('logo_color', 'option');

            if( $logo_white ): ?>
                <img src="<?php echo esc_url($logo_white['url']); ?>" alt="<?php echo esc_attr($logo_white['alt'] ?: get_bloginfo('name')); ?>" class="logo-white" />
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/PJ_Logo_White.png" alt="<?php bloginfo('name'); ?>" class="logo-white" />
            <?php endif; ?>

            <?php if( $logo_color ): ?>
                <img src="<?php echo esc_url($logo_color['url']); ?>" alt="<?php echo esc_attr($logo_color['alt'] ?: get_bloginfo('name')); ?>" class="logo-color" />
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/PJ_Logo_Color.png" alt="<?php bloginfo('name'); ?>" class="logo-color" />
            <?php endif; ?>
        </a>

        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location'  => 'primary',
                'menu_id'         => 'navLinks',
                'menu_class'      => 'nav-links',
                'container'       => false,
                'fallback_cb'     => false,
            ) );
        } else {
            // Default navigation if no menu is set
            echo '<ul class="nav-links" id="navLinks">';
            echo '<li><a href="#home">Home</a></li>';
            echo '<li><a href="#about">About</a></li>';
            echo '<li><a href="#services">Services</a></li>';
            echo '<li><a href="#portfolio">Portfolio</a></li>';
            echo '<li><a href="#booking">Book Now</a></li>';
            echo '<li><a href="#contact">Contact</a></li>';
            echo '<li class="mobile-logo">';
            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">';
            if( $logo_color ) {
                echo '<img src="' . esc_url($logo_color['url']) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />';
            } else {
                echo '<img src="' . get_template_directory_uri() . '/images/PJ_Logo_Color.png" alt="' . esc_attr(get_bloginfo('name')) . '" />';
            }
            echo '</a>';
            echo '</li>';
            echo '</ul>';
        }
        ?>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
