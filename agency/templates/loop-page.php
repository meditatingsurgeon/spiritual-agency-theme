<?php
/**
 * This template displays the page loop.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<?php $front_page = is_front_page(); ?>

<?php
// The loop.
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<?php if ( ! $front_page && ! has_post_thumbnail() && ! is_page_template( 'template-no-sidebar.php' ) || $front_page && ! has_post_thumbnail() && ! has_custom_header() && ! is_page_template( 'template-no-sidebar.php' ) || '' === get_theme_mod( 'display_img_title_page', '1' ) ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php the_content( /* translators: 1: Permalink. */ sprintf( esc_html__( 'Continue reading%s', 'organic-agency' ), '<span class="screen-reader-text">  ' . get_the_title() . '</span>', false ) ); ?>

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
