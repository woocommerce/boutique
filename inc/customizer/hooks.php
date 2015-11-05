<?php
/**
 * General setup hooks and filters
 *
 * @package boutique
 */

/**
 * Add Boutique specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 								'b_add_customizer_css', 1000 );