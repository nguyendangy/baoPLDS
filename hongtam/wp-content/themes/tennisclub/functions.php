<?php
/**
 * Theme sprecific functions and definitions
 */

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

/* Theme setup section
------------------------------------------------------------------- */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1170; /* pixels */

// Add theme specific actions and filters
// Attention! Function were add theme specific actions and filters handlers must have priority 1
if ( !function_exists( 'tennisclub_theme_setup' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_theme_setup', 1 );
	function tennisclub_theme_setup() {

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom header setup
		add_theme_support( 'custom-header', array('header-text'=>false));

		// Custom backgrounds setup
		add_theme_support( 'custom-background');

		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') );

		// Autogenerate title tag
		add_theme_support('title-tag');

		// Add user menu
		add_theme_support('nav-menus');

		// WooCommerce Support
		add_theme_support( 'woocommerce' );

		// Add wide and full blocks support
		add_theme_support( 'align-wide' );

		// Register theme menus
		add_filter( 'tennisclub_filter_add_theme_menus',		'tennisclub_add_theme_menus' );

		// Register theme sidebars
		add_filter( 'tennisclub_filter_add_theme_sidebars',	'tennisclub_add_theme_sidebars' );

		// Add theme required plugins
		add_filter( 'tennisclub_filter_required_plugins',		'tennisclub_add_required_plugins' );
		
		// Add theme specified classes into the body
		add_filter( 'body_class', 'tennisclub_body_classes' );

		// Set list of the theme required plugins
		tennisclub_storage_set('required_plugins', array(
			'booked',
			'essgrids',
			'revslider',
			'tribe_events',
			'trx_utils',
			'visual_composer',
			'woocommerce',
			'weather-atlas',
			'contact-form-7',
			'trx_updater',
			'elegro-payment',
			'mailchimp-for-wp'
			)
		);

		// Set list of the theme required custom fonts from folder /css/font-faces
		// Attention! Font's folder must have name equal to the font's name
		tennisclub_storage_set('required_custom_fonts', array(
			'Amadeus'
			)
		);
		
		tennisclub_storage_set('demo_data_url',  TENNISCLUB_THEME_PATH . 'demo/');

	}
}


// Add page meta to the head
if (!function_exists('tennisclub_head_add_page_meta')) {
    add_action('wp_head', 'tennisclub_head_add_page_meta', 1);
    function tennisclub_head_add_page_meta() {

        $favicon = tennisclub_get_custom_option('favicon');
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1<?php if (tennisclub_get_theme_option('responsive_layouts')=='yes') echo ', maximum-scale=1'; ?>">
        <meta name="format-detection" content="telephone=no">
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo trim($favicon); ?>' />
        <link rel="profile" href="//gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php
        if (($preloader=tennisclub_get_theme_option('page_preloader'))!='') {
            $clr = tennisclub_get_scheme_color('bg_color');
            $custom_style = "#page_preloader { background-color: " . esc_attr($clr) . "; background-image:url(" . esc_url($preloader) . ");" . "background-position:center; background-repeat:no-repeat; position:fixed; z-index:1000000; left:0; top:0; right:0; bottom:0; opacity: 0.8;"."}";
            wp_add_inline_style('tennisclub-main-style', $custom_style);
        }
    }
}


// Add/Remove theme nav menus
if ( !function_exists( 'tennisclub_add_theme_menus' ) ) {
	function tennisclub_add_theme_menus($menus) {
		return $menus;
	}
}


// Add theme specific widgetized areas
if ( !function_exists( 'tennisclub_add_theme_sidebars' ) ) {
	
	function tennisclub_add_theme_sidebars($sidebars=array()) {
		if (is_array($sidebars)) {
			$theme_sidebars = array(
				'sidebar_main'		=> esc_html__( 'Main Sidebar', 'tennisclub' ),
				'sidebar_footer'	=> esc_html__( 'Footer Sidebar', 'tennisclub' ),
                'sidebar_footer_2'	=> esc_html__( 'Footer Sidebar 2', 'tennisclub' )
			);
			if (function_exists('tennisclub_exists_woocommerce') && tennisclub_exists_woocommerce()) {
				$theme_sidebars['sidebar_cart']  = esc_html__( 'WooCommerce Cart Sidebar', 'tennisclub' );
			}
			$sidebars = array_merge($theme_sidebars, $sidebars);
		}
		return $sidebars;
	}
}


// Add theme required plugins
if ( !function_exists( 'tennisclub_add_required_plugins' ) ) {
	
	function tennisclub_add_required_plugins($plugins) {
		$plugins[] = array(
			'name' 		=> esc_html__('ThemeREX Utilities', 'tennisclub'),
			'version'	=> '3.1.7',					// Minimal required version
			'slug' 		=> 'trx_utils',
			'source'	=> tennisclub_get_file_dir('plugins/install/trx_utils.zip'),
			'required' 	=> true
		);
		return $plugins;
	}
}


//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'tennisclub_importer_set_options' ) ) {
    add_filter( 'trx_utils_filter_importer_options', 'tennisclub_importer_set_options', 9 );
    function tennisclub_importer_set_options( $options=array() ) {
        if ( is_array( $options ) ) {
            // Save or not installer's messages to the log-file
            $options['debug'] = false;

            // Prepare demo data
            if ( is_dir( TENNISCLUB_THEME_PATH . 'demo/' ) ) {
                $options['demo_url'] = TENNISCLUB_THEME_PATH . 'demo/';
            } else {
                $options['demo_url'] = esc_url( tennisclub_get_protocol().'://demofiles.themerex.net/tennisclub/' ); // Demo-site domain
            }

            // Required plugins
            $options['required_plugins'] =  array(
                'booked',
                'essential-grid',
                'revslider',
                'tribe_events',
                'trx_utils',
                'js_composer',
                'woocommerce',
                'wpcloudy',
                'contact-form-7',
                'mailchimp-for-wp'
            );

            $options['theme_slug'] = 'tennisclub';

            // Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
            // Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
            $options['regenerate_thumbnails'] = 3;
            // Default demo
            $options['files']['default']['title'] = esc_html__( 'Tennisclub Demo', 'tennisclub' );
            $options['files']['default']['domain_dev'] = esc_url( tennisclub_get_protocol().'://tennisclub.themerex.net'); // Developers domain
            $options['files']['default']['domain_demo']= esc_url( tennisclub_get_protocol().'://tennisclub.themerex.net'); // Demo-site domain

        }
        return $options;
    }
}

// Add data to the head and to the beginning of the body
//------------------------------------------------------------------------

// Add theme specified classes to the body tag
if ( !function_exists('tennisclub_body_classes') ) {
		
	function tennisclub_body_classes( $classes ) {

				$classes[] = 'tennisclub_body';
				$classes[] = 'body_style_' . trim(tennisclub_get_custom_option('body_style'));
				$classes[] = 'body_' . (tennisclub_get_custom_option('body_filled')=='yes' ? 'filled' : 'transparent');
				$classes[] = 'theme_skin_' . trim(tennisclub_get_custom_option('theme_skin'));
				$classes[] = 'article_style_' . trim(tennisclub_get_custom_option('article_style'));
	
				$blog_style = tennisclub_get_custom_option(is_singular() && !tennisclub_storage_get('blog_streampage') ? 'single_style' : 'blog_style');
				$classes[] = 'layout_' . trim($blog_style);
				$classes[] = 'template_' . trim(tennisclub_get_template_name($blog_style));
	
				$body_scheme = tennisclub_get_custom_option('body_scheme');
				if (empty($body_scheme)  || tennisclub_is_inherit_option($body_scheme)) $body_scheme = 'original';
		$classes[] = 'scheme_' . $body_scheme;

		$top_panel_position = tennisclub_get_custom_option('top_panel_position');
		if (!tennisclub_param_is_off($top_panel_position)) {
						$classes[] = 'top_panel_show';
						$classes[] = 'top_panel_' . trim($top_panel_position);
					} else 
						$classes[] = 'top_panel_hide';
		$classes[] = tennisclub_get_sidebar_class();

		if (tennisclub_get_custom_option('show_video_bg')=='yes' && (tennisclub_get_custom_option('video_bg_youtube_code')!='' || tennisclub_get_custom_option('video_bg_url')!=''))
						$classes[] = 'video_bg_show';

		if (!tennisclub_param_is_off(tennisclub_get_theme_option('page_preloader')))
						$classes[] = 'preloader';

		return $classes;
	}
}


// Add class trx_utils_activated
if(!function_exists('tennisclub_add_body_class')) {
    if(!function_exists ( 'trx_utils_require_shortcode')){
        add_filter( 'body_class', 'tennisclub_add_body_class' );
        function tennisclub_add_body_class($classes){
            $classes[] = 'default_header';
            return $classes;
        }
    }
}

// Add theme required plugins
if ( !function_exists( 'tennisclub_add_trx_utils' ) ) {
    add_filter( 'trx_utils_active', 'tennisclub_add_trx_utils' );
    function tennisclub_add_trx_utils($enable=true) {
        return true;
    }
}

// Gutenberg support
add_theme_support( 'align-wide' );

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'tennisclub_trx_utils_privacy_text' ) ) {
    add_filter('trx_utils_filter_privacy_text', 'tennisclub_trx_utils_privacy_text');
    function tennisclub_trx_utils_privacy_text($text = '')
    {
        return tennisclub_get_privacy_text();
    }
}
// Include framework core files
//-------------------------------------------------------------------
require_once trailingslashit( get_template_directory() ) . 'fw/loader.php';
?>