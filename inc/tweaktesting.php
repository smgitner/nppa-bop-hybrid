<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package nh_newshouse_theme
 * @since nh_newshouse_theme 1.0
 */



//wp_deregister_script( 'jquery' );
    //wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true);
    
    //* Enqueue scripts and styles for Slick Slider
//add_action( 'wp_enqueue_scripts', 'themeprefix_slick_enqueue_scripts_styles' );
// Enqueue Slick scripts and styles
//function themeprefix_slick_enqueue_scripts_styles() {			
//				wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
//	            wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/js/slick-init.js', array( 'slickjs' ), '1.6.0', true );
                //wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/css/slick.css', false, null, 'all' );
                //wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', false, null, 'all' );               
			    //wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/css/slick-theme.css', false, null, 'all' );
			    //wp_enqueue_style( 'slick-theme-css', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css', false, null, 'all' );
  
//}
//ACF Limit Returned Relationship Posts
//function my_relationship_query( $args, $field, $post_id ) {
	
    // only show children of the current post being edited
    //$args['posts_per_page'] = 10;
	// return
    //return $args;
    
//}
// filter for every field
//add_filter('acf/fields/relationship/query', 'my_relationship_query', 10, 3);


// get only first 3 results and limit by modified
//$post = get_field('lede_content_card_field', false, false);

//$posts = get_posts(array(
//	'post_type'			=> 'posts',
///	'posts_per_page'	=> -1,
//	'meta_key'			=> 'start_date',
//	'orderby'			=> 'meta_value',
//	'order'				=> 'DESC'

//));


//list authors

