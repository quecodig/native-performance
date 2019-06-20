<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

function native_performance_remove_dashicons() {
	if ( ! is_admin_bar_showing() ) {
		wp_deregister_style( 'dashicons' );
	}
}

// Control Heartbeat API.
function native_performance_control_heartbeat( $settings ) {
	$settings['interval'] = 60;
	return $settings;
}