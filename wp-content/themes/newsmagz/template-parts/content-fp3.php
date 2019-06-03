<?php
/**
 * Template for displaying newsmagz frontpage section.
 *
 * @package WordPress
 * @subpackage newsmagz
 */

$wp_query = new WP_Query(
	array(
		  'posts_per_page'        => $newsmagz_block_max_posts,
		  'order'                 => 'DESC',
		  'post_status'           => 'publish',
		  'ignore_sticky_posts'   => true,
		  'no_found_rows'       => true,
		  'category_name'         => ( ! empty( $newsmagz_block_category ) && $newsmagz_block_category != 'all' ? $newsmagz_block_category : ''),
	  )
);
 if ( $wp_query->have_posts() ) : ?>
	<div class="post-section newsmagz-fp-s1">

	<div class="owl-carousel newsmagz-fp-s1-posts smaller-nav no-radius">
		<?php

		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$postid = get_the_ID();
 		?>

		  <article <?php post_class('entry tp-post-item tp-item-block rowItem animate animate-moveup animate-fadein'); ?>>
 			<div class="tp-post-thumbnail newsmagz-thumb-small">
			  <figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"

">
				 
							 <?php
								$post_thumbnail_url = get_the_post_thumbnail( $postid, 'newsmagz_blk_big_thumb' );
											$post_thumbnail = apply_filters( 'newsmagz_get_prev_img', $post_thumbnail_url,'slider' );

											if ( ! empty( $post_thumbnail ) ) {
												echo $post_thumbnail;
											} else {
												echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
											}
							 ?>
				</a>
			  </figure> <!-- End figure -->

			</div> <!-- End .tp-post-thumbnail -->

			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="tp-post-item-meta">
 				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
 								<span class="tp-post-item-date"> <?php echo get_the_date( ); ?></span>

			  </div> <!-- End .tp-post-item-meta -->
			  <p><?php echo newsmagz_excerpt(8); ?></p>
 
		  </article> <!-- End .tp-post-item -->
		<?php
		  endwhile;
		?>
	</div> <!-- End .newsmagz-fp-s1-posts -->
	</div> <!-- End .newsmagz-fp-s1 -->
<?php
	endif;
	wp_reset_postdata();
?>