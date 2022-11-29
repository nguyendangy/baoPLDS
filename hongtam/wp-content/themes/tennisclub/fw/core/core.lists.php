<?php
/**
 * TennisClub Framework: return lists
 *
 * @package tennisclub
 * @since tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Return styles list
if ( !function_exists( 'tennisclub_get_list_styles' ) ) {
	function tennisclub_get_list_styles($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = sprintf(esc_html__('Style %d', 'tennisclub'), $i);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the shortcodes margins
if ( !function_exists( 'tennisclub_get_list_margins' ) ) {
	function tennisclub_get_list_margins($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_margins'))=='') {
			$list = array(
				'null'		=> esc_html__('0 (No margin)',	'tennisclub'),
				'tiny'		=> esc_html__('Tiny',		'tennisclub'),
				'small'		=> esc_html__('Small',		'tennisclub'),
				'medium'	=> esc_html__('Medium',		'tennisclub'),
				'large'		=> esc_html__('Large',		'tennisclub'),
				'huge'		=> esc_html__('Huge',		'tennisclub'),
				'tiny-'		=> esc_html__('Tiny (negative)',	'tennisclub'),
				'small-'	=> esc_html__('Small (negative)',	'tennisclub'),
				'medium-'	=> esc_html__('Medium (negative)',	'tennisclub'),
				'large-'	=> esc_html__('Large (negative)',	'tennisclub'),
				'huge-'		=> esc_html__('Huge (negative)',	'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_margins', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_margins', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the line styles
if ( !function_exists( 'tennisclub_get_list_line_styles' ) ) {
	function tennisclub_get_list_line_styles($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_line_styles'))=='') {
			$list = array(
				'solid'	=> esc_html__('Solid', 'tennisclub'),
				'dashed'=> esc_html__('Dashed', 'tennisclub'),
				'dotted'=> esc_html__('Dotted', 'tennisclub'),
				'double'=> esc_html__('Double', 'tennisclub'),
				'image'	=> esc_html__('Image', 'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_line_styles', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_line_styles', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the animations
if ( !function_exists( 'tennisclub_get_list_animations' ) ) {
	function tennisclub_get_list_animations($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_animations'))=='') {
			$list = array(
				'none'			=> esc_html__('- None -',	'tennisclub'),
				'bounced'		=> esc_html__('Bounced',		'tennisclub'),
				'flash'			=> esc_html__('Flash',		'tennisclub'),
				'flip'			=> esc_html__('Flip',		'tennisclub'),
				'pulse'			=> esc_html__('Pulse',		'tennisclub'),
				'rubberBand'	=> esc_html__('Rubber Band','tennisclub'),
				'shake'			=> esc_html__('Shake',		'tennisclub'),
				'swing'			=> esc_html__('Swing',		'tennisclub'),
				'tada'			=> esc_html__('Tada',		'tennisclub'),
				'wobble'		=> esc_html__('Wobble',		'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_animations', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_animations', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the enter animations
if ( !function_exists( 'tennisclub_get_list_animations_in' ) ) {
	function tennisclub_get_list_animations_in($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_animations_in'))=='') {
			$list = array(
				'none'				=> esc_html__('- None -',			'tennisclub'),
				'bounceIn'			=> esc_html__('Bounce In',			'tennisclub'),
				'bounceInUp'		=> esc_html__('Bounce In Up',		'tennisclub'),
				'bounceInDown'		=> esc_html__('Bounce In Down',		'tennisclub'),
				'bounceInLeft'		=> esc_html__('Bounce In Left',		'tennisclub'),
				'bounceInRight'		=> esc_html__('Bounce In Right',	'tennisclub'),
				'fadeIn'			=> esc_html__('Fade In',			'tennisclub'),
				'fadeInUp'			=> esc_html__('Fade In Up',			'tennisclub'),
				'fadeInDown'		=> esc_html__('Fade In Down',		'tennisclub'),
				'fadeInLeft'		=> esc_html__('Fade In Left',		'tennisclub'),
				'fadeInRight'		=> esc_html__('Fade In Right',		'tennisclub'),
				'fadeInUpBig'		=> esc_html__('Fade In Up Big',		'tennisclub'),
				'fadeInDownBig'		=> esc_html__('Fade In Down Big',	'tennisclub'),
				'fadeInLeftBig'		=> esc_html__('Fade In Left Big',	'tennisclub'),
				'fadeInRightBig'	=> esc_html__('Fade In Right Big',	'tennisclub'),
				'flipInX'			=> esc_html__('Flip In X',			'tennisclub'),
				'flipInY'			=> esc_html__('Flip In Y',			'tennisclub'),
				'lightSpeedIn'		=> esc_html__('Light Speed In',		'tennisclub'),
				'rotateIn'			=> esc_html__('Rotate In',			'tennisclub'),
				'rotateInUpLeft'	=> esc_html__('Rotate In Down Left','tennisclub'),
				'rotateInUpRight'	=> esc_html__('Rotate In Up Right',	'tennisclub'),
				'rotateInDownLeft'	=> esc_html__('Rotate In Up Left',	'tennisclub'),
				'rotateInDownRight'	=> esc_html__('Rotate In Down Right','tennisclub'),
				'rollIn'			=> esc_html__('Roll In',			'tennisclub'),
				'slideInUp'			=> esc_html__('Slide In Up',		'tennisclub'),
				'slideInDown'		=> esc_html__('Slide In Down',		'tennisclub'),
				'slideInLeft'		=> esc_html__('Slide In Left',		'tennisclub'),
				'slideInRight'		=> esc_html__('Slide In Right',		'tennisclub'),
				'zoomIn'			=> esc_html__('Zoom In',			'tennisclub'),
				'zoomInUp'			=> esc_html__('Zoom In Up',			'tennisclub'),
				'zoomInDown'		=> esc_html__('Zoom In Down',		'tennisclub'),
				'zoomInLeft'		=> esc_html__('Zoom In Left',		'tennisclub'),
				'zoomInRight'		=> esc_html__('Zoom In Right',		'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_animations_in', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_animations_in', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the out animations
if ( !function_exists( 'tennisclub_get_list_animations_out' ) ) {
	function tennisclub_get_list_animations_out($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_animations_out'))=='') {
			$list = array(
				'none'				=> esc_html__('- None -',	'tennisclub'),
				'bounceOut'			=> esc_html__('Bounce Out',			'tennisclub'),
				'bounceOutUp'		=> esc_html__('Bounce Out Up',		'tennisclub'),
				'bounceOutDown'		=> esc_html__('Bounce Out Down',		'tennisclub'),
				'bounceOutLeft'		=> esc_html__('Bounce Out Left',		'tennisclub'),
				'bounceOutRight'	=> esc_html__('Bounce Out Right',	'tennisclub'),
				'fadeOut'			=> esc_html__('Fade Out',			'tennisclub'),
				'fadeOutUp'			=> esc_html__('Fade Out Up',			'tennisclub'),
				'fadeOutDown'		=> esc_html__('Fade Out Down',		'tennisclub'),
				'fadeOutLeft'		=> esc_html__('Fade Out Left',		'tennisclub'),
				'fadeOutRight'		=> esc_html__('Fade Out Right',		'tennisclub'),
				'fadeOutUpBig'		=> esc_html__('Fade Out Up Big',		'tennisclub'),
				'fadeOutDownBig'	=> esc_html__('Fade Out Down Big',	'tennisclub'),
				'fadeOutLeftBig'	=> esc_html__('Fade Out Left Big',	'tennisclub'),
				'fadeOutRightBig'	=> esc_html__('Fade Out Right Big',	'tennisclub'),
				'flipOutX'			=> esc_html__('Flip Out X',			'tennisclub'),
				'flipOutY'			=> esc_html__('Flip Out Y',			'tennisclub'),
				'hinge'				=> esc_html__('Hinge Out',			'tennisclub'),
				'lightSpeedOut'		=> esc_html__('Light Speed Out',		'tennisclub'),
				'rotateOut'			=> esc_html__('Rotate Out',			'tennisclub'),
				'rotateOutUpLeft'	=> esc_html__('Rotate Out Down Left','tennisclub'),
				'rotateOutUpRight'	=> esc_html__('Rotate Out Up Right','tennisclub'),
				'rotateOutDownLeft'	=> esc_html__('Rotate Out Up Left',		'tennisclub'),
				'rotateOutDownRight'=> esc_html__('Rotate Out Down Right','tennisclub'),
				'rollOut'			=> esc_html__('Roll Out',		'tennisclub'),
				'slideOutUp'		=> esc_html__('Slide Out Up',		'tennisclub'),
				'slideOutDown'		=> esc_html__('Slide Out Down',	'tennisclub'),
				'slideOutLeft'		=> esc_html__('Slide Out Left',	'tennisclub'),
				'slideOutRight'		=> esc_html__('Slide Out Right',	'tennisclub'),
				'zoomOut'			=> esc_html__('Zoom Out',			'tennisclub'),
				'zoomOutUp'			=> esc_html__('Zoom Out Up',		'tennisclub'),
				'zoomOutDown'		=> esc_html__('Zoom Out Down',	'tennisclub'),
				'zoomOutLeft'		=> esc_html__('Zoom Out Left',	'tennisclub'),
				'zoomOutRight'		=> esc_html__('Zoom Out Right',	'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_animations_out', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_animations_out', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return classes list for the specified animation
if (!function_exists('tennisclub_get_animation_classes')) {
	function tennisclub_get_animation_classes($animation, $speed='normal', $loop='none') {
		// speed:	fast=0.5s | normal=1s | slow=2s
		// loop:	none | infinite
		return tennisclub_param_is_off($animation) ? '' : 'animated '.esc_attr($animation).' '.esc_attr($speed).(!tennisclub_param_is_off($loop) ? ' '.esc_attr($loop) : '');
	}
}


// Return list of categories
if ( !function_exists( 'tennisclub_get_list_categories' ) ) {
	function tennisclub_get_list_categories($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_categories'))=='') {
			$list = array();
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$taxonomies = get_categories( $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_categories', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of taxonomies
if ( !function_exists( 'tennisclub_get_list_terms' ) ) {
	function tennisclub_get_list_terms($prepend_inherit=false, $taxonomy='category') {
		if (($list = tennisclub_storage_get('list_taxonomies_'.($taxonomy)))=='') {
			$list = array();
			if ( is_array($taxonomy) || taxonomy_exists($taxonomy) ) {
				$terms = get_terms( $taxonomy, array(
					'child_of'                 => 0,
					'parent'                   => '',
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => 0,
					'hierarchical'             => 1,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'taxonomy'                 => $taxonomy,
					'pad_counts'               => false
					)
				);
			} else {
				$terms = tennisclub_get_terms_by_taxonomy_from_db($taxonomy);
			}
			if (!is_wp_error( $terms ) && is_array($terms) && count($terms) > 0) {
				foreach ($terms as $cat) {
					$list[$cat->term_id] = $cat->name;	
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_taxonomies_'.($taxonomy), $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list of post's types
if ( !function_exists( 'tennisclub_get_list_posts_types' ) ) {
	function tennisclub_get_list_posts_types($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_posts_types'))=='') {
			// Return only theme inheritance supported post types
			$list = apply_filters('tennisclub_filter_list_post_types', array());
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_posts_types', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( !function_exists( 'tennisclub_get_list_posts' ) ) {
	function tennisclub_get_list_posts($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'taxonomy'			=> 'category',
			'taxonomy_value'	=> '',
			'posts_per_page'	=> -1,
			'orderby'			=> 'post_date',
			'order'				=> 'desc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));

		$hash = 'list_posts_'.($opt['post_type']).'_'.($opt['taxonomy']).'_'.($opt['taxonomy_value']).'_'.($opt['orderby']).'_'.($opt['order']).'_'.($opt['return']).'_'.($opt['posts_per_page']);
		if (($list = tennisclub_storage_get($hash))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'tennisclub');
			$args = array(
				'post_type' => $opt['post_type'],
				'post_status' => $opt['post_status'],
				'posts_per_page' => $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'	=> $opt['orderby'],
				'order'		=> $opt['order']
			);
			if (!empty($opt['taxonomy_value'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field' => (int) $opt['taxonomy_value'] > 0 ? 'id' : 'slug',
						'terms' => $opt['taxonomy_value']
					)
				);
			}
			$posts = get_posts( $args );
			if (is_array($posts) && count($posts) > 0) {
				foreach ($posts as $post) {
					$list[$opt['return']=='id' ? $post->ID : $post->post_title] = $post->post_title;
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set($hash, $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list pages
if ( !function_exists( 'tennisclub_get_list_pages' ) ) {
	function tennisclub_get_list_pages($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'page',
			'post_status'		=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'asc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));
		return tennisclub_get_list_posts($prepend_inherit, $opt);
	}
}


// Return list of registered users
if ( !function_exists( 'tennisclub_get_list_users' ) ) {
	function tennisclub_get_list_users($prepend_inherit=false, $roles=array('administrator', 'editor', 'author', 'contributor', 'shop_manager')) {
		if (($list = tennisclub_storage_get('list_users'))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'tennisclub');
			$args = array(
				'orderby'	=> 'display_name',
				'order'		=> 'ASC' );
			$users = get_users( $args );
			if (is_array($users) && count($users) > 0) {
				foreach ($users as $user) {
					$accept = true;
					if (is_array($user->roles)) {
						if (is_array($user->roles) && count($user->roles) > 0) {
							$accept = false;
							foreach ($user->roles as $role) {
								if (in_array($role, $roles)) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ($accept) $list[$user->user_login] = $user->display_name;
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_users', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return slider engines list, prepended inherit (if need)
if ( !function_exists( 'tennisclub_get_list_sliders' ) ) {
	function tennisclub_get_list_sliders($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_sliders'))=='') {
			$list = array(
				'swiper' => esc_html__("Posts slider (Swiper)", 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_list_sliders', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_sliders', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return slider controls list, prepended inherit (if need)
if ( !function_exists( 'tennisclub_get_list_slider_controls' ) ) {
	function tennisclub_get_list_slider_controls($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_slider_controls'))=='') {
			$list = array(
				'no'		=> esc_html__('None', 'tennisclub'),
				'side'		=> esc_html__('Side', 'tennisclub'),
				'bottom'	=> esc_html__('Bottom', 'tennisclub'),
				'pagination'=> esc_html__('Pagination', 'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_slider_controls', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_slider_controls', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return slider controls classes
if ( !function_exists( 'tennisclub_get_slider_controls_classes' ) ) {
	function tennisclub_get_slider_controls_classes($controls) {
		if (tennisclub_param_is_off($controls))	$classes = 'sc_slider_nopagination sc_slider_nocontrols';
		else if ($controls=='bottom')			$classes = 'sc_slider_nopagination sc_slider_controls sc_slider_controls_bottom';
		else if ($controls=='pagination')		$classes = 'sc_slider_pagination sc_slider_pagination_bottom sc_slider_nocontrols';
		else									$classes = 'sc_slider_nopagination sc_slider_controls sc_slider_controls_side';
		return $classes;
	}
}

// Return list with popup engines
if ( !function_exists( 'tennisclub_get_list_popup_engines' ) ) {
	function tennisclub_get_list_popup_engines($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_popup_engines'))=='') {
			$list = array(
				"pretty"	=> esc_html__("Pretty photo", 'tennisclub'),
				"magnific"	=> esc_html__("Magnific popup", 'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_popup_engines', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_popup_engines', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return menus list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_menus' ) ) {
	function tennisclub_get_list_menus($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_menus'))=='') {
			$list = array();
			$list['default'] = esc_html__("Default", 'tennisclub');
			$menus = wp_get_nav_menus();
			if (is_array($menus) && count($menus) > 0) {
				foreach ($menus as $menu) {
					$list[$menu->slug] = $menu->name;
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_menus', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( !function_exists( 'tennisclub_get_list_sidebars' ) ) {
	function tennisclub_get_list_sidebars($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_sidebars'))=='') {
			if (($list = tennisclub_storage_get('registered_sidebars'))=='') $list = array();
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_sidebars', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return sidebars positions
if ( !function_exists( 'tennisclub_get_list_sidebars_positions' ) ) {
	function tennisclub_get_list_sidebars_positions($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_sidebars_positions'))=='') {
			$list = array(
				'none'  => esc_html__('Hide',  'tennisclub'),
				'left'  => esc_html__('Left',  'tennisclub'),
				'right' => esc_html__('Right', 'tennisclub')
				);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_sidebars_positions', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return sidebars class
if ( !function_exists( 'tennisclub_get_sidebar_class' ) ) {
	function tennisclub_get_sidebar_class() {
		$sb_main = tennisclub_get_custom_option('show_sidebar_main');
		$sb_outer = tennisclub_get_custom_option('show_sidebar_outer');
		return (tennisclub_param_is_off($sb_main) ? 'sidebar_hide' : 'sidebar_show sidebar_'.($sb_main))
				. ' ' . (tennisclub_param_is_off($sb_outer) ? 'sidebar_outer_hide' : 'sidebar_outer_show sidebar_outer_'.($sb_outer));
	}
}

// Return body styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_body_styles' ) ) {
	function tennisclub_get_list_body_styles($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_body_styles'))=='') {
			$list = array(
				'boxed'	=> esc_html__('Boxed',		'tennisclub'),
				'wide'	=> esc_html__('Wide',		'tennisclub')
				);
			if (tennisclub_get_theme_setting('allow_fullscreen')) {
				$list['fullwide']	= esc_html__('Fullwide',	'tennisclub');
				$list['fullscreen']	= esc_html__('Fullscreen',	'tennisclub');
			}
			$list = apply_filters('tennisclub_filter_list_body_styles', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_body_styles', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return skins list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_skins' ) ) {
    function tennisclub_get_list_skins($prepend_inherit=false) {
        if (($list = tennisclub_storage_get('list_skins'))=='') {
            $list = array(
                'no_less'	=> esc_html__('No less',		'tennisclub')
            );
            if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_skins', $list);
        }
        return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
    }
}

// Return css-themes list
if ( !function_exists( 'tennisclub_get_list_themes' ) ) {
	function tennisclub_get_list_themes($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_themes'))=='') {
			$list = tennisclub_get_list_files("css/themes");
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_themes', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return templates list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates' ) ) {
	function tennisclub_get_list_templates($mode='') {
		if (($list = tennisclub_storage_get('list_templates_'.($mode)))=='') {
			$list = array();
			$tpl = tennisclub_storage_get('registered_templates');
			if (is_array($tpl) && count($tpl) > 0) {
				foreach ($tpl as $k=>$v) {
					if ($mode=='' || in_array($mode, explode(',', $v['mode'])))
						$list[$k] = !empty($v['icon']) 
									? $v['icon'] 
									: (!empty($v['title']) 
										? $v['title'] 
										: tennisclub_strtoproper($v['layout'])
										);
				}
			}
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_'.($mode), $list);
		}
		return $list;
	}
}

// Return blog styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates_blog' ) ) {
	function tennisclub_get_list_templates_blog($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_templates_blog'))=='') {
			$list = tennisclub_get_list_templates('blog');
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_blog', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return blogger styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates_blogger' ) ) {
	function tennisclub_get_list_templates_blogger($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_templates_blogger'))=='') {
			$list = tennisclub_array_merge(tennisclub_get_list_templates('blogger'), tennisclub_get_list_templates('blog'));
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_blogger', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return single page styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates_single' ) ) {
	function tennisclub_get_list_templates_single($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_templates_single'))=='') {
			$list = tennisclub_get_list_templates('single');
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_single', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return header styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates_header' ) ) {
	function tennisclub_get_list_templates_header($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_templates_header'))=='') {
			$list = tennisclub_get_list_templates('header');
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_header', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return form styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_templates_forms' ) ) {
	function tennisclub_get_list_templates_forms($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_templates_forms'))=='') {
			$list = tennisclub_get_list_templates('forms');
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_templates_forms', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return article styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_article_styles' ) ) {
	function tennisclub_get_list_article_styles($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_article_styles'))=='') {
			$list = array(
				"boxed"   => esc_html__('Boxed', 'tennisclub'),
				"stretch" => esc_html__('Stretch', 'tennisclub')
				);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_article_styles', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return post-formats filters list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_post_formats_filters' ) ) {
	function tennisclub_get_list_post_formats_filters($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_post_formats_filters'))=='') {
			$list = array(
				"no"      => esc_html__('All posts', 'tennisclub'),
				"thumbs"  => esc_html__('With thumbs', 'tennisclub'),
				"reviews" => esc_html__('With reviews', 'tennisclub'),
				"video"   => esc_html__('With videos', 'tennisclub'),
				"audio"   => esc_html__('With audios', 'tennisclub'),
				"gallery" => esc_html__('With galleries', 'tennisclub')
				);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_post_formats_filters', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return portfolio filters list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_portfolio_filters' ) ) {
	function tennisclub_get_list_portfolio_filters($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_portfolio_filters'))=='') {
			$list = array(
				"hide"		=> esc_html__('Hide', 'tennisclub'),
				"tags"		=> esc_html__('Tags', 'tennisclub'),
				"categories"=> esc_html__('Categories', 'tennisclub')
				);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_portfolio_filters', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return hover styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_hovers' ) ) {
	function tennisclub_get_list_hovers($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_hovers'))=='') {
			$list = array();
			$list['circle effect1']  = esc_html__('Circle Effect 1',  'tennisclub');
			$list['circle effect2']  = esc_html__('Circle Effect 2',  'tennisclub');
			$list['circle effect3']  = esc_html__('Circle Effect 3',  'tennisclub');
			$list['circle effect4']  = esc_html__('Circle Effect 4',  'tennisclub');
			$list['circle effect5']  = esc_html__('Circle Effect 5',  'tennisclub');
			$list['circle effect6']  = esc_html__('Circle Effect 6',  'tennisclub');
			$list['circle effect7']  = esc_html__('Circle Effect 7',  'tennisclub');
			$list['circle effect8']  = esc_html__('Circle Effect 8',  'tennisclub');
			$list['circle effect9']  = esc_html__('Circle Effect 9',  'tennisclub');
			$list['circle effect10'] = esc_html__('Circle Effect 10',  'tennisclub');
			$list['circle effect11'] = esc_html__('Circle Effect 11',  'tennisclub');
			$list['circle effect12'] = esc_html__('Circle Effect 12',  'tennisclub');
			$list['circle effect13'] = esc_html__('Circle Effect 13',  'tennisclub');
			$list['circle effect14'] = esc_html__('Circle Effect 14',  'tennisclub');
			$list['circle effect15'] = esc_html__('Circle Effect 15',  'tennisclub');
			$list['circle effect16'] = esc_html__('Circle Effect 16',  'tennisclub');
			$list['circle effect17'] = esc_html__('Circle Effect 17',  'tennisclub');
			$list['circle effect18'] = esc_html__('Circle Effect 18',  'tennisclub');
			$list['circle effect19'] = esc_html__('Circle Effect 19',  'tennisclub');
			$list['circle effect20'] = esc_html__('Circle Effect 20',  'tennisclub');
			$list['square effect1']  = esc_html__('Square Effect 1',  'tennisclub');
			$list['square effect2']  = esc_html__('Square Effect 2',  'tennisclub');
			$list['square effect3']  = esc_html__('Square Effect 3',  'tennisclub');
			$list['square effect5']  = esc_html__('Square Effect 5',  'tennisclub');
			$list['square effect6']  = esc_html__('Square Effect 6',  'tennisclub');
			$list['square effect7']  = esc_html__('Square Effect 7',  'tennisclub');
			$list['square effect8']  = esc_html__('Square Effect 8',  'tennisclub');
			$list['square effect9']  = esc_html__('Square Effect 9',  'tennisclub');
			$list['square effect10'] = esc_html__('Square Effect 10',  'tennisclub');
			$list['square effect11'] = esc_html__('Square Effect 11',  'tennisclub');
			$list['square effect12'] = esc_html__('Square Effect 12',  'tennisclub');
			$list['square effect13'] = esc_html__('Square Effect 13',  'tennisclub');
			$list['square effect14'] = esc_html__('Square Effect 14',  'tennisclub');
			$list['square effect15'] = esc_html__('Square Effect 15',  'tennisclub');
			$list['square effect_dir']   = esc_html__('Square Effect Dir',   'tennisclub');
			$list['square effect_shift'] = esc_html__('Square Effect Shift', 'tennisclub');
			$list['square effect_book']  = esc_html__('Square Effect Book',  'tennisclub');
			$list['square effect_more']  = esc_html__('Square Effect More',  'tennisclub');
			$list['square effect_fade']  = esc_html__('Square Effect Fade',  'tennisclub');
			$list = apply_filters('tennisclub_filter_portfolio_hovers', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_hovers', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the blog counters
if ( !function_exists( 'tennisclub_get_list_blog_counters' ) ) {
	function tennisclub_get_list_blog_counters($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_blog_counters'))=='') {
			$list = array(
				'views'		=> esc_html__('Views', 'tennisclub'),
				'likes'		=> esc_html__('Likes', 'tennisclub'),
				'rating'	=> esc_html__('Rating', 'tennisclub'),
				'comments'	=> esc_html__('Comments', 'tennisclub')
				);
			$list = apply_filters('tennisclub_filter_list_blog_counters', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_blog_counters', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list of the item sizes for the portfolio alter style, prepended inherit
if ( !function_exists( 'tennisclub_get_list_alter_sizes' ) ) {
	function tennisclub_get_list_alter_sizes($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_alter_sizes'))=='') {
			$list = array(
					'1_1' => esc_html__('1x1', 'tennisclub'),
					'1_2' => esc_html__('1x2', 'tennisclub'),
					'2_1' => esc_html__('2x1', 'tennisclub'),
					'2_2' => esc_html__('2x2', 'tennisclub'),
					'1_3' => esc_html__('1x3', 'tennisclub'),
					'2_3' => esc_html__('2x3', 'tennisclub'),
					'3_1' => esc_html__('3x1', 'tennisclub'),
					'3_2' => esc_html__('3x2', 'tennisclub'),
					'3_3' => esc_html__('3x3', 'tennisclub')
					);
			$list = apply_filters('tennisclub_filter_portfolio_alter_sizes', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_alter_sizes', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return extended hover directions list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_hovers_directions' ) ) {
	function tennisclub_get_list_hovers_directions($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_hovers_directions'))=='') {
			$list = array(
				'left_to_right' => esc_html__('Left to Right',  'tennisclub'),
				'right_to_left' => esc_html__('Right to Left',  'tennisclub'),
				'top_to_bottom' => esc_html__('Top to Bottom',  'tennisclub'),
				'bottom_to_top' => esc_html__('Bottom to Top',  'tennisclub'),
				'scale_up'      => esc_html__('Scale Up',  'tennisclub'),
				'scale_down'    => esc_html__('Scale Down',  'tennisclub'),
				'scale_down_up' => esc_html__('Scale Down-Up',  'tennisclub'),
				'from_left_and_right' => esc_html__('From Left and Right',  'tennisclub'),
				'from_top_and_bottom' => esc_html__('From Top and Bottom',  'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_portfolio_hovers_directions', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_hovers_directions', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the label positions in the custom forms
if ( !function_exists( 'tennisclub_get_list_label_positions' ) ) {
	function tennisclub_get_list_label_positions($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_label_positions'))=='') {
			$list = array(
				'top'		=> esc_html__('Top',		'tennisclub'),
				'bottom'	=> esc_html__('Bottom',		'tennisclub'),
				'left'		=> esc_html__('Left',		'tennisclub'),
				'over'		=> esc_html__('Over',		'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_label_positions', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_label_positions', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the bg image positions
if ( !function_exists( 'tennisclub_get_list_bg_image_positions' ) ) {
	function tennisclub_get_list_bg_image_positions($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_bg_image_positions'))=='') {
			$list = array(
				'left top'	   => esc_html__('Left Top', 'tennisclub'),
				'center top'   => esc_html__("Center Top", 'tennisclub'),
				'right top'    => esc_html__("Right Top", 'tennisclub'),
				'left center'  => esc_html__("Left Center", 'tennisclub'),
				'center center'=> esc_html__("Center Center", 'tennisclub'),
				'right center' => esc_html__("Right Center", 'tennisclub'),
				'left bottom'  => esc_html__("Left Bottom", 'tennisclub'),
				'center bottom'=> esc_html__("Center Bottom", 'tennisclub'),
				'right bottom' => esc_html__("Right Bottom", 'tennisclub')
			);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_bg_image_positions', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the bg image repeat
if ( !function_exists( 'tennisclub_get_list_bg_image_repeats' ) ) {
	function tennisclub_get_list_bg_image_repeats($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_bg_image_repeats'))=='') {
			$list = array(
				'repeat'	=> esc_html__('Repeat', 'tennisclub'),
				'repeat-x'	=> esc_html__('Repeat X', 'tennisclub'),
				'repeat-y'	=> esc_html__('Repeat Y', 'tennisclub'),
				'no-repeat'	=> esc_html__('No Repeat', 'tennisclub')
			);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_bg_image_repeats', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the bg image attachment
if ( !function_exists( 'tennisclub_get_list_bg_image_attachments' ) ) {
	function tennisclub_get_list_bg_image_attachments($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_bg_image_attachments'))=='') {
			$list = array(
				'scroll'	=> esc_html__('Scroll', 'tennisclub'),
				'fixed'		=> esc_html__('Fixed', 'tennisclub'),
				'local'		=> esc_html__('Local', 'tennisclub')
			);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_bg_image_attachments', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}


// Return list of the bg tints
if ( !function_exists( 'tennisclub_get_list_bg_tints' ) ) {
	function tennisclub_get_list_bg_tints($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_bg_tints'))=='') {
			$list = array(
				'white'	=> esc_html__('White', 'tennisclub'),
				'light'	=> esc_html__('Light', 'tennisclub'),
				'dark'	=> esc_html__('Dark', 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_bg_tints', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_bg_tints', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return custom fields types list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_field_types' ) ) {
	function tennisclub_get_list_field_types($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_field_types'))=='') {
			$list = array(
				'text'     => esc_html__('Text',  'tennisclub'),
				'textarea' => esc_html__('Text Area','tennisclub'),
				'password' => esc_html__('Password',  'tennisclub'),
				'radio'    => esc_html__('Radio',  'tennisclub'),
				'checkbox' => esc_html__('Checkbox',  'tennisclub'),
				'select'   => esc_html__('Select',  'tennisclub'),
				'date'     => esc_html__('Date','tennisclub'),
				'time'     => esc_html__('Time','tennisclub'),
				'button'   => esc_html__('Button','tennisclub')
			);
			$list = apply_filters('tennisclub_filter_field_types', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_field_types', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return Google map styles
if ( !function_exists( 'tennisclub_get_list_googlemap_styles' ) ) {
	function tennisclub_get_list_googlemap_styles($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_googlemap_styles'))=='') {
			$list = array(
				'default' => esc_html__('Default', 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_googlemap_styles', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_googlemap_styles', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return images list
if (!function_exists('tennisclub_get_list_images')) {	
	function tennisclub_get_list_images($folder, $ext='', $only_names=false) {
		return function_exists('trx_utils_get_folder_list') ? trx_utils_get_folder_list($folder, $ext, $only_names) : array();
	}
}

// Return iconed classes list
if ( !function_exists( 'tennisclub_get_list_icons' ) ) {
	function tennisclub_get_list_icons($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_icons'))=='') {
			$list = tennisclub_parse_icons_classes(tennisclub_get_file_dir("css/fontello/css/fontello-codes.css"));
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_icons', $list);
		}
		return $prepend_inherit ? array_merge(array('inherit'), $list) : $list;
	}
}

// Return socials list
if ( !function_exists( 'tennisclub_get_list_socials' ) ) {
	function tennisclub_get_list_socials($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_socials'))=='') {
			$list = tennisclub_get_list_images(TENNISCLUB_FW_DIR."/images/socials", "png");
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_socials', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return flags list
if ( !function_exists( 'tennisclub_get_list_flags' ) ) {
	function tennisclub_get_list_flags($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_flags'))=='') {
			$list = tennisclub_get_list_files("images/flags", "png");
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_flags', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( !function_exists( 'tennisclub_get_list_yesno' ) ) {
	function tennisclub_get_list_yesno($prepend_inherit=false) {
		$list = array(
			'yes' => esc_html__("Yes", 'tennisclub'),
			'no'  => esc_html__("No", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( !function_exists( 'tennisclub_get_list_onoff' ) ) {
	function tennisclub_get_list_onoff($prepend_inherit=false) {
		$list = array(
			"on" => esc_html__("On", 'tennisclub'),
			"off" => esc_html__("Off", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( !function_exists( 'tennisclub_get_list_showhide' ) ) {
	function tennisclub_get_list_showhide($prepend_inherit=false) {
		$list = array(
			"show" => esc_html__("Show", 'tennisclub'),
			"hide" => esc_html__("Hide", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with 'Ascending' and 'Descending' items
if ( !function_exists( 'tennisclub_get_list_orderings' ) ) {
	function tennisclub_get_list_orderings($prepend_inherit=false) {
		$list = array(
			"asc" => esc_html__("Ascending", 'tennisclub'),
			"desc" => esc_html__("Descending", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( !function_exists( 'tennisclub_get_list_directions' ) ) {
	function tennisclub_get_list_directions($prepend_inherit=false) {
		$list = array(
			"horizontal" => esc_html__("Horizontal", 'tennisclub'),
			"vertical" => esc_html__("Vertical", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with item's shapes
if ( !function_exists( 'tennisclub_get_list_shapes' ) ) {
	function tennisclub_get_list_shapes($prepend_inherit=false) {
		$list = array(
			"square" => esc_html__("Square", 'tennisclub'),
			"round"  => esc_html__("Round", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with item's sizes
if ( !function_exists( 'tennisclub_get_list_sizes' ) ) {
	function tennisclub_get_list_sizes($prepend_inherit=false) {
		$list = array(
			"tiny"   => esc_html__("Tiny", 'tennisclub'),
			"small"  => esc_html__("Small", 'tennisclub'),
			"medium" => esc_html__("Medium", 'tennisclub'),
			"large"  => esc_html__("Large", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with slider (scroll) controls positions
if ( !function_exists( 'tennisclub_get_list_controls' ) ) {
	function tennisclub_get_list_controls($prepend_inherit=false) {
		$list = array(
			"hide" => esc_html__("Hide", 'tennisclub'),
			"side" => esc_html__("Side", 'tennisclub'),
			"bottom" => esc_html__("Bottom", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with float items
if ( !function_exists( 'tennisclub_get_list_floats' ) ) {
	function tennisclub_get_list_floats($prepend_inherit=false) {
		$list = array(
			"none" => esc_html__("None", 'tennisclub'),
			"left" => esc_html__("Float Left", 'tennisclub'),
			"right" => esc_html__("Float Right", 'tennisclub')
		);
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with alignment items
if ( !function_exists( 'tennisclub_get_list_alignments' ) ) {
	function tennisclub_get_list_alignments($justify=false, $prepend_inherit=false) {
		$list = array(
			"none" => esc_html__("None", 'tennisclub'),
			"left" => esc_html__("Left", 'tennisclub'),
			"center" => esc_html__("Center", 'tennisclub'),
			"right" => esc_html__("Right", 'tennisclub')
		);
		if ($justify) $list["justify"] = esc_html__("Justify", 'tennisclub');
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with horizontal positions
if ( !function_exists( 'tennisclub_get_list_hpos' ) ) {
	function tennisclub_get_list_hpos($prepend_inherit=false, $center=false) {
		$list = array();
		$list['left'] = esc_html__("Left", 'tennisclub');
		if ($center) $list['center'] = esc_html__("Center", 'tennisclub');
		$list['right'] = esc_html__("Right", 'tennisclub');
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with vertical positions
if ( !function_exists( 'tennisclub_get_list_vpos' ) ) {
	function tennisclub_get_list_vpos($prepend_inherit=false, $center=false) {
		$list = array();
		$list['top'] = esc_html__("Top", 'tennisclub');
		if ($center) $list['center'] = esc_html__("Center", 'tennisclub');
		$list['bottom'] = esc_html__("Bottom", 'tennisclub');
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return sorting list items
if ( !function_exists( 'tennisclub_get_list_sortings' ) ) {
	function tennisclub_get_list_sortings($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_sortings'))=='') {
			$list = array(
				"date" => esc_html__("Date", 'tennisclub'),
				"title" => esc_html__("Alphabetically", 'tennisclub'),
				"views" => esc_html__("Popular (views count)", 'tennisclub'),
				"comments" => esc_html__("Most commented (comments count)", 'tennisclub'),
				"author_rating" => esc_html__("Author rating", 'tennisclub'),
				"users_rating" => esc_html__("Visitors (users) rating", 'tennisclub'),
				"random" => esc_html__("Random", 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_list_sortings', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_sortings', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list with columns widths
if ( !function_exists( 'tennisclub_get_list_columns' ) ) {
	function tennisclub_get_list_columns($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_columns'))=='') {
			$list = array(
				"none" => esc_html__("None", 'tennisclub'),
				"1_1" => esc_html__("100%", 'tennisclub'),
				"1_2" => esc_html__("1/2", 'tennisclub'),
				"1_3" => esc_html__("1/3", 'tennisclub'),
				"2_3" => esc_html__("2/3", 'tennisclub'),
				"1_4" => esc_html__("1/4", 'tennisclub'),
				"3_4" => esc_html__("3/4", 'tennisclub'),
				"1_5" => esc_html__("1/5", 'tennisclub'),
				"2_5" => esc_html__("2/5", 'tennisclub'),
				"3_5" => esc_html__("3/5", 'tennisclub'),
				"4_5" => esc_html__("4/5", 'tennisclub'),
				"1_6" => esc_html__("1/6", 'tennisclub'),
				"5_6" => esc_html__("5/6", 'tennisclub'),
				"1_7" => esc_html__("1/7", 'tennisclub'),
				"2_7" => esc_html__("2/7", 'tennisclub'),
				"3_7" => esc_html__("3/7", 'tennisclub'),
				"4_7" => esc_html__("4/7", 'tennisclub'),
				"5_7" => esc_html__("5/7", 'tennisclub'),
				"6_7" => esc_html__("6/7", 'tennisclub'),
				"1_8" => esc_html__("1/8", 'tennisclub'),
				"3_8" => esc_html__("3/8", 'tennisclub'),
				"5_8" => esc_html__("5/8", 'tennisclub'),
				"7_8" => esc_html__("7/8", 'tennisclub'),
				"1_9" => esc_html__("1/9", 'tennisclub'),
				"2_9" => esc_html__("2/9", 'tennisclub'),
				"4_9" => esc_html__("4/9", 'tennisclub'),
				"5_9" => esc_html__("5/9", 'tennisclub'),
				"7_9" => esc_html__("7/9", 'tennisclub'),
				"8_9" => esc_html__("8/9", 'tennisclub'),
				"1_10"=> esc_html__("1/10", 'tennisclub'),
				"3_10"=> esc_html__("3/10", 'tennisclub'),
				"7_10"=> esc_html__("7/10", 'tennisclub'),
				"9_10"=> esc_html__("9/10", 'tennisclub'),
				"1_11"=> esc_html__("1/11", 'tennisclub'),
				"2_11"=> esc_html__("2/11", 'tennisclub'),
				"3_11"=> esc_html__("3/11", 'tennisclub'),
				"4_11"=> esc_html__("4/11", 'tennisclub'),
				"5_11"=> esc_html__("5/11", 'tennisclub'),
				"6_11"=> esc_html__("6/11", 'tennisclub'),
				"7_11"=> esc_html__("7/11", 'tennisclub'),
				"8_11"=> esc_html__("8/11", 'tennisclub'),
				"9_11"=> esc_html__("9/11", 'tennisclub'),
				"10_11"=> esc_html__("10/11", 'tennisclub'),
				"1_12"=> esc_html__("1/12", 'tennisclub'),
				"5_12"=> esc_html__("5/12", 'tennisclub'),
				"7_12"=> esc_html__("7/12", 'tennisclub'),
				"10_12"=> esc_html__("10/12", 'tennisclub'),
				"11_12"=> esc_html__("11/12", 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_list_columns', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_columns', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return list of locations for the dedicated content
if ( !function_exists( 'tennisclub_get_list_dedicated_locations' ) ) {
	function tennisclub_get_list_dedicated_locations($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_dedicated_locations'))=='') {
			$list = array(
				"default" => esc_html__('As in the post defined', 'tennisclub'),
				"center"  => esc_html__('Above the text of the post', 'tennisclub'),
				"left"    => esc_html__('To the left the text of the post', 'tennisclub'),
				"right"   => esc_html__('To the right the text of the post', 'tennisclub'),
				"alter"   => esc_html__('Alternates for each post', 'tennisclub')
			);
			$list = apply_filters('tennisclub_filter_list_dedicated_locations', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_dedicated_locations', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return post-format name
if ( !function_exists( 'tennisclub_get_post_format_name' ) ) {
	function tennisclub_get_post_format_name($format, $single=true) {
		$name = '';
		if ($format=='gallery')		$name = $single ? esc_html__('gallery', 'tennisclub') : esc_html__('galleries', 'tennisclub');
		else if ($format=='video')	$name = $single ? esc_html__('video', 'tennisclub') : esc_html__('videos', 'tennisclub');
		else if ($format=='audio')	$name = $single ? esc_html__('audio', 'tennisclub') : esc_html__('audios', 'tennisclub');
		else if ($format=='image')	$name = $single ? esc_html__('image', 'tennisclub') : esc_html__('images', 'tennisclub');
		else if ($format=='quote')	$name = $single ? esc_html__('quote', 'tennisclub') : esc_html__('quotes', 'tennisclub');
		else if ($format=='link')	$name = $single ? esc_html__('link', 'tennisclub') : esc_html__('links', 'tennisclub');
		else if ($format=='status')	$name = $single ? esc_html__('status', 'tennisclub') : esc_html__('statuses', 'tennisclub');
		else if ($format=='aside')	$name = $single ? esc_html__('aside', 'tennisclub') : esc_html__('asides', 'tennisclub');
		else if ($format=='chat')	$name = $single ? esc_html__('chat', 'tennisclub') : esc_html__('chats', 'tennisclub');
		else						$name = $single ? esc_html__('standard', 'tennisclub') : esc_html__('standards', 'tennisclub');
		return apply_filters('tennisclub_filter_list_post_format_name', $name, $format);
	}
}

// Return post-format icon name (from Fontello library)
if ( !function_exists( 'tennisclub_get_post_format_icon' ) ) {
	function tennisclub_get_post_format_icon($format) {
		$icon = 'icon-';
		if ($format=='gallery')		$icon .= 'pictures';
		else if ($format=='video')	$icon .= 'video';
		else if ($format=='audio')	$icon .= 'note';
		else if ($format=='image')	$icon .= 'picture';
		else if ($format=='quote')	$icon .= 'quote';
		else if ($format=='link')	$icon .= 'link';
		else if ($format=='status')	$icon .= 'comment';
		else if ($format=='aside')	$icon .= 'doc-text';
		else if ($format=='chat')	$icon .= 'chat';
		else						$icon .= 'book-open';
		return apply_filters('tennisclub_filter_list_post_format_icon', $icon, $format);
	}
}

// Return fonts styles list, prepended inherit
if ( !function_exists( 'tennisclub_get_list_fonts_styles' ) ) {
	function tennisclub_get_list_fonts_styles($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_fonts_styles'))=='') {
			$list = array(
				'i' => esc_html__('I','tennisclub'),
				'u' => esc_html__('U', 'tennisclub')
			);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_fonts_styles', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return Google fonts list
if ( !function_exists( 'tennisclub_get_list_fonts' ) ) {
	function tennisclub_get_list_fonts($prepend_inherit=false) {
		if (($list = tennisclub_storage_get('list_fonts'))=='') {
			$list = array();
			$list = tennisclub_array_merge($list, tennisclub_get_list_font_faces());
			// Google and custom fonts list:
			
			
			
			
			
			$list = tennisclub_array_merge($list, array(
				'Advent Pro' => array('family'=>'sans-serif'),
				'Alegreya Sans' => array('family'=>'sans-serif'),
				'Arimo' => array('family'=>'sans-serif'),
				'Asap' => array('family'=>'sans-serif'),
				'Averia Sans Libre' => array('family'=>'cursive'),
				'Averia Serif Libre' => array('family'=>'cursive'),
				'Bree Serif' => array('family'=>'serif',),
				'Cabin' => array('family'=>'sans-serif'),
				'Cabin Condensed' => array('family'=>'sans-serif'),
				'Caudex' => array('family'=>'serif'),
				'Comfortaa' => array('family'=>'cursive'),
				'Cousine' => array('family'=>'sans-serif'),
				'Crimson Text' => array('family'=>'serif'),
				'Cuprum' => array('family'=>'sans-serif'),
				'Dosis' => array('family'=>'sans-serif'),
				'Economica' => array('family'=>'sans-serif'),
				'Exo' => array('family'=>'sans-serif'),
				'Expletus Sans' => array('family'=>'cursive'),
				'Karla' => array('family'=>'sans-serif'),
				'Lato' => array('family'=>'sans-serif'),
				'Lekton' => array('family'=>'sans-serif'),
				'Lobster Two' => array('family'=>'cursive'),
				'Maven Pro' => array('family'=>'sans-serif'),
				'Merriweather' => array('family'=>'serif'),
				'Montserrat' => array('family'=>'sans-serif'),
				'Neuton' => array('family'=>'serif'),
				'Noticia Text' => array('family'=>'serif'),
				'Old Standard TT' => array('family'=>'serif'),
				'Open Sans' => array('family'=>'sans-serif'),
				'Orbitron' => array('family'=>'sans-serif'),
				'Oswald' => array('family'=>'sans-serif'),
				'Overlock' => array('family'=>'cursive'),
				'Oxygen' => array('family'=>'sans-serif'),
				'Philosopher' => array('family'=>'serif'),
				'PT Serif' => array('family'=>'serif'),
				'Puritan' => array('family'=>'sans-serif'),
				'Raleway' => array('family'=>'sans-serif'),
				'Roboto' => array('family'=>'sans-serif'),
				'Roboto Slab' => array('family'=>'sans-serif'),
				'Roboto Condensed' => array('family'=>'sans-serif'),
				'Rosario' => array('family'=>'sans-serif'),
				'Share' => array('family'=>'cursive'),
				'Signika' => array('family'=>'sans-serif'),
				'Signika Negative' => array('family'=>'sans-serif'),
				'Source Sans Pro' => array('family'=>'sans-serif'),
				'Tinos' => array('family'=>'serif'),
				'Ubuntu' => array('family'=>'sans-serif'),
				'Vollkorn' => array('family'=>'serif')
				)
			);
			$list = apply_filters('tennisclub_filter_list_fonts', $list);
			if (tennisclub_get_theme_setting('use_list_cache')) tennisclub_storage_set('list_fonts', $list);
		}
		return $prepend_inherit ? tennisclub_array_merge(array('inherit' => esc_html__("Inherit", 'tennisclub')), $list) : $list;
	}
}

// Return Custom font-face list
if ( !function_exists( 'tennisclub_get_list_font_faces' ) ) {
	function tennisclub_get_list_font_faces($prepend_inherit=false) {
		static $list = false;
		if (is_array($list)) return $list;
		$fonts = tennisclub_storage_get('required_custom_fonts');
		$list = array();
		if (is_array($fonts)) {
			foreach ($fonts as $font) {
				if (($url = tennisclub_get_file_url('css/font-face/'.trim($font).'/stylesheet.css'))!='') {
					$list[$font] = array('css' => $url);
				}
			}
		}
		return $list;
	}
}
?>