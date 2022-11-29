<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_trx_updater_theme_setup')) {
    add_action( 'tennisclub_action_before_init_theme', 'tennisclub_trx_updater_theme_setup' );
    function tennisclub_trx_updater_theme_setup() {
        if (is_admin()) {
            add_filter( 'tennisclub_filter_required_plugins',				'tennisclub_trx_updater_required_plugins' );
        }
    }
}

// Check if RevSlider installed and activated
if ( !function_exists( 'tennisclub_exists_trx_updater' ) ) {
    function tennisclub_exists_trx_updater() {
        return defined( 'TRX_UPDATER_VERSION' );
    }
}


// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_trx_updater_required_plugins' ) ) {
    function tennisclub_trx_updater_required_plugins($list=array()) {
        if (in_array('trx_updater', tennisclub_storage_get('required_plugins'))) {
            $path = tennisclub_get_file_dir('plugins/install/trx_updater.zip');
            if (file_exists($path)) {
                $list[] = array(
                    'name' 		=> esc_html__('ThemeREX Updater', 'tennisclub'),
                    'slug' 		=> 'trx_updater',
                    'version'  => '2.0.0',
                    'source'	=> $path,
                    'required' 	=> false
                );
            }
        }
        return $list;
    }
}