<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Eliminar consultas de recursos estáticos.
function native_performance_remove_script_version( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
}

// Eliminar Gravatar Query Strings.
function native_performance_avatar_remove_querystring( $url ) {
	$url_parts = explode( '?', $url );
	return $url_parts[0];
}

// Eliminar JQuery_migrate.
function native_performance_dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}