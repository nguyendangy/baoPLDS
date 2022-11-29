<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_booked_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_booked_theme_setup', 1 );
	function tennisclub_booked_theme_setup() {
		// Register shortcode in the shortcodes list
		if (tennisclub_exists_booked()) {
			add_action('tennisclub_action_add_styles', 					'tennisclub_booked_frontend_scripts');
		}
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',				'tennisclub_booked_required_plugins' );
		}
	}
}


// Check if plugin installed and activated
if ( !function_exists( 'tennisclub_exists_booked' ) ) {
	function tennisclub_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_booked_required_plugins' ) ) {
	
	function tennisclub_booked_required_plugins($list=array()) {
		if (in_array('booked', tennisclub_storage_get('required_plugins'))) {
			$path = tennisclub_get_file_dir('plugins/install/booked.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Booked', 'tennisclub'),
					'slug' 		=> 'booked',
					'version'   => '2.4',
					'source'	=> $path,
					'required' 	=> false
					);
			}
		}
		return $list;
	}
}

// Enqueue custom styles
if ( !function_exists( 'tennisclub_booked_frontend_scripts' ) ) {
	
	function tennisclub_booked_frontend_scripts() {
		if (file_exists(tennisclub_get_file_dir('css/plugin.booked.css')))
			wp_enqueue_style( 'tennisclub-plugin-booked-style',  tennisclub_get_file_url('css/plugin.booked.css'), array(), null );
	}
}


// Lists
//------------------------------------------------------------------------

// Return booked calendars list, prepended inherit (if need)
if ( !function_exists( 'tennisclub_get_list_booked_calendars' ) ) {
	function tennisclub_get_list_booked_calendars($prepend_inherit=false) {
		return tennisclub_exists_booked() ? tennisclub_get_list_terms($prepend_inherit, 'booked_custom_calendars') : array();
	}
}

?>