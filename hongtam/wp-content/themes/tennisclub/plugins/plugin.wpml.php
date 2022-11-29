<?php
/* WPML support functions
------------------------------------------------------------------------------- */

// Check if WPML installed and activated
if ( !function_exists( 'tennisclub_exists_wpml' ) ) {
	function tennisclub_exists_wpml() {
		return defined('ICL_SITEPRESS_VERSION') && class_exists('sitepress');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_wpml_required_plugins' ) ) {
	function tennisclub_wpml_required_plugins($list=array()) {
		if (in_array('wpml', tennisclub_storage_get('required_plugins'))) {
			$path = tennisclub_get_file_dir('plugins/install/wpml.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('WPML', 'tennisclub'),
					'slug' 		=> 'wpml',
					'source'	=> $path,
					'required' 	=> false
					);
			}
		}
		return $list;
	}
}
?>