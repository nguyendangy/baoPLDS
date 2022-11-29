<?php
/**
 * TennisClub Framework: Matches support
 *
 * @package	tennisclub
 * @since	tennisclub 3.5
 */

// Theme init
if (!function_exists('tennisclub_matches_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_matches_theme_setup', 1 );
	function tennisclub_matches_theme_setup() {
		add_action('tennisclub_action_add_styles', 			'tennisclub_matches_add_styles' );
		
		// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
		add_filter('tennisclub_filter_get_blog_type',			'tennisclub_matches_get_blog_type', 9, 2);
		add_filter('tennisclub_filter_get_blog_title',		'tennisclub_matches_get_blog_title', 9, 2);
		add_filter('tennisclub_filter_get_current_taxonomy',	'tennisclub_matches_get_current_taxonomy', 9, 2);
		add_filter('tennisclub_filter_is_taxonomy',			'tennisclub_matches_is_taxonomy', 9, 2);
		add_filter('tennisclub_filter_get_period_links',		'tennisclub_matches_get_period_links', 9, 3);
		add_filter('tennisclub_filter_get_stream_page_title',	'tennisclub_matches_get_stream_page_title', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_link',	'tennisclub_matches_get_stream_page_link', 9, 2);
		add_filter('tennisclub_filter_get_stream_page_id',	'tennisclub_matches_get_stream_page_id', 9, 2);
		add_filter('tennisclub_filter_query_add_filters',		'tennisclub_matches_query_add_filters', 9, 2);
		add_filter('tennisclub_filter_detect_inheritance_key','tennisclub_matches_detect_inheritance_key', 9, 1);
		add_filter('tennisclub_filter_list_post_types', 		'tennisclub_matches_list_post_types', 10, 1);
		add_filter('tennisclub_filter_post_date',		 		'tennisclub_matches_post_date', 9, 3);

		// Advanced Calendar filters
		add_filter('tennisclub_filter_calendar_get_prev_month',			'tennisclub_matches_calendar_get_prev_month', 9, 2);
		add_filter('tennisclub_filter_calendar_get_next_month',			'tennisclub_matches_calendar_get_next_month', 9, 2);
		add_filter('tennisclub_filter_calendar_get_curr_month_posts',		'tennisclub_matches_calendar_get_curr_month_posts', 9, 2);

		// Add Main Query parameters
		add_filter( 'posts_join',										'tennisclub_matches_posts_join', 10, 2 );
		add_filter( 'getarchives_join',									'tennisclub_matches_getarchives_join', 10, 2 );
		add_filter( 'posts_where',										'tennisclub_matches_posts_where', 10, 2 );
		add_filter( 'getarchives_where',								'tennisclub_matches_getarchives_where', 10, 2 );

		// Extra column for matches lists
		if (tennisclub_get_theme_option('show_overriden_posts')=='yes') {
			add_filter('manage_edit-matches_columns',			'tennisclub_post_add_options_column', 9);
			add_filter('manage_matches_posts_custom_column',	'tennisclub_post_fill_options_column', 9, 2);
		}

		// Add supported data types
		tennisclub_theme_support_pt('matches');
		tennisclub_theme_support_tx('matches_group');
	}
}

if ( !function_exists( 'tennisclub_matches_settings_theme_setup2' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_matches_settings_theme_setup2', 3 );
	function tennisclub_matches_settings_theme_setup2() {
		// Add post type 'matches' and taxonomy 'matches_group' into theme inheritance list
		tennisclub_add_theme_inheritance( array('matches' => array(
			'stream_template' => 'blog-matches',
			'single_template' => 'single-match',
			'taxonomy' => array('matches_group'),
			'taxonomy_tags' => array(),
			'post_type' => array('matches'),
			'override' => 'custom'
			) )
		);
	}
}


if (!function_exists('tennisclub_matches_after_theme_setup')) {
	add_action( 'tennisclub_action_after_init_theme', 'tennisclub_matches_after_theme_setup' );
	function tennisclub_matches_after_theme_setup() {
		// Update fields in the override options
		if (tennisclub_storage_get_array('post_override_options', 'page')=='matches') {
			
			add_filter('tennisclub_filter_post_save_custom_options',		'tennisclub_matches_save_custom_options', 10, 3);

			$players = tennisclub_get_list_posts(false, array(
				'post_type'=>'players',
				'orderby'=>'title',
				'order'=>'asc',
				'return'=>'title'
				)
			);
			
			// Meta box fields
			tennisclub_storage_set_array('post_override_options', 'title', esc_html__('Match Options', 'tennisclub'));
			tennisclub_storage_set_array('post_override_options', 'fields', array(
				"mb_partition_matches" => array(
					"title" => esc_html__('Matches', 'tennisclub'),
					"override" => "page,post,custom",
					"divider" => false,
					"icon" => "iconadmin-users",
					"type" => "partition"),
				"mb_info_matches_1" => array(
					"title" => esc_html__('Match details', 'tennisclub'),
					"override" => "page,post,custom",
					"divider" => false,
					"desc" => wp_kses_data( __('In this section you can put details for this match', 'tennisclub') ),
					"class" => "match_meta",
					"type" => "info"),
				"match_date" => array(
					"title" => esc_html__('Start date',  'tennisclub'),
					"desc" => esc_html__("Match start date", 'tennisclub'),
					"override" => "page,post,custom",
					"class" => "match_date",
					"std" => date('Y-m-d'),
					"format" => 'yy-mm-dd',
					"type" => "date"),
				"match_time" => array(
					"title" => esc_html__('Time',  'tennisclub'),
					"desc" => wp_kses_data( __("Match start time", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_time",
					"std" => '',
					"type" => "text"),
				"match_link" => array(
					"title" => esc_html__('Preview link',  'tennisclub'),
					"desc" => wp_kses_data( __("The announcement of the match", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_link",
					"std" => '',
					"type" => "text"),
				"match_score" => array(
					"title" => esc_html__('Score',  'tennisclub'),
					"desc" => wp_kses_data( __("The final score", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_score",
					"std" => '',
					"type" => "text"),
				"match_player_1" => array(
					"title" => esc_html__('First Player',  'tennisclub'),
					"desc" => wp_kses_data( __("Select first player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_player_1",
					"std" => '',
					"type" => "select",
					"options" => $players),
				"match_points_1" => array(
					"title" => esc_html__('Points for player 1',  'tennisclub'),
					"desc" => wp_kses_data( __("Points per game for the first player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_points_1",
					"std" => '',
					"type" => "text"),
				"match_player_2" => array(
					"title" => esc_html__('Second Player',  'tennisclub'),
					"desc" => wp_kses_data( __("Select second player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_player_1",
					"std" => '',
					"type" => "select",
					"options" => $players),
				"match_points_2" => array(
					"title" => esc_html__('Points for player 2',  'tennisclub'),
					"desc" => wp_kses_data( __("Points per game for the second player", 'tennisclub') ),
					"override" => "page,post,custom",
					"class" => "match_points_1",
					"std" => '',
					"type" => "text")
				)
			);
		}
	}
}


// Before save custom options
if (!function_exists('tennisclub_matches_save_custom_options')) {
	
	function tennisclub_matches_save_custom_options($custom_options, $post_type, $post_id) {
		if (isset($custom_options['match_date'])) {
			// Save match date in the post meta to sort and filter posts
			update_post_meta($post_id, tennisclub_storage_get('options_prefix').'_date_start', $custom_options['match_date'] . (tennisclub_param_is_inherit($custom_options['match_time']) ? '' : ' '.$custom_options['match_time']));
			// Update players points
			$post_meta = get_post_meta($post_id, tennisclub_storage_get('options_prefix') . '_post_options', true);
			$points_1_old = empty($post_meta['match_points_1']) || tennisclub_param_is_inherit($post_meta['match_points_1']) ? 0 : $post_meta['match_points_1'];
			$points_2_old = empty($post_meta['match_points_2']) || tennisclub_param_is_inherit($post_meta['match_points_2']) ? 0 : $post_meta['match_points_2'];
			tennisclub_update_players_points($custom_options['match_player_1'], $custom_options['match_points_1'], $points_1_old);
			tennisclub_update_players_points($custom_options['match_player_2'], $custom_options['match_points_2'], $points_2_old);
		}
		return $custom_options;
	}
}

// Update players meta
if ( !function_exists('tennisclub_update_players_points') ) {
	function tennisclub_update_players_points($player, $points_new, $points_old) { 
		$player_obj = (intval($player) > 0 ? get_post($player, OBJECT) : get_page_by_title($player, OBJECT, 'players'));
		$player_id = $player_obj->ID;
		$points = empty($points_new) || tennisclub_param_is_inherit($points_new) ? 0 : $points_new;
		$sum_points = get_post_meta($player_id, tennisclub_storage_get('options_prefix').'_points', true);
		$sum_points = empty($sum_points) || tennisclub_param_is_inherit($sum_points) ? 0 : $sum_points;
		$points = max(0, $points - $points_old + $sum_points);
		update_post_meta($player_id, tennisclub_storage_get('options_prefix').'_points', $points);		
	}
}


// Return true, if current page is matches page
if ( !function_exists( 'tennisclub_is_matches_page' ) ) {
	function tennisclub_is_matches_page() {
		$is = in_array(tennisclub_storage_get('page_template'), array('blog-matches', 'single-match'));
		if (!$is) {
			if (!tennisclub_storage_empty('pre_query'))
				$is = tennisclub_storage_call_obj_method('pre_query', 'get', 'post_type')=='matches'
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', 'matches_group') 
						|| (tennisclub_storage_call_obj_method('pre_query', 'is_page') 
							&& ($id=tennisclub_get_template_page_id('blog-matches')) > 0 
							&& $id==tennisclub_storage_get_obj_property('pre_query', 'queried_object_id', 0)
							);
			else
				$is = get_query_var('post_type')=='matches' 
						|| is_tax('matches_group') 
						|| (is_page() && ($id=tennisclub_get_template_page_id('blog-matches')) > 0 && $id==get_the_ID());
		}
		return $is;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'tennisclub_matches_detect_inheritance_key' ) ) {
	
	function tennisclub_matches_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return tennisclub_is_matches_page() ? 'matches' : '';
	}
}

// Filter to detect current page slug
if ( !function_exists( 'tennisclub_matches_get_blog_type' ) ) {
	
	function tennisclub_matches_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;
		if ($query && $query->is_tax('matches_group') || is_tax('matches_group'))
			$page = 'matches_category';
		else if ($query && $query->get('post_type')=='matches' || get_query_var('post_type')=='matches')
			$page = $query && $query->is_single() || is_single() ? 'match' : 'matches';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'tennisclub_matches_get_blog_title' ) ) {
	
	function tennisclub_matches_get_blog_title($title, $page) {
		if (!empty($title)) return $title;
		if ( $page == 'archives_day' && get_post_type()=='matches' ) {
			$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
			$title = sprintf( esc_html__( 'Daily Archives: %s', 'tennisclub' ), tennisclub_get_date_translations(date( get_option('date_format'), $dt )) );
		} else if ( $page == 'archives_month' && get_post_type()=='matches' ) {
			$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
			$title = sprintf( esc_html__( 'Monthly Archives: %s', 'tennisclub' ), tennisclub_get_date_translations(date( 'F Y', $dt )) );
		} else if ( $page == 'archives_year' && get_post_type()=='matches' ) {
			$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
			$title = sprintf( esc_html__( 'Yearly Archives: %s', 'tennisclub' ), date( 'Y', $dt ) );
		} else if ( tennisclub_strpos($page, 'matches')!==false ) {
			if ( $page == 'matches_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'matches_group' ), 'matches_group', OBJECT);
				$title = $term->name;
			} else if ( $page == 'match' ) {
				$title = tennisclub_get_post_title();
			} else {
				$title = esc_html__('All matches', 'tennisclub');
			}
		}
		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'tennisclub_matches_get_stream_page_title' ) ) {
	
	function tennisclub_matches_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (tennisclub_strpos($page, 'matches')!==false) {
			if (($page_id = tennisclub_matches_get_stream_page_id(0, $page=='matches' ? 'blog-matches' : $page)) > 0)
				$title = tennisclub_get_post_title($page_id);
			else
				$title = esc_html__('All matches', 'tennisclub');				
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'tennisclub_matches_get_stream_page_id' ) ) {
	
	function tennisclub_matches_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (tennisclub_strpos($page, 'matches')!==false) $id = tennisclub_get_template_page_id('blog-matches');
		return $id;
	}
}

// Filter to detect stream page URL
if ( !function_exists( 'tennisclub_matches_get_stream_page_link' ) ) {
	
	function tennisclub_matches_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (tennisclub_strpos($page, 'matches')!==false) {
			$id = tennisclub_get_template_page_id('blog-matches');
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'tennisclub_matches_get_current_taxonomy' ) ) {
	
	function tennisclub_matches_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( tennisclub_strpos($page, 'matches')!==false ) {
			$tax = 'matches_group';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'tennisclub_matches_is_taxonomy' ) ) {
	
	function tennisclub_matches_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else 
			return $query && $query->get('matches_group')!='' || is_tax('matches_group') ? 'matches_group' : '';
	}
}

// Filter to return breadcrumbs links to the parent period
if ( !function_exists( 'tennisclub_matches_get_period_links' ) ) {
	
	function tennisclub_matches_get_period_links($links, $page, $delimiter='') {
		if (!empty($links)) return $links;
		global $post;
		if (in_array($page, array('archives_day', 'archives_month')) && is_object($post) && get_post_type()=='matches') {
			$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
			$year  = date('Y', $dt); 
			$month = date('m', $dt); 
			$links = '<a class="breadcrumbs_item cat_parent" href="' . esc_url(get_year_link( $year )) . '">' . ($year) . '</a>';
			if ($page == 'archives_day')
				$links .= (!empty($links) ? $delimiter : '') . '<a class="breadcrumbs_item cat_parent" href="' . esc_url(get_month_link( $year, $month )) . '">' . trim(tennisclub_get_date_translations(date('F', $dt))) . '</a>';
		}
		return $links;
	}
}

// Add custom post type and/or taxonomies arguments to the query
if ( !function_exists( 'tennisclub_matches_query_add_filters' ) ) {
	
	function tennisclub_matches_query_add_filters($args, $filter) {
		if ($filter == 'matches') {
			$args['post_type'] = 'matches';
		}
		return $args;
	}
}

// Add custom post type into list
if ( !function_exists( 'tennisclub_matches_list_post_types' ) ) {
	
	function tennisclub_matches_list_post_types($list) {
		$list['matches'] = esc_html__('Matches', 'tennisclub');
		return $list;
	}
}

// Enqueue Matches custom styles
if ( !function_exists( 'tennisclub_matches_add_styles' ) ) {
	
	function tennisclub_matches_add_styles() {
		if (file_exists(tennisclub_get_file_dir('css/support.matches.css')))
			wp_enqueue_style( 'tennisclub-support-matches-style',  tennisclub_get_file_url('css/support.matches.css'), array(), null );
	}
}

// Return previous month and year with published posts
if ( !function_exists( 'tennisclub_matches_calendar_get_prev_month' ) ) {
	
	function tennisclub_matches_calendar_get_prev_month($prev, $opt) {
		if (!empty($opt['posts_types']) && !in_array('matches', $opt['posts_types'])) return $prev;
		if (!empty($prev['done']) && in_array('matches', $prev['done'])) return $prev;
		$args = array(
			'post_type' => 'matches',
			'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish',
			'posts_per_page' => 1,
			'ignore_sticky_posts' => true,
			'orderby' => 'meta_value',
			'meta_key' => tennisclub_storage_get('options_prefix').'_date_start',
			'order' => 'desc',
			'meta_query' => array(
				array(
					'key' => tennisclub_storage_get('options_prefix').'_date_start',
					'value' => ($opt['year']).'-'.($opt['month']).'-01',
					'compare' => '<',
					'type' => 'DATE'
				)
			)
		);
		$q = new WP_Query($args);
		$month = $year = 0;
		if ($q->have_posts()) {
			while ($q->have_posts()) { $q->the_post();
				$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
				$year  = date('Y', $dt);
				$month = date('m', $dt);
			}
			wp_reset_postdata();
		}
		if (empty($prev) || ($year+$month>0 && ($prev['year']+$prev['month']==0 || ($prev['year']).($prev['month']) < ($year).($month)))) {
			$prev['year'] = $year;
			$prev['month'] = $month;
		}
		if (empty($prev['done'])) $prev['done'] = array();
		$prev['done'][] = 'matches';
		return $prev;
	}
}

// Return next month and year with published posts
if ( !function_exists( 'tennisclub_matches_calendar_get_next_month' ) ) {
	
	function tennisclub_matches_calendar_get_next_month($next, $opt) {
		if (!empty($opt['posts_types']) && !in_array('matches', $opt['posts_types'])) return $next;
		if (!empty($next['done']) && in_array('matches', $next['done'])) return $next;
		$args = array(
			'post_type' => 'matches',
			'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish',
			'posts_per_page' => 1,
			'ignore_sticky_posts' => true,
			'orderby' => 'meta_value',
			'meta_key' => tennisclub_storage_get('options_prefix').'_date_start',
			'order' => 'asc',
			'meta_query' => array(
				array(
					'key' => tennisclub_storage_get('options_prefix').'_date_start',
					'value' => ($opt['year']).'-'.($opt['month']).'-'.($opt['last_day']).' 23:59:59',
					'compare' => '>',
					'type' => 'DATE'
				)
			)
		);
		$q = new WP_Query($args);
		$month = $year = 0;
		if ($q->have_posts()) {
			while ($q->have_posts()) { $q->the_post();
				$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
				$year  = date('Y', $dt);
				$month = date('m', $dt);
			}
			wp_reset_postdata();
		}
		if (empty($next) || ($year+$month>0 && ($next['year']+$next['month']==0 || ($next['year']).($next['month']) > ($year).($month)))) {
			$next['year'] = $year;
			$next['month'] = $month;
		}
		if (empty($next['done'])) $next['done'] = array();
		$next['done'][] = 'matches';
		return $next;
	}
}

// Return current month published posts
if ( !function_exists( 'tennisclub_matches_calendar_get_curr_month_posts' ) ) {
	
	function tennisclub_matches_calendar_get_curr_month_posts($posts, $opt) {
		if (!empty($opt['posts_types']) && !in_array('matches', $opt['posts_types'])) return $posts;
		if (!empty($posts['done']) && in_array('matches', $posts['done'])) return $posts;
		$args = array(
			'post_type' => 'matches',
			'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish',
			'posts_per_page' => -1,
			'ignore_sticky_posts' => true,
			'orderby' => 'meta_value',
			'order' => 'asc',
			'meta_query' => array(
				array(
					'key' => tennisclub_storage_get('options_prefix').'_date_start',
					'value' => array(($opt['year']).'-'.($opt['month']).'-01', ($opt['year']).'-'.($opt['month']).'-'.($opt['last_day']).' 23:59:59'),
					'compare' => 'BETWEEN',
					'type' => 'DATE'
				)
			)
		);
		$q = new WP_Query($args);
		if ($q->have_posts()) {
			if (empty($posts)) $posts = array();
			while ($q->have_posts()) { $q->the_post();
				$dt = strtotime(get_post_meta(get_the_ID(), tennisclub_storage_get('options_prefix').'_date_start', true));
				$day = (int) date('d', $dt);
				$title = apply_filters('the_title', get_the_title());
				if (empty($posts[$day])) 
					$posts[$day] = array();
				if (empty($posts[$day]['link']) && count($opt['posts_types'])==1)
					$posts[$day]['link'] = get_day_link($opt['year'], $opt['month'], $day);
				if (empty($posts[$day]['titles']))
					$posts[$day]['titles'] = $title;
				else
					$posts[$day]['titles'] = is_int($posts[$day]['titles']) ? $posts[$day]['titles']+1 : 2;
				if (empty($posts[$day]['posts'])) $posts[$day]['posts'] = array();
				$posts[$day]['posts'][] = array(
					'post_id' => get_the_ID(),
					'post_type' => get_post_type(),
					'post_date' => date(get_option('date_format'), $dt),
					'post_title' => $title,
					'post_link' => get_permalink()
				);
			}
			wp_reset_postdata();
		}
		if (empty($posts['done'])) $posts['done'] = array();
		$posts['done'][] = 'matches';
		return $posts;
	}
}

// Pre query: Join tables into main query
if ( !function_exists( 'tennisclub_matches_posts_join' ) ) {
	
	function tennisclub_matches_posts_join($join_sql, $query) {
		if (!is_admin() && $query->is_main_query()) {
			if ($query->is_day || $query->is_month || $query->is_year) {
				global $wpdb;
				$join_sql .= $wpdb->prepare(" LEFT JOIN {$wpdb->postmeta} AS _matches_meta ON {$wpdb->posts}.ID = _matches_meta.post_id AND  _matches_meta.meta_key = %s", tennisclub_storage_get('options_prefix')."date_start");
			}
		}
		return $join_sql;
	}
}

// Pre query: Join tables into archives widget query
if ( !function_exists( 'tennisclub_matches_getarchives_join' ) ) {
	
	function tennisclub_matches_getarchives_join($join_sql, $r) {
		global $wpdb;
		$join_sql .= $wpdb->prepare(" LEFT JOIN {$wpdb->postmeta} AS _matches_meta ON {$wpdb->posts}.ID = _matches_meta.post_id AND  _matches_meta.meta_key = %s", tennisclub_storage_get('options_prefix')."date_start");
		return $join_sql;
	}
}

// Pre query: Where section into main query
if ( !function_exists( 'tennisclub_matches_posts_where' ) ) {
	
	function tennisclub_matches_posts_where($where_sql, $query) {
		if (!is_admin() && $query->is_main_query()) {
			if ($query->is_day || $query->is_month || $query->is_year) {
				global $wpdb;
				$where_sql .= " OR (1=1";
				// Posts status
				if ((!isset($_REQUEST['preview']) || $_REQUEST['preview']!='true') && (!isset($_REQUEST['vc_editable']) || $_REQUEST['vc_editable']!='true')) {
					if (current_user_can('read_private_pages') && current_user_can('read_private_posts'))
						$where_sql .= " AND ({$wpdb->posts}.post_status='publish' OR {$wpdb->posts}.post_status='private')";
					else
						$where_sql .= " AND {$wpdb->posts}.post_status='publish'";
				}
				// Posts type and date
				$dt = $query->get('m');
				$y = $query->get('year');
				if (empty($y)) $y = (int) tennisclub_substr($dt, 0, 4);
				$where_sql .= $wpdb->prepare(" AND {$wpdb->posts}.post_type='matches' AND YEAR(_matches_meta.meta_value)=%d", $y);
				if ($query->is_month || $query->is_day) {
					$m = $query->get('monthnum');
					if (empty($m)) $m = (int) tennisclub_substr($dt, 4, 2);
					$where_sql .= $wpdb->prepare(" AND MONTH(_matches_meta.meta_value)=%d", $m);
				}
				if ($query->is_day) {
					$d = $query->get('day');
					if (empty($d)) $d = (int) tennisclub_substr($dt, 6, 2);
					$where_sql .= $wpdb->prepare(" AND DAYOFMONTH(_matches_meta.meta_value)=%d", $d);
				}
				$where_sql .= ')';
			}
		}
		return $where_sql;
	}
}

// Pre query: Where section into archives widget query
if ( !function_exists( 'tennisclub_matches_getarchives_where' ) ) {
	
	function tennisclub_matches_getarchives_where($where_sql, $r) {
		global $wpdb;
		// Posts type and date
		$where_sql .= " OR {$wpdb->posts}.post_type='matches'";
		return $where_sql;
	}
}

// Return courses start date instead post publish date
if ( !function_exists( 'tennisclub_matches_post_date' ) ) {
	
	function tennisclub_matches_post_date($post_date, $post_id, $post_type) {
		if ($post_type == 'matches') {
			$match_date = get_post_meta($post_id, tennisclub_storage_get('options_prefix').'_date_start', true);
			if (!empty($match_date) && !tennisclub_param_is_inherit($match_date))
				$post_date = $match_date;
		}
		return $post_date;
	}
}


// Get nearest match
if ( !function_exists('tennisclub_nearest_match') ) {
	
	function tennisclub_nearest_match($ids, $count, $numb){
		$new_array = array();
		$current = array_search ('0', $ids); 
		$key = $current; // 5
		$i = 0;
		$interval = $count / 2; // 4
		if($count % 2 != 0) $interval = ($count + 1) / 2;
		$interval_prev = $interval_next = $interval;
		
		if($key - $interval < 0){
			$interval_prev = $interval + ($key - $interval);
			$interval_next = $interval - ($key - $interval);
		}
		if($numb < $key + $interval){
			if($numb == $key){
				$interval_next = 0;
				$interval_prev = $count;
			}
			else{
				$interval_next = $interval;
				$interval_prev = $interval;

				if ($interval > $numb - $key ) {
					$interval_next = $numb - $key;
					$interval_prev = $interval + ($interval - $interval_next);
				}
			}
		}
		
		$index = 0;
		for($i = $key - $interval_prev; $i < $key; $i++){
			if( array_key_exists( $i , $ids ) ){
				$new_array[$index] = $ids[$i];
				$index++;
			}			
		}
		for($i = $key + 1; $i <= $key + $interval_next; $i++){
			if( array_key_exists( $i , $ids ) ){
				$new_array[$index] = $ids[$i];
				$index++;
			}			
		}
		
		return	$new_array;
	}
}

// Return list with countries
if ( !function_exists( 'tennisclub_get_list_countries' ) ) {
	function tennisclub_get_list_countries($prepend_inherit=false, $index=-1) {
		$list = array(
			"AF" => esc_html__("Afghanistan", 'tennisclub'),
			"AL" => esc_html__("Albania", 'tennisclub'),
			"DZ" => esc_html__("Algeria", 'tennisclub'),
			"AS" => esc_html__("American Samoa", 'tennisclub'),
			"AD" => esc_html__("Andorra", 'tennisclub'),
			"AO" => esc_html__("Angola", 'tennisclub'),
			"AI" => esc_html__("Anguilla", 'tennisclub'),
			"AQ" => esc_html__("Antarctica", 'tennisclub'),
			"AG" => esc_html__("Antigua and Barbuda", 'tennisclub'),
			"AR" => esc_html__("Argentina", 'tennisclub'),
			"AM" => esc_html__("Armenia", 'tennisclub'),
			"AW" => esc_html__("Aruba", 'tennisclub'),
			"AU" => esc_html__("Australia", 'tennisclub'),
			"AT" => esc_html__("Austria", 'tennisclub'),
			"AZ" => esc_html__("Azerbaijan", 'tennisclub'),
			"BS" => esc_html__("Bahamas", 'tennisclub'),
			"BH" => esc_html__("Bahrain", 'tennisclub'),
			"BD" => esc_html__("Bangladesh", 'tennisclub'),
			"BB" => esc_html__("Barbados", 'tennisclub'),
			"BY" => esc_html__("Belarus", 'tennisclub'),
			"BE" => esc_html__("Belgium", 'tennisclub'),
			"BZ" => esc_html__("Belize", 'tennisclub'),
			"BJ" => esc_html__("Benin", 'tennisclub'),
			"BM" => esc_html__("Bermuda", 'tennisclub'),
			"BT" => esc_html__("Bhutan", 'tennisclub'),
			"BO" => esc_html__("Bolivia", 'tennisclub'),
			"BA" => esc_html__("Bosnia and Herzegovina", 'tennisclub'),
			"BW" => esc_html__("Botswana", 'tennisclub'),
			"BV" => esc_html__("Bouvet Island", 'tennisclub'),
			"BR" => esc_html__("Brazil", 'tennisclub'),
			"BQ" => esc_html__("British Antarctic Territory", 'tennisclub'),
			"IO" => esc_html__("British Indian Ocean Territory", 'tennisclub'),
			"VG" => esc_html__("British Virgin Islands", 'tennisclub'),
			"BN" => esc_html__("Brunei", 'tennisclub'),
			"BG" => esc_html__("Bulgaria", 'tennisclub'),
			"BF" => esc_html__("Burkina Faso", 'tennisclub'),
			"BI" => esc_html__("Burundi", 'tennisclub'),
			"KH" => esc_html__("Cambodia", 'tennisclub'),
			"CM" => esc_html__("Cameroon", 'tennisclub'),
			"CA" => esc_html__("Canada", 'tennisclub'),
			"CT" => esc_html__("Canton and Enderbury Islands", 'tennisclub'),
			"CV" => esc_html__("Cape Verde", 'tennisclub'),
			"KY" => esc_html__("Cayman Islands", 'tennisclub'),
			"CF" => esc_html__("Central African Republic", 'tennisclub'),
			"TD" => esc_html__("Chad", 'tennisclub'),
			"CL" => esc_html__("Chile", 'tennisclub'),
			"CN" => esc_html__("China", 'tennisclub'),
			"CX" => esc_html__("Christmas Island", 'tennisclub'),
			"CC" => esc_html__("Cocos [Keeling] Islands", 'tennisclub'),
			"CO" => esc_html__("Colombia", 'tennisclub'),
			"KM" => esc_html__("Comoros", 'tennisclub'),
			"CG" => esc_html__("Congo - Brazzaville", 'tennisclub'),
			"CD" => esc_html__("Congo - Kinshasa", 'tennisclub'),
			"CK" => esc_html__("Cook Islands", 'tennisclub'),
			"CR" => esc_html__("Costa Rica", 'tennisclub'),
			"HR" => esc_html__("Croatia", 'tennisclub'),
			"CU" => esc_html__("Cuba", 'tennisclub'),
			"CY" => esc_html__("Cyprus", 'tennisclub'),
			"CZ" => esc_html__("Czech Republic", 'tennisclub'),
			"CI" => esc_html__("Côte d’Ivoire", 'tennisclub'),
			"DK" => esc_html__("Denmark", 'tennisclub'),
			"DJ" => esc_html__("Djibouti", 'tennisclub'),
			"DM" => esc_html__("Dominica", 'tennisclub'),
			"DO" => esc_html__("Dominican Republic", 'tennisclub'),
			"NQ" => esc_html__("Dronning Maud Land", 'tennisclub'),
			"DD" => esc_html__("East Germany", 'tennisclub'),
			"EC" => esc_html__("Ecuador", 'tennisclub'),
			"EG" => esc_html__("Egypt", 'tennisclub'),
			"SV" => esc_html__("El Salvador", 'tennisclub'),
			"GQ" => esc_html__("Equatorial Guinea", 'tennisclub'),
			"ER" => esc_html__("Eritrea", 'tennisclub'),
			"EE" => esc_html__("Estonia", 'tennisclub'),
			"ET" => esc_html__("Ethiopia", 'tennisclub'),
			"FK" => esc_html__("Falkland Islands", 'tennisclub'),
			"FO" => esc_html__("Faroe Islands", 'tennisclub'),
			"FJ" => esc_html__("Fiji", 'tennisclub'),
			"FI" => esc_html__("Finland", 'tennisclub'),
			"FR" => esc_html__("France", 'tennisclub'),
			"GF" => esc_html__("French Guiana", 'tennisclub'),
			"PF" => esc_html__("French Polynesia", 'tennisclub'),
			"TF" => esc_html__("French Southern Territories", 'tennisclub'),
			"FQ" => esc_html__("French Southern and Antarctic Territories", 'tennisclub'),
			"GA" => esc_html__("Gabon", 'tennisclub'),
			"GM" => esc_html__("Gambia", 'tennisclub'),
			"GE" => esc_html__("Georgia", 'tennisclub'),
			"DE" => esc_html__("Germany", 'tennisclub'),
			"GH" => esc_html__("Ghana", 'tennisclub'),
			"GI" => esc_html__("Gibraltar", 'tennisclub'),
			"GR" => esc_html__("Greece", 'tennisclub'),
			"GL" => esc_html__("Greenland", 'tennisclub'),
			"GD" => esc_html__("Grenada", 'tennisclub'),
			"GP" => esc_html__("Guadeloupe", 'tennisclub'),
			"GU" => esc_html__("Guam", 'tennisclub'),
			"GT" => esc_html__("Guatemala", 'tennisclub'),
			"GG" => esc_html__("Guernsey", 'tennisclub'),
			"GN" => esc_html__("Guinea", 'tennisclub'),
			"GW" => esc_html__("Guinea-Bissau", 'tennisclub'),
			"GY" => esc_html__("Guyana", 'tennisclub'),
			"HT" => esc_html__("Haiti", 'tennisclub'),
			"HM" => esc_html__("Heard Island and McDonald Islands", 'tennisclub'),
			"HN" => esc_html__("Honduras", 'tennisclub'),
			"HK" => esc_html__("Hong Kong SAR China", 'tennisclub'),
			"HU" => esc_html__("Hungary", 'tennisclub'),
			"IS" => esc_html__("Iceland", 'tennisclub'),
			"IN" => esc_html__("India", 'tennisclub'),
			"ID" => esc_html__("Indonesia", 'tennisclub'),
			"IR" => esc_html__("Iran", 'tennisclub'),
			"IQ" => esc_html__("Iraq", 'tennisclub'),
			"IE" => esc_html__("Ireland", 'tennisclub'),
			"IM" => esc_html__("Isle of Man", 'tennisclub'),
			"IL" => esc_html__("Israel", 'tennisclub'),
			"IT" => esc_html__("Italy", 'tennisclub'),
			"JM" => esc_html__("Jamaica", 'tennisclub'),
			"JP" => esc_html__("Japan", 'tennisclub'),
			"JE" => esc_html__("Jersey", 'tennisclub'),
			"JT" => esc_html__("Johnston Island", 'tennisclub'),
			"JO" => esc_html__("Jordan", 'tennisclub'),
			"KZ" => esc_html__("Kazakhstan", 'tennisclub'),
			"KE" => esc_html__("Kenya", 'tennisclub'),
			"KI" => esc_html__("Kiribati", 'tennisclub'),
			"KW" => esc_html__("Kuwait", 'tennisclub'),
			"KG" => esc_html__("Kyrgyzstan", 'tennisclub'),
			"LA" => esc_html__("Laos", 'tennisclub'),
			"LV" => esc_html__("Latvia", 'tennisclub'),
			"LB" => esc_html__("Lebanon", 'tennisclub'),
			"LS" => esc_html__("Lesotho", 'tennisclub'),
			"LR" => esc_html__("Liberia", 'tennisclub'),
			"LY" => esc_html__("Libya", 'tennisclub'),
			"LI" => esc_html__("Liechtenstein", 'tennisclub'),
			"LT" => esc_html__("Lithuania", 'tennisclub'),
			"LU" => esc_html__("Luxembourg", 'tennisclub'),
			"MO" => esc_html__("Macau SAR China", 'tennisclub'),
			"MK" => esc_html__("Macedonia", 'tennisclub'),
			"MG" => esc_html__("Madagascar", 'tennisclub'),
			"MW" => esc_html__("Malawi", 'tennisclub'),
			"MY" => esc_html__("Malaysia", 'tennisclub'),
			"MV" => esc_html__("Maldives", 'tennisclub'),
			"ML" => esc_html__("Mali", 'tennisclub'),
			"MT" => esc_html__("Malta", 'tennisclub'),
			"MH" => esc_html__("Marshall Islands", 'tennisclub'),
			"MQ" => esc_html__("Martinique", 'tennisclub'),
			"MR" => esc_html__("Mauritania", 'tennisclub'),
			"MU" => esc_html__("Mauritius", 'tennisclub'),
			"YT" => esc_html__("Mayotte", 'tennisclub'),
			"FX" => esc_html__("Metropolitan France", 'tennisclub'),
			"MX" => esc_html__("Mexico", 'tennisclub'),
			"FM" => esc_html__("Micronesia", 'tennisclub'),
			"MI" => esc_html__("Midway Islands", 'tennisclub'),
			"MD" => esc_html__("Moldova", 'tennisclub'),
			"MC" => esc_html__("Monaco", 'tennisclub'),
			"MN" => esc_html__("Mongolia", 'tennisclub'),
			"ME" => esc_html__("Montenegro", 'tennisclub'),
			"MS" => esc_html__("Montserrat", 'tennisclub'),
			"MA" => esc_html__("Morocco", 'tennisclub'),
			"MZ" => esc_html__("Mozambique", 'tennisclub'),
			"MM" => esc_html__("Myanmar [Burma]", 'tennisclub'),
			"NA" => esc_html__("Namibia", 'tennisclub'),
			"NR" => esc_html__("Nauru", 'tennisclub'),
			"NP" => esc_html__("Nepal", 'tennisclub'),
			"NL" => esc_html__("Netherlands", 'tennisclub'),
			"AN" => esc_html__("Netherlands Antilles", 'tennisclub'),
			"NT" => esc_html__("Neutral Zone", 'tennisclub'),
			"NC" => esc_html__("New Caledonia", 'tennisclub'),
			"NZ" => esc_html__("New Zealand", 'tennisclub'),
			"NI" => esc_html__("Nicaragua", 'tennisclub'),
			"NE" => esc_html__("Niger", 'tennisclub'),
			"NG" => esc_html__("Nigeria", 'tennisclub'),
			"NU" => esc_html__("Niue", 'tennisclub'),
			"NF" => esc_html__("Norfolk Island", 'tennisclub'),
			"KP" => esc_html__("North Korea", 'tennisclub'),
			"VD" => esc_html__("North Vietnam", 'tennisclub'),
			"MP" => esc_html__("Northern Mariana Islands", 'tennisclub'),
			"NO" => esc_html__("Norway", 'tennisclub'),
			"OM" => esc_html__("Oman", 'tennisclub'),
			"PC" => esc_html__("Pacific Islands Trust Territory", 'tennisclub'),
			"PK" => esc_html__("Pakistan", 'tennisclub'),
			"PW" => esc_html__("Palau", 'tennisclub'),
			"PS" => esc_html__("Palestinian Territories", 'tennisclub'),
			"PA" => esc_html__("Panama", 'tennisclub'),
			"PZ" => esc_html__("Panama Canal Zone", 'tennisclub'),
			"PG" => esc_html__("Papua New Guinea", 'tennisclub'),
			"PY" => esc_html__("Paraguay", 'tennisclub'),
			"YD" => esc_html__("People's Democratic Republic of Yemen", 'tennisclub'),
			"PE" => esc_html__("Peru", 'tennisclub'),
			"PH" => esc_html__("Philippines", 'tennisclub'),
			"PN" => esc_html__("Pitcairn Islands", 'tennisclub'),
			"PL" => esc_html__("Poland", 'tennisclub'),
			"PT" => esc_html__("Portugal", 'tennisclub'),
			"PR" => esc_html__("Puerto Rico", 'tennisclub'),
			"QA" => esc_html__("Qatar", 'tennisclub'),
			"RO" => esc_html__("Romania", 'tennisclub'),
			"RU" => esc_html__("Russia", 'tennisclub'),
			"RW" => esc_html__("Rwanda", 'tennisclub'),
			"RE" => esc_html__("Réunion", 'tennisclub'),
			"BL" => esc_html__("Saint Barthélemy", 'tennisclub'),
			"SH" => esc_html__("Saint Helena", 'tennisclub'),
			"KN" => esc_html__("Saint Kitts and Nevis", 'tennisclub'),
			"LC" => esc_html__("Saint Lucia", 'tennisclub'),
			"MF" => esc_html__("Saint Martin", 'tennisclub'),
			"PM" => esc_html__("Saint Pierre and Miquelon", 'tennisclub'),
			"VC" => esc_html__("Saint Vincent and the Grenadines", 'tennisclub'),
			"WS" => esc_html__("Samoa", 'tennisclub'),
			"SM" => esc_html__("San Marino", 'tennisclub'),
			"SA" => esc_html__("Saudi Arabia", 'tennisclub'),
			"SN" => esc_html__("Senegal", 'tennisclub'),
			"RS" => esc_html__("Serbia", 'tennisclub'),
			"CS" => esc_html__("Serbia and Montenegro", 'tennisclub'),
			"SC" => esc_html__("Seychelles", 'tennisclub'),
			"SL" => esc_html__("Sierra Leone", 'tennisclub'),
			"SG" => esc_html__("Singapore", 'tennisclub'),
			"SK" => esc_html__("Slovakia", 'tennisclub'),
			"SI" => esc_html__("Slovenia", 'tennisclub'),
			"SB" => esc_html__("Solomon Islands", 'tennisclub'),
			"SO" => esc_html__("Somalia", 'tennisclub'),
			"ZA" => esc_html__("South Africa", 'tennisclub'),
			"GS" => esc_html__("South Georgia and the South Sandwich Islands", 'tennisclub'),
			"KR" => esc_html__("South Korea", 'tennisclub'),
			"ES" => esc_html__("Spain", 'tennisclub'),
			"LK" => esc_html__("Sri Lanka", 'tennisclub'),
			"SD" => esc_html__("Sudan", 'tennisclub'),
			"SR" => esc_html__("Suriname", 'tennisclub'),
			"SJ" => esc_html__("Svalbard and Jan Mayen", 'tennisclub'),
			"SZ" => esc_html__("Swaziland", 'tennisclub'),
			"SE" => esc_html__("Sweden", 'tennisclub'),
			"CH" => esc_html__("Switzerland", 'tennisclub'),
			"SY" => esc_html__("Syria", 'tennisclub'),
			"ST" => esc_html__("São Tomé and Príncipe", 'tennisclub'),
			"TW" => esc_html__("Taiwan", 'tennisclub'),
			"TJ" => esc_html__("Tajikistan", 'tennisclub'),
			"TZ" => esc_html__("Tanzania", 'tennisclub'),
			"TH" => esc_html__("Thailand", 'tennisclub'),
			"TL" => esc_html__("Timor-Leste", 'tennisclub'),
			"TG" => esc_html__("Togo", 'tennisclub'),
			"TK" => esc_html__("Tokelau", 'tennisclub'),
			"TO" => esc_html__("Tonga", 'tennisclub'),
			"TT" => esc_html__("Trinidad and Tobago", 'tennisclub'),
			"TN" => esc_html__("Tunisia", 'tennisclub'),
			"TR" => esc_html__("Turkey", 'tennisclub'),
			"TM" => esc_html__("Turkmenistan", 'tennisclub'),
			"TC" => esc_html__("Turks and Caicos Islands", 'tennisclub'),
			"TV" => esc_html__("Tuvalu", 'tennisclub'),
			"UM" => esc_html__("U.S. Minor Outlying Islands", 'tennisclub'),
			"PU" => esc_html__("U.S. Miscellaneous Pacific Islands", 'tennisclub'),
			"VI" => esc_html__("U.S. Virgin Islands", 'tennisclub'),
			"UG" => esc_html__("Uganda", 'tennisclub'),
			"UA" => esc_html__("Ukraine", 'tennisclub'),
			"SU" => esc_html__("Union of Soviet Socialist Republics", 'tennisclub'),
			"AE" => esc_html__("United Arab Emirates", 'tennisclub'),
			"GB" => esc_html__("United Kingdom", 'tennisclub'),
			"US" => esc_html__("United States", 'tennisclub'),
			"ZZ" => esc_html__("Unknown or Invalid Region", 'tennisclub'),
			"UY" => esc_html__("Uruguay", 'tennisclub'),
			"UZ" => esc_html__("Uzbekistan", 'tennisclub'),
			"VU" => esc_html__("Vanuatu", 'tennisclub'),
			"VA" => esc_html__("Vatican City", 'tennisclub'),
			"VE" => esc_html__("Venezuela", 'tennisclub'),
			"VN" => esc_html__("Vietnam", 'tennisclub'),
			"WK" => esc_html__("Wake Island", 'tennisclub'),
			"WF" => esc_html__("Wallis and Futuna", 'tennisclub'),
			"EH" => esc_html__("Western Sahara", 'tennisclub'),
			"YE" => esc_html__("Yemen", 'tennisclub'),
			"ZM" => esc_html__("Zambia", 'tennisclub'),
			"ZW" => esc_html__("Zimbabwe", 'tennisclub'),
			"AX" => esc_html__("Åland Islands", 'tennisclub')
		);
		if (empty($index) || $index < 0)
			return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
		else
			return $list[$index];
	}
}
?>