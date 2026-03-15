<?php
/**
 * Theme customizer sanitization
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/**
 * Sanitize Mulitple Selection.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_multi_select( $input ) {
	$valid = organic_agency_blog_categories();

	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return;
		}
	}

	return $input;
}

/**
 * Sanitize Font Weights
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_font_weight( $input ) {
	$font_weights = array(
		'normal',
		'bold',
		'lighter',
	);

	if ( in_array( $input, $font_weights, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Pages.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_pages( $input ) {
	$pages = get_all_page_ids();

	if ( in_array( $input, $pages, true ) ) {
			return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Interval.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_transition_interval( $input ) {
	$valid = array(
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
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Style.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_transition_style( $input ) {
	$valid = array(
		'fade'  => esc_html__( 'Fade', 'organic-agency' ),
		'slide' => esc_html__( 'Slide', 'organic-agency' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Columns.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_columns( $input ) {
	$valid = array(
		'one'   => esc_html__( 'One Column', 'organic-agency' ),
		'two'   => esc_html__( 'Two Columns', 'organic-agency' ),
		'three' => esc_html__( 'Three Columns', 'organic-agency' ),
		'four'  => esc_html__( 'Four Columns', 'organic-agency' ),
		'five'  => esc_html__( 'Five Columns', 'organic-agency' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Alignment.
 *
 * @param string $input Sanitizes user input.
 * @return string
 */
function organic_agency_sanitize_align( $input ) {
	$valid = array(
		'left'   => esc_html__( 'Left Align', 'organic-agency' ),
		'center' => esc_html__( 'Center Align', 'organic-agency' ),
		'right'  => esc_html__( 'Right Align', 'organic-agency' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}
