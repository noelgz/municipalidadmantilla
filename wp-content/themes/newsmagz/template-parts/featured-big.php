<?php
/**
 * Template part for displaying Featured Big posts content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newsmagz
 */
?>
<?php 

$newsmagz_featured_big_disable = (bool) get_theme_mod( 'newsmagz_featured_big_disable', false );
$newsmagz_block_grid_title = get_theme_mod( 'newsmagz_block_big_title', esc_html__( 'Latest Topics', 'newsmagz' ) );
$newsmagz_featured_big_category = esc_attr( get_theme_mod( 'newsmagz_featured_big_category', 'all' ) );
$wp_query = new WP_Query( array(
  'posts_per_page'        => 6,
  'order'                 => 'DESC',
  'post_status'           => 'publish',
  'ignore_sticky_posts'           => true,
  'category_name'         => ( ! empty( $newsmagz_featured_big_category ) && $newsmagz_featured_big_category != 'all' ? $newsmagz_featured_big_category : '' ),
) );

if( isset($cat)){

  $wp_query = new WP_Query( array(
   'posts_per_page'        => 6,
   'order'                 => 'DESC',
   'post_status'           => 'publish',
   'ignore_sticky_posts'           => true,
   'category_name'         => ( ! empty( $cat ) && $cat != 'all' ? $cat : '' ),
 ));

}

if ( (bool) $newsmagz_featured_big_disable !== true ) {
  if ( $wp_query->have_posts() ) { ?>
<div class="featured-wrap rowItem animate animate-moveup animate-fadein">

  <?php     if ( ! empty( $newsmagz_block_grid_title ) ) { ?>
  <h2 class="title-border title-bg-line mb30">
    <span><?php echo esc_attr( $newsmagz_block_grid_title ); ?><span class="line"></span></span>
  </h2>
  <?php
}  ?>


  <?php
  include( locate_template( 'template-parts/content-fp12.php' ) );  
  ?>                


</div><!-- End .featured-wrap -->
<div class="clear"></div>










<?php
} else {
  get_template_part( 'template-parts/content', 'none' );
}
wp_reset_postdata();
}