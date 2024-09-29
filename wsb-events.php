<?php

/**
 * @link              https://https://github.com/branahr
 * @since             1.0.0
 * @package           Wsb_Events
 *
 * @wordpress-plugin
 * Plugin Name:       WSB Events
 * Plugin URI:        https://https://github.com/branahr/wsb-events
 * Description:       Simple Event Manager plugin for WordPress
 * Version:           1.0.0
 * Author:            Branko Borilovic
 * Author URI:        https://https://github.com/branahr/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wsb-events
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WSB_EVENTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 */
function activate_wsb_events() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wsb-events-activator.php';
	Wsb_Events_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wsb_events() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wsb-events-deactivator.php';
	Wsb_Events_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wsb_events' );
register_deactivation_hook( __FILE__, 'deactivate_wsb_events' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wsb-events.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_wsb_events() {

	$plugin = new Wsb_Events();
	$plugin->run();

}
run_wsb_events();
