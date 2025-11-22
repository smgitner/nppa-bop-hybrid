<?php
/**
 * bop_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bop_theme
 */

if ( ! function_exists( 'bop_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bop_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bop_theme, use a find and replace
		 * to change 'bop_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bop_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bop_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bop_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bop_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bop_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bop_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'bop_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bop_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bop_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bop_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bop_theme_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function bop_theme_scripts() {
	wp_enqueue_style( 'bop_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bop_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bop_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bop_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.

 * if ( defined( 'JETPACK__VERSION' ) ) {
 * 	require get_template_directory() . '/inc/jetpack.php';
 * }
 */
       /* Enqueue Scripts Begin */

function enqueue_webflow_script() {
    wp_enqueue_script( 'webflow', get_stylesheet_directory_uri() . '/js/webflow.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_webflow_script' );

function bopwins_enqueue_scripts() {
    // Properly enqueue webfont in the wp_enqueue_scripts hook
    wp_enqueue_script( 'webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js', array(), null, false );
}
add_action('wp_enqueue_scripts', 'bopwins_enqueue_scripts'); // Hooking it at the right time

   // wp_deregister_script( 'cwxxfr' );
    //wp_enqueue_script( 'cwxxfr', 'https://use.typekit.net/cwx6xfr.js', false, null, false);

    //wp_deregister_script( 'awesome' );
    //wp_enqueue_script( 'awesome', 'https://use.fontawesome.com/c7afeb4f58.js', false, null, true);

	//wp_deregister_script( 'google-fonts' );
  	//wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic', false );

    //wp_deregister_script( 'webflow' );
    //wp_enqueue_style( 'webflow', '/js/webflow.js', true );





/* Enqueue Scripts End */

if ( ! function_exists( 'bop_theme_enqueue_scripts' ) ) :
    function bop_theme_enqueue_scripts() {

    /*  Enqueue Styles Begin */

		//wp_deregister_style( 'lightgallery' );
		//wp_enqueue_style( 'lightgallery', get_template_directory_uri() . '/css/lightgallery.css', false, null, 'all');

		//wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, null, 'all');

    //wp_deregister_style( 'normalize' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', false, null, 'all');

    //wp_deregister_style( 'webflow' );
    //wp_enqueue_style( 'webflow', get_template_directory_uri() . '/css/webflow.css', false, null, 'all');

		// get random number
		function wpmix_get_random() {
			$randomizr = '-' . rand(100,999);
			return $randomizr;
		}
		$random_number = wpmix_get_random();
		global $random_number;

		// include custom stylesheet
		function wpmix_queue_css() {
			global $theme_version, $random_number;
			if (!is_admin()) {

				wp_register_style('webflow', get_template_directory_uri() . '/css/webflow.css', false, $theme_version . $random_number);
				wp_enqueue_style('webflow');

				wp_register_style('bopsitedesign', get_template_directory_uri() . '/css/bopsitedesign.webflow.css', false, $theme_version . $random_number);
				wp_enqueue_style('bopsitedesign');

				wp_register_style('bopmisc', get_template_directory_uri() . '/css/bopmisc.css', false, $theme_version . $random_number);
				wp_enqueue_style('bopmisc');


			}
		}
		add_action('wp_print_styles', 'wpmix_queue_css');



		//wp_deregister_style( 'bopsitedesign' );
    //wp_enqueue_style( 'bopsitedesign', get_template_directory_uri() . '/css/bopsitedesign.webflow.css', false, null, 'all');

		//wp_deregister_style( 'bopgeneric' );
    //wp_enqueue_style( 'bopgeneric', get_template_directory_uri() . '/css/bop-generic.css', false, null, 'all');

    //wp_deregister_style( 'bopmisc' );
    //wp_enqueue_style( 'bopmisc', get_template_directory_uri() . '/css/bopmisc.css', false, null, 'all');

		//wp_deregister_style( 'lightslider' );
		//wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/css/lightGallery.css', false, null, 'all');

		//wp_deregister_style( 'bop-megamenu' );
		//wp_enqueue_style( 'bop-megamenu', get_template_directory_uri() . '/css/bop-megamenu.css', false, null, 'all');

    //wp_deregister_style( 'editor-style' );
    //wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/editor-style.css', false, null, 'all');

    //wp_deregister_style( 'skipto' );
    //wp_enqueue_style( 'skipto', get_template_directory_uri() . '/css/skipto.css', false, null, 'all');



    /* Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'bop_theme_enqueue_scripts' );
endif;

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/bop-tweaks.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaktesting.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    //require( get_template_directory() . '/inc/disqus.php' );

     /**
     * Custom functions that act independently of the theme templates
     */
    //require( get_template_directory() . '/inc/cpttweaks.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    //require( get_template_directory() . '/inc/imagesizes.php' );

    /**
     * Custom functions that act independently of the theme templates - specific to the local development server
     */
    //require( get_template_directory() . '/inc/bop-adminbars.php' );

    /**
     * Custom functions that act independently of the theme templates - specific to the local development server
     */
    //require( get_template_directory() . '/inc/update-nag.php' );

		//register custom menu
		//function wpb_custom_new_menu() {
  //register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
	//}
	//add_action( 'init', 'wpb_custom_new_menu' );

	function my_theme_load_theme_textdomain() {
    load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );

function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'edit.php?post_type=page', // Pages
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );


// Add Title to next post link
add_filter('next_post_link', function($crunchify_link) {
  $next_post = get_next_post();
  $crunchify_title = $next_post->post_title;
  $crunchify_link = str_replace('href=', 'title="'.$crunchify_title.'" href=', $crunchify_link);
  return $crunchify_link;
});

// Add Title to previous post link
add_filter('previous_post_link', function($crunchify_link) {
  $previous_post = get_previous_post();
  $crunchify_title = $previous_post->post_title;
  $crunchify_link = str_replace('href=', 'title="'.$crunchify_title.'" href=', $crunchify_link);
  return $crunchify_link;
});

/**
 * This shortcode will allow you to create a snapshot of a remote website and post it
 * on your WordPress site.
 *
 * [snapshot url="http://www.wordpress.org" alt="WordPress.org" width="400" height="300"]
 */
add_shortcode( 'snapshot', function ( $atts ) {
	$atts = shortcode_atts( array(
		'alt'    => '',
		'url'    => 'http://www.wordpress.org',
		'width'  => '400',
		'height' => '300'
	), $atts );
	$params = array(
		'w' => $atts['width'],
		'h' => $atts['height'],
	);
	$url = urlencode( $atts['url'] );
	$src = 'http://s.wordpress.com/mshots/v1/' . $url . '?' . http_build_query( $params, null, '&' );

	$cache_key = 'snapshot_' . md5( $src );
	$data_uri = get_transient( $cache_key );
	if ( ! $data_uri ) {
		$response = wp_remote_get( $src );
		if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
			$image_data = wp_remote_retrieve_body( $response );
			if ( $image_data && is_string( $image_data ) ) {
				$src = $data_uri = 'data:image/jpeg;base64,' . base64_encode( $image_data );
				set_transient( $cache_key, $data_uri, DAY_IN_SECONDS );
			}
		}
	}

	return '<img src="' . esc_attr( $src ) . '" alt="' . esc_attr( $atts['alt'] ) . '"/>';
} );

function wpb_custom_new_menu() {
  register_nav_menu('contest-entry',__( 'Contest Entry Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

//copy first 52 characters of caption into the alt tag

function set_image_alt_from_iptc_caption($metadata, $attachment_id) {
    // Get the full path to the original file
    $file_path = get_attached_file($attachment_id);

    // Check if the file exists
    if (!file_exists($file_path)) {
        return $metadata;
    }

    // Extract IPTC data
    $size = getimagesize($file_path, $info);
    if (isset($info['APP13'])) {
        $iptc = iptcparse($info['APP13']);
        if (isset($iptc['2#120'][0])) { // Check if caption exists
            $caption = $iptc['2#120'][0];
            // Take first 52 characters of the caption
            $short_caption = substr($caption, 0, 52);

            // Update the alt text for the image
            update_post_meta($attachment_id, '_wp_attachment_image_alt', sanitize_text_field($short_caption));
        }
    }

    return $metadata;
}

add_filter('wp_generate_attachment_metadata', 'set_image_alt_from_iptc_caption', 10, 2);


/* ==== ADDED ERROR LOGGING FOR DEBUGGING ==== */
/*
function bop_debug_log($message) {
    if (WP_DEBUG === true) {
        error_log(print_r($message, true));
    }
}
*/



// Example: Log when scripts are enqueued
// bop_debug_log("Scripts enqueued successfully.");
/* ==== END ERROR LOGGING ==== */


//To stop a PHP warning pages (and not a fatal error), then add this to your child theme’s functions.php or as a Code Snippet to suppress the PHP warnings:
error_reporting(E_ERROR);
