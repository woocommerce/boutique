<?php
/**
 * Boutique setup functions
 *
 * @package boutique
 */

/**
 * Enqueue Storefront Styles
 * @return void
 */
function boutique_enqueue_styles() {
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue Bootique Styles
 * @return void
 */
function boutique_enqueue_child_styles() {
    wp_enqueue_style( 'boutique-style', get_stylesheet_uri(), array( 'storefront-style' ) );
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,700,400italic', array( 'storefront-style' ) );
    wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic', array( 'storefront-style' ) );
}

/**
 * Black
 * @return  string color
 */
function boutique_color_black( $color ) {
	$color = '#111111';
	return $color;
}

/**
 * Gold
 * @return  string color
 */
function boutique_color_gold( $color ) {
	$color = '#999e43';
	return $color;
}

/**
 * White
 * @return  string color
 */
function boutique_color_white( $color ) {
	$color = '#ffffff';
	return $color;
}

/**
 * English winter
 * @return  string color
 */
function boutique_color_english_winter( $color ) {
	$color = '#777777';
	return $color;
}

/**
 * Charcoal
 * @return  string color
 */
function boutique_color_charcoal( $color ) {
	$color = '#2b2b2b';
	return $color;
}

/**
 * Asphalt
 * @return  string color
 */
function boutique_color_asphalt( $color ) {
	$color = '#303030';
	return $color;
}

/**
 * Newspaper
 * @return  string color
 */
function boutique_color_newspaper( $color ) {
	$color = '#eeeeee';
	return $color;
}
