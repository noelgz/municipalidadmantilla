<?php
/**
 * newsmagz Theme Customizer.
 *
 * @package WordPress
 * @subpackage newsmagz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsmagz_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default   = '#333';
	$wp_customize->get_control( 'header_textcolor' )->label     = __( 'Text color', 'newsmagz' );
	$wp_customize->get_control( 'header_textcolor' )->priority  = 2;

	$wp_customize->get_control( 'custom_logo' )->section = 'newsmagz_appearance_general_logo';
	$wp_customize->get_control( 'blogname' )->section = 'title_tagline2';
	$wp_customize->get_control( 'blogdescription' )->section = 'title_tagline2';
	$wp_customize->get_control( 'site_icon' )->section = 'title_tagline2';
	$wp_customize->get_control( 'header_text' )->section = 'title_tagline2';


	$wp_customize->add_section( 'newsmagz_theme_info', array(
		'title'    => __( 'Getting Started', 'newsmagz' ),
		'priority' => 0,
	) );

	$wp_customize->add_setting( 'newsmagz_theme_info', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new newsmagz_Info( $wp_customize, 'newsmagz_theme_info', array(
		'section'  => 'newsmagz_theme_info',
		'priority' => 10,
	) ) );

	/**
	 *****************************
	 *********** Panels ***********
	 */

	$wp_customize->add_panel( 'general_panel', array(
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'General Options', 'newsmagz' ),
	) );	

	$wp_customize->add_panel( 'featured_panel', array(
		'priority'   => 35,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'Featured Blocks', 'newsmagz' ),
	) );

	$wp_customize->add_panel( 'sections_panel', array(
		'priority'   => 36,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'HomePage Blocks', 'newsmagz' ),
	) );

	$wp_customize->add_panel( 'social_links_panel', array(
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'Social Links', 'newsmagz' ),
	) );





	$wp_customize->add_section( 'newsmagz_featured_big', array(
		'title'    => esc_html__( 'Featured Home Big Grid', 'newsmagz' ),
		'priority' => 2,
		'panel'    => 'featured_panel',
	) );
	$wp_customize->add_section( 'newsmagz_featured_slider', array(
		'title'    => esc_html__( 'Featured Home Slider Carousel', 'newsmagz' ),
		'priority' => 2,
		'panel'    => 'featured_panel',
	) );
	$wp_customize->add_section( 'newsmagz_featured_slider1', array(
		'title'    => esc_html__( 'Featured Home Slider Big', 'newsmagz' ),
		'priority' => 1,
		'panel'    => 'featured_panel',
	) );




	$wp_customize->add_section( 'title_tagline2', array(
		'title'    => esc_html__( 'Site Identity', 'newsmagz' ),
		'priority' => 1,
		'panel'    => 'general_panel',
	) );

	$wp_customize->add_section( 'newsmagz_appearance_general_logo', array(
		'title'       => esc_html__( 'Logo', 'newsmagz' ),
		'description' => esc_html__( 'Set Logo', 'newsmagz' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );

	$wp_customize->add_section( 'newsmagz_appearance_general', array(
		'title'       => esc_html__( 'Sticky Menu', 'newsmagz' ),
		'description' => esc_html__( 'Disable Sticky Navigation Menu', 'newsmagz' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );

	$wp_customize->add_section( 'newsmagz_appearance_general', array(
		'title'       => esc_html__( 'Sticky Menu', 'newsmagz' ),
		'description' => esc_html__( 'Disable Sticky Navigation Menu', 'newsmagz' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );



	$wp_customize->add_section( 'newsmagz_block1', array(
		'title'    => esc_html__( 'Block 1', 'newsmagz' ),
		'priority' => 1,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'newsmagz_block2', array(
		'title'    => esc_html__( 'Block 2', 'newsmagz' ),
		'priority' => 2,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'newsmagz_block3', array(
		'title'    => esc_html__( 'Block 3', 'newsmagz' ),
		'priority' => 3,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'newsmagz_block4', array(
		'title'    => esc_html__( 'Block 4', 'newsmagz' ),
		'priority' => 4,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'newsmagz_block5', array(
		'title'    => esc_html__( 'Block 5', 'newsmagz' ),
		'priority' => 5,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'newsmagz_single_post', array(
		'title'    => __( 'Single post settings', 'newsmagz' ),
		'priority' => 38,
	) );


	$wp_customize->add_section( 'static_front_page', array(
		'title'          => __( 'HomePage Layout', 'newsmagz' ),
		'priority'       => 20,
		'description'    => __( 'Set the Home Page Layout.Your theme supports a static front page.', 'newsmagz' ),
	) );
	$wp_customize->add_section( 'title_tagline', array(
		'title'          => __( 'General Options' , 'newsmagz' ),
		'priority'       => 10,
		'description'    => __( 'General Options.', 'newsmagz' ),
	) );


	/**
	 * Option to get the frontpage settings to the old default template if a static frontpage is selected
	 */
	$wp_customize->add_setting( 'newsmagz_set_original_fp', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => false
	));

	$wp_customize->add_control( 'newsmagz_set_original_fp', array(
		'type' => 'checkbox',
		'label' => esc_html__( 'Use Magazine Style frontpage?','newsmagz' ),
		'section' => 'static_front_page',
		'priority'    => 9,
	));

	$wp_customize->add_setting( 'newsmagz_site_style', array(
		'capability' => 'edit_theme_options',
		'default' => 'container',
		'sanitize_callback' => 'newsmagz_sanitize_radio',
		) );
		$wp_customize->add_control( 'newsmagz_site_style', array(
		'type' => 'radio',
		'priority' => 8,
	  'section' => 'static_front_page', // Add a default or your own section
	  'label' => __( 'Site Layout Style' ,'newsmagz'),
	  'description' => __( 'Choose Site Layout Style','newsmagz' ),
	  'choices' => array(
	  	'container' => __( 'Full Width Layout' ,'newsmagz'),
	  	'boxed' => __( 'Boxed Layout' ,'newsmagz'),
	  	),
	  ) );

	/**
	 *****************************
	 ********** Settings ***********
	 */

	$wp_customize->add_setting( 'newsmagz_title_color', array(
		'default'           => apply_filters( 'newsmagz_title_color_default_filter', '#333' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_top_slider_post_title_color', array(
		'default'           => '#ffffff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );


	$wp_customize->add_setting( 'newsmagz_blocks_post_title_color', array(
		'default'           => apply_filters( 'newsmagz_blocks_post_title_color_default_filter', '#333' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );



	$wp_customize->add_setting( 'newsmagz_social_links', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'newsmagz_sanitize_repeater',
	) );

	$wp_customize->add_setting( 'newsmagz_sticky_menu', array(
		'default'           => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_big_disable', array(
		'default'            => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_big_title', array(
		'default'           => esc_html__( 'Latest Topics', 'newsmagz' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_big_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'newsmagz_sanitize_category_dropdown',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_slider_disable', array(
		'default'            => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_slider_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'newsmagz_sanitize_category_dropdown',
	) );


	$wp_customize->add_setting( 'newsmagz_featured_slider_title', array(
		'default'           => esc_html__( 'Latest Topics', 'newsmagz' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );


	$wp_customize->add_setting( 'newsmagz_featured_slider_max_posts', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );


	$wp_customize->add_setting( 'newsmagz_featured_slider1_disable', array(
		'default'            => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_featured_slider1_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'newsmagz_sanitize_category_dropdown',
	) );


	$wp_customize->add_setting( 'newsmagz_featured_slider1_title', array(
		'default'           => esc_html__( 'Latest Topics', 'newsmagz' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );


	$wp_customize->add_setting( 'newsmagz_featured_slider1_max_posts', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		$newsmagz_block_name = '';
		switch ( $i ) {
			case 1:
			$newsmagz_block_name = esc_html__( 'Block 1', 'newsmagz' );
			$wp_customize->add_setting( 'newsmagz_block' . $i . '_posts_per_page', array(
				'default'           => 4,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			) );
			break;
			case 2:
			$newsmagz_block_name = esc_html__( 'Block 2', 'newsmagz' );
			break;
			case 3:
			$newsmagz_block_name = esc_html__( 'Block 3', 'newsmagz' );
			break;
			case 4:
			$newsmagz_block_name = esc_html__( 'Block 4', 'newsmagz' );
			break;

		}
		$wp_customize->add_setting( 'newsmagz_block' . $i . '_disable', array(
			'default'            => false,
			'sanitize_callback' => 'sanitize_text_field',
		) );



		$wp_customize->add_setting( 'newsmagz_block' . $i . '_title', array(
			'default'           => $newsmagz_block_name,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_setting( 'newsmagz_block' . $i . '_category', array(
			'default'           => 'all',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'newsmagz_sanitize_category_dropdown',
		) );

		$wp_customize->add_setting( 'newsmagz_block' . $i . '_max_posts', array(
			'default'           => 6,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		) );
		if($i==1){
			$wp_customize->add_setting( 'newsmagz_block' . $i . '_max_posts', array(
				'default'           => 8,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			) );
		}

	}// End for().

	$wp_customize->add_setting( 'newsmagz_disable_single_hide_author', array(
		'defalt'            => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_single_post_hide_related_posts', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'newsmagz_disable_singlePost_featured_img', array(
		'default'           => '1',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );



	$wp_customize->add_panel( 
		'newsmagz_additional_settings_panel', 
		array(
			'priority'       => 77,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Additional Settings', 'newsmagz' ),
		) 
	);


	$wp_customize->add_section(
		'newsmagz_categories_color_section',
		array(
			'title'         => __( 'Categories Color', 'newsmagz' ),
			'priority'      => 5,
			'panel'         => 'newsmagz_additional_settings_panel',
		)
	);

	$priority = 3;
	$categories = get_terms( 'category' ); // Get all Categories
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {

		$wp_customize->add_setting( 
			'newsmagz_category_color_'.esc_html( strtolower( $category_list->name ) ),
			array(
				'default'              => '#dd3333',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 
				'newsmagz_category_color_'.esc_html( strtolower($category_list->name) ),
				array(
					'label'    => sprintf( esc_html__( ' %s', 'newsmagz' ), esc_html( $category_list->name ) ),
					'section'  => 'newsmagz_categories_color_section',
					'priority' => $priority
				)
			)
		);
		$priority++;
	}
	/**
	 *****************************
	 ********** Controls ***********
	 */

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsmagz_title_color', array(
		'label'    => esc_html__( 'Home Blocks, Widget Title color', 'newsmagz' ),
		'section'  => 'colors',
		'priority' => 1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsmagz_top_slider_post_title_color', array(
		'label'    => esc_html__( 'Top slider\'s posts title color', 'newsmagz' ),
		'section'  => 'colors',
		'priority' => 3,
	) ) );



	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsmagz_blocks_post_title_color', array(
		'label'    => esc_html__( 'Block\'s posts title color', 'newsmagz' ),
		'section'  => 'colors',
		'priority' => 5,
	) ) );



	$wp_customize->add_control( 'newsmagz_sticky_menu', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable Sticky Menu', 'newsmagz' ),
		'section'  => 'newsmagz_appearance_general',
		'priority' => 2,
	) );

	$wp_customize->add_control( 'newsmagz_featured_big_disable', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable section', 'newsmagz' ),
		'section'  => 'newsmagz_featured_big',
		'priority' => 1,
	) );
	$wp_customize->add_control( 'newsmagz_featured_big_title', array(
		'label'    => esc_html__( 'Title', 'newsmagz' ),
		'section'  => 'newsmagz_featured_big' ,
		'priority' => 3,
	) );
	$wp_customize->add_control( new newsmagzChooseCategory( $wp_customize, 'newsmagz_featured_big_category', array(
		'label'    => esc_html__( 'Category', 'newsmagz' ),
		'section'  => 'newsmagz_featured_big',
		'priority' => 2,
	) ) );

	$wp_customize->add_control( 'newsmagz_featured_slider_disable', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable section', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider',
		'priority' => 1,
	) );

	$wp_customize->add_control( 'newsmagz_featured_slider_title', array(
		'label'    => esc_html__( 'Title', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider' ,
		'priority' => 3,
	) );

	$wp_customize->add_control( new newsmagzChooseCategory( $wp_customize, 'newsmagz_featured_slider_category', array(
		'label'    => esc_html__( 'Category', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider',
		'priority' => 2,
	) ) );

	$wp_customize->add_control( 'newsmagz_featured_slider_max_posts', array(
		'label'       => esc_html__( 'Number of posts in this section', 'newsmagz' ),
		'description' => esc_html__( 'To display all posts, set this field to -1.', 'newsmagz' ),
		'section'     => 'newsmagz_featured_slider',
		'type'        => 'number',
		'input_attrs' => array(
			'min' => - 1,
			'step' => 1,
		),
		'priority'    => 3,
	) );


	$wp_customize->add_control( 'newsmagz_featured_slider1_disable', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable section', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider1',
		'priority' => 1,
	) );

	$wp_customize->add_control( 'newsmagz_featured_slider1_title', array(
		'label'    => esc_html__( 'Title', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider1' ,
		'priority' => 3,
	) );

	$wp_customize->add_control( new newsmagzChooseCategory( $wp_customize, 'newsmagz_featured_slider1_category', array(
		'label'    => esc_html__( 'Category', 'newsmagz' ),
		'section'  => 'newsmagz_featured_slider1',
		'priority' => 2,
	) ) );

	$wp_customize->add_control( 'newsmagz_featured_slider1_max_posts', array(
		'label'       => esc_html__( 'Number of posts in this section', 'newsmagz' ),
		'description' => esc_html__( 'To display all posts, set this field to -1.', 'newsmagz' ),
		'section'     => 'newsmagz_featured_slider1',
		'type'        => 'number',
		'input_attrs' => array(
			'min' => - 1,
			'step' => 1,
		),
		'priority'    => 3,
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		$wp_customize->add_control( 'newsmagz_block' . $i . '_disable', array(
			'type'     => 'checkbox',
			'label'    => __( 'Disable section', 'newsmagz' ),
			'section'  => 'newsmagz_block' . $i,
			'priority' => 1,
		) );



		$wp_customize->add_control( 'newsmagz_block' . $i . '_title', array(
			'label'    => esc_html__( 'Title', 'newsmagz' ),
			'section'  => 'newsmagz_block' . $i,
			'priority' => 3,
		) );

		$wp_customize->add_control( new newsmagzChooseCategory( $wp_customize, 'newsmagz_block' . $i . '_category', array(
			'label'    => esc_html__( 'Category', 'newsmagz' ),
			'section'  => 'newsmagz_block' . $i,
			'priority' => 4,
		) ) );

		$wp_customize->add_control( 'newsmagz_block' . $i . '_max_posts', array(
			'label'       => esc_html__( 'Number of posts', 'newsmagz' ),
			'description' => esc_html__( 'To display all posts, set this field to -1.', 'newsmagz' ),
			'section'     => 'newsmagz_block' . $i,
			'type'        => 'number',
			'input_attrs' => array(
				'min' => - 1,
				'step' => 1,
			),
			'priority'    => 5,
		) );

		if ( $i === 1 ) {
			$wp_customize->add_control( 'newsmagz_block' . $i . '_posts_per_page', array(
				'label'       => esc_html__( 'Number of posts in each slide', 'newsmagz' ),
				'section'     => 'newsmagz_block' . $i,
				'type'        => 'number',
				'input_attrs' => array(
					'min' => 1,
					'step' => 1,
				),
				'priority'    => 6,
			) );
		}
	}// End for().

	$wp_customize->add_control( 'newsmagz_disable_single_hide_author', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide author\'s description?', 'newsmagz' ),
		'description' => __( 'Check this box to hide the author\'s description Box on single page.', 'newsmagz' ),
		'section'     => 'newsmagz_single_post',
		'priority'    => 1,
	) );

	$wp_customize->add_control( 'newsmagz_single_post_hide_related_posts', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide related posts?', 'newsmagz' ),
		'description' => __( 'Check this box to remove Related posts on single page.', 'newsmagz' ),
		'section'     => 'newsmagz_single_post',
		'priority'    => 2,
	) );

	$wp_customize->add_control( 'newsmagz_disable_singlePost_featured_img', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide Featured Image on single page?', 'newsmagz' ),
		'description' => __( 'Check this box to hide Featured Image on single page.', 'newsmagz' ),
		'section'     => 'newsmagz_single_post',
		'priority'    => 3,
	) );




}

add_action( 'customize_register', 'newsmagz_customize_register' );

function  newsmagz_sanitize_radio( $input, $setting ) {

  // Ensure input is a slug.
	$input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/**
 * Sanitize repeater
 *
 * @param object $input Json array.
 *
 * @return mixed|string|void
 */
function newsmagz_sanitize_repeater( $input ) {
	$input_decoded = json_decode( $input, true );
	if ( ! empty( $input_decoded ) ) {
		foreach ( $input_decoded as $boxk => $box ) {
			foreach ( $box as $key => $value ) {
				$input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );
			}
		}

		return json_encode( $input_decoded );
	}

	return $input;
}

/**
 * Sanitize dropdown.
 *
 * @param string $input Category slug.
 *
 * @return string
 */
function newsmagz_sanitize_category_dropdown( $input ) {
	$cat = get_category_by_slug( $input );
	if ( empty( $cat ) ) {
		return 'all';
	}

	return $input;
}

/**
 * Sanitize banner.
 *
 * @param object $input Banner input.
 *
 * @return mixed|string
 */
function newsmagz_sanitize_banner( $input ) {
	$input_decoded = json_decode( $input, true );

	$choice   = $input_decoded['choice'];
	$position = $input_decoded['position'];
	$code     = html_entity_decode( $input_decoded['code'] );
	$link     = $input_decoded['link'];
	$image    = $input_decoded['image_url'];

	$banner_type = array( 'code', 'image' );
	if ( ! in_array( $choice, $banner_type ) ) {
		$input_decoded['choice'] = 'image';
	}

	$banner_position = array( 'right', 'center', 'left' );
	if ( ! in_array( $position, $banner_position ) ) {
		$input_decoded['position'] = 'center';
	}

	$allowed_html = array(
		'a'      => array(
			'href'   => array(),
			'class'  => array(),
			'id'     => array(),
			'target' => array(),
		),
		'img'    => array(
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
		),
		'iframe' => array(
			'src'               => array(),
			'width'             => array(),
			'height'            => array(),
			'seamless'          => array(),
			'scrolling'         => array(),
			'frameborder'       => array(),
			'allowtransparency' => array(),
		),
	);

	$string                = force_balance_tags( $code );
	$input_decoded['code'] = wp_kses( $string, $allowed_html );

	$input_decoded['link']  = esc_url( $link );
	$input_decoded['image'] = esc_url( $image );

	return json_encode( $input_decoded );
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsmagz_customize_preview_js() {
	wp_enqueue_script( 'newsmagz_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'newsmagz-customize-preview' ), '1.0.5', true );
	wp_localize_script( 'newsmagz_customizer', 'get_post_aj', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),

	) );
}

add_action( 'customize_preview_init', 'newsmagz_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function newsmagz_customizer_panels_js() {

	wp_enqueue_style( 'newsmagz-fontawesome-admin', get_template_directory_uri() . '/assets/css/font-awesome.min.css',array(), '4.6.3' );

	wp_enqueue_script( 'newsmagz-customize-controls', get_template_directory_uri() . '/assets/js/newsmagz-customize-controls.js', array( 'jquery', 'jquery-ui-draggable' ), '1.0.2', true );

	wp_enqueue_style( 'newsmagz-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css','1.0.0' );

}
add_action( 'customize_controls_enqueue_scripts', 'newsmagz_customizer_panels_js' );
