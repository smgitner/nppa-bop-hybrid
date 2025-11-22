<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 * NEWEST VERSION MEANT TO BE USED WITH NH PLUGIN SET
 * @package nh_newshouse_theme
 * @since nh_newshouse_theme 1.0
 */


/*-------------------------------------
  Set the value of the content width
---------------------------------------*/
if ( ! isset( $content_width ) )
    $content_width = 640;

function mytheme_adjust_content_width() {
    global $content_width;

    if ( is_page_template( 'full-width.php' ) )
        $content_width = 1170;
}
add_action( 'template_redirect', 'mytheme_adjust_content_width' );



/*-------------------------------------
  change footer text in admin
---------------------------------------*/

function remove_footer_admin () {
    echo 'NPPA BOP CMS v1.0 was built by Seth Gitner';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*-------------------------------------
  Movbe Yoast to bottom
---------------------------------------*/
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/*
	* COMMENTS
	* Remove comments in its entirety
	*/

	// Removes from admin menu
	add_action( 'admin_menu', 'pk_remove_admin_menus' );
	function pk_remove_admin_menus() {
	    remove_menu_page( 'edit-comments.php' );
	}

	// Removes from post and pages
	add_action('init', 'pk_remove_comment_support', 100);
 	function pk_remove_comment_support() {
	   remove_post_type_support( 'post', 'comments' );
	   remove_post_type_support( 'page', 'comments' );
	}

	// Removes from admin bar
	add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
	function pk_remove_comments_admin_bar() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('comments');
	}

  /*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

    $style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
        array(
            'title' => 'Content Block',
            'block' => 'span',
            'classes' => 'content-block',
            'wrapper' => true,

        ),
        array(
            'title' => 'Blue Button',
            'block' => 'span',
            'classes' => 'blue-button',
            'wrapper' => true,
        ),
        array(
            'title' => 'Red Button',
            'block' => 'span',
            'classes' => 'red-button',
            'wrapper' => true,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

//add categories to pages
function add_categories_to_pages() {
register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );


//set mugshot to be featureed image
function acf_set_featured_image( $value, $post_id, $field  ){

    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }

    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=mugshot', 'acf_set_featured_image', 10, 3);

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

 
