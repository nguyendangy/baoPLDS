<?php
	if (tennisclub_get_custom_option('menu_toc_home')=='yes' && function_exists('tennisclub_sc_anchor'))
		echo trim(tennisclub_sc_anchor(array(
			'id' => "toc_home",
			'title' => esc_html__('Home', 'tennisclub'),
			'description' => esc_html__('{{Return to Home}} - ||navigate to home page of the site', 'tennisclub'),
			'icon' => "icon-home",
			'separator' => "yes",
			'url' => esc_url(home_url('/'))
			)
		)); 
	if (tennisclub_get_custom_option('menu_toc_top')=='yes' && function_exists('tennisclub_sc_anchor'))
		echo trim(tennisclub_sc_anchor(array(
			'id' => "toc_top",
			'title' => esc_html__('To Top', 'tennisclub'),
			'description' => esc_html__('{{Back to top}} - ||scroll to top of the page', 'tennisclub'),
			'icon' => "icon-double-up",
			'separator' => "yes")
		));	
?>