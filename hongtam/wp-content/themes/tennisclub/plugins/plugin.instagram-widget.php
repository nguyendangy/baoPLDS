<?php
/* Instagram Widget support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_instagram_widget_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_instagram_widget_theme_setup', 1 );
	function tennisclub_instagram_widget_theme_setup() {
		if (tennisclub_exists_instagram_widget()) {
			add_action( 'tennisclub_action_add_styles', 						'tennisclub_instagram_widget_frontend_scripts' );
		}
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_instagram_widget_required_plugins' );
		}
	}
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'tennisclub_exists_instagram_widget' ) ) {
	function tennisclub_exists_instagram_widget() {
		return function_exists('wpiw_init');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_instagram_widget_required_plugins' ) ) {
	function tennisclub_instagram_widget_required_plugins($list=array()) {
		if (in_array('instagram_widget', tennisclub_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Widget', 'tennisclub'),
					'slug' 		=> 'wp-instagram-widget',
					'required' 	=> false
				);
		return $list;
	}
}

// Enqueue custom styles
if ( !function_exists( 'tennisclub_instagram_widget_frontend_scripts' ) ) {
	function tennisclub_instagram_widget_frontend_scripts() {
		if (file_exists(tennisclub_get_file_dir('css/plugin.instagram-widget.css')))
			wp_enqueue_style( 'tennisclub-plugin-instagram-widget-style',  tennisclub_get_file_url('css/plugin.instagram-widget.css'), array(), null );
	}
}

?>