<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {

/**
* Get a copy of the saved settings array.
*/
$saved_settings = get_option( ot_settings_id(), array() );


/**
* Create a custom settings array that we pass to
* the OptionTree Settings API Class.
*/

$custom_settings = array(

  'contextual_help' => array(
	'content'       => array(
	  array(
		'id'        => 'general_help',
		'title'     => __( 'General', 'thearchitect-wpl' ),
		'content'   => ''
	  )
	),
	'sidebar'       => ''
  ),

  'sections'        => array(
	array(
	  'title'       => __( 'General Settings', 'thearchitect-wpl' ),
	  'id'          => 'general'
	),
	array(
	  'title'       => __( 'Branding Settings', 'thearchitect-wpl' ),
	  'id'          => 'header'
	),
	array(
	  'title'       => __( 'Google Fonts Settings', 'thearchitect-wpl' ),
	  'id'          => 'google_fonts_settings'
	),
	array(
	  'title'       => __( 'Project Settings', 'thearchitect-wpl' ),
	  'id'          => 'project'
	),
	array(
		'title'       => __( 'Slider Settings', 'thearchitect-wpl' ),
		'id'          => 'slider_settings'
	),
	array(
	  'title'       => __( 'Blog Settings', 'thearchitect-wpl' ),
	  'id'          => 'blog'
	),
    array(
	  'title'       => __( 'Google Maps Settings', 'thearchitect-wpl' ),
	  'id'          => 'google_maps_settings'
	),
	array(
	  'title'       => __( 'Custom Code', 'thearchitect-wpl' ),
	  'id'          => 'custom_code'
	)

  ),

  'settings'          => array(

	// General Settings

	array(
		'label'       => __( 'Affiliate ID:', 'thearchitect-wpl' ),
		'id'          => 'wpl_affiliate',
		'type'        => 'text',
		'desc'        => __( 'EX: 1. Join our <a href="https://wplook.com/affiliates/" target="_blank">affiliate program</a> and earn 25% commissions on all sales generated through your affiliate links.<br /> The link will appear in the footer at Designed by WPlook URL.', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'general'
	),

	array(
		'label'       => __( 'Copyright', 'thearchitect-wpl' ),
		'id'          => 'wpl_copyright',
		'type'        => 'text',
		'desc'        => __( 'Enter your Copyright notice displayed in the footer of the website', 'thearchitect-wpl' ),
		'std'         => __( '&copy; 2016 The Architect. All rights reserved.', 'thearchitect-wpl' ),
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'general'
	),

	// Google Fonts Settings
	array(
		'label'       => __( 'Google Fonts', 'thearchitect-wpl' ),
		'id'          => '',
		'type'        => 'textblock-titled',
		'desc'        => __( 'Google Fonts allow you to include custom web fonts on your pages. Preview available fonts at <a href="https://www.google.com/fonts/">https://www.google.com/fonts/</a>. It is recommended that for all the fonts you use, you include the <code>regular</code> and <code>latin</code> variants so every font uses a standard width and a Latin character set.', 'thearchitect-wpl' ),
		'section'     => 'google_fonts_settings'
	),

	array(
		'label'       => __( 'Select fonts', 'thearchitect-wpl' ),
		'id'          => 'wpl_fonts_select',
		'type'        => 'google-fonts',
		'desc'        => __( 'Select what fonts to include from Google Fonts here and choose where to use them in the section below.<br><br>For the fonts to appear in the section below, you must save changes after selecting fonts in this section.<br><br>To increase the speed of your site, include only the font variants you know you\'ll need. These fonts will be loaded regardless of whether or not they\'re used in the sections below, so make sure you delete any fonts you no longer need.', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_fonts_settings',
	),

	array(
		'label'       => __( 'Change body font', 'thearchitect-wpl' ),
		'id'          => 'wpl_fonts_body_bool',
		'type'        => 'on-off',
		'desc'        => __( 'Do you want to change the body font?', 'thearchitect-wpl' ),
		'std'         => 'off',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_fonts_settings',
	),

	array(
		'label'       => __( 'Body font', 'thearchitect-wpl' ),
		'id'          => 'wpl_fonts_body',
		'type'        => 'typography',
		'desc'        => __( 'Select the main font to use on the site. Don\'t change these settings if you don\'t want to -- if you don\'t change them, default theme values will be used.', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'condition'   => 'wpl_fonts_body_bool:is(on)',
		'section'     => 'google_fonts_settings',
	),

	array(
		'label'       => __( 'Change heading font', 'thearchitect-wpl' ),
		'id'          => 'wpl_fonts_heading_bool',
		'type'        => 'on-off',
		'desc'        => __( 'Do you want to change the heading font?', 'thearchitect-wpl' ),
		'std'         => 'off',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_fonts_settings',
	),

	array(
		'label'       => __( 'Heading font', 'thearchitect-wpl' ),
		'id'          => 'wpl_fonts_heading',
		'type'        => 'typography',
		'desc'        => __( 'Select the main font to use for headings. Don\'t change these settings if you don\'t want to -- if you don\'t change them, default theme values will be used.', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'condition'   => 'wpl_fonts_heading_bool:is(on)',
		'section'     => 'google_fonts_settings',
	),

	// Branding Settings

	array(
		'label'       => __( 'Logo Image', 'thearchitect-wpl' ),
		'id'          => 'wpl_logo_image',
		'type'        => 'upload',
		'desc'        => __( 'Upload your branding logo. Retina ready x@2.', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'header'
	),


	array(
		'label'       => __( 'Logo Top Margin', 'thearchitect-wpl' ),
		'id'          => 'wpl_logo_top_margin',
		'type'        => 'numeric-slider',
		'desc'        => __( 'Define the top margin space in pixels for the logo.', 'thearchitect-wpl' ),
		'std'         => '0',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'header'
	),


	// Project Settings

	array(
		'label'       => __( 'Projects Page', 'thearchitect-wpl' ),
		'id'          => 'wpl_projects_page',
		'type'        => 'page-select',
		'desc'        => __( 'Specify the page used for displaying all projects.', 'thearchitect-wpl' ),
		'choices'     => '',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'project',
		'operator'    => 'and'
	),

	array(
		'label'       => __( 'Projects Archive Grid Layout', 'thearchitect-wpl' ),
		'id'          => 'wpl_projects_cat_layout',
		'type'        => 'select',
		'desc'        => __( 'Choose the grid layout for the projects by Sector page.', 'thearchitect-wpl' ),
		'choices'     => array(
			array(
				'label'       => __( '2 Columns', 'thearchitect-wpl' ),
				'value'       => 'columns-2'
			),
			array(
				'label'       => __( '3 Columns', 'thearchitect-wpl' ),
				'value'       => 'columns-3'
			),
			array(
				'label'       => __( '4 Columns', 'thearchitect-wpl' ),
				'value'       => 'columns-4'
			),
		),
		'std'         => 'columns-3',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'project',
		'operator'    => 'and'
	),


	/*-----------------------------------------------------------
		Slider Settings
	-----------------------------------------------------------*/

	array(
		'label'       => __( 'Slides', 'thearchitect-wpl' ),
		'id'          => 'wpl_sliders',
		'type'        => 'list-item',
		'desc'        => __( 'Press the <strong>Add New</strong> button in order to add a new slider.', 'thearchitect-wpl' ),
		'settings'    => array(
			array(
				'label'       => __( 'Slider Image', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_image',
				'type'        => 'upload',
				'desc'        => __( '<strong>Recommended image size:</strong> 1920x714px.', 'thearchitect-wpl' ),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => ''
			),

			array(
				'label'       => __( 'Slide Title', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_title',
				'type'        => 'text',
				'desc'        => __( 'Enter a slide Title.', 'thearchitect-wpl' ),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),

			array(
				'label'       => __( 'Slide Title color', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_title_color',
				'type'        => 'colorpicker',
				'desc'        => __( 'Select a color for slider title.', 'thearchitect-wpl' ),
				'std'         => '#FFFFFF',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),


			array(
				'label'       => __( 'Slide Description', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_description',
				'type'        => 'textarea',
				'desc'        => __( 'Enter a slide Title.', 'thearchitect-wpl' ),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),

			array(
				'label'       => __( 'Slide Description color', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_description_color',
				'type'        => 'colorpicker',
				'desc'        => __( 'Select a color for slider description.', 'thearchitect-wpl' ),
				'std'         => '#FFFFFF',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),

			array(
				'label'       => __( 'Slide Buton Text', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_button_text',
				'type'        => 'text',
				'desc'        => __( 'Enter the text you want to display on button, for examle: read more', 'thearchitect-wpl' ),
				'std'         => __( 'Read more', 'thearchitect-wpl' ),
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),

			array(
				'label'       => __( 'Slide URL', 'thearchitect-wpl' ),
				'id'          => 'wpl_slider_item_url',
				'type'        => 'text',
				'desc'        => __( 'Enter the slider URL', 'thearchitect-wpl' ),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'class'       => '',
				'taxonomy'    => '',
				'section'     => ''
			),

		),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'slider_settings'
	),

	array(
		'label'       => __( 'Revolution Slider Alias', 'thearchitect-wpl' ),
		'id'          => 'wpl_slider_revolution',
		'type'        => 'text',
		'desc'        => __( '<strong>Use Revolution Slider instead of displaing the base slider (FlexSlider).</strong> If you have installed the revolution slider Plugin, add the Slider Alias here. From this example [rev_slider test1] you need to add only the test1. If you do not have the plugin you can buy it from here: http://bit.ly/1eD7aE1', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'class'       => '',
		'taxonomy'    => '',
		'section'     => 'slider_settings'
	),

	// Blog Settings
	array(
		'label'       => __( 'Show author informations', 'thearchitect-wpl' ),
		'id'          => 'wpl_blog_author_info',
		'type'        => 'on-off',
		'desc'        => __( 'Enable this option to show the author informations for each articles.', 'thearchitect-wpl' ),
		'choices'     => '',
		'std'         => 'off',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'blog',
		'operator'    => 'and'
	),

	// Google Maps settings
	array(
		'label'       => '',
		'id'          => 'wpl_maps_description',
		'type'        => 'textblock',
		'desc'        => sprintf( __( 'Enter your Google Maps API keys here. These are a free code which allows maps to be displayed on your site. To create keys, follow instructions in the <a href="%s">WPlook Themes documentation</a>.', 'thearchitect-wpl' ), 'https://wplook.com/docs/google-maps-api/' ),
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_maps_settings'
	),
	array(
		'label'       => __( 'Browser key', 'thearchitect-wpl' ),
		'id'          => 'wpl_maps_api_browser_key',
		'type'        => 'text',
		'desc'        => '',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_maps_settings'
	),
	array(
		'label'       => __( 'Server key', 'thearchitect-wpl' ),
		'id'          => 'wpl_maps_api_server_key',
		'type'        => 'text',
		'desc'        => '',
		'std'         => '',
		'rows'        => '',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'google_maps_settings'
	),

	// Custom Code
	array(
		'id'          => 'wpl_css',
		'label'       => __( 'Custom CSS', 'thearchitect-wpl' ),
		'desc'        => __( '<p>Paste your custom CSS code here.</p>', 'thearchitect-wpl' ),
		'std'         => '',
		'type'        => 'css',
		'section'     => 'custom_code',
		'rows'        => '20',
		'post_type'   => '',
		'taxonomy'    => '',
		'min_max_step'=> '',
		'class'       => '',
		'condition'   => '',
		'operator'    => 'and'
	),
	array(
		'label'       => __( 'Google Analytics Tracking Code', 'thearchitect-wpl' ),
		'id'          => 'wpl_google_analytics_tracking_code',
		'type'        => 'textarea-simple',
		'desc'        => __( 'Insert the complete tracking script from analytics.google.com', 'thearchitect-wpl' ),
		'std'         => '',
		'rows'        => '8',
		'post_type'   => '',
		'taxonomy'    => '',
		'class'       => '',
		'section'     => 'custom_code'
	),


  ));

  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

}
