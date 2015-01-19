<?php
/**
 * General setup hooks and filters
 *
 * @package boutique
 */

/**
 * Styles / scripts
 */
add_action( 'wp_enqueue_scripts', 'boutique_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'boutique_enqueue_child_styles', 999 );

/**
 * Customizer default color tweaks
 */
add_filter( 'storefront_default_heading_color', 				'boutique_color_charcoal' );
add_filter( 'storefront_default_footer_heading_color', 			'boutique_color_charcoal' );
add_filter( 'storefront_default_button_text_color', 			'boutique_color_charcoal' );
add_filter( 'storefront_default_header_background_color', 		'boutique_color_charcoal' );
add_filter( 'storefront_default_footer_background_color', 		'boutique_color_charcoal' );

add_filter( 'storefront_default_header_link_color', 			'boutique_color_white' );
add_filter( 'storefront_default_header_text_color', 			'boutique_color_white' );
add_filter( 'storefront_default_button_alt_text_color', 		'boutique_color_white' );

add_filter( 'storefront_default_accent_color', 					'boutique_color_black' );
add_filter( 'storefront_default_footer_link_color', 			'boutique_color_black' );

add_filter( 'storefront_default_text_color', 					'boutique_color_english_winter' );
add_filter( 'storefront_default_footer_text_color', 			'boutique_color_english_winter' );

add_filter( 'storefront_default_accent_color', 					'boutique_color_gold' );
add_filter( 'storefront_default_button_alt_background_color', 	'boutique_color_gold' );

add_filter( 'storefront_default_background_color', 				'boutique_color_asphalt' );

add_filter( 'storefront_default_button_background_color', 		'boutique_color_newspaper' );