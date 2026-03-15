<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function organic_agency_theme_customizer( $wp_customize ) {

	include get_template_directory() . '/customizer/customizer-controls.php';
	include get_template_directory() . '/customizer/customizer-sanitize.php';

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Organic Agency 1.0
	 * @see organic_agency_customize_register()
	 *
	 * @return void
	 */
	function organic_agency_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Organic Agency 1.0
	 * @see organic_agency_customize_register()
	 *
	 * @return void
	 */
	function organic_agency_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Return an array of all categories.
	 */
	function organic_agency_blog_categories() {
		$cats    = array();
		$cats[0] = esc_html__( 'All Categories', 'organic-agency' );
		foreach ( get_categories() as $categories => $category ) {
			$cats[ $category->term_id ] = $category->name;
		}

		return $cats;
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->get_setting( 'header_image' )->transport      = 'refresh';
	$wp_customize->get_setting( 'header_image_data' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title a',
				'container_inclusive' => false,
				'render_callback'     => 'organic_agency_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'organic_agency_customize_partial_blogdescription',
			)
		);
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

		// Title Font Selector.
		$wp_customize->add_setting(
			'organic_agency_title_font',
			array(
				'default'           => 'anton',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_title_font',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Title Font', 'organic-agency' ),
					'section'  => 'title_tagline',
					'choices'  => array(
						'anton'            => __( 'Anton', 'organic-agency' ),
						'dm_serif'         => __( 'DM Serif', 'organic-agency' ),
						'rochester'        => __( 'Rochester', 'organic-agency' ),
						'staatliches'      => __( 'Staatliches', 'organic-agency' ),
						'overlock'         => __( 'Overlock', 'organic-agency' ),
						'noto_serif'       => __( 'Noto Serif', 'organic-agency' ),
						'poppins'          => __( 'Poppins', 'organic-agency' ),
						'muli'             => __( 'Muli', 'organic-agency' ),
						'oxygen'           => __( 'Oxygen', 'organic-agency' ),
						'pt_sans'          => __( 'PT Sans', 'organic-agency' ),
						'libre_franklin'   => __( 'Libre Franklin', 'organic-agency' ),
						'droid_serif'      => __( 'Droid Serif', 'organic-agency' ),
						'helvetica_neue'   => __( 'Helvetica Neue', 'organic-agency' ),
						'lora'             => __( 'Lora', 'organic-agency' ),
						'merriweather'     => __( 'Merriweather', 'organic-agency' ),
						'montserrat'       => __( 'Montserrat', 'organic-agency' ),
						'oswald'           => __( 'Oswald', 'organic-agency' ),
						'playfair_display' => __( 'Playfair Display', 'organic-agency' ),
						'quicksand'        => __( 'Quicksand', 'organic-agency' ),
						'raleway'          => __( 'Raleway', 'organic-agency' ),
						'roboto'           => __( 'Roboto', 'organic-agency' ),
						'roboto_condensed' => __( 'Roboto Condensed', 'organic-agency' ),
						'roboto_slab'      => __( 'Roboto Slab', 'organic-agency' ),
						'source_sans_pro'  => __( 'Source Sans Pro', 'organic-agency' ),
						'lato'             => __( 'Lato', 'organic-agency' ),
						'encode_sans'      => __( 'Encode Sans', 'organic-agency' ),
						'lily_script'      => __( 'Lily Script One', 'organic-agency' ),
						'cinzel'           => __( 'Cinzel', 'organic-agency' ),
						'shrikhand'        => __( 'Shrikhand', 'organic-agency' ),
						'amatic_sc'        => __( 'Amatic SC', 'organic-agency' ),
						'berkshire_swash'  => __( 'Berkshire Swash', 'organic-agency' ),
						'abril_fatface'    => __( 'Abril Fatface', 'organic-agency' ),
						'patua_one'        => __( 'Patua One', 'organic-agency' ),
						'monoton'          => __( 'Monoton', 'organic-agency' ),
					),
					'priority' => 10,
				)
			)
		);

		// Title Font Weight.
		$wp_customize->add_setting(
			'organic_agency_title_font_weight',
			array(
				'default'           => 'normal',
				'sanitize_callback' => 'organic_agency_sanitize_font_weight',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_title_font_weight',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Title Font Weight', 'organic-agency' ),
					'section'  => 'title_tagline',
					'choices'  => array(
						'normal'  => __( 'Normal', 'organic-agency' ),
						'bold'    => __( 'Bold', 'organic-agency' ),
						'lighter' => __( 'Light', 'organic-agency' ),
					),
					'priority' => 11,
				)
			)
		);

		// Custom Display Site Title Option.
		$wp_customize->add_setting(
			'organic_agency_site_title',
			array(
				'default'           => '1',
				'sanitize_callback' => 'sanitize_key',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_site_title',
				array(
					'label'    => esc_html__( 'Display Site Title', 'organic-agency' ),
					'type'     => 'checkbox',
					'section'  => 'title_tagline',
					'settings' => 'organic_agency_site_title',
					'priority' => 12,
				)
			)
		);

		// Custom Display Tagline Option.
		$wp_customize->add_setting(
			'organic_agency_site_tagline',
			array(
				'default'           => '1',
				'sanitize_callback' => 'sanitize_key',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_site_tagline',
				array(
					'label'    => esc_html__( 'Display Site Tagline', 'organic-agency' ),
					'type'     => 'checkbox',
					'section'  => 'title_tagline',
					'settings' => 'organic_agency_site_tagline',
					'priority' => 15,
				)
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Colors Section
		-------------------------------------------------------------------------------------------------------
		*/

		// Content Background.
		$wp_customize->add_setting(
			'organic_agency_colors_content',
			array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_content',
				array(
					'label'    => esc_html__( 'Content Background Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_content',
					'priority' => 10,
				)
			)
		);

		// Nav Background.
		$wp_customize->add_setting(
			'organic_agency_colors_nav',
			array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_nav',
				array(
					'label'    => esc_html__( 'Header Background Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_nav',
					'priority' => 20,
				)
			)
		);

		// Footer Background Color.
		$wp_customize->add_setting(
			'organic_agency_colors_footer',
			array(
				'default'           => '#1b2a35',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_footer',
				array(
					'label'    => esc_html__( 'Footer Background Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_footer',
					'priority' => 30,
				)
			)
		);

		// Link Color.
		$wp_customize->add_setting(
			'organic_agency_colors_links',
			array(
				'default'           => '#ab1c3d',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_links',
				array(
					'label'    => esc_html__( 'Link Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_links',
					'priority' => 40,
				)
			)
		);

		// Link Hover Color.
		$wp_customize->add_setting(
			'organic_agency_colors_links_hover',
			array(
				'default'           => '#ff3b67',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_links_hover',
				array(
					'label'    => esc_html__( 'Link Hover Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_links_hover',
					'priority' => 50,
				)
			)
		);

		// Heading Link Color.
		$wp_customize->add_setting(
			'organic_agency_colors_heading_links',
			array(
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_heading_links',
				array(
					'label'    => esc_html__( 'Heading Link Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_heading_links',
					'priority' => 60,
				)
			)
		);

		// Heading Link Hover Color.
		$wp_customize->add_setting(
			'organic_agency_colors_heading_links_hover',
			array(
				'default'           => '#ff3b67',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_heading_links_hover',
				array(
					'label'    => esc_html__( 'Heading Link Hover Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_heading_links_hover',
					'priority' => 70,
				)
			)
		);

		// Button Color.
		$wp_customize->add_setting(
			'organic_agency_colors_button',
			array(
				'default'           => '#ab1c3d',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_button',
				array(
					'label'    => esc_html__( 'Button Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_button',
					'priority' => 80,
				)
			)
		);

		// Button Hover Color.
		$wp_customize->add_setting(
			'organic_agency_colors_button_hover',
			array(
				'default'           => '#ff3b67',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'organic_agency_colors_button_hover',
				array(
					'label'    => esc_html__( 'Button Hover Color', 'organic-agency' ),
					'section'  => 'colors',
					'settings' => 'organic_agency_colors_button_hover',
					'priority' => 90,
				)
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel(
			'organic_agency_theme_options',
			array(
				'priority'       => 1,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => esc_html__( 'Theme Options', 'organic-agency' ),
				'description'    => esc_html__( 'This panel allows you to customize specific areas of the theme.', 'organic-agency' ),
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Fonts
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section(
			'organic_agency_fonts_section',
			array(
				'title'    => esc_html__( 'Fonts', 'organic-agency' ),
				'priority' => 101,
				'panel'    => 'organic_agency_theme_options',
			)
		);

		// Font Selector.
		$wp_customize->add_setting(
			'organic_agency_fonts',
			array(
				'default'           => 'bebas_neue_roboto',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_fonts',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Font Pairing', 'organic-agency' ),
					'section'  => 'organic_agency_fonts_section',
					'choices'  => array(
						'helvetica_neue_double'            => __( 'Helvetica Neue', 'organic-agency' ),
						'bebas_neue_roboto'                => __( 'Bebas Neue + Roboto', 'organic-agency' ),
						'dm_serif_libre_franklin'          => __( 'DM Serif + Libre Franklin', 'organic-agency' ),
						'quicksand_roboto'                 => __( 'Quicksand + Roboto', 'organic-agency' ),
						'oswald_droid_serif'               => __( 'Oswald + Droid Serif', 'organic-agency' ),
						'montserrat_merriweather'          => __( 'Montserrat + Merriweather', 'organic-agency' ),
						'raleway_roboto_slab'              => __( 'Roboto Slab + Raleway', 'organic-agency' ),
						'playfair_display_source_sans_pro' => __( 'Playfair Display + Source Sans Pro', 'organic-agency' ),
						'quicksand_lora'                   => __( 'Quicksand + Lora', 'organic-agency' ),
						'cinzel_roboto'                    => __( 'Cinzel + Roboto', 'organic-agency' ),
						'merriweather_encode_sans'         => __( 'Merriweather + Encode Sans', 'organic-agency' ),
						'lato_merriweather'                => __( 'Lato + Merriweather', 'organic-agency' ),
						'roboto_merriweather'              => __( 'Roboto + Merriweather', 'organic-agency' ),
						'roboto_condensed_roboto'          => __( 'Roboto Condensed + Roboto', 'organic-agency' ),
						'raleway_open_sans'                => __( 'Raleway + Open Sans', 'organic-agency' ),
						'abril_poppins'                    => __( 'Abril Fatface + Poppins', 'organic-agency' ),
						'oxygen_noto_serif'                => __( 'Oxygen + Noto Serif', 'organic-agency' ),
						'aleo_muli'                        => __( 'Aleo + Muli', 'organic-agency' ),
					),
					'priority' => 40,
				)
			)
		);

		// Menu Font Selector.
		$wp_customize->add_setting(
			'organic_agency_nav_font',
			array(
				'default'           => 'bebas_neue',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_nav_font',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Main Menu Font', 'organic-agency' ),
					'section'  => 'organic_agency_fonts_section',
					'choices'  => array(
						'bebas_neue'       => __( 'Bebas Neue', 'organic-agency' ),
						'noto_serif'       => __( 'Noto Serif', 'organic-agency' ),
						'poppins'          => __( 'Poppins', 'organic-agency' ),
						'muli'             => __( 'Muli', 'organic-agency' ),
						'oxygen'           => __( 'Oxygen', 'organic-agency' ),
						'pt_sans'          => __( 'PT Sans', 'organic-agency' ),
						'libre_franklin'   => __( 'Libre Franklin', 'organic-agency' ),
						'droid_serif'      => __( 'Droid Serif', 'organic-agency' ),
						'helvetica_neue'   => __( 'Helvetica Neue', 'organic-agency' ),
						'lora'             => __( 'Lora', 'organic-agency' ),
						'merriweather'     => __( 'Merriweather', 'organic-agency' ),
						'montserrat'       => __( 'Montserrat', 'organic-agency' ),
						'oswald'           => __( 'Oswald', 'organic-agency' ),
						'playfair_display' => __( 'Playfair Display', 'organic-agency' ),
						'quicksand'        => __( 'Quicksand', 'organic-agency' ),
						'raleway'          => __( 'Raleway', 'organic-agency' ),
						'roboto'           => __( 'Roboto', 'organic-agency' ),
						'roboto_condensed' => __( 'Roboto Condensed', 'organic-agency' ),
						'roboto_slab'      => __( 'Roboto Slab', 'organic-agency' ),
						'source_sans_pro'  => __( 'Source Sans Pro', 'organic-agency' ),
						'lato'             => __( 'Lato', 'organic-agency' ),
						'encode_sans'      => __( 'Encode Sans', 'organic-agency' ),
						'cinzel'           => __( 'Cinzel', 'organic-agency' ),
						'shrikhand'        => __( 'Shrikhand', 'organic-agency' ),
						'amatic_sc'        => __( 'Amatic SC', 'organic-agency' ),
						'berkshire_swash'  => __( 'Berkshire Swash', 'organic-agency' ),
						'abril_fatface'    => __( 'Abril Fatface', 'organic-agency' ),
						'patua_one'        => __( 'Patua One', 'organic-agency' ),
					),
					'priority' => 60,
				)
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Slideshow Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section(
			'organic_agency_slider_section',
			array(
				'title'       => esc_html__( 'Slideshow Settings', 'organic-agency' ),
				'description' => esc_html__( 'Options for changing the slideshow transition time and style.', 'organic-agency' ),
				'priority'    => 102,
				'panel'       => 'organic_agency_theme_options',
			)
		);

		// Slider Transition Interval.
		$wp_customize->add_setting(
			'organic_agency_transition_interval',
			array(
				'default'           => '12000',
				'sanitize_callback' => 'organic_agency_sanitize_transition_interval',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_transition_interval',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Transition Interval', 'organic-agency' ),
					'section'  => 'organic_agency_slider_section',
					'choices'  => array(
						'2000'      => esc_html__( '2 Seconds', 'organic-agency' ),
						'4000'      => esc_html__( '4 Seconds', 'organic-agency' ),
						'6000'      => esc_html__( '6 Seconds', 'organic-agency' ),
						'8000'      => esc_html__( '8 Seconds', 'organic-agency' ),
						'10000'     => esc_html__( '10 Seconds', 'organic-agency' ),
						'12000'     => esc_html__( '12 Seconds', 'organic-agency' ),
						'20000'     => esc_html__( '20 Seconds', 'organic-agency' ),
						'30000'     => esc_html__( '30 Seconds', 'organic-agency' ),
						'60000'     => esc_html__( '1 Minute', 'organic-agency' ),
						'999999999' => esc_html__( 'Hold Frame', 'organic-agency' ),
					),
					'priority' => 10,
				)
			)
		);

		// Slideshow Transition Style.
		$wp_customize->add_setting(
			'organic_agency_transition_style',
			array(
				'default'           => 'fade',
				'sanitize_callback' => 'organic_agency_sanitize_transition_style',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_transition_style',
				array(
					'type'     => 'select',
					'label'    => esc_html__( 'Transition Style', 'organic-agency' ),
					'section'  => 'organic_agency_slider_section',
					'choices'  => array(
						'fade'  => __( 'Fade', 'organic-agency' ),
						'slide' => __( 'Slide', 'organic-agency' ),
					),
					'priority' => 20,
				)
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Layout Options
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section(
			'organic_agency_layout_section',
			array(
				'title'       => esc_html__( 'Layout', 'organic-agency' ),
				'description' => esc_html__( 'Toggle the display and layout of various elements throughout the theme.', 'organic-agency' ),
				'priority'    => 104,
				'panel'       => 'organic_agency_theme_options',
			)
		);

		// Display Post Image Title Overlay.
		$wp_customize->add_setting(
			'display_img_title_post',
			array(
				'default'           => '1',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'display_img_title_post',
				array(
					'label'    => esc_html__( 'Overlay Post Title On Featured Image?', 'organic-agency' ),
					'section'  => 'organic_agency_layout_section',
					'settings' => 'display_img_title_post',
					'type'     => 'checkbox',
					'priority' => 80,
				)
			)
		);

		// Display Page Image Title Overlay.
		$wp_customize->add_setting(
			'display_img_title_page',
			array(
				'default'           => '1',
				'sanitize_callback' => 'sanitize_key',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'display_img_title_page',
				array(
					'label'    => esc_html__( 'Overlay Page Title On Featured Image?', 'organic-agency' ),
					'section'  => 'organic_agency_layout_section',
					'settings' => 'display_img_title_page',
					'type'     => 'checkbox',
					'priority' => 100,
				)
			)
		);

		/*
		-------------------------------------------------------------------------------------------------------
			Footer Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section(
			'organic_agency_footer_section',
			array(
				'title'       => esc_html__( 'Footer', 'organic-agency' ),
				'description' => esc_html__( 'Replace the footer text. The footer social media links can be added by creating a Social Menu in the Menus section.', 'organic-agency' ),
				'priority'    => 120,
			)
		);

		// Footer Text.
		$wp_customize->add_setting(
			'organic_agency_footer_text',
			array(
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'organic_agency_footer_text',
				array(
					'label'    => esc_html__( 'Footer Text', 'organic-agency' ),
					'section'  => 'organic_agency_footer_section',
					'settings' => 'organic_agency_footer_text',
					'type'     => 'text',
					'priority' => 10,
				)
			)
		);

}
add_action( 'customize_register', 'organic_agency_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function organic_agency_customize_preview_js() {
	wp_register_script( 'jquery-bg-brightness', get_template_directory_uri() . '/assets/js/jquery.bgBrightness.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'agency-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview', 'jquery-bg-brightness' ), '1.0', true );
}
add_action( 'customize_preview_init', 'organic_agency_customize_preview_js' );

/**
 * Logo Resizer
 */
require get_template_directory() . '/customizer/logo-resizer.php';
