<?php
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.2.4
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function travel_time_theme_fonts() {
	$cmsmasters_option = travel_time_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version 	1.2.4
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body,
	.cmsmasters_quotes_grid .cmsmasters_quote_content, 
	.widget > .product_list_widget .reviewer, 
	.widget_tag_cloud a, 
	.widget_rss ul li cite, 
	.widget_rss ul li .rssSummary, 
	.widget_custom_posts_tabs_entries .tab_comments li > p, 
	.portfolio.puzzle .cmsmasters_project_category, 
	.portfolio.puzzle .cmsmasters_project_category a, 
	.portfolio.grid .cmsmasters_project_category, 
	.portfolio.grid .cmsmasters_project_category a, 
	.cmsmasters_slider_project .project_outer_image_wrap_meta_bottom .cmsmasters_slider_project_category, 
	.cmsmasters_slider_project .project_outer_image_wrap_meta_bottom .cmsmasters_slider_project_category a, 
	.cmsmasters_wrap_pagination .page-numbers.prev, 
	.cmsmasters_wrap_pagination .page-numbers.next, 
	.post_nav > span > span, 
	.cmsmasters_quotes_grid .cmsmasters_quote_site, 
	.cmsmasters_toggles .cmsmasters_toggle_title a, 
	.headline_text .entry-subtitle, 
	.cmsmasters_pricing_table .feature_list .feature_link, 
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title,
	.cmsmasters_post_cont_info, 
	.cmsmasters_post_cont_info a, 
	.footer_copyright, 
	.footer_copyright a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_content_font_google_font']) . $cmsmasters_option['travel-time' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quote_content, 
	.header_top .meta_wrap > div[class^='cmsmasters-icon-']:before, 
	.header_top .meta_wrap > div[class^='cmsmasters_theme_icon_']:before, 
	.header_top .meta_wrap > div[class*='cmsmasters-icon-']:before, 
	.header_top .meta_wrap > div[class*='cmsmasters_theme_icon_']:before {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] + 2) . "px;
	}

	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title,
	.cmsmasters_toggles .cmsmasters_toggle_title a, 
	.headline_text .entry-subtitle {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] + 4) . "px;
	}

	.widget > .product_list_widget .reviewer, 
	.widget_rss ul li cite, 
	.widget_rss ul li .rssSummary, 
	.widget_custom_twitter_entries .tweet_text, 
	.widget_custom_twitter_entries .tweet_text a, 
	.widget_custom_posts_tabs_entries .tab_comments li > p, 
	.cmsmasters_slider_post .cmsmasters_post_cont_info, 
	.cmsmasters_slider_post .cmsmasters_post_cont_info a, 
	.blog .cmsmasters_post_cont_info, 
	.blog .cmsmasters_post_cont_info a, 
	.post_nav > span > span,
	.footer_copyright, 
	.footer_copyright a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_slider_project .project_outer_image_wrap_meta_bottom .cmsmasters_slider_project_category, 
	.cmsmasters_slider_project .project_outer_image_wrap_meta_bottom .cmsmasters_slider_project_category a, 
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_title {
		text-transform:none;
	}
	
	.cmsmasters_open_profile .profile_details_item_desc, 
	.cmsmasters_open_profile .profile_features_item_desc, 
	.cmsmasters_open_project .project_details_item_desc, 
	.cmsmasters_open_project .project_features_item_desc, 
	.cmsmasters_open_profile .profile_details_item_desc * , 
	.cmsmasters_open_profile .profile_features_item_desc * , 
	.cmsmasters_open_project .project_details_item_desc * , 
	.cmsmasters_open_project .project_features_item_desc * {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_content_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quote_content {
		letter-spacing:0px; /* static */
	}
	
	.widget_tag_cloud a {
		line-height:30px; /* static */
	}
	
	/* Finish Content Font */


	/* Start Link Font */
	.cmsmasters_notice .notice_content, 
	.cmsmasters_breadcrumbs span,
	.cmsmasters_breadcrumbs a,
	.cmsmasters_twitter_wrap .cmsmasters_twitter_item_content, 
	.cmsmasters_quotes_slider .cmsmasters_quote_site a, 
	a,
	.subpage_nav > strong,
	.subpage_nav > span,
	.subpage_nav > a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_link_font_google_font']) . $cmsmasters_option['travel-time' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_link_font_text_decoration'] . ";
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['travel-time' . '_link_hover_decoration'] . ";
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_site a, 
	.cmsmasters_breadcrumbs span, 
	.cmsmasters_breadcrumbs a, 
	.header_top .meta_wrap a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_link_font_font_size'] - 2) . "px;
	}
	
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.menu-item-mega-container > ul > li.menu-item > a .nav_title, 
	.navigation > li > a, 
	.top_line_nav > li > a, 
	.footer_nav > li > a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_nav_title_font_google_font']) . $cmsmasters_option['travel-time' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_nav_title_font_text_transform'] . ";
	}
	
	.nav_item_wrap .nav_subtitle, 
	.top_line_nav > li > a, 
	ul.navigation > li > a .nav_tag	{
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_nav_title_font_font_size'] - 2) . "px;
	}
	
	.nav_item_wrap .nav_subtitle, 
	ul.navigation > li > a .nav_tag	{
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_nav_title_font_line_height'] - 2) . "px;
	}
	
	.nav_item_wrap .nav_subtitle {
		font-weight:300; /* static */
		text-transform:none; /* static */
	}
	
	.footer_nav > li > a {
		text-transform:none; /* static */
	}
	
	@media only screen and (max-width: 1024px) {
		.top_line_nav > li > a {
			font-size:" . $cmsmasters_option['travel-time' . '_nav_title_font_font_size'] . "px;
		}
	
		.menu-item-mega-container > ul > li.menu-item > a .nav_title, 
		.navigation li a .nav_title, 
		.navigation li a {
			font-weight:300; /* static */
			text-transform:none; /* static */
		}
	}
	
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation ul li a,
	.top_line_nav ul li a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['travel-time' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_nav_dropdown_font_text_transform'] . ";
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.logo .title {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h1_font_google_font']) . $cmsmasters_option['travel-time' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h1_font_text_decoration'] . ";
		letter-spacing:3px;
	}
	
	.cmsmasters_dropcap {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h1_font_google_font']) . $cmsmasters_option['travel-time' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['travel-time' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_button_font_google_font']) . $cmsmasters_option['travel-time' . '_button_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['travel-time' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h1_font_font_style'] . ";
		letter-spacing:0px;
	}

	.cmsmasters_dropcap.type1 {
		font-size:60px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:40px; /* static */
	}
	
	.cmsmasters_counters.counters_type_vertical .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		line-height:36px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_line_height'] + 15) . "px;
	}
	.headline_outer .headline_inner.align_left .headline_icon + .cmsmasters_breadcrumbs, 
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_font_size'] + 45) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon + .cmsmasters_breadcrumbs, 
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_font_size'] + 45) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_line_height'] + 15) . "px;
	}
	
	@media only screen and (max-width: 1024px) {
		.cmsmasters_open_post .cmsmasters_post_header .cmsmasters_post_title {
			font-size:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_line_height'] - 20) . "px;
		}
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2, 
	h2 a, 
	.post_nav a, 
	.cmsmasters_wrap_pagination .page-numbers, 
	.cmsmasters_table caption, 
	.cmsmasters_pricing_table .pricing_title {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h2_font_google_font']) . $cmsmasters_option['travel-time' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h2_font_text_decoration'] . ";
		letter-spacing:1px;
	}
	
	.cmsmasters_post_default .cmsmasters_post_default_inner .cmsmasters_post_header .cmsmasters_post_title a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h2_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h2_font_line_height'] + 4) . "px;
	}
	
	/* Finish H2 Font */


	/* Start H3 Font */
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a, 
	h3,
	h3 a,  
	.cmsmasters_quote_content, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h3_font_google_font']) . $cmsmasters_option['travel-time' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h3_font_text_decoration'] . ";
		letter-spacing:1px;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day, 
	.comment-reply-title small a, 
	h4, 
	h4 a, 
	.about_author_cont_title, 
	.cmsmasters_open_profile .cmsmasters_profile_subtitle, 
	.comment-reply-title, 
	.cmsmasters_quotes_grid .cmsmasters_quote_header,   
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h4_font_google_font']) . $cmsmasters_option['travel-time' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h4_font_text_decoration'] . ";
	}

	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day {
		font-size:28px; /* static */
		line-height:50px; /* static */
		letter-spacing:normal;
	}
	
	.about_author_cont_title {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h4_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h4_font_line_height'] + 2) . "px;
	}
	
	.about_author_cont_title {
		text-transform:none;
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quote_header {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h4_font_font_size'] + 4) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h4_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_container {
		height:" . ((int) $cmsmasters_option['travel-time' . '_h4_font_line_height'] * 2 + 220 + 13) . "px;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	#wp-calendar tbody td, 
	#wp-calendar tbody th, 
	.widget_archive ul li a, 
	.widget_categories ul li, 
	.widget_categories ul li a, 
	.cmsmasters_archive_item__tour_duration, 
	.cmsmasters_archive_item__tour_participants, 
	.cmsmasters_archive_type .cmsmasters_archive_item_info * , 
	.cmsmasters_archive_type .cmsmasters_archive_item_type, 
	.cmsmasters_project_grid .cmsmasters_project_content,  
	.cmsmasters_portfolio_project_price, 
	.cmsmasters_single_slider_item_tour_price, 
	.cmsmasters_post_tags > a, 
	.cmsmasters_post_cont_info, 
	.gallery-item .wp-caption-text, 
	.cmsmasters_img.with_caption, 
	.cmsmasters_quote_site a, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title,
	.cmsmasters_profile_title a, 
	.cmsmasters_profile_subtitle, 	
	.cmsmasters_open_project .project_details_item_title, 
	.cmsmasters_open_project .project_features_item_title, 
	.cmsmasters_open_profile .profile_details_item_title, 
	.cmsmasters_open_profile .profile_features_item_title, 
	.cmsmasters_pricing_table .cmsmasters_price_wrap, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	h5,
	h5 a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h5_font_google_font']) . $cmsmasters_option['travel-time' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h5_font_text_decoration'] . ";
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-size:36px; /* static */
	}

 	#wp-calendar tbody td, 
	#wp-calendar tbody th, 
	.cmsmasters_archive_type .cmsmasters_archive_item_type {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_archive_type .cmsmasters_archive_item_info * , 
	.cmsmasters_post_tags > a, 
	.gallery-item .wp-caption-text, 
	.cmsmasters_img.with_caption, 
	.cmsmasters_quote_site a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] - 2) . "px;
	}

	.cmsmasters_quote_title, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title,
	.cmsmasters_profile_title a, 
	.cmsmasters_profile_title a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 4) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 22) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 22) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_price_wrap {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 28) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 28) . "px;
	}
	
	.cmsmasters_portfolio_project_price, 
	.cmsmasters_single_slider_item_tour_price {
		font-size:18px; /* static */
		line-height:34px; /* static */
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	.widget_rss .rss-date, 
	.widget_rss .widgettitle a, 
	.widget_recent_entries ul li span, 
	.cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_portfolio_project_footer, 
	#wp-calendar caption, 
	#wp-calendar thead, 
	.widget_custom_twitter_entries .tweet_time, 
	.widget_custom_posts_tabs_entries .published, 
	.widget .widgettitle, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > a, 
	.cmsmasters_archive_type .cmsmasters_archive_item_tour_participants, 
	.cmsmasters_archive_type .cmsmasters_archive_item_tour_duration, 
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap, 
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap a, 
	.cmsmasters_tour_search form label, 
	.cmsmasters_portfolio_project_duration, 
	.cmsmasters_portfolio_project_participants, 
	.portfolio.puzzle .cmsmasters_project_comments a, 
	.portfolio.puzzle .cmsmasters_project_likes a, 
	.portfolio.grid .project_outer_image_wrap_meta .cmsmasters_project_comments a, 
	.portfolio.grid .project_outer_image_wrap_meta .cmsmasters_project_likes a, 
	.cmsmasters_single_slider_item_tour .cmsmasters_single_slider_item_inner_meta span,
	.cmsmasters_slider_project .project_outer_image_wrap_meta_bottom > span a, 
	.cmsmasters_slider_post .cmsmasters_post_top_wrap .entry-meta * , 
	.cmsmasters_post_puzzle .cmsmasters_post_top_wrap .entry-meta * , 
	.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta * , 
	.cmsmasters_post_timeline .cmsmasters_post_top_wrap .entry-meta * , 
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon, 
	.cmsmasters_post_default .cmsmasters_post_info * , 
	.cmsmasters_post_cont_info_top * , 
	.cmsmasters_comment_item_date, 
	.cmsmasters_comment_item_cont_info > a, 
	.cmsmasters_post_read_more, 
	.cmsmasters_slider_post_read_more, 
	.share_posts a,
	.cmsmasters_open_profile h3, 
	.cmsmasters_twitter_wrap .published, 
	.form_info label,
	.comment-respond p label, 
	.cmsmasters_table thead th, 
	.cmsmasters_table tfoot td, 
	h6,
	h6 a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h6_font_google_font']) . $cmsmasters_option['travel-time' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta span:before, 
	.cmsmasters_post_masonry .cmsmasters_post_top_wrap .entry-meta a:before, 
	.cmsmasters_post_timeline .cmsmasters_post_top_wrap .entry-meta span:before, 
	.cmsmasters_post_timeline .cmsmasters_post_top_wrap .entry-meta a:before {
		font-size:13px; /* static */
	}
	
	.cmsmasters_post_read_more, 
	.cmsmasters_slider_post_read_more {
		font-weight:600; /* static */
	}

	.widget .widgettitle {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li > a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] + 4) . "px;
	}

	.cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_portfolio_project_footer span {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] - 1) . "px;
	}
	
	.widget_rss .rss-date, 
	.widget_recent_entries ul li span, 
	#wp-calendar thead, 
	.portfolio.grid .project_outer_image_wrap_meta .cmsmasters_project_comments a, 
	.portfolio.grid .project_outer_image_wrap_meta .cmsmasters_project_likes a, 
	.cmsmasters_single_slider_item_tour .cmsmasters_single_slider_item_inner_meta span, 
	.cmsmasters_comment_item_date {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon {
		font-size:12px; /*static*/
		line-height:30px; /*static*/
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_button_font_google_font']) . $cmsmasters_option['travel-time' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_button_font_text_transform'] . ";
	}
	
	#page .cmsmasters_tour_search .cmsmasters_tour_search_min input {
		line-height:" . $cmsmasters_option['travel-time' . '_button_font_line_height'] . "px;
	}
	
	.cmsmasters_tabs .cmsmasters_tabs_list_item a {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] - 10) . "px;
	}
	
	a.cmsmasters_project_filter_but:before {
		font-size:14px; /* static */
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	a.cmsmasters_project_sort_but, 
	a.cmsmasters_project_filter_but {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_button_font_font_size'] - 2) . "px;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['travel-time' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['travel-time' . '_button_font_line_height'] . "px;
	}
	
	a.cmsmasters_project_sort_but, 
	a.cmsmasters_project_filter_but, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] - 6) . "px;
		text-transform:none;
	}
	
	a.cmsmasters_project_sort_but:before, 
	a.cmsmasters_project_filter_but:before {
		font-size:20px; /* static */
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] - 6) . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small, 
	form .formError .formErrorContent {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_small_font_google_font']) . $cmsmasters_option['travel-time' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_small_font_google_font']) . $cmsmasters_option['travel-time' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['travel-time' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['travel-time' . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	textarea,
	select,
	option {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_input_font_google_font']) . $cmsmasters_option['travel-time' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['travel-time' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_quote_font_google_font']) . $cmsmasters_option['travel-time' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_quote_font_font_style'] . ";
	}
	
	q {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_quote_font_google_font']) . $cmsmasters_option['travel-time' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['travel-time' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";


if (CMSMASTERS_DONATIONS) {

	$custom_css .= "
/***************** Start CMSMASTERS Donations Font Styles ******************/

	/* Start Content Font */
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start Navigation Title Font */
	/* Finish Navigation Title Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish CMSMASTERS Donations Font Styles ******************/


";

}


if (CMSMASTERS_WOOCOMMERCE) {

	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.widget_price_filter .price_slider_amount .price_label, 
	.widget_shopping_cart .total span, 
	.widget_shopping_cart .total, 
	.widget_shopping_cart .total strong, 
	.shop_table.woocommerce-checkout-review-order-table .amount, 
	.shop_table.woocommerce-checkout-review-order-table .amount span, 
	.shop_table.woocommerce-checkout-review-order-table tbody strong, 
	.shop_table.woocommerce-checkout-review-order-table tbody th, 
	.shop_table.woocommerce-checkout-review-order-table tbody td, 
	.shop_table.woocommerce-checkout-review-order-table tfoot td, 
	.shop_table.woocommerce-checkout-review-order-table tfoot th, 
	.shop_table td > .amount span, 
	.shop_table td > .amount, 
	.shop_table td strong > .amount, 
	.shop_table td strong > .amount span, 
	.cmsmasters_dynamic_cart .amount span, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_content_font_google_font']) . $cmsmasters_option['travel-time' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_content_font_font_style'] . ";
	}
	
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_single_product .price {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h2_font_google_font']) . $cmsmasters_option['travel-time' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h2_font_text_decoration'] . ";
	}
	
	.woocommerce-shipping-fields > h5 {
		line-height:" . $cmsmasters_option['travel-time' . '_h2_font_line_height'] . "px;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.woocommerce-loop-category__title, 
	.shop_table thead th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.order_details tfoot tr:last-child th, 
	.shop_table.order_details tfoot tr:last-child td {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h3_font_google_font']) . $cmsmasters_option['travel-time' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h3_font_text_decoration'] . ";
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_woo_tabs .cmsmasters_tab_inner h2, 
	.shop_table .product-name a, 
	.shop_table.order_details tfoot tr th {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h4_font_google_font']) . $cmsmasters_option['travel-time' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.cmsmasters_single_product .cmsmasters_product_info_wrap .price,
	.cmsmasters_single_product .cmsmasters_product_info_wrap .price span,
	.widget_product_tag_cloud a, 
	.widget > .product_list_widget a, 
	.widget_shopping_cart .cart_list a, 
	.woocommerce-view-order .shop_table.order_details tbody * ,
	.woocommerce-view-order .shop_table.order_details tfoot * ,	
	.woocommerce-order-received .shop_table.order_details tbody * ,
	.woocommerce-order-received .shop_table.order_details tfoot * ,
	.woocommerce-checkout-payment .payment_methods label, 
	.cart_totals table .amount,
	.cart_totals table .amount span, 
	.cmsmasters_woo_comments .cmsmasters_comment_item .cmsmasters_comment_item_title, 
	.cmsmasters_single_product .product_meta, 
	.cmsmasters_single_product .product_meta a, 
	.cmsmasters_single_product .product_meta > span, 
	.cmsmasters_single_product .cmsmasters_product_info_wrap .price,
	.cmsmasters_single_product .cmsmasters_product_info_wrap .price span,
	.cmsmasters_product .price, 
	.cmsmasters_product .cmsmasters_product_cat, 
	.cmsmasters_product .cmsmasters_product_cat a, 
	.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	.shop_attributes th, 
	.shop_table.order_details tfoot tr td, 
	ul.order_details strong, 
	ul.order_details strong .amount, 
	ul.order_details strong .amount span, 
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a, 
	.widget > .product_list_widget .amount, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	.cmsmasters_dynamic_cart .quantity, 
	.cmsmasters_dynamic_cart .quantity .amount span	{
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h5_font_google_font']) . $cmsmasters_option['travel-time' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h5_font_text_decoration'] . ";
	}
	
	.widget > .product_list_widget .amount, 
	.widget > .product_list_widget .amount span, 
	.cmsmasters_product .cmsmasters_product_cat, 
	.cmsmasters_product .cmsmasters_product_cat a, 
	.cmsmasters_dynamic_cart .quantity, 
	.cmsmasters_dynamic_cart .quantity .amount span	{
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] - 2) . "px;
	}

	.shop_table.order_details tfoot tr td, 
	ul.order_details strong {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 2) . "px;
	}

	.cmsmasters_single_product .cmsmasters_product_info_wrap .price span {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_single_product .cmsmasters_product_info_wrap .price,
	.cmsmasters_product .price span, 
	.cmsmasters_product .price {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 4) . "px;
	}
	
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_line_height'] + 2) . "px;
	}
	
	.widget_product_tag_cloud a {
		line-height:28px; /* static */
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.widget_shopping_cart .cart_list .quantity, 
	.widget_shopping_cart .cart_list .quantity span, 
	.woocommerce-view-order #page .shop_table.order_details tfoot tr:last-child td, 
	.woocommerce-view-order #page .shop_table.order_details tfoot tr:last-child th, 	
	.woocommerce-order-received #page .shop_table.order_details tfoot tr:last-child td, 
	.woocommerce-order-received #page .shop_table.order_details tfoot tr:last-child th, 
	ul.order_details, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.woocommerce-billing-fields label, 
	.woocommerce-shipping-fields label, 
	.cmsmasters_calc_shipping_btn,
	.shipping-calculator-button, 
	.cart_totals table th, 
	.shop_table thead th {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h6_font_google_font']) . $cmsmasters_option['travel-time' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h6_font_text_decoration'] . ";
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.cmsmasters_product .cmsmasters_product_add_inner > a {		
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_button_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] + 6) . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_button_font_text_transform'] . ";
	}
	#page .shop_table td .quantity input, 
	#page .cmsmasters_single_product .cart .quantity .input-text {
		line-height:" . $cmsmasters_option['travel-time' . '_button_font_font_size'] . "px;
	}	
	
	.cmsmasters_product .cmsmasters_product_add_inner {
		height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] + 6) . "px;
	}
	
	.widget_price_filter .price_slider_amount .button, 
	.widget_shopping_cart .buttons .button, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button, 
	.onsale, 
	.out-of-stock, 
	.stock {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_button_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] - 12) . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_button_font_text_transform'] . ";
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	.select2-dropdown, 
	.select2-selection {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_input_font_google_font']) . $cmsmasters_option['travel-time' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_input_font_font_style'] . ";
	}
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/


";

}


if (CMSMASTERS_EVENTS_CALENDAR) {

	if ( tribe_events_views_v2_is_enabled() ) {
		$cmsmasters_option = travel_time_get_global_options();

		$cmsmasters_shortname = 'travel-time';
		$cmsmasters_event_title = '_h2';
		$cmsmasters_event_smaller_title = '_h3';
		$cmsmasters_event_meta = '_h6';
		$cmsmasters_single_title = '_h1';
		$cmsmasters_widget_title = '_h3';

		$custom_css .= "
/***************** Start Tribe Events Font Styles ******************/
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-description,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-description p,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-description,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-description p,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-month__multiday-event-bar-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-month__multiday-event-bar-title p,
	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-description,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-week-grid__multiday-event-bar-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe_events,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe-events-single-event-description,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe-events-single-event-description p {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . '_content_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_font_style' ] . ";
	}

	.cmsmasters_tribe_events_views_v2 .tribe-events-single *,
	.cmsmasters_tribe_events_views_v2 .tribe-events *,
	.cmsmasters_tribe_events_views_v2 .tribe-events-pro *,
	.tribe-events-calendar-month__calendar-event-tooltip * {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . '_content_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_system_font' ] . " !important;
	}

	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-description {
		font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . '_content_font_font_size' ] - 2 ) . "px;
		line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . '_content_font_line_height' ] - 2 ) . "px;
	}

	.cmsmasters_tribe_events_views_v2 .tribe-events .tribe-events-calendar-month__multiday-event-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events .tribe-events-pro-week-grid__multiday-event-wrapper {
		height:" . $cmsmasters_option[ $cmsmasters_shortname . '_content_font_line_height' ] . "px;
	}

	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe-events-single-event-title {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_text_transform' ] . ";
		text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_single_title . '_font_text_decoration' ] . ";
	}

	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-title a,
	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single ul.tribe-related-events li .tribe-related-events-title {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_text_transform' ] . ";
		text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_text_decoration' ] . ";
	}

	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-title {
		font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_font_size' ] - 2 ) . "px;
		line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_title . '_font_line_height' ] - 2 ) . "px;
	}

	
	@media only screen and (max-width: 540px) {
		.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-title,
		.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-title a,
		.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-title,
		.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-title a,
		.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-title,
		.cmsmasters_tribe_events_views_v2 .tribe-events-single ul.tribe-related-events li .tribe-related-events-title {
			font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_system_font' ] . ";
			font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_size' ] . "px;
			line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_line_height' ] . "px;
			font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_weight' ] . ";
			font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_style' ] . ";
			text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_text_transform' ] . ";
			text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_text_decoration' ] . ";
		}
	
		.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-title {
			font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_size' ] - 2 ) . "px;
			line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_line_height' ] - 2 ) . "px;
		}
	}

	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-summary__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-summary__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-photo__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-photo__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-title a {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_text_transform' ] . ";
		text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_text_decoration' ] . ";
	}

	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-map__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-map__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-title a {
		font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_font_size' ] - 2 ) . "px;
		line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_smaller_title . '_font_line_height' ] - 2 ) . "px;
	}

	.cmsmasters_tribe_events_views_v2 .cmsmasters_sidebar .widgettitle,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-countdown .tribe-events-widget-countdown__header-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__header-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__header-title {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_text_transform' ] . ";
		text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_widget_title . '_font_text_decoration' ] . ";
	}

	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-list__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-calendar-day__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-photo__event-datetime,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-photo__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-photo__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-summary__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-summary__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-summary__event-cost,
	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-datetime,
	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe-events-schedule,
	.cmsmasters_tribe_events_views_v2 .tribe-events-single .tribe-events-schedule *,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-header,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-header,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-datetime,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-datetime,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-countdown .tribe-events-widget-countdown__event-title,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-countdown .tribe-events-widget-countdown__event-title a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__venue-name,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__venue-name a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-venue a,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-organizer-title-wrapper a {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_text_transform' ] . ";
		text-decoration:" . $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_text_decoration' ] . ";
	}

	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-datetime,
	.tribe-events-calendar-month__calendar-event-tooltip .tribe-events-calendar-month__calendar-event-tooltip-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-map__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-map__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-common .tribe-events-pro-map__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-week .tribe-events-pro-week-mobile-events__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-venue,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-shortcode-events-week .tribe-events-pro-week-mobile-events__event-cost,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-month .tribe-events-calendar-month-mobile-events__mobile-event-datetime,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-widget-events-shortcode-month .tribe-events-calendar-month-mobile-events__mobile-event-datetime,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-featured-venue .tribe-events-widget-featured-venue__event-datetime-wrapper,
	.cmsmasters_tribe_events_views_v2 .tribe-events-widget.tribe-common.tribe-events.tribe-events-view--widget-events-list .tribe-events-widget-events-list__event-datetime-wrapper {
		font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_font_size' ] - 2 ) . "px;
		line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . $cmsmasters_event_meta . '_font_line_height' ] - 2 ) . "px;
	}

	.cmsmasters_tribe_events_views_v2 .tribe-events .tribe-events-c-nav__next,
	.cmsmasters_tribe_events_views_v2 .tribe-events .tribe-events-c-nav__prev,
	.cmsmasters_tribe_events_views_v2 .tribe-events-pro .tribe-events-c-small-cta__link {
		font-family:" . travel_time_get_google_font( $cmsmasters_option[ $cmsmasters_shortname . '_button_font_google_font' ] ) . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_system_font' ] . ";
		font-size:" . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_font_size' ] . "px;
		line-height:" . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_line_height' ] . "px;
		font-weight:" . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_font_weight' ] . ";
		font-style:" . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_font_style' ] . ";
		text-transform:" . $cmsmasters_option[ $cmsmasters_shortname . '_button_font_text_transform' ] . ";
	}

	.cmsmasters_tribe_events_views_v2 .tribe-events-pro .tribe-events-c-small-cta__link {
		font-size:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . '_button_font_font_size' ] - 2 ) . "px;
		line-height:" . ( (int) $cmsmasters_option[ $cmsmasters_shortname . '_button_font_line_height' ] - 2 ) . "px;
	}
/***************** Finish Tribe Events Font Styles ******************/
";
	} else {
		$custom_css .= "
/***************** Start Events Font Styles ******************/

	/* Start Content Font */
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a, 
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-this-week-events-widget .tribe-events-page-title, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_content_font_google_font']) . $cmsmasters_option['travel-time' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_content_font_font_style'] . ";
	}
	
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] - 1) . "px;
	}
	
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] - 2) . "px;
	}
	
	.tribe-events-grid .column.first, 
	.tribe-events-grid .tribe-week-grid-hours {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_content_font_font_size'] - 4) . "px;
	}
	
	.tribe-mini-calendar tbody a {
		font-weight:normal;
	}
	
	.tribe-this-week-events-widget .tribe-events-page-title {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	@media only screen and (max-width: 1024px) {
		.headline_outer .headline_inner .headline_content .headline_text .entry-title {
			font-size:" . ((int) $cmsmasters_option['travel-time' . '_h1_font_line_height'] - 20) . "px;
		}
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.tribe-events-countdown-widget .tribe-countdown-time, 
	.tribe-events-page-title, 
	.tribe-events-page-title a, 
	.tribe-mobile-day .tribe-mobile-day-date {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h2_font_google_font']) . $cmsmasters_option['travel-time' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h2_font_text_decoration'] . ";
	}
	
	.tribe-events-page-title, 
	.tribe-events-page-title a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h2_font_font_size'] + 12) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h2_font_line_height'] + 12) . "px;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.tribe-events-countdown-widget .tribe-countdown-text, 
	.tribe-events-countdown-widget .tribe-countdown-text a, 
	table.tribe-events-calendar thead th {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h3_font_google_font']) . $cmsmasters_option['travel-time' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h3_font_text_decoration'] . ";
	}
	
	table.tribe-events-calendar thead th, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-grid .tribe-grid-header span {
		text-transform:none;
	}
	
	@media only screen and (max-width: 787px) {
		#page table.tribe-events-calendar thead th {
			font-size:" . ((int) $cmsmasters_option['travel-time' . '_h3_font_font_size'] - 5) . "px;
		}
	}
	
	@media only screen and (max-width: 540px) {
		#page table.tribe-events-calendar thead th {
			font-size:" . ((int) $cmsmasters_option['travel-time' . '_h3_font_font_size'] - 10) . "px;
		}
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	#tribe-events-content > .tribe-events-button, 
	.tribe-events-list .tribe-events-read-more, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_title, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_descr a, 
	.cmsmasters_single_event_meta dt, 
	.cmsmasters_single_event_meta dd a, 
	.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	.tribe-events-widget-link a, 
	.tribe-mobile-day .tribe-events-read-more, 
	.tribe-this-week-events-widget .tribe-events-viewmore a {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h5_font_google_font']) . $cmsmasters_option['travel-time' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h5_font_text_decoration'] . ";
	}

	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h5_font_font_size'] - 2) . "px;
	}	
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	.tribe-events-countdown-widget .tribe-countdown-time span, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 	
	.cmsmasters_event_date .cmsmasters_event_day, 
	.cmsmasters_event_date .cmsmasters_event_mon, 
	.tribe-mini-calendar [id*=tribe-mini-calendar-month], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	table.tribe-events-calendar thead th, 
	.tribe-events-tooltip .duration,
	.tribe-events-grid .column.first, 
	.tribe-events-grid .tribe-week-grid-hours, 
	.tribe-events-grid .tribe-grid-header span, 
	.tribe-events-photo .time-details, 
	.tribe-events-sub-nav li a, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-day-time-slot > h5, 
	.tribe-events-list .tribe-events-list-separator-month, 
	.tribe-bar-filters-inner > div label, 
	.tribe-events-list .tribe-events-event-meta, 
	.tribe-events-list .tribe-events-event-meta a, 
	.tribe-events-photo .tribe-events-event-meta, 
	.tribe-events-photo .tribe-events-event-meta a, 
	.cmsmasters_single_event .tribe-events-schedule, 
	.cmsmasters_single_event .tribe-events-schedule a, 
	.tribe-events-venue .tribe-events-event-meta, 
	.tribe-events-venue .tribe-events-event-meta a, 
	.tribe-events-organizer .tribe-events-event-meta, 
	.tribe-events-organizer .tribe-events-event-meta a, 
	.tribe-mini-calendar thead th, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mobile-day .tribe-events-event-schedule-details, 
	.tribe-mobile-day .tribe-event-schedule-details {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_h6_font_google_font']) . $cmsmasters_option['travel-time' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['travel-time' . '_h6_font_text_decoration'] . ";
	}

	.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	.tribe-events-tooltip .duration,
	.tribe-events-grid .column.first, 
	.tribe-events-grid .tribe-week-grid-hours, 
	.tribe-events-photo .time-details {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] - 2) . "px;
	}
	
	.tribe-events-photo .time-details:before {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] - 2) . "px;
	}

	.cmsmasters_single_event .tribe-events-schedule > div:before {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] + 6) . "px;
	}
	
	table.tribe-events-calendar thead th, 
	.tribe-events-grid .tribe-grid-header span, 
	.tribe-events-day-time-slot > h5, 
	.tribe-events-list .tribe-events-list-separator-month {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] + 4) . "px;
	}
	
	.cmsmasters_single_event .tribe-events-schedule > div:before {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_font_size'] + 4) . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_h6_font_line_height'] . "px;
	}
	
	.tribe-events-sub-nav li a {
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_h6_font_line_height'] + 6) . "px;
	}
	
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date {
		line-height:28px; /* static */
	}
	
	.cmsmasters_event_date .cmsmasters_event_mon {
		font-size:12px; /* static */
		line-height:28px; /* static */
	}
	
	.cmsmasters_event_date .cmsmasters_event_day {
		font-size:28px; /* static */
		line-height:48px; /* static */
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#tribe-bar-views .tribe-bar-views-list li, 
	#tribe-bar-views .tribe-bar-views-list li {
		font-family:" . travel_time_get_google_font($cmsmasters_option['travel-time' . '_button_font_google_font']) . $cmsmasters_option['travel-time' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['travel-time' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['travel-time' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['travel-time' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['travel-time' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['travel-time' . '_button_font_text_transform'] . ";
	}
	
	#tribe-bar-views .tribe-bar-views-list li, 
	#tribe-bar-views .tribe-bar-views-list li {
		font-size:" . ((int) $cmsmasters_option['travel-time' . '_button_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['travel-time' . '_button_font_line_height'] - 6) . "px;
		text-transform:none;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish Events Font Styles ******************/


";

	}
}
	
	
	return apply_filters('travel_time_theme_fonts_filter', $custom_css);
}

