<?php
/**
 * Headerdata
 *
 * @package WordPress
 * @subpackage The Architect
 * @since The Architect 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Include CSS
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'wpl_css_include' ) ) {

	function wpl_css_include () {

		/*-----------------------------------------------------------
			Main Stylesheet
		-----------------------------------------------------------*/

		wp_enqueue_style( 'stylesheets', get_stylesheet_uri(), array(), '', 'all' );

	}
	add_action( 'wp_enqueue_scripts', 'wpl_css_include' );
}


/*-----------------------------------------------------------------------------------*/
/*	Include Java Scripts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wpl_scripts_include' ) ) {

	function wpl_scripts_include() {

		/*-----------------------------------------------------------
			Include jQuery
		-----------------------------------------------------------*/

		wp_enqueue_script('jquery');


		/*-----------------------------------------------------------
			Include Google Maps
		-----------------------------------------------------------*/
		$maps_api_key = ot_get_option( 'wpl_maps_api_browser_key' );

		if( !empty( $maps_api_key ) ) {
			wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=' . $maps_api_key );
		} else {
			wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp' );
		}

		wp_enqueue_script( 'wplook-google-maps', get_template_directory_uri() . '/assets/javascript/vendor/google-maps.js', array( 'jquery', 'google-maps-api' ), false, true );

		/*-----------------------------------------------------------
			Comment reply script for threaded comments
		-----------------------------------------------------------*/

		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
	    }


	    /*-----------------------------------------------------------
	    	FlexSlider
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/javascript/vendor/jquery.flexslider.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	HoverIntent
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/assets/javascript/vendor/jquery.hoverIntent.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	Backstretch
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/assets/javascript/vendor/jquery.backstretch.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	Easing
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/javascript/vendor/jquery.easing.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	ScrollTo
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/assets/javascript/vendor/jquery.scrollTo.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	Fresco
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'fresco', get_template_directory_uri() . '/assets/javascript/vendor/fresco.js', '', '', 'footer' );

		/*-----------------------------------------------------------
	    	Modernizr
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/javascript/vendor/modernizr.js', array( 'jquery' ), '', 'footer' );

		/*-----------------------------------------------------------
	    	FitVids
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/javascript/vendor/jquery.fitvids.js', array( 'jquery' ), '', 'footer' );


		/*-----------------------------------------------------------
	    	APP
	    -----------------------------------------------------------*/

	    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/javascript/app.js', '', '', 'footer' );

	}
	add_action('wp_enqueue_scripts', 'wpl_scripts_include');
}
