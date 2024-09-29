# WSB Event Manager

**Contributors**: [branahr](https://github.com/branahr)  
**Donate link**: [https://www.paypal.me/branahr](https://www.paypal.me/branahr)  
**Tags**: events, event manager, custom post type, calendar, shortcode  
**Requires at least**: WordPress 5.0  
**Tested up to**: WordPress 6.0  
**Stable tag**: 1.0  
**License**: GPLv2 or later  
**License URI**: [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

A plugin to manage events with custom post types, including title, description, date, and location. Display events with a shortcode.

## Description

WSB Event Manager allows you to create and manage events through a custom post type in WordPress. Each event can have a title, description, date, and location. The plugin includes two shortcodes for displaying a list of upcoming events on the front end and supports event archive pages with customizable slugs. The plugin is lightweight and integrates seamlessly with the WordPress admin interface.

### Key Features

- Custom post type for events
- Fields for event title, description, date, and location
- Shortcode `[event_list]` for displaying upcoming events in content of post or page
- Shortcode `[event_menu]` for displaying upcoming events as a menu in sidebar
- Shortcode attributes: `show_title` (true/false) and `sorting` (asc/desc)
- Events sorted by date
- Compatible with the Twenty Twenty-One theme
- Option to display event archives and integrate them into WordPress menus
- Custom fields "Event Title" and "Event Date" added to admin dashboard list of events. "Event Date" field is sortable.

## Installation

To install the plugin, follow these steps:

1. Upload the content of the plugin folder to the `/wp-content/plugins/wsb-events/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. To display events with dates, locations and descriptions use the `[event_list]` shortcode on any page or post.
4. Optionally, add the event archive page to the menu from the WordPress menu settings under "Events".
5. To display events as menu items without details, use the `[event_menu]` shortcode in sidebar or other widget area

## Frequently Asked Questions

### How do I add events?

After activation, go to "Events" in the WordPress admin sidebar, click "Add New," and fill out the required event details.

### Can I customize the event slug?

Yes, the event slug is customizable through the rewrite parameter in the plugin's code.

### How do I display a list of events?

Simply use the `[event_list]` shortcode on any page or post, and it will automatically display a list of future events.
If you want simple version for a sidebar that displays only names of events with links, use `[event_menu]` shortcode.

You can use additional parameters:

- **show_title**: `true`/`false` (default: `true`) - Displays "Upcoming Events" title at the top of the list of events.
- **sorting**: `asc`/`desc` (default: `asc`) - Sets the direction of sorting events by date.

- **Example 1**: `[event_list show_title="false"]` will show upcoming events with details (name, date, location, description) without "Upcoming Events" title above
- **Example 2**: `[event_menu sorting="desc"]` will show list of links and names of events sorted by date descending, with "Upcoming Events" title above

### Can I add event link to existing menu through menu manager?

Yes, you can choose "All events" or any single event when adding to menu. If "Events" option is not visible on the left side of menu manager,
you will need to check "Events" option in "Screen Options" at the top of the page.

## Changelog

### 1.0

- Initial release with core functionality.
- Custom post type for events.
- Shortcodes for displaying upcoming events.

## Upgrade Notice

Initial release of WSB Event Manager. Allows managing and displaying events with custom fields.
