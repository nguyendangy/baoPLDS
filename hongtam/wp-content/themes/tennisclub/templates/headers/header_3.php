<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'tennisclub_template_header_3_theme_setup' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_template_header_3_theme_setup', 1 );
	function tennisclub_template_header_3_theme_setup() {
		tennisclub_add_template(array(
			'layout' => 'header_3',
			'mode'   => 'header',
			'title'  => esc_html__('Header 3', 'tennisclub'),
			'icon'   => tennisclub_get_file_url('templates/headers/images/3.jpg')
			));
	}
}

// Template output
if ( !function_exists( 'tennisclub_template_header_3_output' ) ) {
	function tennisclub_template_header_3_output($post_options, $post_data) {

		// WP custom header
		$header_css = '';
		if ($post_options['position'] != 'over') {
			$header_image = get_header_image();
			$header_css = $header_image!='' 
				? ' style="background-image: url('.esc_url($header_image).')"' 
				: '';
		}
		?>
		
		<div class="top_panel_fixed_wrap"></div>

		<header class="top_panel_wrap top_panel_style_3 scheme_<?php echo esc_attr($post_options['scheme']); ?>">
			<div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_<?php echo esc_attr(tennisclub_get_custom_option('top_panel_position')); ?>">
			
			<?php if (tennisclub_get_custom_option('show_top_panel_top')=='yes') { ?>
				<div class="top_panel_top">
					<div class="content_wrap clearfix">
						<?php
						tennisclub_template_set_args('top-panel-top', array(
							'top_panel_top_components' => array('contact_info', 'contact_info_2', 'search', 'login', 'currency', 'bookmarks', 'cart', 'link')
						));
						get_template_part(tennisclub_get_file_slug('templates/headers/_parts/top-panel-top.php'));
						?>
					</div>
				</div>
			<?php } ?>
				<div class="top_panel_middle" <?php tennisclub_show_layout($header_css); ?>>
					<div class="content_wrap">
						<div class="contact_logo">
							<?php tennisclub_show_logo(true, true); ?>
						</div>
						<div class="menu_main_social_wrap">
							<?php
							if (tennisclub_get_custom_option('show_socials')=='yes') {
								?>
								<div class="top_panel_top_socials">
									<?php if (function_exists('tennisclub_sc_socials'))
									    {echo  trim(tennisclub_sc_socials(array('size'=>'small'))); } ?>
								</div>
								<?php
							}
							?>
							<div class="menu_main_wrap">
								<a href="#" class="menu_main_responsive_button icon-menu"></a>
								<nav class="menu_main_nav_area">
									<?php
									$menu_main = tennisclub_get_nav_menu('menu_main');
									if (empty($menu_main)) $menu_main = tennisclub_get_nav_menu();
									tennisclub_show_layout($menu_main);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<?php
	}
}

	$header_mobile = tennisclub_storage_get('header_mobile');
	$header_mobile = array(
				 'open_hours' => false,
				 'login' => (tennisclub_get_theme_option('show_login')=='yes' ? true : false),
				 'socials' => true,
				 'bookmarks' => true,
				 'contact_address' => false,
				 'contact_phone_email' => false,
				 'woo_cart' => true,
				 'search' => true
			);
	tennisclub_storage_set('header_mobile', $header_mobile);
?>