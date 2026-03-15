<?php
/**
 * This template is used to display category post indexes.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

			<!-- BEGIN .eleven columns -->
			<section class="eleven columns">

				<!-- BEGIN #infinite-container -->
				<div id="infinite-container">

					<?php get_template_part( 'templates/loop', 'archive' ); ?>

				<!-- END #infinite-container -->
				</div>

			<!-- END .eleven columns -->
			</section>

			<!-- BEGIN .five columns -->
			<section class="five columns">

				<?php get_sidebar(); ?>

			<!-- END .five columns -->
			</section>

		<?php } else { ?>

			<!-- BEGIN .sixteen columns -->
			<section class="sixteen columns">

				<!-- BEGIN #infinite-container -->
				<div id="infinite-container">

					<?php get_template_part( 'templates/loop', 'archive' ); ?>

				<!-- END #infinite-container -->
				</div>

			<!-- END .sixteen columns -->
			</section>

		<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
