<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('tennisclub_cf7_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_cf7_theme_setup', 9 );
	function tennisclub_cf7_theme_setup() {
        if (tennisclub_exists_cf7()){
            add_action('tennisclub_action_add_styles', 				'tennisclub_cf7_frontend_scripts' );
        }
		if (is_admin()) {
            add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_cf7_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_cf7_required_plugins' ) ) {
    
    function tennisclub_cf7_required_plugins($list=array()) {
        if (in_array('contact-form-7', tennisclub_storage_get('required_plugins')))
            $list[] = array(
                'name' 		=> esc_html__('Contact Form 7', 'tennisclub'),
                'slug' 		=> 'contact-form-7',
                'required' 	=> false
            );
        return $list;
    }
}

// Check if cf7 installed and activated
if ( !function_exists( 'tennisclub_exists_cf7' ) ) {
	function tennisclub_exists_cf7() {
		return class_exists('WPCF7');
	}
}

// Enqueue custom styles
if ( !function_exists( 'tennisclub_cf7_frontend_scripts' ) ) {
    
    function tennisclub_cf7_frontend_scripts()
    {
        if (file_exists(tennisclub_get_file_dir('css/plugin.contact-form-7.css')))
            wp_enqueue_style('tennisclub-plugin-contact-form-7', tennisclub_get_file_url('css/plugin.contact-form-7.css'), array(), null);
    }
}
?>