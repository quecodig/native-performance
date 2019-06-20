<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Desactivar Thumbnails Previews.
function native_performance_disable_img_previews() { 
	$fallbacksizes = array(); 
	return $fallbacksizes; 
} 