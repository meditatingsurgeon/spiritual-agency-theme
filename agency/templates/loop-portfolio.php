<?php
/**
 * This template displays the portfolio loop.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<?php
// The loop.
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

	<!-- BEGIN .post class -->
	<div <?php post_class( 'portfolio-holder' ); ?> id="post-<?php the_ID(); ?>">

		<!-- BEGIN .entry-content -->
		<article class="entry-content">

			<?php if ( has_post_thumbnail() ) { ?>
				<a class="featured-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( /* translators: 1: Permalink. */ sprintf( esc_html__( 'Permalink to %s', 'organic-agency' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'organic-agency-featured-medium' ); ?></a>
			<?php } ?>

			<!-- BEGIN .information -->
			<div class="information">

				<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

				<?php if ( ! empty( $post->post_excerpt ) ) { ?>
					<?php the_excerpt(); ?>
				<?php } ?>

			<!-- END .information -->
			</div>

		<!-- END .entry-content -->
		</article>

	<!-- END .post class -->
	</div>

<?php endwhile; ?>

	<?php
		the_posts_pagination(
			array(
				'prev_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous Page', 'organic-agency' ) . ' </span>&laquo;',
				'next_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next Page', 'organic-agency' ) . ' </span>&raquo;',
			)
		);
	?>

<?php else : ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php get_template_part( 'templates/content', 'none' ); ?>

	<!-- END .entry-content -->
	</article>

<?php endif; ?>
