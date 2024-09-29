<?php

/**
 * The file that defines shortcodes plugin class
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

class Wsb_Events_Shortcodes {
    
    /**.
	 * @since    1.0.0
	 */
	public static function init() {

		add_shortcode( 'event_list', array( __CLASS__, 'wsb_events_display' ) );
		
	}
	
	public static function wsb_events_display($atts) {
		
		/*
		 * Shortcode attributes with default values defined
		 */
		$a = shortcode_atts( array( 
			'show_title'	  => 'true',
            'sorting'         => 'ASC',
   		), $atts, 'event_list' );

        $today = date('Ymd');
        $args = array(
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'meta_query'     => array(
                array(
                    'key'     => '_wsb_events_event_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
            'orderby'        => 'meta_value',
            'order'          => $a['sorting'],
        );
    
        $events = new WP_Query($args);
        ob_start();
        $show_title = filter_var($a['show_title'], FILTER_VALIDATE_BOOLEAN);
        if ($show_title){
            echo '<h2>' . __('Upcoming Events', 'wsb-events') . '</h2>';
        }
        if ($events->have_posts()) {
            echo '<ul class="event-list">';
            while ($events->have_posts()) {
                $events->the_post();
                $event_date = get_post_meta(get_the_ID(), '_wsb_events_event_date', true);
                $event_location = get_post_meta(get_the_ID(), '_wsb_events_event_location', true);
                echo '<li>';
                echo '<h3>' . get_the_title() . '</h3>';
                echo '<div class="wsb-event-meta">';
                echo '<div class="wsb-event-date"><span class="dashicons dashicons-calendar-alt"></span> ' . esc_html($event_date) . '</div>';
                echo '<div class="wsb-event-location"><strong>' . __('Location:', 'wsb-events') . '</strong> ' . esc_html($event_location) . '</div>';
                echo '</div>';
                echo '<p>' . get_the_content() . '</p>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>' . __('No upcoming events found.', 'wsb-events') . '</p>';
        }
    
        wp_reset_postdata();
        return ob_get_clean();

	}

	

}