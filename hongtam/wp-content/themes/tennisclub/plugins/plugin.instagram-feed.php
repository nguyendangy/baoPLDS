<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_instagram_feed_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_instagram_feed_theme_setup', 1 );
	function tennisclub_instagram_feed_theme_setup() {
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_instagram_feed_required_plugins' );
		}
	}
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'tennisclub_exists_instagram_feed' ) ) {
	function tennisclub_exists_instagram_feed() {
		return defined('SBIVER');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_instagram_feed_required_plugins' ) ) {
	function tennisclub_instagram_feed_required_plugins($list=array()) {
		if (in_array('instagram_feed', tennisclub_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Feed', 'tennisclub'),
					'slug' 		=> 'instagram-feed',
					'required' 	=> false
				);
		return $list;
	}
}

?>