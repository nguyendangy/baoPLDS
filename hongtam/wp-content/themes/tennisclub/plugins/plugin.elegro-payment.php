<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( !function_exists( 'tennisclub_exists_elegro_payment' ) ) {
    function tennisclub_exists_elegro_payment() {
        return class_exists( 'WC_Elegro_Payment' );
    }
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('tennisclub_elegro_payment_theme_setup')) {
    add_action( 'tennisclub_action_before_init_theme', 'tennisclub_elegro_payment_theme_setup', 1 );
    function tennisclub_elegro_payment_theme_setup() {
        if (tennisclub_exists_elegro_payment()) {
            add_action('tennisclub_action_add_styles',  'tennisclub_elegro_payment_frontend_scripts' );
        }
        if (is_admin()) {
            add_filter( 'tennisclub_filter_required_plugins',       'tennisclub_elegro_payment_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_elegro_payment_required_plugins' ) ) {
    function tennisclub_elegro_payment_required_plugins($list=array()) {
        if (in_array('elegro-payment', (array)tennisclub_storage_get('required_plugins'))) {
            $list[] = array(
                'name'      => esc_html__('Elegro Crypto Payment', 'tennisclub'),
                'slug'      => 'elegro-payment',
                'required'  => false
            );
        }
        return $list;
    }
}


// Enqueue Elegro Payment custom styles
if ( !function_exists( 'tennisclub_elegro_payment_frontend_scripts' ) ) {
    function tennisclub_elegro_payment_frontend_scripts() {
        if (file_exists(tennisclub_get_file_dir('css/plugin.elegro-payment.css')))
            wp_enqueue_style( 'tennisclub-plugin-elegro-payment-style',  tennisclub_get_file_url('css/plugin.elegro-payment.css'), array(), null );
    }
}
?>