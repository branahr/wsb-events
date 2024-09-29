=== WSB Event Manager ===
Contributors: branahr
Donate link: https://www.paypal.me/branahr
Tags: events, event manager, custom post type, calendar, shortcode
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to manage events with custom post types, including title, description, date, and location. Display events with a shortcode.

== Description ==

WSB Event Manager allows you to create and manage events through a custom post type in WordPress. Each event can have a title, description, date, and location. The plugin includes a shortcode for displaying a list of upcoming events on the front end and supports event archive pages with customizable slugs. The plugin is lightweight and integrates seamlessly with the WordPress admin interface.

Key Features:
* Custom post type for events
* Fields for event title, description, date, and location
* Shortcode [event_list] for displaying upcoming events
* Shortcode attributes: show_title (true/false) and sorting (asc/desc)
* Events sorted by date
* Compatible with the Twenty Twenty-One theme
* Option to display event archives and integrate them into WordPress menus

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the content of plugin folder to the `/wp-content/plugins/wsb-events/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. To display events, use the `[event_list]` shortcode on any page or post.
4. Optionally, add the event archive page to the menu from the WordPress menu settings under "Events".

== Frequently Asked Questions ==

= How do I add events? =

After activation, go to "Events" in the WordPress admin sidebar, click "Add New," and fill out the required event details.

= Can I customize the event slug? =

Yes, the event slug is customizable through the rewrite parameter in the plugin's code.

= How do I display a list of events? =

Simply use the `[event_list]` shortcode on any page or post, and it will automatically display a list of future events.
You can use additional parameters:
* show_title: true/false (default value: true) - displays "Upcoming Events" title at the top of the list of events.
* sorting: asc/desc (default value: asc) - direction of sorting events by date

== Changelog ==

= 1.0 =
* Initial release with core functionality.
* Custom post type for events.
* Shortcode for displaying upcoming events.

== Upgrade Notice ==

= 1.0 =
Initial release of WSB Event Manager. Allows managing and displaying events with custom fields.