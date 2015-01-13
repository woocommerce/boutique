<?php
/**
 * Wootique setup functions
 *
 * @package wootique
 */

/**
 * Enqueue Wootique styles
 * @return void
 */
function wootique_enqueue_styles() {
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,700,400italic', array( 'storefront-style' ) );
    wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic', array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'wootique_enqueue_styles' );

function wootique_enqueue_child_styles() {
    wp_enqueue_style( 'wootique-style', get_stylesheet_uri(), array( 'storefront-style' ) );
}
add_action( 'wp_enqueue_scripts', 'wootique_enqueue_child_styles', 999 );

/**
 * Blue
 * @return  void
 */
function wootique_color_blue( $color ) {
	$color = '#6e95b6';
	return $color;
}
add_filter( 'storefront_default_header_background_color', 'wootique_color_blue' );
add_filter( 'storefront_default_footer_background_color', 'wootique_color_blue' );
add_filter( 'storefront_default_accent_color', 'wootique_color_blue' );
add_filter( 'storefront_default_footer_link_color', 'wootique_color_blue' );
add_filter( 'storefront_default_button_alt_background_color', 'wootique_color_blue' );

/**
 * Light Blue
 * @return  void
 */
function wootique_color_light_orange( $color ) {
	$color = '#ce4a08';
	return $color;
}
add_filter( 'storefront_default_background_color', 'wootique_color_light_orange' );

/**
 * White
 * @return  void
 */
function wootique_color_white( $color ) {
	$color = '#ffffff';
	return $color;
}
add_filter( 'storefront_default_header_link_color', 'wootique_color_white' );
add_filter( 'storefront_default_header_text_color', 'wootique_color_white' );
add_filter( 'storefront_default_button_alt_text_color', 'wootique_color_white' );

/**
 * Grey
 * @return  void
 */
function wootique_color_grey( $color ) {
	$color = '#777777';
	return $color;
}
add_filter( 'storefront_default_text_color', 'wootique_color_grey' );
add_filter( 'storefront_default_footer_text_color', 'wootique_color_grey' );

/**
 * Dark Grey
 * @return  void
 */
function wootique_color_dark_grey( $color ) {
	$color = '#333333';
	return $color;
}
add_filter( 'storefront_default_heading_color', 'wootique_color_dark_grey' );
add_filter( 'storefront_default_footer_heading_color', 'wootique_color_dark_grey' );
add_filter( 'storefront_default_button_text_color', 'wootique_color_dark_grey' );

/**
 * Light Grey
 * @return  void
 */
function wootique_color_light_grey( $color ) {
	$color = '#eeeeee';
	return $color;
}
add_filter( 'storefront_default_button_background_color', 'wootique_color_light_grey' );
