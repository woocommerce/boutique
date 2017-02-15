<?php
/**
 * Boutique_Template Class
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Boutique_Template' ) ) {

class Boutique_Template {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper' ), 					45 );
		add_action( 'storefront_header', array( $this, 'primary_navigation_wrapper_close' ), 			65 );

		add_action( 'init', array( $this, 'remove_homepage_templates' ) );

		add_action( 'boutique_before_homepage_content', 'storefront_homepage_content', 					10 );
		add_action( 'boutique_before_homepage_content', 'storefront_featured_products',					20 );

		add_filter( 'storefront_recent_products_args',       array( $this, 'product_columns_three' ),   99 );
		add_filter( 'storefront_popular_products_args',      array( $this, 'product_columns_three' ),   99 );
		add_filter( 'storefront_on_sale_products_args',      array( $this, 'product_columns_three' ),   99 );
		add_filter( 'storefront_best_selling_products_args', array( $this, 'product_columns_three' ),   99 );
	}

	/**
	 * Remove unnecessary homepage templates
	 *
	 * @return void
	 */
	public function remove_homepage_templates() {
		remove_action( 'homepage', 'storefront_featured_products', 40 );
		remove_action( 'homepage', 'storefront_homepage_content',  10 );
	}

	/**
	 * Primary navigation wrapper
	 * @return void
	 */
	public function primary_navigation_wrapper() {
		echo '<section class="boutique-primary-navigation">';
	}

	/**
	 * Primary navigation wrapper close
	 * @return void
	 */
	public function primary_navigation_wrapper_close() {
		echo '</section>';
	}

	/**
	 * Return args to set product display limit and column amount to 3
	 * @param  array $args args passed to the filter
	 * @return array       the modified args
	 */
	public function product_columns_three( $args ) {
		$args['limit'] 		= 3;
		$args['columns'] 	= 3;

		return $args;
	}
}

}

return new Boutique_Template();