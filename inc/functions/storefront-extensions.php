<?php
/**
 * Boutique Storefront extension compatibility
 *
 * @package boutique
 */

/**
 * Remove Customizer settings added by Storefront extensions that this theme is incompatible with.
 * @return void
 */
function boutique_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'storefront_homepage' );
	$wp_customize->remove_control( 'sph_layout' );
	$wp_customize->remove_control( 'sph_hero_full_height' );
	$wp_customize->remove_control( 'sd_header_layout' );
	$wp_customize->remove_control( 'sd_header_layout_divider_after' );
	$wp_customize->remove_control( 'sd_header_sticky' );
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
	remove_theme_mod( 'sph_layout' );
	remove_theme_mod( 'sph_hero_full_height' );
	remove_theme_mod( 'sd_header_layout' );
	remove_theme_mod( 'sd_header_sticky' );
}
add_action( 'after_switch_theme', 'boutique_set_theme_mods' );