<?php
/**
 * This template displays single post content for the testimonial CPT.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'organic-agency-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'single-testimonial' ); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>

		<div class="feature-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">

			<?php the_post_thumbnail( 'organic-agency-featured-large' ); ?>

		</div>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<?php get_template_part( 'templates/loop', 'post' ); ?>

			<!-- END .sixteen columns -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
