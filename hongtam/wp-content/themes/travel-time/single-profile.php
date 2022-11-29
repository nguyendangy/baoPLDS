<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.2.3
 * 
 * Single Profile Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = travel_time_get_global_options();


$cmsmasters_profile_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_profile_sharing_box', true);


echo '<!-- Start Content -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="profiles opened-article">' . "\n";
	
	
	get_template_part('framework/post-type/profile/post/standard');
	
	
	if ($cmsmasters_profile_sharing_box == 'true') {
		travel_time_sharing_box(esc_html__('Like this profile?', 'travel-time'), 'h4');
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content -->' . "\n\n";


get_footer();

