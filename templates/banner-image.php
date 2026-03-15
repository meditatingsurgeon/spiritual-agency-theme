<?php
/**
 * This template is used to display the banner image on posts and pages.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<?php $thumb = ( '' !== get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'organic-agency-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() && ! ( is_front_page() && has_custom_header() ) ) { ?>

	<!-- BEGIN .banner -->
	<header class="banner" role="banner">

		<div class="banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">

			<?php if ( is_page() && '1' === get_theme_mod( 'display_img_title_page', '1' ) || is_single() && '1' === get_theme_mod( 'display_img_title_post', '1' ) ) { ?>

				<!-- BEGIN .banner-content -->
				<div class="banner-content">

					<!-- BEGIN .banner-text -->
					<div class="banner-text">

						<?php if ( ! empty( $post->post_excerpt ) ) { ?>

							<?php if ( is_single() ) { ?>

							<!-- BEGIN .post-meta -->
							<div class="post-meta">

								<?php $tag_list = get_the_tag_list( esc_html__( ', ', 'organic-agency' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
									<p><i class="fa fa-bars" aria-hidden="true"></i><?php esc_html_e( 'Category:', 'organic-agency' ); ?> <?php the_category( ', ' ); ?></p>
									<?php if ( ! empty( $tag_list ) ) { ?>
										<p><i class="fa fa-tags" aria-hidden="true"></i><?php esc_html_e( 'Tags:', 'organic-agency' ); ?> <?php the_tags( '' ); ?></p>
									<?php } ?>
								<?php } ?>

							<!-- END .post-meta -->
							</div>

							<h1><?php the_title(); ?></h1>

							<?php } ?>

							<?php echo wp_kses_post( $post->post_excerpt ); ?>

						<?php } else { ?>

							<?php if ( is_single() ) { ?>

							<!-- BEGIN .post-meta -->
							<div class="post-meta">

								<?php $tag_list = get_the_tag_list( esc_html__( ', ', 'organic-agency' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
									<p><i class="fa fa-bars" aria-hidden="true"></i><?php esc_html_e( 'Category:', 'organic-agency' ); ?> <?php the_category( ', ' ); ?></p>
									<?php if ( ! empty( $tag_list ) ) { ?>
										<p><i class="fa fa-tags" aria-hidden="true"></i><?php esc_html_e( 'Tags:', 'organic-agency' ); ?> <?php the_tags( '' ); ?></p>
									<?php } ?>
								<?php } ?>

							<!-- END .post-meta -->
							</div>

							<?php } ?>

							<h1><?php the_title(); ?></h1>

						<?php } ?>

					<!-- END .banner-text -->
					</div>

				<!-- END .banner-content -->
				</div>

			<?php } ?>

			<?php the_post_thumbnail( 'organic-agency-featured-large' ); ?>

		</div>

	<!-- END .banner -->
	</header>

<?php } ?>
