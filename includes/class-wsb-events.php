<?php

/**
 * The file that defines the core plugin class
 *
 * @link       https://https://github.com/branahr
 * @since      1.0.0
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 */

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 * @author     Branko Borilovic <brana.hr@gmail.com>
 */
class Wsb_Events {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wsb_Events_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WSB_EVENTS_VERSION' ) ) {
			$this->version = WSB_EVENTS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wsb-events';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_shortcodes();
		$this->define_custom_post_types();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wsb_Events_Loader. Orchestrates the hooks of the plugin.
	 * - Wsb_Events_i18n. Defines internationalization functionality.
	 * - Wsb_Events_Admin. Defines all hooks for the admin area.
	 * - Wsb_Events_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wsb-events-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wsb-events-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wsb-events-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wsb-events-public.php';

		/**
		 * The class responsible for defining shortcodes for the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wsb-events-shortcodes.php';

		/**
		 * The class responsible for defining custom post types for the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wsb-events-custom-post-types.php';

		$this->loader = new Wsb_Events_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wsb_Events_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wsb_Events_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wsb_Events_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_filter( 'manage_event_posts_columns', $plugin_admin, 'wsb_events_add_event_columns' );
		$this->loader->add_action( 'manage_event_posts_custom_column', $plugin_admin, 'wsb_events_render_event_columns', 10, 2 );
		$this->loader->add_filter( 'manage_edit-event_sortable_columns', $plugin_admin, 'wsb_events_sortable_columns' );
		$this->loader->add_action( 'pre_get_posts', $plugin_admin, 'wsb_events_event_orderby' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wsb_Events_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

	}

	/**
	 * Register all of the shortcodes. 
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_shortcodes() {

		$plugin_shortcodes = new Wsb_Events_Shortcodes();
		
		$plugin_shortcodes->init();

	}

	/**
	 * Register all of the custom post types.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_custom_post_types() {
		
		$plugin_custom_post_types = new Wsb_Events_Custom_Post_Types();
		
		$plugin_custom_post_types->init();

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wsb_Events_Loader
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
