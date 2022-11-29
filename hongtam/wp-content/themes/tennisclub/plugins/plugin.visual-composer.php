<?php
/* WPBakery PageBuilder support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_vc_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_vc_theme_setup', 1 );
	function tennisclub_vc_theme_setup() {
		if (tennisclub_exists_visual_composer()) {

			add_action('tennisclub_action_add_styles',		 				'tennisclub_vc_frontend_scripts' );
		}
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_vc_required_plugins' );
		}
	}
}

// Check if WPBakery PageBuilder installed and activated
if ( !function_exists( 'tennisclub_exists_visual_composer' ) ) {
	function tennisclub_exists_visual_composer() {
		return class_exists('Vc_Manager');
	}
}

// Check if WPBakery PageBuilder in frontend editor mode
if ( !function_exists( 'tennisclub_vc_is_frontend' ) ) {
	function tennisclub_vc_is_frontend() {
		return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
			|| (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_vc_required_plugins' ) ) {
	function tennisclub_vc_required_plugins($list=array()) {
		if (in_array('visual_composer', tennisclub_storage_get('required_plugins'))) {
			$path = tennisclub_get_file_dir('plugins/install/js_composer.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('WPBakery PageBuilder', 'tennisclub'),
					'slug' 		=> 'js_composer',
					'version'   => '6.10.0',
					'source'	=> $path,
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}

// Enqueue VC custom styles
if ( !function_exists( 'tennisclub_vc_frontend_scripts' ) ) {
	function tennisclub_vc_frontend_scripts() {
		if (file_exists(tennisclub_get_file_dir('css/plugin.visual-composer.css')))
			wp_enqueue_style( 'tennisclub-plugin-visual-composer-style',  tennisclub_get_file_url('css/plugin.visual-composer.css'), array(), null );
	}
}

?>