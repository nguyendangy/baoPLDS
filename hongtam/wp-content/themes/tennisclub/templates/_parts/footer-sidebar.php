<?php
	$footer_show  = tennisclub_get_custom_option('show_sidebar_footer');
	$sidebar_name = tennisclub_get_custom_option('sidebar_footer');
	if (!tennisclub_param_is_off($footer_show) && is_active_sidebar($sidebar_name)) { 
		tennisclub_storage_set('current_sidebar', 'footer');
		?>
		<footer class="footer_wrap widget_area scheme_<?php echo esc_attr(tennisclub_get_custom_option('sidebar_footer_scheme')); ?>">
			<div class="footer_wrap_inner widget_area_inner">
				<div class="content_wrap">
					<div class="columns_wrap"><?php
					ob_start();
					do_action( 'before_sidebar' );
                    if ( is_active_sidebar( $sidebar_name ) ) {
                        dynamic_sidebar( $sidebar_name );
                    }
					do_action( 'after_sidebar' );
					$out = ob_get_contents();
					ob_end_clean();
					echo trim(chop(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out)));
					?></div>	<!-- /.columns_wrap -->
				</div>	<!-- /.content_wrap -->
			</div>	<!-- /.footer_wrap_inner -->
		</footer>	<!-- /.footer_wrap -->
		<?php
	}
?>