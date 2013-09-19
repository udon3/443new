<?php
/**
 * The template for displaying search forms in Suko443_underscored
 *
 * @package Suko443_underscored
 */
?>

			<div id="searchwrap">
				<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				   <label for="search">Search</label>
				   <input id="search" name="search"  type="text"  placeholder="<?php echo esc_attr_x( 'Search text', 'placeholder', 'suko443_underscored' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'suko443_underscored' ); ?>" />
				   <input type="submit" id="searchsubmit" class="searchbutton" title="submit" value="" />
				</form>
			</div>
			<!-- /#searchwrap -->