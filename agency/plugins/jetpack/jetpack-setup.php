<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/**
 * Add support for Jetpack's Featured Content and Infinite Scroll
 */

if ( ! function_exists( 'organic_agency_jetpack_setup' ) ) :

	/** Function organic_agency_jetpack_setup */
	function organic_agency_jetpack_setup() {

		// See: http://jetpack.me/support/infinite-scroll/ for more.
		add_theme_support(
			'infinite-scroll',
			array(
				'container'      => 'infinite-container',
				'footer'         => 'page',
				'wrapper'        => false,
				'render'         => 'organic_agency_render_infinite',
				'footer_widgets' => array( 'footer' ),
			)
		);

		// Add theme support for CPT.
		add_theme_support( 'jetpack-portfolio' );
		add_theme_support( 'jetpack-testimonial' );

	}

endif;
add_action( 'after_setup_theme', 'organic_agency_jetpack_setup' );

/**
 * Infinite Scroll: function for rendering posts
 */
function organic_agency_render_infinite() {

	if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		woocommerce_product_loop_start();
	} elseif ( is_archive() || is_search() ) {
		echo '<div class="infinite-rendered">';
	}

	if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		while ( have_posts() ) :
			the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile; // end of the loop.
	} elseif ( is_home() ) {
		get_template_part( 'templates/loop', 'blog' );
	} else {
		get_template_part( 'templates/loop', 'archive' );
	}

	if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		woocommerce_product_loop_end();
	} elseif ( is_archive() || is_search() ) {
		echo '</div>';
	}

}
