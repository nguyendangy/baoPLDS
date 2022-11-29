<?php
/**
 * TennisClub Framework: Testimonial support
 *
 * @package	tennisclub
 * @since	tennisclub 1.0
 */

// Theme init
if (!function_exists('tennisclub_testimonial_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_testimonial_theme_setup', 1 );
	function tennisclub_testimonial_theme_setup() {
	
		// Add item in the admin menu
		add_action('trx_utils_filter_override_options',		'tennisclub_testimonial_add_override_options');

		// Save data from override options
		add_action('save_post',				'tennisclub_testimonial_save_data');

		// Meta box fields
		tennisclub_storage_set('testimonial_override_options', array(
			'id' => 'testimonial-override-options',
			'title' => esc_html__('Testimonial Details', 'tennisclub'),
			'page' => 'testimonial',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				"testimonial_author" => array(
					"title" => esc_html__('Testimonial author',  'tennisclub'),
					"desc" => wp_kses_data( __("Name of the testimonial's author", 'tennisclub') ),
					"class" => "testimonial_author",
					"std" => "",
					"type" => "text"),
				"testimonial_position" => array(
					"title" => esc_html__("Author's position",  'tennisclub'),
					"desc" => wp_kses_data( __("Position of the testimonial's author", 'tennisclub') ),
					"class" => "testimonial_author",
					"std" => "",
					"type" => "text"),
				"testimonial_email" => array(
					"title" => esc_html__("Author's e-mail",  'tennisclub'),
					"desc" => wp_kses_data( __("E-mail of the testimonial's author - need to take Gravatar (if registered)", 'tennisclub') ),
					"class" => "testimonial_email",
					"std" => "",
					"type" => "text"),
				"testimonial_link" => array(
					"title" => esc_html__('Testimonial link',  'tennisclub'),
					"desc" => wp_kses_data( __("URL of the testimonial source or author profile page", 'tennisclub') ),
					"class" => "testimonial_link",
					"std" => "",
					"type" => "text")
				)
			)
		);
		
		// Add supported data types
		tennisclub_theme_support_pt('testimonial');
		tennisclub_theme_support_tx('testimonial_group');
		
	}
}


// Add override options
if (!function_exists('tennisclub_testimonial_add_override_options')) {
    
    function tennisclub_testimonial_add_override_options($boxes = array()) {
        $boxes[] = array_merge(tennisclub_storage_get('testimonial_override_options'), array('callback' => 'tennisclub_testimonial_show_override_options'));
        return $boxes;
    }
}

// Callback function to show fields in override options
if (!function_exists('tennisclub_testimonial_show_override_options')) {
	function tennisclub_testimonial_show_override_options() {
		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="override_options_testimonial_nonce" value="'.esc_attr(wp_create_nonce(admin_url())).'" />';
		
		$data = get_post_meta($post->ID, tennisclub_storage_get('options_prefix').'_testimonial_data', true);
	
		$fields = tennisclub_storage_get_array('testimonial_override_options', 'fields');
		?>
		<table class="testimonial_area">
		<?php
		if (is_array($fields) && count($fields) > 0) {
			foreach ($fields as $id=>$field) { 
				$meta = isset($data[$id]) ? $data[$id] : '';
				?>
				<tr class="testimonial_field <?php echo esc_attr($field['class']); ?>" valign="top">
					<td><label for="<?php echo esc_attr($id); ?>"><?php echo esc_attr($field['title']); ?></label></td>
					<td><input type="text" name="<?php echo esc_attr($id); ?>" id="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($meta); ?>" size="30" />
						<br><small><?php echo esc_attr($field['desc']); ?></small></td>
				</tr>
				<?php
			}
		}
		?>
		</table>
		<?php
	}
}


// Save data from override options
if (!function_exists('tennisclub_testimonial_save_data')) {
	
	function tennisclub_testimonial_save_data($post_id) {
		// verify nonce
		if ( !wp_verify_nonce( tennisclub_get_value_gp('override_options_testimonial_nonce'), admin_url() ) )
			return $post_id;

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ($_POST['post_type']!='testimonial' || !current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		$data = array();

		$fields = tennisclub_storage_get_array('testimonial_override_options', 'fields');

		// Post type specific data handling
		if (is_array($fields) && count($fields) > 0) {
			foreach ($fields as $id=>$field) { 
				if (isset($_POST[$id])) 
					$data[$id] = stripslashes($_POST[$id]);
			}
		}

		update_post_meta($post_id, tennisclub_storage_get('options_prefix').'_testimonial_data', $data);
	}
}

?>