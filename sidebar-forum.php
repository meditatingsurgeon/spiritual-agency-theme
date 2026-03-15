<?php
/**
 * The bbPress forum sidebar template for our theme.
 * This template is used to display the sidebar on bbPress forums.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-forum' ) ) { ?>

	<section class="sidebar">
		<?php dynamic_sidebar( 'sidebar-forum' ); ?>
	</section>

<?php } ?>
