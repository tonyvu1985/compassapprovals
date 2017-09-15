<?php

// let's create the function for the custom type
function custom_post_projects() { 

	$url_rewrite = ot_get_option('wpl_projects_url_rewrite');
	if( !$url_rewrite ) { $url_rewrite = 'project'; }

	$url_rewrite_name = ot_get_option('wpl_projects_url_rewrite_name');
	if( !$url_rewrite_name ) { $url_rewrite_name = 'Project'; }

	register_post_type( 'projects',
		
		array( 'labels' => array(
			'name' => __( 'Projects', 'thearchitect-wpl' ),
			'singular_name' => $url_rewrite_name,
			'all_items' => __( 'All Projects', 'thearchitect-wpl' ),
			'add_new' => __( 'Add New', 'thearchitect-wpl' ),
			'add_new_item' => __( 'Add New Project', 'thearchitect-wpl' ),
			'edit' => __( 'Edit', 'thearchitect-wpl' ),
			'edit_item' => __( 'Edit Project', 'thearchitect-wpl' ),
			'new_item' => __( 'New Project', 'thearchitect-wpl' ),
			'view_item' => __( 'View Project', 'thearchitect-wpl' ),
			'search_items' => __( 'Search', 'thearchitect-wpl' ),
			'not_found' =>  __( 'Nothing found in the Database.', 'thearchitect-wpl' ),
			'not_found_in_trash' => __( 'Nothing found in Trash', 'thearchitect-wpl' ),
			'parent_item_colon' => ''
			),
			'description' => __( '', 'thearchitect-wpl' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-feedback',
			'rewrite' => array('slug' => $url_rewrite),
			'has_archive' => 'projects',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'sticky')
		)
	);
	
}

	add_action( 'init', 'custom_post_projects');

	$url_rewrite_cat = ot_get_option('wpl_projects_category_url_rewrite');
	if( !$url_rewrite_cat ) { $url_rewrite_cat = 'projects-category'; }

	register_taxonomy( 'projects_cat', 
		array('projects'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Project Categories', 'thearchitect-wpl' ),
				'singular_name' => __( 'Project Category', 'thearchitect-wpl' ),
				'search_items' =>  __( 'Search Project Categories', 'thearchitect-wpl' ),
				'all_items' => __( 'All Project Categories', 'thearchitect-wpl' ),
				'parent_item' => __( 'Parent Project Category', 'thearchitect-wpl' ),
				'parent_item_colon' => __( 'Parent Project Category:', 'thearchitect-wpl' ),
				'edit_item' => __( 'Edit Project Category', 'thearchitect-wpl' ),
				'update_item' => __( 'Update Project Category', 'thearchitect-wpl' ),
				'add_new_item' => __( 'Add New Project Category', 'thearchitect-wpl' ),
				'new_item_name' => __( 'New Project Category Name', 'thearchitect-wpl' )
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => $url_rewrite_cat),
		)
	);
	
?>
