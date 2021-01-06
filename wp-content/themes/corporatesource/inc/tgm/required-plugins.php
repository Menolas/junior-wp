<?php


require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'corporatesource_register_required_plugins' );

function corporatesource_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'      => esc_html__('KingComposer', 'corporatesource'),
			'slug'      => 'kingcomposer',
			'required'  => false,
		),
		
		array(
			'name'      => esc_html__('WP Subtitle', 'corporatesource'),
			'slug'      => 'wp-subtitle',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Smart Slider', 'corporatesource'),
			'slug'      => 'smart-slider-3',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Contact Form 7', 'corporatesource'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Unlimited Background Slider', 'corporatesource'),
			'slug'      => 'unlimited-background-slider',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WP Instagram Widget', 'corporatesource'),
			'slug'      => 'wp-instagram-widget',
			'required'  => false,
		),
		
		array(
			'name'      => esc_html__('WooCommerce Popup Cart + ajax', 'corporatesource'),
			'slug'      => 'woocomm-popup-cart-ajax',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Smart Variation Swatches for WooCommerce', 'corporatesource'),
			'slug'      => 'variation-swatches-style',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce Popup Cart + ajax', 'corporatesource'),
			'slug'      => 'woocomm-popup-cart-ajax',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Advanced Product Wishlist for Woocommerce', 'corporatesource'),
			'slug'      => 'advanced-product-wishlist-for-woo',
			'required'  => false,
		),
		
		array(
			'name'      => esc_html__('Advanced Product Search For WooCommerce', 'corporatesource'),
			'slug'      => 'advanced-product-search-for-woo',
			'required'  => false,
		),
		
		

	);

	$config = array(
		'id'           => 'corporatesource',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
