<?php
/**
 * BOP Theme Functions and Definitions
 *
 * This is the main functions file for the BOP (Best of Photojournalism) WordPress theme.
 * It sets up theme support, registers features, and includes additional functionality files.
 *
 * The functions.php file is automatically loaded by WordPress and is the central place
 * where theme functionality is defined. This file follows WordPress coding standards
 * and best practices.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package bop_theme
 * @since 1.0.0
 * @version 1.1.0
 */

/* ============================================================================
 * THEME SETUP FUNCTION
 * ============================================================================
 * This function registers all theme support features and must run early
 * in the WordPress loading process (on the 'after_setup_theme' hook).
 * ============================================================================ */

if ( ! function_exists( 'bop_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * This function is essential for theme initialization. It must be hooked to
	 * 'after_setup_theme' which runs before the 'init' hook. Some features like
	 * post thumbnails must be registered early in the WordPress loading process.
	 *
	 * The function_exists check prevents conflicts if this function is defined
	 * elsewhere (e.g., in a child theme).
	 *
	 * Hook: after_setup_theme
	 * Priority: Default (10)
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function bop_theme_setup() {
		/**
		 * Make theme available for translation
		 *
		 * Loads the theme's text domain from the /languages directory.
		 * This allows the theme to be translated into different languages.
		 * Translation files should be placed in: /languages/
		 *
		 * @param string $domain Text domain identifier (must match style.css)
		 * @param string $path   Path to language files directory
		 */
		load_theme_textdomain( 'bop_theme', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>
		 *
		 * Automatically adds RSS feed links in the document head for:
		 * - Posts feed: /feed/
		 * - Comments feed: /comments/feed/
		 *
		 * This improves SEO and allows users to subscribe to site updates.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document <title> tag
		 *
		 * By enabling this feature, WordPress will automatically generate
		 * the <title> tag based on the current page/post. This is better
		 * than hard-coding titles because it's dynamic and SEO-friendly.
		 *
		 * The theme should NOT include a <title> tag in header.php when
		 * this feature is enabled.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails (Featured Images)
		 *
		 * This allows posts and pages to have a "Featured Image" which can
		 * be used in theme templates, archives, and social media sharing.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Register navigation menu locations
		 *
		 * Registers menu locations that can be assigned in Appearance > Menus.
		 * The 'Primary' menu is typically used for the main site navigation.
		 *
		 * Additional menus can be registered in /inc/custom.php
		 *
		 * @param array $locations Associative array of menu location IDs and descriptions
		 */
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bop_theme' ),
		) );

		/**
		 * Switch default core markup to HTML5
		 *
		 * Enables HTML5 markup for specific WordPress core elements.
		 * This provides better semantic HTML and improved accessibility.
		 *
		 * Supported elements:
		 * - search-form: Search form markup
		 * - comment-form: Comment form markup
		 * - comment-list: Comment list markup
		 * - gallery: Image gallery markup
		 * - caption: Image caption markup
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Set up the WordPress core custom background feature
		 *
		 * Allows users to customize the background color or image through
		 * Appearance > Customize > Background in the WordPress admin.
		 *
		 * @param array $args {
		 *     Background customization arguments.
		 *
		 *     @type string $default-color Default background color (hex code).
		 *     @type string $default-image Default background image URL.
		 * }
		 */
		add_theme_support( 'custom-background', apply_filters( 'bop_theme_custom_background_args', array(
			'default-color' => 'ffffff', // White background
			'default-image' => '',       // No default background image
		) ) );

		/**
		 * Add theme support for selective refresh for widgets
		 *
		 * Enables the Customizer to refresh specific widget areas without
		 * reloading the entire page. This provides a better user experience
		 * when customizing widgets in Appearance > Customize.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo
		 *
		 * Allows users to upload a custom logo through Appearance > Customize > Site Identity.
		 * The logo can be displayed in the theme header using the_custom_logo().
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 *
		 * @param array $args {
		 *     Logo customization arguments.
		 *
		 *     @type int    $height      Logo height in pixels.
		 *     @type int    $width       Logo width in pixels.
		 *     @type bool   $flex-width  Allow flexible width.
		 *     @type bool   $flex-height Allow flexible height.
		 * }
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,  // Maximum logo height
			'width'       => 250,  // Maximum logo width
			'flex-width'  => true, // Allow width to be flexible
			'flex-height' => true, // Allow height to be flexible
		) );
	}
endif;
// Hook the theme setup function to run after theme is loaded
add_action( 'after_setup_theme', 'bop_theme_setup' );

/* ============================================================================
 * WIDGET AREA REGISTRATION
 * ============================================================================
 * Registers sidebar widget areas where users can add widgets through
 * Appearance > Widgets in the WordPress admin.
 * ============================================================================ */

/**
 * Register widget area (sidebar)
 *
 * Registers a sidebar widget area that can be populated with widgets
 * through Appearance > Widgets. Widgets are reusable content blocks
 * that can be added to sidebars, footers, or other widget areas.
 *
 * Hook: widgets_init
 * Priority: Default (10)
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @since 1.0.0
 * @return void
 */
function bop_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bop_theme' ),           // Widget area name (displayed in admin)
		'id'            => 'sidebar-1',                                     // Unique ID for the sidebar
		'description'   => esc_html__( 'Add widgets here.', 'bop_theme' ), // Description shown in admin
		'before_widget' => '<section id="%1$s" class="widget %2$s">',      // HTML before each widget
		'after_widget'  => '</section>',                                    // HTML after each widget
		'before_title'  => '<h2 class="widget-title">',                    // HTML before widget title
		'after_title'   => '</h2>',                                          // HTML after widget title
	) );
}
add_action( 'widgets_init', 'bop_theme_widgets_init' );

/* ============================================================================
 * SCRIPT AND STYLE ENQUEUING
 * ============================================================================
 * Properly loads JavaScript and CSS files using WordPress enqueue functions.
 * This ensures proper dependency management and prevents conflicts.
 * ============================================================================ */

/**
 * Enqueue scripts and styles
 *
 * Loads the theme's main stylesheet and core JavaScript files.
 * This function uses WordPress's proper enqueue system which handles:
 * - Dependency management
 * - Version control for cache busting
 * - Conditional loading
 * - Script/style optimization
 *
 * Additional scripts and styles are loaded in /inc/custom.php
 *
 * Hook: wp_enqueue_scripts
 * Priority: Default (10)
 *
 * @since 1.0.0
 * @return void
 */
function bop_theme_scripts() {
	/**
	 * Enqueue main theme stylesheet
	 *
	 * Loads style.css from the theme root directory.
	 * This is the main stylesheet that contains theme header information
	 * and base styles.
	 */
	wp_enqueue_style( 'bop_theme-style', get_stylesheet_uri() );

	/**
	 * Enqueue navigation script
	 *
	 * Loads the theme's navigation JavaScript file which handles
	 * mobile menu functionality and other navigation interactions.
	 *
	 * @param string $handle    Script handle/ID
	 * @param string $src       Script file path
	 * @param array  $deps      Dependencies (empty array = no dependencies)
	 * @param string $version   Version number for cache busting
	 * @param bool   $in_footer Load in footer (true) or header (false)
	 */
	wp_enqueue_script( 'bop_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	/**
	 * Enqueue skip link focus fix script
	 *
	 * Fixes focus management for keyboard navigation, particularly
	 * for skip links. This improves accessibility for keyboard users.
	 */
	wp_enqueue_script( 'bop_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	/**
	 * Conditionally load comment reply script
	 *
	 * Only loads the comment reply script on singular posts/pages
	 * where comments are open and threaded comments are enabled.
	 * This reduces unnecessary script loading and improves performance.
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bop_theme_scripts' );

/* ============================================================================
 * INCLUDE ADDITIONAL FUNCTION FILES
 * ============================================================================
 * These files contain additional theme functionality organized by purpose.
 * Each file is included here to keep functions.php clean and maintainable.
 * ============================================================================ */

/**
 * Custom Header feature (currently disabled)
 *
 * Uncomment the line below to enable custom header functionality.
 * Custom headers allow users to upload a header image through
 * Appearance > Customize > Header Image.
 *
 * @see /inc/custom-header.php
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme
 *
 * Contains template tag functions that can be used in theme templates.
 * Template tags are functions that output content or return data for
 * use in template files (e.g., header.php, footer.php, etc.).
 *
 * @see /inc/template-tags.php
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * Contains utility functions that enhance WordPress functionality
 * through hooks and filters. These functions modify WordPress behavior
 * without directly editing core files.
 *
 * @see /inc/template-functions.php
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions
 *
 * Contains functions that add customization options to the WordPress
 * Customizer (Appearance > Customize). This allows users to customize
 * theme settings with a live preview.
 *
 * @see /inc/customizer.php
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Jetpack compatibility file (conditionally loaded)
 *
 * Uncomment the conditional block below to enable Jetpack plugin
 * compatibility features. Jetpack provides additional functionality
 * like social sharing, related posts, and more.
 *
 * The conditional check ensures the file is only loaded if Jetpack
 * is installed and activated.
 *
 * @see /inc/jetpack.php
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * All custom theme functions
 *
 * Contains all custom functions that extend WordPress functionality.
 * This is the main file for custom code and includes:
 * - Script and style enqueuing
 * - Custom shortcodes
 * - Menu registrations
 * - Media handling functions
 * - Admin customizations
 * - Content width adjustments
 * - Comment system modifications
 * - Editor customizations
 * - ACF integrations
 * - BOP-specific tweaks and customizations
 * - And more...
 *
 * Note: Functions previously in /inc/bop-tweaks.php have been
 * consolidated into this file for better organization.
 *
 * @see /inc/custom.php
 */
require get_template_directory() . '/inc/custom.php';
