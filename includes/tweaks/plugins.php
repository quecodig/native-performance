<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

if(!function_exists('native_performance_woocommerce_cleaner')){
	function native_performance_woocommerce_cleaner() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if(is_plugin_active( 'woocommerce/woocommerce.php' ) ){
				// Remove the generator tag
			remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
				// Unless we're in the store, remove all the cruft!
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce-general');
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_script( 'selectWoo' );
				wp_deregister_script( 'selectWoo' );
				wp_dequeue_script( 'wc-add-payment-method' );
				wp_dequeue_script( 'wc-lost-password' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-credit-card-form' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'jquery-payment' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );
			}
		}
	}
}

if(!function_exists('native_performance_fast_contactform7')){
	function native_performance_fast_contactform7() {
		global $post;
		if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7' ) ) {
			add_action( 'wp_print_styles', function() {
				if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
					wp_deregister_style( 'contact-form-7' );
				}
			});
			add_action( 'wp_print_scripts', function() {
				if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
					wp_deregister_script( 'contact-form-7' );
				}
			});
		}
	}
}