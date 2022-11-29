<?php
/* Weather Atlas Widget support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_weather_atlas_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_weather_atlas_theme_setup', 1 );
	function tennisclub_weather_atlas_theme_setup() {
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',				'tennisclub_weather_atlas_required_plugins' );
		}
	}
}

// Check if Weather Atlas Widget installed and activated
if ( !function_exists( 'tennisclub_exists_weather_atlas' ) ) {
	function tennisclub_exists_weather_atlas() {
		return function_exists('activate_weather_atlas');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_weather_atlas_required_plugins' ) ) {
	function tennisclub_weather_atlas_required_plugins($list=array()) {
		if (in_array('weather-atlas', tennisclub_storage_get('required_plugins'))){

			$list[] = array(
				'name' => esc_html__('Weather Atlas Widget', 'tennisclub'),
				'slug' => 'weather-atlas',
				'required' => false
			);

		}
		return $list;
	}
}
?>