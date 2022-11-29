<?php 
/**
 * @package 	WordPress
 * @subpackage 	Travel Time
 * @version		1.2.8
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function travel_time_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'travel-time');
	$tabs['link'] = esc_attr__('Links', 'travel-time');
	$tabs['nav'] = esc_attr__('Navigation', 'travel-time');
	$tabs['heading'] = esc_attr__('Heading', 'travel-time');
	$tabs['other'] = esc_attr__('Other', 'travel-time');
	$tabs['google'] = esc_attr__('Google Fonts', 'travel-time');
	
	return $tabs;
}


function travel_time_options_font_sections() {
	$tab = travel_time_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'travel-time');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'travel-time');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'travel-time');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'travel-time');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'travel-time');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'travel-time');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function travel_time_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = travel_time_get_the_tab();
	}
	
	
	$cmsmasters_option = travel_time_get_global_options();
	
	
	$options = array();
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'travel-time' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'travel-time' . '_link_font', 
			'title' => esc_html__('Links Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'travel-time' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'travel-time'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'none', 
			'choices' => travel_time_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'travel-time' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'travel-time' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'400', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Raleway:300,400,500,600,700', 
				'font_size' => 			'60', 
				'line_height' => 		'66', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Raleway:300,400,500,600,700', 
				'font_size' => 			'22', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Raleway:300,400,500,600,700', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'travel-time' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'travel-time' . '_button_font', 
			'title' => esc_html__('Button Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'48', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'travel-time' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'travel-time' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Open+Sans:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'travel-time' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'travel-time'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Raleway:300,400,500,600,700', 
				'font_size' => 			'18', 
				'line_height' => 		'32', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'travel-time' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'travel-time'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => cmsmasters_google_fonts_list()
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'travel-time' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'travel-time'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'travel-time') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'travel-time') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'travel-time') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'travel-time') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'travel-time') . '|' . 'greek', 
				esc_html__('Greek Extended', 'travel-time') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'travel-time') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'travel-time') . '|' . 'japanese', 
				esc_html__('Korean', 'travel-time') . '|' . 'korean', 
				esc_html__('Thai', 'travel-time') . '|' . 'thai', 
				esc_html__('Bengali', 'travel-time') . '|' . 'bengali', 
				esc_html__('Devanagari', 'travel-time') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'travel-time') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'travel-time') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'travel-time') . '|' . 'hebrew', 
				esc_html__('Kannada', 'travel-time') . '|' . 'kannada', 
				esc_html__('Khmer', 'travel-time') . '|' . 'khmer', 
				esc_html__('Malayalam', 'travel-time') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'travel-time') . '|' . 'myanmar', 
				esc_html__('Oriya', 'travel-time') . '|' . 'oriya', 
				esc_html__('Sinhala', 'travel-time') . '|' . 'sinhala', 
				esc_html__('Tamil', 'travel-time') . '|' . 'tamil', 
				esc_html__('Telugu', 'travel-time') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return $options;	
}

