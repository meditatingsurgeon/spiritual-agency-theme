<?php
/**
 * This template is used to display an archive of Jetpack portfolio posts.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'portfolio' ); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .flex-row -->
			<section class="flex-row">

				<?php get_template_part( 'templates/loop', 'portfolio' ); ?>

			<!-- END .flex-row -->
			</section>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
