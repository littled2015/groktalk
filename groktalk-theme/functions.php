<?php
/**
 * GrokTalk functions and definitions
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue theme styles and scripts
 */
function groktalk_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style('groktalk-style', get_stylesheet_uri());
    
    // Main CSS
    wp_enqueue_style('groktalk-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    
    // Responsive CSS
    wp_enqueue_style('groktalk-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('groktalk-main'), '1.0.0');
    
    // Main JavaScript
    wp_enqueue_script('groktalk-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Mobile menu
    wp_enqueue_script('groktalk-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array('jquery'), '1.0.0', true);
    
    // Chatbot script on specific pages
    if (is_page_template('page-templates/innovation-spotlight.php') || is_front_page()) {
        wp_enqueue_script('groktalk-chatbot', get_template_directory_uri() . '/assets/js/chatbot.js', array('jquery'), '1.0.0', true);
        wp_localize_script('groktalk-chatbot', 'ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('groktalk_chatbot_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'groktalk_enqueue_assets');

/**
 * Register navigation menus
 */
function groktalk_register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'groktalk_register_menus');

/**
 * Theme setup
 */
function groktalk_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('groktalk', get_template_directory() . '/languages');
    
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('automatic-feed-links');
    
    // Image sizes
    add_image_size('groktalk-featured', 800, 600, true);
    add_image_size('groktalk-blog-thumb', 350, 250, true);
}
add_action('after_setup_theme', 'groktalk_theme_setup');

/**
 * Widget areas
 */
function groktalk_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'groktalk'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'groktalk'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 1', 'groktalk'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets for first footer column.', 'groktalk'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 2', 'groktalk'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets for second footer column.', 'groktalk'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 3', 'groktalk'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets for third footer column.', 'groktalk'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'groktalk_widgets_init');

/**
 * Add mobile menu button to header
 */
function groktalk_add_mobile_menu() {
    echo '<button class="mobile-menu-toggle" aria-expanded="false" aria-controls="primary-navigation">';
    echo '<span class="screen-reader-text">' . esc_html__('Toggle menu', 'groktalk') . '</span>';
    echo '</button>';
}

/**
 * Calculate reading time for post content
 */
function groktalk_get_reading_time($content) {
    if (empty($content)) {
        return 1;
    }
    $word_count = str_word_count(wp_strip_all_tags($content));
    $reading_time = ceil($word_count / 200); // Assuming 200 words per minute
    return max($reading_time, 1); // Minimum 1 minute
}

/**
 * Get related posts based on categories and tags
 */
function groktalk_get_related_posts($post_id, $limit = 3) {
    $categories = get_the_category($post_id);
    $tags = get_the_tags($post_id);
    
    $category_ids = array();
    $tag_ids = array();
    
    if ($categories) {
        foreach ($categories as $category) {
            $category_ids[] = $category->term_id;
        }
    }
    
    if ($tags) {
        foreach ($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }
    }
    
    // Only run query if we have terms to search for
    if (empty($category_ids) && empty($tag_ids)) {
        return new WP_Query(array('post__in' => array(-1))); // Return empty query
    }
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $limit,
        'post__not_in' => array($post_id),
        'tax_query' => array(
            'relation' => 'OR',
        ),
    );
    
    if (!empty($category_ids)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $category_ids,
        );
    }
    
    if (!empty($tag_ids)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field' => 'term_id',
            'terms' => $tag_ids,
        );
    }
    
    return new WP_Query($args);
}

/**
 * Add custom fields for author social media
 */
function groktalk_user_contactmethods($user_contact) {
    $user_contact['twitter'] = __('Twitter Profile URL', 'groktalk');
    $user_contact['linkedin'] = __('LinkedIn Profile URL', 'groktalk');
    return $user_contact;
}
add_filter('user_contactmethods', 'groktalk_user_contactmethods');

/**
 * Add custom body classes
 */
function groktalk_body_classes($classes) {
    // Template specific classes
    if (is_page_template('page-templates/ai-talent.php')) {
        $classes[] = 'ai-talent-template';
    }
    if (is_page_template('page-templates/solutions-hub.php')) {
        $classes[] = 'solutions-hub-template';
    }
    if (is_page_template('page-templates/ai-intelligence.php')) {
        $classes[] = 'ai-intelligence-template';
    }
    if (is_page_template('page-templates/innovation-spotlight.php')) {
        $classes[] = 'innovation-spotlight-template';
    }
    
    // Add class to blog index
    if (is_home() || is_archive() || is_search()) {
        $classes[] = 'blog-layout';
    }
    
    return $classes;
}
add_filter('body_class', 'groktalk_body_classes');

/**
 * Custom excerpt length
 */
function groktalk_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'groktalk_excerpt_length');

/**
 * Custom excerpt more text
 */
function groktalk_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'groktalk_excerpt_more');

/**
 * Handle chatbot AJAX requests
 */
function groktalk_handle_chatbot_request() {
    // Check nonce
    if (!check_ajax_referer('groktalk_chatbot_nonce', 'nonce', false)) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
    }
    
    $message = isset($_POST['message']) ? sanitize_text_field($_POST['message']) : '';
    
    if (empty($message)) {
        wp_send_json_error(array('message' => 'Message is required'));
    }
    
    // Process the chatbot response here
    // This is where you'd integrate with an AI API
    $response = "This is a placeholder response. Integrate with your preferred AI API here. You said: " . $message;
    
    wp_send_json_success(array('response' => $response));
}
add_action('wp_ajax_groktalk_chatbot', 'groktalk_handle_chatbot_request');
add_action('wp_ajax_nopriv_groktalk_chatbot', 'groktalk_handle_chatbot_request');

/**
 * Get social media links from customizer
 */
function groktalk_get_social_links() {
    $social_links = array();
    
    $twitter_url = get_theme_mod('twitter_url', '');
    $linkedin_url = get_theme_mod('linkedin_url', '');
    
    if ($twitter_url) {
        $social_links['twitter'] = $twitter_url;
    }
    
    if ($linkedin_url) {
        $social_links['linkedin'] = $linkedin_url;
    }
    
    return $social_links;
}

/**
 * Display social media links
 */
if (!function_exists('groktalk_display_social_links')) {
    function groktalk_display_social_links() {
        $social_links = groktalk_get_social_links();
        
        if (!empty($social_links)) {
            echo '<div class="social-links">';
            foreach ($social_links as $platform => $url) {
                if ($platform === 'twitter') {
                    $icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>';
                } elseif ($platform === 'linkedin') {
                    $icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>';
                } else {
                    $icon = '';
                }
                
                printf(
                    '<a href="%s" target="_blank" rel="noopener noreferrer" class="social-link %s" aria-label="%s">%s</a>',
                    esc_url($url),
                    esc_attr($platform),
                    esc_attr(ucfirst($platform)),
                    $icon
                );
            }
            echo '</div>';
        }
    }
}

/**
 * Get category ID by slug
 */
function groktalk_get_category_id_by_slug($slug) {
    $category = get_category_by_slug($slug);
    return $category ? $category->term_id : 0;
}