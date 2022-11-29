<?php
/**
 * TennisClub Framework: Players support
 *
 * @package	tennisclub
 * @since	tennisclub 3.5
 */

// Theme init
if (!function_exists('tennisclub_players_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_players_theme_setup', 1 );
	function tennisclub_players_theme_setup() {

		// Sort players by points
		add_action('wp_ajax_sort_by_points',				'tennisclub_players_callback_sort_by_points');
		add_action('wp_ajax_nopriv_sort_by_points',			'tennisclub_players_callback_sort_by_points');
		
		// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
		add_filter('tennisclub_filter_get_blog_type',			'tennisclub_players_get_blog_type', 9, 2);
		add_filter('tennisclub_filter_get_blog_title',		'tennisclub_players_get_blog_title', 9, 2);
		add_filter('tennisclub_filter_get_current_taxonomy',	'tennisclub_players_get_current_taxonomy', 9, 2);
		add_filter('tennisclub_filter_is_taxonomy',			'tennisclub_players_is_taxonomy', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_title',	'tennisclub_players_get_stream_page_title', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_link',	'tennisclub_players_get_stream_page_link', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_id',	'tennisclub_players_get_stream_page_id', 9, 2);
		add_filter('tennisclub_filter_query_add_filters',		'tennisclub_players_query_add_filters', 9, 2);
		add_filter('tennisclub_filter_detect_inheritance_key','tennisclub_players_detect_inheritance_key', 9, 1);

		// Extra column for players lists
		if (tennisclub_get_theme_option('show_overriden_posts')=='yes') {
			add_filter('manage_edit-players_columns',			'tennisclub_post_add_options_column', 9);
			add_filter('manage_players_posts_custom_column',	'tennisclub_post_fill_options_column', 9, 2);
		}
	
		// Add supported data types
		tennisclub_theme_support_pt('players');
		tennisclub_theme_support_tx('players_group');
	}
}

if ( !function_exists( 'tennisclub_players_settings_theme_setup2' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_players_settings_theme_setup2', 3 );
	function tennisclub_players_settings_theme_setup2() {
		// Add post type 'players' and taxonomy 'players_group' into theme inheritance list
		tennisclub_add_theme_inheritance( array('players' => array(
			'stream_template' => 'blog-players',
			'single_template' => 'single-players',
			'taxonomy' => array('players_group'),
			'taxonomy_tags' => array(),
			'post_type' => array('players'),
			'override' => 'custom'
			) )
		);
	}
}


if (!function_exists('tennisclub_players_after_theme_setup')) {
	add_action( 'tennisclub_action_after_init_theme', 'tennisclub_players_after_theme_setup' );
	function tennisclub_players_after_theme_setup() {
		// Update fields in the override options
		if (tennisclub_storage_get_array('post_override_options', 'page')=='players') {
			// Meta box fields
			tennisclub_storage_set_array('post_override_options', 'title', esc_html__('Players Options', 'tennisclub'));
			tennisclub_storage_set_array('post_override_options', 'fields', array(
				"mb_partition_players" => array(
					"title" => esc_html__('Players', 'tennisclub'),
					"override" => "page,post,custom",
					"divider" => false,
					"icon" => "iconadmin-users",
					"type" => "partition"),
				"mb_info_players_1" => array(
					"title" => esc_html__('Player details', 'tennisclub'),
					"override" => "page,post,custom",
					"divider" => false,
					"desc" => wp_kses_data( __('In this section you can put details for this player', 'tennisclub') ),
					"class" => "player_meta",
					"type" => "info"),
				"player_country" => array(
					"title" => esc_html__('Country',  'tennisclub'),
					"desc" => wp_kses_data( __("Country of the player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "player_country",
					"std" => "",
					"type" => "select",
					"options" => tennisclub_get_list_countries()
				),
				"player_club" => array(
					"title" => esc_html__("Club",  'tennisclub'),
					"desc" => wp_kses_data( __("Club of the player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "player_club",
					"std" => "",
					"type" => "text"),
				"player_type" => array(
					"title" => esc_html__('Type',  'tennisclub'),
					"desc" => wp_kses_data( __("Select player type", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "player_type",
					"std" => "",
					"type" => "select",
					"options" => array(
						"player" => esc_html__('Single Player', 'tennisclub'),
						"team" => esc_html__('Team', 'tennisclub')
					)
				),
				"player_age" => array(
					"title" => esc_html__("Age",  'tennisclub'),
					"desc" => wp_kses_data( __("Age of the player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "player_age",
					"dependency" => array(
						'player_type' => array('player')
					),
					"std" => "",
					"type" => "text"),
				"player_socials" => array(
					"title" => esc_html__("Social links",  'tennisclub'),
					"desc" => wp_kses_data( __("Team member's socials icons: name=url|name=url... For example: facebook=http://facebook.com/myaccount|twitter=http://twitter.com/myaccount", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "player_socials",
					"std" => "",
					"type" => "text")
					
				)
			);
		}
	}
}


// Return true, if current page is players page
if ( !function_exists( 'tennisclub_is_players_page' ) ) {
	function tennisclub_is_players_page() {
		$is = in_array(tennisclub_storage_get('page_template'), array('blog-players', 'single-players'));
		if (!$is) {
			if (!tennisclub_storage_empty('pre_query'))
				$is = tennisclub_storage_call_obj_method('pre_query', 'get', 'post_type')=='players'
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', 'players_group') 
						|| (tennisclub_storage_call_obj_method('pre_query', 'is_page') 
							&& ($id=tennisclub_get_template_page_id('blog-players')) > 0 
							&& $id==tennisclub_storage_get_obj_property('pre_query', 'queried_object_id', 0)
							);
			else
				$is = get_query_var('post_type')=='players' 
						|| is_tax('players_group') 
						|| (is_page() && ($id=tennisclub_get_template_page_id('blog-players')) > 0 && $id==get_the_ID());
		}
		return $is;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'tennisclub_players_detect_inheritance_key' ) ) {
	
	function tennisclub_players_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return tennisclub_is_players_page() ? 'players' : '';
	}
}

// Filter to detect current page slug
if ( !function_exists( 'tennisclub_players_get_blog_type' ) ) {
	
	function tennisclub_players_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;
		if ($query && $query->is_tax('players_group') || is_tax('players_group'))
			$page = 'players_category';
		else if ($query && $query->get('post_type')=='players' || get_query_var('post_type')=='players')
			$page = $query && $query->is_single() || is_single() ? 'players_item' : 'players';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'tennisclub_players_get_blog_title' ) ) {
	
	function tennisclub_players_get_blog_title($title, $page) {
		if (!empty($title)) return $title;
		if ( tennisclub_strpos($page, 'players')!==false ) {
			if ( $page == 'players_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'players_group' ), 'players_group', OBJECT);
				$title = $term->name;
			} else if ( $page == 'players_item' ) {
				$title = tennisclub_get_post_title();
			} else {
				$title = esc_html__('All players', 'tennisclub');
			}
		}
		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'tennisclub_players_get_stream_page_title' ) ) {
	
	function tennisclub_players_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (tennisclub_strpos($page, 'players')!==false) {
			if (($page_id = tennisclub_players_get_stream_page_id(0, $page=='players' ? 'blog-players' : $page)) > 0)
				$title = tennisclub_get_post_title($page_id);
			else
				$title = esc_html__('All players', 'tennisclub');				
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'tennisclub_players_get_stream_page_id' ) ) {
	
	function tennisclub_players_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (tennisclub_strpos($page, 'players')!==false) $id = tennisclub_get_template_page_id('blog-players');
		return $id;
	}
}

// Filter to detect stream page URL
if ( !function_exists( 'tennisclub_players_get_stream_page_link' ) ) {
	
	function tennisclub_players_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (tennisclub_strpos($page, 'players')!==false) {
			$id = tennisclub_get_template_page_id('blog-players');
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'tennisclub_players_get_current_taxonomy' ) ) {
	
	function tennisclub_players_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( tennisclub_strpos($page, 'players')!==false ) {
			$tax = 'players_group';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'tennisclub_players_is_taxonomy' ) ) {
	
	function tennisclub_players_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else 
			return $query && $query->get('players_group')!='' || is_tax('players_group') ? 'players_group' : '';
	}
}

// Add custom post type and/or taxonomies arguments to the query
if ( !function_exists( 'tennisclub_players_query_add_filters' ) ) {
	
	function tennisclub_players_query_add_filters($args, $filter) {
		if ($filter == 'players') {
			$args['post_type'] = 'players';
		}
		return $args;
	}
}


// Return matches by term id
if ( !function_exists('tennisclub_get_matches_by_term') ){
	function tennisclub_get_matches_by_term($term_id){
		global $wpdb;
		$matches = $wpdb->get_results( $wpdb->prepare( "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = %d", $term_id) );
		return $matches;
	}
}


// Sort players by points
if ( !function_exists('tennisclub_players_callback_sort_by_points') ){
	
	
	function tennisclub_players_callback_sort_by_points(){
		if ( !wp_verify_nonce( tennisclub_get_value_gp('nonce'), admin_url('admin-ajax.php') ) )
			wp_die();
	
		$sort = tennisclub_get_value_gpc('sort');
		$table = tennisclub_unserialize(stripslashes($_REQUEST['table']));
		
		$output = tennisclub_get_players_table($sort, $table);
		
		$response = array('error'=>'', 'data'=> $output);

		echo json_encode($response);
		wp_die();
	}
}


// Return players table
if ( !function_exists('tennisclub_get_players_table') ){
	function tennisclub_get_players_table($sort, $table){		
		$output = '';
		
		if(!empty($table)){
			if ($sort == 'asc') arsort($table);
			else asort($table);
			
			$output .= '<div class="sc_table">'
						.'<table>'
							.'<tr><td>'.esc_html__('Player', 'tennisclub').'</td><td><span class="sort sort_'.esc_attr($sort).'">'.esc_html__('Points', 'tennisclub').'</span></td></tr>';
										
			foreach ( $table as $player => $points ) {	
				$post_meta = get_post_meta($player, tennisclub_storage_get('options_prefix') . '_post_options', true);
				$country = tennisclub_get_list_countries(false,$post_meta['player_country']);
				$img = tennisclub_get_resized_image_tag($player, 35, 35);
				$url = get_post_permalink($player);
				$title = get_the_title($player);
				$output .= '<tr data-cat="'.esc_attr($points[1]).'">'
								.'<td class="player">'
									.$img
									.'<a class="title" href="'.esc_url($url).'">'.esc_html($title).'</a>'
									.'<span class="country"> - '.esc_html($country).'</span>'
								.'</td>'
								.'<td class="points">'.esc_html($points[0]).'</td>'
							.'</tr>';
			}	
										 
			$output .=	'</tbody>'
						.'</table>'
					.'</div>';
		}	
		return $output;
	}
}
?>