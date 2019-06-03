<?php

if ( ! function_exists( 'newsmagz_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function newsmagz_entry_footer() {
        // Hide category and tag text for pages.
        echo '<footer class="entry-footer">';
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */ 
            $categories_list = get_the_category_list();
            if ( $categories_list ) {
                /* translators: Categories list */
                printf( '<span class="cat-links"> %1$s </span>', $categories_list ); // WPCS: XSS OK.
            }
        }

     /* */
            echo '</footer>';
    }
endif;
add_action( 'newsmagz_entry_footer','newsmagz_entry_footer' );

if ( ! function_exists( 'newsmagz_widget_before_footer' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_widget_before_footer() {
?>
            <div id="footer-inner">
                <div class="container">
                    <div class="row">

 
                        <?php if ( is_active_sidebar( 'newsmagz-footer-block1' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" class="col-md-4 col-sm-12 newsmagz-footer-widget" id="sidebar-widgets-area-1" aria-label="<?php esc_attr_e( 'Widgets Area 1','newsmagz' ); ?>">
                                    <?php dynamic_sidebar( 'newsmagz-footer-block1' ); ?>
                                </div>
                        <?php }

                        if ( is_active_sidebar( 'newsmagz-footer-block2' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-2" class="col-md-4 col-sm-12 newsmagz-footer-widget" aria-label="<?php esc_attr_e( 'Widgets Area 2','newsmagz' ); ?>">
                                    <?php dynamic_sidebar( 'newsmagz-footer-block2' ); ?>
                                </div>
                        <?php }

                        if ( is_active_sidebar( 'newsmagz-footer-block3' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-3" class="col-md-12 col-sm-12 newsmagz-footer-widget" aria-label="<?php esc_attr_e( 'Widgets Area 3','newsmagz' ); ?>">
                                    <?php dynamic_sidebar( 'newsmagz-footer-block3' ); //poner en col-md-4 original ?>
                                </div>
                        <?php
                            }
                        ?>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-inner -->
<?php
}
endif;
  
add_action( 'newsmagz_action_widget_before_footer', 'newsmagz_widget_before_footer', 10 );










if ( ! function_exists( 'newsmagz_footer_container_start' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_footer_container_start() {
?>
<div id="footer-bottom" class="no-bg">
        <div class="container">
              <div class="newsmagz-footer-container">
<?php
}
endif;
add_action( 'newsmagz_action_footer_container_start', 'newsmagz_footer_container_start', 10 );
 


/**
 * Display footer function.
 */
function newsmagz_footer() {
    ?>
    <div class="col-md-6 col-md-push-6 newsmagz-footer-menu">
        <?php

        $defaults = array(
            'theme_location'  => 'newsmagz-footer',
            'fallback_cb'     => false,
            'items_wrap'      => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 1,
        );

        wp_nav_menu( $defaults );

        ?>
    </div><!-- End .col-md-6 -->
    <div class="col-md-6 col-md-pull-6 poweredby">
        <?php printf(
            /* translators: 1 - Theme name , 2 - WordPress link */
            __( ' %1$s %5$s  %2$s %3$s', 'Noel González' ),
             esc_html__('&copy;  ','Noel González'),
            sprintf('%s <a href="%1s" title="%2s">%3s</a>',esc_html__( '- Diseñado y desarrollado por', 'Noel González' ),  esc_url('#'),esc_attr__( 'Free Noel González News Magazine WordPress Theme', 'Noel González' ), esc_html__( 'Noel González', 'Noel González' ) ),
            sprintf( '<a href="https://wordpress.org/">%s</a>', esc_html__( '', 'Noel González' )),
            get_bloginfo( 'name' ),
            date( 'Y' )
        ); ?>
    </div><!-- End .col-md-6 -->
    <?php
}
add_action( 'newsmagz_action_footer_content','newsmagz_footer' );


if ( ! function_exists( 'newsmagz_footer_container_end' ) ) :
/**
 * page start
 *
 * @since newsmagz 1.0.0
 *
 * @param null
 * @return null
 *
 */
function newsmagz_footer_container_end() {
?>
                </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-bottom -->
        </footer><!-- End #footer -->
    <?php
}
endif;
add_action( 'newsmagz_action_footer_container_end', 'newsmagz_footer_container_end', 10 );

