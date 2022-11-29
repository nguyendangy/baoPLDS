<?php
/**
 * The Header for our theme.
 */

// Theme init - don't remove next row! Load custom options
tennisclub_core_init_theme();

tennisclub_profiler_add_point(esc_html__('Before Theme HTML output', 'tennisclub'));

$theme_skin = sanitize_file_name(tennisclub_get_custom_option('theme_skin'));
$body_scheme = tennisclub_get_custom_option('body_scheme');
if (empty($body_scheme)  || tennisclub_is_inherit_option($body_scheme)) $body_scheme = 'original';
$body_style  = tennisclub_get_custom_option('body_style');
$top_panel_style = tennisclub_get_custom_option('top_panel_style');
$top_panel_position = tennisclub_get_custom_option('top_panel_position');
$top_panel_scheme = tennisclub_get_custom_option('top_panel_scheme');
$favicon = tennisclub_get_custom_option('favicon');
$video_bg_show  = tennisclub_get_custom_option('show_video_bg')=='yes' && (tennisclub_get_custom_option('video_bg_youtube_code')!='' || tennisclub_get_custom_option('video_bg_url')!='');

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo 'scheme_' . esc_attr($body_scheme); ?>">
<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
    <?php wp_body_open(); ?>

	<?php 
	
	echo tennisclub_get_custom_option('gtm_code');

	// Page preloader
    $preloader=tennisclub_get_theme_option('page_preloader');
	if ($preloader!='') {
		?><div id="page_preloader"></div><?php
	}

	do_action( 'before' );

	// Add TOC items 'Home' and "To top"
		require_once tennisclub_get_file_dir('templates/_parts/menu-toc.php');
	?>

	<?php
		$class = $style = '';
		if (tennisclub_get_custom_option('bg_custom')=='yes' && ($body_style=='boxed' || tennisclub_get_custom_option('bg_image_load')=='always')) {
				if (($img = tennisclub_get_custom_option('bg_image_custom')) != '')
						$style = 'background: url('.esc_url($img).') ' . str_replace('_', ' ', tennisclub_get_custom_option('bg_image_custom_position')) . ' no-repeat fixed;';
				else if (($img = tennisclub_get_custom_option('bg_pattern_custom')) != '')
						$style = 'background: url('.esc_url($img).') 0 0 repeat fixed;';
				else if (($img = tennisclub_get_custom_option('bg_image')) > 0)
						$class = 'bg_image_'.($img);
				else if (($img = tennisclub_get_custom_option('bg_pattern')) > 0)
						$class = 'bg_pattern_'.($img);
				if (($img = tennisclub_get_custom_option('bg_color')) != '')
								$style .= 'background-color: '.($img).';';
		}
	?>

	<div class="body_wrap<?php echo !empty($class) ? ' '.esc_attr($class) : ''; ?>"<?php echo !empty($style) ? ' style="'.esc_attr($style).'"' : ''; ?>>

		<?php
        // Video bg
			require_once tennisclub_get_file_dir('templates/headers/_parts/video-bg.php');
		?>

		<div class="page_wrap">

			<?php
			tennisclub_profiler_add_point(esc_html__('Before Page Header', 'tennisclub'));
			// Top panel 'Above' or 'Over'
			if (in_array($top_panel_position, array('above', 'over'))) {
				tennisclub_show_post_layout(array(
					'layout' => $top_panel_style,
					'position' => $top_panel_position,
					'scheme' => $top_panel_scheme
					), false);
				tennisclub_profiler_add_point(esc_html__('After show menu', 'tennisclub'));
			}


			// Mobile Menu
			if ($top_panel_position != 'below') {
				get_template_part(tennisclub_get_file_slug('templates/headers/_parts/header-mobile.php'));
			}

			// Slider
			get_template_part(tennisclub_get_file_slug('templates/headers/_parts/slider.php'));
	
			// Top panel 'Below'
			if ($top_panel_position == 'below') {
				tennisclub_show_post_layout(array(
					'layout' => $top_panel_style,
					'position' => $top_panel_position,
					'scheme' => $top_panel_scheme
				), false);
				// Mobile Menu
				get_template_part(tennisclub_get_file_slug('templates/headers/_parts/header-mobile.php'));
			}

			// Top of page section: page title and breadcrumbs
				require_once tennisclub_get_file_dir('templates/headers/_parts/breadcrumbs.php');
			?>

			<div class="page_content_wrap page_paddings_<?php echo esc_attr(tennisclub_get_custom_option('body_paddings')); ?>">

				<?php
				// Content and sidebar wrapper
				if ($body_style!='fullscreen') tennisclub_open_wrapper('<div class="content_wrap">');
				
				// Main content wrapper
				tennisclub_open_wrapper('<div class="content">');
				?>