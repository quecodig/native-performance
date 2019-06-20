<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

//=======
$core_inc = array(
	'dashboard' => 'tweaks/dashboard.php',
	'head' => 'tweaks/head.php',
	'plugins' => 'tweaks/plugins.php',
	'header' => 'tweaks/header.php',
	'statics' => 'tweaks/statics.php',
	'thumbnails' => 'tweaks/thumbnails.php',
	'footer' => 'tweaks/footer.php',
);

foreach ($core_inc as $file) {
	require NP_PLUGIN_PATH . "/includes/".$file;
}

// Eliminar "Dashicons" de barra administración usuarios no registrados.
// Include/tweaks/dashboard
if(native_performance_active('dashboard')){
	add_action( 'wp_print_styles', 'native_performance_remove_dashicons', 100);
}

// Control Heartbeat API.
// Include/tweaks/dashboard
if(native_performance_active('dashboard')){
	add_filter( 'heartbeat_settings', 'native_performance_control_heartbeat' );
}

// Head
// Desactivar Rest API.
// Include/tweaks/head
if(native_performance_active('dashboard')){
	add_action( 'init', 'native_performance_deactivate_rest_api', 15, 1 );
}


// Eliminar consultas de recursos estáticos.
// Include/tweaks/statics
if(native_performance_active('statics')){
	add_filter( 'script_loader_src', 'native_performance_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', 'native_performance_remove_script_version', 15, 1 );
}

// Eliminar Gravatar Query Strings.
// Include/tweaks/statics
if(native_performance_active('statics')){
	add_filter( 'get_avatar_url', 'native_performance_avatar_remove_querystring' );
}

// Eliminar JQuery_migrate.
// Include/tweaks/statics
if(native_performance_active('statics')){
	add_action( 'wp_default_scripts', 'native_performance_dequeue_jquery_migrate' );
}

// Eliminar Capital P Dangit.
// Include/tweaks/statics
if(native_performance_active('statics')){
	remove_filter( 'the_title', 'capital_P_dangit', 11 );
	remove_filter( 'the_content', 'capital_P_dangit', 11 );
	remove_filter( 'comment_text', 'capital_P_dangit', 31 );
}

// Limpieza de plugins
// Include/tweaks/plugins
if(native_performance_active('plugins')){
	add_action( 'wp_enqueue_scripts', 'native_performance_woocommerce_cleaner', 99 );
	add_action( 'wp_enqueue_scripts', 'native_performance_fast_contactform7', 99);
}

// Limpieza del "Header".
// Include/tweaks/header
if(native_performance_active('header')){
	add_action( 'after_setup_theme', 'native_performance_clean_header' );
}

// Desactivar Thumbnails Previews.
// Include/tweaks/thumbnails
if(native_performance_active('thumbnails')){
	add_filter('fallback_intermediate_image_sizes', 'native_performance_disable_img_previews');
}

// Mover JavaScript al Footer.
// Include/tweaks/footer
if(native_performance_active('footer')){
	add_filter('script_loader_tag', 'native_performance_defer_parsing_of_js',10,2);
}
