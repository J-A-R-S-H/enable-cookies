<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Enable_Cookies
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function enable_cookies_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 250,
			'single_image_width'    => 600,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	// add_theme_support('wc-product-gallery-zoom');
	// add_theme_support('wc-product-gallery-lightbox');
	// add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'enable_cookies_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function enable_cookies_woocommerce_scripts()
{
	wp_enqueue_style('enable-cookies-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('enable-cookies-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'enable_cookies_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function enable_cookies_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'enable_cookies_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function enable_cookies_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'enable_cookies_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('enable_cookies_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function enable_cookies_woocommerce_wrapper_before()
	{
?>
		<main id="primary" class="site-main">
		<?php
	}
}
add_action('woocommerce_before_main_content', 'enable_cookies_woocommerce_wrapper_before');

if (!function_exists('enable_cookies_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function enable_cookies_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
	<?php
	}
}
add_action('woocommerce_after_main_content', 'enable_cookies_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'enable_cookies_woocommerce_header_cart' ) ) {
			enable_cookies_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('enable_cookies_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function enable_cookies_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		enable_cookies_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'enable_cookies_woocommerce_cart_link_fragment');

if (!function_exists('enable_cookies_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function enable_cookies_woocommerce_cart_link()
	{
	?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'enable-cookies'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'enable-cookies'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
		</a>
	<?php
	}
}

if (!function_exists('enable_cookies_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function enable_cookies_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php enable_cookies_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
<?php
	}
}



//remove Add to Cart functionality
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
remove_action('woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30);
remove_action('woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30);
remove_action('woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30);

// remove related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// remove breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// remove categories
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// remove product image
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// remove prices products 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

// move description under header
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
function woocommerce_template_product_description() {
	woocommerce_get_template('single-product/tabs/description.php');
}
add_action('woocommerce_single_product_summary', 'woocommerce_template_product_description', 22);

// remove additional information products
function remove_additional_information_tab_callback($tabs)
{
	unset($tabs['additional_information']);
	return $tabs;
}
add_filter('woocommerce_product_tabs', 'remove_additional_information_tab_callback', 98);

function cookies_product_title() {
	woocommerce_get_template('single-product/title.php');
}
add_action('woocommerce_after_shop_loop_item_title', 'cookies_product_title', 15);


function display_product_images() {
	$cookie_composition_image_id = get_field('cookie_composition_image');

	// Check if the field has a value
	if (function_exists('get_field')) {
		if ($cookie_composition_image_id) {
			echo wp_get_attachment_image($cookie_composition_image_id, 'large');
		}
	}
}

// add back to home link before the title
add_action('woocommerce_before_single_product_summary', 'display_back_to_home_link', 10);
function display_back_to_home_link() {
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>#cookies">&larr; Back to Cookies</a>
	<?php
}

// add acf fields after the title
add_action('woocommerce_single_product_summary', 'display_product_specifications', 25);
function display_product_specifications()
{
	//ACF field in here
	$ingredients = get_field('ingredients');
	$allergen_info = get_field('allergen_info');

	// Check if the field has a value
	if (function_exists('get_field')) {
		if ($ingredients || $allergen_info) { 
		?>
			<section class="dietary-information">
				<h2>Dietary Information</h2>
			<?php if ($ingredients) { ?>
				<p>
					<strong><?php _e( 'Ingredients:', 'enable-cookies' ); ?></strong>
					<?php echo $ingredients; } ?>
				</p>
			<?php if ($allergen_info) { ?>
				<p>
					<strong><?php _e( 'Allergen Info:', 'enable-cookies' ); ?></strong>
					<?php echo $allergen_info; } ?>
				</p>
			</section>
		<?php 
		}
	}
}

// add image acf fields after product information
add_action('woocommerce_after_single_product_summary', 'display_product_images', 25);