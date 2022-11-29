<?php
/**
 * Single post
 */
get_header(); 

$single_style = tennisclub_storage_get('single_style');
if (empty($single_style)) $single_style = tennisclub_get_custom_option('single_style');

while ( have_posts() ) { the_post();
	tennisclub_show_post_layout(
		array(
			'layout' => $single_style,
			'sidebar' => !tennisclub_param_is_off(tennisclub_get_custom_option('show_sidebar_main')),
			'content' => tennisclub_get_template_property($single_style, 'need_content'),
			'terms_list' => tennisclub_get_template_property($single_style, 'need_terms')
		)
	);
}

get_footer();
?>