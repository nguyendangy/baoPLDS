<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * 
 * @cmsmasters_package 	Travel Time
 * @cmsmasters_version 	1.1.5
 */


defined( 'ABSPATH' ) || exit;

global $product;

$rating_count = $product->get_rating_count();

list($cmsmasters_layout) = travel_time_theme_page_layout_scheme();

function travel_time_related_products_args($args) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	
	return $args;
}


/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );


if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$cmsmasters_id = get_the_ID();
$cmsmasters_heading = get_post_meta($cmsmasters_id, 'cmsmasters_heading', true);
?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'cmsmasters_single_product', $product ); ?>>
	<div class="cmsmasters_single_product">
		<div class="cmsmasters_product_left_column">
		<?php
			$availability = $product->get_availability();

			if (esc_attr($availability['class']) == 'out-of-stock') {
				echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
			}
			
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		</div>
		<div class="summary entry-summary cmsmasters_product_right_column">
			<div class="cmsmasters_product_title_info_wrap">
				<div class="cmsmasters_product_title_wrap">
					<?php
					if ($cmsmasters_heading == 'disabled') {
						echo '<h1 class="product_title entry-title">' . get_the_title() . '</h1>';
					
					} elseif ($cmsmasters_heading == 'custom') {
						echo '<h2 class="product_title entry-title">' . get_the_title() . '</h2>';
					}
					?>
					<div class="cmsmasters_product_info_wrap">
						<?php 
						woocommerce_template_single_price();
						
						if ( $rating_count > 0 ) {
							travel_time_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
						}
						?>
					</div>
					<?php 
					woocommerce_template_single_meta();
					?>
				</div>
			</div>
			<div class="cmsmasters_product_content">
				<?php woocommerce_template_single_excerpt(); ?>
			</div>
			<?php
			woocommerce_template_single_add_to_cart();
			
			woocommerce_template_single_sharing();
			
			
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
			
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
	<?php
		if ($cmsmasters_layout != 'fullwidth') {
			add_filter('woocommerce_output_related_products_args', 'travel_time_related_products_args');
		}
		
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
