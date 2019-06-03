<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsmagz
 */

if ( ! is_active_sidebar( 'newsmagz-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-3 sidebar" role="complementary">
	<?php

	if (  is_active_sidebar( 'newsmagz-sidebar' ) ) {
 	 	  		dynamic_sidebar( 'newsmagz-sidebar' );

		 }


 	?>
</aside><!-- #secondary -->
