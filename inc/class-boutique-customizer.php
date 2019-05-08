<?php
/**
 * Boutique_Customizer Class
 * Makes adjustments to Storefront cores Customizer implementation.
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Boutique_Customizer' ) ) {

class Boutique_Customizer {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		global $storefront_version;

		add_action( 'wp_enqueue_scripts', 	array( $this, 'add_customizer_css' ),						1000 );
		add_action( 'customize_register', 	array( $this, 'edit_default_controls' ),					99 );
		add_filter( 'storefront_setting_default_values', array( $this, 'get_boutique_defaults' ) );
		add_filter( 'storefront_default_background_color', array( $this, 'default_background_color' ) );

		/**
		 * The following can be removed when Storefront 2.1 lands
		 */
		add_action( 'init',					array( $this, 'default_theme_mod_values' )					);
		add_action( 'customize_register',	array( $this, 'edit_default_customizer_settings' ),			99 );
		if ( version_compare( $storefront_version, '2.0.0', '<' ) ) {
			add_action( 'init',				array( $this, 'default_theme_settings' ) );
		}
	}

	/**
	 * Returns an array of the desired default Storefront options
	 * @return array
	 */
	public function get_boutique_defaults( $defaults = array() ) {
		$defaults['storefront_heading_color']               = '#2b2b2b';
		$defaults['storefront_footer_heading_color']        = '#2b2b2b';
		$defaults['storefront_button_text_color']           = '#2b2b2b';
		$defaults['storefront_header_background_color']     = '#2b2b2b';
		$defaults['storefront_footer_background_color']     = '#2b2b2b';
		$defaults['storefront_header_link_color']           = '#ffffff';
		$defaults['storefront_header_text_color']           = '#ffffff';
		$defaults['storefront_button_alt_text_color']       = '#ffffff';
		$defaults['storefront_footer_link_color']           = '#111111';
		$defaults['storefront_text_color']                  = '#777777';
		$defaults['storefront_footer_text_color']           = '#777777';
		$defaults['storefront_accent_color']                = '#7c7235';
		$defaults['storefront_button_alt_background_color'] = '#7c7235';
		$defaults['storefront_button_background_color']     = '#eeeeee';
		$defaults['background_color']                       = '303030';

		return apply_filters( 'boutique_default_settings', $defaults );
	}

	/**
	 * Set default Customizer settings based on Storechild design.
	 * @uses get_boutique_defaults()
	 * @return void
	 */
	public function edit_default_customizer_settings( $wp_customize ) {
		foreach ( Boutique_Customizer::get_boutique_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );

			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

	/**
	 * Sets default theme color filters for storefront color values.
	 * This function is required for Storefront < 2.0.0 support
	 * @uses get_storechild_defaults()
	 * @return void
	 */
	public function default_theme_settings() {
		$prefix_regex = '/^storefront_/';
		foreach ( self::get_boutique_defaults() as $mod => $val) {
			if ( preg_match( $prefix_regex, $mod ) ) {
				$filter = preg_replace( $prefix_regex, 'storefront_default_', $mod );
				add_filter( $filter, function( $_ ) use ( $val ) {
					return $val;
				}, 99 );
			}
		}
	}

	/**
	 * Returns a default theme_mod value if there is none set.
	 * @uses get_boutique_defaults()
	 * @return void
	 */
	public function default_theme_mod_values() {
		foreach ( Boutique_Customizer::get_boutique_defaults() as $mod => $val ) {
			add_filter( 'theme_mod_' . $mod, function( $setting ) use ( $val ) {
				return $setting ? $setting : $val;
			});
		}
	}

	/**
	 * Modify the default controls
	 * @return void
	 */
	public function edit_default_controls( $wp_customize ) {
		$wp_customize->get_setting( 'storefront_header_text_color' )->transport 	= 'refresh';
	}

	/**
	 * Add CSS using settings obtained from the theme options.
	 * @return void
	 */
	public function add_customizer_css() {
		$header_background_color 		= get_theme_mod( 'storefront_header_background_color' );
		$header_text_color 				= get_theme_mod( 'storefront_header_text_color' );

		$style = '
			.main-navigation ul.menu > li > ul,
			.main-navigation ul.menu ul,
			.site-header-cart .widget_shopping_cart {
				background: ' . storefront_adjust_color_brightness( $header_background_color, -10 ) . ';
			}

			table th {
				background-color: ' . storefront_adjust_color_brightness( '#ffffff', -7 ) . ';
			}

			table tbody td,
			table.wp-block-table:not( .is-style-stripes ) tbody tr:nth-child(2n) td {
				background-color: ' . storefront_adjust_color_brightness( '#ffffff', -2 ) . ';
			}

			table tbody tr:nth-child(2n) td,
			table.wp-block-table.is-style-stripes tbody tr:nth-child(2n) td {
				background-color: ' . storefront_adjust_color_brightness( '#ffffff', -4 ) . ';
			}

			#order_review, #payment .payment_methods li .payment_box,
			#payment .place-order {
				background-color: #fafafa;
			}

			#payment .payment_methods li,
			#payment .payment_methods li:hover {
				background-color: #fff;
			}

			@media screen and (min-width: 768px) {
				.boutique-primary-navigation,
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

		wp_add_inline_style( 'storefront-child-style', $style );
	}

	/**
	 * Default background color.
	 *
	 * @param string $color Default color.
	 * @return string
	 */
	public function default_background_color( $color ) {
		return '303030';
	}
}

}

return new Boutique_Customizer();