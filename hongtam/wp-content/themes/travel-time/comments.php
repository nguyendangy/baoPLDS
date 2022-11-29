<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.1.7
 * 
 * Comments Template
 * Created by CMSMasters
 * 
 */





if (post_password_required()) { 
	echo '<p class="nocomments">' . esc_html__('This post is password protected. Enter the password to view comments.', 'travel-time') . '</p>';
	
	
    return;
}


if (comments_open()) {
	if (have_comments()) {
		echo '<aside id="comments" class="post_comments">' . "\n" . 
			'<h4 class="post_comments_title">';
		
		
		comments_number(esc_attr__('No Comments', 'travel-time'), esc_attr__('Comment', 'travel-time'), esc_attr__('Comments', 'travel-time'));
		
		
		echo '</h4>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="comments_nav">';
				
				if (get_previous_comments_link()) {
					echo '<span class="comments_nav_prev cmsmasters_theme_icon_arrow_left">';
						
						previous_comments_link(esc_attr__('Older Comments', 'travel-time'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="comments_nav_next cmsmasters_theme_icon_arrow_right">';
						
						next_comments_link(esc_attr__('Newer Comments', 'travel-time'));
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '<ol class="commentlist">' . "\n";
		
		
		wp_list_comments(array( 
			'type' => 'comment', 
			'callback' => 'mytheme_comment' 
		));
		
		
		echo '</ol>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="comments_nav">';
				
				if (get_previous_comments_link()) {
					echo '<span class="comments_nav_prev cmsmasters_theme_icon_arrow_left">';
						
						previous_comments_link(esc_attr__('Older Comments', 'travel-time'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="comments_nav_next cmsmasters_theme_icon_arrow_right">';
						
						next_comments_link(esc_attr__('Newer Comments', 'travel-time'));
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '</aside>';
	}
	
	
	$form_fields =  array( 
		'author' => '<p class="comment-form-author">' . "\n" . 
			'<label for="author">' . esc_html__('Name:', 'travel-time') . '</label>' . 
			'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_attr__('Your name', 'travel-time') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n", 
		'email' => '<p class="comment-form-email">' . "\n" . 
			'<label for="author">' . esc_html__('Email:', 'travel-time') . '</label>' . 
			'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . esc_attr__('Your email', 'travel-time') . (($req) ? ' *' : '') . '" />' . "\n" . 
		'</p>' . "\n" 
	);
	
	
	if (get_option('show_comments_cookies_opt_in') == '1') {
		$form_fields['cookies'] = '<p class="comment-form-cookies-consent">' . "\n" . 
			'<input type="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' />' . "\n" . 
			'<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'travel-time') . '</label>' . "\n" . 
		'</p>' . "\n";
	}
	
	
	echo "\n\n";
	
	
	add_filter('comment_form_fields', 'travel_time_order_comment_fields' );
	
	function travel_time_order_comment_fields( $fields ){
		$new_fields = array();

		$neworder = array('author','email','comment');

		foreach( $neworder as $key ){
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}

		if( $fields )
			foreach( $fields as $key => $val )
				$new_fields[ $key ] = $val;

		return $new_fields;
	}
	
	comment_form(array( 
		'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
		'comment_field' => 		'<p class="comment-form-comment">' . 
									'<label for="comment">' . esc_html__('Comment:', 'travel-time') . '</label>' . 
									'<textarea name="comment" id="comment" cols="67" rows="2" placeholder="' . esc_attr__('Comment', 'travel-time') . '"></textarea>' . 
								'</p>', 
		'must_log_in' => 		'<p class="must-log-in">' . 
									esc_html__('You must be', 'travel-time') . 
									' <a href="' . esc_url(wp_login_url(apply_filters('the_permalink', get_permalink()))) . '">' 
										. esc_html__('logged in', 'travel-time') . 
									'</a> ' 
									. esc_html__('to post a comment', 'travel-time') . 
								'.</p>' . "\n", 
		'logged_in_as' => 		'<p class="logged-in-as">' . 
									esc_html__('Logged in as', 'travel-time') . 
									' <a href="' . esc_url(admin_url('profile.php')) . '">' . 
										$user_identity . 
									'</a>. ' . 
									'<a class="all" href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '" title="' . esc_attr__('Log out of this account', 'travel-time') . '">' . 
										esc_html__('Log out?', 'travel-time') . 
									'</a>' . 
								'</p>' . "\n", 
		'comment_notes_before' => 	'<p class="comment-notes">' . 
										esc_html__('Your email address will not be published.', 'travel-time') . 
									'</p>' . "\n", 
		'comment_notes_after' => 	'', 
		'id_form' => 				'commentform', 
		'id_submit' => 				'submit', 
		'title_reply' => 			esc_html__('Leave a Reply', 'travel-time'), 
		'title_reply_to' => 		esc_html__('Leave your comment to', 'travel-time'), 
		'cancel_reply_link' => 		esc_html__('Cancel Reply', 'travel-time'), 
		'label_submit' => 			esc_html__('Add Comment', 'travel-time') 
	));
}

