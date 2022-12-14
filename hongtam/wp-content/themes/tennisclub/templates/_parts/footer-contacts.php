<?php
	if (tennisclub_get_custom_option('show_contacts_in_footer')=='yes') { 
		$address_1 = tennisclub_get_theme_option('contact_address_1');
		$address_2 = tennisclub_get_theme_option('contact_address_2');
		$phone = tennisclub_get_theme_option('contact_phone');
		$fax = tennisclub_get_theme_option('contact_fax');
		if (!empty($address_1) || !empty($address_2) || !empty($phone) || !empty($fax)) {
			?>
			<footer class="contacts_wrap scheme_<?php echo esc_attr(tennisclub_get_custom_option('contacts_scheme')); ?>">
				<div class="contacts_wrap_inner">
					<div class="content_wrap">
						<?php tennisclub_show_logo(false, false, true); ?>
						<div class="contacts_address">
							<address class="address_right">
								<?php if (!empty($phone)) echo esc_html__('Phone:', 'tennisclub') . ' ' . esc_html($phone) . '<br>'; ?>
								<?php if (!empty($fax)) echo esc_html__('Fax:', 'tennisclub') . ' ' . esc_html($fax); ?>
							</address>
							<address class="address_left">
								<?php if (!empty($address_2)) echo esc_html($address_2) . '<br>'; ?>
								<?php if (!empty($address_1)) echo esc_html($address_1); ?>
							</address>
						</div>
						<?php echo trim(tennisclub_sc_socials(array('size'=>"medium"))); ?>
					</div>	<!-- /.content_wrap -->
				</div>	<!-- /.contacts_wrap_inner -->
			</footer>	<!-- /.contacts_wrap -->
			<?php
		}
	}
?>