<?php
/**
 * Wootique structural functions
 *
 * @package wootique
 */

/**
 * Adjust the storefront homepage template layout
 * @return void
 */
function wootique_homepage_layout() {
	remove_action( 'homepage', 'storefront_featured_products',		40 );
	remove_action( 'homepage', 'storefront_homepage_content',		10 );

	add_action( 'wootique_before_homepage_content', 'storefront_homepage_content',			10 );
	add_action( 'wootique_before_homepage_content', 'storefront_featured_products',			20 );

	remove_action( 'homepage', 'storefront_product_categories',	20 );
}
add_action( 'init', 'wootique_homepage_layout' );

/**
 * Primary navigation wrapper
 * @return void
 */
function wootique_primary_navigation_wrapper() {
	echo '<section class="wootique-primary-navigation">';
}
add_action( 'storefront_header', 'wootique_primary_navigation_wrapper', 45 );

/**
 * Primary navigation wrapper close
 * @return void
 */
function wootique_primary_navigation_wrapper_close() {
	echo '</section>';
}
add_action( 'storefront_header', 'wootique_primary_navigation_wrapper_close', 65 );

/**
 * Return args to set product display limit and column amount to 3
 * @param  array $args args passed to the filter
 * @return array       the modified args
 */
function wootique_product_columns_three( $args ) {
	$args['limit'] 		= 3;
	$args['columns'] 	= 3;

	return $args;
}
add_filter( 'storefront_recent_products_args', 'wootique_product_columns_three' );
add_filter( 'storefront_popular_products_args', 'wootique_product_columns_three' );
add_filter( 'storefront_on_sale_products_args', 'wootique_product_columns_three' );