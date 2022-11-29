<?php
	$copyright_style = tennisclub_get_custom_option('show_copyright_in_footer');
	if (!tennisclub_param_is_off($copyright_style)) {
		?> 
		<div class="copyright_wrap copyright_style_<?php echo esc_attr($copyright_style); ?>  scheme_<?php echo esc_attr(tennisclub_get_custom_option('copyright_scheme')); ?>">
			<div class="copyright_wrap_inner">
				<div class="content_wrap">
					<?php
					if ($copyright_style == 'menu') {
						if (($menu = tennisclub_get_nav_menu('menu_footer'))!='') {
							echo trim($menu);
						}
					} else if ($copyright_style == 'socials') {
						echo trim(tennisclub_sc_socials(array('size'=>"tiny")));
					}
					?>
					<div class="copyright_text"><?php
                        $tennisclub_copyright = tennisclub_get_custom_option('footer_copyright');
                        $tennisclub_copyright = str_replace(array('{{Y}}', '{Y}'), date('Y'), $tennisclub_copyright);
                        echo wp_kses_post($tennisclub_copyright); ?></div>
				</div>
			</div>
		</div>
		<?php
	}
?>