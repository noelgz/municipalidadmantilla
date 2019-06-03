<?php


if ( ! function_exists( 'newsmagz_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <?php
    }
endif;
add_action( 'newsmagz_action_before_head', 'newsmagz_doctype', 10 );

if ( ! function_exists( 'newsmagz_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_before_wp_head() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;
add_action( 'newsmagz_action_before_wp_head', 'newsmagz_before_wp_head', 10 );


if ( ! function_exists( 'newsmagz_page_start' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_page_start() {
 $newsmagz_site_style = esc_attr(get_theme_mod( 'newsmagz_site_style','container' ));
 ?>
 <div id="page" class="site">
    <div id="wrapper" class="<?php echo $newsmagz_site_style;?>">
        <?php
    }
endif;
add_action( 'newsmagz_action_page_start', 'newsmagz_page_start', 15 );

if ( ! function_exists( 'newsmagz_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'newsmagz' ); ?>"><?php esc_html_e( 'Skip to content', 'newsmagz' ); ?></a>
    <?php
}
endif;
add_action( 'newsmagz_action_header_links', 'newsmagz_skip_to_content', 10 );



if ( ! function_exists( 'newsmagz_header' ) ) :
/**
 * Main header
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_header() {
 $newsmagz_site_style = esc_attr(get_theme_mod( 'newsmagz_site_style','container' ));
 ?>
 <header id="header" class="site-header tp_header_v2" role="banner">
    <div  class="navbar-top container-fluid <?php echo $newsmagz_site_style;?>">

        <?php newsmagz_action_inner_navbar_top(); ?>

        <div class="navbar-left social-links">
            <?php               if ( has_nav_menu( 'social' ) ) : ?>
                <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header Social Links Menu', 'newsmagz' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'social',
                        'menu_class'     => 'social-links-menu',
                        'depth'          => 1,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>' . newsmagz_get_svg( array( 'icon' => 'chain' ) ),
                    ) );
                    ?>
                </nav><!-- .social-navigation -->
            <?php endif;?>
        </div>


        <span class="breaking"><?php _e( 'Trending', 'newsmagz' );?></span>
        <div class="newsmagz-breaking-container"><ul class="newsmagz-breaking">
          <?php
          $wp_query = new WP_Query( array(
                //'posts_per_page'        => $newsmagz_featured_slider_max_posts,
            'posts_per_page'        => 4,
            'order'                 => 'DESC',
            'post_status'           => 'publish',
        ) );

          while ( $wp_query->have_posts() ) : $wp_query->the_post();
           ?>
           <li>
              <?php the_title( sprintf( ' <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>', apply_filters( 'newsmagz_filter_article_title_on_slider_posts',true ) ); ?>

          </li> 
          <?php
      endwhile;
      wp_reset_postdata(); 
      ?></ul>
  </div>   <!-- .newsmagz-breaking-container -->

  <div class="navbar-right">
      <div id="navbar" class="navbar">
        <nav id="navigation-top" class="navigation-top" role="navigation">
            <button class="menu-toggle"><i class="fa fa-bars"></i></button>

            <?php newsmagz_action_header_links();
            if ( has_nav_menu( 'newsmagz-top' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'newsmagz-top',
                    'menu_class' => 'nav-menu ',
                    'menu_id' => 'primary-menu',
                    'depth' => 1,
                ) );  
            } 
            ?>
        </nav><!-- #navigation-top -->
    </div>
    <div class="tp_time_date"><i class="fa fa-calendar-o"></i><span><?php  echo date_i18n(get_option('date_format'));?></span></div>
</div>

<?php newsmagz_after_navbar_top();?>

</div>

<div class="inner-header clearfix <?php echo $newsmagz_site_style;?>">

    <?php newsmagz_action_inner_header(); ?>

    <div class="col-md-3 col-sm-3 col-xs-12 navbar-brand">
      <div class="site-branding">
        <?php

        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :

            the_custom_logo();

            echo '<div class="head-logo-container text-header newsmagz_customizer_only">';
            echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
            echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
            echo '</div>';

        else :

         echo '<div class="head-logo-container text-header">';
         echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
         echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
         echo '</div>';

     endif;
     ?>
 </div><!-- .site-branding -->
</div>

<div class="col-xs-12  col-sm-9 col-md-9 newsmagz-a-d-v">
    <?php
    if ( is_active_sidebar( 'newsmagz-header-ad' ) ) {
        dynamic_sidebar( 'newsmagz-header-ad' );
    }?>
</div>

<?php newsmagz_action_after_inner_header(); ?>

</div> <!--.inner-header-->

<?php newsmagz_action_before_main_nav(); ?>

<?php $newsmagz_sticky_menu = get_theme_mod( 'newsmagz_sticky_menu', false ); ?>

<div id="navbar" class="navbar <?php if ( isset( $newsmagz_sticky_menu ) && $newsmagz_sticky_menu == false ) { echo 'newsmagz-sticky';} ?>">

  <nav id="site-navigation" class="navigation main-navigation" role="navigation">
      <div  class="prim-navigation <?php echo $newsmagz_site_style;?>" >
        <button class="menu-toggle"><i class="fa fa-bars"></i></button>
        <button type="button" class="navbar-btn nav-mobile"><i class="fa fa-search"></i></button>
        <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'newsmagz' ); ?>"><?php _e( 'Skip to content', 'newsmagz' ); ?></a>
        <div class="main-nav-sidebar">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <?php 

        wp_nav_menu( array(
            'theme_location' => 'newsmagz-primary',
            'menu_class' => 'nav-menu ',
            'menu_id' => 'primary-menu',
            'depth' => 6,
        ) );
        ?>

        <button type="button" class="navbar-btn nav-desktop"><i class="fa fa-search"></i></button>

        <div class="navbar-white top" id="header-search-form">
            <?php get_search_form(); ?>
        </div><!-- End #header-search-form -->
    </div>
</nav><!-- #site-navigation -->


</div><!-- #navbar -->

<?php newsmagz_action_after_main_nav(); ?>


</header><!-- End #header -->
<?php 
}
endif;
add_action( 'newsmagz_action_header', 'newsmagz_header', 10 );

if ( ! function_exists( 'newsmagz_site_content_start' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_site_content_start() {
 $newsmagz_site_style = esc_attr(get_theme_mod( 'newsmagz_site_style','container' ));
 ?>
 <div id="content" class="site-content <?php echo $newsmagz_site_style; ?>">     
    <div class="sidebar-alt-wrap">
        <div class="sidebar-alt-close image-overlay"  ></div>
        <aside class="sidebar-alt ps-container" >

            <div class="sidebar-alt-close-btn">
                <span></span>
                <span></span>
            </div>

            <aside id="secondary" class="widget-area col-md-12 sidebar" role="complementary">
                <?php

                if(newsmagz_isprevdem()){
                    newsmagz_preview_alt_sidebar();
                }else{
                    if (  is_active_sidebar( 'newsmagz-sidebaralt' ) ) {
                        dynamic_sidebar( 'newsmagz-sidebaralt' );

                    }else{
                        _e("No Active Widgets in Sidebar Alt","newsmagz");
                    }

                }




                ?>
            </aside>


        </aside>
    </div>
    <?php
}
endif;
add_action( 'newsmagz_action_site_content_start', 'newsmagz_site_content_start', 15 );









if ( ! function_exists( 'newsmagz_site_content_end' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_site_content_end() {
    ?>
</div><!-- #content -->

<footer id="footer" class="site-footer footer-inverse" role="contentinfo">
    <?php
}
endif;
add_action( 'newsmagz_action_site_content_end', 'newsmagz_site_content_end', 10 );




if ( ! function_exists( 'newsmagz_page_end' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_page_end() {
    ?>
</div><!-- #page -->
</div><!-- End #wrapper -->

<?php
}
endif;
add_action( 'newsmagz_action_page_end', 'newsmagz_page_end', 10 );





/////front page hooks

if ( ! function_exists( 'newsmagz_home_slider' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_home_slider(){
    ?>
    <?php

    $newsmagz_featured_slider_disable1 = (bool) get_theme_mod( 'newsmagz_featured_slider1_disable', false );
    $newsmagz_featured_slider_category1 = esc_attr( get_theme_mod( 'newsmagz_featured_slider1_category', 'all' ) );
    $newsmagz_featured_slider_max_posts1 = esc_attr( get_theme_mod( 'newsmagz_featured_slider1_max_posts', '6' ) );

    $wp_query = new WP_Query( array(
        'posts_per_page'        => $newsmagz_featured_slider_max_posts1,
        'order'                 => 'DESC',
        'post_status'           => 'publish',
        'category_name'         => ( ! empty( $newsmagz_featured_slider_category1 ) && $newsmagz_featured_slider_category1 != 'all' ? $newsmagz_featured_slider_category1 : '' ),
    ) );

    $newsmagz_block_title = get_theme_mod( 'newsmagz_featured_slider1_title', esc_html__( 'Latest Topics', 'newsmagz' ) );


    if ( (bool) $newsmagz_featured_slider_disable1 !== true ) {
        if ( $wp_query->have_posts() ) { ?>

        <div class="newsmagz-featured-slider newsmagz-top-slider">

           <?php     if ( ! empty( $newsmagz_block_title ) ) { ?>
           <h2 class="title-border title-bg-line mb30">
            <span><?php echo esc_attr( $newsmagz_block_title ); ?><span class="line"></span></span>
        </h2>
        <?php
    }  ?>
    <div class="owl-carousel newsmagz-top-slider">
        <?php
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
            get_template_part( 'template-parts/slider-posts1', get_post_format() );
        endwhile;
        ?>
    </div><!-- End .newsmagz-top-carousel -->
</div><!-- End .newsmagz-featured-slider -->
<div class="clear"></div>
<?php
} else {
    get_template_part( 'template-parts/content', 'none' );
}
wp_reset_postdata();
}
?>





<?php
get_template_part( 'template-parts/featured-big', get_post_format() );



?>

<?php

$newsmagz_featured_slider_disable = (bool) get_theme_mod( 'newsmagz_featured_slider_disable', false );
$newsmagz_featured_slider_category = esc_attr( get_theme_mod( 'newsmagz_featured_slider_category', 'all' ) );
$newsmagz_featured_slider_max_posts = esc_attr( get_theme_mod( 'newsmagz_featured_slider_max_posts', '6' ) );

$wp_query = new WP_Query( array(
    'posts_per_page'        => $newsmagz_featured_slider_max_posts,
    'order'                 => 'DESC',
    'post_status'           => 'publish',
    'category_name'         => ( ! empty( $newsmagz_featured_slider_category ) && $newsmagz_featured_slider_category != 'all' ? $newsmagz_featured_slider_category : '' ),
) );

$newsmagz_block_title = get_theme_mod( 'newsmagz_featured_slider_title', esc_html__( 'Latest Topics', 'newsmagz' ) );

if ( (bool) $newsmagz_featured_slider_disable !== true ) {
    if ( $wp_query->have_posts() ) { ?>

    <div class="newsmagz-featured-slider">

       <?php     if ( ! empty( $newsmagz_block_title ) ) { ?>
       <h2 class="title-border title-bg-line mb30">
        <span><?php echo esc_attr( $newsmagz_block_title ); ?><span class="line"></span></span>
    </h2>
    <?php
}  ?>
<div class="owl-carousel newsmagz-top-carousel">
    <?php
    while ( $wp_query->have_posts() ) : $wp_query->the_post();
        get_template_part( 'template-parts/slider-posts', get_post_format() );
    endwhile;
    ?>
</div><!-- End .newsmagz-top-carousel -->
</div><!-- End .newsmagz-featured-slider -->
<div class="clear"></div>
<?php
} else {
    get_template_part( 'template-parts/content', 'none' );
}
wp_reset_postdata();
}


}
endif;
add_action( 'newsmagz_action_front_page', 'newsmagz_home_slider', 10 );


if ( ! function_exists( 'newsmagz_content_bloc_start' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_home_content_bloc_start(){

    $newsmagz_lo_class = 'col-md-9';
    if ( ! is_active_sidebar( 'newsmagz-sidebar' ) ) {
        $newsmagz_lo_class = 'col-md-12';
    }
    ?>
    <div class="container">
        <div class="row">

            <div class="newsmagz-content-left <?php echo $newsmagz_lo_class;?>">
                <?php

            }
        endif;
        add_action( 'newsmagz_action_content_bloc_start', 'newsmagz_home_content_bloc_start', 40 );


        if ( ! function_exists( 'newsmagz_content_bloc_end' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_home_content_bloc_end(){
    ?>
</div><!-- End .newsmagz-content-left -->
<?php get_sidebar(); ?>
</div><!-- End .row -->
</div><!-- End .container -->
<?php
}
endif;
add_action( 'newsmagz_action_content_bloc_end', 'newsmagz_home_content_bloc_end', 40 );


if ( ! function_exists( 'newsmagz_content_bloc' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_home_content_bloc(){
    $newsmagz_block1_disable = (bool) get_theme_mod( 'newsmagz_block1_disable', false );
    $newsmagz_block2_disable = (bool) get_theme_mod( 'newsmagz_block2_disable', false );
    $newsmagz_block3_disable = (bool) get_theme_mod( 'newsmagz_block3_disable', false );
    $newsmagz_block4_disable = (bool) get_theme_mod( 'newsmagz_block4_disable', false );
    $newsmagz_block5_disable = (bool) get_theme_mod( 'newsmagz_block5_disable', false );


    if ( ! $newsmagz_block1_disable ) {
        newsmagz_show_block( 1 );
    }


    if ( ! $newsmagz_block2_disable ) {
        newsmagz_show_block( 2 );
    }

    if ( ! $newsmagz_block3_disable ) {
        newsmagz_show_block( 3 );
    }

    if ( ! $newsmagz_block4_disable ) {
        newsmagz_show_block( 4 );
    }


    
}
endif;
add_action( 'newsmagz_action_content_bloc', 'newsmagz_home_content_bloc', 40 );