<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://github.com/branahr
 * @since      1.0.0
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/public
 */

/**
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/public
 * @author     Branko Borilovic <brana.hr@gmail.com>
 */
class Wsb_Events_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wsb-events-public.css', array(), $this->version, 'all' );
		wp_enqueue_style('dashicons');
	}

}
