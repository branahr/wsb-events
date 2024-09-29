<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/branahr
 * @since      1.0.0
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 */

/**
 * Define the internationalization functionality.
 *
 * @since      1.0.0
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 * @author     Branko Borilovic <brana.hr@gmail.com>
 */
class Wsb_Events_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wsb-events',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
