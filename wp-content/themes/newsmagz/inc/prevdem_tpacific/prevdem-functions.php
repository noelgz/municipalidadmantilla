<?php
/**
 * Preview functions.
 *
 * @package newsmagz
 */

/** Get a random image for Preview from demo content
 * Can be recursive if a specific img size is not found
 *
 * @param int $i Maximum number of recalls.
 *
 * @return radnom img string
 */
function newsmagz_get_prevdem_img_src( $i = 0 ) {
	// prevent infinite loop
	if ( 6 == $i ) {
		return '';
	}
	$path = apply_filters( 'newsmagz_prevdem_home_filter', get_template_directory() . '/inc/prevdem_tpacific/img/' );
	// Build or re-build the global dem img array
	if ( ! isset( $GLOBALS['prevdem_img'] ) || empty( $GLOBALS['prevdem_img'] ) ) {
		$imgs = array();
		$candidates = array();
		if ( is_dir( $path ) ) {
			$imgs = scandir( $path );
		}
		if ( ! $imgs || empty( $imgs ) ) {
			return array();
		}
		foreach ( $imgs as $img ) {
			if ( '.' === $img[0] || is_dir( $path . $img ) ) {
				continue;
			}
			$candidates[] = $img;
		}
		$GLOBALS['prevdem_img'] = $candidates;
	}
	$candidates = $GLOBALS['prevdem_img'];
	// get a random image name
	$rand_key = array_rand( $candidates );
	$img_name = $candidates[ $rand_key ];
	// if file does not exists, reset the global and recursively call it again
	if ( ! file_exists( $path . $img_name ) ) {
		unset( $GLOBALS['prevdem_img'] );
		$i++;
		return newsmagz_get_prevdem_img_src( $i );
	}
	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img , 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS['prevdem_img'] = $new_candidates;
	return apply_filters( 'newsmagz_prevdem_home_uri_filter',get_template_directory_uri() . '/inc/prevdem_tpacific/img/' ) . $img_name;
}
/**
 * Filter thumbnail image for PrevDemo
 *
 * @param string $img_tag_src Post thumbnail.
 */
function newsmagz_the_post_thumbnail( $img_tag_src, $which_block ) {
	if ( empty( $img_tag_src ) ) {
		$placeholder = newsmagz_get_prevdem_img_src();

		if($which_block =='slider'){
			return '<img class="owl-lazy" data-src="' . esc_url( $placeholder ) . '" />';

		}else{
			return '<img width="770" height="430" src="' . esc_url( $placeholder ) . '" class="wp-post-image">';

		}
	}
	return $img_tag_src;

}
add_filter( 'newsmagz_get_prev_img', 'newsmagz_the_post_thumbnail',10, 2 );

function newsmagz_preview_alt_sidebar() {
	the_widget('WP_Widget_Search', 'title=' . esc_html__('Search', 'newsmagz'), 'before_title=<h3 class="title-border   title-bg-line"><span>&after_title=<span class="line"></span></span></h3>&before_widget=<div class=" widget widget_search">&after_widget=</div>');
	the_widget('WP_Widget_Pages', 'title=' . esc_html__('Pages', 'newsmagz'), 'before_title=<h3 class="title-border   title-bg-line"><span>&after_title=<span class="line"></span></span></h3>&before_widget=<div class=" widget widget_pages">&after_widget=</div>');
	the_widget('WP_Widget_Archives', 'title=' . esc_html__('Archives', 'newsmagz'), 'before_title=<h3 class="title-border   title-bg-line"><span>&after_title=<span class="line"></span></span></h3>&before_widget=<div class=" widget widget_archive">&after_widget=</div>');
}