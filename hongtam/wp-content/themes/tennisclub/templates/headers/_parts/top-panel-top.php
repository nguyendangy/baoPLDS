<?php 
// Get template args
extract(tennisclub_template_get_args('top-panel-top'));

if (in_array('contact_info', $top_panel_top_components) && ($contact_info=trim(tennisclub_get_custom_option('contact_info')))!='') {
	?>
	<div class="top_panel_top_contact_area icon-smartphone">

		<?php
        $phone_href = preg_replace("/[^0-9]/", '', $contact_info);
        echo '<a href="tel:'.esc_attr($phone_href).'">'.wp_kses_post($contact_info).'</a>'; ?>
	</div>
	<?php
}
?>

<?php
if (in_array('contact_info_2', $top_panel_top_components) && ($contact_info_2=trim(tennisclub_get_custom_option('contact_info_2')))!='') {
	?>
	<div class="top_panel_top_open_hours icon-mail-2"><?php echo '<a href="mailto:'.antispambot($contact_info_2).'">'.wp_kses_post($contact_info_2).'</a>' ; ?></div>
	<?php
}
?>

<div class="top_panel_top_user_area">
	<?php
	if (in_array('socials', $top_panel_top_components) && tennisclub_get_custom_option('show_socials')=='yes') {
		?>
		<div class="top_panel_top_socials">
			<?php tennisclub_show_layout(tennisclub_sc_socials(array('size'=>'tiny'))); ?>
		</div>
		<?php
	}

	$menu_user = tennisclub_get_nav_menu('menu_user');
	if (empty($menu_user)) {
		?>
		<ul id="menu_user" class="menu_user_nav">
		<?php
	} else {
		$menu = tennisclub_substr($menu_user, 0, tennisclub_strlen($menu_user)-5);
		$pos = tennisclub_strpos($menu, '<ul');
		if ($pos!==false) $menu = tennisclub_substr($menu, 0, $pos+3) . ' class="menu_user_nav"' . tennisclub_substr($menu, $pos+3);
		echo str_replace('class=""', '', $menu);
	}
	

	if (in_array('currency', $top_panel_top_components) && function_exists('tennisclub_is_woocommerce_page') && tennisclub_is_woocommerce_page() && tennisclub_get_custom_option('show_currency')=='yes') {
		?>
		<li class="menu_user_currency">
			<a href="#">$</a>
			<ul>
				<li><a href="#"><b>&#36;</b> <?php esc_html_e('Dollar', 'tennisclub'); ?></a></li>
				<li><a href="#"><b>&euro;</b> <?php esc_html_e('Euro', 'tennisclub'); ?></a></li>
				<li><a href="#"><b>&pound;</b> <?php esc_html_e('Pounds', 'tennisclub'); ?></a></li>
			</ul>
		</li>
		<?php
	}

	if (in_array('language', $top_panel_top_components) && tennisclub_get_custom_option('show_languages')=='yes' && function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=1');
		if (!empty($languages) && is_array($languages)) {
			$lang_list = '';
			$lang_active = '';
			foreach ($languages as $lang) {
				$lang_title = esc_attr($lang['translated_name']);	
				if ($lang['active']) {
					$lang_active = $lang_title;
				}
				$lang_list .= "\n"
					.'<li><a rel="alternate" hreflang="' . esc_attr($lang['language_code']) . '" href="' . esc_url(apply_filters('WPML_filter_link', $lang['url'], $lang)) . '">'
						.'<img src="' . esc_url($lang['country_flag_url']) . '" alt="' . esc_attr($lang_title) . '" title="' . esc_attr($lang_title) . '" />'
						. ($lang_title)
					.'</a></li>';
			}
			?>
			<li class="menu_user_language">
				<a href="#"><span><?php tennisclub_show_layout($lang_active); ?></span></a>
				<ul><?php tennisclub_show_layout($lang_list); ?></ul>
			</li>
			<?php
		}
	}

	if (in_array('bookmarks', $top_panel_top_components) && tennisclub_get_custom_option('show_bookmarks')=='yes') {
		// Load core messages
		tennisclub_enqueue_messages();
		?>
		<li class="menu_user_bookmarks"><a href="#" class="bookmarks_show icon-star" title="<?php esc_attr_e('Show bookmarks', 'tennisclub'); ?>"><?php esc_html_e('Bookmarks', 'tennisclub'); ?></a>
		<?php 
			$list = tennisclub_get_value_gpc('tennisclub_bookmarks', '');
			if (!empty($list)) $list = json_decode($list, true);
			?>
			<ul class="bookmarks_list">
				<li><a href="#" class="bookmarks_add icon-star-empty" title="<?php esc_attr_e('Add the current page into bookmarks', 'tennisclub'); ?>"><?php esc_html_e('Add bookmark', 'tennisclub'); ?></a></li>
				<?php 
				if (!empty($list) && is_array($list)) {
					foreach ($list as $bm) {
						echo '<li><a href="'.esc_url($bm['url']).'" class="bookmarks_item">'.($bm['title']).'<span class="bookmarks_delete icon-cancel" title="'.esc_attr__('Delete this bookmark', 'tennisclub').'"></span></a></li>';
					}
				}
				?>
			</ul>
		</li>
		<?php 
	}

	if (in_array('login', $top_panel_top_components) && tennisclub_get_custom_option('show_login')=='yes') {
		if ( !is_user_logged_in() ) {
			// Load core messages
			tennisclub_enqueue_messages();
			// Load Popup engine
			tennisclub_enqueue_popup();
			// Anyone can register ?
			if ( (int) get_option('users_can_register') > 0) {
				?><li class="menu_user_register"><?php do_action('trx_utils_action_register'); ?></li><?php
			}
			?><li class="menu_user_login"><?php do_action('trx_utils_action_login'); ?></li><?php 
		} else {
			$current_user = wp_get_current_user();
			?>
			<li class="menu_user_controls">
				<a href="#"><?php
					$user_avatar = '';
					$mult = tennisclub_get_retina_multiplier();
					if ($current_user->user_email) $user_avatar = get_avatar($current_user->user_email, 16*$mult);
					if ($user_avatar) {
						?><span class="user_avatar"><?php tennisclub_show_layout($user_avatar); ?></span><?php
					}?><span class="user_name"><?php tennisclub_show_layout($current_user->display_name); ?></span></a>
				<ul>
					<?php if (current_user_can('publish_posts')) { ?>
					<li><a href="<?php echo esc_url(home_url('/')); ?>/wp-admin/post-new.php?post_type=post" class="icon icon-doc"><?php esc_html_e('New post', 'tennisclub'); ?></a></li>
					<?php } ?>
					<li><a href="<?php echo esc_url(get_edit_user_link()); ?>" class="icon icon-cog"><?php esc_html_e('Settings', 'tennisclub'); ?></a></li>
				</ul>
			</li>
			<li class="menu_user_logout"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="icon icon-logout"><?php esc_html_e('Logout', 'tennisclub'); ?></a></li>
			<?php 
		}
	}

	if (in_array('search', $top_panel_top_components) && tennisclub_get_custom_option('show_search')=='yes' && function_exists('tennisclub_sc_search')) {
		?>
		<li class="top_panel_top_search"><?php tennisclub_show_layout(tennisclub_sc_search(array('state'=>'fixed'))); ?></li>
		<?php
	}

	if (in_array('cart', $top_panel_top_components) && function_exists('tennisclub_exists_woocommerce') && tennisclub_exists_woocommerce() && (tennisclub_is_woocommerce_page() && tennisclub_get_custom_option('show_cart')=='shop' || tennisclub_get_custom_option('show_cart')=='always') && !(is_checkout() || is_cart() || defined('WOOCOMMERCE_CHECKOUT') || defined('WOOCOMMERCE_CART'))) { 
		?>
		<li class="menu_user_cart">
			<?php do_action('trx_utils_show_contact_info_cart'); ?>
		</li>
		<?php
	}

		if (in_array('link', $top_panel_top_components) && (tennisclub_get_custom_option('show_contact_info_link')=='yes')) {
			if (

			($contact_info_link_title=trim(tennisclub_get_custom_option('contact_info_link_title')))!=''
				&&
			($contact_info_link_url=tennisclub_get_custom_option('contact_info_link_url'))!=''
				) { ?>
					<li class="top_panel_link">
						<a href="<?php echo esc_url($contact_info_link_url); ?>">
							<?php echo esc_html($contact_info_link_title); ?>
						</a>
					</li>
				<?php
				}
			}
		?>

	</ul>

</div>