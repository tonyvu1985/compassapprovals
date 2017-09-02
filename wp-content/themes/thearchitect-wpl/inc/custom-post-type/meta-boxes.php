<?php
/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_meta_boxes() {

	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 */
	$page_meta_box = array(
		'id'          => 'page_meta_box',
		'title'       => __( 'Page Options', 'thearchitect-wpl' ),
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label' 	=> __( 'Page Layout', 'thearchitect-wpl' ),
				'desc' 		=> '',
				'id' 		=> 'wpl_page_layout',
				'type' 		=> 'select',
				'choices'     => array(
					array(
					'label'		=> __( 'Fullwidth', 'thearchitect-wpl' ),
					'value'		=> 'fullwidth'
					),
					array(
					'label'		=> __( 'Boxed', 'thearchitect-wpl' ),
					'value'		=> 'boxed'
					)
				),
				'std' 		=> 'boxed',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			),
			array(
				'label' 	=> __( 'Use Default Title', 'thearchitect-wpl' ),
				'desc' 		=> __( 'If you want a simple page layout with the default page title within your page header, enable this option.', 'thearchitect-wpl' ),
				'id' 		=> 'wpl_page_default_title',
				'type' 		=> 'select',
				'choices'     => array(
					array(
					'label'		=> __( 'Enable', 'thearchitect-wpl' ),
					'value'		=> 'enable'
					),
					array(
					'label'		=> __( 'Disable', 'thearchitect-wpl' ),
					'value'		=> 'disable'
					)
				),
				'std' 		=> 'disable',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			),
			array(
				'label' 	=> __( 'Featured Image Height', 'thearchitect-wpl' ),
				'desc' 		=> __( 'Set the height of the Featured Image area for this page.', 'thearchitect-wpl' ),
				'id' 		=> 'wpl_page_featured_height',
				'type' 		=> 'text',
				'std' 		=> '500px',
				'rows'        => '0',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			),
			array(
				'label' 	=> __( 'Featured Image Content', 'thearchitect-wpl' ),
				'desc' 		=> __( 'This content is retrieved within the Page Featured Image area. It will display only if you set a Featured Image for this page. HTML is allowed.', 'thearchitect-wpl' ),
				'id' 		=> 'wpl_page_featured_content',
				'type' 		=> 'textarea-simple',
				'std' 		=> '',
				'rows'        => '10',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			),
		)
	);
ot_register_meta_box( $page_meta_box );
	/*-----------------------------------------------------------
  		Project Template
  	-----------------------------------------------------------*/
	
	$page_meta_box = array(
		'id'          => 'page_meta_box',
		'title'       => __( 'Project Template Options', 'thearchitect-wpl' ),
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label' 	=> __( 'Excerpt', 'thearchitect-wpl' ),
				'desc' 		=> __( 'Excerpt', 'thearchitect-wpl' ),
				'id' 		=> 'wpl_page_excerpt',
				'type' 		=> 'text',
				'std' 		=> '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			),

			array(
				'label'       => __( 'Number of columns', 'thearchitect-wpl' ),
				'id'          => 'wpl_project_columns',
				'type'        => 'select',
				'desc'        => __( 'Select the number of columns.', 'thearchitect-wpl' ),
				'choices'     => array(
					array(
						'label'		=> __( 'Two', 'thearchitect-wpl' ),
						'value'		=> 'columns-2'
					),
					array(
						'label'		=> __( 'Three', 'thearchitect-wpl' ),
						'value'		=> 'columns-3',
					),
					array(
						'label'		=> __( 'Four', 'thearchitect-wpl' ),
						'value'		=> 'columns-4',
					),
				),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label' 	=> __( 'Number of projects', 'thearchitect-wpl' ),
				'desc' 		=> __( 'Specify the number of projects per page', 'thearchitect-wpl' ),
				'id' 		=> 'wpl_projects_number',
				'type' 		=> 'numeric-slider',							
				'std' 		=> '10',
				'min_max_step'=> '1,30,1',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
			)
			
		)
	);

	$post_id = (isset($_GET['post'])) ? $_GET['post'] : ((isset($_POST['post_ID'])) ? $_POST['post_ID'] : false);

	if ($post_id) : 
		$post_template = get_post_meta($post_id, '_wp_page_template', true);
	
	if ($post_template == 'template-projects.php') 
		ot_register_meta_box($page_meta_box);
	endif;


	$projects_meta_box = array(
		'id'          => 'projects_meta_box',
		'title'       => __( 'Project Options', 'thearchitect-wpl' ),
		'desc'        => '',
		'pages'       => array( 'projects' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(

			array(
			  'id' => 'post_meta',
			  'label' => __( 'Project Metadata', 'thearchitect-wpl' ),
			  'type' => 'tab',

			),

				array(
					'label' 	=> __( 'Project Metadata (Sidebar Layout Only)', 'thearchitect-wpl' ),
					'desc' 		=> __( 'These informations will be retrieved and displayed only if you use the Sidebar Project Layout which you can set within the Layout & Styles tab at your left.', 'thearchitect-wpl' ),
					'id' 		=> '',
					'type' 		=> 'textblock-titled',
					'std' 		=> '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

				array(
					'label' 	=> __( 'Case Study', 'thearchitect-wpl' ),
					'desc' 		=> __( 'The sidebar text is visible under the project title within the right sidebar layout. If you use the fullwidth layout, you can leave this field empty.', 'thearchitect-wpl' ),
					'id' 		=> 'wpl_project_case_study',
					'type' 		=> 'textarea-simple',
					'std' 		=> '',
					'rows'        => '10',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

				array(
					'label' 	=> __( 'Client', 'thearchitect-wpl' ),
					'desc' 		=> __( 'Enter the name of your client.', 'thearchitect-wpl' ),
					'id' 		=> 'wpl_project_client',
					'type' 		=> 'text',
					'std' 		=> '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

				array(
					'label' 	=> __( 'Geographic Location', 'thearchitect-wpl' ),
					'desc' 		=> __( 'Enter the geographic location of the project. It could be a towm, a city or a country.', 'thearchitect-wpl' ),
					'id' 		=> 'wpl_project_location',
					'type' 		=> 'text',
					'std' 		=> '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

				array(
					'label' 	=> __( 'Cost', 'thearchitect-wpl' ),
					'desc' 		=> __( 'Enter the cost of this project.', 'thearchitect-wpl' ),
					'id' 		=> 'wpl_project_cost',
					'type' 		=> 'text',
					'std' 		=> '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

				array(
					'label' 	=> __( 'Status', 'thearchitect-wpl' ),
					'desc' 		=> __( 'Enter the current status of this project. (IE: Completed 2014, In Progress, etc...)', 'thearchitect-wpl' ),
					'id' 		=> 'wpl_project_status',
					'type' 		=> 'text',
					'std' 		=> '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

			array(
			  'id' => 'post_layout',
			  'label' => __( 'Layout & Styles', 'thearchitect-wpl' ),
			  'type' => 'tab'
			),

				array(
					'label'       => __( 'Project Layout', 'thearchitect-wpl' ),
					'id'          => 'wpl_project_sidebar',
					'type'        => 'select',
					'desc'        => __( 'Choose the layout of the page for your project. If you want to be free to build your showcase the way you want, choose the Fullwidth Project Layout.', 'thearchitect-wpl' ),
					'choices'     => array(
						array(
						'label'		=> __( 'Fullwidth', 'thearchitect-wpl' ),
						'value'		=> 'fullwidth',
						),
						array(
						'label'		=> __( 'With Sidebar', 'thearchitect-wpl' ),
						'value'		=> 'default'
						)
					),
					'std'         => 'fullwidth',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => ''
				),

				array(
					'label' 	=> __( 'Cover Text Color', 'thearchitect-wpl' ),
					'desc' 		=> '',
					'id' 		=> 'wpl_project_text_color',
					'type' 		=> 'select',
					'choices'     => array(
						array(
						'label'		=> __( 'White', 'thearchitect-wpl' ),
						'value'		=> 'white'
						),
						array(
						'label'		=> __( 'Black', 'thearchitect-wpl' ),
						'value'		=> 'black'
						)
					),
					'std' 		=> 'white',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
				),

		)
	);

	ot_register_meta_box( $projects_meta_box );
	
}
