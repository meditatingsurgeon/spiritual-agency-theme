<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- BEGIN #page -->
<div id="page" class="site">

	<!-- BEGIN #header -->
	<header id="header" class="site-header">

		<!-- BEGIN #nav-bar -->
		<div id="nav-bar">

		<?php if ( has_nav_menu( 'left-menu' ) ) { ?>

			<!-- BEGIN #navigation -->
			<nav id="navigation-left" class="navigation-main" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'organic-agency' ); ?>">

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'left-menu',
							'title_li'       => '',
							'depth'          => 4,
							'fallback_cb'    => 'wp_page_menu',
							'container'      => false,
							'menu_class'     => 'menu',
							'walker'         => new Aria_Walker_Nav_Menu(),
							'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
							'link_before'    => '<span role="menuitem">',
							'link_after'     => '</span>',
						)
					);
				?>

			<!-- END #navigation -->
			</nav>

		<?php } ?>

		<div class="site-logo">

			<?php the_custom_logo(); ?>

			<?php if ( is_front_page() ) { ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</h1>
			<?php } else { ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</p>
			<?php } ?>

		</div>

		<?php if ( has_nav_menu( 'right-menu' ) ) { ?>

			<!-- BEGIN #navigation -->
			<nav id="navigation-right" class="navigation-main" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'organic-agency' ); ?>">

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'right-menu',
							'title_li'       => '',
							'depth'          => 4,
							'fallback_cb'    => 'wp_page_menu',
							'container'      => false,
							'menu_class'     => 'menu',
							'walker'         => new Aria_Walker_Nav_Menu(),
							'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
							'link_before'    => '<span role="menuitem">',
							'link_after'     => '</span>',
						)
					);
				?>

				<?php
				if ( function_exists( 'organic_agency_woocommerce_header_cart' ) && count( WC()->cart->get_cart() ) > 0 ) {
					organic_agency_woocommerce_header_cart();
				}
				?>

			<!-- END #navigation -->
			</nav>

		<?php } ?>

			<!-- BEGIN #nav-mobile-controls -->
			<div id="nav-mobile-controls">

				<?php
				if ( function_exists( 'organic_agency_woocommerce_header_cart' ) && count( WC()->cart->get_cart() ) > 0 && wp_is_mobile() ) {
					organic_agency_woocommerce_header_cart();
				}
				?>

				<a id="menu-toggle" class="menu-toggle" href="#sidr">
					<span class="screen-reader-text"><?php esc_html_e( 'Toggle Mobile Menu', 'organic-agency' ); ?></span>
					<svg class="icon-menu-open" version="1.1" id="icon-open" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
						<rect y="2" width="24" height="2"/>
						<rect y="11" width="24" height="2"/>
						<rect y="20" width="24" height="2"/>
					</svg>
					<svg class="icon-menu-close" version="1.1" id="icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
						<rect x="0" y="11" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 12 28.9706)" width="24" height="2"/>
						<rect x="0" y="11" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 28.9706 12)" width="24" height="2"/>
					</svg>
				</a>

			<!-- END #nav-mobile-controls -->
			</div>

		<!-- END #nav-bar -->
		</div>

		<!-- BEGIN #navigation-mobile -->
		<nav id="navigation-mobile" class="navigation-main" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'organic-agency' ); ?>">

			<?php
			if ( has_nav_menu( 'mobile-menu' ) ) {
				wp_nav_menu( array(
					'theme_location'  => 'mobile-menu',
					'title_li'        => '',
					'depth'           => 4,
					'container_class' => 'menu-container',
					'menu_class'      => 'menu',
				) );
			}
			?>

		<!-- END #navigation-mobile -->
		</nav>

		<?php if ( has_custom_header() ) { ?>

			<?php if ( is_front_page() || is_home() || is_archive() || is_search() || is_attachment() ) { ?>

			<!-- BEGIN #custom-header -->
			<div id="custom-header">

				<!-- BEGIN #masthead -->
				<div id="masthead" class="banner-content">

					<?php if ( is_front_page() && ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) || is_front_page() && ! class_exists( 'Woocommerce' ) ) { ?>
						<?php $page_id = get_queried_object_id(); ?>
						<?php $excerpt = apply_filters( 'get_the_excerpt', get_post_field( 'post_excerpt', $page_id ) ); ?>
						<?php if ( '' !== get_post_field( 'post_excerpt', $page_id ) ) { ?>
							<div class="banner-text"><?php echo wp_kses_post( $excerpt ); ?></div>
						<?php } else { ?>
							<div class="banner-text">
								<h2 class="site-description">
									<?php echo wp_kses_post( html_entity_decode( get_bloginfo( 'description' ) ) ); ?>
								</h2>
							</div>
						<?php } ?>
					<?php } elseif ( class_exists( 'Woocommerce' ) && is_shop() ) { ?>
						<div class="banner-text">
							<h2 class="archive-title"><?php woocommerce_page_title(); ?></h2>
							<?php $page_id = get_option( 'woocommerce_shop_page_id' ); ?>
							<?php $excerpt = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $page_id ) ); ?>
							<?php if ( ! empty( $excerpt ) ) { ?>
								<div class="archive-description"><?php echo wp_kses_post( $excerpt ); ?></div>
							<?php } ?>
						</div>
					<?php } elseif ( class_exists( 'Woocommerce' ) && is_product_category() ) { ?>
						<div class="banner-text">
							<h2 class="archive-title"><?php single_term_title(); ?></h2>
							<div class="archive-description"><?php the_archive_description(); ?></div>
						</div>
					<?php } elseif ( is_archive() || is_category() || is_search() ) { ?>
						<div class="banner-text">
							<?php if ( is_author() ) { ?>
								<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 64 ); ?></div>
							<?php } ?>
							<h4 class="archive-title"><?php the_archive_title(); ?></h4>
							<?php if ( ! is_author() ) { ?>
								<div class="archive-description"><?php the_archive_description(); ?></div>
							<?php } ?>
						</div>
					<?php } else { ?>
						<?php $page_id = get_queried_object_id(); ?>
						<?php $excerpt = apply_filters( 'get_the_excerpt', get_post_field( 'post_excerpt', $page_id ) ); ?>
						<?php if ( '' !== get_post_field( 'post_excerpt', $page_id ) ) { ?>
							<div class="banner-text"><?php echo wp_kses_post( $excerpt ); ?></div>
						<?php } else { ?>
							<div class="banner-text">
								<p class="site-description"><?php echo wp_kses_post( html_entity_decode( get_bloginfo( 'description' ) ) ); ?></p>
							</div>
						<?php } ?>
					<?php } ?>

				<!-- END #masthead -->
				</div>

				<?php
				if ( class_exists( 'Woocommerce' ) ) {
					$thumbnail_id = get_woocommerce_term_meta( get_queried_object_id(), 'thumbnail_id', true );
					$cat_image    = wp_get_attachment_image_src( $thumbnail_id, 'organic-agency-featured-large' );
				}
				?>

				<?php if ( class_exists( 'Woocommerce' ) && is_product_category() && $cat_image ) { ?>

					<?php
					if ( $cat_image ) {
						echo '<div class="wp-custom-header woocommerce-category-header" style="background-image: url(' . esc_url( $cat_image[0] ) . ');"><img src="' . esc_url( $cat_image[0] ) . '" alt="' . esc_html__( 'Product Category Image', 'organic-agency' ) . '" /></div>';
					}
					?>

				<?php } else { ?>

					<?php the_custom_header_markup(); ?>

				<?php } ?>

			<!-- END #custom-header -->
			</div>

			<?php } ?>

		<?php } ?>

	<!-- END #header -->
	</header>

	<!-- BEGIN .site-main -->
	<main class="site-main container" role="main">

		<?php if ( is_active_sidebar( 'header-widgets' ) && ( class_exists( 'Organic_Widgets_Pro' ) || class_exists( 'Organic_Widgets' ) ) ) { ?>

		<!-- BEGIN .row -->
		<div class="row">

			<section class="organic-ocw-container">
				<?php dynamic_sidebar( 'header-widgets' ); ?>
			</section>

		<!-- END .row -->
		</div>

		<?php } ?>
