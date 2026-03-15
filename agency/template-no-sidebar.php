<?php
/**
Template Name: No Sidebar Or Title
 *
 * This template displays a page with no sidebar or title. Designed for blocks and builders.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php get_template_part( 'templates/banner', 'image' ); ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<section class="sixteen columns">

				<?php get_template_part( 'templates/loop', 'page' ); ?>

			<!-- END .sixteen columns -->
			</section>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
