<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e('Skip to content', 'groktalk'); ?></a>

<!-- Cosmic Header -->
<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <span class="text-neon"><?php echo esc_html(get_bloginfo('name')); ?></span>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>
            
            <?php 
            // Add mobile menu toggle button
            echo '<button class="mobile-menu-toggle" aria-expanded="false" aria-controls="primary-navigation" aria-label="Toggle navigation menu">';
            echo '<span class="toggle-glow"></span>';
            echo '</button>';
            ?>
            
            <nav class="main-navigation" aria-label="<?php esc_attr_e('Primary navigation', 'groktalk'); ?>">
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => 'groktalk_fallback_menu',
                )); 
                ?>
            </nav>
        </div>
    </div>
</header>

<!-- Add back-to-top button -->
<a href="#" class="back-to-top" aria-label="Scroll to top">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 19V5M5 12l7-7 7 7"/>
    </svg>
</a>

<main id="content" class="site-main">