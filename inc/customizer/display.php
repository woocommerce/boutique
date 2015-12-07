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
	$header_background_color 		= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_background_color', apply_filters( 'storefront_default_header_background_color', '#303030' ) ) );
	$header_text_color 				= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_text_color', apply_filters( 'storefront_default_header_text_color', '#9aa0a7' ) ) );

	$style = '
		.boutique-primary-navigation,
		.main-navigation ul.menu > li > ul,
		.main-navigation ul.menu ul,
		.site-header-cart .widget_shopping_cart {
			background: ' . storefront_adjust_color_brightness( $header_background_color, -10 ) . ';
		}

		@media screen and (min-width: 768px) {
			.main-navigation ul.menu ul,
			.main-navigation ul.nav-menu ul,
			.main-navigation .smm-mega-menu,
			.sticky-wrapper,
			.sd-sticky-navigation,
			.sd-sticky-navigation:before,
			.sd-sticky-navigation:after {
				background: ' . storefront_adjust_color_brightness( $header_background_color, -10 ) . ' !important;
			}
		}

		.main-navigation ul li.smm-active li ul.products li.product h3 {
			color: ' . $header_text_color . ';
		}';

	wp_add_inline_style( 'boutique-style', $style );
}