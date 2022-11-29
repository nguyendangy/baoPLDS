<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_gutenberg_theme_setup')) {
    add_action( 'tennisclub_action_before_init_theme', 'tennisclub_gutenberg_theme_setup', 1 );
    function tennisclub_gutenberg_theme_setup() {
        if (is_admin()) {
            add_filter( 'tennisclub_filter_required_plugins', 'tennisclub_gutenberg_required_plugins' );
        }
    }
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'tennisclub_exists_gutenberg' ) ) {
    function tennisclub_exists_gutenberg() {
        return function_exists( 'the_gutenberg_project' ) && function_exists( 'register_block_type' );
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_gutenberg_required_plugins' ) ) {
    function tennisclub_gutenberg_required_plugins($list=array()) {
        if (in_array('gutenberg', (array)tennisclub_storage_get('required_plugins')))
            $list[] = array(
                'name'         => esc_html__('Gutenberg', 'tennisclub'),
                'slug'         => 'gutenberg',
                'required'     => false
            );
        return $list;
    }
}
?>