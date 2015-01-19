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