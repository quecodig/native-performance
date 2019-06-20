<?php
/**
 * @package WPNATIVE/Main
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

/**
 * @internal Bajo ninguna circunstancia se debe cancelar o anular la versión real del complemento Native Performance. La eliminación de la versión real puede causar problemas irreparables dentro del funcionamiento del Plugin.
 */

// Define todo el plugin Native Performance. 
define( 'NP_PLUGIN_VERSION'				, $np_definitation["version"] );
define( 'NP_PLUGIN_PATH'				, realpath( plugin_dir_path( NP_PLUGIN_FILE ) ) . '/' );
define( 'NP_PLUGIN_INCLUDES_PATH'		, realpath( NP_PLUGIN_PATH . 'core/' ) . '/' );
define( 'NP_PLUGIN_URL'					, plugin_dir_url( NP_PLUGIN_FILE ) );
define( 'NP_PLUGIN_TEMPLATES'			, realpath( NP_PLUGIN_PATH . 'templates/') . '/' );
define( 'NP_PLUGIN_INCLUDES_URL'		, NP_PLUGIN_URL . 'core/' );

// Define la última versión estable de Native Performance.
if ( ! defined( 'NP_PLUGIN_LASTVERSION' ) ) {
	define( 'NP_PLUGIN_LASTVERSION', $np_definitation["version"] );
}

// Créditos del Footer de la página.
add_filter('admin_footer_text', function() {
	/* translators: %s: five stars */
	return ' ' . sprintf( __( 'If you like <strong>Native Performance</strong>, please %1$sleave us a rating of %2$s. Thank you!', 'nperformance' ), '<a href="https://wordpress.org/support/plugin/native-performance/reviews/#new-post" target="_blank">', '5&starf;</a>' ) . ' ';
});

/**
 * Inicio del plugin Native Performance.
 */


add_action('plugins_loaded', 'native_performance_plugin_load_textdomain');

function native_performance_plugin_load_textdomain() {
	
	$text_domain	= 'nperformance';
	$path_languages = basename(dirname(__FILE__)).'/languages/';

 	load_plugin_textdomain($text_domain, false, $path_languages );
}


// Carga los módulos de Native Performance..
require( NP_PLUGIN_INCLUDES_PATH . 'class-actions.php' );
require( NP_PLUGIN_INCLUDES_PATH . 'class-admin.php' );
require( NP_PLUGIN_INCLUDES_PATH . 'class-functions.php' );