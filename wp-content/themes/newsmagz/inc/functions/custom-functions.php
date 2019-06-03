<?php

/**
 * Custom functions that act independently of the theme templates.
 *
 * @package newsmagz
 */

/**
 * Home Icon Menu
 */

add_filter( 'wp_nav_menu_items', 'newsmagz_custom_menu_filter', 10, 2 );
function newsmagz_custom_menu_filter( $items, $args ) {
    /**
     * If menu primary menu is set.
     */
    if ( $args->theme_location == 'newsmagz-primary' ) {        

    	$home = '<li class="menu-item menu-item-home menu-item-home-icon"><a href="' . esc_url( home_url( '/' ) ) . '" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"><i class="fa fa-home" aria-hidden="true"></i></a></li>';
    	$items = $home . $items;
    }

    return $items;
}


/**
 * Sets the Magazine Template Instead of front-page.
 */
function newsmagz_fp_template_set( $template ) {
	$newsmagz_set_original_fp = get_theme_mod( 'newsmagz_set_original_fp' ,false);
	if ( $newsmagz_set_original_fp ) {
		return is_home() ? '' : $template;
	} else {
		return '';
	}
}
add_filter( 'frontpage_template', 'newsmagz_fp_template_set' );

function  newsmagz_entry_meta_content_fp_no_icon() {
	if ( 'post' === get_post_type() ) {  

		$author_id = get_the_author_meta( 'ID' );
		$profile_pic = get_avatar_url( $author_id, array('size'=>'20') );
		?>
		<span class="crn-post-item-author">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author">  <?php the_author(); ?></a>
		</span>

		<span class="crn-post-item-date">
			<?php echo get_the_date(); ?>
		</span>
		<?php
		if(function_exists('tp_pviews_count')){
			echo tp_pviews_count();
		}
		
	} 
}
/**
 *  Excerpt
 **/
function newsmagz_excerpt($limit) {
	return wp_trim_words(get_the_excerpt(), $limit);
}


function newsmagz_post_categories_link() {
	global $post;
	$post_id = $post->ID;
	$categories_list = get_the_category( $post_id );
	if( !empty( $categories_list ) ) {
		?>
		<div class="cat-links">
			<ul>
				<?php 
				$count = 0;
				foreach ( $categories_list as $cat_data ) {
					if($count < 2){
						$cat_name = $cat_data->name;
						$cat_id = $cat_data->term_id;
						$cat_link = esc_url(get_category_link( $cat_id ));
						?>
						<li class="category-button mt-cat-<?php echo esc_attr( $cat_id ); ?>"><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $cat_name ); ?></a></li>
						<?php 
					}
					$count++;
				}
				?>
			</ul>
		</div>
		<?php
	}
}


add_filter('wp_list_categories', 'newsmagz_cat_count_span');
function newsmagz_cat_count_span($links) {
	$links = str_replace('</a> (', ' <span>', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}

/**
 * Callback function for comment form
 **/
function newsmagz_comment( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div ';
		$add_below = 'comment newsmagz-mag-comment';
	} else {
		$tag       = 'li ';
		$add_below = 'div-comment newsmagz-mag-comment';
	}
	?>
	<<?php echo $tag ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>

		<?php
		newsmagz_comment_content( $args, $comment, $depth, $add_below ); ?>

		<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}



add_action( 'wp_ajax_nopriv_get_post_aj_act', 'newsmagz_get_post_aj' );
add_action( 'wp_ajax_get_post_aj_act', 'newsmagz_get_post_aj' );

$newsmagz_block1_category = '';


/*<h3 class="title-border   title-bg-line"><span> 				<a href=""> Recent Posts</a>
			<span class="line"></span></span></h3>
*/

/**
 * Heading of comments.
 */
function newsmagz_comments_heading() {
	$comments_number = get_comments_number();
	if ( 1 === $comments_number ) {
		/* translators: %s: post title */
		printf( _x( ' %1$s Comment', 'comments title','newsmagz' ),'<span>'.number_format_i18n( $comments_number ) );
	} else {
		printf(
			/* translators: 1: number of comments */
			_nx(
				'%1$s Comment',
				'%1$s Comments',
				$comments_number,
				'comments title',
				'newsmagz'
			),
			'<span>'.number_format_i18n( $comments_number )
		);
	}
}
add_action( 'newsmagz_comments_title','newsmagz_comments_heading' );

/**
 * Comment action.
 *
 * @param string $args Comment arguments.
 * @param object $comment Comment object.
 * @param int    $depth Comments depth.
 * @param string $add_below  Add bellow comments.
 */
function newsmagz_comment_action( $args, $comment, $depth, $add_below ) {
	?>

	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		} ?>
		<?php /* translators: 1- comment author link, 2 - comment date, 3 - comment time */ printf( __( '<h4 class="media-heading">%1$s</h4><a href="%4$s"><span class="comment-date">(%2$s - %3$s)</span></a>','newsmagz' ), get_comment_author_link(), get_comment_date(),  get_comment_time(),get_comment_link() ); ?><?php edit_comment_link( __( '(Edit)','newsmagz' ), '  ', '' ); ?>

	</div>


	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'newsmagz' ); ?></em>
		<br />
	<?php endif; ?>



	<div class="media-body">
		<?php comment_text(); ?>
		<div class="reply pull-right reply-link"> <?php comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth' => $depth,
			'max_depth' => $args['max_depth'],
			) ) ); ?> </div>
		</div>

		<?php
	}
	add_action( 'newsmagz_comment_content','newsmagz_comment_action', 10, 5 );


	add_filter( 'comment_form_fields', 'newsmagz_move_comment_field_to_bottom' );

/**
 * Move comment field to bottom.
 *
 * @param array $fields Fields of comment form.
 *
 * @return mixed
 */
function newsmagz_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

// for the comment wrapping functions - ensures HTML does not break.
$comment_open_div = 0;

/**
 * Creates an opening div for a bootstrap row.
 *
 * @global int $comment_open_div
 */
add_action( 'comment_form_before_fields', 'newsmagz_before_comment_fields' );

/**
 * Creates an opening div for a bootstrap row.
 *
 * @global int $comment_open_div
 */
function newsmagz_before_comment_fields() {
	global $comment_open_div;
	$comment_open_div = 1;
	echo '<div class="row">';
}

add_action( 'comment_form_after_fields', 'newsmagz_after_comment_fields' );

/**
 * Creates a closing div for a bootstrap row.
 *
 * @global int $comment_open_div
 * @return type
 */
function newsmagz_after_comment_fields() {
	global $comment_open_div;
	if ( $comment_open_div == 0 ) {
		return;
	}
	echo '</div>';
}



/**
 * Jetpack Compatibility File.
 *
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 * @link https://jetpack.me/
 *
 * @package newsmagz
 */
function newsmagz_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'newsmagz_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
} // end function newsmagz_jetpack_setup
add_action( 'after_setup_theme', 'newsmagz_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function newsmagz_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}   




/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newsmagz_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( newsmagz_isprevdem() ) {
		$classes[] = 'prevpac';
	}

	return $classes;
}
add_filter( 'body_class', 'newsmagz_body_classes' );



 /**
 * SVG icons related functions and filters
 *
 * @package WordPress
 * @subpackage newsmagz
 * @since 1.0
 */

/**
 * Add SVG definitions to the footer.
 */
function newsmagz_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/assets/images/svg-icons.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'newsmagz_include_svg_icons', 9999 );

/**
 * Return SVG markup taken from TwentySeventeen.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function newsmagz_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'newsmagz' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'newsmagz' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * newsmagz doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo newsmagz_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo newsmagz_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function newsmagz_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = newsmagz_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . newsmagz_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'newsmagz_nav_menu_social_icons', 10, 4 );

/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function newsmagz_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'top' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . newsmagz_get_svg( array( 'icon' => 'angle-down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'newsmagz_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function newsmagz_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);

	/**
	 * Filter Twenty Seventeen social links icons.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param array $social_links_icons Array of social links icons.
	 */
	return apply_filters( 'newsmagz_social_links_icons', $social_links_icons );
}
