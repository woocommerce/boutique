<?php
/**
 * Boutique structural hooks and filters
 *
 * @package boutique
 */

/**
 * Layout
 */
add_action( 'init', 'boutique_homepage_layout' );
add_action( 'storefront_header', 'boutique_primary_navigation_wrapper', 45 );
add_action( 'storefront_header', 'boutique_primary_navigation_wrapper_close', 65 );

/**
 * Homepage
 */
add_filter( 'storefront_recent_products_args', 	'boutique_product_columns_three', 99 );
add_filter( 'storefront_popular_products_args', 'boutique_product_columns_three', 99 );
add_filter( 'storefront_on_sale_products_args', 'boutique_product_columns_three', 99 );