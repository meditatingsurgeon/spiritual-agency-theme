<?php
/**
 * Register Google Font URLs
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

if ( ! function_exists( 'organic_agency_fonts_url' ) ) {

	/**
	 * Register font variables.
	 */
	function organic_agency_fonts_url() {
		$fonts_url = '';

		/*
		Translators: If there are characters in your language that are not
		* supported by these fonts, translate them to 'off'. Do not translate
		* into your own language.
		*/

		$roboto            = _x( 'on', 'Roboto font: on or off', 'organic-agency' );
		$roboto_slab       = _x( 'on', 'Roboto Slab font: on or off', 'organic-agency' );
		$raleway           = _x( 'on', 'Raleway font: on or off', 'organic-agency' );
		$open_sans         = _x( 'on', 'Open Sans font: on or off', 'organic-agency' );
		$montserrat        = _x( 'on', 'Montserrat font: on or off', 'organic-agency' );
		$merriweather      = _x( 'on', 'Merriweather font: on or off', 'organic-agency' );
		$droid_serif       = _x( 'on', 'Droid Serif font: on or off', 'organic-agency' );
		$oswald            = _x( 'on', 'Oswald font: on or off', 'organic-agency' );
		$playfair_display  = _x( 'on', 'Playfair Display font: on or off', 'organic-agency' );
		$source_sans_pro   = _x( 'on', 'Source Sans Pro font: on or off', 'organic-agency' );
		$quicksand         = _x( 'on', 'Quicksand font: on or off', 'organic-agency' );
		$lora              = _x( 'on', 'Lora font: on or off', 'organic-agency' );
		$lato              = _x( 'on', 'Lato font: on or off', 'organic-agency' );
		$encode_sans       = _x( 'on', 'Encode Sans font: on or off', 'organic-agency' );
		$lily_script       = _x( 'on', 'Lily Script One font: on or off', 'organic-agency' );
		$cinzel            = _x( 'on', 'Cinzel font: on or off', 'organic-agency' );
		$shrikhand         = _x( 'on', 'Shrikhand font: on or off', 'organic-agency' );
		$amatic_sc         = _x( 'on', 'Amatic SC font: on or off', 'organic-agency' );
		$berkshire_swash   = _x( 'on', 'Berkshire Swash font: on or off', 'organic-agency' );
		$abril_fatface     = _x( 'on', 'Abril Fatface font: on or off', 'organic-agency' );
		$patua_one         = _x( 'on', 'Patua One font: on or off', 'organic-agency' );
		$monoton           = _x( 'on', 'Monoton font: on or off', 'organic-agency' );
		$staatliches       = _x( 'on', 'Staatliches font: on or off', 'organic-agency' );
		$comfortaa         = _x( 'on', 'Comfortaa font: on or off', 'organic-agency' );
		$unica_one         = _x( 'on', 'Unica One font: on or off', 'organic-agency' );
		$overlock          = _x( 'on', 'Overlock font: on or off', 'organic-agency' );
		$rochester         = _x( 'on', 'Rochester font: on or off', 'organic-agency' );
		$limelight         = _x( 'on', 'Limelight font: on or off', 'organic-agency' );
		$parisienne        = _x( 'on', 'Parisienne font: on or off', 'organic-agency' );
		$poppins           = _x( 'on', 'Poppins font: on or off', 'organic-agency' );
		$noto_sans         = _x( 'on', 'Noto Sans font: on or off', 'organic-agency' );
		$noto_serif        = _x( 'on', 'Noto Serif SC font: on or off', 'organic-agency' );
		$aleo              = _x( 'on', 'Aleo font: on or off', 'organic-agency' );
		$libre_baskerville = _x( 'on', 'Libre Baskerville font: on or off', 'organic-agency' );
		$libre_franklin    = _x( 'on', 'Libre Franklin font: on or off', 'organic-agency' );
		$oxygen            = _x( 'on', 'Oxygen font: on or off', 'organic-agency' );
		$pt_sans           = _x( 'on', 'PT Sans font: on or off', 'organic-agency' );
		$muli              = _x( 'on', 'Muli font: on or off', 'organic-agency' );
		$dm_serif          = _x( 'on', 'DM Serif font: on or off', 'organic-agency' );
		$anton             = _x( 'on', 'Anton font: on or off', 'organic-agency' );
		$bebas_neue        = _x( 'on', 'Bebas Neue font: on or off', 'organic-agency' );

		if ( 'off' !== $bebas_neue || 'off' !== $anton || 'off' !== $dm_serif || 'off' !== $muli || 'off' !== $pt_sans || 'off' !== $oxygen || 'off' !== $libre_franklin || 'off' !== $libre_baskerville || 'off' !== $aleo || 'off' !== $noto_serif || 'off' !== $noto_sans || 'off' !== $poppins || 'off' !== $parisienne || 'off' !== $limelight || 'off' !== $rochester || 'off' !== $overlock || 'off' !== $unica_one || 'off' !== $comfortaa || 'off' !== $staatliches || 'off' !== $monoton || 'off' !== $patua_one || 'off' !== $abril_fatface || 'off' !== $berkshire_swash || 'off' !== $amatic_sc || 'off' !== $shrikhand || 'off' !== $cinzel || 'off' !== $lily_script || 'off' !== $encode_sans || 'off' !== $lato || 'off' !== $quicksand || 'off' !== $lora || 'off' !== $source_sans_pro || 'off' !== $playfair_display || 'off' !== $merriweather || 'off' !== $oswald || 'off' !== $raleway || 'off' !== $roboto || 'off' !== $roboto_slab || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $droid_serif ) {

			$font_families = array();

			if ( 'off' !== $abril_fatface ) {
				$font_families[] = 'Abril Fatface';
			}

			if ( 'off' !== $aleo ) {
				$font_families[] = 'Aleo:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $amatic_sc ) {
				$font_families[] = 'Amatic SC:400,700';
			}

			if ( 'off' !== $anton ) {
				$font_families[] = 'Anton';
			}

			if ( 'off' !== $bebas_neue ) {
				$font_families[] = 'Bebas Neue';
			}

			if ( 'off' !== $berkshire_swash ) {
				$font_families[] = 'Berkshire Swash';
			}

			if ( 'off' !== $cinzel ) {
				$font_families[] = 'Cinzel:400,700,900';
			}

			if ( 'off' !== $comfortaa ) {
				$font_families[] = 'Comfortaa:300,400,700';
			}
			if ( 'off' !== $dm_serif ) {
				$font_families[] = 'DM Serif Text:400,400i';
			}

			if ( 'off' !== $droid_serif ) {
				$font_families[] = 'Droid Serif:400,400i,700,700i';
			}

			if ( 'off' !== $encode_sans ) {
				$font_families[] = 'Encode Sans:200,300,400,500,600,700';
			}

			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $lily_script ) {
				$font_families[] = 'Lily Script One';
			}

			if ( 'off' !== $libre_baskerville ) {
				$font_families[] = 'Libre Baskerville:400,400i,700';
			}

			if ( 'off' !== $libre_franklin ) {
				$font_families[] = 'Libre Franklin:200,200i,400,400i,700,700i';
			}

			if ( 'off' !== $limelight ) {
				$font_families[] = 'Limelight';
			}

			if ( 'off' !== $lora ) {
				$font_families[] = 'Lora:400,400i,700,700i';
			}

			if ( 'off' !== $merriweather ) {
				$font_families[] = 'Merriweather:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $monoton ) {
				$font_families[] = 'Monoton';
			}

			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:200,200i,400,400i,700,700i';
			}

			if ( 'off' !== $muli ) {
				$font_families[] = 'Muli:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $noto_sans ) {
				$font_families[] = 'Noto Sans:400,400i,700,700i';
			}

			if ( 'off' !== $noto_serif ) {
				$font_families[] = 'Noto Serif SC:300,400,500,700';
			}

			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open Sans:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $oswald ) {
				$font_families[] = 'Oswald:300,400,700';
			}

			if ( 'off' !== $overlock ) {
				$font_families[] = 'Overlock:400,400i,700,700i,900,900i';
			}

			if ( 'off' !== $oxygen ) {
				$font_families[] = 'Oxygen:300,400,700';
			}

			if ( 'off' !== $parisienne ) {
				$font_families[] = 'Parisienne';
			}

			if ( 'off' !== $patua_one ) {
				$font_families[] = 'Patua One';
			}

			if ( 'off' !== $playfair_display ) {
				$font_families[] = 'Playfair Display:400,400i,700,700i';
			}

			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:200,200i,400,400i,700,700i';
			}

			if ( 'off' !== $pt_sans ) {
				$font_families[] = 'PT Sans:400,400i,700,700i';
			}

			if ( 'off' !== $quicksand ) {
				$font_families[] = 'Quicksand:300,400,700';
			}

			if ( 'off' !== $raleway ) {
				$font_families[] = 'Raleway:400,200,300,700,500,600';
			}

			if ( 'off' !== $rochester ) {
				$font_families[] = 'Rochester';
			}

			if ( 'off' !== $roboto ) {
				$font_families[] = 'Roboto:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $roboto_slab ) {
				$font_families[] = 'Roboto Slab:300,400,700';
			}

			if ( 'off' !== $shrikhand ) {
				$font_families[] = 'Shrikhand';
			}

			if ( 'off' !== $source_sans_pro ) {
				$font_families[] = 'Source Sans Pro:300,300i,400,400i,700,700i';
			}

			if ( 'off' !== $staatliches ) {
				$font_families[] = 'Staatliches';
			}

			if ( 'off' !== $unica_one ) {
				$font_families[] = 'Unica One';
			}

			$query_args = array(
				'family' => rawurlencode( implode( '|', $font_families ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
}

if ( ! function_exists( 'organic_agency_scripts_styles' ) ) {

	/**
	 * Enqueue Google Fonts on Front End
	 *
	 * @since Organic Agency 1.0
	 */
	function organic_agency_scripts_styles() {
		wp_enqueue_style( 'organic-agency-fonts', organic_agency_fonts_url(), array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'organic_agency_scripts_styles' );

if ( ! function_exists( 'organic_agency_block_editor_styles' ) ) {

	/**
	 * Add Google Scripts for use with the block editor
	 *
	 * @since Organic Agency 1.0
	 */
	function organic_agency_block_editor_styles() {
		wp_enqueue_style( 'organic-agency-fonts', organic_agency_fonts_url(), array(), '1.0' );
	}
}
add_action( 'enqueue_block_editor_assets', 'organic_agency_block_editor_styles' );

if ( ! function_exists( 'organic_agency_editor_styles' ) ) {

	/**
	 * Add Google Scripts for use with the classic editor
	 *
	 * @since Organic Agency 1.0
	 */
	function organic_agency_editor_styles() {
		add_editor_style( array( 'style.css', organic_agency_fonts_url() ) );
	}
}
add_action( 'after_setup_theme', 'organic_agency_editor_styles' );
