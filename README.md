# WSB Event Manager

**Contributors**: [branahr](https://github.com/branahr)  
**Donate link**: [https://www.paypal.me/branahr](https://www.paypal.me/branahr)  
**Tags**: events, event manager, custom post type, calendar, shortcode  
**Requires at least**: WordPress 5.0  
**Tested up to**: WordPress 6.6.2  
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

You can install the plugin in two different ways: **Direct Upload via wp-admin** or **Manual Upload**.

### Method 1: Install via WordPress Admin (Upload `.zip` file)

1. **Download the Plugin as a ZIP File**:
   - Click on the **Code** button at the top of this repository.
   - Select **Download ZIP** to download the plugin files to your local computer.

2. **Log into WordPress Admin**:
   - Go to your WordPress dashboard (`yourdomain.com/wp-admin`).

3. **Go to Plugins > Add New**:
   - In the sidebar, navigate to **Plugins** > **Add New**.

4. **Upload the Plugin**:
   - At the top of the page, click the **Upload Plugin** button.
   - Click the **Choose File** button and select the ZIP file you downloaded (`wsb-events.zip`).
   - Click **Install Now**.

5. **Activate the Plugin**:
   - Once the installation is complete, click the **Activate Plugin** button.

### Method 2: Manual Installation via FTP

1. **Download the Plugin**: 
   - Download the plugin files as a ZIP file.

2. **Upload the Plugin**:
   - Navigate to your WordPress installation directory.
   - Extract the ZIP file and upload the plugin folder (`wsb-events`) to the `/wp-content/plugins/` directory using an FTP client.

3. **Activate the Plugin**:
   - Log in to your WordPress admin panel.
   - Go to **Plugins** > **Installed Plugins**.
   - Find the **Movie Popup Banner** plugin and click **Activate**.

## Usage

After installing and activating the WSB Event Manager plugin, you can manage and display events in the following ways:

### Creating an Event

1. In the WordPress admin dashboard, navigate to the **Events** section on the sidebar.
2. Click **Add New** to create a new event.
3. Fill in the following fields:
   - **Event Title**: The name of your event.
   - **Event Description**: A detailed description of your event.
   - **Event Date**: The date and time of your event.
   - **Event Location**: The location or venue where the event will take place.
4. Once the event details are filled in, click **Publish** to make the event live.

### Displaying Events

To display a list of upcoming events on the front end of your site, use the `[event_list]` shortcode in a post or page. The shortcode will automatically display events sorted by date, with the most recent event at the top.

#### Shortcode Example

[event_list]
This will display a list of all upcoming events with the default settings.

[event_menu]
This will display upcoming events as menu items without details (names only).

### Shortcode Attributes

You can modify the behavior of both event shortcodes by using the following attributes:

    - **show_title:** This attribute controls whether or not the heading "Upcoming Events" is displayed above the list.

        - **Options:** true (default), false
        - **Example:** [event_list show_title="false"]

    - **sorting:** This attribute controls the order in which events are displayed, based on the event date.

        - **Options:** true (default), false
        - **Example:** [event_menu sorting="desc"]

    Combined Example:
    To display a list of events without the title and in descending order, use:
    [event_list show_title="false" sorting="desc"]

### Event Archives

The plugin also creates an archive for events. You can customize the slug for event archives via the rewrite parameter in the plugin code.

#### Adding Event Archive to Menu

To add an event archive to the site’s navigation menu:

    - Go to Appearance > Menus in the WordPress admin dashboard.
    - Select the Events custom post type archive from the available items and add it to your desired menu.
    - Save the menu.
    
This will create a direct link to the archive page where users can browse all published events.

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
