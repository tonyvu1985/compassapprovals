<?php
/**
 * Register widget areas.
 *
 * @package WPlook
 * @subpackage The Architect
 * @since The Architect 1.0
 */

/*-----------------------------------------------------------
	Include Widgets
-----------------------------------------------------------*/
//get_template_part( '/inc/widgets/widget', 'posts' );
get_template_part( '/inc/widgets/widget', 'text' );


// Initiate Project widget
if (ot_get_option('wpl_cpt_projects') != 'off') {
	get_template_part( '/inc/widgets/widget', 'projects-single' );
}


function wplook_widgets_init() {

	/*-----------------------------------------------------------
		Home page widget area
	-----------------------------------------------------------*/
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar Page', 'thearchitect-wpl' ),
		'description' => __( 'The page widget area', 'thearchitect-wpl' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3><span class="line medium black"></span>',
	));

	/*-----------------------------------------------------------
		Home page Widget area
	-----------------------------------------------------------*/
	register_sidebar(array(
		'id' => 'sidebar-projects-single',
		'name' => __( 'Single Projects Sidebar', 'thearchitect-wpl' ),
		'description' => __( 'Widget area displayed on the single projects page.', 'thearchitect-wpl' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h3>',
	));

	/*-----------------------------------------------------------
		Footer widget area
	-----------------------------------------------------------*/
	register_sidebar(array(
		'id' => 'footer',
		'name' => __( 'Footer', 'thearchitect-wpl' ),
		'description' => __( 'The Footer widget area', 'thearchitect-wpl' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));

}
add_action( 'widgets_init', 'wplook_widgets_init' );

?>
