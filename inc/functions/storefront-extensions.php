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
 * Customize Storefront extension Customizer controls etc.
 * @return void
 */
if ( ! function_exists( 'boutique_customize_register' ) ) {
	function boutique_customize_register( $wp_customize ) {
		$wp_customize->remove_section( 'storefront_homepage' );
	}
}
add_action( 'customize_register', 'boutique_customize_register', 99 );