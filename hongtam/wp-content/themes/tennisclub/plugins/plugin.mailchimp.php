<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_mailchimp_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_mailchimp_theme_setup', 1 );
	function tennisclub_mailchimp_theme_setup() {
		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_mailchimp_required_plugins' );
		}
	}
}

// Check if Mail Chimp installed and activated
if ( !function_exists( 'tennisclub_exists_mailchimp' ) ) {
	function tennisclub_exists_mailchimp() {
        return function_exists( '__mc4wp_load_plugin' ) || defined( 'MC4WP_VERSION' );
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_mailchimp_required_plugins' ) ) {
	function tennisclub_mailchimp_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', tennisclub_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'tennisclub'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}


?>