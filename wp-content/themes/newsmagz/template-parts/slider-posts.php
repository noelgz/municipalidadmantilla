<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newsmagz
 */

?>
<article <?php post_class('entry tp-post-item tp-item-block rowItem  '); ?>>
	<?php newsmagz_top_slider_posts_trigger(); ?>
	<?php   newsmagz_post_categories_link();?>

	<div class="tp-post-thumbnail">
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php
 


				$post_thumbnail_url = get_the_post_thumbnail( $wp_query->ID, 'newsmagz_blk_big_thumb_no_crop' );
				$post_thumbnail = apply_filters( 'newsmagz_get_prev_img', $post_thumbnail_url,'slider' );

				if ( ! empty( $post_thumbnail ) ) {
					echo $post_thumbnail;
				} else {
					echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
				}



				?>
			</a>
		</figure>
	</div><!-- End .tp-post-thumbnail -->

	<div class="tp-post-item-meta">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>', apply_filters( 'newsmagz_filter_article_title_on_slider_posts',true ) ); ?>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
		<span class="tp-post-item-date"> <?php echo get_the_date(  ); ?></span>

	</div><!-- End .tp-post-item-meta -->
	<?php newsmagz_bottom_slider_posts_trigger(); ?>
</article>
