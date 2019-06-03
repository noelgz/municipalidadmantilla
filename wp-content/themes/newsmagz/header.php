<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @package newsmagz
 */

/**
 * newsmagz_action_before_head hook
 * 
 * @hooked newsmagz_doctype -  10
 */
newsmagz_action_before_head();
newsmagz_action_before_wp_head();


wp_head(); 
?>

</head>
<body <?php body_class(); ?>>
<?php

/**
 * newsmagz_action_page_start hook
 *
 * @hooked newsmagz_page_start - 15
 */
	
	newsmagz_action_page_start();
/**
 * newsmagz_action_header hook
 *
 * @hooked newsmagz_header - 10
 */	
	newsmagz_action_header();
	newsmagz_action_site_content_start(); 
?>
	
