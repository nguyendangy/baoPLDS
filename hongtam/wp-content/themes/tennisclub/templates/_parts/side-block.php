<?php
$ccsb = tennisclub_get_custom_option('content_custom_side_block');
$ccsi = tennisclub_get_custom_option('custom_side_block_icon');


if($ccsb && !empty($ccsb)){ ?>
	<div class="custom_side_block_shadow"></div>

	<div id="custom_side_block" class="custom_side_block">

		<span id="csb_toggle" class="<?php echo esc_attr($ccsi ? $ccsi : 'icon-rain'); ?>"></span>
		<span class="icon-cancel-1"></span>
		<div>
			<?php echo do_shortcode($ccsb); ?>

		</div>


	</div><!-- .custom_side_block -->
	<?php
}
?>