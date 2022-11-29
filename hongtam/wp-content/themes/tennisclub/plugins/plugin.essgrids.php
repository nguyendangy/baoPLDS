<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_essgrids_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_essgrids_theme_setup', 1 );
	function tennisclub_essgrids_theme_setup() {
		// Register shortcode in the shortcodes list
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',				'tennisclub_essgrids_required_plugins' );
		}
	}
}


// Check if Ess. Grid installed and activated
if ( !function_exists( 'tennisclub_exists_essgrids' ) ) {
	function tennisclub_exists_essgrids() {
		return defined('EG_PLUGIN_PATH') || defined( 'ESG_PLUGIN_PATH' );
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_essgrids_required_plugins' ) ) {
	function tennisclub_essgrids_required_plugins($list=array()) {
		if (in_array('essgrids', tennisclub_storage_get('required_plugins'))) {
			$path = tennisclub_get_file_dir('plugins/install/essential-grid.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Essential Grid', 'tennisclub'),
					'slug' 		=> 'essential-grid',
					'version'   => '3.0.16',
					'source'	=> $path,
					'required' 	=> false
					);
			}
		}
		return $list;
	}
}


?>