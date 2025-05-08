<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'groktalk'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-inner">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <span class="logo-text"><?php bloginfo('name'); ?></span>
                            </a>
                        </h1>
                        <?php
                    }
                    ?>
                </div>

                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>

                <?php groktalk_add_mobile_menu(); ?>
            </div>
        </div>
    </header>

<!-- Start of page content container -->
<div id="content" class="site-content">