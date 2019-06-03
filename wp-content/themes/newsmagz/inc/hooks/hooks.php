<?php
/**
 * Define all the theme hooks.
 *
 * @package WordPress
 * @subpackage newsmagz
 */



/**
 * Hook at the before head of top bar.
 */
function newsmagz_action_before_head() {
	do_action( 'newsmagz_action_before_head' );
}


/**
 * Hook at the before wp_head 
 */
function newsmagz_action_before_wp_head() {
	do_action( 'newsmagz_action_before_wp_head' );
}

 

/**
 * Hook at the beginning the page content wrap.
 */
function newsmagz_action_page_start() {
	do_action( 'newsmagz_action_page_start' );
}


/**
 * Hook at the beginning the page content wrap.
 */
function newsmagz_action_header() {
	do_action( 'newsmagz_action_header' );
}

/**
 * Hook at the beginning of top bar.
 */
function newsmagz_action_inner_navbar_top() {
	do_action( 'newsmagz_action_inner_navbar_top' );
}

/**
 * Hook at the end of top bar.
 */
function newsmagz_after_navbar_top() {
	do_action( 'newsmagz_after_navbar_top' );
}

/**
 * Hook at the beginning of header.
 */
function newsmagz_action_inner_header() {
	do_action( 'newsmagz_action_inner_header' );
}

/**
 * Hook at the end of header.
 */
function newsmagz_action_after_inner_header() {
	do_action( 'newsmagz_action_after_inner_header' );
}

/**
 *  Hook before main navigation.
 */
function newsmagz_action_before_main_nav() {
	do_action( 'newsmagz_action_before_main_nav' );
}

/**
 *  Hook after main navigation.
 */
function newsmagz_action_after_main_nav() {
	do_action( 'newsmagz_action_after_main_nav' );
}

/**
 *  Hook add header links skip to content
 */
function newsmagz_action_header_links() {
	do_action( 'newsmagz_action_header_links' );
}

/**
 *  Hook at the beginning of footer container.
 */
function newsmagz_action_footer_container_start() {
	do_action( 'newsmagz_action_footer_container_start' );
}



/**
 * Hook at the beginning site content wrap.
 */
function newsmagz_action_site_content_start() {
	do_action( 'newsmagz_action_site_content_start' );
}



/**
 * Hook at the beginning site content wrap.
 */
function newsmagz_action_site_content_end() {
	do_action( 'newsmagz_action_site_content_end' );
}


/**
 *  Hook at the end of footer widgets.
 */
function newsmagz_action_widget_before_footer() {
	do_action( 'newsmagz_action_widget_before_footer' );
}


/**
 *  Hook at the end of footer container.
 */
function newsmagz_action_footer_container_end() {
	do_action( 'newsmagz_action_footer_container_end' );
}

/**
 *  Hook for footer content.
 */
function newsmagz_action_footer_content() {
	do_action( 'newsmagz_action_footer_content' );
}

/**
 *  Hook for comments title
 */
function newsmagz_comments_title() {
	do_action( 'newsmagz_comments_title' );
}

/**
 * Hook for comments content.
 *
 * @param array                 $args                     Comment arguments.
 * @param integer/string/object $comment  Author’s User ID (an integer or string), an E-mail Address (a string) or the comment object from the comment loop.
 * @param int                   $depth                      Depth of comments.
 * @param string                $add_below               For the JavaScript addComment.moveForm() method parameters.
 */
function newsmagz_comment_content( $args, $comment, $depth, $add_below ) {
	do_action( 'newsmagz_comment_content', $args, $comment, $depth, $add_below );
}

/**
 * Hook for footer on content.php
 */
function newsmagz_content_footer() {
	do_action( 'newsmagz_entry_footer' );
}

/**
 * Hook for date format.
 */
function newsmagz_entry_date() {
	do_action( 'newsmagz_entry_date' );
}

/**
 * Hook for date format.
 */
function newsmagz_action_page_end() {
	do_action( 'newsmagz_action_page_end' );
}

/**
 * At the top of the slider posts
 */
function newsmagz_top_slider_posts_trigger() {
	do_action( 'newsmagz_top_slider_posts' );
}

/**
 * At the bottom of the slider posts
 */
function newsmagz_bottom_slider_posts_trigger() {
	do_action( 'newsmagz_bottom_slider_posts' );
}

/**
 * At the bottom of the slider posts
 */
function newsmagz_action_front_page() {
	do_action( 'newsmagz_action_front_page' );
}

/**
 * At the content block start
 */
function newsmagz_action_content_bloc_start() {
	do_action( 'newsmagz_action_content_bloc_start' );
}

/**
 * At the content blocks  
 */
function newsmagz_action_content_bloc() {
	do_action( 'newsmagz_action_content_bloc' );
}

/**
 * At the content block end
 */
function newsmagz_action_content_bloc_end() {
	do_action( 'newsmagz_action_content_bloc_end' );
}
