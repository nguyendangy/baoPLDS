<?php
/**
 * TennisClub Framework: theme variables storage
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('tennisclub_storage_get')) {
	function tennisclub_storage_get($var_name, $default='') {
		global $TENNISCLUB_STORAGE;
		return isset($TENNISCLUB_STORAGE[$var_name]) ? $TENNISCLUB_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('tennisclub_storage_set')) {
	function tennisclub_storage_set($var_name, $value) {
		global $TENNISCLUB_STORAGE;
		$TENNISCLUB_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('tennisclub_storage_empty')) {
	function tennisclub_storage_empty($var_name, $key='', $key2='') {
		global $TENNISCLUB_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($TENNISCLUB_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($TENNISCLUB_STORAGE[$var_name][$key]);
		else
			return empty($TENNISCLUB_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('tennisclub_storage_isset')) {
	function tennisclub_storage_isset($var_name, $key='', $key2='') {
		global $TENNISCLUB_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($TENNISCLUB_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($TENNISCLUB_STORAGE[$var_name][$key]);
		else
			return isset($TENNISCLUB_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('tennisclub_storage_inc')) {
	function tennisclub_storage_inc($var_name, $value=1) {
		global $TENNISCLUB_STORAGE;
		if (empty($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = 0;
		$TENNISCLUB_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('tennisclub_storage_concat')) {
	function tennisclub_storage_concat($var_name, $value) {
		global $TENNISCLUB_STORAGE;
		if (empty($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = '';
		$TENNISCLUB_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('tennisclub_storage_get_array')) {
	function tennisclub_storage_get_array($var_name, $key, $key2='', $default='') {
		global $TENNISCLUB_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($TENNISCLUB_STORAGE[$var_name][$key]) ? $TENNISCLUB_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($TENNISCLUB_STORAGE[$var_name][$key][$key2]) ? $TENNISCLUB_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('tennisclub_storage_set_array')) {
	function tennisclub_storage_set_array($var_name, $key, $value) {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if ($key==='')
			$TENNISCLUB_STORAGE[$var_name][] = $value;
		else
			$TENNISCLUB_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('tennisclub_storage_set_array2')) {
	function tennisclub_storage_set_array2($var_name, $key, $key2, $value) {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if (!isset($TENNISCLUB_STORAGE[$var_name][$key])) $TENNISCLUB_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$TENNISCLUB_STORAGE[$var_name][$key][] = $value;
		else
			$TENNISCLUB_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Add array element after the key
if (!function_exists('tennisclub_storage_set_array_after')) {
	function tennisclub_storage_set_array_after($var_name, $after, $key, $value='') {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if (is_array($key))
			tennisclub_array_insert_after($TENNISCLUB_STORAGE[$var_name], $after, $key);
		else
			tennisclub_array_insert_after($TENNISCLUB_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('tennisclub_storage_set_array_before')) {
	function tennisclub_storage_set_array_before($var_name, $before, $key, $value='') {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if (is_array($key))
			tennisclub_array_insert_before($TENNISCLUB_STORAGE[$var_name], $before, $key);
		else
			tennisclub_array_insert_before($TENNISCLUB_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('tennisclub_storage_push_array')) {
	function tennisclub_storage_push_array($var_name, $key, $value) {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($TENNISCLUB_STORAGE[$var_name], $value);
		else {
			if (!isset($TENNISCLUB_STORAGE[$var_name][$key])) $TENNISCLUB_STORAGE[$var_name][$key] = array();
			array_push($TENNISCLUB_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('tennisclub_storage_pop_array')) {
	function tennisclub_storage_pop_array($var_name, $key='', $defa='') {
		global $TENNISCLUB_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($TENNISCLUB_STORAGE[$var_name]) && is_array($TENNISCLUB_STORAGE[$var_name]) && count($TENNISCLUB_STORAGE[$var_name]) > 0) 
				$rez = array_pop($TENNISCLUB_STORAGE[$var_name]);
		} else {
			if (isset($TENNISCLUB_STORAGE[$var_name][$key]) && is_array($TENNISCLUB_STORAGE[$var_name][$key]) && count($TENNISCLUB_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($TENNISCLUB_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('tennisclub_storage_inc_array')) {
	function tennisclub_storage_inc_array($var_name, $key, $value=1) {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if (empty($TENNISCLUB_STORAGE[$var_name][$key])) $TENNISCLUB_STORAGE[$var_name][$key] = 0;
		$TENNISCLUB_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('tennisclub_storage_concat_array')) {
	function tennisclub_storage_concat_array($var_name, $key, $value) {
		global $TENNISCLUB_STORAGE;
		if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
		if (empty($TENNISCLUB_STORAGE[$var_name][$key])) $TENNISCLUB_STORAGE[$var_name][$key] = '';
		$TENNISCLUB_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('tennisclub_storage_call_obj_method')) {
	function tennisclub_storage_call_obj_method($var_name, $method, $param=null) {
		global $TENNISCLUB_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($TENNISCLUB_STORAGE[$var_name]) ? $TENNISCLUB_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($TENNISCLUB_STORAGE[$var_name]) ? $TENNISCLUB_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('tennisclub_storage_get_obj_property')) {
	function tennisclub_storage_get_obj_property($var_name, $prop, $default='') {
		global $TENNISCLUB_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($TENNISCLUB_STORAGE[$var_name]->$prop) ? $TENNISCLUB_STORAGE[$var_name]->$prop : $default;
	}
}

// Merge two-dim array element
if (!function_exists('tennisclub_storage_merge_array')) {
    function tennisclub_storage_merge_array($var_name, $key, $arr) {
        global $TENNISCLUB_STORAGE;
        if (!isset($TENNISCLUB_STORAGE[$var_name])) $TENNISCLUB_STORAGE[$var_name] = array();
        if (!isset($TENNISCLUB_STORAGE[$var_name][$key])) $TENNISCLUB_STORAGE[$var_name][$key] = array();
        $TENNISCLUB_STORAGE[$var_name][$key] = array_merge($TENNISCLUB_STORAGE[$var_name][$key], $arr);
    }
}
?>