<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<!-- END .site-main -->
</main>

<!-- BEGIN .footer -->
<footer id="colophon" class="site-footer footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'footer' ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-widgets -->
			<div class="footer-widgets clearfix">

				<?php dynamic_sidebar( 'footer' ); ?>

			<!-- END .footer-widgets -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-information -->
			<div class="footer-information">

				<div class="align-left">

					<p class="footer-copyright"><?php esc_html_e( 'Copyright', 'organic-agency' ); ?> &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', 'organic-agency' ); ?> &middot; <?php esc_html( bloginfo( 'name' ) ); ?></p>

					<?php if ( '' !== get_theme_mod( 'organic_agency_footer_text', '' ) ) { ?>

						<p class="footer-credit"><?php echo wp_kses_post( get_theme_mod( 'organic_agency_footer_text' ) ); ?></p>

					<?php } else { ?>

						<p class="footer-credit"><?php /* translators: 1: Theme name. 2: Theme link. */ printf( esc_html__( 'Theme: %1$s by %2$s', 'organic-agency' ), 'Agency', '<a href="https://organicthemes.com/">Organic Themes</a>' ); ?></p>

					<?php } ?>

				</div>

				<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<nav class="align-right" role="navigation" aria-label="<?php esc_html_e( 'Social Navigation', 'organic-agency' ); ?>">

					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'social-menu',
							'title_li'        => '',
							'depth'           => 1,
							'container_class' => 'social-menu',
							'menu_class'      => 'social-icons',
							'link_before'     => '<span class="screen-reader-text" role="menuitem">',
							'link_after'      => '</span>',
						)
					);
					?>

				</nav>

				<?php } ?>

			<!-- END .footer-information -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</footer>

<!-- END #page -->
</div>

<?php wp_footer(); ?>

</body>
</html>
