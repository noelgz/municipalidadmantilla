<?php
/**
 * newsmagz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @package newsmagz
 */

  	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newsmagz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newsmagz, use a find and replace
		 * to change 'newsmagz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newsmagz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'newsmagz_blk_small_thumb', 170, 110, true );
		add_image_size( 'newsmagz_small_thumb_crop', 86, 70, true );
		add_image_size( 'newsmagz_blk_small_thumb_no_crop', 170, 110 );

		add_image_size( 'newsmagz_blk_big_thumb', 370, 250, true );
		add_image_size( 'newsmagz_blk_big_thumb_no_crop', 370, 250 );

		add_image_size( 'newsmagz_related_post', 288, 160, true );
		add_image_size( 'newsmagz_blog_post', 780, 544, true );
		add_image_size( 'newsmagz_blog_post_no_crop', 780, 544 );
 
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'newsmagz-top'  => esc_html__( 'Top Menu', 'newsmagz' ),
			'newsmagz-primary' => esc_html__( 'Primary Menu', 'newsmagz' ),
			'newsmagz-footer'  => esc_html__( 'Footer Menu', 'newsmagz' ),
			'social'  => esc_html__( 'Social Menu', 'newsmagz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
 			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		) );



	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),

	) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', array(
			'default-image' => get_template_directory_uri() . '/assets/images/newsmagz-background.jpg',
			'default-preset'         => 'fill',
			'default-repeat'         => 'no-repeat',
			'default-position-x'     => 'center',
			'default-attachment'     => 'fixed',
			'default-size'       => 'cover',
		) );


		register_default_headers( array(
			'wheel' => array(
				'url'           => get_stylesheet_directory_uri() . '/assets/images/banner.png',
				'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/banner_th.png',
				'description'   => __( 'Banner', 'newsmagz' ),
			),
		) );

 
		/*
		 * Welcome Page theme
		 */

		if ( is_admin() ) {

  
			require get_template_directory() . '/inc/about/about-newsmagz.php';
		}


 
	}



 
add_action( 'after_setup_theme', 'newsmagz_setup' );

/*AGREGE YO ESTA MIERDA*/
add_filter( 'widget_posts_args', 'my_widget_posts_args');
function my_widget_posts_args($args) {
 if ( is_category() ) { //adds the category parameter in the query if we display a category
 $cat = get_queried_object();
 return array(
 'posts_per_page' => 10,//el número de entradas a mostrar
 'no_found_rows' => true, 
 'post_status' => 'publish', 
 'ignore_sticky_posts' => true,
 'cat' => $cat -> term_id//el id de la categoría actual
 );
 }
 else { 
 return $args;
 }
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newsmagz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newsmagz_content_width', 840 );
}
add_action( 'after_setup_theme', 'newsmagz_content_width', 0 );




/**
 * Check what front page displays
 *
 * @return bool
 */
function newsmagz_is_not_latest_posts() {
	return ('posts' == get_option( 'show_on_front' ) ? false : true);
}

  

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require_once( 'inc/widgets/widgets.php' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsmagz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newsmagz' ),
		'id'            => 'newsmagz-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-border   title-bg-line"><span>',
		'after_title'   => '<span class="line"></span></span></h3>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Alt', 'newsmagz' ),
		'id'            => 'newsmagz-sidebaralt',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-border   title-bg-line"><span>',
		'after_title'   => '<span class="line"></span></span></h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Ad ', 'newsmagz' ),
		'id'            => 'newsmagz-header-ad',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );
 

	$sidebars = array(
		'a' => 'newsmagz-footer-block1',
		'b' => 'newsmagz-footer-block2',
		'c' => 'newsmagz-footer-block3',
	);
	foreach ( $sidebars as $sidebar ) {

		switch ( $sidebar ) {
			case 'newsmagz-footer-block1':
				$name = esc_html__( 'Footer Block 1','newsmagz' );
				break;
			case 'newsmagz-footer-block2':
				$name = esc_html__( 'Footer Block 2','newsmagz' );
				break;
			case 'newsmagz-footer-block3':
				$name = esc_html__( 'Footer Block 3','newsmagz' );
				break;
			default:
				$name = $sidebar;
		}

		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $sidebar,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border title-bg-line"><span>',
				'after_title'   => '<span class="line"></span></span></h3>',
			)
		);
	}

  	
}
add_action( 'widgets_init', 'newsmagz_widgets_init' );

/**
 * Create Google Fonts styles.
 */

function newsmagz_googlefonts() {
	$fonts_url = '';
	$font_families = array();

	/*
	 Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$ptserif = _x( 'on', 'PT Serif font: on or off', 'newsmagz' );
	$roboto = _x( 'on','Roboto font: on or off','newsmagz' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'newsmagz' );

	if ( 'off' !== $ptserif || 'off' !== $roboto || 'off' !== $open_sans ) {
		if ( 'off' !== $ptserif ) {
			$font_families[] = 'Playfair Display:400,700';
		}
		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,500,600,700';
		}
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,700,600';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function newsmagz_scripts() {

	wp_enqueue_style( 'newsmagz-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',array(), '3.3.5' );

	wp_enqueue_style( 'newsmagz-style', get_stylesheet_uri() );
	wp_enqueue_style( 'newsmagz-mobile', get_template_directory_uri() . '/assets/css/mobile.css',array(), '1.0.0' );
	
	wp_enqueue_style( 'newsmagz-googlefonts', newsmagz_googlefonts() , array(), null);

	wp_enqueue_style( 'newsmagz-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css',array(), '4.4.0' );


	if ( 'page' == get_option( 'show_on_front' ) && is_front_page() || is_home()) {
		wp_enqueue_script( 'newsmagz-script-home', get_template_directory_uri() . '/assets/js/newsmagz.home.js', array( 'jquery' ), '1.0.0', true );
	}

	if ( is_single() ) {
		wp_enqueue_script( 'newsmagz-script-single', get_template_directory_uri() . '/assets/js/newsmagz.single.js', array( 'jquery' ), '1.0.0', true );
	}

	wp_enqueue_script( 'newsmagz-perfectscrollbar', get_template_directory_uri() . '/assets/js/perfect-scrollbar.min.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'newsmagz-global-all', get_template_directory_uri() . '/assets/js/newsmagz.global.js', array( 'jquery' ), '1.0.1', true );
	wp_localize_script( 'newsmagz-global-all', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'newsmagz' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'newsmagz' ) . '</span>',
	) );
	$sticky_menu = get_theme_mod( 'newsmagz_sticky_menu', false );
	wp_localize_script( 'newsmagz-global-all', 'stickyMenu', array(
		'disable_sticky' => $sticky_menu,
	) );

	wp_enqueue_script( 'newsmagz-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newsmagz_scripts' );



/**
 * Enqueue custom styles.
 */
function newsmagz_inline_css() {
   	//inline style
		wp_add_inline_style( 'newsmagz-style', newsmagz_inline_style() );

}

add_action( 'wp_head', 'newsmagz_inline_css', 100 );

  /**
 * require newsmagz files.
 */
require get_template_directory() . '/inc/hooks/header.php';
require get_template_directory() . '/inc/hooks/footer.php';
require get_template_directory() . '/inc/hooks/inline-style.php';
/**
 * Preview Theme Demo
 */
require_once( get_template_directory() . '/inc/prevdem_tpacific/init-prevdem.php' );
 
/**
 * Custom functions  
 */
require get_template_directory() . '/inc/functions/custom-functions.php';


/**
 * Customizer additions.
 */


function newsmagz_customize_register_required(){
  	require( get_template_directory() . '/inc/customizer/newsmagz-info.php' );
	require( get_template_directory() . '/inc/customizer/customizer-repeater/newsmagz-general-control.php' );

}
add_action( 'customize_register', 'newsmagz_customize_register_required' );


require get_template_directory() . '/inc/customizer/customizer.php';
 
/**
 * Enables user customization via WordPress plugin API
 */
require get_template_directory() . '/inc/hooks/hooks.php'; 

/**
 * Get Post via Ajax function Customize
 */
function newsmagz_get_post_aj() {
 	$block_hm = $_POST['section'];


	if ( $block_hm == 'newsmagz_featured_big_cat' ) {
		$cat = $_POST['category'];
		$tp_no_of_posts = $_POST['tp_no_of_posts'];

		$wp_query = new WP_Query( array(
			'posts_per_page'        => $tp_no_of_posts,
			'order'                 => 'DESC',
			'post_status'           => 'publish',
			'category_name'         => ( ! empty( $cat ) && $cat != 'all' ? $cat : '' ),
		));
			

			include( locate_template( 'template-parts/featured-big.php' ) );
	 
 	}

 	if ( $block_hm == 'newsmagz_topslider_category' ) {
		$cat = $_POST['category'];
		$tp_no_of_posts = $_POST['tp_no_of_posts'];

		$wp_query = new WP_Query( array(
			'posts_per_page'        => $tp_no_of_posts,
			'order'                 => 'DESC',
			'post_status'           => 'publish',
			'category_name'         => ( ! empty( $cat ) && $cat != 'all' ? $cat : '' ),
		));

		if ( $wp_query->have_posts() ) : ?>
			 
				<div class="owl-carousel newsmagz-top-carousel">
					<?php
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						get_template_part( 'template-parts/slider-posts', get_post_format() );
					endwhile;
					?>
				</div><!-- End .newsmagz-top-carousel -->
		 
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		wp_reset_postdata();
	}

	if ( $block_hm == 'newsmagz_block1_category' ) {
		$newsmagz_block_category = $_POST['category'];
		$newsmagz_block_max_posts = $_POST['tp_no_of_posts'];
		$postperpage = $_POST['posts_per_page'];
		include( locate_template( 'template-parts/content-fp1.php' ) );
	}

	if ( $block_hm == 'newsmagz_block2_category' ) {
		$newsmagz_block_category = $_POST['category'];
		$newsmagz_block_max_posts = $_POST['tp_no_of_posts'];
		include( locate_template( 'template-parts/content-fp3.php' ) );
	}

	if ( $block_hm == 'newsmagz_block3_category' ) {
		$newsmagz_block_category = $_POST['category'];
		$newsmagz_block_max_posts = $_POST['tp_no_of_posts'];
		include( locate_template( 'template-parts/content-fp2.php' ) );
	}

	if ( $block_hm == 'newsmagz_block4_category' ) {
		$newsmagz_block_category = $_POST['category'];
		$newsmagz_block_max_posts = $_POST['tp_no_of_posts'];
		include( locate_template( 'template-parts/content-fp3.php' ) );
	}
 

	die();
}

/**
 * Function to Show Home Block.
 *
 * @param int  $block_hm_styl Block number.
 * 
 */
function newsmagz_show_block( $block_hm_styl) {
 	$fp_style = 1;
 	switch ( $block_hm_styl ) {
		case 1:
			$postperpage = get_theme_mod( 'newsmagz_block1_posts_per_page', 4 );
 			$fp_style = $block_hm_styl;
			$newsmagz_block_title = get_theme_mod( 'newsmagz_block1_title' ,'Block 1');
 			break;
		case 2:
			$fp_style = 3;
			$newsmagz_block_title = get_theme_mod( 'newsmagz_block2_title', esc_html__( 'Block 2', 'newsmagz' ) );
 			break;
		case 3:
			$fp_style = 2;
			$newsmagz_block_title = get_theme_mod( 'newsmagz_block3_title', esc_html__( 'Block 3', 'newsmagz' ) );
 			break;
		case 4:
			$fp_style = 3;
			$newsmagz_block_title = get_theme_mod( 'newsmagz_block4_title', esc_html__( 'Block 4', 'newsmagz' ) );
 			break;
 	}
 
 	$newsmagz_block_category = esc_attr( get_theme_mod( 'newsmagz_block' . $block_hm_styl . '_category', 'all' ) );
	$newsmagz_block_max_posts = absint( get_theme_mod( 'newsmagz_block' . $block_hm_styl . '_max_posts', 6 ) );  
	if($fp_style == 1){
		$newsmagz_block_max_posts = absint( get_theme_mod( 'newsmagz_block' . $block_hm_styl . '_max_posts', 8 ) );
	}
		

	 ?>
	<div class="newsmagz-block<?php echo $block_hm_styl; ?>">
 			<?php
  			 
 		if ( ! empty( $newsmagz_block_title ) ) { ?>
			<h2 class="title-border title-bg-line mb30">
				<span><?php echo esc_attr( $newsmagz_block_title ); ?><span class="line"></span></span>
			</h2>
			<?php
		}  

		include( locate_template( 'template-parts/content-fp' . $fp_style . '.php' ) ); ?>
	</div>
	<?php
}
