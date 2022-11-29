<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.1.7
 * 
 * Blog Page Masonry Standard Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!-- Start Standard Article -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_puzzle'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
	<?php		
		if (has_post_thumbnail()) {
			$cmsmasters_with_image = " cmsmasters_with_image"; 
		} else {
			$cmsmasters_with_image = " cmsmasters_with_placeholder";
		}
		
		echo '<div class="cmsmasters_post_top_wrap' . $cmsmasters_with_image . '">' . 
			'<div class="entry-meta">';
			
			if ($likes || $comments || $date) {
			
				$date ? travel_time_get_post_date('page', 'masonry') : '';
			
				$comments ? travel_time_get_post_comments('page') : '';
			
				$likes ? travel_time_get_post_likes('page') : '';
				
			}
			
			echo '</div>';
		
			if (!post_password_required() && has_post_thumbnail()) {
				echo '<div class="cmsmasters_date_img_wrap">';
					
					travel_time_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, true, true, true, true, false);
					
				echo '</div>';
			} else {
				
				travel_time_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, true, false, true, true, false, false, true, 'cmsmasters_theme_icon_image');
				
			}

		echo '</div>';


		echo '<div class="puzzle_post_content_wrapper">' . 
			'<div class="cmsmasters_post_cont_wrap">';
		
			travel_time_post_heading(get_the_ID(), 'h2');
			
			
			if ($author || $categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					$author ? travel_time_get_post_author('page') : '';
					
					$categories ? travel_time_get_post_category(get_the_ID(), 'category', 'page') : '';
					
				echo '</div>';
			}
			
			
			travel_time_post_exc_cont();
			
			
			if ($more) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
					
					travel_time_post_more(get_the_ID());
					
				echo '</footer>';
			}
	
		echo '</div>' . 
			'</div>';
	?>
	</div>
</article>
<!-- Finish Standard Article -->

