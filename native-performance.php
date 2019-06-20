<?php
/**
 * @package WPNATIVE/Plugin
 * @author QueCodig
 */

/**
 * Plugin Name: Native Performance
 * Version: 1.2.4
 * Requires at least: 4.0
 * Tested up to: 5.2.1
 * Plugin URI: https://www.desarrollo.quecodigo.com/wordpress/plugins.html
 * Description: Native Performance is an all-in-one complement that integrates, in a complete and robust core, a set of tools for the solution of common errors, optimization, performance and much more.
 * Author: QuéCódigo
 * Author URI: https://www.quecodigo.com/
 * 
 * Text Domain: native-performance
 * Domain Path: /languages/
 * 
 * License: GPLv3 or later.
 */

/**
 * Native Performance Plugin
 * Copyright (C) 2018-2019, QuéCódigo - plugins@quecodigo.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Define "FILE" de Native Performance.
if ( ! defined( 'NP_PLUGIN_FILE' ) ) {
	define( 'NP_PLUGIN_FILE', __FILE__ );
}

$np_definitation = array(
	'version' => '1.2.4',
	'admin-page' => false,
	'slug' => 'N Performance',
	'url' => 'native-performance',
	'title' => 'Native Performance',
);

// Se registra la activación del Plugin para la bienvenida.
register_activation_hook(
	__FILE__, function() {
		add_option( 'native_performance_activation_welcome', 'pending' );
	}
);

// Se registra activación del Plugin para la base de datos.
register_activation_hook( __FILE__, 'native_performance_options' );

// Se registra desactivación del Plugin para la base de datos
register_deactivation_hook(__FILE__, 'native_performance_delete' );

// Se añade configuración en lista de Plugins.
if($np_definitation["admin-page"]){
	add_filter( 'plugin_action_links', function( $plugin_actions, $plugin_file ) {
		$new_actions = array();
		if ( basename( dirname( __FILE__ ) ) . '/native-performance.php' === $plugin_file ) {
			/* translators: %s: url of plugin settings page */
			$new_actions['sc_settings'] = sprintf( __( '<a href="%s">'.__('Settings').'</a>', 'native-performance' ), esc_url( add_query_arg( array( 'page' => 'native-performance' ), admin_url( 'admin.php' ) ) ) );
		}
		return array_merge( $new_actions, $plugin_actions );
	}, 10, 2 );
}

if(!function_exists('native_performance_row_meta')){
	function native_performance_row_meta( $links, $file ) {
		if ( strpos( $file, 'native-performance.php' ) !== false ) {
			$new_links = array(
				'donate' => '<a href="https://www.paypal.me/quecodig" target="_blank">Donar</a>',
				'support' => '<a href="https://www.desarrollo.quecodigo.com/wordpress/">'.__("Support").'</a>'
			);
			$links = array_merge( $links, $new_links );
		}
		return $links;
	}
}
add_filter( 'plugin_row_meta', 'native_performance_row_meta', 10, 4 );

// Carga el plugin Native Performance.
require_once dirname( NP_PLUGIN_FILE ) . '/native-performance-main.php';