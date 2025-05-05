<?php
/**
 * GrokTalk Theme Customizer
 */

function groktalk_customize_register( $wp_customize ) {
    // Add theme options panel
    $wp_customize->add_panel( 'groktalk_options', array(
        'title' => __( 'GrokTalk Options', 'groktalk' ),
        'priority' => 160,
    ));

    // Social Media Section
    $wp_customize->add_section( 'groktalk_social', array(
        'title' => __( 'Social Media', 'groktalk' ),
        'panel' => 'groktalk_options',
    ));

    $wp_customize->add_setting( 'twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( 'twitter_url', array(
        'label' => __( 'Twitter URL', 'groktalk' ),
        'section' => 'groktalk_social',
        'type' => 'url',
    ));

    $wp_customize->add_setting( 'linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( 'linkedin_url', array(
        'label' => __( 'LinkedIn URL', 'groktalk' ),
        'section' => 'groktalk_social',
        'type' => 'url',
    ));

    // Color Section
    $wp_customize->add_section( 'groktalk_colors', array(
        'title' => __( 'Theme Colors', 'groktalk' ),
        'panel' => 'groktalk_options',
    ));

    $colors = array(
        'cosmic_blue' => '#1A237E',
        'neon_green' => '#39FF14',
        'electric_purple' => '#8A2BE2',
    );

    foreach ( $colors as $key => $default ) {
        $wp_customize->add_setting( $key, array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
            'label' => ucwords( str_replace( '_', ' ', $key ) ),
            'section' => 'groktalk_colors',
        )));
    }
}
add_action( 'customize_register', 'groktalk_customize_register' );