<?php
/**
 * TennisClub Framework: strings manipulations
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Check multibyte functions
if ( ! defined( 'TENNISCLUB_MULTIBYTE' ) ) define( 'TENNISCLUB_MULTIBYTE', function_exists('mb_strpos') ? 'UTF-8' : false );

if (!function_exists('tennisclub_strlen')) {
	function tennisclub_strlen($text) {
		return TENNISCLUB_MULTIBYTE ? mb_strlen($text) : strlen($text);
	}
}

if (!function_exists('tennisclub_strpos')) {
	function tennisclub_strpos($text, $char, $from=0) {
		return TENNISCLUB_MULTIBYTE ? mb_strpos($text, $char, $from) : strpos($text, $char, $from);
	}
}

if (!function_exists('tennisclub_strrpos')) {
	function tennisclub_strrpos($text, $char, $from=0) {
		return TENNISCLUB_MULTIBYTE ? mb_strrpos($text, $char, $from) : strrpos($text, $char, $from);
	}
}

if (!function_exists('tennisclub_substr')) {
	function tennisclub_substr($text, $from, $len=-999999) {
		if ($len==-999999) { 
			if ($from < 0)
				$len = -$from; 
			else
				$len = tennisclub_strlen($text)-$from;
		}
		return TENNISCLUB_MULTIBYTE ? mb_substr($text, $from, $len) : substr($text, $from, $len);
	}
}

if (!function_exists('tennisclub_strtolower')) {
	function tennisclub_strtolower($text) {
		return TENNISCLUB_MULTIBYTE ? mb_strtolower($text) : strtolower($text);
	}
}

if (!function_exists('tennisclub_strtoupper')) {
	function tennisclub_strtoupper($text) {
		return TENNISCLUB_MULTIBYTE ? mb_strtoupper($text) : strtoupper($text);
	}
}

if (!function_exists('tennisclub_strtoproper')) {
	function tennisclub_strtoproper($text) { 
		$rez = ''; $last = ' ';
		for ($i=0; $i<tennisclub_strlen($text); $i++) {
			$ch = tennisclub_substr($text, $i, 1);
			$rez .= tennisclub_strpos(' .,:;?!()[]{}+=', $last)!==false ? tennisclub_strtoupper($ch) : tennisclub_strtolower($ch);
			$last = $ch;
		}
		return $rez;
	}
}

if (!function_exists('tennisclub_strrepeat')) {
	function tennisclub_strrepeat($str, $n) {
		$rez = '';
		for ($i=0; $i<$n; $i++)
			$rez .= $str;
		return $rez;
	}
}

if (!function_exists('tennisclub_strshort')) {
	function tennisclub_strshort($str, $maxlength, $add='...') {
		if ($maxlength < 0) 
			return $str;
		if ($maxlength == 0) 
			return '';
		if ($maxlength >= tennisclub_strlen($str)) 
			return strip_tags($str);
		$str = tennisclub_substr(strip_tags($str), 0, $maxlength - tennisclub_strlen($add));
		$ch = tennisclub_substr($str, $maxlength - tennisclub_strlen($add), 1);
		if ($ch != ' ') {
			for ($i = tennisclub_strlen($str) - 1; $i > 0; $i--)
				if (tennisclub_substr($str, $i, 1) == ' ') break;
			$str = trim(tennisclub_substr($str, 0, $i));
		}
		if (!empty($str) && tennisclub_strpos(',.:;-', tennisclub_substr($str, -1))!==false) $str = tennisclub_substr($str, 0, -1);
		return ($str) . ($add);
	}
}

// Clear string from spaces, line breaks and tags (only around text)
if (!function_exists('tennisclub_strclear')) {
	function tennisclub_strclear($text, $tags=array()) {
		if (empty($text)) return $text;
		if (!is_array($tags)) {
			if ($tags != '')
				$tags = explode($tags, ',');
			else
				$tags = array();
		}
		$text = trim(chop($text));
		if (is_array($tags) && count($tags) > 0) {
			foreach ($tags as $tag) {
				$open  = '<'.esc_attr($tag);
				$close = '</'.esc_attr($tag).'>';
				if (tennisclub_substr($text, 0, tennisclub_strlen($open))==$open) {
					$pos = tennisclub_strpos($text, '>');
					if ($pos!==false) $text = tennisclub_substr($text, $pos+1);
				}
				if (tennisclub_substr($text, -tennisclub_strlen($close))==$close) $text = tennisclub_substr($text, 0, tennisclub_strlen($text) - tennisclub_strlen($close));
				$text = trim(chop($text));
			}
		}
		return $text;
	}
}

// Return slug for the any title string
if (!function_exists('tennisclub_get_slug')) {
	function tennisclub_get_slug($title) {
		return tennisclub_strtolower(str_replace(array('\\','/','-',' ','.'), '_', $title));
	}
}

// Replace macros in the string
if (!function_exists('tennisclub_strmacros')) {
	function tennisclub_strmacros($str) {
		return str_replace(array("{{", "}}", "((", "))", "||"), array("<i>", "</i>", "<b>", "</b>", "<br>"), $str);
	}
}

// Unserialize string (try replace \n with \r\n)
if (!function_exists('tennisclub_unserialize')) {
    function tennisclub_unserialize($str) {
        if ( ! empty( $str ) && is_serialized( $str ) ) {
            try {
                $data = unserialize( $str );
            } catch ( Exception $e ) {
                dcl( $e->getMessage() );
                $data = false;
            }
            if ( false === $data ) {
                try {
                    $str  = preg_replace_callback(
                        '!s:(\d+):"(.*?)";!',
                        function( $match ) {
                            return ( strlen( $match[2] ) == $match[1] )
                                ? $match[0]
                                : 's:' . strlen( $match[2] ) . ':"' . $match[2] . '";';
                        },
                        $str
                    );
                    $data = unserialize( $str );
                } catch ( Exception $e ) {
                    dcl( $e->getMessage() );
                    $data = false;
                }
            }
            return $data;
        } else {
            return $str;
        }
    }
}
?>