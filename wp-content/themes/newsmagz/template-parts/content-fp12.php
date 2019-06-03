<?php
/**
 * Template for displaying newsmagz frontpage section.
 *
 * @package WordPress
 * @subpackage newsmagz
 */


if ( $wp_query->have_posts() ) : ?>
<div class="post-section newsmagz-fp-s4 newsmagz-fp-s12"   >
	<div class="row">

		<?php
		$count = 0;
		$countm = 2;
		$ratingSize = 's';
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$category = get_the_category();
			$postid = get_the_ID();

			$img_class=$iart_class=$excerpt=''; 

			$excerpt = '<p>'.newsmagz_excerpt(8).'</p>';


			if($count <= 1) {

				$img_class= "newsmagz-big"; 
				$iart_class= "newsmagz-big"; 
				$thumd = 'newsmagz_crnblk_big_thumb_grid';
				$colclass = 'col-sm-6 ';

				$excerpt = '<p>'.newsmagz_excerpt(18).'</p>';
			} else {$img_class= "newsmagz-thumb-small"; $iart_class="eb-small"; $thumd = 'newsmagz_crnsmall_grid'; $excerpt ='';$colclass = 'col-sm-3 ';}   
			?>

			<div class="<?php echo $colclass; if($countm % 4 ==0) echo 'first'; ?>">
				<article <?php post_class('entry crn-post-item crn-item-block '. esc_attr($iart_class).' rowItem animate animate-moveup animate-fadein'); ?> >
					<?php  if($count <= 1) { 

						$ratingSize = 'm';
						
						?>

						<?php } newsmagz_post_categories_link();?>
						<div class="crn-post-thumbnail <?php echo esc_attr($img_class);?>">
							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php

									if(function_exists('themepacific_wpreviewCustomSmall')){
										echo newsmagz_crnrating_show_fn($ratingSize);
									}							
 
									$post_thumbnail_url = get_the_post_thumbnail($post->ID, $thumd );
									 $post_thumbnail = apply_filters( 'newsmagz_get_prev_img', $post_thumbnail_url,'' );
 
									if ( ! empty( $post_thumbnail ) ) {
										echo $post_thumbnail;
									} else {
										echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-default.jpg" />';
									}
 
									?>
								</a>
							</figure> <!-- End figure -->
						</div> <!-- End .crn-post-thumbnail -->

						<?php 

						if($count <=1){ ?>
						<div class="crn-post-item-meta">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<?php newsmagz_entry_meta_content_fp_no_icon();?>

						</div> <!-- End .crn-post-item-meta -->

						<?php }else{ ?>
						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="entry-meta">

							<?php newsmagz_entry_meta_content_fp_no_icon();?>


						</div> <!-- End .entry-meta -->

						<?php	}

						?>
					</article> <!-- End .crn-item-block -->
				</div> <!-- End .col-sm-6 -->
				<?php
				$count++;$countm++;
			endwhile;
			?>

		</div> <!-- End .row -->
	</div> <!-- End .post-section -->
<?php endif;
wp_reset_postdata(); ?>