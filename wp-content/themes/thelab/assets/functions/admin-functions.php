<?php
class ckCustomPostTypes {

	public function __construct() {

		add_action( 'cmb2_init', array($this,'thelab_custom_meta'));
		add_action( 'cmb2_admin_init', array($this,'taxonomy_register_taxonomy_metabox' ));
		add_action('init',array($this,'thelab_custom_posts'));
		add_action('init',array($this,'thelab_taxonomies'));
		
	}

/**---------------------
 ** Term Meta **
 ----------------------*/

		function taxonomy_register_taxonomy_metabox() {

		$prefix = '_thelab_terms_';

		/**
		 * Metabox to add fields to categories and tags
		 */
		$cmb_term = new_cmb2_box( array(
			'id'               => $prefix . 'cat-options',
			'title'            => __( 'Category Options', 'cmb2' ),
			'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
			'taxonomies'       => array( 'culture-type','community-news-type','kids-news-type','kids-store-type' ), // Tells CMB2 which taxonomies should have these fields
			'new_term_section' => true, // Will display in the "Add New Category" section
		) );


		$cmb_term->add_field( array(
			'name' => __( 'Term Icon', 'cmb2' ),
			'desc' => __( 'Icon for the category', 'cmb2' ),
			'id'   => $prefix . 'cat-icon',
			'type' => 'text',
		) );

	}

/**---------------------
 ** Custom Post Types **
 ----------------------*/

    public function thelab_custom_posts(){
		
		register_post_type(	'culture-item', 
			array(	
				'label' 			=> __('Community Items'),
				'labels' 			=> array(	'name' 					=> __('Culture Items'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Culture Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Culture Item'),
												'new_item' 				=> __('New Culture Item'),
												'view_item'				=> __('View Culture Item'),
												'search_items' 			=> __('Search Culture Items'),
												'not_found' 			=> __('No Culture Item found'),
												'not_found_in_trash' 	=> __('No Culture Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "culture-item"	), 
				'query_var' 		=> "culture-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "culture-type")
			)
		);



		register_post_type(	'community-news-item', 
			array(	
				'label' 			=> __('Community News Items'),
				'labels' 			=> array(	'name' 					=> __('Community News'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New News Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit News Item'),
												'new_item' 				=> __('New News Item'),
												'view_item'				=> __('View News Item'),
												'search_items' 			=> __('Search News Items'),
												'not_found' 			=> __('No News Item found'),
												'not_found_in_trash' 	=> __('No News Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "community-news-item"	), 
				'query_var' 		=> "community-news-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "community-news-type")
			)
		);

		register_post_type(	'kids-news-item', 
			array(	
				'label' 			=> __('Kids News Items'),
				'labels' 			=> array(	'name' 					=> __('Kids News'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New News Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit News Item'),
												'new_item' 				=> __('New News Item'),
												'view_item'				=> __('View News Item'),
												'search_items' 			=> __('Search News Items'),
												'not_found' 			=> __('No News Item found'),
												'not_found_in_trash' 	=> __('No News Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-news-item"	), 
				'query_var' 		=> "kids-news-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "kids-news-type")
			)
		);


		register_post_type(	'kids-store-item', 
			array(	
				'label' 			=> __('Kids Store Items'),
				'labels' 			=> array(	'name' 					=> __('Kids Store'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Store Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Store Item'),
												'new_item' 				=> __('New Store Item'),
												'view_item'				=> __('View Store Item'),
												'search_items' 			=> __('Search Store Items'),
												'not_found' 			=> __('No Store Item found'),
												'not_found_in_trash' 	=> __('No Store Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-store-item"	), 
				'query_var' 		=> "kids-store-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'excerpt',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
				'taxonomies'		=> array( "kids-store-type")
			)
		);


		register_post_type(	'kids-dyk-item', 
			array(	
				'label' 			=> __('Kids DYK Items'),
				'labels' 			=> array(	'name' 					=> __('Kids DYK'),
												'singular_name' 		=> __('Items'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New DYK Item'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit DYK Item'),
												'new_item' 				=> __('New DYK Item'),
												'view_item'				=> __('View DYK Item'),
												'search_items' 			=> __('Search DYK Items'),
												'not_found' 			=> __('No DYK Item found'),
												'not_found_in_trash' 	=> __('No DYK Item found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, 
				'_builtin' 			=> false, 
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> true,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "kids-dyk-item"	), 
				'query_var' 		=> "kids-dyk-item", 
				'supports' 			=> array(	'title',																
												'editor',
												'page-attributes',
												'thumbnail'
												),
				'show_in_nav_menus'	=> true ,
			)
		);
	}
/**---------------------
 ** Custom Post Types Taxonomies**
 ----------------------*/
 public function thelab_taxonomies() {	

	$labels = array(
		'name'              => __( 'Culture Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Culture Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Culture Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'culture-type' ),
	);

	register_taxonomy( 'culture-type', array('culture-item'), $args );

	$labels = array(
		'name'              => __( 'Community News Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Community News Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'News Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'community-news-type' ),
	);

	register_taxonomy( 'community-news-type', array('community-news-item'), $args );

	$labels = array(
		'name'              => __( 'Kids News Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Kids News Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'News Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kids-news-type' ),
	);

	register_taxonomy( 'kids-news-type', array('kids-news-item'), $args );

	$labels = array(
		'name'              => __( 'Kids Store Item Type', 'taxonomy general name' ),
		'singular_name'     => __( 'Kids Store Item Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Type' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Store Item Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kids-store-type' ),
	);

	register_taxonomy( 'kids-store-type', array('kids-store-item'), $args );


}

/**---------------------
 ** Custom Meta Boxes **
 ----------------------*/

	public function thelab_custom_meta() {

		$prefix = '_thelab_';
		// NEW META
	 	$parent_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'parent_page_meta',
			'title'         => __( 'Parent Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => 'template-parent.php' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$parent_page_meta->add_field( array(
			'name'       => __( 'Hero Text', 'cmb2' ),
			'desc'       => __( 'Text to appear over hero image', 'cmb2' ),
			'id'         => $prefix . 'parent_hero_text',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'wpautop' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 1),
				'media_buttons' => false
			),
		) );

	 	$home_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'home_page_meta',
			'title'         => __( 'Home Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => 'template-parent.php' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

	 	$home_page_meta->add_field( array(
	 		'name'       => __( 'Home Slide Background Image', 'cmb2' ),
	 		'desc'       => __( 'Background Image on home page slide', 'cmb2' ),
	 		'id'         => $prefix . 'home_hero_bg',
	 		'type'       => 'file',
	 	) );

	 	$home_page_meta->add_field( array(
	 		'name'       => __( 'Home Slide Hero Text', 'cmb2' ),
	 		'desc'       => __( 'Text to appear on home page slide', 'cmb2' ),
	 		'id'         => $prefix . 'home_hero_text',
	 		'type'       => 'wysiwyg',
	 		'options' => array(
	 			'teeny' => true,
	 			'wpautop' => true,
	 			'textarea_rows' => get_option('default_post_edit_rows', 1),
	 			'media_buttons' => false
	 		),
	 	) );

	 	$home_page_meta->add_field( array(
	 		'name'       => __( 'Home Slide Btn Text', 'cmb2' ),
	 		'id'         => $prefix . 'home_hero_btn_label',
	 		'type'       => 'text',
	 	) );

	 	$home_page_meta->add_field( array(
	 		'name'       => __( 'Home Slide Btn URL', 'cmb2' ),
	 		'id'         => $prefix . 'home_hero_btn_url',
	 		'type'       => 'text',
	 	) );

		$home_page_group_meta = $home_page_meta->add_field( array(
		    'id'          => $prefix . 'nav_block_repeat_group',
		    'type'        => 'group',
		    'description' => __( 'Add Nav blocks to Home page slide footer', 'cmb2' ),
		    // 'repeatable'  => false, // use false if you want non-repeatable group
		    'options'     => array(
		        'group_title'   => __( 'Nav block {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Nav Block', 'cmb2' ),
		        'remove_button' => __( 'Remove Nav Block', 'cmb2' ),
		        'sortable'      => true, // beta
		        // 'closed'     => true, // true to have the groups closed by default
		    ),
		) );

	 	$home_page_meta->add_group_field( $home_page_group_meta, array(
	 		'name'       => __( 'Page Nav Title', 'cmb2' ),
	 		'id'         => $prefix . 'home_nav_title_1',
	 		'type'       => 'text',
	 	) );

	 	$home_page_meta->add_group_field( $home_page_group_meta, array(
	 		'name'       => __( 'Page Nav Text', 'cmb2' ),
	 		'id'         => $prefix . 'home_nav_text_1',
	 		'type'       => 'textarea',
	 	) );

	 	$home_page_meta->add_group_field( $home_page_group_meta, array(
	 		'name'       => __( 'Page Nav URL', 'cmb2' ),
	 		'id'         => $prefix . 'home_nav_url_1',
	 		'type'       => 'text',
	 	) );

	 	$page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'page_meta',
			'title'         => __( 'General Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
	        'show_on'       => array( 'key' => 'page-template', 'value' => array('template-parent.php','template-home.php','template-donate.php') ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );


		$page_meta->add_field( array(
			'name'       => __( 'Short Menu Title', 'cmb2' ),
			'id'         => $prefix . 'short_title',
			'type'       => 'text',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Sub Title', 'cmb2' ),
			'id'         => $prefix . 'page_subtitle',
			'type'       => 'text',
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Introduction', 'cmb2' ),
			'desc'       => __( 'Introduction paragraph for page', 'cmb2' ),
			'id'         => $prefix . 'page_intro',
			'show_on_cb'  => 'cmb_id_not_home',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => true
			),
		) );

		$page_meta->add_field( array(
			'name'       => __( 'Page Details', 'cmb2' ),
			'desc'       => __( 'More detailed paragraph for page', 'cmb2' ),
			'id'         => $prefix . 'page_details',
			'show_on_cb'  => 'cmb_id_donate',
			'type'       => 'wysiwyg',
			'options' => array(
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

	 	$child_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'child_page_meta',
			'title'         => __( 'Child Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'    => true,
		) );

		$child_page_meta->add_field( array(
			'name'       => __( 'Short Menu Title', 'cmb2' ),
			'id'         => $prefix . 'short_title',
			'type'       => 'text',
		) );

		$child_page_meta->add_field( array(
			'name'       => __( 'Child Page Introduction', 'cmb2' ),
			'desc'       => __( 'Introduction paragraph for child page', 'cmb2' ),
			'id'         => $prefix . 'child_page_intro',
			'type'       => 'wysiwyg',
			'options' => array(
				'wpautop' => true,
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
		) );

		$child_page_meta->add_field( array(
			'name'       => __( 'Collapse Heading', 'cmb2' ),
			'id'         => $prefix . 'collapse_heading',
			'type'       => 'text',
		) );

		$child_page_group_meta = $child_page_meta->add_field( array(
		    'id'          => $prefix . 'child_repeat_group',
		    'type'        => 'group',
		    'description' => __( 'Collapsable Content', 'cmb2' ),
		    // 'repeatable'  => false, // use false if you want non-repeatable group
		    'options'     => array(
		        'group_title'   => __( 'Collapse {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Collapsable Section', 'cmb2' ),
		        'remove_button' => __( 'Remove Collapse', 'cmb2' ),
		        'sortable'      => true, // beta
		        // 'closed'     => true, // true to have the groups closed by default
		    ),
		) );

	 	$child_page_meta->add_group_field( $child_page_group_meta, array(
	 		'name'       => __( 'Collapse Title', 'cmb2' ),
	 		'id'         => $prefix . 'collapse_title',
	 		'type'       => 'text',
	 	) );

	 	$child_page_meta->add_group_field( $child_page_group_meta, array(
	 		'name'       => __( 'Collapse Content', 'cmb2' ),
	 		'id'         => $prefix . 'collapse_content',
			'type'       => 'wysiwyg',
			'options' => array(
				'wpautop' => true,
				'teeny' => true,
				'textarea_rows' => get_option('default_post_edit_rows', 5),
				'media_buttons' => false
			),
	 	) );

	 	$child_page_meta->add_group_field( $child_page_group_meta, array(
	 		'name'       => __( 'Collapse CTA Label', 'cmb2' ),
	 		'id'         => $prefix . 'collapse_cta_label',
	 		'type'       => 'text',
	 	) );

	 	$child_page_meta->add_group_field( $child_page_group_meta, array(
	 		'name'       => __( 'Collapse CTA URL', 'cmb2' ),
	 		'id'         => $prefix . 'collapse_cta_url',
	 		'type'       => 'text',
	 	) );

		//---
		// CMB2 Conditional Functions
		//---

		// Page Title on Home Page
		function cmb_id_home($field) { global $post; return ($post->ID == 50) ; }
		function cmb_id_not_home($field) { global $post; return ($post->ID != 50) ; }
		
	} 
}

global $cpt; 
$cpt = new ckCustomPostTypes(); 