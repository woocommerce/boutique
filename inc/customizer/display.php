<?php
/**
 * ProShop custom selectors that adopt Storefront customizer settings
 *
 * @package boutique
 */

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function b_add_customizer_css() {
	$header_text_color 				= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_text_color', apply_filters( 'storefront_default_header_text_color', '#9aa0a7' ) ) );

	$style = '
		.main-navigation ul li.smm-active li ul.products li.product h3 {
			color: ' . $header_text_color . ';
		}';

	wp_add_inline_style( 'boutique-style', $style );
}