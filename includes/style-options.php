<?php
/**
 * This template is used to manage style options.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

if ( ! function_exists( 'organic_agency_custom_styles' ) ) {

	/**
	 * Changes styles upon user defined options.
	 */
	function organic_agency_custom_styles() {

		$header_image             = get_header_image();
		$background_color         = get_theme_mod( 'background_color' );
		$display_title            = get_theme_mod( 'organic_agency_site_title', '1' );
		$display_tagline          = get_theme_mod( 'organic_agency_site_tagline', '1' );
		$content_bg               = get_theme_mod( 'organic_agency_colors_content', '#ffffff' );
		$nav_bg                   = get_theme_mod( 'organic_agency_colors_nav', '#ffffff' );
		$footer_bg                = get_theme_mod( 'organic_agency_colors_footer', '#1b2a35' );
		$link_color               = get_theme_mod( 'organic_agency_colors_links', '#ab1c3d' );
		$link_hover_color         = get_theme_mod( 'organic_agency_colors_links_hover', '#ff3b67' );
		$heading_link_color       = get_theme_mod( 'organic_agency_colors_heading_links', '#000000' );
		$heading_link_hover_color = get_theme_mod( 'organic_agency_colors_heading_links_hover', '#ff3b67' );
		$button_color             = get_theme_mod( 'organic_agency_colors_button', '#ab1c3d' );
		$button_hover_color       = get_theme_mod( 'organic_agency_colors_button_hover', '#ff3b67' );
		$font_pairing             = get_theme_mod( 'organic_agency_fonts', 'bebas_neue_roboto' );
		$nav_font                 = get_theme_mod( 'organic_agency_nav_font', 'bebas_neue' );
		$title_font               = get_theme_mod( 'organic_agency_title_font', 'anton' );
		$title_font_weight        = get_theme_mod( 'organic_agency_title_font_weight', 'normal' );
		?>

		<?php if ( ! empty( $header_image ) ) { ?>
			<?php
			$custom_header_image =
			'.wp-custom-header {
				background-image: url("' . $header_image . '");
			}
			@media screen and (max-width: 767px) {
				body.agency-header-video-active .wp-custom-header {
					background-image: url("' . $header_image . '");
				}
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_header_image ); ?>
		<?php } ?>

		<?php if ( '1' !== $display_title ) { ?>
			<?php
			$custom_display_title =
			'.site-title {
				position: absolute;
				top: 0; left: 0;
				text-indent: -9999px;
				margin: 0px;
				padding: 0px;
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_display_title ); ?>
		<?php } ?>

		<?php if ( '1' !== $display_tagline ) { ?>
			<?php
			$custom_display_tagline =
			'.site-description {
				position: absolute;
				left: -9999px;
				margin: 0px;
				padding: 0px;
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_display_tagline ); ?>
		<?php } ?>

		<?php if ( $content_bg ) { ?>
			<?php
			$custom_content_bg =
			'.site-main, .site-main .content, .banner::before, .banner::after,
			#custom-header::before, #custom-header::after {
				background-color: ' . esc_html( $content_bg ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_content_bg ); ?>
		<?php } ?>

		<?php if ( $nav_bg ) { ?>
			<?php
			$custom_nav_bg =
			'#nav-bar, .menu ul.sub-menu, .menu ul.children, .agency-header-inactive #header, .agency-no-img #header {
				background-color: ' . esc_html( $nav_bg ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_nav_bg ); ?>
		<?php } ?>

		<?php if ( $footer_bg ) { ?>
			<?php
			$custom_footer_bg =
			'.footer, .footer::after, .footer::before {
				background-color: ' . esc_html( $footer_bg ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_footer_bg ); ?>
		<?php } ?>

		<?php if ( $link_color ) { ?>
			<?php
			$custom_link_color =
			'a, .banner-content h1 a, .banner-content h2 a, .banner-content h3 a, .widget ul.menu li a, .widget ul.menu li ul.sub-menu li a {
				color: ' . esc_html( $link_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_link_color ); ?>
		<?php } ?>

		<?php if ( $link_hover_color ) { ?>
			<?php
			$custom_link_hover_color =
			'a:hover, .banner-content h1 a:hover, .banner-content h2 a:hover, .banner-content h3 a:hover,
			.widget ul.menu li a:hover, .widget ul.menu li ul.sub-menu li a:hover,
			.widget ul.menu .current_page_item a, .widget ul.menu .current-menu-item a {
				color: ' . esc_html( $link_hover_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_link_hover_color ); ?>
		<?php } ?>

		<?php if ( $heading_link_color ) { ?>
			<?php
			$custom_heading_link_color =
			'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
				color: ' . esc_html( $heading_link_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_heading_link_color ); ?>
		<?php } ?>

		<?php if ( $heading_link_hover_color ) { ?>
			<?php
			$custom_heading_link_hover_color =
			'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover{
				color: ' . esc_html( $heading_link_hover_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_heading_link_hover_color ); ?>
		<?php } ?>

		<?php if ( $button_color ) { ?>
			<?php
			$custom_button_color =
			'button, .button, a.button, #comments .reply a, .wp-block-button a,
			#searchsubmit, #prevLink a, #prevLink a:link, #prevLink a:visited, #nextLink a,
			#submit, input[type=submit], input#submit, input.button, #infinite-handle span button,
			.sidr-class-site-header-cart a.sidr-class-button {
				background-color: ' . esc_html( $button_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_button_color ); ?>
		<?php } ?>

		<?php if ( $button_hover_color ) { ?>
			<?php
			$custom_button_hover_color =
			'button:hover, .button:hover, a.button:hover, #comments .reply a:hover, .wp-block-button a:hover,
			#searchsubmit:hover, #prevLink a:hover, #nextLink a:hover, input[type=submit]:hover,
			#submit:hover, input#submit:hover, input.button:hover, #infinite-handle span button:hover,
			.sidr-class-site-header-cart a.sidr-class-button:hover, .menu li li a:focus, .menu li li a:hover,
			.menu li li a:active {
				background-color: ' . esc_html( $button_hover_color ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_button_hover_color ); ?>
		<?php } ?>

		<?php
		$fonts = array(
			0 => array(),
			1 => array(),
			2 => array(),
			3 => array(),
		);
		switch ( $font_pairing ) {
			case 'helvetica_neue_double':
				$fonts[0]['font'] = "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";
				$fonts[1]['font'] = "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";
				break;
			case 'bebas_neue_roboto':
				$fonts[0]['font'] = "font-family: 'Bebas Neue', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'dm_serif_libre_franklin':
				$fonts[0]['font'] = "font-family: 'DM Serif Text', serif;";
				$fonts[1]['font'] = "font-family: 'Libre Franklin', sans-serif;";
				break;
			case 'quicksand_roboto':
				$fonts[0]['font'] = "font-family: 'Quicksand', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'oswald_droid_serif':
				$fonts[0]['font'] = "font-family: 'Oswald', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Droid Serif', serif;";
				break;
			case 'montserrat_merriweather':
				$fonts[0]['font'] = "font-family: 'Montserrat', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'raleway_roboto_slab':
				$fonts[0]['font'] = "font-family: 'Roboto Slab', serif;";
				$fonts[1]['font'] = "font-family: 'Raleway', sans-serif;";
				break;
			case 'playfair_display_source_sans_pro':
				$fonts[0]['font'] = "font-family: 'Playfair Display', serif;";
				$fonts[1]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
				break;
			case 'quicksand_lora':
				$fonts[0]['font'] = "font-family: 'Quicksand', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Lora', serif;";
				break;
			case 'cinzel_roboto':
				$fonts[0]['font'] = "font-family: 'Cinzel', serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'merriweather_encode_sans':
				$fonts[0]['font'] = "font-family: 'Merriweather', serif;";
				$fonts[1]['font'] = "font-family: 'Encode Sans', sans-serif;";
				break;
			case 'lato_merriweather':
				$fonts[0]['font'] = "font-family: 'Lato', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'roboto_merriweather':
				$fonts[0]['font'] = "font-family: 'Roboto', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'roboto_condensed_roboto':
				$fonts[0]['font'] = "font-family: 'Roboto Condensed', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'raleway_open_sans':
				$fonts[0]['font'] = "font-family: 'Raleway', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Open Sans', sans-serif;";
				break;
			case 'abril_poppins':
				$fonts[0]['font'] = "font-family: 'Abril Fatface', serif;";
				$fonts[1]['font'] = "font-family: 'Poppins', sans-serif;";
				break;
			case 'oxygen_noto_serif':
				$fonts[0]['font'] = "font-family: 'Oxygen', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Noto Serif', serif;";
				break;
			case 'aleo_muli':
				$fonts[0]['font'] = "font-family: 'Aleo', serif;";
				$fonts[1]['font'] = "font-family: 'Muli', sans-serif;";
				break;
			default:
				$fonts[0]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				$fonts[1]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				break;
		}

		switch ( $title_font ) {
			case 'anton':
				$fonts[2]['font'] = "font-family: 'Anton', sans-serif;";
				break;
			case 'bebas_neue':
				$fonts[2]['font'] = "font-family: 'Bebas Neue', sans-serif;";
				break;
			case 'dm_serif':
				$fonts[2]['font'] = "font-family: 'DM Serif Text', serif;";
				break;
			case 'rochester':
				$fonts[2]['font'] = "font-family: 'Rochester', cursive;";
				break;
			case 'staatliches':
				$fonts[2]['font'] = "font-family: 'Staatliches', sans-serif;";
				break;
			case 'overlock':
				$fonts[2]['font'] = "font-family: 'Overlock', sans-serif;";
				break;
			case 'noto_serif':
				$fonts[2]['font'] = "font-family: 'Noto Serif', serif;";
				break;
			case 'poppins':
				$fonts[2]['font'] = "font-family: 'Poppins', sans-serif;";
				break;
			case 'muli':
				$fonts[2]['font'] = "font-family: 'Muli', sans-serif;";
				break;
			case 'oxygen':
				$fonts[2]['font'] = "font-family: 'Oxygen', sans-serif;";
				break;
			case 'pt_sans':
				$fonts[2]['font'] = "font-family: 'PT Sans', sans-serif;";
				break;
			case 'libre_franklin':
				$fonts[2]['font'] = "font-family: 'Libre Franklin', sans-serif;";
				break;
			case 'lato':
				$fonts[2]['font'] = "font-family: 'Lato', sans-serif;";
				break;
			case 'oswald':
				$fonts[2]['font'] = "font-family: 'Oswald', sans-serif;";
				break;
			case 'droid_serif':
				$fonts[2]['font'] = "font-family: 'Droid Serif', serif;";
				break;
			case 'montserrat':
				$fonts[2]['font'] = "font-family: 'Montserrat', sans-serif;";
				break;
			case 'merriweather':
				$fonts[2]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'raleway':
				$fonts[2]['font'] = "font-family: 'Raleway', sans-serif;";
				break;
			case 'roboto':
				$fonts[2]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'roboto_condensed':
				$fonts[2]['font'] = "font-family: 'Roboto Condensed', sans-serif;";
				break;
			case 'roboto_slab':
				$fonts[2]['font'] = "font-family: 'Roboto Slab', serif;";
				break;
			case 'playfair_display':
				$fonts[2]['font'] = "font-family: 'Playfair Display', serif;";
				break;
			case 'source_sans_pro':
				$fonts[2]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
				break;
			case 'quicksand':
				$fonts[2]['font'] = "font-family: 'Quicksand', sans-serif;";
				break;
			case 'lora':
				$fonts[2]['font'] = "font-family: 'Lora', serif;";
				break;
			case 'helvetica_neue':
				$fonts[2]['font'] = "font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;";
				break;
			case 'encode_sans':
				$fonts[2]['font'] = "font-family: 'Encode Sans', sans-serif;";
				break;
			case 'lily_script':
				$fonts[2]['font'] = "font-family: 'Lily Script One', serif;";
				break;
			case 'cinzel':
				$fonts[2]['font'] = "font-family: 'Cinzel', serif;";
				break;
			case 'shrikhand':
				$fonts[2]['font'] = "font-family: 'Shrikhand', serif;";
				break;
			case 'amatic_sc':
				$fonts[2]['font'] = "font-family: 'Amatic SC', sans-serif;";
				break;
			case 'berkshire_swash':
				$fonts[2]['font'] = "font-family: 'Berkshire Swash', serif;";
				break;
			case 'abril_fatface':
				$fonts[2]['font'] = "font-family: 'Abril Fatface', serif;";
				break;
			case 'patua_one':
				$fonts[2]['font'] = "font-family: 'Patua One', serif;";
				break;
			case 'monoton':
				$fonts[2]['font'] = "font-family: 'Monoton', sans-serif;";
				break;
			default:
				$fonts[2]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				break;
		}

		switch ( $nav_font ) {
			case 'bebas_neue':
				$fonts[3]['font'] = "font-family: 'Bebas Neue', sans-serif;";
				break;
			case 'noto_serif':
				$fonts[3]['font'] = "font-family: 'Noto Serif', serif;";
				break;
			case 'poppins':
				$fonts[3]['font'] = "font-family: 'Poppins', sans-serif;";
				break;
			case 'muli':
				$fonts[3]['font'] = "font-family: 'Muli', sans-serif;";
				break;
			case 'oxygen':
				$fonts[3]['font'] = "font-family: 'Oxygen', sans-serif;";
				break;
			case 'pt_sans':
				$fonts[3]['font'] = "font-family: 'PT Sans', sans-serif;";
				break;
			case 'libre_franklin':
				$fonts[3]['font'] = "font-family: 'Libre Franklin', sans-serif;";
				break;
			case 'lato':
				$fonts[3]['font'] = "font-family: 'Lato', sans-serif;";
				break;
			case 'oswald':
				$fonts[3]['font'] = "font-family: 'Oswald', sans-serif;";
				break;
			case 'droid_serif':
				$fonts[3]['font'] = "font-family: 'Droid Serif', serif;";
				break;
			case 'montserrat':
				$fonts[3]['font'] = "font-family: 'Montserrat', sans-serif;";
				break;
			case 'merriweather':
				$fonts[3]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'raleway':
				$fonts[3]['font'] = "font-family: 'Raleway', sans-serif;";
				break;
			case 'roboto':
				$fonts[3]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'roboto_condensed':
				$fonts[3]['font'] = "font-family: 'Roboto Condensed', sans-serif;";
				break;
			case 'roboto_slab':
				$fonts[3]['font'] = "font-family: 'Roboto Slab', serif;";
				break;
			case 'playfair_display':
				$fonts[3]['font'] = "font-family: 'Playfair Display', serif;";
				break;
			case 'source_sans_pro':
				$fonts[3]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
				break;
			case 'quicksand':
				$fonts[3]['font'] = "font-family: 'Quicksand', sans-serif;";
				break;
			case 'lora':
				$fonts[3]['font'] = "font-family: 'Lora', serif;";
				break;
			case 'helvetica_neue':
				$fonts[3]['font'] = "font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;";
				break;
			case 'encode_sans':
				$fonts[3]['font'] = "font-family: 'Encode Sans', sans-serif;";
				break;
			case 'cinzel':
				$fonts[3]['font'] = "font-family: 'Cinzel', serif;";
				break;
			case 'shrikhand':
				$fonts[3]['font'] = "font-family: 'Shrikhand', serif;";
				break;
			case 'amatic_sc':
				$fonts[3]['font'] = "font-family: 'Amatic SC', sans-serif;";
				break;
			case 'berkshire_swash':
				$fonts[3]['font'] = "font-family: 'Berkshire Swash', serif;";
				break;
			case 'abril_fatface':
				$fonts[3]['font'] = "font-family: 'Abril Fatface', serif;";
				break;
			case 'patua_one':
				$fonts[3]['font'] = "font-family: 'Patua One', serif;";
				break;
			default:
				$fonts[3]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				break;
		}
		?>

		<?php if ( $fonts[0]['font'] ) { ?>
			<?php
			$custom_heading_font =
			'h1, h2, h3, h4, h5, h6, .site-description, .wc-block-grid__product-title {
				' . $fonts[0]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_heading_font ); ?>
		<?php } ?>

		<?php if ( $fonts[1]['font'] ) { ?>
			<?php
			$custom_body_font =
			'body, table, form, input, texarea, label {
				' . $fonts[1]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_body_font ); ?>
		<?php } ?>

		<?php if ( $fonts[3]['font'] ) { ?>
			<?php
			$custom_nav_font =
			'#navigation-left, #navigation-right, button, .button, .wp-block-button a, #comments .reply a, input[type=submit],
			.previous-post a, .next-post a, .sidr li a, #infinite-handle span button, #infinite-handle span button:hover {
				' . $fonts[3]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_nav_font ); ?>
		<?php } ?>

		<?php if ( $fonts[2]['font'] ) { ?>
			<?php
			$custom_title_font =
			'.site-title {
				' . $fonts[2]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_title_font ); ?>
		<?php } ?>

		<?php if ( $title_font_weight ) { ?>
			<?php
			$custom_title_font_weight =
			'.site-title {
				font-weight: ' . esc_html( $title_font_weight ) . ';
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-style', $custom_title_font_weight ); ?>
		<?php } ?>

		<?php
	}
}
add_action( 'wp_enqueue_scripts', 'organic_agency_custom_styles' );

if ( ! function_exists( 'organic_agency_gutenberg_custom_styles' ) ) {

	/**
	 * Changes styles in Gutenberg editor upon user defined options.
	 */
	function organic_agency_gutenberg_custom_styles() {

		$font_pairing = get_theme_mod( 'organic_agency_fonts', 'bebas_neue_roboto' );
		$nav_font     = get_theme_mod( 'organic_agency_nav_font', 'bebas_neue' );

		$fonts = array(
			0 => array(),
			1 => array(),
			3 => array(),
		);
		switch ( $font_pairing ) {
			case 'helvetica_neue_double':
				$fonts[0]['font'] = "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";
				$fonts[1]['font'] = "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";
				break;
			case 'bebas_neue_roboto':
				$fonts[0]['font'] = "font-family: 'Bebas Neue', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'dm_serif_libre_franklin':
				$fonts[0]['font'] = "font-family: 'DM Serif Text', serif;";
				$fonts[1]['font'] = "font-family: 'Libre Franklin', sans-serif;";
				break;
			case 'quicksand_roboto':
				$fonts[0]['font'] = "font-family: 'Quicksand', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'oswald_droid_serif':
				$fonts[0]['font'] = "font-family: 'Oswald', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Droid Serif', serif;";
				break;
			case 'montserrat_merriweather':
				$fonts[0]['font'] = "font-family: 'Montserrat', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'raleway_roboto_slab':
				$fonts[0]['font'] = "font-family: 'Roboto Slab', serif;";
				$fonts[1]['font'] = "font-family: 'Raleway', sans-serif;";
				break;
			case 'playfair_display_source_sans_pro':
				$fonts[0]['font'] = "font-family: 'Playfair Display', serif;";
				$fonts[1]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
				break;
			case 'quicksand_lora':
				$fonts[0]['font'] = "font-family: 'Quicksand', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Lora', serif;";
				break;
			case 'cinzel_roboto':
				$fonts[0]['font'] = "font-family: 'Cinzel', serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'merriweather_encode_sans':
				$fonts[0]['font'] = "font-family: 'Merriweather', serif;";
				$fonts[1]['font'] = "font-family: 'Encode Sans', sans-serif;";
				break;
			case 'lato_merriweather':
				$fonts[0]['font'] = "font-family: 'Lato', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'roboto_merriweather':
				$fonts[0]['font'] = "font-family: 'Roboto', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'roboto_condensed_roboto':
				$fonts[0]['font'] = "font-family: 'Roboto Condensed', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'raleway_open_sans':
				$fonts[0]['font'] = "font-family: 'Raleway', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Open Sans', sans-serif;";
				break;
			case 'abril_poppins':
				$fonts[0]['font'] = "font-family: 'Abril Fatface', serif;";
				$fonts[1]['font'] = "font-family: 'Poppins', sans-serif;";
				break;
			case 'oxygen_noto_serif':
				$fonts[0]['font'] = "font-family: 'Oxygen', sans-serif;";
				$fonts[1]['font'] = "font-family: 'Noto Serif', serif;";
				break;
			case 'aleo_muli':
				$fonts[0]['font'] = "font-family: 'Aleo', serif;";
				$fonts[1]['font'] = "font-family: 'Muli', sans-serif;";
				break;
			default:
				$fonts[0]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				$fonts[1]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				break;
		}

		switch ( $nav_font ) {
			case 'bebas_neue':
				$fonts[3]['font'] = "font-family: 'Bebas Neue', sans-serif;";
				break;
			case 'noto_serif':
				$fonts[3]['font'] = "font-family: 'Noto Serif', serif;";
				break;
			case 'poppins':
				$fonts[3]['font'] = "font-family: 'Poppins', sans-serif;";
				break;
			case 'muli':
				$fonts[3]['font'] = "font-family: 'Muli', sans-serif;";
				break;
			case 'oxygen':
				$fonts[3]['font'] = "font-family: 'Oxygen', sans-serif;";
				break;
			case 'pt_sans':
				$fonts[3]['font'] = "font-family: 'PT Sans', sans-serif;";
				break;
			case 'libre_franklin':
				$fonts[3]['font'] = "font-family: 'Libre Franklin', sans-serif;";
				break;
			case 'lato':
				$fonts[3]['font'] = "font-family: 'Lato', sans-serif;";
				break;
			case 'oswald':
				$fonts[3]['font'] = "font-family: 'Oswald', sans-serif;";
				break;
			case 'droid_serif':
				$fonts[3]['font'] = "font-family: 'Droid Serif', serif;";
				break;
			case 'montserrat':
				$fonts[3]['font'] = "font-family: 'Montserrat', sans-serif;";
				break;
			case 'merriweather':
				$fonts[3]['font'] = "font-family: 'Merriweather', serif;";
				break;
			case 'raleway':
				$fonts[3]['font'] = "font-family: 'Raleway', sans-serif;";
				break;
			case 'roboto':
				$fonts[3]['font'] = "font-family: 'Roboto', sans-serif;";
				break;
			case 'roboto_condensed':
				$fonts[3]['font'] = "font-family: 'Roboto Condensed', sans-serif;";
				break;
			case 'roboto_slab':
				$fonts[3]['font'] = "font-family: 'Roboto Slab', serif;";
				break;
			case 'playfair_display':
				$fonts[3]['font'] = "font-family: 'Playfair Display', serif;";
				break;
			case 'source_sans_pro':
				$fonts[3]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
				break;
			case 'quicksand':
				$fonts[3]['font'] = "font-family: 'Quicksand', sans-serif;";
				break;
			case 'lora':
				$fonts[3]['font'] = "font-family: 'Lora', serif;";
				break;
			case 'helvetica_neue':
				$fonts[3]['font'] = "font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;";
				break;
			case 'encode_sans':
				$fonts[3]['font'] = "font-family: 'Encode Sans', sans-serif;";
				break;
			case 'cinzel':
				$fonts[3]['font'] = "font-family: 'Cinzel', serif;";
				break;
			case 'shrikhand':
				$fonts[3]['font'] = "font-family: 'Shrikhand', serif;";
				break;
			case 'amatic_sc':
				$fonts[3]['font'] = "font-family: 'Amatic SC', sans-serif;";
				break;
			case 'berkshire_swash':
				$fonts[3]['font'] = "font-family: 'Berkshire Swash', serif;";
				break;
			case 'abril_fatface':
				$fonts[3]['font'] = "font-family: 'Abril Fatface', serif;";
				break;
			case 'patua_one':
				$fonts[3]['font'] = "font-family: 'Patua One', serif;";
				break;
			default:
				$fonts[3]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
				break;
		}
		?>

		<?php if ( $fonts[0]['font'] ) { ?>
			<?php
			$editor_heading_font =
			'.editor-styles-wrapper h1,
			.editor-styles-wrapper h2,
			.editor-styles-wrapper h3,
			.editor-styles-wrapper h4,
			.editor-styles-wrapper h5,
			.editor-styles-wrapper h6,
			.editor-styles-wrapper .wc-block-grid__product-title,
			.editor-styles-wrapper .editor-post-title__block .editor-post-title__input {
			' . $fonts[0]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-gutenberg', $editor_heading_font ); ?>
		<?php } ?>

		<?php if ( $fonts[1]['font'] ) { ?>
			<?php
			$editor_body_font =
			'.editor-styles-wrapper,
			.editor-styles-wrapper p,
			.editor-styles-wrapper div,
			.editor-styles-wrapper .editor-rich-text {
				' . $fonts[1]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-gutenberg', $editor_body_font ); ?>
		<?php } ?>

		<?php if ( $fonts[3]['font'] ) { ?>
			<?php
			$editor_nav_font =
			'.editor-styles-wrapper button,
			.editor-styles-wrapper .button,
			.editor-styles-wrapper .wp-block-button a,
			.editor-styles-wrapper .wp-block-button .rich-text {
				' . $fonts[3]['font'] . '
			}';
			?>
			<?php wp_add_inline_style( 'organic-agency-gutenberg', $editor_nav_font ); ?>
		<?php } ?>

		<?php
	}
}
add_action( 'enqueue_block_assets', 'organic_agency_gutenberg_custom_styles', 99 );
