<?php
if (tennisclub_get_custom_option('show_slider')=='yes') { 
	$slider = tennisclub_get_custom_option('slider_engine');
	$slider_alias = $slider_ids = $slider_html = '';

	if ($slider == 'revo' && function_exists('tennisclub_exists_revslider') && tennisclub_exists_revslider()) {
		$slider_alias = tennisclub_get_custom_option('slider_alias');
		if (!empty($slider_alias)) $slider_html = tennisclub_do_shortcode('[rev_slider '.esc_attr($slider_alias).']');

	} else if ($slider == 'royal' && function_exists('tennisclub_exists_royalslider') && tennisclub_exists_royalslider()) {
		$slider_alias = get_new_royalslider($slider_alias);
		if (!empty($slider_alias)) $slider_html = tennisclub_do_shortcode('[rev_slider '.esc_attr($slider_alias).']');
		wp_enqueue_style(  'new-royalslider-core-css', NEW_ROYALSLIDER_PLUGIN_URL . 'lib/royalslider/royalslider.css', array(), null );
		wp_enqueue_script( 'new-royalslider-main-js', NEW_ROYALSLIDER_PLUGIN_URL . 'lib/royalslider/jquery.royalslider.min.js', array('jquery'), NEW_ROYALSLIDER_WP_VERSION, true );

	} else if ($slider == 'swiper') {
		$slider_pagination = tennisclub_get_custom_option("slider_pagination");
		$slider_alias = tennisclub_get_custom_option("slider_category");
		$slider_orderby = tennisclub_get_custom_option("slider_orderby");
		$slider_order = tennisclub_get_custom_option("slider_order");
		$slider_count = $slider_ids = tennisclub_get_custom_option("slider_posts");

		if (tennisclub_strpos($slider_ids, ',')!==false) {
			$slider_alias = '';
			$slider_count = 0;
		} else {
			$slider_ids = '';
			if (empty($slider_count)) $slider_count = 3;
		}

		$slider_interval = tennisclub_get_custom_option("slider_interval");

		if ($slider_count > 0 || !empty($slider_ids)) {
			$args = array(
				'custom'	=> "no",
				'crop'		=> "no",
				'controls'	=> "no",
				'engine'	=> $slider,
				'height'	=> max(100, tennisclub_get_custom_option('slider_height')),
				'titles'	=> tennisclub_get_custom_option("slider_infobox")
			);
			if ($slider_interval)	$args['interval'] = $slider_interval;
			if ($slider_alias)		$args['cat'] = $slider_alias;
			if ($slider_ids)		$args['ids'] = $slider_ids;
			if ($slider_count)		$args['count'] = $slider_count;
			if ($slider_orderby)	$args['orderby'] = $slider_orderby;
			if ($slider_order)		$args['order'] = $slider_order;
			if ($slider_pagination)	$args['pagination'] = $slider_pagination;
			
			$slider_html = tennisclub_sc_slider($args);
		}
	}

	// if slider selected
	if (!empty($slider_html)) {
		?>
		<section class="slider_wrap slider_<?php echo esc_attr(tennisclub_get_custom_option('slider_display')); ?> slider_engine_<?php echo esc_attr($slider); ?> slider_alias_<?php echo esc_attr($slider_alias); ?>">
			<?php tennisclub_show_layout($slider_html); ?>
		</section>
		<?php 
	}
}
?>