<?php
$header_options = tennisclub_storage_get('header_mobile');
$contact_address_1 = trim(tennisclub_get_custom_option('contact_address_1'));
$contact_address_2 = trim(tennisclub_get_custom_option('contact_address_2'));
$contact_phone = trim(tennisclub_get_custom_option('contact_phone'));
$contact_email = trim(tennisclub_get_custom_option('contact_email'));
$top_panel_position_cust = (tennisclub_get_custom_option('top_panel_position') == 'over')? 'over' : '';
?>
	<div class="header_mobile <?php echo trim($top_panel_position_cust) ?>">
		<div class="content_wrap">
			<div class="menu_button icon-menu"></div>
			<?php 
			tennisclub_show_logo(); 
			if ($header_options['woo_cart']){
				if (function_exists('tennisclub_exists_woocommerce') && tennisclub_exists_woocommerce() && (tennisclub_is_woocommerce_page() && tennisclub_get_custom_option('show_cart')=='shop' || tennisclub_get_custom_option('show_cart')=='always') && !(is_checkout() || is_cart() || defined('WOOCOMMERCE_CHECKOUT') || defined('WOOCOMMERCE_CART'))) { 
					?>
					<div class="menu_main_cart top_panel_icon">
						<?php do_action('trx_utils_show_contact_info_cart'); ?>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div class="side_wrap">
			<div class="close"><?php esc_html_e('Close', 'tennisclub'); ?></div>
			<div class="panel_top">
				<nav class="menu_main_nav_area">
					<?php
						$menu_main = tennisclub_get_nav_menu('menu_main','','mobile');
						if (empty($menu_main)) $menu_main = tennisclub_get_nav_menu('','','mobile');
						tennisclub_show_layout($menu_main);
					?>
				</nav>
				<?php 
				if ($header_options['search'] && tennisclub_get_custom_option('show_search')=='yes'  && function_exists('tennisclub_sc_search'))
					tennisclub_show_layout(tennisclub_sc_search(array()));
				
				if ($header_options['login']) {
					if ( is_user_logged_in() ) { 
						?>
						<div class="login"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="popup_link"><?php esc_html_e('Logout', 'tennisclub'); ?></a></div>
						<?php
					} else {
						// Load core messages
						tennisclub_enqueue_messages();
						// Load Popup engine
						tennisclub_enqueue_popup();
						?><div class="login"><?php do_action('trx_utils_action_login'); ?></div><?php
						// Anyone can register ?
						if ( (int) get_option('users_can_register') > 0) {
							?><div class="login"><?php do_action('trx_utils_action_register'); ?></div><?php 
						}
					}
				}
				?>
			</div>
			
			<?php if ($header_options['contact_address'] || $header_options['contact_phone_email'] || $header_options['open_hours']) { ?>
			<div class="panel_middle">
				<?php
				if ($header_options['contact_address'] && (!empty($contact_address_1) || !empty($contact_address_2))) {
					?><div class="contact_field contact_address">
								<span class="contact_icon icon-home"></span>
								<span class="contact_label contact_address_1"><?php echo wp_kses_post($contact_address_1); ?></span>
								<span class="contact_address_2"><?php echo wp_kses_post($contact_address_2); ?></span>
							</div><?php
				}
						
				if ($header_options['contact_phone_email'] && (!empty($contact_phone) || !empty($contact_email))) {
					?><div class="contact_field contact_phone">
						<span class="contact_icon icon-phone"></span>
						<span class="contact_label contact_phone"><?php echo wp_kses_post($contact_phone); ?></span>
						<span class="contact_email"><?php echo wp_kses_post($contact_email); ?></span>
					</div><?php
				}
				?>
			</div>
			<?php } ?>

			<div class="panel_bottom">
				<?php if ($header_options['socials'] && tennisclub_get_custom_option('show_socials')=='yes') { ?>
					<div class="contact_socials">
                        <?php if (function_exists('tennisclub_sc_socials'))
                        {tennisclub_show_layout(tennisclub_sc_socials(array('size'=>'small'))); } ?>

					</div>
				<?php } ?>
			</div>

			<?php

			if (tennisclub_get_custom_option('show_contact_info_link')=='yes') {
				if (
					($contact_info_link_title=trim(tennisclub_get_custom_option('contact_info_link_title')))!=''
					&&
					($contact_info_link_url=tennisclub_get_custom_option('contact_info_link_url'))!=''
				) { ?>
					<div class="top_panel_link">
						<a href="<?php echo esc_url($contact_info_link_url); ?>">
							<?php echo esc_html($contact_info_link_title); ?>
						</a>
					</div>
					<?php
				}
			}
			?>

		</div>
		<div class="mask"></div>
	</div>