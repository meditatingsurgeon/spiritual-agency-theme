<?php
/**
 * The search form template for our theme.
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

?>

<form method="get" id="searchform" class="clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search', 'organic-agency' ); ?></label>
	<input type="text" class="field" name="s" value="<?php echo get_search_query(); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'organic-agency' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'organic-agency' ); ?>" />
</form>
