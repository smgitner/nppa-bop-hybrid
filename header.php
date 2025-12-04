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
<html data-wf-page="6079b544ae70186229422620" data-wf-site="5fb80058d04460cb66d2a1f6">



    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- <meta content="<?php wp_title('|', true, 'right'); ?>" property="og:title"> -->
        <title>
    <?php wp_title() ?>
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
        <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>






        <!-- Favicons -->
        <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
        <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/site.webmanifest">
        <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">


        <?php wp_head(); ?>


        <script src="https://use.typekit.net/wlh8gdm.js" type="text/javascript"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>




    </head>
