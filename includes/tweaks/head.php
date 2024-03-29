<?php

/**
* Deactivate REST-API
*/
function native_performance_deactivate_rest_api() {
	
	global $wp_version;
	if ( $wp_version > '5.0' ) {
		return false;
	}
	
	$whitelist = [ '127.0.0.1', "::1", 'localhost' ];

    if( ! in_array($_SERVER['REMOTE_ADDR'], $whitelist ) ){

		remove_action( 'init', 'rest_api_init' );
		remove_action( 'parse_request', 'rest_api_loaded' );
		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
		remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
		add_filter( 'rest_enabled', '__return_false' );
		add_filter( 'rest_jsonp_enabled', '__return_false' );
		
	}
}