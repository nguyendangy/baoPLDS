<?php
/**
 * TennisClub Framework: Services support
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Theme init
if (!function_exists('tennisclub_services_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_services_theme_setup',1 );
	function tennisclub_services_theme_setup() {
		
		// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
		add_filter('tennisclub_filter_get_blog_type',			'tennisclub_services_get_blog_type', 9, 2);
		add_filter('tennisclub_filter_get_blog_title',		'tennisclub_services_get_blog_title', 9, 2);
		add_filter('tennisclub_filter_get_current_taxonomy',	'tennisclub_services_get_current_taxonomy', 9, 2);
		add_filter('tennisclub_filter_is_taxonomy',			'tennisclub_services_is_taxonomy', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_title',	'tennisclub_services_get_stream_page_title', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_link',	'tennisclub_services_get_stream_page_link', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_id',	'tennisclub_services_get_stream_page_id', 9, 2);
		add_filter('tennisclub_filter_query_add_filters',		'tennisclub_services_query_add_filters', 9, 2);
		add_filter('tennisclub_filter_detect_inheritance_key','tennisclub_services_detect_inheritance_key', 9, 1);

		// Extra column for services lists
		if (tennisclub_get_theme_option('show_overriden_posts')=='yes') {
			add_filter('manage_edit-services_columns',			'tennisclub_post_add_options_column', 9);
			add_filter('manage_services_posts_custom_column',	'tennisclub_post_fill_options_column', 9, 2);
		}
		
		// Add supported data types
		tennisclub_theme_support_pt('services');
		tennisclub_theme_support_tx('services_group');
	}
}

if ( !function_exists( 'tennisclub_services_settings_theme_setup2' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_services_settings_theme_setup2', 3 );
	function tennisclub_services_settings_theme_setup2() {
		// Add post type 'services' and taxonomy 'services_group' into theme inheritance list
		tennisclub_add_theme_inheritance( array('services' => array(
			'stream_template' => 'blog-services',
			'single_template' => 'single-service',
			'taxonomy' => array('services_group'),
			'taxonomy_tags' => array(),
			'post_type' => array('services'),
			'override' => 'custom'
			) )
		);
	}
}



// Return true, if current page is services page
if ( !function_exists( 'tennisclub_is_services_page' ) ) {
	function tennisclub_is_services_page() {
		$is = in_array(tennisclub_storage_get('page_template'), array('blog-services', 'single-service'));
		if (!$is) {
			if (!tennisclub_storage_empty('pre_query'))
				$is = tennisclub_storage_call_obj_method('pre_query', 'get', 'post_type')=='services' 
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', 'services_group') 
						|| (tennisclub_storage_call_obj_method('pre_query', 'is_page') 
								&& ($id=tennisclub_get_template_page_id('blog-services')) > 0 
								&& $id==tennisclub_storage_get_obj_property('pre_query', 'queried_object_id', 0) 
							);
			else
				$is = get_query_var('post_type')=='services' 
						|| is_tax('services_group') 
						|| (is_page() && ($id=tennisclub_get_template_page_id('blog-services')) > 0 && $id==get_the_ID());
		}
		return $is;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'tennisclub_services_detect_inheritance_key' ) ) {
	
	function tennisclub_services_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return tennisclub_is_services_page() ? 'services' : '';
	}
}

// Filter to detect current page slug
if ( !function_exists( 'tennisclub_services_get_blog_type' ) ) {
	
	function tennisclub_services_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;
		if ($query && $query->is_tax('services_group') || is_tax('services_group'))
			$page = 'services_category';
		else if ($query && $query->get('post_type')=='services' || get_query_var('post_type')=='services')
			$page = $query && $query->is_single() || is_single() ? 'services_item' : 'services';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'tennisclub_services_get_blog_title' ) ) {
	
	function tennisclub_services_get_blog_title($title, $page) {
		if (!empty($title)) return $title;
		if ( tennisclub_strpos($page, 'services')!==false ) {
			if ( $page == 'services_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'services_group' ), 'services_group', OBJECT);
				$title = $term->name;
			} else if ( $page == 'services_item' ) {
				$title = tennisclub_get_post_title();
			} else {
				$title = esc_html__('All services', 'tennisclub');
			}
		}
		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'tennisclub_services_get_stream_page_title' ) ) {
	
	function tennisclub_services_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (tennisclub_strpos($page, 'services')!==false) {
			if (($page_id = tennisclub_services_get_stream_page_id(0, $page=='services' ? 'blog-services' : $page)) > 0)
				$title = tennisclub_get_post_title($page_id);
			else
				$title = esc_html__('All services', 'tennisclub');				
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'tennisclub_services_get_stream_page_id' ) ) {
	
	function tennisclub_services_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (tennisclub_strpos($page, 'services')!==false) $id = tennisclub_get_template_page_id('blog-services');
		return $id;
	}
}

// Filter to detect stream page URL
if ( !function_exists( 'tennisclub_services_get_stream_page_link' ) ) {
	
	function tennisclub_services_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (tennisclub_strpos($page, 'services')!==false) {
			$id = tennisclub_get_template_page_id('blog-services');
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'tennisclub_services_get_current_taxonomy' ) ) {
	
	function tennisclub_services_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( tennisclub_strpos($page, 'services')!==false ) {
			$tax = 'services_group';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'tennisclub_services_is_taxonomy' ) ) {
	
	function tennisclub_services_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else 
			return $query && $query->get('services_group')!='' || is_tax('services_group') ? 'services_group' : '';
	}
}

// Add custom post type and/or taxonomies arguments to the query
if ( !function_exists( 'tennisclub_services_query_add_filters' ) ) {
	
	function tennisclub_services_query_add_filters($args, $filter) {
		if ($filter == 'services') {
			$args['post_type'] = 'services';
		}
		return $args;
	}
}

?>