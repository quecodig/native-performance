<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Mover JavaScript al Footer.
function native_performance_defer_parsing_of_js($tag, $handle) {
    if (is_admin()){
        return $tag;
    }
    if (strpos($tag, '/wp-includes/js/jquery/jquery')) {
        return $tag;
    }
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.') !==false) {
	return $tag;
    }
    else {
        return str_replace(' src',' defer src', $tag);
    }
}