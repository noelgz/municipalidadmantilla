<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage newsmagz.
 */

get_header();
newsmagz_action_front_page();
newsmagz_action_content_bloc_start();
newsmagz_action_content_bloc();
newsmagz_action_content_bloc_end();
get_footer();