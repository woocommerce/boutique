<?php
/**
 * Boutique_Integrations Class
 *
 * @author   WooThemes
 * @since    2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Boutique_Integrations' ) ) :

class Boutique_Integrations {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'after_switch_theme', array( $this, 'set_theme_mods' ) );
		add_action( 'customize_register', array( $this, 'edit_controls' ), 99 );
	}

	/**
	 * Remove unused/incompatible controls
	 * @return void
	 */
	public function edit_controls( $wp_customize ) {
		$wp_customize->remove_section( 'storefront_homepage' );
		$wp_customize->remove_control( 'sph_layout' );
		$wp_customize->remove_control( 'sph_hero_full_height' );
		$wp_customize->remove_control( 'sd_header_layout' );
		$wp_customize->remove_control( 'sd_header_layout_divider_after' );
		$wp_customize->remove_control( 'sd_header_sticky' );
		$wp_customize->remove_control( 'sd_fixed_width' );
		$wp_customize->remove_control( 'sd_content_background_color' );
	}

	/**
     * Set / remove theme mods that are incompatible with this theme
     * @return void
     */
	public function set_theme_mods() {
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
		remove_theme_mod( 'sd_fixed_width' );
		remove_theme_mod( 'sd_content_background_color' );
	}
}

endif;

return new Boutique_Integrations();