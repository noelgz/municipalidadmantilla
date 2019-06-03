<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newsmagz
 */

get_header(); 

if ( newsmagz_isprevdem() ) {
newsmagz_action_front_page();
newsmagz_action_content_bloc_start();
newsmagz_action_content_bloc();
newsmagz_action_content_bloc_end(); 
}else{
	newsmagz_action_content_bloc_start();

}

			if ( have_posts() ) : ?>
					
					<header class="page-header">
							<?php
  								
  								printf( '<h1 class="page-title title-border  title-bg-line"><span> %s<span class="line"></span></span></h1>',esc_html__( 'Latest Topics', 'newsmagz' ) );
 							?>
						</header><!-- .page-header -->
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
			the_posts_pagination( array(
				'prev_text' =>   '<i class="fa fa-caret-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'newsmagz' ) . '</span>',
				'next_text' => '<i class="fa fa-caret-right"></i><span class="screen-reader-text">' . __( 'Next page', 'newsmagz' ) . '</span>' ,
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'newsmagz' ) . ' </span>',
			) );			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			 
wp_reset_postdata();

newsmagz_action_content_bloc_end();

get_footer();
?>