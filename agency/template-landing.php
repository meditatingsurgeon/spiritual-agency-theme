<?php
/**
Template Name: Landing Page
 *
 * This template is used to display a landing, or coming soon page.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'giving-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<section <?php post_class( 'landing-page' ); ?> id="page-<?php the_ID(); ?>" <?php if ( ! empty( $thumb ) ) { ?>
	style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);" <?php } ?>>

	<!-- BEGIN .absolute-center -->
	<div class="absolute-center">

		<!-- BEGIN .content -->
		<div class="content">

			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>

				<?php the_custom_logo(); ?>

			<?php } else { ?>

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</h1>

			<?php } ?>

			<h2 class="site-description">
				<?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?>
			</h2>

			<?php
			// The loop.
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

					<?php $has_content = get_the_content(); ?>

					<?php if ( '' != $has_content ) { ?>

					<!-- BEGIN .entry-content -->
					<div class="entry-content">

						<?php the_content( /* translators: 1: Permalink. */ sprintf( esc_html__( 'Continue reading%s', 'organic-agency' ), '<span class="screen-reader-text">  ' . get_the_title() . '</span>', false ) ); ?>

					<!-- END .entry-content -->
					</div>

					<?php } ?>

				<?php endwhile; ?>
			<?php endif; ?>

		<!-- END .content -->
		</div>

	<!-- END .absolute-center -->
	</div>

<!-- END .post class -->
</section>

<?php get_footer(); ?>
