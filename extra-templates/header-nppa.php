<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <body class="body">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bop_theme_2026
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- <meta content="<?php wp_title('|', true, 'right'); ?>" property="og:title"> -->
        <title>
    <?php if(is_front_page() || is_home()){
        echo get_bloginfo('name');
    } else{
        echo wp_title('');
    }?>
        </title>


        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="description" content="">
        <meta property="fb:pages" content="79929803701" />


        <!-- Home caching issue with Spectrum -->
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">

        <script type="text/javascript">
    try{Typekit.load();}catch(e){}
  </script>
        <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
        <script type="text/javascript">
    !function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
  </script>

        


        <?php wp_head(); ?>



    </head>
 <?php get_template_part( 'partials/header/nav-nppa'); ?>
