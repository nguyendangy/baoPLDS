<?php
	
	$show_title = tennisclub_get_custom_option('show_page_title')=='yes';
	$show_navi = $show_title && is_single() && tennisclub_is_woocommerce_page();
	$show_breadcrumbs = tennisclub_get_custom_option('show_breadcrumbs')=='yes';
	if (($show_title || $show_breadcrumbs)) {
		?>
		<div class="top_panel_title top_panel_style_<?php echo esc_attr(str_replace('header_', '', $top_panel_style)); ?> <?php echo (!empty($show_title) ? ' title_present'.  ($show_navi ? ' navi_present' : '') : '') . (!empty($show_breadcrumbs) ? ' breadcrumbs_present' : ''); ?> scheme_<?php echo esc_attr($top_panel_scheme); ?>">
			<div class="top_panel_title_inner top_panel_inner_style_<?php echo esc_attr(str_replace('header_', '', $top_panel_style)); ?> <?php echo (!empty($show_title) ? ' title_present_inner' : '') . (!empty($show_breadcrumbs) ? ' breadcrumbs_present_inner' : ''); ?>">
				<div class="content_wrap">
					<?php
					if ($show_title &&  !is_front_page()) {
						if ($show_navi) {
							?><div class="post_navi"><?php 
								previous_post_link( '<span class="post_navi_item post_navi_prev">%link</span>', '%title', true, '', 'product_cat' );
								echo '<span class="post_navi_delimiter"></span>';
								next_post_link( '<span class="post_navi_item post_navi_next">%link</span>', '%title', true, '', 'product_cat' );
							?></div><?php
						} else {
							?><h1 class="page_title"><?php echo wp_kses_post(tennisclub_get_blog_title()); ?></h1><?php
						}
					}
					if ($show_breadcrumbs &&  !is_front_page()) {
						?><div class="breadcrumbs"><?php if (!is_404()) tennisclub_show_breadcrumbs(); ?></div><?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
?>