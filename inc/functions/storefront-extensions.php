<?php
/**
 * Boutique Storefront extension compatibility
 *
 * @package boutique
 */

/**
 * Declare extensions this child theme doesn't support
 * @return  void
 */
function boutique_extension_support() {
	add_filter( 'storefront_designer_enabled', '__return_false' );
}
add_action( 'init', 'boutique_extension_support', -1 );

/**
 * Remove Customizer settings added by Storefront extensions that this theme is incompatible with.
 * @return void
 */
function boutique_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'storefront_homepage' );
}
add_action( 'customize_register', 'boutique_customize_register', 99 );

/**
 * Set / remove theme mods to suit this theme after activation
 * @return void
 */
function boutique_set_theme_mods() {
	// Reset the homepage template product toggles / titles
	remove_theme_mod( 'swc_homepage_recent' );
	remove_theme_mod( 'swc_homepage_recent_products_title' );
	remove_theme_mod( 'swc_homepage_featured' );
	remove_theme_mod( 'swc_homepage_featured_products_title' );
	remove_theme_mod( 'swc_homepage_top_rated' );
	remove_theme_mod( 'swc_homepage_top_rated_products_title' );
	remove_theme_mod( 'swc_homepage_on_sale' );
	remove_theme_mod( 'swc_homepage_on_sale_products_title' );
}
add_action( 'after_switch_theme', 'boutique_set_theme_mods' );