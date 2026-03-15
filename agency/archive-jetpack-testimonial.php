<?php
/**
 * This template is used to display an archive of Jetpack testimonial posts.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'testimonial' ); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">

				<?php get_template_part( 'templates/loop', 'testimonial' ); ?>

			<!-- END .sixteen columns -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
