<?php
/**
 * WooCommerce Setup Functions
 * See: http:///woothemes.com/woocommerce/
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function organic_agency_woocommerce_setup() {

	add_theme_support(
		'woocommerce',
		array(
			// WooCommerce Thumbnail Size.
			'single_image_width'            => 980,
			'thumbnail_image_width'         => 520,
			'gallery_thumbnail_image_width' => 220,
			// Product Grid Settings.
			'product_grid'                  => array(
				'default_columns' => 3,
				'default_rows'    => 4,
				'min_columns'     => 2,
				'max_columns'     => 5,
				'min_rows'        => 1,
			),
		)
	);

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'organic_agency_woocommerce_setup' );

/**
 * WooCommerce content wrappers.
 *
 * @return void
 */
function organic_agency_prepare_woocommerce_wrappers() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
}
add_action( 'wp_head', 'organic_agency_prepare_woocommerce_wrappers' );

/**
 * Open WooCommerce content wrappers.
 */
function organic_agency_open_woocommerce_content_wrappers() {
	?>
	<div class="row">
		<div class="content shop">
		<?php if ( is_shop() && is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<div class="eleven columns">
		<?php } else { ?>
			<div class="sixteen columns">
		<?php } ?>
				<div class="entry-content">
	<?php
}

/**
 * Close WooCommerce content wrappers.
 */
function organic_agency_close_woocommerce_content_wrappers() {
	?>
				</div>
			</div>

		<?php if ( is_shop() && is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<div class="five columns">
				<div class="sidebar">
					<?php dynamic_sidebar( 'shop-sidebar' ); ?>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
	<?php
}
add_action( 'woocommerce_before_main_content', 'organic_agency_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'organic_agency_close_woocommerce_content_wrappers', 10 );

/**
 * Add opening div before product gallery/image.
 */
function organic_agency_woocommerce_summary_wrapper_open() {
	echo '<div class="summary-wrapper">';
}
add_action( 'woocommerce_before_single_product_summary', 'organic_agency_woocommerce_summary_wrapper_open', 10 );

/**
 * Add closing div after product meta.
 */
function organic_agency_woocommerce_summary_wrapper_close() {
	echo '</div>';
}
add_action( 'woocommerce_product_meta_end', 'organic_agency_woocommerce_summary_wrapper_close', 10 );

// Remove WC sidebar.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Add the WC sidebar in the right place.
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

/**
 * WooCommerce specific sidebars.
 *
 * @return void
 */
function organic_agency_woocommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Shop Sidebar', 'organic-agency' ),
			'id'            => 'shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'organic_agency_woocommerce_widgets_init' );

/**
 * Removes the "shop" title on the main shop page.
 *
 * @since       1.0
 * @return      false
 */
function organic_agency_woocommerce_hide_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title', 'organic_agency_woocommerce_hide_page_title' );

/**
 * Change the breadcrumb separator.
 *
 * @param string $defaults updates default breadcrumb divider.
 */
function organic_agency_woocommerce_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'.
	$defaults['delimiter'] = ' <i class="fa fa-angle-right" aria-hidden="true"></i> ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'organic_agency_woocommerce_change_breadcrumb_delimiter' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function organic_agency_woocommerce_scripts() {

	wp_register_script( 'agency-header-cart', get_template_directory_uri() . '/plugins/woocommerce/woocommerce.js', '', '1.0', true );
	wp_enqueue_script( 'agency-header-cart' );

	wp_enqueue_style( 'agency-woocommerce-style', get_template_directory_uri() . '/plugins/woocommerce/woocommerce.css', '', '1.0' );

	wp_dequeue_style( 'selectWoo' );
	wp_deregister_style( 'selectWoo' );
	wp_dequeue_script( 'selectWoo' );
	wp_deregister_script( 'selectWoo' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'agency-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'organic_agency_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function organic_agency_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'organic_agency_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function organic_agency_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'organic_agency_woocommerce_related_products_args' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'organic_agency_woocommerce_header_cart' ) ) {
			organic_agency_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'organic_agency_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function organic_agency_woocommerce_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		organic_agency_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'organic_agency_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'organic_agency_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function organic_agency_woocommerce_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'organic-agency' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
				<span class="count"><?php echo wp_kses_data( sprintf( '%d', WC()->cart->get_cart_contents_count() ) ); ?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'organic_agency_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function organic_agency_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item menu-item';
		} else {
			$class = 'menu-item';
		}
		?>
		<div id="site-header-cart" class="site-header-cart">
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php organic_agency_woocommerce_cart_link(); ?>
			</div>
				<?php
					$instance = array(
						'title' => '',
					);
					the_widget( 'WC_Widget_Cart', $instance );
					?>
		</div>
		<?php
	}
}

/**
 * Workaround to prevent is_shop() from failing due to WordPress core issue
 *
 * @link https://core.trac.wordpress.org/ticket/21790
 * @return array       infinite scroll args.
 */
function organic_agency_woocommerce_is_shop_page() {
	global $wp_query;
	$front_page_id        = get_option( 'page_on_front' );
	$current_page_id      = $wp_query->get( 'page_id' );
	$is_static_front_page = 'page' === get_option( 'show_on_front' );
	if ( $is_static_front_page && $front_page_id === $current_page_id ) {
		$is_shop_page = ( wc_get_page_id( 'shop' ) === $current_page_id ) ? true : false;
	} else {
		$is_shop_page = is_shop();
	}
	return $is_shop_page;
}
