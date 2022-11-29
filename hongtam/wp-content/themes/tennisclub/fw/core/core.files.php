<?php
/**
 * TennisClub Framework: file system manipulations, styles and scripts usage, etc.
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* File names manipulations
------------------------------------------------------------------------------------- */

// Return path to directory with uploaded images
if (!function_exists('tennisclub_get_uploads_dir_from_url')) {	
	function tennisclub_get_uploads_dir_from_url($url) {
		$upload_info = wp_upload_dir();
		$upload_dir = $upload_info['basedir'];
		$upload_url = $upload_info['baseurl'];
		
		$http_prefix = "http://";
		$https_prefix = "https://";
		
		if (!strncmp($url, $https_prefix, tennisclub_strlen($https_prefix)))			//if url begins with https:// make $upload_url begin with https:// as well
			$upload_url = str_replace($http_prefix, $https_prefix, $upload_url);
		else if (!strncmp($url, $http_prefix, tennisclub_strlen($http_prefix)))		//if url begins with http:// make $upload_url begin with http:// as well
			$upload_url = str_replace($https_prefix, $http_prefix, $upload_url);		
	
		// Check if $img_url is local.
		if ( false === tennisclub_strpos( $url, $upload_url ) ) return false;
	
		// Define path of image.
		$rel_path = str_replace( $upload_url, '', $url );
		$img_path = ($upload_dir) . ($rel_path);
		
		return $img_path;
	}
}

// Replace uploads url to current site uploads url
if (!function_exists('tennisclub_replace_uploads_url')) {	
	function tennisclub_replace_uploads_url($str, $uploads_folder='uploads') {
		static $uploads_url = '', $uploads_len = 0;
		if (is_array($str) && count($str) > 0) {
			foreach ($str as $k=>$v) {
				$str[$k] = tennisclub_replace_uploads_url($v, $uploads_folder);
			}
		} else if (is_string($str)) {
			if (empty($uploads_url)) {
				$uploads_info = wp_upload_dir();
				$uploads_url = $uploads_info['baseurl'];
				$uploads_len = tennisclub_strlen($uploads_url);
			}
			$break = '\'" ';
			$pos = 0;
			while (($pos = tennisclub_strpos($str, "/{$uploads_folder}/", $pos))!==false) {
				$pos0 = $pos;
				$chg = true;
				while ($pos0) {
					if (tennisclub_strpos($break, tennisclub_substr($str, $pos0, 1))!==false) {
						$chg = false;
						break;
					}
					if (tennisclub_substr($str, $pos0, 5)=='http:' || tennisclub_substr($str, $pos0, 6)=='https:')
						break;
					$pos0--;
				}
				if ($chg) {
					$str = ($pos0 > 0 ? tennisclub_substr($str, 0, $pos0) : '') . ($uploads_url) . tennisclub_substr($str, $pos+tennisclub_strlen($uploads_folder)+1);
					$pos = $pos0 + $uploads_len;
				} else 
					$pos++;
			}
		}
		return $str;
	}
}

// Replace site url to current site url
if (!function_exists('tennisclub_replace_site_url')) {	
	function tennisclub_replace_site_url($str, $old_url) {
		static $site_url = '', $site_len = 0;
		if (is_array($str) && count($str) > 0) {
			foreach ($str as $k=>$v) {
				$str[$k] = tennisclub_replace_site_url($v, $old_url);
			}
		} else if (is_string($str)) {
			if (empty($site_url)) {
				$site_url = get_site_url();
				$site_len = tennisclub_strlen($site_url);
				if (tennisclub_substr($site_url, -1)=='/') {
					$site_len--;
					$site_url = tennisclub_substr($site_url, 0, $site_len);
				}
			}
			if (tennisclub_substr($old_url, -1)=='/') $old_url = tennisclub_substr($old_url, 0, tennisclub_strlen($old_url)-1);
			$break = '\'" ';
			$pos = 0;
			while (($pos = tennisclub_strpos($str, $old_url, $pos))!==false) {
				$str = tennisclub_unserialize($str);
				if (is_array($str) && count($str) > 0) {
					foreach ($str as $k=>$v) {
						$str[$k] = tennisclub_replace_site_url($v, $old_url);
					}
					$str = serialize($str);
					break;
				} else {
					$pos0 = $pos;
					$chg = true;
					while ($pos0 >= 0) {
						if (tennisclub_strpos($break, tennisclub_substr($str, $pos0, 1))!==false) {
							$chg = false;
							break;
						}
						if (tennisclub_substr($str, $pos0, 5)=='http:' || tennisclub_substr($str, $pos0, 6)=='https:')
							break;
						$pos0--;
					}
					if ($chg && $pos0>=0) {
						$str = ($pos0 > 0 ? tennisclub_substr($str, 0, $pos0) : '') . ($site_url) . tennisclub_substr($str, $pos+tennisclub_strlen($old_url));
						$pos = $pos0 + $site_len;
					} else 
						$pos++;
				}
			}
		}
		return $str;
	}
}

// Get domain part from URL
if (!function_exists('tennisclub_get_domain_from_url')) {
	function tennisclub_get_domain_from_url($url) {
		if (($pos=strpos($url, '://'))!==false) $url = substr($url, $pos+3);
		if (($pos=strpos($url, '/'))!==false) $url = substr($url, 0, $pos);
		return $url;
	}
}

// Return file extension from full name/path
if (!function_exists('tennisclub_get_file_ext')) {	
	function tennisclub_get_file_ext($file) {
		$parts = pathinfo($file);
		return $parts['extension'];
	}
}



/* File system utils
------------------------------------------------------------------------------------- */

// Init WP Filesystem
if (!function_exists('tennisclub_init_filesystem')) {
	add_action( 'after_setup_theme', 'tennisclub_init_filesystem', 0);
	function tennisclub_init_filesystem() {
        if( !function_exists('WP_Filesystem') ) {
            require_once( ABSPATH .'/wp-admin/includes/file.php' );
        }
		if (is_admin()) {
			$url = admin_url();
			$creds = false;
			// First attempt to get credentials.
			if ( function_exists('request_filesystem_credentials') && false === ( $creds = request_filesystem_credentials( $url, '', false, false, array() ) ) ) {
				// If we comes here - we don't have credentials
				// so the request for them is displaying no need for further processing
				return false;
			}
	
			// Now we got some credentials - try to use them.
			if ( !WP_Filesystem( $creds ) ) {
				// Incorrect connection data - ask for credentials again, now with error message.
				if ( function_exists('request_filesystem_credentials') ) request_filesystem_credentials( $url, '', true, false );
				return false;
			}
			
			return true; // Filesystem object successfully initiated.
		} else {
            WP_Filesystem();
		}
		return true;
	}
}


// Put data into specified file
if (!function_exists('tennisclub_fpc')) {	
	function tennisclub_fpc($file, $data, $flag=0) {
		global $wp_filesystem;
		if (!empty($file)) {
			if (isset($wp_filesystem) && is_object($wp_filesystem)) {
				$file = str_replace(ABSPATH, $wp_filesystem->abspath(), $file);
				// Attention! WP_Filesystem can't append the content to the file!
				// That's why we have to read the contents of the file into a string,
				// add new content to this string and re-write it to the file if parameter $flag == FILE_APPEND!
				return $wp_filesystem->put_contents($file, ($flag==FILE_APPEND ? $wp_filesystem->get_contents($file) : '') . $data, false);
			} else {
				if (tennisclub_param_is_on(tennisclub_get_theme_option('debug_mode')))
					throw new Exception(sprintf(esc_html__('WP Filesystem is not initialized! Put contents to the file "%s" failed', 'tennisclub'), $file));
			}
		}
		return false;
	}
}

// Get text from specified file
if (!function_exists('tennisclub_fgc')) {
    function tennisclub_fgc($file) {
        global $wp_filesystem;
        if (!empty($file)) {
            if (isset($wp_filesystem) && is_object($wp_filesystem)) {
                $file = str_replace(ABSPATH, $wp_filesystem->abspath(), $file);
                return $wp_filesystem->get_contents($file);
            } else {
                if (tennisclub_param_is_on(tennisclub_get_theme_option('debug_mode')))
                    throw new Exception(sprintf(esc_html__('WP Filesystem is not initialized! Get contents from the file "%s" failed', 'tennisclub'), $file));
            }
        }
        return '';
    }
}

// Get text from specified file via HTTP
if (!function_exists('tennisclub_remote_get')) {    
    function tennisclub_remote_get($file, $timeout=-1) {
        // Set timeout as half of the PHP execution time
        if ($timeout < 1) $timeout = round( 0.5 * max(30, ini_get('max_execution_time')));
        $response = wp_remote_get($file, array(
                                    'timeout'     => $timeout
                                    )
                                );
        
        return isset($response['response']['code']) && $response['response']['code']==200 ? $response['body'] : '';
    }
}

// Get array with rows from specified file
if (!function_exists('tennisclub_fga')) {	
	function tennisclub_fga($file) {
		global $wp_filesystem;
		if (!empty($file)) {
			if (isset($wp_filesystem) && is_object($wp_filesystem)) {
				$file = str_replace(ABSPATH, $wp_filesystem->abspath(), $file);
				return $wp_filesystem->get_contents_array($file);
			} else {
				if (tennisclub_param_is_on(tennisclub_get_theme_option('debug_mode')))
					throw new Exception(sprintf(esc_html__('WP Filesystem is not initialized! Get rows from the file "%s" failed', 'tennisclub'), $file));
			}
		}
		return array();
	}
}


/* Check if file/folder present in the child theme and return path (url) to it. 
   Else - path (url) to file in the main theme dir
------------------------------------------------------------------------------------- */

// Detect file location with next algorithm:
// 1) check in the child theme folder
// 2) check in the framework folder in the child theme folder
// 3) check in the main theme folder
// 4) check in the framework folder in the main theme folder

if (!function_exists('tennisclub_get_file_dir')) {
    function tennisclub_get_file_dir($file, $return_url=false, $from_skin=true) {
        static $skin_dir = '';
        if ($file[0]=='/') $file = tennisclub_substr($file, 1);

        if ($from_skin && empty($skin_dir) && function_exists('tennisclub_get_custom_option')) {
            $skin_dir = sanitize_file_name(tennisclub_get_custom_option('theme_skin'));
            if ($skin_dir) $skin_dir = 'skins/' . ($skin_dir);
        }

    // Use new WordPress functions (if present)
        if ( function_exists('get_theme_file_path') ) {
            if ($from_skin && !empty($skin_dir) ) {
                $skin_file = $skin_dir . '/'. $file;
                $skin_dir1 = get_theme_file_path($skin_file);
            }
            $dir = get_theme_file_path($file);

            if ( $from_skin && !empty($skin_dir1) && file_exists($skin_dir1) ) {
                $dir = ($return_url ? get_theme_file_uri($skin_file) : $skin_dir1);
            } else if (file_exists($dir) ) {
                $dir = ($return_url ? get_theme_file_uri($file) : $dir);
            } else {
                $file = TENNISCLUB_FW_DIR . '/' . $file;
                $dir = get_theme_file_path($file);
                $dir = ($return_url ? get_theme_file_uri($file) : $dir);
            }

    // Otherwise (on WordPress older then 4.7.0)
        } else {
            $theme_dir = get_template_directory();
            $theme_url = get_template_directory_uri();
            $child_dir = get_stylesheet_directory();
            $child_url = get_stylesheet_directory_uri();
            $dir = '';
            if ($from_skin && !empty($skin_dir) && file_exists(($child_dir).'/'.($skin_dir).'/'.($file)))
                $dir = ($return_url ? $child_url : $child_dir).'/'.($skin_dir).'/'.($file);
            else if (file_exists(($child_dir).'/'.($file)))
                $dir = ($return_url ? $child_url : $child_dir).'/'.($file);
            else if (file_exists(($child_dir).(TENNISCLUB_FW_DIR).($file)))
                $dir = ($return_url ? $child_url : $child_dir).(TENNISCLUB_FW_DIR).($file);
            else if ($from_skin && !empty($skin_dir) && file_exists(($theme_dir).'/'.($skin_dir).'/'.($file)))
                $dir = ($return_url ? $theme_url : $theme_dir).'/'.($skin_dir).'/'.($file);
            else if (file_exists(($theme_dir).'/'.($file)))
                $dir = ($return_url ? $theme_url : $theme_dir).'/'.($file);
            else if (file_exists(($theme_dir).(TENNISCLUB_FW_DIR).($file)))
                $dir = ($return_url ? $theme_url : $theme_dir).(TENNISCLUB_FW_DIR).($file);
        }

        return $dir;
    }
}

// Detect file location with next algorithm:
// 1) check in the main theme folder
// 2) check in the framework folder in the main theme folder
// and return file slug (relative path to the file without extension)
// to use it in the get_template_part()
if (!function_exists('tennisclub_get_file_slug')) {	
	function tennisclub_get_file_slug($file, $from_skin=true) {
		static $skin_dir = '';
		if ($file[0]=='/') $file = tennisclub_substr($file, 1);
		if ($from_skin && empty($skin_dir) && function_exists('tennisclub_get_custom_option')) {
			$skin_dir = sanitize_file_name(tennisclub_get_custom_option('theme_skin'));
			if ($skin_dir) $skin_dir  = 'skins/' . ($skin_dir);
		}
		$theme_dir = get_template_directory();
		$dir = '';
		if ($from_skin && !empty($skin_dir) && file_exists(($theme_dir).'/'.($skin_dir).'/'.($file)))
			$dir = ($skin_dir).'/'.($file);
		else if (file_exists(($theme_dir).'/'.($file)))
			$dir = $file;
		else if (file_exists(($theme_dir).'/'.TENNISCLUB_FW_DIR.'/'.($file)))
			$dir = TENNISCLUB_FW_DIR.'/'.($file);
		if (tennisclub_substr($dir, -4)=='.php') $dir = tennisclub_substr($dir, 0, tennisclub_strlen($dir)-4);
		return $dir;
	}
}

if (!function_exists('tennisclub_get_file_url')) {	
	function tennisclub_get_file_url($file) {
		return tennisclub_get_file_dir($file, true);
	}
}

// Detect file location in the skin/theme/framework folders
if (!function_exists('tennisclub_get_skin_file_dir')) {	
	function tennisclub_get_skin_file_dir($file) {
		return tennisclub_get_file_dir($file, false, true);
	}
}

// Detect file location in the skin/theme/framework folders
if (!function_exists('tennisclub_get_skin_file_slug')) {	
	function tennisclub_get_skin_file_slug($file) {
		return tennisclub_get_file_slug($file, true);
	}
}

if (!function_exists('tennisclub_get_skin_file_url')) {	
	function tennisclub_get_skin_file_url($file) {
		return tennisclub_get_skin_file_dir($file, true, true);
	}
}

// Detect folder location with same algorithm as file (see above)
if (!function_exists('tennisclub_get_folder_dir')) {	
	function tennisclub_get_folder_dir($folder, $return_url=false, $from_skin=false) {
		static $skin_dir = '';
		if ($folder[0]=='/') $folder = tennisclub_substr($folder, 1);
		if ($from_skin && empty($skin_dir) && function_exists('tennisclub_get_custom_option')) {
			$skin_dir = sanitize_file_name(tennisclub_get_custom_option('theme_skin'));
			if ($skin_dir) $skin_dir  = 'skins/'.($skin_dir);
		}
		$theme_dir = get_template_directory();
		$theme_url = get_template_directory_uri();
		$child_dir = get_stylesheet_directory();
		$child_url = get_stylesheet_directory_uri();
		$dir = '';
		if (!empty($skin_dir) && file_exists(($child_dir).'/'.($skin_dir).'/'.($folder)))
			$dir = ($return_url ? $child_url : $child_dir).'/'.($skin_dir).'/'.($folder);
		else if (is_dir(($child_dir).'/'.($folder)))
			$dir = ($return_url ? $child_url : $child_dir).'/'.($folder);
		else if (is_dir(($child_dir).'/'.(TENNISCLUB_FW_DIR).'/'.($folder)))
			$dir = ($return_url ? $child_url : $child_dir).'/'.(TENNISCLUB_FW_DIR).'/'.($folder);
		else if (!empty($skin_dir) && file_exists(($theme_dir).'/'.($skin_dir).'/'.($folder)))
			$dir = ($return_url ? $theme_url : $theme_dir).'/'.($skin_dir).'/'.($folder);
		else if (file_exists(($theme_dir).'/'.($folder)))
			$dir = ($return_url ? $theme_url : $theme_dir).'/'.($folder);
		else if (file_exists(($theme_dir).'/'.(TENNISCLUB_FW_DIR).'/'.($folder)))
			$dir = ($return_url ? $theme_url : $theme_dir).'/'.(TENNISCLUB_FW_DIR).'/'.($folder);
		return $dir;
	}
}

if (!function_exists('tennisclub_get_folder_url')) {	
	function tennisclub_get_folder_url($folder) {
		return tennisclub_get_folder_dir($folder, true);
	}
}

// Return path to social icon (if exists)
if (!function_exists('tennisclub_get_socials_dir')) {	
	function tennisclub_get_socials_dir($soc, $return_url=false) {
		return tennisclub_get_file_dir('images/socials/' . sanitize_file_name($soc) . (tennisclub_strpos($soc, '.')===false ? '.png' : ''), $return_url, true);
	}
}

if (!function_exists('tennisclub_get_socials_url')) {	
	function tennisclub_get_socials_url($soc) {
		return tennisclub_get_socials_dir($soc, true);
	}
}

// Detect theme version of the template (if exists), else return it from fw templates directory
if (!function_exists('tennisclub_get_template_dir')) {	
	function tennisclub_get_template_dir($tpl) {
		return tennisclub_get_file_dir('templates/' . sanitize_file_name($tpl) . (tennisclub_strpos($tpl, '.php')===false ? '.php' : ''));
	}
}
?>