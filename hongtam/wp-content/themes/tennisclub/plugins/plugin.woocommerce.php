<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('tennisclub_woocommerce_theme_setup')) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_woocommerce_theme_setup', 1 );
	function tennisclub_woocommerce_theme_setup() {
		if (tennisclub_exists_woocommerce()) {
			add_action('tennisclub_action_add_styles', 				'tennisclub_woocommerce_frontend_scripts' );

			// Next setting from the WooCommerce 3.0+ enable built-in image zoom on the single product page
			add_theme_support( 'wc-product-gallery-zoom' );

			// Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
			add_theme_support( 'wc-product-gallery-slider' );

			// Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
			add_theme_support( 'wc-product-gallery-lightbox' );

			// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
			add_filter('tennisclub_filter_get_blog_type',				'tennisclub_woocommerce_get_blog_type', 9, 2);
			add_filter('tennisclub_filter_get_blog_title',			'tennisclub_woocommerce_get_blog_title', 9, 2);
			add_filter('tennisclub_filter_get_current_taxonomy',		'tennisclub_woocommerce_get_current_taxonomy', 9, 2);
			add_filter('tennisclub_filter_is_taxonomy',				'tennisclub_woocommerce_is_taxonomy', 9, 2);
			add_filter('tennisclub_filter_get_stream_page_title',		'tennisclub_woocommerce_get_stream_page_title', 9, 2);
			add_filter('tennisclub_filter_get_stream_page_link',		'tennisclub_woocommerce_get_stream_page_link', 9, 2);
			add_filter('tennisclub_filter_get_stream_page_id',		'tennisclub_woocommerce_get_stream_page_id', 9, 2);
			add_filter('tennisclub_filter_detect_inheritance_key',	'tennisclub_woocommerce_detect_inheritance_key', 9, 1);
			add_filter('tennisclub_filter_detect_template_page_id',	'tennisclub_woocommerce_detect_template_page_id', 9, 2);
			add_filter('tennisclub_filter_orderby_need',				'tennisclub_woocommerce_orderby_need', 9, 2);

			add_filter('tennisclub_filter_list_post_types', 			'tennisclub_woocommerce_list_post_types', 10, 1);
			
			// Detect if WooCommerce support 'Product Grid' feature
			$product_grid = tennisclub_exists_woocommerce() && function_exists( 'wc_get_theme_support' ) ? wc_get_theme_support( 'product_grid' ) : false;
			add_theme_support( 'wc-product-grid-enable', isset( $product_grid['min_columns'] ) && isset( $product_grid['max_columns'] ) );

		}

		if (is_admin()) {
			add_filter( 'tennisclub_filter_required_plugins',					'tennisclub_woocommerce_required_plugins' );
		}
	}
}

if ( !function_exists( 'tennisclub_woocommerce_settings_theme_setup2' ) ) {
	add_action( 'tennisclub_action_before_init_theme', 'tennisclub_woocommerce_settings_theme_setup2', 3 );
	function tennisclub_woocommerce_settings_theme_setup2() {
		if (tennisclub_exists_woocommerce()) {
			// Add WooCommerce pages in the Theme inheritance system
			tennisclub_add_theme_inheritance( array( 'woocommerce' => array(
				'stream_template' => 'blog-woocommerce',		// This params must be empty
				'single_template' => 'single-woocommerce',		// They are specified to enable separate settings for blog and single wooc
				'taxonomy' => array('product_cat'),
				'taxonomy_tags' => array('product_tag'),
				'post_type' => array('product'),
				'override' => 'page'
				) )
			);

			// Add WooCommerce specific options in the Theme Options

			tennisclub_storage_set_array_before('options', 'partition_service', array(
				
				"partition_woocommerce" => array(
					"title" => esc_html__('WooCommerce', 'tennisclub'),
					"icon" => "iconadmin-basket",
					"type" => "partition"),

				"info_wooc_1" => array(
					"title" => esc_html__('WooCommerce products list parameters', 'tennisclub'),
					"desc" => esc_html__("Select WooCommerce products list's style and crop parameters", 'tennisclub'),
					"type" => "info"),
		
				"shop_mode" => array(
					"title" => esc_html__('Shop list style',  'tennisclub'),
					"desc" => esc_html__("WooCommerce products list's style: thumbs or list with description", 'tennisclub'),
					"std" => "thumbs",
					"divider" => false,
					"options" => array(
						'thumbs' => esc_html__('Thumbs', 'tennisclub'),
						'list' => esc_html__('List', 'tennisclub')
					),
					"type" => "checklist"),
		
				"show_mode_buttons" => array(
					"title" => esc_html__('Show style buttons',  'tennisclub'),
					"desc" => esc_html__("Show buttons to allow visitors change list style", 'tennisclub'),
					"std" => "yes",
					"options" => tennisclub_get_options_param('list_yes_no'),
					"type" => "switch"),


				"show_currency" => array(
					"title" => esc_html__('Show currency selector', 'tennisclub'),
					"desc" => esc_html__('Show currency selector in the user menu', 'tennisclub'),
					"std" => "yes",
					"options" => tennisclub_get_options_param('list_yes_no'),
					"type" => "switch"),
		
				"show_cart" => array(
					"title" => esc_html__('Show cart button', 'tennisclub'),
					"desc" => esc_html__('Show cart button in the user menu', 'tennisclub'),
					"std" => "hide",
					"options" => array(
						'hide'   => esc_html__('Hide', 'tennisclub'),
						'always' => esc_html__('Always', 'tennisclub'),
						'shop'   => esc_html__('Only on shop pages', 'tennisclub')
					),
					"type" => "checklist"),

				"crop_product_thumb" => array(
					"title" => esc_html__("Crop product's thumbnail",  'tennisclub'),
					"desc" => esc_html__("Crop product's thumbnails on search results page or scale it", 'tennisclub'),
					"std" => "no",
					"options" => tennisclub_get_options_param('list_yes_no'),
					"type" => "switch")
				
				)
			);

		}
	}
}

// WooCommerce hooks
if (!function_exists('tennisclub_woocommerce_theme_setup3')) {
	add_action( 'tennisclub_action_after_init_theme', 'tennisclub_woocommerce_theme_setup3' );
	function tennisclub_woocommerce_theme_setup3() {
		if (tennisclub_exists_woocommerce()) {

			add_action(    'woocommerce_before_subcategory_title',		'tennisclub_woocommerce_open_thumb_wrapper', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'tennisclub_woocommerce_open_thumb_wrapper', 9 );

			add_action(    'woocommerce_before_subcategory_title',		'tennisclub_woocommerce_open_item_wrapper', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'tennisclub_woocommerce_open_item_wrapper', 20 );

			add_action(    'woocommerce_after_subcategory',				'tennisclub_woocommerce_close_item_wrapper', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'tennisclub_woocommerce_close_item_wrapper', 20 );

			add_action(    'woocommerce_after_shop_loop_item_title',	'tennisclub_woocommerce_after_shop_loop_item_title', 7);

			add_action(    'woocommerce_after_subcategory_title',		'tennisclub_woocommerce_after_subcategory_title', 10 );

            remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
            add_action( 'woocommerce_shop_loop_item_title',    'tennisclub_woocommerce_template_loop_product_title', 10 );
		}

		if (tennisclub_is_woocommerce_page()) {
			
			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );					// Remove WOOC sidebar
			
			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'tennisclub_woocommerce_wrapper_start', 10);
			
			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);		
			add_action(    'woocommerce_after_main_content',			'tennisclub_woocommerce_wrapper_end', 10);

			add_action(    'woocommerce_show_page_title',				'tennisclub_woocommerce_show_page_title', 10);

			remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_title', 5);		
			add_action(    'woocommerce_single_product_summary',		'tennisclub_woocommerce_show_product_title', 5 );

            remove_action(  'woocommerce_single_product_summary',       'woocommerce_template_single_excerpt', 20);
            add_action(    'woocommerce_single_product_summary',		'tennisclub_template_single_excerpt', 20 );

			add_action(    'woocommerce_before_shop_loop', 				'tennisclub_woocommerce_before_shop_loop', 10 );

			remove_action( 'woocommerce_after_shop_loop',				'woocommerce_pagination', 10 );
			add_action(    'woocommerce_after_shop_loop',				'tennisclub_woocommerce_pagination', 10 );

			add_action(    'woocommerce_product_meta_end',				'tennisclub_woocommerce_show_product_id', 10);

            if (tennisclub_param_is_on(tennisclub_get_custom_option('show_post_related'))) {
                add_filter('woocommerce_output_related_products_args', 'tennisclub_woocommerce_output_related_products_args');
                add_filter('woocommerce_related_products_args', 'tennisclub_woocommerce_related_products_args');
            } else {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
            }

			add_filter(    'woocommerce_product_thumbnails_columns',	'tennisclub_woocommerce_product_thumbnails_columns' );

			add_filter(    'get_product_search_form',					'tennisclub_woocommerce_get_product_search_form' );
			
			// Set columns number for the products loop
			if ( ! get_theme_support( 'wc-product-grid-enable' ) ) {
				/*add_filter(    'loop_shop_columns',							'tennisclub_woocommerce_loop_shop_columns' );*/
				add_filter(    'post_class',								'tennisclub_woocommerce_loop_shop_columns_class' );
				add_filter(    'product_cat_class',							'tennisclub_woocommerce_loop_shop_columns_class', 10, 3 );
			}
			add_action(    'the_title',									'tennisclub_woocommerce_the_title');
			
			tennisclub_enqueue_popup();
		}
	}
}



// Check if WooCommerce installed and activated
if ( !function_exists( 'tennisclub_exists_woocommerce' ) ) {
	function tennisclub_exists_woocommerce() {
		return class_exists('Woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'tennisclub_is_woocommerce_page' ) ) {
	function tennisclub_is_woocommerce_page() {
		$rez = false;
		if (tennisclub_exists_woocommerce()) {
			if (!tennisclub_storage_empty('pre_query')) {
				$id = tennisclub_storage_get_obj_property('pre_query', 'queried_object_id', 0);
				$rez = tennisclub_storage_call_obj_method('pre_query', 'get', 'post_type')=='product' 
						|| $id==wc_get_page_id('shop')
						|| $id==wc_get_page_id('cart')
						|| $id==wc_get_page_id('checkout')
						|| $id==wc_get_page_id('myaccount')
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', 'product_cat')
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', 'product_tag')
						|| tennisclub_storage_call_obj_method('pre_query', 'is_tax', get_object_taxonomies('product'));
						
			} else
				$rez = is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		}
		return $rez;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'tennisclub_woocommerce_detect_inheritance_key' ) ) {
	
	function tennisclub_woocommerce_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return tennisclub_is_woocommerce_page() ? 'woocommerce' : '';
	}
}

// Filter to detect current template page id
if ( !function_exists( 'tennisclub_woocommerce_detect_template_page_id' ) ) {
	
	function tennisclub_woocommerce_detect_template_page_id($id, $key) {
		if (!empty($id)) return $id;
		if ($key == 'woocommerce_cart')				$id = get_option('woocommerce_cart_page_id');
		else if ($key == 'woocommerce_checkout')	$id = get_option('woocommerce_checkout_page_id');
		else if ($key == 'woocommerce_account')		$id = get_option('woocommerce_account_page_id');
		else if ($key == 'woocommerce')				$id = get_option('woocommerce_shop_page_id');
		return $id;
	}
}

// Filter to detect current page type (slug)
if ( !function_exists( 'tennisclub_woocommerce_get_blog_type' ) ) {
	
	function tennisclub_woocommerce_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;
		
		if (is_shop()) 					$page = 'woocommerce_shop';
		else if ($query && $query->get('post_type')=='product' || is_product())		$page = 'woocommerce_product';
		else if ($query && $query->get('product_tag')!='' || is_product_tag())		$page = 'woocommerce_tag';
		else if ($query && $query->get('product_cat')!='' || is_product_category())	$page = 'woocommerce_category';
		else if (is_cart())				$page = 'woocommerce_cart';
		else if (is_checkout())			$page = 'woocommerce_checkout';
		else if (is_account_page())		$page = 'woocommerce_account';
		else if (is_woocommerce())		$page = 'woocommerce';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'tennisclub_woocommerce_get_blog_title' ) ) {
	
	function tennisclub_woocommerce_get_blog_title($title, $page) {
		if (!empty($title)) return $title;
		
		if ( tennisclub_strpos($page, 'woocommerce')!==false ) {
			if ( $page == 'woocommerce_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat', OBJECT);
				$title = $term->name;
			} else if ( $page == 'woocommerce_tag' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_tag' ), 'product_tag', OBJECT);
				$title = esc_html__('Tag:', 'tennisclub') . ' ' . esc_html($term->name);
			} else if ( $page == 'woocommerce_cart' ) {
				$title = esc_html__( 'Your cart', 'tennisclub' );
			} else if ( $page == 'woocommerce_checkout' ) {
				$title = esc_html__( 'Checkout', 'tennisclub' );
			} else if ( $page == 'woocommerce_account' ) {
				$title = esc_html__( 'Account', 'tennisclub' );
			} else if ( $page == 'woocommerce_product' ) {
				$title = tennisclub_get_post_title();
			} else if (($page_id=get_option('woocommerce_shop_page_id')) > 0) {
				$title = tennisclub_get_post_title($page_id);
			} else {
				$title = esc_html__( 'Shop', 'tennisclub' );
			}
		}
		
		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'tennisclub_woocommerce_get_stream_page_title' ) ) {
	
	function tennisclub_woocommerce_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (tennisclub_strpos($page, 'woocommerce')!==false) {
			if (($page_id = tennisclub_woocommerce_get_stream_page_id(0, $page)) > 0)
				$title = tennisclub_get_post_title($page_id);
			else
				$title = esc_html__('Shop', 'tennisclub');				
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'tennisclub_woocommerce_get_stream_page_id' ) ) {
	
	function tennisclub_woocommerce_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (tennisclub_strpos($page, 'woocommerce')!==false) {
			$id = get_option('woocommerce_shop_page_id');
		}
		return $id;
	}
}

// Filter to detect stream page link
if ( !function_exists( 'tennisclub_woocommerce_get_stream_page_link' ) ) {
	
	function tennisclub_woocommerce_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (tennisclub_strpos($page, 'woocommerce')!==false) {
			$id = tennisclub_woocommerce_get_stream_page_id(0, $page);
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'tennisclub_woocommerce_get_current_taxonomy' ) ) {
	
	function tennisclub_woocommerce_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( tennisclub_strpos($page, 'woocommerce')!==false ) {
			$tax = 'product_cat';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'tennisclub_woocommerce_is_taxonomy' ) ) {
	
	function tennisclub_woocommerce_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else 
			return $query!==null && $query->get('product_cat')!='' || is_product_category() ? 'product_cat' : '';
	}
}

// Return false if current plugin not need theme orderby setting
if ( !function_exists( 'tennisclub_woocommerce_orderby_need' ) ) {
	
	function tennisclub_woocommerce_orderby_need($need) {
		if ($need == false || tennisclub_storage_empty('pre_query'))
			return $need;
		else {
			return tennisclub_storage_call_obj_method('pre_query', 'get', 'post_type')!='product' 
					&& tennisclub_storage_call_obj_method('pre_query', 'get', 'product_cat')==''
					&& tennisclub_storage_call_obj_method('pre_query', 'get', 'product_tag')=='';
		}
	}
}

// Add custom post type into list
if ( !function_exists( 'tennisclub_woocommerce_list_post_types' ) ) {
	
	function tennisclub_woocommerce_list_post_types($list) {
		$list['product'] = esc_html__('Products', 'tennisclub');
		return $list;
	}
}


	
// Enqueue WooCommerce custom styles
if ( !function_exists( 'tennisclub_woocommerce_frontend_scripts' ) ) {
	
	function tennisclub_woocommerce_frontend_scripts() {
		if (tennisclub_is_woocommerce_page() || tennisclub_get_custom_option('show_cart')=='always')
			if (file_exists(tennisclub_get_file_dir('css/plugin.woocommerce.css')))
				wp_enqueue_style( 'tennisclub-plugin-woocommerce-style',  tennisclub_get_file_url('css/plugin.woocommerce.css'), array(), null );
	}
}

// Before main content
if ( !function_exists( 'tennisclub_woocommerce_wrapper_start' ) ) {
	
	
	function tennisclub_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item post_item_single post_item_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !tennisclub_storage_empty('shop_mode') ? tennisclub_storage_get('shop_mode') : 'thumbs'; ?>">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'tennisclub_woocommerce_wrapper_end' ) ) {
	
	
	function tennisclub_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article>	<!-- .post_item -->
			<?php
		} else {
			?>
			</div>	<!-- .list_products -->
			<?php
		}
	}
}

// Check to show page title
if ( !function_exists( 'tennisclub_woocommerce_show_page_title' ) ) {
	
	function tennisclub_woocommerce_show_page_title($defa=true) {
		return tennisclub_get_custom_option('show_page_title')=='no';
	}
}

// Check to show product title
if ( !function_exists( 'tennisclub_woocommerce_show_product_title' ) ) {
	
	
	function tennisclub_woocommerce_show_product_title() {
		if (tennisclub_get_custom_option('show_post_title')=='yes' || tennisclub_get_custom_option('show_page_title')=='no') {
			wc_get_template( 'single-product/title.php' );
		}
	}
}

// New product excerpt with video shortcode
if ( !function_exists( 'tennisclub_template_single_excerpt' ) ) {
    
    
    function tennisclub_template_single_excerpt() {
        if ( ! defined( 'ABSPATH' ) ) {
            exit; // Exit if accessed directly
        }
        global $post;
        if ( ! $post->post_excerpt ) {
            return;
        }
        ?>
        <div itemprop="description">
            <?php echo tennisclub_substitute_all(apply_filters( 'woocommerce_short_description', $post->post_excerpt )); ?>
        </div>
    <?php
    }
}

// Add list mode buttons
if ( !function_exists( 'tennisclub_woocommerce_before_shop_loop' ) ) {
	
	function tennisclub_woocommerce_before_shop_loop() {
		if (tennisclub_get_custom_option('show_mode_buttons')=='yes') {
			echo '<div class="mode_buttons"><form action="' . esc_url(tennisclub_get_current_url()) . '" method="post">'
				. '<input type="hidden" name="tennisclub_shop_mode" value="'.esc_attr(tennisclub_storage_get('shop_mode')).'" />'
				. '<a href="#" class="woocommerce_thumbs icon-th" title="'.esc_attr__('Show products as thumbs', 'tennisclub').'"></a>'
				. '<a href="#" class="woocommerce_list icon-th-list" title="'.esc_attr__('Show products as list', 'tennisclub').'"></a>'
				. '</form></div>';
		}
	}
}



if (!function_exists('tennisclub_del_link')) {
		add_action('tennisclub_action_after_init_theme', 'tennisclub_del_link', 10);
		function tennisclub_del_link() {
			remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
		}
	}



// Open thumbs wrapper for categories and products
if ( !function_exists( 'tennisclub_woocommerce_open_thumb_wrapper' ) ) {
	
	
	function tennisclub_woocommerce_open_thumb_wrapper($cat='') {
		tennisclub_storage_set('in_product_item', true);
		?>
		<div class="post_item_wrap">
			<div class="post_featured">
				<div class="post_thumb">
					<a class="hover_icon hover_icon_link" href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
		<?php
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'tennisclub_woocommerce_open_item_wrapper' ) ) {
	
	
	function tennisclub_woocommerce_open_item_wrapper($cat='') {
		?>
				</a>
			</div>
		</div>
		<div class="post_content">
		<?php
	}
}

// Close item wrapper for categories and products
if ( !function_exists( 'tennisclub_woocommerce_close_item_wrapper' ) ) {
	
	
	function tennisclub_woocommerce_close_item_wrapper($cat='') {
		?>
			</div>
		</div>
		<?php
		tennisclub_storage_set('in_product_item', false);
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'tennisclub_woocommerce_after_shop_loop_item_title' ) ) {
	
	function tennisclub_woocommerce_after_shop_loop_item_title() {
		if (tennisclub_storage_get('shop_mode') == 'list') {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			echo '<div class="description">'.trim($excerpt).'</div>';
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'tennisclub_woocommerce_after_subcategory_title' ) ) {
	
	function tennisclub_woocommerce_after_subcategory_title($category) {
		if (tennisclub_storage_get('shop_mode') == 'list')
			echo '<div class="description">' . trim($category->description) . '</div>';
	}
}

// Replace H2 tag to H3 tag in product headings
if ( !function_exists( 'tennisclub_woocommerce_template_loop_product_title' ) ) {
    
    function tennisclub_woocommerce_template_loop_product_title() {
        echo '<h3>' . wp_kses_post( get_the_title() ) . '</h3>';
    }
}

// Add Product ID for single product
if ( !function_exists( 'tennisclub_woocommerce_show_product_id' ) ) {
	
	function tennisclub_woocommerce_show_product_id() {
		global $post, $product;
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'tennisclub') . '<span>' . ($post->ID) . '</span></span>';
	}
}

// Redefine number of related products
if ( !function_exists( 'tennisclub_woocommerce_output_related_products_args' ) ) {
	
	function tennisclub_woocommerce_output_related_products_args($args) {
		$ppp = $ccc = 0;
		if (tennisclub_param_is_on(tennisclub_get_custom_option('show_post_related'))) {
			$ccc_add = in_array(tennisclub_get_custom_option('body_style'), array('fullwide', 'fullscreen')) ? 1 : 0;
			$ccc =  tennisclub_get_custom_option('post_related_columns');
			$ccc = $ccc > 0 ? $ccc : (tennisclub_param_is_off(tennisclub_get_custom_option('show_sidebar_main')) ? 3+$ccc_add : 2+$ccc_add);
			$ppp = tennisclub_get_custom_option('post_related_count');
			$ppp = $ppp > 0 ? $ppp : $ccc;
		}
		$args['posts_per_page'] = $ppp;
		$args['columns'] = $ccc;
		return $args;
	}
}

// Redefine post_type if number of related products == 0
if ( !function_exists( 'tennisclub_woocommerce_related_products_args' ) ) {
	
	function tennisclub_woocommerce_related_products_args($args) {
		if ($args['posts_per_page'] == 0)
			$args['post_type'] .= '_';
		return $args;
	}
}

// Number columns for product thumbnails
if ( !function_exists( 'tennisclub_woocommerce_product_thumbnails_columns' ) ) {
	
	function tennisclub_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'tennisclub_woocommerce_loop_shop_columns_class' ) ) {
	
	
	function tennisclub_woocommerce_loop_shop_columns_class($class, $class2='', $cat='') {
        if (!is_product() && !is_cart() && !is_checkout() && !is_account_page()) {
            $cols = function_exists('wc_get_default_products_per_row') ? wc_get_default_products_per_row() : 2;
            $class[] = ' column-1_' . $cols;
        }
        return $class;
	}
}



// Search form
if ( !function_exists( 'tennisclub_woocommerce_get_product_search_form' ) ) {
	
	function tennisclub_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search for products &hellip;', 'tennisclub') . '" value="' . esc_attr(get_search_query()) . '" name="s" title="' . esc_attr__('Search for products:', 'tennisclub') . '" /><button class="search_button icon-search" type="submit"></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}

// Wrap product title into link
if ( !function_exists( 'tennisclub_woocommerce_the_title' ) ) {
	
	function tennisclub_woocommerce_the_title($title) {
		if (tennisclub_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.esc_url(get_permalink()).'">'.($title).'</a>';
		}
		return $title;
	}
}

// Show pagination links
if ( !function_exists( 'tennisclub_woocommerce_pagination' ) ) {
	
	function tennisclub_woocommerce_pagination() {
		$style = tennisclub_get_custom_option('blog_pagination');
		tennisclub_show_pagination(array(
			'class' => 'pagination_wrap pagination_' . esc_attr($style),
			'style' => $style,
			'button_class' => '',
			'first_text'=> '',
			'last_text' => '',
			'prev_text' => '',
			'next_text' => '',
			'pages_in_group' => $style=='pages' ? 10 : 20
			)
		);
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'tennisclub_woocommerce_required_plugins' ) ) {
	
	function tennisclub_woocommerce_required_plugins($list=array()) {
		if (in_array('woocommerce', tennisclub_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> 'WooCommerce',
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}

?>