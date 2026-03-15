<?php
/**
 * Register the demo import notices.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

/** Function organic_agency_admin_notice_demo_content */
function organic_agency_admin_notice_demo_content() {

	if ( ! PAnD::is_admin_notice_active( 'notice-organic-agency-demo-import-forever' ) ) {
		return;
	}

	$current_screen = get_current_screen();

	if ( is_admin() && strpos( $current_screen->base, 'pt-one-click-demo-import' ) === false ) {
		?>

		<div data-dismissible="notice-organic-agency-demo-import-forever" class="notice is-dismissible notice-warning">
			<p style="margin-bottom: 6px;"><?php /* translators: 1: bold text, 2: admin link to demo import page */ printf( esc_html__( 'The %1$s plugin has been activated. Begin the %2$s process, or dismiss this notice.', 'organic-agency' ), '<strong>One-Click Demo Import</strong>', sprintf( '<a href="%1$s"><strong>demo import</strong></a>', esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ) ); ?></p>
			<p><a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>"><?php esc_html_e( 'Begin Import', 'organic-agency' ); ?></a></p>
		</div>

		<?php
	}
}
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'organic_agency_admin_notice_demo_content' );

/** Function organic_agency_deactivate_ocdi_notice */
function organic_agency_deactivate_ocdi_notice() {
	if ( ! class_exists( 'OCDI_Plugin' ) ) {
		return;
	}
	if ( '1' === get_option( 'organic_agency_demo_imported' ) ) {
		remove_action( 'admin_notices', 'organic_agency_admin_notice_demo_content' );
	}
}
add_action( 'admin_init', 'organic_agency_deactivate_ocdi_notice', 10 );
