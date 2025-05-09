<?php
/**
 * GrokTalk Theme functions and definitions
 */

if ( ! defined( 'GROKTALK_VERSION' ) ) {
    // Replace the version number as needed
    define( 'GROKTALK_VERSION', '1.0.0' );
}

if ( ! function_exists( 'groktalk_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function groktalk_setup() {
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support( 'post-thumbnails' );

        // Register menu locations
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary Menu', 'groktalk' ),
                'footer' => esc_html__( 'Footer Menu', 'groktalk' ),
            )
        );

        // Switch default core markup to output valid HTML5
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Add theme support for selective refresh for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for custom logo
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'groktalk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function groktalk_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'groktalk_content_width', 1200 );
}
add_action( 'after_setup_theme', 'groktalk_content_width', 0 );

/**
 * Register widget area.
 */
function groktalk_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'groktalk' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'groktalk' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Widget Area', 'groktalk' ),
            'id'            => 'footer-widgets',
            'description'   => esc_html__( 'Add footer widgets here.', 'groktalk' ),
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'groktalk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function groktalk_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'groktalk-style', get_stylesheet_uri(), array(), GROKTALK_VERSION );
    
    // Enqueue main CSS files
    wp_enqueue_style( 'groktalk-main', get_template_directory_uri() . '/assets/css/main.css', array(), GROKTALK_VERSION );
    wp_enqueue_style( 'groktalk-header', get_template_directory_uri() . '/assets/css/header-styles.css', array(), GROKTALK_VERSION );
    wp_enqueue_style( 'groktalk-light-sections', get_template_directory_uri() . '/assets/css/light-sections.css', array(), GROKTALK_VERSION );
    wp_enqueue_style( 'groktalk-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), GROKTALK_VERSION );
    
    // Enqueue main JavaScript
    wp_enqueue_script( 'groktalk-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), GROKTALK_VERSION, true );
    
    // Conditionally load scripts/styles
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'groktalk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Calculate reading time for content
 */
function groktalk_get_reading_time($content) {
    // Count words
    $word_count = str_word_count(strip_tags($content));
    
    // Calculate reading time (average reading speed: 200 words per minute)
    $reading_time = ceil($word_count / 200);
    
    // Return minimum 1 minute
    return ($reading_time < 1) ? 1 : $reading_time;
}

/**
 * Add custom body classes
 */
function groktalk_body_classes($classes) {
    // Add a class if it's the front page
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    
    return $classes;
}
add_filter('body_class', 'groktalk_body_classes');

/**
 * Custom pagination function
 */
function groktalk_pagination() {
    global $wp_query;
    
    $total_pages = $wp_query->max_num_pages;
    
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));
        
        echo '<div class="cosmic-pagination">';
        
        // Previous page
        if ($current_page > 1) {
            echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="page-btn prev-page">';
            echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
            echo '<line x1="19" y1="12" x2="5" y2="12"></line>';
            echo '<polyline points="12 19 5 12 12 5"></polyline>';
            echo '</svg>';
            echo '<span>' . esc_html__('Newer Posts', 'groktalk') . '</span>';
            echo '</a>';
        }
        
        // Number pagination
        echo '<div class="page-numbers-container">';
        
        // First page link if not near the beginning
        if ($current_page >= 4) {
            echo '<a href="' . get_pagenum_link(1) . '" class="page-number">1</a>';
            
            // Jump back arrow instead of ellipsis
            if ($current_page > 4) {
                echo '<a href="' . get_pagenum_link($current_page - 3) . '" class="page-arrow jump-arrow">';
                echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                echo '<line x1="17" y1="12" x2="7" y2="12"></line>';
                echo '<polyline points="12 17 7 12 12 7"></polyline>';
                echo '</svg>';
                echo '</a>';
            }
        }
        
        // Page numbers
        for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $total_pages); $i++) {
            if ($i == $current_page) {
                echo '<span class="page-number current">' . $i . '</span>';
            } else {
                echo '<a href="' . get_pagenum_link($i) . '" class="page-number">' . $i . '</a>';
            }
        }
        
        // Last page link if not near the end
        if ($current_page <= ($total_pages - 3)) {
            // Jump forward arrow instead of ellipsis
            if ($current_page < ($total_pages - 3)) {
                echo '<a href="' . get_pagenum_link($current_page + 3) . '" class="page-arrow jump-arrow">';
                echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
                echo '<line x1="7" y1="12" x2="17" y2="12"></line>';
                echo '<polyline points="12 7 17 12 12 17"></polyline>';
                echo '</svg>';
                echo '</a>';
            }
            
            echo '<a href="' . get_pagenum_link($total_pages) . '" class="page-number">' . $total_pages . '</a>';
        }
        
        echo '</div>'; // End .page-numbers-container
        
        // Next page
        if ($current_page < $total_pages) {
            echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="page-btn next-page">';
            echo '<span>' . esc_html__('Older Posts', 'groktalk') . '</span>';
            echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">';
            echo '<line x1="5" y1="12" x2="19" y2="12"></line>';
            echo '<polyline points="12 5 19 12 12 19"></polyline>';
            echo '</svg>';
            echo '</a>';
        }
        
        echo '</div>'; // End .cosmic-pagination
    }
}

/**
 * Function to get excerpt with custom length
 */
function groktalk_custom_excerpt($length = 30) {
    $excerpt = get_the_excerpt();
    return wp_trim_words($excerpt, $length, '...');
}