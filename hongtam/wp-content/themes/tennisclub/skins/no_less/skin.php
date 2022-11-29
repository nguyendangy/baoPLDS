<?php
/**
 * Skin file for the theme.
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Theme init
if ( !function_exists( 'tennisclub_options_settings_theme_setup' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_options_settings_theme_setup3', 3 );	// Priority 1 for add tennisclub_filter handlers, 2 for create Theme Options
	function tennisclub_options_settings_theme_setup3() {
		global $TENNISCLUB_GLOBALS;
		$TENNISCLUB_GLOBALS['options']['top_panel_scheme']['options']		= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['sidebar_main_scheme']['options']	= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['sidebar_outer_scheme']['options']	= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['sidebar_footer_scheme']['options']= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['testimonials_scheme']['options']	= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['twitter_scheme']['options']		= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['contacts_scheme']['options']		= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
		$TENNISCLUB_GLOBALS['options']['copyright_scheme']['options']		= $TENNISCLUB_GLOBALS['options_params']['list_bg_tints'];
	}
}

if (!function_exists('tennisclub_action_skin_theme_setup')) {
	add_action( 'tennisclub_action_init_theme', 'tennisclub_action_skin_theme_setup', 1 );
	function tennisclub_action_skin_theme_setup() {

		// Disable less compilation
		tennisclub_set_theme_setting('less_compiler', 'no');
		// Disable customizer demo
		tennisclub_set_theme_setting('customizer_demo', false);

		// Add skin fonts in the used fonts list
		add_filter('tennisclub_filter_used_fonts',			'tennisclub_filter_skin_used_fonts');
		// Add skin fonts (from Google fonts) in the main fonts list (if not present).
		add_filter('tennisclub_filter_list_fonts',			'tennisclub_filter_skin_list_fonts');

		// Add skin stylesheets
		add_action('tennisclub_action_add_styles',			'tennisclub_action_skin_add_styles');
		// Add skin inline styles
		add_filter('tennisclub_filter_add_styles_inline',		'tennisclub_filter_skin_add_styles_inline');
		// Add skin responsive styles
		add_action('tennisclub_action_add_responsive',		'tennisclub_action_skin_add_responsive');
		// Add skin responsive inline styles
		add_filter('tennisclub_filter_add_responsive_inline',	'tennisclub_filter_skin_add_responsive_inline');

		// Add skin scripts
		add_action('tennisclub_action_add_scripts',			'tennisclub_action_skin_add_scripts');
		// Add skin scripts inline
		add_filter('tennisclub_action_add_scripts_inline',	'tennisclub_action_skin_add_scripts_inline');

		// Add skin less files into list for compilation
		add_filter('tennisclub_filter_compile_less',			'tennisclub_filter_skin_compile_less');


		/* Color schemes
		
		// Accenterd colors
		accent1			- theme accented color 1
		accent1_hover	- theme accented color 1 (hover state)
		accent2			- theme accented color 2
		accent2_hover	- theme accented color 2 (hover state)
		*/

		// Add color schemes
		tennisclub_add_color_scheme('original', array(

			'title'					=> esc_html__('Original', 'tennisclub'),

			// Accent colors
			'accent1'				=> '#96bd42',
			'accent1_hover'			=> '#7ca813',


			)
		);



		/* Font slugs:
		h1 ... h6	- headers
		p			- plain text
		link		- links
		info		- info blocks (Posted 15 May, 2015 by John Doe)
		menu		- main menu
		submenu		- dropdown menus
		logo		- logo text
		button		- button's caption
		input		- input fields
		*/

		// Add Custom fonts
		tennisclub_add_custom_font('h1', array(
			'title'			=> esc_html__('Heading 1', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '4.643em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '0.5em',
			'margin-bottom'	=> '0.55em'
			)
		);
		tennisclub_add_custom_font('h2', array(
			'title'			=> esc_html__('Heading 2', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '3.929em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '0.6667em',
			'margin-bottom'	=> '0.4em'
			)
		);
		tennisclub_add_custom_font('h3', array(
			'title'			=> esc_html__('Heading 3', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '2.857em',
			'font-weight'	=> '500',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '0.6667em',
			'margin-bottom'	=> '0.4em'
			)
		);
		tennisclub_add_custom_font('h4', array(
			'title'			=> esc_html__('Heading 4', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '1.643em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '1.2em',
			'margin-bottom'	=> '0.6em'
			)
		);
		tennisclub_add_custom_font('h5', array(
			'title'			=> esc_html__('Heading 5', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '1.214em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '1.2em',
			'margin-bottom'	=> '0.5em'
			)
		);
		tennisclub_add_custom_font('h6', array(
			'title'			=> esc_html__('Heading 6', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '1em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '125%',
			'margin-top'	=> '1.25em',
			'margin-bottom'	=> '0.65em'
			)
		);
		tennisclub_add_custom_font('p', array(
			'title'			=> esc_html__('Text', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> 'Open Sans',
			'font-size' 	=> '14px',
			'font-weight'	=> '400',
			'font-style'	=> '',
			'line-height'	=> '2.000em',
			'margin-top'	=> '',
			'margin-bottom'	=> '1em'
			)
		);
		tennisclub_add_custom_font('link', array(
			'title'			=> esc_html__('Links', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> ''
			)
		);
		tennisclub_add_custom_font('info', array(
			'title'			=> esc_html__('Post info', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> '',
			'line-height'	=> '1.3em',
			'margin-top'	=> '',
			'margin-bottom'	=> '2.6em'
			)
		);
		tennisclub_add_custom_font('menu', array(
			'title'			=> esc_html__('Main menu items', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> '',
			'line-height'	=> '1.3em',
			'margin-top'	=> '1.8em',
			'margin-bottom'	=> '1.8em'
			)
		);
		tennisclub_add_custom_font('submenu', array(
			'title'			=> esc_html__('Dropdown menu items', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> '',
			'line-height'	=> '1.3em',
			'margin-top'	=> '0.5em',
			'margin-bottom'	=> '0.5em'
			)
		);
		tennisclub_add_custom_font('logo', array(
			'title'			=> esc_html__('Logo', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '2.8571em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '0.75em',
			'margin-top'	=> '',
			'margin-bottom'	=> ''
			)
		);
		tennisclub_add_custom_font('button', array(
			'title'			=> esc_html__('Buttons', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> '',
			'line-height'	=> '1.3em'
			)
		);
		tennisclub_add_custom_font('input', array(
			'title'			=> esc_html__('Input fields', 'tennisclub'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> '',
			'line-height'	=> '1.3em'
			)
		);

	}
}





//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
if (!function_exists('tennisclub_filter_skin_used_fonts')) {
	
	function tennisclub_filter_skin_used_fonts($theme_fonts) {
		$theme_fonts['Open Sans'] = 1;
		$theme_fonts['Montserrat'] = 1;
		return $theme_fonts;
	}
}

// Add skin fonts (from Google fonts) in the main fonts list (if not present).
// To use custom font-face you not need add it into list in this function
// How to install custom @font-face fonts into the theme?
// All @font-face fonts are located in "theme_name/css/font-face/" folder in the separate subfolders for the each font. Subfolder name is a font-family name!
// Place full set of the font files (for each font style and weight) and css-file named stylesheet.css in the each subfolder.
// Create your @font-face kit by using Fontsquirrel @font-face Generator (http://www.fontsquirrel.com/fontface/generator)
// and then extract the font kit (with folder in the kit) into the "theme_name/css/font-face" folder to install
if (!function_exists('tennisclub_filter_skin_list_fonts')) {
	
	function tennisclub_filter_skin_list_fonts($list) {
		// Example:

		return $list;
	}
}



//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------
// Add skin stylesheets
if (!function_exists('tennisclub_action_skin_add_styles')) {
	
	function tennisclub_action_skin_add_styles() {
		// Add stylesheet files
		wp_enqueue_style( 'tennisclub-skin-style', tennisclub_get_file_url('skin.css'), array(), null );
		if (file_exists(tennisclub_get_file_dir('skin.customizer.css')))
			wp_enqueue_style( 'tennisclub-skin-customizer-style', tennisclub_get_file_url('skin.customizer.css'), array(), null );
	}
}

// Add skin inline styles
if (!function_exists('tennisclub_filter_skin_add_styles_inline')) {
	
	function tennisclub_filter_skin_add_styles_inline($custom_style) {

		$clr = tennisclub_get_scheme_colors();
		$clr['accent1_rgb'] = tennisclub_hex2rgb($clr['accent1']);
		$clr['accent1_hover_rgb'] = tennisclub_hex2rgb($clr['accent1_hover']);
		$fnt = tennisclub_get_custom_fonts_properties();
		$css = '

body {
	'.tennisclub_get_custom_font_css('p').';
}

h1 { '.tennisclub_get_custom_font_css('h1').'; '.tennisclub_get_custom_margins_css('h1').'; }
h2 { '.tennisclub_get_custom_font_css('h2').'; '.tennisclub_get_custom_margins_css('h2').'; }
h3 { '.tennisclub_get_custom_font_css('h3').'; '.tennisclub_get_custom_margins_css('h3').'; }
h4 { '.tennisclub_get_custom_font_css('h4').'; '.tennisclub_get_custom_margins_css('h4').'; }
h5 { '.tennisclub_get_custom_font_css('h5').'; '.tennisclub_get_custom_margins_css('h5').'; }
h6 { '.tennisclub_get_custom_font_css('h6').'; '.tennisclub_get_custom_margins_css('h6').'; }

.tribe-common .tribe-common-b2, .tribe-common .tribe-common-b3,
.tribe-common .tribe-common-b5, .tribe-common .tribe-events-c-top-bar__datepicker-button,
.tribe-common.tribe-events .datepicker .datepicker-switch,
.tribe-common .tribe-events-calendar-month__calendar-event-tooltip-datetime,
.tribe-common.tribe-events .datepicker .day, .tribe-common.tribe-events .datepicker .dow,
.tribe-common.tribe-events .tribe-events-calendar-list__event-date-tag-weekday,
.tribe-common.tribe-events .tribe-events-calendar-month__day-date,
.tribe-common.tribe-events .datepicker .datepicker-months .datepicker-switch,
.tribe-common.tribe-events .datepicker .month, .tribe-common.tribe-events .datepicker .year,
.tribe-common.tribe-events .tribe-events-c-view-selector__list-item-text,
.tribe-events-single a.tribe-events-ical, .tribe-events-single a.tribe-events-gcal,
.tribe-events-single a.tribe-events-ical:hover, .tribe-events-single a.tribe-events-gcal:hover,
.tribe-common.tribe-events .tribe-common-h7, .tribe-common.tribe-events .tribe-common-h8,
 .tribe-events-single-event-description p, .tribe-events-meta-group dt,
.tribe-events-meta-group dd, .tribe-common.tribe-events .tribe-events-c-nav__prev, .tribe-common.tribe-events .tribe-events-c-nav__next,
.tribe-events-single .tribe-events-nav-next a, .tribe-events-single .tribe-events-nav-previous a{
	'.tennisclub_get_custom_font_css('p').';
}

.tribe-common.tribe-events input::-webkit-input-placeholder { '.tennisclub_get_custom_font_css('p').';}
.tribe-common.tribe-events input::-moz-placeholder          { '.tennisclub_get_custom_font_css('p').';}/* Firefox 19+ */

.tribe-common .tribe-events-calendar-list__month-separator-text,
.tribe-common .tribe-events-calendar-day__type-separator-text, .tribe-events-single-event-title{
	'.tennisclub_get_custom_font_css('h2').';
}

.tribe-common.tribe-events h3.tribe-common-h7.tribe-events-calendar-month__calendar-event-tooltip-title,
.tribe-common--breakpoint-medium.tribe-common h3.tribe-common-h4--min-medium,
.tribe-common .tribe-events-calendar-month-mobile-events__mobile-event-title-link{
	'.tennisclub_get_custom_font_css('h3').';
}

.tribe-common.tribe-events .tribe-common-h5, .tribe-events-schedule h2{
	'.tennisclub_get_custom_font_css('h5').';
}

.tribe-common .tribe-common-c-btn, .tribe-common a.tribe-common-c-btn,
.tribe-common.tribe-events .tribe-common-c-btn-border-small, .tribe-common.tribe-events a.tribe-common-c-btn-border-small,
.tribe-common.tribe-events .tribe-events-c-ical__link, 
.tribe-common.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button{
	'.tennisclub_get_custom_font_css('p').';
}

a,
.scheme_dark a,
.scheme_light a {
	'.tennisclub_get_custom_font_css('link').';
	color: '.$clr['accent1'].';
}
a:hover,
.scheme_dark a:hover,
.scheme_light a:hover {
	color: '.$clr['accent1_hover'].';
}

.scheme_dark {
	background-color: '.$clr['accent1'].';
}

/* Accent1 color - use it as background and border with next classes */
.accent1 {			color: '.$clr['accent1'].'; }
.accent1_bgc {		background-color: '.$clr['accent1'].'; }
.accent1_bg {		background: '.$clr['accent1'].'; }
.accent1_border {	border-color: '.$clr['accent1'].'; }

a.accent1:hover {	color: '.$clr['accent1_hover'].'; }


/* 2.1 Common colors
-------------------------------------------------------------- */

/* Portfolio hovers */
.post_content.ih-item.circle.effect1.colored .info,
.post_content.ih-item.circle.effect2.colored .info,
.post_content.ih-item.circle.effect3.colored .info,
.post_content.ih-item.circle.effect4.colored .info,
.post_content.ih-item.circle.effect5.colored .info .info-back,
.post_content.ih-item.circle.effect6.colored .info,
.post_content.ih-item.circle.effect7.colored .info,
.post_content.ih-item.circle.effect8.colored .info,
.post_content.ih-item.circle.effect9.colored .info,
.post_content.ih-item.circle.effect10.colored .info,
.post_content.ih-item.circle.effect11.colored .info,
.post_content.ih-item.circle.effect12.colored .info,
.post_content.ih-item.circle.effect13.colored .info,
.post_content.ih-item.circle.effect14.colored .info,
.post_content.ih-item.circle.effect15.colored .info,
.post_content.ih-item.circle.effect16.colored .info,
.post_content.ih-item.circle.effect18.colored .info .info-back,
.post_content.ih-item.circle.effect19.colored .info,
.post_content.ih-item.circle.effect20.colored .info .info-back,
.post_content.ih-item.square.effect1.colored .info,
.post_content.ih-item.square.effect2.colored .info,
.post_content.ih-item.square.effect3.colored .info,
.post_content.ih-item.square.effect4.colored .mask1,
.post_content.ih-item.square.effect4.colored .mask2,
.post_content.ih-item.square.effect5.colored .info,
.post_content.ih-item.square.effect6.colored .info,
.post_content.ih-item.square.effect7.colored .info,
.post_content.ih-item.square.effect8.colored .info,
.post_content.ih-item.square.effect9.colored .info .info-back,
.post_content.ih-item.square.effect10.colored .info,
.post_content.ih-item.square.effect11.colored .info,
.post_content.ih-item.square.effect12.colored .info,
.post_content.ih-item.square.effect13.colored .info,
.post_content.ih-item.square.effect14.colored .info,
.post_content.ih-item.square.effect15.colored .info,
.post_content.ih-item.circle.effect20.colored .info .info-back,
.post_content.ih-item.square.effect_book.colored .info {
	background: '.$clr['accent1'].';
}

.post_content.ih-item.circle.effect1.colored .info,
.post_content.ih-item.circle.effect2.colored .info,
.post_content.ih-item.circle.effect5.colored .info .info-back,
.post_content.ih-item.circle.effect19.colored .info,
.post_content.ih-item.square.effect4.colored .mask1,
.post_content.ih-item.square.effect4.colored .mask2,
.post_content.ih-item.square.effect6.colored .info,
.post_content.ih-item.square.effect7.colored .info,
.post_content.ih-item.square.effect12.colored .info,
.post_content.ih-item.square.effect13.colored .info,
.post_content.ih-item.square.effect_more.colored .info,
.post_content.ih-item.square.effect_fade.colored:hover .info,
.post_content.ih-item.square.effect_dir.colored .info,
.post_content.ih-item.square.effect_shift.colored .info {
	background: rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6);
}

.post_content.ih-item.square.effect_fade.colored .info {
	background: -moz-linear-gradient(top, rgba(255,255,255,0) 70%, rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(70%,rgba(255,255,255,0)), color-stop(100%,rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6)));
	background: -webkit-linear-gradient(top, rgba(255,255,255,0) 70%, rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6) 100%);
	background: -o-linear-gradient(top, rgba(255,255,255,0) 70%, rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6) 100%);
	background: -ms-linear-gradient(top, rgba(255,255,255,0) 70%, rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6) 100%);
	background: linear-gradient(to bottom, rgba(255,255,255,0) 70%, rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6) 100%);
}

.post_content.ih-item.circle.effect17.colored:hover .img:before {
	-webkit-box-shadow: inset 0 0 0 110px rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6), inset 0 0 0 16px rgba(255, 255, 255, 0.8), 0 1px 2px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: inset 0 0 0 110px rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6), inset 0 0 0 16px rgba(255, 255, 255, 0.8), 0 1px 2px rgba(0, 0, 0, 0.1);
	box-shadow: inset 0 0 0 110px rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6), inset 0 0 0 16px rgba(255, 255, 255, 0.8), 0 1px 2px rgba(0, 0, 0, 0.1);
}

.post_content.ih-item.circle.effect1 .spinner {
	border-right-color: '.$clr['accent1'].';
	border-bottom-color: '.$clr['accent1'].';
}

/* Table of contents */
pre.code,
#toc .toc_item.current,
#toc .toc_item:hover {
	border-color: '.$clr['accent1'].';
}


::selection,
::-moz-selection { 
	background-color: '.$clr['accent1'].';
}



/* 3. Form fields settings
-------------------------------------------------------------- */

input[type="text"],
input[type="number"],
input[type="email"],
input[type="search"],
input[type="password"],
select,
textarea {
	'.tennisclub_get_custom_font_css('input').';
}


blockquote{
	background-color: '.$clr['accent1'].';
}

/* 7.1 Top panel
-------------------------------------------------------------- */

.top_panel_style_8 .top_panel_buttons .top_panel_cart_button:before {
	background-color: '.$clr['accent1'].';
}

.top_panel_top a:hover {
	color: '.$clr['accent1_hover'].';
}

/* User menu */
.menu_user_nav > li > a:hover {
	color: '.$clr['accent1_hover'].';
}

.menu_user_nav .top_panel_link a {
	background-color: '.$clr['accent1'].';
}


/* Top panel - middle area */
.logo .logo_text {
	'.tennisclub_get_custom_font_css('logo').';
}

/* Top panel (bottom area) */
.top_panel_bottom {
	background-color: '.$clr['accent1'].';
}

/* Main menu */
.menu_main_nav > li > a {
	padding:'.$fnt['menu_mt'].' 1.5em '.$fnt['menu_mb'].';
	'.tennisclub_get_custom_font_css('menu').';
}

.menu_user_nav .top_panel_link a {
	background-color: '.$clr['accent1'].';
}

.menu_user_nav .top_panel_link a:hover {
	background-color: '.$clr['accent1_hover'].';
}

.menu_main_nav > li ul {
	'.tennisclub_get_custom_font_css('submenu').';
}
.menu_main_nav > li > ul {
	top: calc('.$fnt['menu_mt'].'+'.$fnt['menu_mb'].'+'.$fnt['menu_lh'].');
}

.top_panel_inner_style_1 .menu_main_nav > li ul li a:hover,
.top_panel_inner_style_1 .menu_main_nav > li ul li.current-menu-item > a,
.top_panel_inner_style_1 .menu_main_nav > li ul li.current-menu-ancestor > a,
.top_panel_inner_style_2 .menu_main_nav > li ul li a:hover,
.top_panel_inner_style_2 .menu_main_nav > li ul li.current-menu-item > a,
.top_panel_inner_style_2 .menu_main_nav > li ul li.current-menu-ancestor > a {
	background-color: '.$clr['accent1_hover'].';
}


/* Responsive menu */
.menu_main_responsive_button {
	margin-top:'.$fnt['menu_mt'].';
	margin-bottom:'.$fnt['menu_mb'].';
}
.menu_main_responsive_button:hover {	
	color: '.$clr['accent1_hover'].'; 
}
.responsive_menu .top_panel_middle .menu_main_responsive_button {
	top: '.$fnt['logo_mt'].';
}
.responsive_menu .menu_main_responsive_button {
	margin-top:calc('.$fnt['menu_mt'].'*0.8);
	margin-bottom:calc('.$fnt['menu_mb'].'*0.6);
}

.top_panel_inner_style_1 .menu_main_responsive,
.top_panel_inner_style_2 .menu_main_responsive {
	background-color: '.$clr['accent1'].';
}
.top_panel_inner_style_1 .menu_main_responsive a:hover,
.top_panel_inner_style_2 .menu_main_responsive a:hover {
	background-color: '.$clr['accent1_hover'].'; 
}

/* Search field */
.top_panel_bottom .search_wrap,
.top_panel_inner_style_4 .search_wrap {
	padding-top:calc('.$fnt['menu_mt'].'*0.65);
	padding-bottom:calc('.$fnt['menu_mb'].'*0.5);
}
.top_panel_inner_style_1 .search_form_wrap,
.top_panel_inner_style_2 .search_form_wrap {
	background-color: rgba('.$clr['accent1_hover_rgb']['r'].','.$clr['accent1_hover_rgb']['g'].','.$clr['accent1_hover_rgb']['b'].', 0.2); 
}

.top_panel_icon {
	margin: calc('.$fnt['menu_mt'].'*0.7) 0 '.$fnt['menu_mb'].' 1em;
}
.top_panel_icon.search_wrap,
.top_panel_inner_style_5 .menu_main_responsive_button,
.top_panel_inner_style_6 .menu_main_responsive_button,
.top_panel_inner_style_7 .menu_main_responsive_button {
	color: '.$clr['accent1'].';
}
.top_panel_icon .contact_icon,
.top_panel_icon .search_submit {
	color: '.$clr['accent1'].';
}
.top_panel_middle a:hover .contact_icon,
.top_panel_icon.search_wrap:hover,
.top_panel_icon:hover .contact_icon,
.top_panel_icon:hover .search_submit,
.top_panel_inner_style_5 .menu_main_responsive_button:hover,
.top_panel_inner_style_6 .menu_main_responsive_button:hover,
.top_panel_inner_style_7 .menu_main_responsive_button:hover {
	background-color: '.$clr['accent1'].';
}

.content .search_wrap .search_submit{
	background-color: '.$clr['accent1'].';
}
.content .search_wrap .search_submit:hover{
	background-color: '.$clr['accent1_hover'].';
}

/* Search results */
.search_results .post_more,
.search_results .search_results_close {
	color: '.$clr['accent1'].';
}
.search_results .post_more:hover,
.search_results .search_results_close:hover {
	color: '.$clr['accent1_hover'].';
}
.top_panel_inner_style_1 .search_results,
.top_panel_inner_style_1 .search_results:after,
.top_panel_inner_style_2 .search_results,
.top_panel_inner_style_2 .search_results:after,
.top_panel_inner_style_3 .search_results,
.top_panel_inner_style_3 .search_results:after {
	background-color: '.$clr['accent1'].'; 
	border-color: '.$clr['accent1_hover'].'; 
}

/* Search - Page 404 */
.content .post_item_404 .search_wrap .search_submit {
	background-color: '.$clr['accent1'].';
}

.content .post_item_404 .search_wrap .search_submit:hover {
	background-color: '.$clr['accent1_hover'].';
}


/* Register and login popups */
.top_panel_inner_style_3 .popup_wrap a,
.top_panel_inner_style_3 .popup_wrap .sc_socials.sc_socials_type_icons a:hover,
.top_panel_inner_style_4 .popup_wrap a,
.top_panel_inner_style_4 .popup_wrap .sc_socials.sc_socials_type_icons a:hover,
.top_panel_inner_style_5 .popup_wrap a,
.top_panel_inner_style_5 .popup_wrap .sc_socials.sc_socials_type_icons a:hover {
	color: '.$clr['accent1'].'; 
}
.top_panel_inner_style_3 .popup_wrap a:hover,
.top_panel_inner_style_4 .popup_wrap a:hover,
.top_panel_inner_style_5 .popup_wrap a:hover {
	color: '.$clr['accent1_hover'].'; 
}


/* Header mobile */

.scheme_original .header_mobile .panel_middle{
	background-color: '.$clr['accent1'].';
}


.top_panel_title_inner .breadcrumbs a.breadcrumbs_item:hover {
	color: '.$clr['accent1_hover'].';
}

.header_mobile .search_wrap::before {
	color: '.$clr['accent1'].';
}

.header_mobile .top_panel_link{
	background-color: '.$clr['accent1'].';
}

.header_mobile .top_panel_link:hover{
	background-color: '.$clr['accent1_hover'].';
}

.top_panel_wrap .top_panel_top_user_area [class^="icon-"]::before, .top_panel_wrap [class*=" icon-"]::before {
	color: '.$clr['accent1'].';
}


/* 7.4 Main content wrapper
-------------------------------------------------------------- */

/* Layout Excerpt */
.post_title .post_icon {
	color: '.$clr['accent1'].';
}

/* Blog pagination */
.pagination > a {
	border-color: '.$clr['accent1'].';
}


/* 7.5 Post formats
-------------------------------------------------------------- */

/* Aside */
.post_format_aside.post_item_single .post_content p,
.post_format_aside .post_descr {
	background-color: '.$clr['accent1'].';
}

/* Link */
.post_format_link .post_descr a {
	color: '.$clr['accent1'].';
}

.post_format_link .post_descr a:hover {
	color: '.$clr['accent1_hover'].';
}

/* Status */
.post_format_status .post_descr p{
	background-color: '.$clr['accent1'].';
}


/* 7.6 Posts layouts
-------------------------------------------------------------- */

.post_info {
	'.tennisclub_get_custom_font_css('info').';
	'.tennisclub_get_custom_margins_css('info').';
}

.post_info a, .post_info a[class*="icon-"],  {
	color: '.$clr['accent1'].';
}

.post_info a:hover {
	color: '.$clr['accent1_hover'].';
}

.post_item .post_readmore:hover .post_readmore_label {
	color: '.$clr['accent1_hover'].';
}

/* Related posts */
.post_item_related .post_info a:hover,
.post_item_related .post_title a:hover {
	color: '.$clr['accent1_hover'].';
}


/* Style "Colored" */
.isotope_item_colored .post_featured .post_mark_new,
.isotope_item_colored .post_featured .post_title,
.isotope_item_colored .post_content.ih-item.square.colored .info {
	background-color: '.$clr['accent1'].';
}

.isotope_item_colored .post_category a,
.isotope_item_colored .post_rating .reviews_stars_bg,
.isotope_item_colored .post_rating .reviews_stars_hover,
.isotope_item_colored .post_rating .reviews_value {
	color: '.$clr['accent1'].';
}

.isotope_item_colored .post_info_wrap .post_button .sc_button {
	color: '.$clr['accent1'].';
}

.wp-block-search .wp-block-search__button{
    background-color: '.$clr['accent1'].';
}

.wp-block-search .wp-block-search__button:hover{
    background-color: '.$clr['accent1_hover'].';
}

/* Isotope filters */
.isotope_filters a.active,
.isotope_filters a:hover {
	border-color: '.$clr['accent1_hover'].';
	background-color: '.$clr['accent1_hover'].';
}



/* 7.7 Paginations
-------------------------------------------------------------- */

/* Style Pages and Slider */
 .pagination_pages > .active{
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}
.pagination_single a:hover,
.pagination_slider .pager_cur:hover,
.pagination_slider .pager_cur:focus,
.pagination_pages > a:hover {
	background-color: '.$clr['accent1_hover'].';
	border-color: '.$clr['accent1_hover'].';
}
.pagination_slider .pager_cur{
	color: '.$clr['accent1'].';
}

.pagination_wrap .pager_next,
.pagination_wrap .pager_prev,
.pagination_wrap .pager_last,
.pagination_wrap .pager_first {
	color: '.$clr['accent1'].';
}
.pagination_wrap .pager_next:hover,
.pagination_wrap .pager_prev:hover,
.pagination_wrap .pager_last:hover,
.pagination_wrap .pager_first:hover {
	color: '.$clr['accent1_hover'].';
}

.pagination_single .current {
    border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}


/* Style Load more */
.pagination_viewmore > a {
	background-color: '.$clr['accent1'].';
}
.pagination_viewmore > a:hover {
	background-color: '.$clr['accent1_hover'].';
}

/* Loader picture */
.viewmore_loader,
.mfp-preloader span,
.sc_video_frame.sc_video_active:before {
	background-color: '.$clr['accent1_hover'].';
}


/* 8 Single page parts
-------------------------------------------------------------- */


/* 8.1 Attachment and Portfolio post navigation
------------------------------------------------------------- */
.post_featured .post_nav_item:before {
	background-color: '.$clr['accent1'].';
}
.post_featured .post_nav_item .post_nav_info {
	background-color: '.$clr['accent1'].';
}


/* 8.2 Reviews block
-------------------------------------------------------------- */
.reviews_block .reviews_summary .reviews_item {
	background-color: '.$clr['accent1'].';
}
.reviews_block .reviews_summary,
.reviews_block .reviews_max_level_100 .reviews_stars_bg {
	background-color: '.$clr['accent1'].';
}
.reviews_block .reviews_max_level_100 .reviews_stars_hover,
.reviews_block .reviews_item .reviews_slider {
	background-color: '.$clr['accent1'].';
}
.reviews_block .reviews_item .reviews_stars_hover {
	color: '.$clr['accent1'].';
}

/* Summary stars in the post item (under the title) */
.post_item .post_rating .reviews_stars_bg,
.post_item .post_rating .reviews_stars_hover,
.post_item .post_rating .reviews_value {
	color: '.$clr['accent1'].';
}


/* 8.3 Post author
-------------------------------------------------------------- */
.post_author .post_author_title a {
	color: '.$clr['accent1'].';
}
.post_author .post_author_title a:hover {
	color: '.$clr['accent1_hover'].';
}



/* 8.4 Comments
-------------------------------------------------------- */
.comments_list_wrap ul.children,
.comments_list_wrap ul > li + li {
	border-top-color: '.$clr['accent1'].';
}
.comments_list_wrap .comment-respond {
	border-bottom-color: '.$clr['accent1'].';
}
.comments_list_wrap > ul {
	border-bottom-color: '.$clr['accent1'].';
}

.comments_list_wrap .comment_info > span.comment_author,
.comments_list_wrap .comment_info > .comment_date > .comment_date_value {
	color: '.$clr['accent1'].';
}


/* 8.5 Page 404
-------------------------------------------------------------- */
.post_item_404 .page_title,
.post_item_404 .page_subtitle {
	font-family: '.$fnt['logo_ff'].';
}

/* 8.5 Reservation Page
-------------------------------------------------------------- */
.reservation a:hover strong {
	color: '.$clr['accent1_hover'].';
}

/* 9. Sidebars
-------------------------------------------------------------- */

/* Side menu */
.sidebar_outer_menu .menu_side_nav > li > a,
.sidebar_outer_menu .menu_side_responsive > li > a {
	'.tennisclub_get_custom_font_css('menu').';
}

.sidebar_outer_menu .menu_side_nav > li ul,
.sidebar_outer_menu .menu_side_responsive > li ul {
	'.tennisclub_get_custom_font_css('submenu').';
}

.sidebar_outer_menu .menu_side_nav > li ul li a,
.sidebar_outer_menu .menu_side_responsive > li ul li a {
	padding: '.$fnt['submenu_mt'].' 1.5em '.$fnt['submenu_mb'].';
}

.sidebar_outer_menu .sidebar_outer_menu_buttons > a:hover,
.scheme_dark .sidebar_outer_menu .sidebar_outer_menu_buttons > a:hover,
.scheme_light .sidebar_outer_menu .sidebar_outer_menu_buttons > a:hover {
	color: '.$clr['accent1'].';
}

/* Common rules */

.widget_area_inner ul li:before,
.widget_area_inner ul li a:hover {
	color: '.$clr['accent1'].';
}

.widget_area_inner a:hover {
	color: '.$clr['accent1_hover'].';
}


.widget_area_inner .widget_text a,
.widget_area_inner .post_info a {
	color: '.$clr['accent1'].';
}
.widget_area_inner .widget_text a:hover,
.widget_area_inner .post_info a:hover {
	color: '.$clr['accent1_hover'].';
}


/* Widget: Calendar */
.widget_area_inner .widget_calendar td a:hover {
	background-color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}

.widget_area_inner .widget_calendar .today .day_wrap {
	background-color: '.$clr['accent1'].';
}


/* Widget: Tag Cloud */
.wp-block-tag-cloud a:hover,
.widget_area_inner .widget_product_tag_cloud a:hover,
.widget_area_inner .widget_tag_cloud a:hover {
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}

/*.widget_area_inner .widget_product_tag_cloud a:hover,
.widget_area_inner .widget_tag_cloud a:hover {
	color: '.$clr['accent1'].';
}*/

/* Widget: Newsletter */

.sc_emailer a.sc_emailer_button{
	background-color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}

.sc_emailer a.sc_emailer_button:hover{
	background-color: '.$clr['accent1_hover'].';
	border-color: '.$clr['accent1_hover'].';
}

/* 10. Footer areas
-------------------------------------------------------------- */

/* Twitter and testimonials */
.testimonials_wrap_inner,
.twitter_wrap_inner {
  background-color: '.$clr['accent1'].';
}

/* Copyright */
.copyright_wrap_inner .menu_footer_nav li a:hover,
.scheme_dark .copyright_wrap_inner .menu_footer_nav li a:hover,
.scheme_light .copyright_wrap_inner .menu_footer_nav li a:hover,
 .copyright_wrap_inner .copyright_text a:hover {
    color: '.$clr['accent1'].';
}


/* 11. Utils
-------------------------------------------------------------- */

/* Scroll to top */
.scroll_to_top {
	background-color: '.$clr['accent1'].';
}
.scroll_to_top:hover {
	background-color: '.$clr['accent1_hover'].';
}
.custom_options #co_toggle {
	background-color: '.$clr['accent1_hover'].' !important;
}

.custom_side_block, #csb_toggle{
	background-color: '.$clr['accent1'].';
}

#csb_toggle:hover{
	background-color: '.$clr['accent1_hover'].';
}

/* 13.2 WooCommerce
------------------------------------------------------ */

/* Theme colors */
.woocommerce .woocommerce-message:before, .woocommerce-page .woocommerce-message:before,
.woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price,.woocommerce ul.products li.product .price,.woocommerce-page ul.products li.product .price,
.woocommerce ul.cart_list li > .amount, .woocommerce ul.product_list_widget li > .amount, .woocommerce-page ul.cart_list li > .amount, .woocommerce-page ul.product_list_widget li > .amount,
.woocommerce ul.cart_list li span .amount, .woocommerce ul.product_list_widget li span .amount, .woocommerce-page ul.cart_list li span .amount, .woocommerce-page ul.product_list_widget li span .amount,
.woocommerce ul.cart_list li ins .amount, .woocommerce ul.product_list_widget li ins .amount, .woocommerce-page ul.cart_list li ins .amount, .woocommerce-page ul.product_list_widget li ins .amount,
.woocommerce.widget_shopping_cart .total .amount, .woocommerce .widget_shopping_cart .total .amount, .woocommerce-page.widget_shopping_cart .total .amount, .woocommerce-page .widget_shopping_cart .total .amount,
.woocommerce a:hover h3, .woocommerce-page a:hover h3,
.woocommerce .cart-collaterals .order-total strong, .woocommerce-page .cart-collaterals .order-total strong,
.woocommerce .checkout #order_review .order-total .amount, .woocommerce-page .checkout #order_review .order-total .amount,
.woocommerce .star-rating span, .woocommerce-page .star-rating span,
.widget_area_inner .widgetWrap ul > li .star-rating span, .woocommerce #review_form #respond .stars a, .woocommerce-page #review_form #respond .stars a,
.woocommerce .woocommerce-info:before,
.woocommerce p.stars.selected a:not(.active):before,
.woocommerce p.stars.selected a.active:before,
.woocommerce p.stars:hover a:before{
	color: '.$clr['accent1'].';
}

#btn-buy,
.woocommerce .woocommerce-info,
.woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message,
.woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active, .woocommerce #respond input#submit.alt:active, .woocommerce #content input.button.alt:active, .woocommerce-page a.button.alt:active, .woocommerce-page button.button.alt:active, .woocommerce-page input.button.alt:active, .woocommerce-page #respond input#submit.alt:active, .woocommerce-page #content input.button.alt:active,
.woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .woocommerce #respond input#submit:active, .woocommerce #content input.button:active, .woocommerce-page a.button:active, .woocommerce-page button.button:active, .woocommerce-page input.button:active, .woocommerce-page #respond input#submit:active, .woocommerce-page #content input.button:active
{ 
	border-top-color: '.$clr['accent1'].';
}

/* Buttons */
#btn-buy,
.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce-account .addresses .title .edit {
	background-color: '.$clr['accent1'].';
}
#btn-buy:hover,
.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-account .addresses .title .edit:hover,
.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit[disabled]:disabled:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button[disabled]:disabled:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button[disabled]:disabled:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button[disabled]:disabled:hover {
	background-color: '.$clr['accent1_hover'].';
}

/* Products stream */
.woocommerce ul.products li.product h3 a:hover, .woocommerce-page ul.products li.product h3 a:hover {
	color: '.$clr['accent1_hover'].';
}

.woocommerce ul.products li.product:hover .post_content,
.woocommerce .shop_mode_list ul.products li.product:hover .post_item_wrap{
	border-bottom-color: '.$clr['accent1'].';
}


/* Tabs */
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a {
	background-color: '.$clr['accent1'].';
}
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
	color: '.$clr['accent1_hover'].';
}

.woocommerce table.shop_attributes td p{
	color: '.$clr['accent1'].';
}

/* Pagination */
.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span.current {
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
	color: '.$clr['accent1'].';
}

/* Cart */
.woocommerce table.cart thead th, .woocommerce #content table.cart thead th, .woocommerce-page table.cart thead th, .woocommerce-page #content table.cart thead th {
	background-color: '.$clr['accent1'].';
}

/* Related Products */
.woocommerce .related.products h2:after{
	border-bottom-color: '.$clr['accent1'].';
}


/* 13.3 Tribe Events
------------------------------------------------------- */
.tribe-events-calendar thead th {
	background-color: '.$clr['accent1'].';
}

/* Buttons */
a.tribe-events-read-more,
.tribe-events-button,
.tribe-events-nav-previous a,
.tribe-events-nav-next a,
.tribe-events-widget-link a,
.tribe-events-viewmore a,
.tribe-events .tribe-events-c-nav__next,
.tribe-events .tribe-events-c-nav__prev,
.tribe-events-sub-nav li a,
.tribe-common.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button {
	background-color: '.$clr['accent1'].' !important;
}

a.tribe-events-read-more:hover,
.tribe-events-button:hover,
.tribe-events-nav-previous a:hover,
.tribe-events-nav-next a:hover,
.tribe-events-widget-link a:hover,
.tribe-events .tribe-events-c-nav__next:hover,
.tribe-events .tribe-events-c-nav__prev:hover,
.tribe-events-viewmore a:hover,
.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button.tribe-events-c-subscribe-dropdown__button--active, 
.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button:focus, 
.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button:focus-within, 
.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button:hover {
	background-color: '.$clr['accent1_hover'].' !important;
}

.tribe-events-event-meta a, .tribe-events-event-meta a{
	color: '.$clr['accent1'].';
}

.tribe-events-event-meta a:focus, .tribe-events-event-meta a:hover{
	color: '.$clr['accent1_hover'].';
}

.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date,
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date-link{
    color: '.$clr['accent1'].';
}

.tribe-common.tribe-events .tribe-common-anchor-thin-alt:active,
.tribe-common.tribe-events .tribe-common-anchor-thin-alt:focus,
.tribe-common.tribe-events .tribe-common-anchor-thin-alt:hover{
    color: '.$clr['accent1'].';
}

/* 13.4 BB Press and Buddy Press
------------------------------------------------------- */

/* Buttons */
#bbpress-forums div.bbp-topic-content a,
#buddypress button, #buddypress a.button, #buddypress input[type="submit"], #buddypress input[type="button"], #buddypress input[type="reset"], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, a.bp-title-button, #buddypress div.item-list-tabs ul li.selected a {
	background: '.$clr['accent1'].';
}
#bbpress-forums div.bbp-topic-content a:hover,
#buddypress button:hover, #buddypress a.button:hover, #buddypress input[type="submit"]:hover, #buddypress input[type="button"]:hover, #buddypress input[type="reset"]:hover, #buddypress ul.button-nav li a:hover, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, a.bp-title-button:hover, #buddypress div.item-list-tabs ul li.selected a:hover {
	background: '.$clr['accent1_hover'].';
}

#buddypress #reply-title small a span, #buddypress a.bp-primary-action span {
	color: '.$clr['accent1'].';
}


/* 13.7 WP-Cloudy
------------------------------------------------------- */
#wpc-weather{
	background-color: '.$clr['accent1'].';
}

/* 13.8 Essential Grid
------------------------------------------------------- */
.eg-tc-products-content:hover {
		border-color: '.$clr['accent1'].';
}

/* 13.9 Revolution Slider
------------------------------------------------------- */

.tparrows {
	background-color: '.$clr['accent1'].';
}
.tparrows:hover {
	background-color: '.$clr['accent1_hover'].';
}



/* 15. Shortcodes
-------------------------------------------------------------- */

/* Accordion */

.sc_accordion .sc_accordion_item .sc_accordion_title .sc_accordion_icon {
	background-color: '.$clr['accent1'].';
}

/* Audio */
.sc_audio .sc_audio_author_name {
	color: '.$clr['accent1'].';
}
.mejs-controls .mejs-replay,
.mejs-controls .mejs-play, 
.mejs-controls .mejs-pause, 
.mejs-controls .mejs-mute.mejs-button, 
.mejs-controls .mejs-unmute.mejs-button {
	background: '.$clr['accent1'].' !important;
}

.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-time-rail .mejs-time-current {
	background: '.$clr['accent1'].' !important;
}


/* Button */

input[type="submit"],
input[type="reset"],
input[type="button"],
button,
.sc_button {
	'.tennisclub_get_custom_font_css('button').';
}
.wp-block-button:not(.is-style-outline) .wp-block-button__link,
input[type="submit"],
input[type="reset"],
input[type="button"],
button{
	background-color: '.$clr['accent1'].';
}
.wp-block-button.is-style-outline .wp-block-button__link{
    color: '.$clr['accent1'].';
    border-color: '.$clr['accent1'].';
}

.sc_button .default-state{
	background-color: '.$clr['accent1'].';
}

.sc_button .active-state{
	background-color: '.$clr['accent1_hover'].';
}

.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover,
input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
button:hover{
	background-color: '.$clr['accent1_hover'].';
}

.wp-block-button.is-style-outline .wp-block-button__link:hover{
    color: '.$clr['accent1_hover'].';
    border-color: '.$clr['accent1_hover'].';
}

.sc_button.sc_button_style_border {
	border-color: '.$clr['accent1'].';
	color: '.$clr['accent1'].';
}
.sc_button.sc_button_style_border:hover {
	border-color: '.$clr['accent1_hover'].' !important;
}

.wp-block-search .wp-block-search__input,
button:focus,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
select:focus,
textarea:focus {
	border-color: '.$clr['accent1'].';
}


/* Blogger */
.sc_blogger.layout_date .sc_blogger_item .sc_blogger_date { 
	background-color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}
.sc_blogger.layout_polaroid .photostack nav span.current {
	background-color: '.$clr['accent1'].';
}
.sc_blogger.layout_polaroid .photostack nav span.current.flip {
	background-color: '.$clr['accent1_hover'].';
}


/* Call to Action */
.sc_call_to_action_accented {
	background-color: '.$clr['accent1'].';
}
.sc_call_to_action_accented .sc_item_button > a {
	color: '.$clr['accent1'].';
}
.sc_call_to_action_accented .sc_item_button > a:before {
	background-color: '.$clr['accent1'].';
}

/* Chat */

.sc_chat_inner a:hover {
  color: '.$clr['accent1_hover'].';
}

/* Clients */
.sc_clients_style_clients-2 .sc_client_title a:hover {
	color: '.$clr['accent1'].';
}
.sc_clients_style_clients-2 .sc_client_description:before,
.sc_clients_style_clients-2 .sc_client_position {
	color: '.$clr['accent1'].';
}

/* Contact form */
.sc_form .sc_form_item.sc_form_button button { 
	background-color: '.$clr['accent1'].';
}
.sc_form .sc_form_item.sc_form_button button:hover { 
	background-color: '.$clr['accent1_hover'].';
}

/* picker */
.sc_form table.picker__table th {
	background-color: '.$clr['accent1'].';
}
.sc_form .picker__day--today:before,
.sc_form .picker__button--today:before,
.sc_form .picker__button--clear:before,
.sc_form button:focus {
	border-color: '.$clr['accent1'].';
}
.sc_form .picker__button--close:before {
	color: '.$clr['accent1'].';
}
.sc_form .picker--time .picker__button--clear:hover,
.sc_form .picker--time .picker__button--clear:focus {
	background-color: '.$clr['accent1_hover'].';
}


/* Countdown Style 1 */
.sc_countdown.sc_countdown_style_1 .sc_countdown_digits,
.sc_countdown.sc_countdown_style_1 .sc_countdown_separator {
	color: '.$clr['accent1'].';
}
.sc_countdown.sc_countdown_style_1 .sc_countdown_label {
	color: '.$clr['accent1'].';
}

/* Countdown Style 2 */
.sc_countdown.sc_countdown_style_2 .sc_countdown_separator {
	color: '.$clr['accent1'].';
}
.sc_countdown.sc_countdown_style_2 .sc_countdown_digits span {
	background-color: '.$clr['accent1'].';
}
.sc_countdown.sc_countdown_style_2 .sc_countdown_label {
	color: '.$clr['accent1'].';
}

/* Dropcaps */
.sc_dropcaps.sc_dropcaps_style_1 .sc_dropcaps_item {
	background-color: '.$clr['accent1'].';
}


/* Events */
.sc_events_style_events-2 .sc_events_item_date {
	background-color: '.$clr['accent1'].';
}

/* Highlight */
.sc_highlight_style_1 {
	background-color: '.$clr['accent1'].';
}
.sc_highlight_style_2 {
	background-color: '.$clr['accent1_hover'].';
}


/* Icon */
.sc_icon_hover:hover,
a:hover .sc_icon_hover {
	background-color: '.$clr['accent1'].' !important; 
}

.sc_icon_shape_round.sc_icon,
.sc_icon_shape_square.sc_icon {	
	background-color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}

.sc_icon_shape_round.sc_icon:hover,
.sc_icon_shape_square.sc_icon:hover,
a:hover .sc_icon_shape_round.sc_icon,
a:hover .sc_icon_shape_square.sc_icon {
	color: '.$clr['accent1'].';
}


/* Image */
/*figure figcaption,
.sc_image figcaption {
	background-color: rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.6);
}*/


/* Infobox */
.sc_infobox.sc_infobox_style_success  {
	background-color: '.$clr['accent1'].';
}


/* List */
.sc_list_style_iconed li:before,
.sc_list_style_iconed .sc_list_icon {
	color: '.$clr['accent1'].';
}
.sc_list_style_iconed li a:hover .sc_list_title {
	color: '.$clr['accent1_hover'].';
}

/* Matches and Players */

/* Matches */

.match_block .player_country {
	background-color: '.$clr['accent1'].';
}
.sc_matches_next {
	background-color: '.$clr['accent1'].';
}

.match_date, .sc_match_date {
	color: '.$clr['accent1'].';
}


/* Players */

.post_item_single_players .post_title:after{
	background-color: '.$clr['accent1'].';
}

.sc_player .sc_player_info .sc_player_title a:hover{
	color: '.$clr['accent1_hover'].';
}

.sc_player .sc_player_info .sc_player_club,
.sc_player .sc_player_info .sc_player_title a:hover{
	color: '.$clr['accent1'].';
}

.sc_players_table .sort:after{
	color: '.$clr['accent1'].';
}

.sc_players_table .sort:hover:after{
	color: '.$clr['accent1_hover'].';
}


/* Popup */
.sc_popup:before {
	background-color: '.$clr['accent1'].';
}

/* Price block */



/* Section */
.sc_services_item .sc_services_item_readmore span {
	color: '.$clr['accent1'].';
}
.sc_services_item .sc_services_item_readmore:hover,
.sc_services_item .sc_services_item_readmore:hover span {
	color: '.$clr['accent1_hover'].';
}


/* Services */
.sc_services_item .sc_services_item_readmore span {
  color: '.$clr['accent1'].';
}
.sc_services_item .sc_services_item_readmore:hover,
.sc_services_item .sc_services_item_readmore:hover span {
  color: '.$clr['accent1_hover'].';
}
.sc_services_style_services-1 .sc_icon{
	color: '.$clr['accent1'].';
}
.sc_services_style_services-1 .sc_icon:hover,
.sc_services_style_services-1 a:hover .sc_icon {
	color: '.$clr['accent1_hover'].';
}

.sc_services_style_services-1 .sc_services_item .sc_services_item_description a:hover{
	color: '.$clr['accent1_hover'].';
}

.sc_services_style_services-3 a:hover .sc_icon,
.sc_services_style_services-3 .sc_icon:hover {
	color: '.$clr['accent1'].';
}
.sc_services_style_services-3 a:hover .sc_services_item_title {
	color: '.$clr['accent1'].';
}
.sc_services_style_services-4 .sc_icon {
	background-color: '.$clr['accent1'].';
}
.sc_services_style_services-4 a:hover .sc_icon,
.sc_services_style_services-4 .sc_icon:hover {
	background-color: '.$clr['accent1_hover'].';
}
.sc_services_style_services-4 a:hover .sc_services_item_title {
	color: '.$clr['accent1'].';
}


/* Scroll controls */
.sc_scroll_controls_wrap a {
	background-color: '.$clr['accent1'].';
}
.sc_scroll_controls_type_side .sc_scroll_controls_wrap a {
	background-color: rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.8);
}
.sc_scroll_controls_wrap a:hover {
	background-color: '.$clr['accent1_hover'].';
}
.sc_scroll_bar .swiper-scrollbar-drag:before {
	background-color: '.$clr['accent1'].';
}

/* Skills */
.sc_skills_counter .sc_skills_item .sc_skills_icon {
	color: '.$clr['accent1'].';
}
.sc_skills_counter .sc_skills_item:hover .sc_skills_icon {
	color: '.$clr['accent1_hover'].';
}
.sc_skills_bar .sc_skills_item .sc_skills_count {
	border-color: '.$clr['accent1'].';
}

.sc_skills_bar .sc_skills_item .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_3 .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_info {
	background-color: '.$clr['accent1'].';
}

/* Slider */
.sc_slider_controls_wrap a{
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}

.sc_slider_controls_wrap a:hover {
	border-color: '.$clr['accent1_hover'].';
	background-color: '.$clr['accent1_hover'].';
}
.sc_slider_swiper .sc_slider_pagination_wrap .swiper-pagination-bullet-active,
.sc_slider_swiper .sc_slider_pagination_wrap span:hover {
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}
.sc_slider_swiper .sc_slider_info {
	background-color: rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.8) !important;
}
.sc_slider_pagination_over .sc_slider_pagination_wrap span:hover,
.sc_slider_pagination_over .sc_slider_pagination_wrap .swiper-pagination-bullet-active {
	border-color: '.$clr['accent1'].';
	background-color: '.$clr['accent1'].';
}


/* Socials */



/* Tabs */
.sc_tabs .sc_tabs_titles li.ui-state-active a,
.sc_tabs .sc_tabs_titles li.sc_tabs_active a,
.sc_tabs .sc_tabs_titles li a:hover {
	background-color: '.$clr['accent1'].';
}
.sc_tabs .sc_tabs_titles li.ui-state-active a:after,
.sc_tabs .sc_tabs_titles li.sc_tabs_active a:after {
	background-color: '.$clr['accent1'].';
}



/* Team */
.sc_team_item .sc_team_item_info .sc_team_item_title a:hover {
	color: '.$clr['accent1_hover'].';
}
.sc_team_item .sc_team_item_info .sc_team_item_position {
	color: '.$clr['accent1'].';
}
.sc_team_style_team-1 .sc_team_item_info,
.sc_team_style_team-3 .sc_team_item_info {
	border-color: '.$clr['accent1'].';
}
.sc_team.sc_team_style_team-3 .sc_team_item_avatar .sc_team_item_hover {
	background-color: rgba('.$clr['accent1_rgb']['r'].','.$clr['accent1_rgb']['g'].','.$clr['accent1_rgb']['b'].', 0.8);
}
.sc_team.sc_team_style_team-4 .sc_socials_item a:hover {
	color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}
.sc_team_style_team-4 .sc_team_item_info .sc_team_item_title a:hover {
	color: '.$clr['accent1'].';
}


/* Testimonials */
.sc_testimonials_style_testimonials-1 {
	background-color: '.$clr['accent1'].';
}
.sc_testimonials.sc_testimonials_style_testimonials-1 .sc_slider_controls_wrap a {
	color: '.$clr['accent1'].';
}

.sc_testimonials_style_testimonials-3 .sc_testimonial_content p:first-child:before,
.sc_testimonials_style_testimonials-3 .sc_testimonial_author_position {
	color: '.$clr['accent1'].';
}
.sc_testimonials_style_testimonials-4 .sc_testimonial_content p:first-child:before,
.sc_testimonials_style_testimonials-4 .sc_testimonial_author_position {
	color: '.$clr['accent1'].';
}

/* Title */
.sc_title_icon {
	color: '.$clr['accent1'].';
}
.sc_title_underline::after {
	border-top-color: '.$clr['accent1'].';
}

/* Toggles */
.sc_toggles .sc_toggles_item .sc_toggles_title.ui-state-active {
	color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].';
}
.sc_toggles .sc_toggles_item .sc_toggles_title.ui-state-active .sc_toggles_icon_opened {
	background-color: '.$clr['accent1'].';
}
.sc_toggles .sc_toggles_item .sc_toggles_title:hover {
	color: '.$clr['accent1_hover'].';
	border-color: '.$clr['accent1_hover'].';
}
.sc_toggles .sc_toggles_item .sc_toggles_title:hover .sc_toggles_icon_opened {
	background-color: '.$clr['accent1_hover'].';
}

.content .myportfolio-container .added_to_cart.wc-forward {
    color: '.$clr['accent1'].';
}

.content .myportfolio-container .added_to_cart.wc-forward:hover {
    color: '.$clr['accent1_hover'].';
}



/* Tooltip */
.sc_tooltip_parent {
	color: '.$clr['accent1'].';
	border-color: '.$clr['accent1'].'
}

/* Video */

.hover_icon:before {
	background-color: '.$clr['accent1'].';
}

/*.hover_icon:hover:before {
	background-color: '.$clr['accent1_hover'].';
}*/

.woocommerce .hover_icon:before:hover {
	background-color: '.$clr['accent1_hover'].';
}

/* Common styles (title, subtitle and description for some shortcodes) */
.sc_item_subtitle {
	color: '.$clr['accent1'].';
}
.sc_item_title:after {
	background-color: '.$clr['accent1'].';
}
.sc_item_button > a:before {
	color: '.$clr['accent1'].';
}
.sc_item_button > a:hover:before {
	color: '.$clr['accent1_hover'].';
}
';		
		return $custom_style.$css;	
	}
}

// Add skin responsive styles
if (!function_exists('tennisclub_action_skin_add_responsive')) {
	
	function tennisclub_action_skin_add_responsive() {
		$suffix = tennisclub_param_is_off(tennisclub_get_custom_option('show_sidebar_outer')) ? '' : '-outer';
		if (file_exists(tennisclub_get_file_dir('skin.responsive'.($suffix).'.css'))) 
			wp_enqueue_style( 'theme-skin-responsive-style', tennisclub_get_file_url('skin.responsive'.($suffix).'.css'), array(), null );
	}
}

// Add skin responsive inline styles
if (!function_exists('tennisclub_filter_skin_add_responsive_inline')) {
	
	function tennisclub_filter_skin_add_responsive_inline($custom_style) {
		return $custom_style;	
	}
}

// Remove list files for compilation
if (!function_exists('tennisclub_filter_skin_compile_less')) {
	
	function tennisclub_filter_skin_compile_less($files) {
		return array();	
	}
}



//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
if (!function_exists('tennisclub_action_skin_add_scripts')) {
	
	function tennisclub_action_skin_add_scripts() {
		if (file_exists(tennisclub_get_file_dir('skin.js')))
			wp_enqueue_script( 'theme-skin-script', tennisclub_get_file_url('skin.js'), array(), null );
		if (tennisclub_get_theme_option('show_theme_customizer') == 'yes' && file_exists(tennisclub_get_file_dir('skin.customizer.js')))
			wp_enqueue_script( 'theme-skin-customizer-script', tennisclub_get_file_url('skin.customizer.js'), array(), null );
	}
}

// Add skin scripts inline
if (!function_exists('tennisclub_action_skin_add_scripts_inline')) {
    
    function tennisclub_action_skin_add_scripts_inline($vars=array()) {
        // Todo: add skin specific script's vars
        return $vars;
    }
}
?>