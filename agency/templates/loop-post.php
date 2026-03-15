<?php
/**
 * This template displays the post loop.
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

		<?php if ( is_singular( 'jetpack-portfolio' ) || is_singular( 'jetpack-testimonial' ) || ! is_singular( 'jetpack-testimonial' ) && ! is_singular( 'jetpack-portfolio' ) && ! has_post_thumbnail() || '' === get_theme_mod( 'display_img_title_post', '1' ) ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php the_content( sprintf( /* translators: 1: Permalink. */ esc_html__( 'Continue reading%s', 'organic-agency' ), '<span class="screen-reader-text">  ' . get_the_title() . '</span>', false ) ); ?>

		<?php
		wp_link_pages(
			array(
				'before'           => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', 'organic-agency' ) . '</span>',
				'after'            => '</p>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
				'next_or_number'   => 'next_and_number',
				'nextpagelink'     => esc_html__( 'Next', 'organic-agency' ),
				'previouspagelink' => esc_html__( 'Previous', 'organic-agency' ),
				'pagelink'         => '%',
				'echo'             => 1,
			)
		);
		?>

		<?php edit_post_link( esc_html__( '(Edit)', 'organic-agency' ), '', '' ); ?>

		<?php if ( ! is_singular( 'jetpack-testimonial' ) ) { ?>

		<!-- BEGIN .author-info -->
		<div class="author-info">

			<div class="author-intro">
				<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 48 ); ?></div>
				<p class="posted-by"><em><?php esc_html_e( 'Posted by', 'organic-agency' ); ?></em></p>
				<h6 class="author-name"><?php the_author_posts_link(); ?></h6>
			</div>

			<?php $description = get_the_author_meta( 'description' ); ?>
			<?php if ( ! empty( $description ) ) : ?>
				<p class="author-description"><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>

		<!-- END .author-info -->
		</div>

		<!-- BEGIN .post-meta -->
		<div class="post-meta">

			<!-- BEGIN .post-navigation -->
			<div class="post-navigation">
				<div class="previous-post"><?php previous_post_link( '<i class="fa fa-angle-left"></i> %link', 'Previous Post', true ); ?></div>
				<div class="next-post"><?php next_post_link( '%link <i class="fa fa-angle-right"></i>', 'Next Post', true ); ?></div>
			<!-- END .post-navigation -->
			</div>

		<!-- END .post-meta -->
		</div>

	<?php } ?>

	<!-- END .entry-content -->
	</article>

		<?php if ( comments_open() || '0' !== get_comments_number() ) { ?>
			<?php comments_template(); ?>
		<?php } ?>

<?php endwhile; else : ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php get_template_part( 'templates/content', 'none' ); ?>

	<!-- END .entry-content -->
	</article>

<?php endif; ?>
