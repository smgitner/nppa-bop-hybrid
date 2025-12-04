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
