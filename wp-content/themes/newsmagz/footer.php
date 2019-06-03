<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsmagz
 */

?>

<?php

/**
 * newsmagz_action_site_content_end hook
 *
 * @hooked newsmagz_footer_container_start - 10
 */ 
	newsmagz_action_site_content_end();
	newsmagz_action_widget_before_footer();
 /**
 * newsmagz_action_footer_container_start hook
 *
 * @hooked newsmagz_footer_container_start - 10
 */
	newsmagz_action_footer_container_start();

/**
 * newsmagz_action_footer_container_start hook
 *
 * @hooked newsmagz_footer - 10
 */

	newsmagz_action_footer_content();

/**
 * newsmagz_action_footer_container_end hook
 *
 * @hooked newsmagz_footer_container_end - 10
 */
	newsmagz_action_footer_container_end();
/**
 * newsmagz_action_page_end hook
 *
 * @hooked newsmagz_page_end - 10
 */
	
	newsmagz_action_page_end();

?>	  
	
<?php wp_footer(); ?>
</body>
</html>