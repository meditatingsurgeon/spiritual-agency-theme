<?php
/**
 * This file includes the theme functions.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_setup' ) ) {

	/** Function organic_agency_setup */
	function organic_agency_setup() {

		/**
		* Enable support for translation.
		*/
		load_theme_textdomain( 'organic-agency', get_template_directory() . '/languages' );

		/*
		* Enable support for RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Enable selective refresh for widgets.
		*/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Enable support for post thumbnails.
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'organic-agency-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'organic-agency-featured-medium', 1200, 800, true ); // Medium Featured Image.

		/*
		* Enable support for site title tag.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		/*
		* Enable support for responsive embed blocks.
		*/
		add_theme_support( 'responsive-embeds' );

		/*
		* Enable support for HTML5 output.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		* Enable support for custom logo.
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		* Enable support for custom menus.
		*/
		register_nav_menus(
			array(
				'left-menu'   => esc_html__( 'Left Menu', 'organic-agency' ),
				'right-menu'  => esc_html__( 'Right Menu', 'organic-agency' ),
				'mobile-menu' => esc_html__( 'Mobile Menu', 'organic-agency' ),
				'social-menu' => esc_html__( 'Social Menu', 'organic-agency' ),
			)
		);

		/*
		* Enable support for custom header.
		*/
		register_default_headers(
			array(
				'default' => array(
					'url'           => get_template_directory_uri() . '/images/default-header.jpg',
					'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
					'description'   => esc_html__( 'Default Custom Header', 'organic-agency' ),
				),
			)
		);
		$defaults = array(
			'video'         => true,
			'width'         => 1800,
			'height'        => 480,
			'flex-height'   => true,
			'flex-width'    => true,
			'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'   => false,
			'uploads'       => true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color' => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

	}
} // End function organic_agency_setup.
add_action( 'after_setup_theme', 'organic_agency_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Add Vimeo Option To Custom Header Videos
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_enqueue_vimeo_handler' ) ) {

	/**
	 * Enqueue Vimeo script.
	 */
	function organic_agency_enqueue_vimeo_handler() {
		if ( wp_script_is( 'wp-custom-header' ) ) {
			wp_enqueue_script(
				'wp-custom-header-vimeo',
				get_template_directory_uri() . '/assets/js/custom-header-vimeo.js',
				array( 'wp-custom-header' ),
				'1.0',
				true
			);
		}
	}
}
add_action( 'wp_footer', 'organic_agency_enqueue_vimeo_handler' );

if ( ! function_exists( 'organic_agency_header_video_settings' ) ) {

	/**
	 * Function organic_agency_header_video_settings
	 *
	 * @param array $settings Get video URL.
	 */
	function organic_agency_header_video_settings( $settings ) {
		if ( preg_match( '#^https?://(.+\.)?vimeo\.com/.*#', $settings['videoUrl'] ) ) {
			$settings['mimeType'] = 'video/x-vimeo';
		}
		return $settings;
	}
}
add_filter( 'header_video_settings', 'organic_agency_header_video_settings' );

if ( ! function_exists( 'organic_agency_filter_external_header_video_setting_validity' ) ) {

	/**
	 * Function organic_agency_filter_external_header_video_setting_validity
	 *
	 * @param array $validity Check video URL validity.
	 * @param array $value Entered Vimeo URL value.
	 */
	function organic_agency_filter_external_header_video_setting_validity( $validity, $value ) {
		if ( preg_match( '#^https?://(.+\.)?vimeo\.com/.*#', $value ) ) {
			return true;
		}
		return $validity;
	}
}
add_filter( 'customize_validate_external_header_video', 'organic_agency_filter_external_header_video_setting_validity', 11, 2 );

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_enqueue_scripts' ) ) {

	/** Function organic_agency_enqueue_scripts */
	function organic_agency_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'organic-agency-style', get_stylesheet_uri(), '', '1.0' );
		wp_enqueue_style( 'organic-agency-style-conditionals', get_template_directory_uri() . '/assets/css/style-conditionals.css', array( 'organic-agency-style' ), '1.0' );
		wp_enqueue_style( 'organic-agency-style-mobile', get_template_directory_uri() . '/assets/css/style-mobile.css', array( 'organic-agency-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array( 'organic-agency-style' ), '1.0' );

		// Resgister Scripts.
		wp_register_script( 'jquery-sidr', get_template_directory_uri() . '/assets/js/jquery.sidr.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-bg-brightness', get_template_directory_uri() . '/assets/js/jquery.bgBrightness.js', array( 'jquery' ), '1.0', true );

		// Enqueue Scripts.
		wp_enqueue_script( 'organic-agency-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array( 'jquery', 'jquery-bg-brightness', 'jquery-sidr', 'jquery-fitvids' ), '1.0', true );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'organic_agency_enqueue_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_gutenberg_styles' ) ) {

	/**
	 * Enqueue WordPress theme styles within Gutenberg.
	 */
	function organic_agency_gutenberg_styles() {
		// Load the theme styles within Gutenberg.
		wp_enqueue_style(
			'organic-agency-gutenberg',
			get_theme_file_uri( '/assets/css/gutenberg.css' ),
			false,
			'1.0',
			'all'
		);
		if ( class_exists( 'Woocommerce' ) ) {
			wp_enqueue_style(
				'organic-agency-editor-woocommerce',
				get_theme_file_uri( '/plugins/woocommerce/woocommerce.css' ),
				false,
				'1.0',
				'all'
			);
		}
	}
}
add_action( 'enqueue_block_editor_assets', 'organic_agency_gutenberg_styles', 10 );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_cat_id_to_name' ) ) {

	/**
	 * Changes category IDs to names.
	 *
	 * @param array $id IDs for categories.
	 * @return array
	 */
	function organic_agency_cat_id_to_name( $id ) {
		$cat = get_category( $id );
		if ( is_wp_error( $cat ) ) {
			return false; }
		return $cat->cat_name;
	}
}

/*
-------------------------------------------------------------------------------------------------------
	Search Filter
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_search_filter' ) ) {

	/**
	 * Filters search results for post types.
	 *
	 * @param array $query The search query.
	 * @return array
	 */
	function organic_agency_search_filter( $query ) {
		if ( isset( $_GET['post_type'] ) && wp_verify_nonce( sanitize_key( $_GET['post_type'] ) ) ) {
			$post_type = wp_unslash( sanitize_key( $_GET['post_type'] ) );
			if ( ! $post_type ) {
				$post_type = 'any';
			}
			if ( $query->is_search ) {
				$query->set( 'post_type', $post_type );
			};
		}
		return $query;
	}
}
add_filter( 'pre_get_posts', 'organic_agency_search_filter' );

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_widgets_init' ) ) {

	/** Function organic_agency_widgets_init */
	function organic_agency_widgets_init() {
		if ( class_exists( 'Organic_Widgets_Pro' ) || class_exists( 'Organic_Widgets' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Organic Header Widgets', 'organic-agency' ),
					'id'            => 'header-widgets',
					'before_widget' => '<div id="%1$s" class="organic-widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
		if ( class_exists( 'bbPress' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Forums Sidebar', 'organic-agency' ),
					'id'            => 'sidebar-forum',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'organic-agency' ),
				'id'            => 'sidebar-1',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widgets', 'organic-agency' ),
				'id'            => 'footer',
				'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="footer-widget">',
				'after_widget'  => '</div></aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'organic_agency_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_posted_on' ) ) {

	/** Function organic_agency_posted_on */
	function organic_agency_posted_on() {
		?>
			<span class="meta-prep meta-prep-author">
				<?php esc_html_e( 'Posted:', 'organic-agency' ); ?>
			</span>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_time() ); ?>">
				<span class="entry-date">
					<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ); ?>
				</span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'organic_agency_updated_on' ) ) {

	/** Function organic_agency_updated_on */
	function organic_agency_updated_on() {
		?>
			<span class="meta-prep meta-prep-author">
				<?php esc_html_e( 'Updated:', 'organic-agency' ); ?>
			</span>
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_modified_time() ); ?>">
				<span class="entry-date">
					<?php echo esc_attr( get_the_modified_date() ); ?>
				</span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'organic_agency_posted_on_no_link' ) ) {

	/** Function organic_agency_posted_on_no_link */
	function organic_agency_posted_on_no_link() {
		?>
			<span class="meta-prep meta-prep-author">
				<?php esc_html_e( 'Posted:', 'organic-agency' ); ?>
			</span>
			<span class="entry-date">
				<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ); ?>
			</span>
		<?php
	}
}

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) {
	$content_width = 760;
}

if ( ! function_exists( 'organic_agency_content_width' ) ) {

	/** Function organic_agency_content_width */
	function organic_agency_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'organic_agency_content_width', 760 );
	}
}
add_action( 'after_setup_theme', 'organic_agency_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_comment' ) ) {

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function organic_agency_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
			<p><?php esc_html_e( 'Pingback:', 'organic-agency' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'organic-agency' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default:
				?>
			<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

				<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?php
								$avatar_size = 48;
							if ( '0' !== $comment->comment_parent ) {
								$avatar_size = 48; }

								echo get_avatar( $comment, $avatar_size );

								printf(
									/* translators: 1: comment author, 2: date and time */
									esc_html__( '%1$s %2$s', 'organic-agency' ),
									sprintf( '<span class="comment-name">%s</span><br />', wp_kses_post( get_comment_author_link() ) ),
									sprintf(
										'<a class="comment-time" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a><br />',
										esc_url( get_comment_link( $comment->comment_ID ) ),
										esc_html( get_comment_time( 'c' ) ),
										/* translators: 1: date, 2: time */
										sprintf( esc_html__( '%1$s, %2$s', 'organic-agency' ), esc_html( get_comment_date() ), esc_html( get_comment_time() ) )
									)
								);
							?>
						</div><!-- END .comment-author .vcard -->
					</footer>

					<div class="comment-content">
						<?php if ( '0' === $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'organic-agency' ); ?></em>
						<br />
					<?php endif; ?>
						<?php comment_text(); ?>
						<div class="reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'organic-agency' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
								)
							)
						);
						?>
						</div><!-- .reply -->
						<?php edit_comment_link( esc_html__( 'Edit', 'organic-agency' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

				</article><!-- #comment-## -->

				<?php
		endswitch;
	}
} // Ends check for organic_agency_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_excerpt_more' ) ) {

	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
	 * a 'Continue reading' link.
	 *
	 * @since Organic Agency 1.0
	 * @param string $link Exacerpt permalink to post.
	 * @return string 'Continue reading' link prepended with an ellipsis.
	 */
	function organic_agency_excerpt_more( $link ) {
		if ( is_admin() ) {
			return $link;
		}

		$link = sprintf(
			'<div class="more-link-wrapper"><a href="%1$s" class="more-link">%2$s</a></div>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'organic-agency' ), get_the_title( get_the_ID() ) )
		);
		return ' &hellip; ' . $link;
	}
}
add_filter( 'excerpt_more', 'organic_agency_excerpt_more' );

if ( ! function_exists( 'organic_agency_add_more_link_class' ) ) {

	/**
	 * Creates a custom 'Read More' link by prepending and appending columns on either
	 * side of the anchor to create a divider between the next post.
	 *
	 * @param string $link The anchor for rendering the more tag.
	 * @param string $text The text for the more tag.
	 */
	function organic_agency_add_more_link_class( $link, $text ) {
		$html      = '<div class="more-link-wrapper">';
			$html .= $link;
		$html     .= '</div>';
		return $html;
	} // End organic_agency_add_more_link_class.
}
add_action( 'the_content_more_link', 'organic_agency_add_more_link_class', 10, 2 );

/*
-------------------------------------------------------------------------------------------------------
	Add Excerpt To Pages
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_page_excerpts' ) ) {

	/**
	 * Add excerpt to pages.
	 */
	function organic_agency_page_excerpts() {
		add_post_type_support( 'page', 'excerpt' );
	}
}
add_action( 'init', 'organic_agency_page_excerpts' );

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_wp_link_pages_args_prevnext_add' ) ) {

	/**
	 * Adds custom page links to pages.
	 *
	 * @param array $args for page links.
	 * @return array
	 */
	function organic_agency_wp_link_pages_args_prevnext_add( $args ) {
		global $page, $numpages, $more, $pagenow;

		if ( 'next_and_number' !== $args['next_or_number'] ) {
			return $args; }

		$args['next_or_number'] = 'number'; // Keep numbering for the main part.
		if ( ! $more ) {
			return $args; }

		if ( $page - 1 ) { // There is a previous page.
			$args['before'] .= _wp_link_page( $page - 1 )
				. $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>'; }

		if ( $page < $numpages ) { // There is a next page.
			$args['after'] = _wp_link_page( $page + 1 )
				. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
				. $args['after']; }

		return $args;
	}
}
add_filter( 'wp_link_pages_args', 'organic_agency_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_remove_gallery' ) ) {

	/**
	 * Removes first gallery shortcode from slideshow page template.
	 *
	 * @param array $content Content output on slideshow page template.
	 * @return array
	 */
	function organic_agency_remove_gallery( $content ) {
		if ( is_page_template( 'template-slideshow.php' ) ) {
			$regex   = get_shortcode_regex( array( 'gallery' ) );
			$content = preg_replace( '/' . $regex . '/s', '', $content, 1 );
			$content = wp_kses_post( $content );
		}
		return $content;
	}
}
add_filter( 'the_content', 'organic_agency_remove_gallery' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_body_class' ) ) {

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function organic_agency_body_class( $classes ) {

		$header_image = get_header_image();
		$post_pages   = is_home() || is_archive() || is_search() || is_attachment();

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$classes[] = 'agency-has-logo'; }

		if ( is_page_template( 'template-landing.php' ) ) {
			$classes[] = 'agency-landing-page'; }

		if ( is_page_template( 'template-slideshow.php' ) ) {
			$classes[] = 'agency-slideshow'; }

		if ( 'blank' !== get_theme_mod( 'organic_agency_site_tagline' ) ) {
			$classes[] = 'agency-desc-active';
		} else {
			$classes[] = 'agency-desc-inactive';
		}

		if ( ! has_nav_menu( 'social-menu' ) ) {
			$classes[] = 'agency-no-social-menu'; }

		if ( is_singular() && ! has_post_thumbnail() ) {
			$classes[] = 'agency-no-img'; }

		if ( is_singular() && has_post_thumbnail() && ! ( class_exists( 'Woocommerce' ) && is_woocommerce() ) ) {
			$classes[] = 'agency-has-img'; }

		if ( $post_pages && ! empty( $header_image ) || is_front_page() && ! empty( $header_image ) ) {
			$classes[] = 'agency-header-active';
		} else {
			$classes[] = 'agency-header-inactive';
		}

		if ( is_header_video_active() && has_header_video() ) {
			$classes[] = 'agency-header-video-active';
		} else {
			$classes[] = 'agency-header-video-inactive';
		}

		if ( is_singular() ) {
			$classes[] = 'agency-singular';
		}

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'agency-sidebar-1';
		}

		if ( class_exists( 'bbPress' ) && is_bbPress() && is_active_sidebar( 'sidebar-forum' ) || is_active_sidebar( 'sidebar-1' ) && ! class_exists( 'Woocommerce' ) && ! ( is_page_template( 'template-no-sidebar.php' ) || is_page_template( 'template-full.php' ) ) || is_active_sidebar( 'sidebar-1' ) && ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) && ! ( is_page_template( 'template-no-sidebar.php' ) || is_page_template( 'template-full.php' ) ) || class_exists( 'Woocommerce' ) && is_shop() && is_active_sidebar( 'shop-sidebar' ) ) {
			$classes[] = 'agency-sidebar-active';
		} else {
			$classes[] = 'agency-sidebar-inactive';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
			$classes[] = 'h-feed';
		} else {
			if ( 'page' !== get_post_type() ) {
					$classes[] = 'hentry';
					$classes[] = 'h-entry';
			}
		}

		if ( '' !== get_theme_mod( 'background_image' ) ) {
			// This class will render when a background image is set
			// regardless of whether the user has set a color as well.
			$classes[] = 'agency-background-image';
		} elseif ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
			// This class will render when a background color is set
			// but no image is set. In the case the content text will
			// Adjust relative to the background color.
			$classes[] = 'agency-relative-text';
		}

		return $classes;
	}
}
add_action( 'body_class', 'organic_agency_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Post Class
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'organic_agency_post_classes' ) ) {

	/**
	 * Adds custom classes to the array of post classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function post_classes( $classes ) {
		$classes = array_diff( $classes, array( 'hentry' ) );
		if ( ! is_singular() ) {
			if ( 'page' !== get_post_type() ) {
				// Adds a class for microformats v2.
				$classes[] = 'h-entry';
				// Add hentry to the same tag as h-entry.
				$classes[] = 'hentry';
			}
		}
		return $classes;
	}
}
add_filter( 'post_class', 'post_classes' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once get_template_directory() . '/customizer/customizer.php';
require_once get_template_directory() . '/includes/style-options.php';
require_once get_template_directory() . '/includes/typefaces.php';
require_once get_template_directory() . '/includes/class-aria-walker-nav-menu.php';
require_once get_template_directory() . '/includes/persist-admin-notices-dismissal/class-organic-pand.php';

/*
-------------------------------------------------------------------------------------------------------
	Load Demo Import File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_template_directory() . '/includes/class-organic-demo-setup.php';
	require get_template_directory() . '/includes/demo-import-notice.php';
	// Disable generation of small images on import.
	add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
}

/*
-------------------------------------------------------------------------------------------------------
	Load Jetpack File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/plugins/jetpack/jetpack-setup.php';
}

/*
-------------------------------------------------------------------------------------------------------
	Load WooCommerce File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Woocommerce' ) ) {
	require get_template_directory() . '/plugins/woocommerce/woocommerce-setup.php';
}
