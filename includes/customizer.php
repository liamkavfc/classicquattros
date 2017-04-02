<?php
/**
 * deck Theme Customizer.
 *
 * @package deck
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function deck_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.logo a',
			'container_inclusive' => false,
			'render_callback' => 'deck_customize_partial_blogname',
		) );
	}


	/*    	
	=================================================
	Color setting
	=================================================
	*/

	//Link & Accent Color
	$wp_customize->add_setting( 'dp_link_accent_color', array(
		'default'        => esc_html( '#e9242e' ),
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dp_link_accent_color', array(
		'label'    => esc_html__( 'Link & Accent Color', 'deck' ),
		'section'  => 'colors',
		'priority'=> 1
	) ) );


	/*    	
	=================================================
	Basic setting
	=================================================
	*/

	$wp_customize->add_section( 'dp_basic_setting' , array(
	    'title'       => esc_html__( 'Basic Setting', 'deck' ),
	    'priority'    => 45
	) );

	// Setting for blog layout
	$wp_customize->add_setting( 'dp_blog_layout', array(
		'default' => 'blogright',
		'sanitize_callback' => 'deck_sanitize_select',
	) );
	// Control for blog layout	
	$wp_customize->add_control( 'dp_blog_layout', array(
	'label'   => __( 'Blog Layout', 'deck' ),
	'section' => 'dp_basic_setting',
	'priority' => 1,
	'type'    => 'radio',
		'choices' => array(
			'blogright' => esc_html__( 'Blog with Right Sidebar', 'deck' ),
			'blogleft' => esc_html__( 'Blog with Left Sidebar', 'deck' ),
			'blogwide' => esc_html__( 'Blog Full Width &amp; no Sidebars', 'deck' ),
		),
	));
	


	/*    	
	=================================================
	Home Page Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'dp_homepage_setting_panel', array( // General Panel
	    'priority'       => 50,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Home Page', 'deck'),
	    'description'    => esc_html__('Changes the home page settings', 'deck'),
	));

	/*    	
	=================================================
	Home Page Bilboard section
	=================================================
	*/

	$wp_customize->add_section( 'dp_billboard_section' , array(
	    'title'       => esc_html__( 'Billboard Section', 'deck' ),
	    'priority'    => 1,
	    'panel' => 'dp_homepage_setting_panel'
	) );

	$wp_customize->add_setting( 'dp_billboard_select_page', array(
		'sanitize_callback' => 'deck_sanitize_page_dropdown',
	) );

	$wp_customize->add_control( 'dp_billboard_select_page', array(
		'label'    => esc_html__( 'Billboard Page', 'deck' ),
		'description'    => esc_html__( 'Select the page to display in billboard section', 'deck'),
		'section'  => 'dp_billboard_section',
		'type'     => 'dropdown-pages',
		'priority' => 1,
	) );

	/*    	
	=================================================
	Homepage featured post section 
	=================================================
	*/

	$wp_customize->add_section( 'dp_homepage_featured_post_section', array(
		'title'     => esc_html__( 'Featured Post', 'deck' ),
	  	'priority'    => 2,
	  	'panel' => 'dp_homepage_setting_panel'
	) );

	$wp_customize->add_setting( 'homepage_featured_post', array(
        'sanitize_callback' => 'deck_sanitize_category_dropdown',
    ) );

	$wp_customize->add_control( new Deck_category_dropdown( $wp_customize, 'homepage_featured_post', array(
		'label' => esc_html__( 'Choose Featured Post From Category', 'deck' ),
		'section' => 'dp_homepage_featured_post_section',
		'description' => esc_html__( 'Select Category to show posts in Featured Section','deck'),
		'type' => 'select',
		'priority' => 1,
     
   ) ) );

	/*    	
	=================================================
	Home Portfolio Section
	=================================================
	*/
	$wp_customize->add_section( 'dp_portfolio_section' , array(
		'description' => esc_html__( 'This section renders its content just below text column section', 'deck' ),
	    'title'       => esc_html__( 'Portfolio Section', 'deck' ),
	    'priority'    => 3,
	    'panel' => 'dp_homepage_setting_panel'
	) );

	//checkbox to hide text column section
	$wp_customize->add_setting( 'dp_show_portfolio_section', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'dp_show_portfolio_section', array(
		'label'    => esc_html__( 'Check this box to show portfolio section', 'deck' ),
		'section'  => 'dp_portfolio_section',
		'type'     => 'checkbox',
		'priority' => 1
	) );

	//portfolio main Heading
    $wp_customize->add_setting( 'dp_portfolio_main_heading', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_text'
	) );


	$wp_customize->add_control( 'dp_portfolio_main_heading', array(
		'label'    => esc_html__( 'Portfolio Main Heading', 'deck' ),
		'description' => esc_html__( 'Enter Text for main heading of portfolio section', 'deck' ),
		'section'  => 'dp_portfolio_section',
		'type'     => 'textarea',
		'priority' => 2
	) );

	//portfolio sub Heading
    $wp_customize->add_setting( 'dp_portfolio_sub_heading', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_text'
	) );


	$wp_customize->add_control( 'dp_portfolio_sub_heading', array(
		'label'    => esc_html__( 'Portfolio Sub Heading', 'deck' ),
		'description' => esc_html__( 'Enter Text for Sub heading of portfolio section', 'deck' ),
		'section'  => 'dp_portfolio_section',
		'type'     => 'textarea',
		'priority' => 3
	) );

	$wp_customize->add_setting( 'homepage_featured_portfolio', array(
        'sanitize_callback' => 'deck_sanitize_category_dropdown',
    ) );

	$wp_customize->add_control( new Deck_category_dropdown( $wp_customize, 'homepage_featured_portfolio', array(
		'label' => esc_html__( 'Choose Category To Make Portfolio', 'deck' ),
		'section' => 'dp_portfolio_section',
		'type' => 'select',
		'priority' => 4,
     
   ) ) );

	/*    	
	=================================================
	Home Client Show case section
	=================================================
	*/
	$wp_customize->add_section( 'dp_client_showcase_section' , array(
		'description' => esc_html__( 'This section renders its content just below text portfolio section', 'deck' ),
	    'title'       => esc_html__( 'Client Showcase Section', 'deck' ),
	    'priority'    => 4,
	    'panel' => 'dp_homepage_setting_panel'
	) );

	//checkbox to hide text column section
	$wp_customize->add_setting( 'dp_show_client_showcase_section', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'dp_show_client_showcase_section', array(
		'label'    => esc_html__( 'Check this box to show client showcase section', 'deck' ),
		'section'  => 'dp_client_showcase_section',
		'type'     => 'checkbox',
		'priority' => 1
	) );

	//portfolio main Heading
    $wp_customize->add_setting( 'dp_client_showcase_main_heading', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_text'
	) );


	$wp_customize->add_control( 'dp_client_showcase_main_heading', array(
		'label'    => esc_html__( 'Client Main Heading', 'deck' ),
		'description' => esc_html__( 'Enter Text for main heading of client section', 'deck' ),
		'section'  => 'dp_client_showcase_section',
		'type'     => 'textarea',
		'priority' => 2
	) );

	//client show case image
    $wp_customize->add_setting( 'dp_client_showcase_banner_image', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_upload'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dp_client_showcase_banner_image', array(
        'label'    => esc_html__( 'Client Show Case Image', 'deck'),
        'section'  => 'dp_client_showcase_section',
        'description' => esc_html__( 'Select or upload the image you would like to appear here. (980px wide, transparent background )', 'deck' ),
		'priority' => 3
    )));


    /*    	
	=================================================
	Home blog post section
	=================================================
	*/
	$wp_customize->add_section( 'dp_blog_post_section' , array(
		'description' => esc_html__( 'This section renders its content just below client showcase section', 'deck' ),
	    'title'       => esc_html__( 'Blog Post Section', 'deck' ),
	    'priority'    => 5,
	    'panel' => 'dp_homepage_setting_panel'
	) );

	//checkbox to hide text column section
	$wp_customize->add_setting( 'dp_show_blog_post_section', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'dp_show_blog_post_section', array(
		'label'    => esc_html__( 'Check this box to show blog post section', 'deck' ),
		'section'  => 'dp_blog_post_section',
		'type'     => 'checkbox',
		'priority' => 1
	) );

	//portfolio main Heading
    $wp_customize->add_setting( 'dp_blog_post_main_heading', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_text'
	) );


	$wp_customize->add_control( 'dp_blog_post_main_heading', array(
		'label'    => esc_html__( 'Blog Main Heading', 'deck' ),
		'description' => esc_html__( 'Enter Text for main heading of Blog section', 'deck' ),
		'section'  => 'dp_blog_post_section',
		'type'     => 'textarea',
		'priority' => 2
	) );

	//Blog sub Heading
    $wp_customize->add_setting( 'dp_blog_post_sub_heading', array(
		'default'        => '',
		'sanitize_callback' => 'deck_sanitize_text'
	) );


	$wp_customize->add_control( 'dp_blog_post_sub_heading', array(
		'label'    => esc_html__( 'Blog Sub Heading', 'deck' ),
		'description' => esc_html__( 'Enter Text for Sub heading of Blog section', 'deck' ),
		'section'  => 'dp_blog_post_section',
		'type'     => 'textarea',
		'priority' => 3
	) );

	/*    	
	=================================================
	Footer setting
	=================================================
	*/
	$wp_customize->add_section( 'dp_footersetting_section' , array(
	    'title'       => esc_html__( 'Footer Setting', 'deck' ),
	    'priority'    => 66
	) );


	// Setting for hiding the footer text	
	$wp_customize->add_setting( 'deck_hide_footer_text', array(
		'defaul' => '',
		'sanitize_callback' => 'deck_sanitize_checkbox',
	));


	// Control for hiding the footer text	
	$wp_customize->add_control( 'deck_hide_footer_text', array(
        'label' => esc_html__( 'Hide Footer', 'deck' ),
		'type' => 'checkbox',
		'section' => 'dp_footersetting_section',
		'priority' => 1,
    ) );

} //end of deck_customize_register customizer 
add_action( 'customize_register', 'deck_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function deck_customize_preview_js() {

	wp_enqueue_script( 'deck-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'deck_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since deck Pro 1.0
 * @see deck_customize_partial_blogname()
 *
 * @return void
 */
function deck_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * adds sanitization callback function : checkbox
 * @package deck 
*/
function deck_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	

/**
 * adds sanitization callback function : URL
 * @package deck 
 * @version 1.0
*/
function deck_sanitize_url( $value) {
	$value = esc_url_raw( $value);
	return $value;
}

/**
 * adds sanitization callback function : Image and file
 * @package deck 
 * @version 1.0
*/

function deck_sanitize_upload( $image, $setting ) {        
     /*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

/**
 * adds sanitization callback function : TEXT
 * @package deck 
 * @version 1.0
*/
function deck_sanitize_text( $input ) {
    
  return wp_filter_post_kses( $input );
}

/**
 * Sanitizes dropdown pages
 * @param  $input entered value
 * @return sanitized output
 * @since Deck 1.0.1
 */
function deck_sanitize_page_dropdown( $input ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $input );
	// If $page_id is an ID of a published page, return it; otherwise, return false
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
}

/**
 * adds sanitization callback function for numeric data : category dropdown
 * @package Deck
 * @version 1.0
*/
function deck_sanitize_category_dropdown( $input ) {
    return absint( $input );
    
}

/**
 * Sanitizes select
 * - Control: select, radio
 * @param string  $input   Slug to sanitize.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 * @since Deck 1.0.1
 */
function deck_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}