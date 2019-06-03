<?php

if( ! function_exists( 'newsmagz_inline_style' ) ) :

    /**
     * newsmagz wp_head hook
     *
     * @since  newsmagz 1.0.0
     */
    function newsmagz_inline_style(){
 
        echo '<style type="text/css">';

    $newsmagz_title_color = esc_attr( get_theme_mod( 'newsmagz_title_color',apply_filters( 'newsmagz_title_color_default_filter','#333' ) ) );
    if ( ! empty( $newsmagz_title_color ) ) {
        echo '.title-border span { color: ' . $newsmagz_title_color . ' }';
         echo '.page-header h1 { color: ' . $newsmagz_title_color . ' }';
    }

    $newsmagz_sidebar_textcolor = esc_attr( get_theme_mod( 'header_textcolor',apply_filters( 'newsmagz_header_textcolor_default_filter','#181818' ) ) );
    if ( ! empty( $newsmagz_sidebar_textcolor ) ) {
        echo '.sidebar .widget li a, .newsmagz-content-right, .newsmagz-content-right a, .post .entry-content, .post .entry-content p,
         .post .entry-cats, .post .entry-cats a, .post .entry-comments', '.post .entry-separator, .post .entry-footer a,
         .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content { color: ' . $newsmagz_sidebar_textcolor . '}';
    }

    $newsmagz_top_slider_post_title_color = esc_attr( get_theme_mod( 'newsmagz_top_slider_post_title_color','#ffffff' ) );
    if ( ! empty( $newsmagz_top_slider_post_title_color ) ) {
        echo '.newsmagz-featured-slider .tp-item-block .tp-post-item-meta .entry-title a { color: ' . $newsmagz_top_slider_post_title_color . ' }';
    }

    $newsmagz_top_slider_post_text_color = esc_attr( get_theme_mod( 'newsmagz_top_slider_post_text_color','#ffffff' ) );
    if ( ! empty( $newsmagz_top_slider_post_text_color ) ) {
        echo '.newsmagz-featured-slider .tp-post-item-meta .tp-post-item-date { color: ' . $newsmagz_top_slider_post_text_color . ' }';
        echo '.newsmagz-featured-slider .tp-post-item-meta .entry-separator { color: ' . $newsmagz_top_slider_post_text_color . ' }';
        echo '.newsmagz-featured-slider .tp-post-item-meta > a { color: ' . $newsmagz_top_slider_post_text_color . ' }';
    }

    $newsmagz_blocks_post_title_color = esc_attr( get_theme_mod( 'newsmagz_blocks_post_title_color',apply_filters( 'newsmagz_blocks_post_title_color_default_filter','#333' ) ) );
    if ( ! empty( $newsmagz_blocks_post_title_color ) ) {
        echo '.home.blog .newsmagz-content-left .entry-title a, .newsmagz-related-posts .entry-title a { color: ' . $newsmagz_blocks_post_title_color . ' }';
    }

    $newsmagz_blocks_post_text_color = esc_attr( get_theme_mod( 'newsmagz_blocks_post_text_color',apply_filters( 'newsmagz_blocks_post_text_color_default_filter','#333' ) ) );
    if ( ! empty( $newsmagz_blocks_post_text_color ) ) {
        echo '.newsmagz-content-left .entry-meta, .newsmagz-content-left .newsmagz-related-posts .entry-content p,
        .newsmagz-content-left .newsmagz-related-posts .entry-cats .entry-label, .newsmagz-content-left .newsmagz-related-posts .entry-cats a,
        .newsmagz-content-left .newsmagz-related-posts > a, .newsmagz-content-left .newsmagz-related-posts .entry-footer > a { color: ' . $newsmagz_blocks_post_text_color . ' }';
        echo '.newsmagz-content-left .entry-meta a { color: ' . $newsmagz_blocks_post_text_color . ' }';
    }


      $get_categories = get_terms( 'category', array( 'hide_empty' => false ) );
 
        foreach( $get_categories as $category ){

            $cat_color = esc_attr( get_theme_mod( 'newsmagz_category_color_'.strtolower( $category->name ), '#dd3333' ) );
             $cat_id = esc_attr( $category->term_id );
            
            if( !empty( $cat_color ) ) {
                echo  ".category-button.mt-cat-".$cat_id." a { background: ". $cat_color ."}";

 
  
             }
        }

    echo '</style>';
      
     
    }
endif;