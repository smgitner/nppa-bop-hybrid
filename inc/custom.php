<?php
/**
 * Custom functions for BOP Theme
 *
 * This file contains all custom theme functions that extend WordPress functionality.
 * All functions are organized by purpose and include detailed documentation.
 *
 * @package bop_theme
 * @since 1.1.0
 */

/* ============================================================================
 * SCRIPT ENQUEUING FUNCTIONS
 * ============================================================================
 * These functions handle loading JavaScript files required by the theme.
 * All scripts are properly enqueued using WordPress best practices.
 * ============================================================================ */

/**
 * Enqueue Webflow JavaScript file
 *
 * Loads the Webflow interaction script that handles animations and interactions
 * exported from Webflow. This script is loaded in the footer for better performance.
 *
 * Hook: wp_enqueue_scripts
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function enqueue_webflow_script() {
	// Enqueue Webflow script in footer (true = load in footer)
	wp_enqueue_script( 'webflow', get_stylesheet_directory_uri() . '/js/webflow.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_webflow_script' );

/**
 * Enqueue Webfont Loader script
 *
 * Loads Google's Webfont Loader library which provides better control over font loading
 * and fallback behavior. This is used for loading custom fonts asynchronously.
 *
 * Hook: wp_enqueue_scripts
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function bopwins_enqueue_scripts() {
	// Load Webfont Loader from Google CDN in header (false = load in header)
	wp_enqueue_script( 'webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js', array(), null, false );
}
add_action( 'wp_enqueue_scripts', 'bopwins_enqueue_scripts' );

/* ============================================================================
 * STYLE ENQUEUING FUNCTIONS
 * ============================================================================
 * These functions handle loading CSS stylesheets with cache busting support.
 * ============================================================================ */

/**
 * Enqueue additional theme scripts and styles
 *
 * This function handles the main theme stylesheet loading along with additional
 * CSS files. It includes a cache-busting mechanism using random numbers to ensure
 * browsers load fresh styles after updates.
 *
 * Hook: wp_enqueue_scripts
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
if ( ! function_exists( 'bop_theme_enqueue_scripts' ) ) :
	function bop_theme_enqueue_scripts() {

		/* Enqueue core stylesheets */
		// Main theme stylesheet
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, null, 'all' );
		
		// Normalize.css for consistent cross-browser styling
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', false, null, 'all' );

		/**
		 * Generate random number for cache busting
		 *
		 * Creates a random 3-digit number appended to stylesheet versions
		 * to force browsers to reload CSS after theme updates.
		 *
		 * @return string Random number string (e.g., "-456")
		 */
		function wpmix_get_random() {
			$randomizr = '-' . rand( 100, 999 );
			return $randomizr;
		}
		
		// Generate random number and make it globally available
		$random_number = wpmix_get_random();
		global $random_number;

		/**
		 * Queue custom stylesheets with cache busting
		 *
		 * Registers and enqueues theme-specific stylesheets with version numbers
		 * that include a random component for cache busting. Only loads on frontend
		 * (not in admin area).
		 *
		 * Hook: wp_print_styles
		 * Priority: Default (10)
		 *
		 * @return void
		 */
		function wpmix_queue_css() {
			global $theme_version, $random_number;
			
			// Only load styles on frontend, not in WordPress admin
			if ( ! is_admin() ) {
				// Webflow CSS - Main Webflow exported styles
				wp_register_style( 'webflow', get_template_directory_uri() . '/css/webflow.css', false, $theme_version . $random_number );
				wp_enqueue_style( 'webflow' );

				// BOP Site Design CSS - Custom site-specific styles
				wp_register_style( 'bopsitedesign', get_template_directory_uri() . '/css/bopsitedesign.webflow.css', false, $theme_version . $random_number );
				wp_enqueue_style( 'bopsitedesign' );

				// BOP Misc CSS - Additional miscellaneous styles
				wp_register_style( 'bopmisc', get_template_directory_uri() . '/css/bopmisc.css', false, $theme_version . $random_number );
				wp_enqueue_style( 'bopmisc' );
			}
		}
		add_action( 'wp_print_styles', 'wpmix_queue_css' );

	}
	add_action( 'wp_enqueue_scripts', 'bop_theme_enqueue_scripts' );
endif;

/* ============================================================================
 * INTERNATIONALIZATION FUNCTIONS
 * ============================================================================
 * Functions for loading translation files and making the theme translatable.
 * ============================================================================ */

/**
 * Load theme text domain for translations
 *
 * Loads the theme's translation files from the /languages directory.
 * This allows the theme to be translated into different languages.
 *
 * Hook: after_setup_theme
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function my_theme_load_theme_textdomain() {
	// Load translations from /languages directory
	load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );

/* ============================================================================
 * ADMIN CUSTOMIZATION FUNCTIONS
 * ============================================================================
 * Functions that modify the WordPress admin interface.
 * ============================================================================ */

/**
 * Customize WordPress admin menu order
 *
 * Reorders the items in the WordPress admin sidebar menu to a custom layout.
 * This provides a more logical organization for content editors.
 *
 * Hook: custom_menu_order, menu_order
 * Priority: 10
 *
 * @since 1.0.0
 * @param array|bool $menu_ord Current menu order array, or false if not set.
 * @return array|bool Modified menu order array, or true to enable custom ordering.
 */
function wpse_custom_menu_order( $menu_ord ) {
	// If menu order is not set, return true to enable custom ordering
	if ( ! $menu_ord ) {
		return true;
	}

	// Return custom menu order array
	return array(
		'index.php',              // Dashboard
		'separator1',             // First separator
		'edit.php',               // Posts
		'upload.php',             // Media Library
		'link-manager.php',       // Links (if enabled)
		'edit-comments.php',      // Comments
		'edit.php?post_type=page', // Pages
		'separator2',             // Second separator
		'themes.php',             // Appearance
		'plugins.php',            // Plugins
		'users.php',              // Users
		'tools.php',              // Tools
		'options-general.php',    // Settings
		'separator-last',         // Last separator
	);
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );

/* ============================================================================
 * POST NAVIGATION FUNCTIONS
 * ============================================================================
 * Functions that enhance post navigation links with additional attributes.
 * ============================================================================ */

/**
 * Add title attribute to next post navigation link
 *
 * Automatically adds a title attribute to the "Next Post" link containing
 * the title of the next post. This improves accessibility and provides
 * a tooltip on hover.
 *
 * Hook: next_post_link
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @param string $crunchify_link The HTML output of the next post link.
 * @return string Modified link HTML with title attribute added.
 */
add_filter(
	'next_post_link',
	function( $crunchify_link ) {
		// Get the next post object
		$next_post = get_next_post();
		
		// Check if post exists
		if ( ! $next_post ) {
			return $crunchify_link;
		}
		
		// Extract and escape the post title to prevent XSS
		$crunchify_title = esc_attr( $next_post->post_title );
		
		// Insert title attribute before href attribute
		$crunchify_link = str_replace( 'href=', 'title="' . $crunchify_title . '" href=', $crunchify_link );
		
		return $crunchify_link;
	}
);

/**
 * Add title attribute to previous post navigation link
 *
 * Automatically adds a title attribute to the "Previous Post" link containing
 * the title of the previous post. This improves accessibility and provides
 * a tooltip on hover.
 *
 * Hook: previous_post_link
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @param string $crunchify_link The HTML output of the previous post link.
 * @return string Modified link HTML with title attribute added.
 */
add_filter(
	'previous_post_link',
	function( $crunchify_link ) {
		// Get the previous post object
		$previous_post = get_previous_post();
		
		// Check if post exists
		if ( ! $previous_post ) {
			return $crunchify_link;
		}
		
		// Extract and escape the post title to prevent XSS
		$crunchify_title = esc_attr( $previous_post->post_title );
		
		// Insert title attribute before href attribute
		$crunchify_link = str_replace( 'href=', 'title="' . $crunchify_title . '" href=', $crunchify_link );
		
		return $crunchify_link;
	}
);

/* ============================================================================
 * SHORTCODE FUNCTIONS
 * ============================================================================
 * Custom shortcodes that can be used in posts and pages.
 * ============================================================================ */

/**
 * Snapshot shortcode - Create a screenshot of a remote website
 *
 * Generates a thumbnail screenshot of any website using WordPress.com's mShots service.
 * The screenshot is cached for 24 hours to improve performance. The image is converted
 * to a base64 data URI for faster loading.
 *
 * Usage examples:
 * [snapshot url="http://www.wordpress.org" alt="WordPress.org" width="400" height="300"]
 * [snapshot url="https://example.com" width="800" height="600"]
 *
 * Hook: add_shortcode('snapshot')
 *
 * @since 1.0.0
 * @param array $atts {
 *     Shortcode attributes.
 *
 *     @type string $alt     Alt text for the image. Default empty.
 *     @type string $url     URL of the website to screenshot. Default 'http://www.wordpress.org'.
 *     @type string $width   Width of the screenshot in pixels. Default '400'.
 *     @type string $height  Height of the screenshot in pixels. Default '300'.
 * }
 * @return string HTML img tag with the screenshot as a base64 data URI.
 */
add_shortcode(
	'snapshot',
	function ( $atts ) {
		// Set default attributes and merge with user-provided attributes
		$atts = shortcode_atts(
			array(
				'alt'    => '',
				'url'    => 'http://www.wordpress.org',
				'width'  => '400',
				'height' => '300',
			),
			$atts
		);
		
		// Build parameters for mShots API
		$params = array(
			'w' => $atts['width'],
			'h' => $atts['height'],
		);
		
		// URL encode the target URL
		$url = urlencode( $atts['url'] );
		
		// Build mShots API URL
		$src = 'http://s.wordpress.com/mshots/v1/' . $url . '?' . http_build_query( $params, null, '&' );

		// Create cache key based on URL hash
		$cache_key = 'snapshot_' . md5( $src );
		
		// Try to get cached screenshot
		$data_uri = get_transient( $cache_key );
		
		// If not cached, fetch from mShots API
		if ( ! $data_uri ) {
			$response = wp_remote_get( $src );
			
			// Check if request was successful
			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				$image_data = wp_remote_retrieve_body( $response );
				
				// Convert image to base64 data URI
				if ( $image_data && is_string( $image_data ) ) {
					$src = $data_uri = 'data:image/jpeg;base64,' . base64_encode( $image_data );
					
					// Cache for 24 hours
					set_transient( $cache_key, $data_uri, DAY_IN_SECONDS );
				}
			}
		} else {
			// Use cached version
			$src = $data_uri;
		}

		// Return img tag with escaped attributes for security
		return '<img src="' . esc_attr( $src ) . '" alt="' . esc_attr( $atts['alt'] ) . '"/>';
	}
);

/* ============================================================================
 * MENU REGISTRATION FUNCTIONS
 * ============================================================================
 * Functions for registering custom navigation menus.
 * ============================================================================ */

/**
 * Register custom navigation menu location
 *
 * Registers a new menu location specifically for contest entry pages.
 * This menu can be assigned in Appearance > Menus in WordPress admin.
 *
 * Hook: init
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function wpb_custom_new_menu() {
	// Register 'contest-entry' menu location
	register_nav_menu( 'contest-entry', __( 'Contest Entry Menu' ) );
}
add_action( 'init', 'wpb_custom_new_menu' );

/* ============================================================================
 * MEDIA HANDLING FUNCTIONS
 * ============================================================================
 * Functions that modify how media files are processed and stored.
 * ============================================================================ */

/**
 * Set image alt text from IPTC caption metadata
 *
 * Automatically extracts the caption from IPTC metadata embedded in uploaded images
 * and uses the first 52 characters as the image's alt text. This improves SEO
 * and accessibility by providing descriptive alt text automatically.
 *
 * IPTC (International Press Telecommunications Council) metadata is commonly
 * embedded in photos by professional cameras and photo editing software.
 *
 * Hook: wp_generate_attachment_metadata
 * Priority: 10
 * Arguments: 2
 *
 * @since 1.0.0
 * @param array  $metadata      Attachment metadata array generated by WordPress.
 * @param int    $attachment_id The attachment (image) post ID.
 * @return array Unmodified metadata array (we only update post meta, not metadata).
 */
function set_image_alt_from_iptc_caption( $metadata, $attachment_id ) {
	// Get the full file path to the uploaded image
	$file_path = get_attached_file( $attachment_id );

	// Verify file exists before processing
	if ( ! file_exists( $file_path ) ) {
		return $metadata;
	}

	// Extract image information including IPTC data
	// $info will contain IPTC data in 'APP13' key if present
	$size = getimagesize( $file_path, $info );
	
	// Check if IPTC data exists
	if ( isset( $info['APP13'] ) ) {
		// Parse IPTC data into an array
		$iptc = iptcparse( $info['APP13'] );
		
		// IPTC tag '2#120' is the caption/description field
		if ( isset( $iptc['2#120'][0] ) ) {
			$caption = $iptc['2#120'][0];
			
			// Limit to first 52 characters (common alt text best practice)
			$short_caption = substr( $caption, 0, 52 );

			// Update the WordPress attachment alt text meta field
			// This is what appears in the alt attribute of <img> tags
			update_post_meta( $attachment_id, '_wp_attachment_image_alt', sanitize_text_field( $short_caption ) );
		}
	}

	// Return metadata unchanged (we modify post meta separately)
	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'set_image_alt_from_iptc_caption', 10, 2 );

/**
 * Responsive Image Helper Function
 *
 * Generates responsive image markup with src, srcset, and sizes attributes
 * for ACF image fields. This function outputs the attributes needed for
 * responsive images that adapt to different screen sizes.
 *
 * @since 1.0.0
 * @param string $image_id   The ID of the image (from ACF or similar).
 * @param string $image_size The size of the thumbnail image or custom image size.
 * @param string $max_width  The max width this image will be shown to build the sizes attribute.
 * @return void Outputs HTML attributes directly.
 */
function awesome_acf_responsive_image( $image_id, $image_size, $max_width ) {
	// Check the image ID is not blank
	if ( $image_id != '' ) {
		// Set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// Set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// Generate the markup for the responsive image
		echo 'src="' . esc_attr( $image_src ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="(max-width: ' . esc_attr( $max_width ) . ') 100vw, ' . esc_attr( $max_width ) . '"';
	}
}

/* ============================================================================
 * CONTENT WIDTH FUNCTIONS
 * ============================================================================
 * Functions that adjust content width based on page templates.
 * ============================================================================ */

/**
 * Set default content width
 *
 * Sets the global content width variable if not already set.
 * This is used by WordPress to determine the maximum width for
 * embedded media content.
 *
 * @since 1.0.0
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/**
 * Adjust content width for full-width page template
 *
 * Dynamically adjusts the content width when using a full-width page template.
 * This allows embedded media to use the full width of the container on
 * full-width pages.
 *
 * Hook: template_redirect
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @global int $content_width
 * @return void
 */
function mytheme_adjust_content_width() {
	global $content_width;

	// Increase content width for full-width template
	if ( is_page_template( 'full-width.php' ) ) {
		$content_width = 1170;
	}
}
add_action( 'template_redirect', 'mytheme_adjust_content_width' );

/* ============================================================================
 * ADMIN CUSTOMIZATION FUNCTIONS (ADDITIONAL)
 * ============================================================================
 * Additional functions that customize the WordPress admin interface.
 * ============================================================================ */

/**
 * Change admin footer text
 *
 * Replaces the default WordPress admin footer text with custom text
 * indicating who built the CMS. This appears at the bottom of all
 * WordPress admin pages.
 *
 * Hook: admin_footer_text
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void Outputs HTML directly.
 */
function remove_footer_admin() {
	echo 'NPPA BOP CMS v1.0 was built by Seth Gitner';
}
add_filter( 'admin_footer_text', 'remove_footer_admin' );

/**
 * Move Yoast SEO metabox to bottom
 *
 * Changes the priority of the Yoast SEO metabox so it appears at the
 * bottom of the post/page edit screen instead of at the top. This
 * provides a cleaner editing experience.
 *
 * Hook: wpseo_metabox_prio
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return string Priority level ('low' = bottom, 'high' = top).
 */
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );

/* ============================================================================
 * COMMENT SYSTEM FUNCTIONS
 * ============================================================================
 * Functions that disable or modify the WordPress comment system.
 * ============================================================================ */

/**
 * Remove comments menu from admin
 *
 * Removes the Comments menu item from the WordPress admin sidebar.
 * This is part of completely disabling the comment system.
 *
 * Hook: admin_menu
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
add_action( 'admin_menu', 'pk_remove_admin_menus' );
function pk_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}

/**
 * Remove comment support from posts and pages
 *
 * Disables the comment functionality for posts and pages by removing
 * comment support from these post types. This prevents users from
 * enabling comments on individual posts/pages.
 *
 * Hook: init
 * Priority: 100 (runs late to ensure post types are registered)
 *
 * @since 1.0.0
 * @return void
 */
add_action( 'init', 'pk_remove_comment_support', 100 );
function pk_remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}

/**
 * Remove comments from admin bar
 *
 * Removes the Comments menu item from the WordPress admin bar that
 * appears at the top of the site when logged in.
 *
 * Hook: wp_before_admin_bar_render
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
function pk_remove_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}

/* ============================================================================
 * EDITOR CUSTOMIZATION FUNCTIONS
 * ============================================================================
 * Functions that customize the WordPress visual editor (TinyMCE).
 * ============================================================================ */

/**
 * Add custom style formats to TinyMCE editor
 *
 * Adds custom style formats to the WordPress visual editor's "Formats" dropdown.
 * This allows content editors to easily apply predefined styles to content.
 *
 * Hook: tiny_mce_before_init
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @param array $init_array TinyMCE initialization array.
 * @return array Modified initialization array with custom formats.
 */
function my_mce_before_init_insert_formats( $init_array ) {
	/**
	 * Define custom style formats
	 *
	 * Each format includes:
	 * - title: Label shown in Formats dropdown
	 * - block: HTML element type (span, div, etc.)
	 * - classes: CSS classes to apply
	 * - wrapper: Whether to wrap selected content or replace it
	 */
	$style_formats = array(
		array(
			'title'   => 'Content Block',
			'block'   => 'span',
			'classes' => 'content-block',
			'wrapper' => true,
		),
		array(
			'title'   => 'Blue Button',
			'block'   => 'span',
			'classes' => 'blue-button',
			'wrapper' => true,
		),
		array(
			'title'   => 'Red Button',
			'block'   => 'span',
			'classes' => 'red-button',
			'wrapper' => true,
		),
	);

	// Insert the array, JSON encoded, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

/* ============================================================================
 * TAXONOMY FUNCTIONS
 * ============================================================================
 * Functions that modify taxonomies and their relationships to post types.
 * ============================================================================ */

/**
 * Add categories to pages
 *
 * Enables the category taxonomy for pages, allowing pages to be organized
 * with categories just like posts. This provides better content organization
 * for page-based content.
 *
 * Hook: init
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

/* ============================================================================
 * ACF (ADVANCED CUSTOM FIELDS) FUNCTIONS
 * ============================================================================
 * Functions that integrate with Advanced Custom Fields plugin.
 * ============================================================================ */

/**
 * Set featured image from ACF mugshot field
 *
 * Automatically sets the post's featured image when an ACF field named
 * 'mugshot' is updated. This allows the mugshot field to serve as both
 * a custom field and the featured image.
 *
 * Hook: acf/update_value/name=mugshot
 * Priority: 10
 * Arguments: 3
 *
 * @since 1.0.0
 * @param mixed  $value   The field value being saved.
 * @param int    $post_id The post ID where the field is being saved.
 * @param array  $field   The field array containing all settings.
 * @return mixed Unchanged field value.
 */
function acf_set_featured_image( $value, $post_id, $field ) {
	// Only proceed if a value is provided
	if ( $value != '' ) {
		// Add the value (image ID) to the _thumbnail_id meta data for the current post
		// This sets it as the featured image
		add_post_meta( $post_id, '_thumbnail_id', $value );
	}

	return $value;
}
// Filter for a specific ACF field based on its name
add_filter( 'acf/update_value/name=mugshot', 'acf_set_featured_image', 10, 3 );

/* ============================================================================
 * ERROR HANDLING CONFIGURATION
 * ============================================================================
 * PHP error reporting configuration for production environments.
 * ============================================================================ */

/**
 * Configure PHP error reporting
 *
 * Suppresses PHP warnings and notices while still showing fatal errors.
 * This prevents warning messages from breaking the page layout while
 * still allowing critical errors to be displayed for debugging.
 *
 * Note: This should only be used in production. For development, use
 * WP_DEBUG and WP_DEBUG_LOG in wp-config.php instead.
 *
 * @since 1.0.0
 * @return void
 */
error_reporting( E_ERROR );

/* ============================================================================
 * CSV Import Functions for Mega Menu
 * ============================================================================ */

/**
 * Import Mega Menu from CSV
 *
 * Reads a CSV file and populates the ACF mega menu structure.
 * CSV format: division, category, category_url
 *
 * @since 1.1.0
 * @param string $csv_file_path Path to the CSV file
 * @return array|WP_Error Array of imported data or WP_Error on failure
 */
function bop_import_mega_menu_csv( $csv_file_path ) {
	if ( ! function_exists( 'get_field' ) ) {
		return new WP_Error( 'acf_missing', 'ACF plugin is required for this function.' );
	}

	if ( ! file_exists( $csv_file_path ) ) {
		return new WP_Error( 'file_not_found', 'CSV file not found: ' . $csv_file_path );
	}

	$handle = fopen( $csv_file_path, 'r' );
	if ( $handle === false ) {
		return new WP_Error( 'file_open_error', 'Could not open CSV file.' );
	}

	// Skip header row
	$header = fgetcsv( $handle );
	
	$divisions = array();
	$seen_items = array(); // Track items to avoid duplicates

	// Read CSV data
	while ( ( $data = fgetcsv( $handle ) ) !== false ) {
		if ( count( $data ) < 3 ) {
			continue; // Skip invalid rows
		}

		$division = trim( $data[0] );
		$category = trim( $data[1] );
		$category_url = trim( $data[2] );

		// Skip empty rows
		if ( empty( $division ) || empty( $category ) || empty( $category_url ) ) {
			continue;
		}

		// Create unique key to avoid duplicates
		$item_key = $division . '|' . $category . '|' . $category_url;
		if ( isset( $seen_items[ $item_key ] ) ) {
			continue; // Skip duplicate rows
		}
		$seen_items[ $item_key ] = true;

		// Initialize division if it doesn't exist
		if ( ! isset( $divisions[ $division ] ) ) {
			$divisions[ $division ] = array(
				'column_title' => $division,
				'items'        => array(),
				'sections'     => array(),
			);
		}

		// Build URL from slug - use category_url directly or convert to URL
		$url = home_url( '/' . sanitize_title( $category_url ) . '/' );

		// Add category to division (avoid duplicates within division)
		$item_exists = false;
		foreach ( $divisions[ $division ]['items'] as $existing_item ) {
			if ( $existing_item['item_title'] === $category && $existing_item['item_url'] === $url ) {
				$item_exists = true;
				break;
			}
		}

		if ( ! $item_exists ) {
			$divisions[ $division ]['items'][] = array(
				'item_title' => $category,
				'item_url'   => $url,
				'item_target' => false,
				'item_active' => false,
			);
		}
	}

	fclose( $handle );

	// Convert divisions array to ACF format
	$mega_menu_columns = array();
	foreach ( $divisions as $division ) {
		$mega_menu_columns[] = $division;
	}

	return $mega_menu_columns;
}

/**
 * Save Mega Menu to ACF Options
 *
 * Saves the imported mega menu data to ACF options page.
 *
 * @since 1.1.0
 * @param array $mega_menu_data The mega menu data from CSV import
 * @param string $menu_item_title The title of the menu item to update
 * @return bool|WP_Error True on success, WP_Error on failure
 */
function bop_save_mega_menu_to_acf( $mega_menu_data, $menu_item_title = 'Categories' ) {
	if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
		return new WP_Error( 'acf_missing', 'ACF plugin is required for this function.' );
	}

	// Get current menu items
	$menu_items = get_field( 'primary_menu_items', 'option' );
	
	if ( ! is_array( $menu_items ) ) {
		$menu_items = array();
	}

	// Find or create the menu item
	$menu_item_index = -1;
	foreach ( $menu_items as $index => $item ) {
		if ( isset( $item['menu_title'] ) && $item['menu_title'] === $menu_item_title ) {
			$menu_item_index = $index;
			break;
		}
	}

	// If menu item not found, create it
	if ( $menu_item_index === -1 ) {
		$menu_item_index = count( $menu_items );
		$menu_items[] = array(
			'menu_title' => $menu_item_title,
			'menu_url'   => '#',
			'menu_target' => false,
			'menu_type'  => 'mega',
		);
	}

	// Update the menu item with mega menu data
	$menu_items[ $menu_item_index ]['menu_type'] = 'mega';
	$menu_items[ $menu_item_index ]['mega_menu_columns'] = $mega_menu_data;

	// Save to ACF
	$result = update_field( 'primary_menu_items', $menu_items, 'option' );

	return $result ? true : new WP_Error( 'save_failed', 'Failed to save mega menu data to ACF.' );
}

/**
 * Admin Page for CSV Import
 *
 * Creates an admin page for importing mega menu CSV files.
 * This will appear as a submenu under Site Options if available,
 * otherwise as a standalone menu item.
 *
 * @since 1.1.0
 */
function bop_add_mega_menu_import_page() {
	global $submenu, $menu;
	
	// ACF creates the menu with menu_slug 'site-options'
	// WordPress converts it to a hook, try multiple possibilities
	$possible_parents = array(
		'acf-options-site-options',
		'site-options',
		'acf-options-site_options',
	);
	
	$parent_slug = 'acf-options-site-options'; // Default
	
	// Find the actual parent slug from submenu
	foreach ( $possible_parents as $possible ) {
		if ( isset( $submenu[ $possible ] ) ) {
			$parent_slug = $possible;
			break;
		}
	}
	
	// Also check menu items (top level)
	if ( $parent_slug === 'acf-options-site-options' ) {
		foreach ( $menu as $menu_item ) {
			if ( isset( $menu_item[2] ) && ( $menu_item[2] === 'site-options' || strpos( $menu_item[2], 'site-options' ) !== false ) ) {
				$parent_slug = $menu_item[2];
				break;
			}
		}
	}
	
	// Add as submenu - WordPress will handle if parent doesn't exist
	add_submenu_page(
		$parent_slug,
		'Import Mega Menu',
		'Import Mega Menu',
		'manage_options',
		'import-mega-menu',
		'bop_mega_menu_import_page_callback'
	);
}
// Use very high priority to ensure ACF has created the menu first
add_action( 'admin_menu', 'bop_add_mega_menu_import_page', 999 );

/**
 * Mega Menu Import Page Callback
 *
 * Displays the import page and handles CSV upload/import.
 *
 * @since 1.1.0
 */
function bop_mega_menu_import_page_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	$message = '';
	$message_type = '';
	$example_upload_message = '';

	// Handle example CSV upload
	if ( isset( $_POST['upload_example_csv'] ) && isset( $_FILES['example_csv_file'] ) && ! empty( $_FILES['example_csv_file']['tmp_name'] ) ) {
		check_admin_referer( 'bop_upload_example_csv_mega_menu' );
		
		$uploaded_file = $_FILES['example_csv_file']['tmp_name'];
		$file_name = sanitize_file_name( $_FILES['example_csv_file']['name'] );
		
		// Create uploads directory if it doesn't exist
		$uploads_dir = wp_upload_dir();
		$example_dir = $uploads_dir['basedir'] . '/csv-examples';
		if ( ! is_dir( $example_dir ) ) {
			wp_mkdir_p( $example_dir );
			file_put_contents( $example_dir . '/index.php', '<?php // Silence is golden' );
		}
		
		// Move uploaded file
		$destination = $example_dir . '/mega-menu-example.csv';
		if ( move_uploaded_file( $uploaded_file, $destination ) ) {
			update_option( 'bop_mega_menu_example_csv', $uploads_dir['baseurl'] . '/csv-examples/mega-menu-example.csv' );
			$example_upload_message = '<div class="notice notice-success is-dismissible"><p>Example CSV file uploaded successfully!</p></div>';
		} else {
			$example_upload_message = '<div class="notice notice-error is-dismissible"><p>Error uploading example CSV file.</p></div>';
		}
	}

	// Handle file upload
	if ( isset( $_POST['bop_import_csv'] ) && isset( $_FILES['csv_file'] ) && ! empty( $_FILES['csv_file']['tmp_name'] ) ) {
		check_admin_referer( 'bop_import_mega_menu' );

		$uploaded_file = $_FILES['csv_file']['tmp_name'];
		$menu_item_title = isset( $_POST['menu_item_title'] ) ? sanitize_text_field( $_POST['menu_item_title'] ) : 'Categories';

		// Import CSV
		$mega_menu_data = bop_import_mega_menu_csv( $uploaded_file );

		if ( is_wp_error( $mega_menu_data ) ) {
			$message = 'Error: ' . $mega_menu_data->get_error_message();
			$message_type = 'error';
		} else {
			// Save to ACF
			$result = bop_save_mega_menu_to_acf( $mega_menu_data, $menu_item_title );

			if ( is_wp_error( $result ) ) {
				$message = 'Error saving: ' . $result->get_error_message();
				$message_type = 'error';
			} else {
				$message = 'Mega menu imported successfully! ' . count( $mega_menu_data ) . ' columns imported.';
				$message_type = 'success';
			}
		}
	}
	?>
		<div class="wrap">
		<h1>Import Mega Menu from CSV</h1>
		
		<?php if ( $example_upload_message ) : ?>
			<?php echo $example_upload_message; ?>
		<?php endif; ?>
		
		<?php if ( $message ) : ?>
			<div class="notice notice-<?php echo esc_attr( $message_type === 'success' ? 'success' : 'error' ); ?> is-dismissible">
				<p><?php echo esc_html( $message ); ?></p>
			</div>
		<?php endif; ?>

		<div class="card">
			<h2>Manage Mega Menu</h2>
			<p>To manually create or edit the mega menu structure, go to <a href="<?php echo esc_url( admin_url( 'admin.php?page=acf-options-site-options' ) ); ?>"><strong>Site Options</strong></a> and edit the "Menu Items" field. You can add menu items, set up mega menu columns, and configure dropdown items there.</p>
			<p><em>This import tool will populate the mega menu data from a CSV file, but you can always edit it manually on the Site Options page.</em></p>
		</div>

		<div class="card" style="margin-top: 20px;">
			<h2>CSV Format</h2>
			<p>Your CSV file should have the following columns:</p>
			<ul>
				<li><strong>division</strong> - The column title (e.g., "Still Photojournalism", "Picture Editing")</li>
				<li><strong>category</strong> - The menu item title</li>
				<li><strong>category_url</strong> - The URL slug (will be converted to full URL)</li>
			</ul>
			<p><strong>Note:</strong> The first row should be headers and will be skipped.</p>
			
			<?php
			// Get example CSV URL
			$example_csv_url = get_option( 'bop_mega_menu_example_csv' );
			?>
			
			<h3 style="margin-top: 20px;">Example CSV File</h3>
			<?php if ( $example_csv_url ) : ?>
				<p><a href="<?php echo esc_url( $example_csv_url ); ?>" class="button" download>Download Example CSV</a></p>
			<?php endif; ?>
			
			<form method="post" enctype="multipart/form-data" style="margin-top: 10px;">
				<?php wp_nonce_field( 'bop_upload_example_csv_mega_menu' ); ?>
				<input type="file" name="example_csv_file" id="example_csv_file" accept=".csv">
				<?php submit_button( 'Upload Example CSV', 'secondary', 'upload_example_csv', false ); ?>
				<p class="description">Upload an example CSV file that users can download as a template.</p>
			</form>
		</div>

		<form method="post" enctype="multipart/form-data" class="card" style="margin-top: 20px;">
			<?php wp_nonce_field( 'bop_import_mega_menu' ); ?>
			
			<table class="form-table">
				<tr>
					<th scope="row">
						<label for="csv_file">CSV File</label>
					</th>
					<td>
						<input type="file" name="csv_file" id="csv_file" accept=".csv" required>
						<p class="description">Select the CSV file to import.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="menu_item_title">Menu Item Title</label>
					</th>
					<td>
						<input type="text" name="menu_item_title" id="menu_item_title" value="Categories" class="regular-text">
						<p class="description">The title of the menu item that will contain this mega menu (e.g., "Categories").</p>
					</td>
				</tr>
			</table>

			<?php submit_button( 'Import CSV', 'primary', 'bop_import_csv' ); ?>
		</form>
	</div>
	<?php
}

/* ============================================================================
 * ACF Options Pages
 * ============================================================================ */

/**
 * Register ACF Options Page: Site Options
 *
 * Creates a "Site Options" menu in the WordPress admin where site-wide
 * settings can be managed, including navigation menus.
 *
 * @since 1.1.0
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title'  => 'Site Options',
		'menu_title'  => 'Site Options',
		'menu_slug'   => 'site-options',
		'capability'  => 'manage_options',
		'icon_url'    => 'dashicons-admin-settings',
		'position'    => 30,
	) );
}

/**
 * Ensure Primary Navigation Menu field group is accessible
 * This ensures the field group from JSON is properly registered in ACF
 *
 * @since 1.1.0
 */
add_action( 'acf/init', function() {
	// Check if the field group exists in the database
	$field_group = acf_get_field_group( 'group_primary_navigation' );
	
	// If it doesn't exist in DB but JSON file exists, trigger sync
	if ( ! $field_group ) {
		$json_file = get_stylesheet_directory() . '/acf-json/group_primary_navigation.json';
		if ( file_exists( $json_file ) ) {
			// ACF will automatically sync on next page load
			// This just ensures the JSON is recognized
			acf_get_local_field_groups();
		}
	}
} );

/**
 * Fix Debug Log Manager path for local development
 * Updates debug log path if it contains production server path
 * Only runs once to prevent infinite loops
 *
 * @since 1.1.0
 */

/**
 * Fix debug log paths from production server to local paths
 * Only runs once to prevent infinite loops
 * Skips during AJAX/REST requests to prevent JSON response issues
 *
 * @since 1.1.0
 */
add_action( 'admin_init', function() {
	static $fixed = false;
	
	// Skip during AJAX requests, REST API, and admin-ajax to prevent JSON response issues
	if ( wp_doing_ajax() || 
	     ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ||
	     ( defined( 'WP_CLI' ) && WP_CLI ) ) {
		return;
	}
	
	// Only run once per request
	if ( $fixed ) {
		return;
	}
	
	$debug_log_path = get_option( 'debug_log_manager_file_path' );
	
	// Check if the path contains production server path
	if ( $debug_log_path && strpos( $debug_log_path, '/home/customer/www/bop.nppa.org' ) !== false ) {
		// Generate new local path
		$uploads = @wp_upload_dir();
		if ( $uploads && ( ! isset( $uploads['error'] ) || empty( $uploads['error'] ) ) ) {
			$uploads_path = $uploads['basedir'] . '/debug-log-manager';
			$plain_domain = str_replace( array( ".", "-" ), "", sanitize_text_field( $_SERVER['SERVER_NAME'] ?? 'localhost' ) );
			$unique_key = date( 'YmdHi' ) . rand(12345678, 87654321);
			$new_debug_log_path = $uploads_path . '/' . $plain_domain . '_' . $unique_key . '_debug.log';
			
			// Update the option with local path (suppress errors)
			@update_option( 'debug_log_manager_file_path', $new_debug_log_path, false );
			
			// Ensure directory exists (suppress errors)
			if ( ! is_dir( $uploads_path ) ) {
				@wp_mkdir_p( $uploads_path );
				@file_put_contents( $uploads_path . '/index.php', '<?php // Nothing to show here' );
			}
		}
	}
	
	// Fix Error Log Viewer global variable
	global $rrrlgvwr_php_error_path;
	if ( isset( $rrrlgvwr_php_error_path ) && strpos( $rrrlgvwr_php_error_path, '/home/customer/www/bop.nppa.org' ) !== false ) {
		$rrrlgvwr_php_error_path = WP_CONTENT_DIR . '/debug.log';
	}
	
	$fixed = true;
}, 1 );

/**
 * Rename Site Options submenu to "Nav Menu"
 *
 * Changes the submenu item title from "Site Options" to "Nav Menu"
 * so it's clearer what that page is for.
 *
 * @since 1.1.0
 */
function bop_rename_site_options_submenu() {
	global $submenu;
	
	// Find and rename the Site Options submenu item
	// Check all possible parent slugs
	$possible_parents = array(
		'acf-options-site-options',
		'site-options',
		'acf-options-site_options',
	);
	
	// Also check all submenus for the site-options page
	foreach ( $submenu as $parent_slug => $items ) {
		if ( strpos( $parent_slug, 'site-options' ) !== false || strpos( $parent_slug, 'site_options' ) !== false ) {
			foreach ( $items as $key => $item ) {
				// Find the item that matches the ACF options page slug
				if ( isset( $item[2] ) ) {
					$item_slug = $item[2];
					if ( $item_slug === 'acf-options-site-options' || 
					     $item_slug === 'site-options' ||
					     ( isset( $item[0] ) && $item[0] === 'Site Options' ) ) {
						// Change the menu title (index 0) to "Nav Menu"
						$submenu[ $parent_slug ][ $key ][0] = 'Nav Menu';
						break 2; // Break out of both loops
					}
				}
			}
		}
	}
}
// Run at very high priority to ensure ACF has created the menu
add_action( 'admin_menu', 'bop_rename_site_options_submenu', 1000 );

/**
 * Add Site Options Dashboard Page
 *
 * Creates a dashboard/landing page for Site Options that lists all available tools.
 * This appears as the first submenu item under Site Options.
 *
 * @since 1.1.0
 */
function bop_add_site_options_dashboard() {
	global $submenu;
	
	// ACF creates the menu with menu_slug 'site-options'
	// WordPress converts it to a hook, try multiple possibilities
	$possible_parents = array(
		'acf-options-site-options',
		'site-options',
		'acf-options-site_options',
	);
	
	$parent_slug = 'acf-options-site-options'; // Default
	
	// Find the actual parent slug
	foreach ( $possible_parents as $possible ) {
		if ( isset( $submenu[ $possible ] ) ) {
			$parent_slug = $possible;
			break;
		}
	}
	
	// Also check menu items (top level)
	global $menu;
	foreach ( $menu as $menu_item ) {
		if ( isset( $menu_item[2] ) && ( $menu_item[2] === 'site-options' || strpos( $menu_item[2], 'site-options' ) !== false ) ) {
			$parent_slug = $menu_item[2];
			break;
		}
	}
	
	// Add dashboard as submenu under Site Options
	// Use position 0 to make it appear first
	add_submenu_page(
		$parent_slug,
		'Site Options Dashboard',
		'Dashboard',
		'manage_options',
		'site-options-dashboard',
		'bop_site_options_dashboard_callback',
		0
	);
}
// Use very high priority to ensure ACF has created the menu first
add_action( 'admin_menu', 'bop_add_site_options_dashboard', 999 );

/**
 * Site Options Dashboard Callback
 *
 * Displays a dashboard with links to all Site Options tools and settings.
 *
 * @since 1.1.0
 */
function bop_site_options_dashboard_callback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}
	?>
	<div class="wrap">
		<h1>Site Options Dashboard</h1>
		<p class="description">Manage your site settings, navigation menus, and import tools from this central location.</p>

		<div class="site-options-dashboard" style="margin-top: 20px;">
			<div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
				
				<!-- Nav Menu Card -->
				<div class="card" style="padding: 20px;">
					<h2 style="margin-top: 0;">
						<span class="dashicons dashicons-menu" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></span>
						Nav Menu
					</h2>
					<p>Manage site-wide settings, navigation menus, and configuration options.</p>
					<p>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=acf-options-site-options' ) ); ?>" class="button button-primary">
							Nav Menu
						</a>
					</p>
				</div>

				<!-- Mega Menu Management Card -->
				<div class="card" style="padding: 20px;">
					<h2 style="margin-top: 0;">
						<span class="dashicons dashicons-menu" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></span>
						Mega Menu
					</h2>
					<p>Create and manage your mega menu structure. Import from CSV or edit manually.</p>
					<p>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=acf-options-site-options#menu-items' ) ); ?>" class="button">
							Edit Mega Menu
						</a>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=import-mega-menu' ) ); ?>" class="button">
							Import from CSV
						</a>
					</p>
				</div>

				<!-- CSV List Import Card -->
				<div class="card" style="padding: 20px;">
					<h2 style="margin-top: 0;">
						<span class="dashicons dashicons-list-view" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></span>
						CSV List Import
					</h2>
					<p>Import CSV data into posts/pages to display as lists with featured images.</p>
					<p>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=import-csv-list' ) ); ?>" class="button button-primary">
							Import CSV List
						</a>
					</p>
				</div>

				<!-- CPT CSV Import Card -->
				<div class="card" style="padding: 20px;">
					<h2 style="margin-top: 0;">
						<span class="dashicons dashicons-admin-post" style="font-size: 24px; vertical-align: middle; margin-right: 8px;"></span>
						Import CPT from CSV
					</h2>
					<p>Import CSV data into Custom Post Types. Update existing posts or create new ones based on CSV data.</p>
					<p>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=import-cpt-csv' ) ); ?>" class="button button-primary">
							Import CPT from CSV
						</a>
					</p>
				</div>

			</div>

			<!-- Quick Links Section -->
			<div class="card" style="margin-top: 20px; padding: 20px;">
				<h2>Quick Links</h2>
				<ul style="list-style: disc; margin-left: 20px;">
					<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=acf-options-site-options' ) ); ?>">Nav Menu</a> - Configure navigation menus and site-wide settings</li>
					<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=import-mega-menu' ) ); ?>">Import Mega Menu</a> - Import mega menu structure from CSV</li>
					<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=import-csv-list' ) ); ?>">Import CSV List</a> - Import CSV data for post/page lists</li>
					<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=import-cpt-csv' ) ); ?>">Import CPT from CSV</a> - Import/update Custom Post Type posts from CSV</li>
					<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">WordPress Menus</a> - Manage standard WordPress navigation menus</li>
				</ul>
			</div>

			<!-- Help Section -->
			<div class="card" style="margin-top: 20px; padding: 20px; background-color: #f0f6fc;">
				<h2 style="margin-top: 0;">Need Help?</h2>
				<p><strong>Mega Menu:</strong> Go to Site Settings to manually create and edit your mega menu structure. Use the Import Mega Menu tool to bulk import from CSV.</p>
				<p><strong>CSV Lists:</strong> Import CSV files to create lists of posts with featured images. The data is stored in the selected post/page and can be displayed using the CSV List template.</p>
			</div>
		</div>
	</div>
	<?php
}

/* ============================================================================
 * ACF Navigation Functions
 * ============================================================================ */

/**
 * Get ACF Navigation Menu Items
 *
 * Retrieves navigation menu items from ACF options page.
 * Supports hierarchical dropdown menus.
 *
 * @since 1.1.0
 * @param string $menu_location The menu location identifier (e.g., 'primary', 'footer-about').
 * @return array Array of menu items with structure: ['title', 'url', 'target', 'children']
 */
function bop_get_acf_nav_menu( $menu_location = 'primary' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return array();
	}

	$menu_items = get_field( $menu_location . '_menu_items', 'option' );
	
	if ( ! $menu_items || ! is_array( $menu_items ) ) {
		return array();
	}

	$formatted_items = array();
	
	foreach ( $menu_items as $item ) {
		$menu_type = isset( $item['menu_type'] ) ? $item['menu_type'] : 'none';
		
		$formatted_item = array(
			'title'     => isset( $item['menu_title'] ) ? $item['menu_title'] : '',
			'url'       => isset( $item['menu_url'] ) ? esc_url( $item['menu_url'] ) : '#',
			'target'    => isset( $item['menu_target'] ) && $item['menu_target'] ? '_blank' : '',
			'menu_type' => $menu_type,
			'children'  => array(),
			'mega_menu' => array(),
		);

		// Check for simple dropdown items
		if ( $menu_type === 'dropdown' && isset( $item['dropdown_items'] ) && is_array( $item['dropdown_items'] ) ) {
			foreach ( $item['dropdown_items'] as $child ) {
				$formatted_item['children'][] = array(
					'title'  => isset( $child['menu_title'] ) ? $child['menu_title'] : '',
					'url'    => isset( $child['menu_url'] ) ? esc_url( $child['menu_url'] ) : '#',
					'target' => isset( $child['menu_target'] ) && $child['menu_target'] ? '_blank' : '',
				);
			}
		}

		// Check for mega menu columns
		if ( $menu_type === 'mega' && isset( $item['mega_menu_columns'] ) && is_array( $item['mega_menu_columns'] ) ) {
			foreach ( $item['mega_menu_columns'] as $column ) {
				$column_data = array(
					'title'    => isset( $column['column_title'] ) ? $column['column_title'] : '',
					'items'    => array(),
					'sections' => array(),
				);

				// Add column items
				if ( isset( $column['column_items'] ) && is_array( $column['column_items'] ) ) {
					foreach ( $column['column_items'] as $col_item ) {
						$column_data['items'][] = array(
							'title'  => isset( $col_item['item_title'] ) ? $col_item['item_title'] : '',
							'url'    => isset( $col_item['item_url'] ) ? esc_url( $col_item['item_url'] ) : '#',
							'target' => isset( $col_item['item_target'] ) && $col_item['item_target'] ? '_blank' : '',
							'active'  => isset( $col_item['item_active'] ) && $col_item['item_active'] ? true : false,
						);
					}
				}

				// Add column sections (sub-sections)
				if ( isset( $column['column_sections'] ) && is_array( $column['column_sections'] ) ) {
					foreach ( $column['column_sections'] as $section ) {
						$section_data = array(
							'title' => isset( $section['section_title'] ) ? $section['section_title'] : '',
							'items' => array(),
						);

						if ( isset( $section['section_items'] ) && is_array( $section['section_items'] ) ) {
							foreach ( $section['section_items'] as $sec_item ) {
								$section_data['items'][] = array(
									'title'  => isset( $sec_item['item_title'] ) ? $sec_item['item_title'] : '',
									'url'    => isset( $sec_item['item_url'] ) ? esc_url( $sec_item['item_url'] ) : '#',
									'target' => isset( $sec_item['item_target'] ) && $sec_item['item_target'] ? '_blank' : '',
								);
							}
						}

						$column_data['sections'][] = $section_data;
					}
				}

				$formatted_item['mega_menu'][] = $column_data;
			}
		}

		$formatted_items[] = $formatted_item;
	}

	return $formatted_items;
}

/**
 * Render ACF Navigation Menu
 *
 * Outputs HTML for navigation menu using ACF data.
 * Supports dropdowns and mega menus.
 *
 * @since 1.1.0
 * @param string $menu_location The menu location identifier.
 * @param string $menu_type Type of menu: 'desktop', 'mobile', or 'footer'.
 * @return void
 */
function bop_render_acf_nav_menu( $menu_location = 'primary', $menu_type = 'desktop' ) {
	$menu_items = bop_get_acf_nav_menu( $menu_location );
	
	if ( empty( $menu_items ) ) {
		return;
	}

	$ul_class = '';
	$li_class = '';
	$a_class = '';

	// Set classes based on menu type
	switch ( $menu_type ) {
		case 'desktop':
			$ul_class = 'flex items-center space-x-8';
			$li_class = 'relative';
			$a_class = 'text-gray-700 hover:text-bop-blue transition-colors duration-200';
			break;
		case 'mobile':
			$ul_class = 'space-y-2';
			$li_class = '';
			$a_class = 'block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-bop-blue rounded-md transition-colors duration-200';
			break;
		case 'footer':
			$ul_class = 'space-y-4';
			$li_class = '';
			$a_class = 'text-gray-300 hover:text-white transition-colors duration-200';
			break;
	}

	echo '<ul class="' . esc_attr( $ul_class ) . '">';
	
	foreach ( $menu_items as $item ) {
		$has_children = ! empty( $item['children'] );
		$has_mega_menu = ! empty( $item['mega_menu'] );
		$item_menu_type = isset( $item['menu_type'] ) ? $item['menu_type'] : 'none';
		$item_class = $li_class;
		
		if ( ( $has_children || $has_mega_menu ) && $menu_type === 'desktop' ) {
			$item_class .= ' has-mega-menu';
			if ( $item_menu_type === 'dropdown' ) {
				$item_class .= ' has-dropdown group';
			}
		}

		echo '<li class="' . esc_attr( trim( $item_class ) ) . '" data-menu-type="' . esc_attr( $item_menu_type ) . '">';
		
		// Main menu link
		$link_attrs = 'href="' . esc_url( $item['url'] ) . '"';
		$link_attrs .= ' class="' . esc_attr( $a_class ) . ' flex items-center"';
		if ( ! empty( $item['target'] ) ) {
			$link_attrs .= ' target="' . esc_attr( $item['target'] ) . '" rel="noopener noreferrer"';
		}
		
		echo '<a ' . $link_attrs . '>';
		echo esc_html( $item['title'] );
		// Add chevron icon for items with dropdowns or mega menus
		if ( ( $has_children || $has_mega_menu ) && $menu_type === 'desktop' ) {
			echo '<svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
		}
		echo '</a>';
		
		// Store mega menu data as JSON for JavaScript
		if ( $has_mega_menu && $menu_type === 'desktop' ) {
			echo '<div class="mega-menu-content hidden">';
			echo json_encode( $item['mega_menu'] );
			echo '</div>';
		}
		
		// Simple dropdown menu for desktop
		if ( $has_children && $item_menu_type === 'dropdown' && $menu_type === 'desktop' ) {
			echo '<ul class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">';
			foreach ( $item['children'] as $child ) {
				echo '<li>';
				$child_attrs = 'href="' . esc_url( $child['url'] ) . '"';
				$child_attrs .= ' class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-bop-blue rounded-md"';
				if ( ! empty( $child['target'] ) ) {
					$child_attrs .= ' target="' . esc_attr( $child['target'] ) . '" rel="noopener noreferrer"';
				}
				echo '<a ' . $child_attrs . '>' . esc_html( $child['title'] ) . '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
		
		// Dropdown menu for mobile
		if ( ( $has_children || $has_mega_menu ) && $menu_type === 'mobile' ) {
			echo '<ul class="ml-4 mt-2 space-y-1">';
			// For mobile, flatten mega menu or show dropdown
			if ( $has_mega_menu ) {
				foreach ( $item['mega_menu'] as $column ) {
					foreach ( $column['items'] as $col_item ) {
						echo '<li>';
						$child_attrs = 'href="' . esc_url( $col_item['url'] ) . '"';
						$child_attrs .= ' class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md"';
						if ( ! empty( $col_item['target'] ) ) {
							$child_attrs .= ' target="' . esc_attr( $col_item['target'] ) . '" rel="noopener noreferrer"';
						}
						echo '<a ' . $child_attrs . '>' . esc_html( $col_item['title'] ) . '</a>';
						echo '</li>';
					}
					foreach ( $column['sections'] as $section ) {
						foreach ( $section['items'] as $sec_item ) {
							echo '<li>';
							$child_attrs = 'href="' . esc_url( $sec_item['url'] ) . '"';
							$child_attrs .= ' class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md"';
							if ( ! empty( $sec_item['target'] ) ) {
								$child_attrs .= ' target="' . esc_attr( $sec_item['target'] ) . '" rel="noopener noreferrer"';
							}
							echo '<a ' . $child_attrs . '>' . esc_html( $sec_item['title'] ) . '</a>';
							echo '</li>';
						}
					}
				}
			} else {
				foreach ( $item['children'] as $child ) {
					echo '<li>';
					$child_attrs = 'href="' . esc_url( $child['url'] ) . '"';
					$child_attrs .= ' class="block px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md"';
					if ( ! empty( $child['target'] ) ) {
						$child_attrs .= ' target="' . esc_attr( $child['target'] ) . '" rel="noopener noreferrer"';
					}
					echo '<a ' . $child_attrs . '>' . esc_html( $child['title'] ) . '</a>';
					echo '</li>';
				}
			}
			echo '</ul>';
		}
		
		echo '</li>';
	}
	
	echo '</ul>';
}

/* ============================================================================
 * Menu Walker Classes
 * ============================================================================ */

/**
 * Mega Menu Walker for Desktop Navigation
 *
 * Extends WordPress Walker_Nav_Menu to create a custom navigation structure
 * that supports mega menus with Tailwind CSS classes.
 *
 * @since 1.1.0
 */
class BOP_Mega_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Start the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments.
	 * @param int $id Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		// Check if item has children for mega menu
		$has_children = in_array( 'menu-item-has-children', $classes );
		$has_mega_menu = get_post_meta( $item->ID, '_menu_item_mega_menu', true );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ( $has_mega_menu ? ' has-mega-menu' : '' ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . ' class="text-gray-700 hover:text-bop-blue transition-colors duration-200">';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';

		// Add mega menu content wrapper if needed
		if ( $has_mega_menu && $depth === 0 ) {
			$mega_content = get_post_meta( $item->ID, '_menu_item_mega_content', true );
			if ( $mega_content ) {
				$item_output .= '<div class="mega-menu-content hidden">' . wp_kses_post( $mega_content ) . '</div>';
			}
		}

		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * End the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object.
	 * @param int $depth Depth of page. Not Used.
	 * @param array $args An array of arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}

/**
 * Mobile Menu Walker
 *
 * Extends WordPress Walker_Nav_Menu to create a mobile-friendly navigation
 * structure with Tailwind CSS classes.
 *
 * @since 1.1.0
 */
class BOP_Mobile_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Start the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments.
	 * @param int $id Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . ' class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-bop-blue rounded-md transition-colors duration-200">';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * End the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object.
	 * @param int $depth Depth of page. Not Used.
	 * @param array $args An array of arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}

/**
 * Footer Menu Walker
 *
 * Extends WordPress Walker_Nav_Menu to create footer navigation links
 * with Tailwind CSS classes.
 *
 * @since 1.1.0
 */
class BOP_Footer_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Start the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments.
	 * @param int $id Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : '';

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . ' class="text-gray-300 hover:text-white transition-colors duration-200">';
		$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * End the element output
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object.
	 * @param int $depth Depth of page. Not Used.
	 * @param array $args An array of arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}



/**
 * Display all winners from all categories
 * 
 * Queries all posts with winner data and displays them grouped by category,
 * with places (1st, 2nd, 3rd, HM) shown within each category.
 *
 * @return string HTML output of all winners
 */
function bop_display_all_winners() {
	// Get all post types that might have winners
	$winner_post_types = array( 'award', 'stillphotojournalism', 'pictureediting', 'videoediting', 'videophotojournalism' );
	
	// Query all posts with winner data
	$winners_query = new WP_Query( array(
		'post_type'      => $winner_post_types,
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'meta_query'     => array(
			array(
				'key'     => 'winning_images',
				'compare' => 'EXISTS',
			),
		),
	) );
	
	// Organize winners by category
	$winners_by_category = array();
	
	if ( $winners_query->have_posts() ) {
		while ( $winners_query->have_posts() ) {
			$winners_query->the_post();
			$post_id = get_the_ID();
			$category_name = get_the_title();
			$category_link = get_permalink();
			$category_featured_image = get_the_post_thumbnail_url( $post_id, 'full' );
			
			// Initialize category array
			if ( ! isset( $winners_by_category[ $category_name ] ) ) {
				$winners_by_category[ $category_name ] = array(
					'category_link' => $category_link,
					'category_featured_image' => $category_featured_image,
					'1st' => array(),
					'2nd' => array(),
					'3rd' => array(),
					'HM'  => array(),
				);
			}
			
			// Get winning images group
			if ( have_rows( 'winning_images', $post_id ) ) {
				while ( have_rows( 'winning_images', $post_id ) ) {
					the_row();
					
					// First Place
					if ( have_rows( 'first_place_group', $post_id ) ) {
						while ( have_rows( 'first_place_group', $post_id ) ) {
							the_row();
							$winners_by_category[ $category_name ]['1st'][] = array(
								'first_name'    => get_sub_field( 'first_name' ),
								'last_name'     => get_sub_field( 'last_name' ),
								'entry_name'    => get_sub_field( 'entry_name' ),
								'publication'   => get_sub_field( 'publication' ),
								'place'         => get_sub_field( 'place' ) ?: '1st',
								'image'         => get_sub_field( 'image' ),
								'entry_link'    => get_sub_field( 'link_to_winning_entry' ),
							);
						}
					}
					
					// Second Place
					if ( have_rows( 'second_place_group', $post_id ) ) {
						while ( have_rows( 'second_place_group', $post_id ) ) {
							the_row();
							$winners_by_category[ $category_name ]['2nd'][] = array(
								'first_name'    => get_sub_field( 'first_name' ),
								'last_name'     => get_sub_field( 'last_name' ),
								'entry_name'    => get_sub_field( 'entry_name' ),
								'publication'   => get_sub_field( 'publication' ),
								'place'         => get_sub_field( 'place' ) ?: '2nd',
								'entry_link'    => get_sub_field( 'link_to_winning_entry' ),
							);
						}
					}
					
					// Third Place
					if ( have_rows( 'third_place_group', $post_id ) ) {
						while ( have_rows( 'third_place_group', $post_id ) ) {
							the_row();
							$winners_by_category[ $category_name ]['3rd'][] = array(
								'first_name'    => get_sub_field( 'first_name' ),
								'last_name'     => get_sub_field( 'last_name' ),
								'entry_name'    => get_sub_field( 'entry_name' ),
								'publication'   => get_sub_field( 'publication' ),
								'place'         => get_sub_field( 'place' ) ?: '3rd',
								'entry_link'    => get_sub_field( 'link_to_winning_entry' ),
							);
						}
					}
					
					// Honorable Mentions (HM)
					$hm_groups = array( 'hm_one_place_group', 'hm_two_place_group', 'hm_three_place_group', 'hm_four_place_group', 'hm_five_place_group' );
					foreach ( $hm_groups as $hm_group ) {
						if ( have_rows( $hm_group, $post_id ) ) {
							while ( have_rows( $hm_group, $post_id ) ) {
								the_row();
								$winners_by_category[ $category_name ]['HM'][] = array(
									'first_name'    => get_sub_field( 'first_name' ),
									'last_name'     => get_sub_field( 'last_name' ),
									'entry_name'    => get_sub_field( 'entry_name' ),
									'publication'   => get_sub_field( 'publication' ),
									'place'         => get_sub_field( 'place' ) ?: 'HM',
									'entry_link'    => get_sub_field( 'link_to_winning_entry' ),
								);
							}
						}
					}
				}
			}
		}
		wp_reset_postdata();
	}
	
	// Display winners organized by category
	ob_start();
	?>
	<div class="winners-display">
		<?php foreach ( $winners_by_category as $category_name => $category_data ) : ?>
			<section class="winners-category-section">
				<?php if ( ! empty( $category_data['category_featured_image'] ) ) : ?>
					<div class="category-featured-image">
						<img src="<?php echo esc_url( $category_data['category_featured_image'] ); ?>" alt="<?php echo esc_attr( $category_name ); ?>" />
					</div>
				<?php endif; ?>
				<h2 class="winners-category-heading">
					<a href="<?php echo esc_url( $category_data['category_link'] ); ?>">
						<?php echo esc_html( $category_name ); ?>
					</a>
				</h2>
				
				<?php foreach ( array( '1st', '2nd', '3rd', 'HM' ) as $place ) : ?>
					<?php if ( ! empty( $category_data[ $place ] ) ) : ?>
						<div class="winners-place-group">
							<h3 class="winners-place-heading"><?php echo esc_html( $place ); ?> Place</h3>
							<div class="winners-list">
								<?php foreach ( $category_data[ $place ] as $winner ) : ?>
									<div class="winner-item">
										<div class="winner-details">
											<div class="winner-name">
												<?php if ( ! empty( $winner['entry_link'] ) ) : ?>
													<?php 
													$entry_post = is_array( $winner['entry_link'] ) ? $winner['entry_link'][0] : $winner['entry_link'];
													if ( is_object( $entry_post ) ) :
													?>
														<a href="<?php echo esc_url( get_permalink( $entry_post->ID ) ); ?>">
															<?php echo esc_html( $winner['first_name'] . ' ' . $winner['last_name'] ); ?>
														</a>
													<?php else : ?>
														<?php echo esc_html( $winner['first_name'] . ' ' . $winner['last_name'] ); ?>
													<?php endif; ?>
												<?php else : ?>
													<?php echo esc_html( $winner['first_name'] . ' ' . $winner['last_name'] ); ?>
												<?php endif; ?>
												<?php if ( ! empty( $winner['publication'] ) ) : ?>
													<span class="winner-publication"> / <?php echo esc_html( $winner['publication'] ); ?></span>
												<?php endif; ?>
											</div>
											<?php if ( ! empty( $winner['entry_name'] ) ) : ?>
												<div class="winner-entry">
													<?php if ( ! empty( $winner['entry_link'] ) ) : ?>
														<?php 
														$entry_post = is_array( $winner['entry_link'] ) ? $winner['entry_link'][0] : $winner['entry_link'];
														if ( is_object( $entry_post ) ) :
														?>
															<a href="<?php echo esc_url( get_permalink( $entry_post->ID ) ); ?>">
																<?php echo esc_html( $winner['entry_name'] ); ?>
															</a>
														<?php else : ?>
															<?php echo esc_html( $winner['entry_name'] ); ?>
														<?php endif; ?>
													<?php else : ?>
														<?php echo esc_html( $winner['entry_name'] ); ?>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</section>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
