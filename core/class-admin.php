<?php
/**
 * @package WPNATIVE/Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Valida la versión de WordPress.
global $wp_version;
if (!version_compare($wp_version, "3.8.2", ">=")) {
	die ("To use this plugin, you need a version 3.8.2 or later of WordPress.");
}

// Incorporación de opciones nativas.
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

// Redirección a página de configuración.
add_action( 'admin_init', 'native_performance_register' );

function native_performance_register(){	
	if ( 'pending' === get_option( 'native_performance_activation_welcome' ) ) {
		delete_option( 'native_performance_activation_welcome' );

		// Activación desde Network.
		if ( is_network_admin() || ( filter_input( INPUT_GET, 'activate-multi' ) !== null ) ) {
			return;
		}
		// Redirección a página de configuración.
		//wp_safe_redirect( add_query_arg( array( 'page' => 'native-performance' ), admin_url( 'admin.php' ) ) );
	}
}

// Soporte de menú en Dashboard.
//add_action( 'admin_menu', 'native_performance_add_menu' );

// Función que añade el menú.
function native_performance_add_menu(){
	global $np_definitation;
	// Título del sitio.
	$page_title = $np_definitation["title"];
	// Título de la sección.
	$menu_title = $np_definitation["slug"];
	// Compatibilidad del rol.
	$capability = 'manage_options';
	// Selección URL del icono.
	$url  = $np_definitation["url"];
	// Muestra página de administración.
	$function   = 'native_performance_page_view';
	// URL del icono.
	$icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" height="512px" viewBox="0 -60 512 512" width="512px"><path d="m241 0c-57.761719 3.316406-111.90625 25.742188-155.097656 64.242188l64.050781 64.046874c14.09375-5.003906 29.257813-7.738281 45.046875-7.738281 16.144531 0 31.636719 2.855469 46 8.078125zm0 0" fill="#FFFFFF"/><path d="m299.230469 169.847656 121.160156-110.542968c-42.210937-35.480469-94.144531-56.132813-149.390625-59.304688v144.039062c10.585938 7.234376 20.09375 15.933594 28.230469 25.808594zm0 0" fill="#FFFFFF"/><path d="m0 255.554688v15h60v-15c0-47.378907 24.535156-89.128907 61.5625-113.226563l-56.871094-56.871094c-41.816406 46.910157-64.691406 106.742188-64.691406 170.097657zm0 0" fill="#FFFFFF"/><path d="m432.453125 270.554688h79.546875v-15c0-21.8125-2.722656-43.203126-7.980469-63.796876zm0 0" fill="#FFFFFF"/><path d="m255.996094 271.058594c-16.027344 0-31.097656 6.242187-42.429688 17.574218-23.390625 23.394532-23.390625 61.457032 0 84.851563 11.332032 11.332031 26.402344 17.574219 42.429688 17.574219 16.023437 0 31.09375-6.242188 42.425781-17.574219 23.394531-23.394531 23.394531-61.457031 0-84.851563-11.332031-11.332031-26.402344-17.574218-42.425781-17.574218zm0 0" fill="#FFFFFF"/><path d="m448.1875 74.554688-183.007812 166.96875c20.566406 2.070312 39.640624 11.082031 54.453124 25.894531 15.171876 15.171875 23.769532 34.460937 25.824219 54.304687l166.542969-183.375v-63.792968zm0 0" fill="#FFFFFF"/></svg>');
	// Posición en el menú.
	$position   = 3;
	// Se añaden opciones.
	add_menu_page($page_title, $menu_title, $capability, $url, $function, $icon_url, $position);
}

// Página de administración.
function native_performance_page_view() {
	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// Se incluye la página de administración.
	require_once( NP_PLUGIN_TEMPLATES . 'page-admin.tpl' );
}

// Se añaden soportes necesarios para la ejecución.
//add_action( 'admin_enqueue_scripts', 'native_performance_load_scripts');

// Función para imprimir los soportes.
function native_performance_load_scripts() {
	// Se cargan los estilos.
	wp_enqueue_style('native_performance', plugin_dir_url( NP_PLUGIN_FILE ).'assets/css/style.css', false, NP_PLUGIN_VERSION);
}

// Función para crear la tabla
function native_performance_options() {
	// Activación de opciones
	// Arrays de opciones
	add_option( 'nperformance_modules', array(
		'dashboard' => array(
			'id' => 0,
			'title' => 'Dashboard',
			'description' => 'Activate to prevent WordPress automatically detect and generate emojis on your pages, also disables unnecessary communications that slow down and generate overloads',
		),
		'statics' => array(
			'id' => 1,
			'title' => 'Statics',
			'description' => '',
		),
		'thumbnail' => array(
			'id' => 3,
			'title' => 'Thumbnail',
			'description' => '',
		),
		'header' => array(
			'id' => 4,
			'title' => 'Header',
			'description' => '',
		),
		'footer' => array(
			'id' => 5,
			'title' => 'Footer',
			'description' => '',
		),
	));
}

function native_performance_delete(){
	delete_option('nperformance_modules');
}