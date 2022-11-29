<?php
/**
 * TennisClub Framework: less manipulations
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


// Theme init
if (!function_exists('tennisclub_less_theme_setup2')) {
	add_action( 'tennisclub_action_after_init_theme', 'tennisclub_less_theme_setup2' );
	function tennisclub_less_theme_setup2() {
		if (tennisclub_get_theme_setting('less_compiler')!='no' && !is_admin() && tennisclub_get_theme_option('debug_mode')=='yes') {

			// Regular run - if not admin - recompile only changed files
			$check_time = true;
			if (!is_customize_preview() && (int) get_option(tennisclub_storage_get('options_prefix') . '_compile_less') > 0) {
				update_option(tennisclub_storage_get('options_prefix') . '_compile_less', 0);
				$check_time = false;
			}
			
			tennisclub_storage_set('less_check_time', $check_time);
			do_action('tennisclub_action_compile_less');
			tennisclub_storage_set('less_check_time', false);

		}
	}
}



/* LESS
-------------------------------------------------------------------------------- */

// Recompile all LESS files
if (!function_exists('tennisclub_compile_less')) {	
	function tennisclub_compile_less($list = array(), $recompile=true) {

		if (!function_exists('trx_utils_less_compiler')) return false;

		$success = true;

		if (!is_array($list) || count($list)==0) return $success;

		// Less compiler
		$less_compiler = tennisclub_get_theme_setting('less_compiler');
		if ($less_compiler == 'no') return $success;
		
		// Prepare theme specific LESS-vars (colors, backgrounds, logo height, etc.)
		$less_split = tennisclub_get_theme_setting('less_split');
		$vars = apply_filters('tennisclub_filter_prepare_less', '');
		if ($less_compiler=='external' || !$less_split) {
			// Save LESS-vars into theme.vars.less
			tennisclub_fpc(tennisclub_get_file_dir('css/theme.vars.less'), $vars);
			if ($less_compiler=='external') return $success;
			$vars = '';
		}
		
		// Generate map for the LESS-files
		$less_map = tennisclub_get_theme_setting('less_map');
		if (tennisclub_get_theme_option('debug_mode')=='no' || $less_compiler=='lessc') $less_map = 'no';
		
		// Get separator to split LESS-files
		$less_sep = $less_map!='no' ? '' : tennisclub_get_theme_setting('less_separator');
	
		// Prepare skin specific LESS-vars (colors, backgrounds, logo height, etc.)
		$vars = apply_filters('tennisclub_filter_prepare_less', '');

		// Collect .less files in parent and child themes
		if (empty($list)) {
			$list = tennisclub_collect_files(get_template_directory(), 'less');
			if (get_template_directory() != get_stylesheet_directory()) $list = array_merge($list, tennisclub_collect_files(get_stylesheet_directory(), 'less'));
		}
		// Prepare separate array with less utils (not compile it alone - only with main files)
		$utils = $less_map!='no' ? array() : '';
		$utils_time = 0;
		if (is_array($list) && count($list) > 0) {
			foreach($list as $k=>$file) {
				$fname = basename($file);
				if ($fname[0]=='_') {
					if ($less_map!='no')
						$utils[] = $file;
					else
						$utils .= tennisclub_fgc($file);
					$list[$k] = '';
					$tmp = filemtime($file);
					if ($utils_time < $tmp) $utils_time = $tmp;
				}
			}
		}
		
		// Compile all .less files
		if (is_array($list) && count($list) > 0) {
			$success = trx_utils_less_compiler($list, array(
				'compiler' => $less_compiler,
				'map' => $less_map,
				'parse_files' => !$less_split,
				'utils' => $utils,
				'utils_time' => $utils_time,
				'vars' => $vars,
				'import' => array(tennisclub_get_folder_dir('css')),
				'separator' => $less_sep,
				'check_time' => tennisclub_storage_get('less_check_time')==true,
				'compressed' => tennisclub_get_theme_option('debug_mode')=='no'
				)
			);
		}
		
		return $success;
	}
}
?>