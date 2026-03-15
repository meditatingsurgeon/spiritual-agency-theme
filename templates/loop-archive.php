<?php
/**
 * This template displays the archive loop.
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
	<div <?php post_class( 'archive-holder' ); ?> id="post-<?php the_ID(); ?>">

		<!-- BEGIN .entry-header -->
		<div class="entry-header">

			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<!-- END .entry-header -->
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
			<a class="featured-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( /* translators: 1: Permalink. */ sprintf( esc_html__( 'Permalink to %s', 'organic-agency' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'organic-agency-featured-medium' ); ?></a>
		<?php } ?>

		<!-- BEGIN .entry-content -->
		<article class="entry-content">

			<?php the_excerpt(); ?>

		<!-- END .entry-content -->
		</article>

		<!-- BEGIN .post-meta -->
		<div class="post-meta">

			<div class="post-author">
				<p><i class="fa fa-pencil" aria-hidden="true"></i> <?php organic_agency_posted_on(); ?> <em><?php esc_html_e( 'by', 'organic-agency' ); ?></em> <?php esc_url( the_author_posts_link() ); ?></p>
			</div>

			<?php if ( comments_open() ) { ?>
				<div class="post-comment-link">
					<p><i class="fa fa-comments" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__( 'Leave a Comment', 'organic-agency' ), esc_html__( '1 Comment', 'organic-agency' ), '% Comments' ); ?></a></p>
				</div>
			<?php } ?>

			<?php edit_post_link( esc_html__( '(Edit)', 'organic-agency' ), '', '' ); ?>

		<!-- END .post-meta -->
		</div>

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
