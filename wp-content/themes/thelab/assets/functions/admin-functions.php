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
	}

/**---------------------
 ** Custom Post Types Taxonomies**
 ----------------------*/
 	public function thelab_taxonomies() {	
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

	 	$home_page_meta->add_field( array(
	 		'name'       => __( 'ID of footer link', 'cmb2' ),
	 		'id'         => $prefix . 'home_next_id',
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
			'show_on_cb'  => 'cmb_id_education',
		) );

		$child_page_group_meta = $child_page_meta->add_field( array(
		    'id'          => $prefix . 'child_repeat_group',
		    'type'        => 'group',
		    'description' => __( 'Collapsable Content', 'cmb2' ),
		    'show_on_cb'  => 'cmb_id_education',
		    // 'repeatable'  => false, // use false if you want non-repeatable group
		    'options'     => array(
		        'group_title'   => __( 'Collapse {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Collapsable Section', 'cmb2' ),
		        'remove_button' => __( 'Remove Collapse', 'cmb2' ),
		        'sortable'      => true, // beta
		        'closed'     => true, // true to have the groups closed by default
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

	 	$center_page_meta = new_cmb2_box( array(
			'id'            => $prefix . 'center_page_meta',
			'title'         => __( 'Our Center Page Options', 'cmb2' ),
			'object_types'  => array( 'page' ), // Post type
			'context'       => 'normal',
			'show_on_cb'    => 'cmb_id_our_center',
			'priority'      => 'low',
			'show_names'    => true,
		) );

		$center_page_meta->add_field( array(
			'name'       => __( 'Section Heading', 'cmb2' ),
			'id'         => $prefix . 'center_section_heading',
			'type'       => 'text',
			'show_on_cb'  => 'cmb_id_our_center',
		) );

		$center_page_group_meta = $center_page_meta->add_field( array(
		    'id'          => $prefix . 'center_repeat_group',
		    'type'        => 'group',
		    'show_on_cb'  => 'cmb_id_our_center',
		    'description' => __( 'Center Administrators', 'cmb2' ),
		    // 'repeatable'  => false, // use false if you want non-repeatable group
		    'options'     => array(
		        'group_title'   => __( 'Administrator {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Administrator', 'cmb2' ),
		        'remove_button' => __( 'Remove Administrator', 'cmb2' ),
		        'sortable'      => true, // beta
		        // 'closed'     => true, // true to have the groups closed by default
		    ),
		) );
	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Administrator Name', 'cmb2' ),
	 		'id'         => $prefix . 'center_name',
	 		'type'       => 'text',
	 	) );

	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Name Link', 'cmb2' ),
	 		'id'         => $prefix . 'center_link',
	 		'type'       => 'text',
	 		'description'=> 'URL to where the name should link'
	 	) );
	 	
	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Role', 'cmb2' ),
	 		'id'         => $prefix . 'center_role',
	 		'type'       => 'text',
	 	) );

	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Description', 'cmb2' ),
	 		'id'         => $prefix . 'center_description',
	 		'type'       => 'textarea',
	 	) );

	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Phone', 'cmb2' ),
	 		'id'         => $prefix . 'center_phone',
	 		'type'       => 'text',
	 		'description'=> 'format: 1-555-555-5555',
	 	) );
	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Email', 'cmb2' ),
	 		'id'         => $prefix . 'center_email',
	 		'type'       => 'text',
	 	) );
	 	$center_page_meta->add_group_field( $center_page_group_meta, array(
	 		'name'       => __( 'Photo', 'cmb2' ),
	 		'id'         => $prefix . 'center_image',
	 		'type'       => 'file',
	 	) );

		//---
		// CMB2 Conditional Functions
		//---

		// Page Title on Home Page
		function cmb_id_home($field) { global $post; return ($post->ID == 50) ; }
		function cmb_id_not_home($field) { global $post; return ($post->ID != 50) ; }
		

		// Repeating Group For Our Center
		function cmb_id_our_center($field) { global $post; return ($post->ID == 200) ; }
		
		// Collapse Group For Education
		function cmb_id_education($field) { global $post; return ($post->ID == 78 || $post->ID == 80 || $post->ID == 123) ; }

	} 
}

global $cpt; 
$cpt = new ckCustomPostTypes(); 