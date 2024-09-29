<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://github.com/branahr
 * @since      1.0.0
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/admin
 * @author     Branko Borilovic <brana.hr@gmail.com>
 */
class Wsb_Events_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	// Add custom columns to the Events list in the admin
	function wsb_events_add_event_columns($columns) {
		$new_columns = array(
			'cb'             => $columns['cb'], // Checkbox for bulk actions
			'title'          => __('Event Title', 'wsb-events'), // Event Title
			'event_date'     => __('Event Date', 'wsb-events'), // Custom Event Date
			'event_location' => __('Event Location', 'wsb-events'), // Custom Event Location
		);
		return $new_columns;
	}

	// Populate custom columns with data
	function wsb_events_render_event_columns($column, $post_id) {
		switch ($column) {
			case 'event_date':
				$event_date = get_post_meta($post_id, '_wsb_events_event_date', true);
				if ($event_date) {
					echo date('F j, Y', strtotime($event_date)); // Format the date
				} else {
					echo __('No Date Set', 'wsb-events');
				}
				break;

			case 'event_location':
				$event_location = get_post_meta($post_id, '_wsb_events_event_location', true);
				echo esc_html($event_location ? $event_location : __('No Location Set', 'wsb-events'));
				break;
		}
	}

	// Make the Event Date column sortable
	function wsb_events_sortable_columns($columns) {
		$columns['event_date'] = 'event_date'; // Register column as sortable
		return $columns;
	}

	// Adjust query for sorting by Event Date
	function wsb_events_event_orderby($query) {
		if (!is_admin()) {
			return;
		}

		$orderby = $query->get('orderby');
		if ('event_date' === $orderby) {
			$query->set('meta_key', '_wsb_events_event_date'); // Sort by the custom field
			$query->set('orderby', 'meta_value');
			$query->set('meta_type', 'DATE');
		}
	}

}
