<?php 
/**
 * The file that defines the custom post types plugin class
 * 
 * @link       https://https://github.com/branahr
 * @since      1.0.0
 *
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 */

/**
 * This class defines shortcodes for the plugin.
 *
 * @since      1.0.0
 * @package    Wsb_Events
 * @subpackage Wsb_Events/includes
 * @author     Branko Borilovic <brana.hr@gmail.com>
 */

class Wsb_Events_Custom_Post_Types {
    
    /**
     * @since    1.0.0
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'wsb_create_event_post_type' ) );
        add_action( 'save_post', array( __CLASS__, 'wsb_events_save_event_details' ) );
    }

    /**
     * Register the 'event' custom post type
     *
     * @since    1.0.0
     */
    public static function wsb_create_event_post_type() {
        $labels = array(
            'name'               => _x( 'Events', 'post type general name', 'wsb-events' ),
            'singular_name'      => _x( 'Event', 'post type singular name', 'wsb-events' ),
            'menu_name'          => _x( 'Events', 'admin menu', 'wsb-events' ),
            'name_admin_bar'     => _x( 'Event', 'add new on admin bar', 'wsb-events' ),
            'add_new'            => _x( 'Add New', 'event', 'wsb-events' ),
            'add_new_item'       => __( 'Add New Event', 'wsb-events' ),
            'new_item'           => __( 'New Event', 'wsb-events' ),
            'edit_item'          => __( 'Edit Event', 'wsb-events' ),
            'view_item'          => __( 'View Event', 'wsb-events' ),
            'all_items'          => __( 'All Events', 'wsb-events' ),
            'search_items'       => __( 'Search Events', 'wsb-events' ),
            'parent_item_colon'  => __( 'Parent Events:', 'wsb-events' ),
            'not_found'          => __( 'No events found.', 'wsb-events' ),
            'not_found_in_trash' => __( 'No events found in Trash.', 'wsb-events' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'wsb-events' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true, // Enable Gutenberg support
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'event' ),
            'capability_type'    => 'post',
            'has_archive'        => 'events',
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
            'register_meta_box_cb' => array( __CLASS__, 'wsb_events_add_custom_meta_boxes'),
        );

        register_post_type( 'event', $args );
    }

    // Add custom fields for Event Title, Description, Date, and Location
    public static function wsb_events_add_custom_meta_boxes() {
        add_meta_box(
            'wsb_event_details',
            __( 'Event Details', 'wsb-events' ),
            array( __CLASS__, 'wsb_events_event_details_callback' ),
            'event',
            'side',
            'high'
        );
    }

    public static function wsb_events_event_details_callback( $post ) {
        // Add nonce for security
        wp_nonce_field( 'wsb_events_save_event_details', 'wsb_events_event_details_nonce' );

        // Retrieve existing values
        $event_date = get_post_meta( $post->ID, '_wsb_events_event_date', true );
        $event_location = get_post_meta( $post->ID, '_wsb_events_event_location', true );

        echo '<p><label for="wsb_events_event_date">' . __('Event Date', 'wsb_events') . '</label>';
        echo '<input type="date" style="width:100%;" id="wsb_eventsevent_date" name="wsb_events_event_date" value="' . esc_attr($event_date) . '" required></p>';
    
        echo '<p><label for="wsb_events_event_location">' . __('Event Location', 'wsb_events') . '</label>';
        echo '<input type="text" style="width:100%;" id="wsb_events_event_location" name="wsb_events_event_location" value="' . esc_attr($event_location) . '" required></p>';
    }

    // Save custom fields data
    public static function wsb_events_save_event_details( $post_id ) {
        // Check if our nonce is set
        if ( ! isset( $_POST['wsb_events_event_details_nonce'] ) ) {
            return;
        }

        // Verify that the nonce is valid
        if ( ! wp_verify_nonce( $_POST['wsb_events_event_details_nonce'], 'wsb_events_save_event_details' ) ) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check the user's permissions
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Update the meta field in the database
        if(isset($_POST['wsb_events_event_date'])) {    
            update_post_meta( $post_id, '_wsb_events_event_date', sanitize_text_field( $_POST['wsb_events_event_date'] ) );
        }
        if(isset($_POST['wsb_events_event_location'])) {
            update_post_meta( $post_id, '_wsb_events_event_location', sanitize_text_field( $_POST['wsb_events_event_location'] ) );
        }
    }

}