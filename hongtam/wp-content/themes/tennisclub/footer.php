<?php
/**
 * The template for displaying the footer.
 */

tennisclub_close_wrapper();    // <!-- </.content> -->

// Show main sidebar
get_sidebar();

if (tennisclub_get_custom_option('body_style') != 'fullscreen') tennisclub_close_wrapper();    // <!-- </.content_wrap> -->
?>

</div>        <!-- </.page_content_wrap> -->

<?php
// Footer Testimonials stream
require_once tennisclub_get_file_dir('templates/_parts/footer-testimonials.php');

// Footer sidebar
require_once tennisclub_get_file_dir('templates/_parts/footer-sidebar.php');

// Footer Twitter stream
require_once tennisclub_get_file_dir('templates/_parts/footer-twitter.php');

// Google map
require_once tennisclub_get_file_dir('templates/_parts/show-google-map.php');

// Footer contacts
require_once tennisclub_get_file_dir('templates/_parts/footer-contacts.php');

// Copyright area
require_once tennisclub_get_file_dir('templates/_parts/footer-copyright-area.php');

tennisclub_profiler_add_point(esc_html__('After Footer', 'tennisclub'));
?>

</div>    <!-- /.page_wrap -->

</div>        <!-- /.body_wrap -->

<?php
// Post/Page views counter
get_template_part(tennisclub_get_file_slug('templates/_parts/views-counter.php'));

// Login/Register
if (tennisclub_get_theme_option('show_login') == 'yes') {
	tennisclub_enqueue_popup();
	// Anyone can register ?
	if ((int)get_option('users_can_register') > 0) {
		get_template_part(tennisclub_get_file_slug('templates/_parts/popup-register.php'));
	}
	get_template_part(tennisclub_get_file_slug('templates/_parts/popup-login.php'));
}

// Front customizer
if (tennisclub_get_custom_option('show_theme_customizer') == 'yes') {
	get_template_part(tennisclub_get_file_slug('core/core.customizer/front.customizer.php'));
}

// Custom side block
if (tennisclub_get_custom_option('show_custom_side_block') == 'yes') {
	get_template_part(tennisclub_get_file_slug('templates/_parts/side-block.php'));
}
?>


<div class="custom_html_section">
		<?php echo wp_kses_post(tennisclub_get_custom_option('custom_code')); ?>
</div>

<?php
echo tennisclub_get_custom_option('gtm_code2');

wp_footer(); ?>

</body>
</html>