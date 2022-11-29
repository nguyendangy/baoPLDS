<?php
/**
 * TennisClub Framework: messages subsystem
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Theme init
if (!function_exists('tennisclub_messages_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_messages_theme_setup' );
	function tennisclub_messages_theme_setup() {
		// Core messages strings
		add_filter('tennisclub_action_add_scripts_inline', 'tennisclub_messages_add_scripts_inline');
	}
}


/* Session messages
------------------------------------------------------------------------------------- */

if (!function_exists('tennisclub_get_error_msg')) {
	function tennisclub_get_error_msg() {
		return tennisclub_storage_get('error_msg');
	}
}

if (!function_exists('tennisclub_set_error_msg')) {
	function tennisclub_set_error_msg($msg) {
		$msg2 = tennisclub_get_error_msg();
		tennisclub_storage_set('error_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}

if (!function_exists('tennisclub_get_success_msg')) {
	function tennisclub_get_success_msg() {
		return tennisclub_storage_get('success_msg');
	}
}

if (!function_exists('tennisclub_set_success_msg')) {
	function tennisclub_set_success_msg($msg) {
		$msg2 = tennisclub_get_success_msg();
		tennisclub_storage_set('success_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}

if (!function_exists('tennisclub_get_notice_msg')) {
	function tennisclub_get_notice_msg() {
		return tennisclub_storage_get('notice_msg');
	}
}

if (!function_exists('tennisclub_set_notice_msg')) {
	function tennisclub_set_notice_msg($msg) {
		$msg2 = tennisclub_get_notice_msg();
		tennisclub_storage_set('notice_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}


/* System messages (save when page reload)
------------------------------------------------------------------------------------- */
if (!function_exists('tennisclub_set_system_message')) {
	function tennisclub_set_system_message($msg, $status='info', $hdr='') {
		update_option(tennisclub_storage_get('options_prefix') . '_message', array('message' => $msg, 'status' => $status, 'header' => $hdr));
	}
}

if (!function_exists('tennisclub_get_system_message')) {
	function tennisclub_get_system_message($del=false) {
		$msg = get_option(tennisclub_storage_get('options_prefix') . '_message', false);
		if (!$msg)
			$msg = array('message' => '', 'status' => '', 'header' => '');
		else if ($del)
			tennisclub_del_system_message();
		return $msg;
	}
}

if (!function_exists('tennisclub_del_system_message')) {
	function tennisclub_del_system_message() {
		delete_option(tennisclub_storage_get('options_prefix') . '_message');
	}
}


/* Messages strings
------------------------------------------------------------------------------------- */

if (!function_exists('tennisclub_messages_add_scripts_inline')) {
    function tennisclub_messages_add_scripts_inline($vars=array()) {
        // Strings for translation
        $vars["strings"] = array(
            'ajax_error' => esc_html__('Invalid server answer', 'tennisclub'),
            'bookmark_add' => esc_html__('Add the bookmark', 'tennisclub'),
            'bookmark_added' => esc_html__('Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab \'Bookmarks\'', 'tennisclub'),
            'bookmark_del' => esc_html__('Delete this bookmark', 'tennisclub'),
            'bookmark_title' => esc_html__('Enter bookmark title', 'tennisclub'),
            'bookmark_exists' => esc_html__('Current page already exists in the bookmarks list', 'tennisclub'),
            'search_error' => esc_html__('Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.', 'tennisclub'),
            'email_confirm' => esc_html__('On the e-mail address "%s" we sent a confirmation email. Please, open it and click on the link.', 'tennisclub'),
            'reviews_vote' => esc_html__('Thanks for your vote! New average rating is:', 'tennisclub'),
            'reviews_error' => esc_html__('Error saving your vote! Please, try again later.', 'tennisclub'),
            'error_like' => esc_html__('Error saving your like! Please, try again later.', 'tennisclub'),
            'error_global' => esc_html__('Global error text', 'tennisclub'),
            'name_empty' => esc_html__('The name can\'t be empty', 'tennisclub'),
            'name_long' => esc_html__('Too long name', 'tennisclub'),
            'email_empty' => esc_html__('Too short (or empty) email address', 'tennisclub'),
            'email_long' => esc_html__('Too long email address', 'tennisclub'),
            'email_not_valid' => esc_html__('Invalid email address', 'tennisclub'),
            'subject_empty' => esc_html__('The subject can\'t be empty', 'tennisclub'),
            'subject_long' => esc_html__('Too long subject', 'tennisclub'),
            'text_empty' => esc_html__('The message text can\'t be empty', 'tennisclub'),
            'text_long' => esc_html__('Too long message text', 'tennisclub'),
            'send_complete' => esc_html__("Send message complete!", 'tennisclub'),
            'send_error' => esc_html__('Transmit failed!', 'tennisclub'),
            'login_empty' => esc_html__('The Login field can\'t be empty', 'tennisclub'),
            'login_long' => esc_html__('Too long login field', 'tennisclub'),
            'login_success' => esc_html__('Login success! The page will be reloaded in 3 sec.', 'tennisclub'),
            'login_failed' => esc_html__('Login failed!', 'tennisclub'),
            'password_empty' => esc_html__('The password can\'t be empty and shorter then 4 characters', 'tennisclub'),
            'password_long' => esc_html__('Too long password', 'tennisclub'),
            'password_not_equal' => esc_html__('The passwords in both fields are not equal', 'tennisclub'),
            'registration_success' => esc_html__('Registration success! Please log in!', 'tennisclub'),
            'registration_failed' => esc_html__('Registration failed!', 'tennisclub'),
            'geocode_error' => esc_html__('Geocode was not successful for the following reason:', 'tennisclub'),
            'googlemap_not_avail' => esc_html__('Google map API not available!', 'tennisclub'),
            'editor_save_success' => esc_html__("Post content saved!", 'tennisclub'),
            'editor_save_error' => esc_html__("Error saving post data!", 'tennisclub'),
            'editor_delete_post' => esc_html__("You really want to delete the current post?", 'tennisclub'),
            'editor_delete_post_header' => esc_html__("Delete post", 'tennisclub'),
            'editor_delete_success' => esc_html__("Post deleted!", 'tennisclub'),
            'editor_delete_error' => esc_html__("Error deleting post!", 'tennisclub'),
            'editor_caption_cancel' => esc_html__('Cancel', 'tennisclub'),
            'editor_caption_close' => esc_html__('Close', 'tennisclub')
        );
        return $vars;
    }
}
?>