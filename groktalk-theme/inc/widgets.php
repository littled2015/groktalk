<?php
/**
 * Register widget areas
 */

function groktalk_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'groktalk' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'groktalk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'groktalk' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets for first footer column.', 'groktalk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'groktalk' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets for second footer column.', 'groktalk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Newsletter Widget', 'groktalk' ),
        'id'            => 'newsletter',
        'description'   => esc_html__( 'Add newsletter signup widget.', 'groktalk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'groktalk_widgets_init' );