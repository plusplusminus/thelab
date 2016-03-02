<?php
class thelabTheme {

	public function __construct() {

		$this->prefix = '_thelab_'; 
		$this->_cache = array();
		$this->invType = array();
		$this->type = '';		
		
	}
	public function main_menu($menu_name='main-nav',$class="main-menu") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$menu_list_start = '<ul class="nav-items">';
			$menu_list_end = '</ul>';
			$menu_list = '';

			foreach ( (array) $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$link = $menu_item->url;

					$menu_list .= sprintf('<li class="nav-items__item"><a class="nav-items__item--link" href="%s" title="%s">%s</a></li>',$link,$title,$title);
			}

			return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);
		}
		
	}

	public function footer_menu($menu_name='footer-nav',$class="footer-menu") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$menu_list_start = '<ul class="nav-items">';
			$menu_list_end = '</ul>';
			$menu_list = '';

			foreach ( (array) $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$link = $menu_item->url;

					$menu_list .= sprintf('<li class="nav-items__item"><a class="nav-items__item--link" href="%s" title="%s">%s</a></li>',$link,$title,$title);
			}

			return sprintf("%s%s%s",$menu_list_start,$menu_list,$menu_list_end);
		}
		
	}

	public function child_page_menu($type="condensed") {
	    global $post;

	    $ancestors = get_post_ancestors( $post->ID );
		/* Get the top Level page->ID count base 1, array base 0 so -1 */ 
		$parent = ($ancestors) ? $ancestors[0]: $post->ID;

	    $args =  array();
		$args['post_type'] = 'page';
		$args['orderby'] = 'menu_order';
		$args['order'] = 'ASC';
		$args['post_parent'] = $parent;

		$query = new WP_Query($args);
		$tmp = $post->ID;
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$post->old = $tmp;
			get_template_part('templates/module/home/nav',$type);

		endwhile; endif;

		wp_reset_query();
		
	}
		
	
	public function child_nav_pagination($parent=null) {
		global $post;
    	
    	if ($post->post_parent == 0) {
    		$children = get_pages( array(
				'sort_column' => 'menu_order',
				'sort_order'  => 'asc',
				'post__in' => array(12,14,10,8,5)
			) );
			$pages = array(  );
			foreach( $children as $page )
				$pages[] += $page->ID;
				
			$prev = "";
			
			$next = (array_key_exists(0,$pages)) ? $pages[0] : "";
			
			return array('next'=>$next,'prev'=>$prev);

    	} else {
    		$child  = $post->ID;
			$parent = ( null !== $parent ) ? $parent : $post->post_parent;
			
			$children = get_pages( array(
						'sort_column' => 'menu_order',
						'sort_order'  => 'ASC',
						'post__in' => array(12,14,10,8,5)
						) );
			
			$pages = array( $parent );
			foreach( $children as $page )
				$pages[] += $page->ID;
			
			if( ! in_array( $child, $pages ) && ! is_page( $parent ) )
				return;
			
			$current = array_search( $child, $pages );
				
			$prev = (array_key_exists($current-1,$pages)) ? $pages[$current-1] : "";
			$next = (array_key_exists($current+1,$pages)) ? $pages[$current+1] : "";
			
			return array('next'=>$next,'prev'=>$prev);
    	}
	}	

	private function menu_query_ids($menu_name='main-nav',$exclude="") {
	    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);

			$arr = array();

			foreach ( (array) $menu_items as $key => $menu_item ) {
				if ($menu_item->object_id == $exclude) continue;
				$arr[] = $menu_item->object_id;				
			}

			return $arr;
		}
		
	}
}
?>