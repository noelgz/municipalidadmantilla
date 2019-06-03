<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newsmagz
 */

get_header(); 
	
	$newsmagz_lo_class = 'col-md-9';
    if ( ! is_active_sidebar( 'newsmagz-sidebar' ) ) {
        $newsmagz_lo_class = 'col-md-12';
    }
?>

		<div id="primary" class="content-area">
			 
		<div  class="newsmagz-content-left <?php echo esc_attr($newsmagz_lo_class);?>">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
								// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="post-navi" aria-hidden="true">' . __( 'NEXT POST', 'newsmagz' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'newsmagz' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="post-navi" aria-hidden="true">' . __( 'PREVIOUS POST', 'newsmagz' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'newsmagz' ) . '</span> ' .
					'<span class="post-title">%title</span>',

			) );


						// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- .newsmagz-content-left -->
		</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
