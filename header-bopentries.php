<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <body class="body">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nh_webflow_theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<html data-wf-page="5fc9c5335ac195f8166d083d" data-wf-site="5fb80058d04460cb66d2a1f6">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- <meta content="<?php wp_title('|', true, 'right'); ?>" property="og:title"> -->
        <meta name="google-site-verification" content="LUI34xts1hWBfyOPCheTWcTaOrOyu4k_0UPNeJpfXN0" />
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
        <link rel="stylesheet" href="https://use.typekit.net/eoc8vyf.css">






        <?php wp_head(); ?>

        <style type="text/css">
                    body{
                        background-color: #FFFFFF
                    }
                    .demo-gallery > ul {
                      margin-bottom: 0;
                    }
                    .demo-gallery > ul > li {
                        float: left;
                        margin-bottom: 15px;
                        margin-right: 20px;
                        width: 200px;
                    }
                    .demo-gallery > ul > li a {
                      border: 3px solid #FFF;
                      border-radius: 3px;
                      display: block;
                      overflow: hidden;
                      position: relative;
                      float: left;
                    }
                    .demo-gallery > ul > li a > img {
                      -webkit-transition: -webkit-transform 0.15s ease 0s;
                      -moz-transition: -moz-transform 0.15s ease 0s;
                      -o-transition: -o-transform 0.15s ease 0s;
                      transition: transform 0.15s ease 0s;
                      -webkit-transform: scale3d(1, 1, 1);
                      transform: scale3d(1, 1, 1);
                      height: 100%;
                      width: 100%;
                    }
                    .demo-gallery > ul > li a:hover > img {
                      -webkit-transform: scale3d(1.1, 1.1, 1.1);
                      transform: scale3d(1.1, 1.1, 1.1);
                    }
                    .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
                      opacity: 1;
                    }
                    .demo-gallery > ul > li a .demo-gallery-poster {
                      background-color: rgba(0, 0, 0, 0.1);
                      bottom: 0;
                      left: 0;
                      position: absolute;
                      right: 0;
                      top: 0;
                      -webkit-transition: background-color 0.15s ease 0s;
                      -o-transition: background-color 0.15s ease 0s;
                      transition: background-color 0.15s ease 0s;
                    }
                    .demo-gallery > ul > li a .demo-gallery-poster > img {
                      left: 50%;
                      margin-left: -10px;
                      margin-top: -10px;
                      opacity: 0;
                      position: absolute;
                      top: 50%;
                      -webkit-transition: opacity 0.3s ease 0s;
                      -o-transition: opacity 0.3s ease 0s;
                      transition: opacity 0.3s ease 0s;
                    }
                    .demo-gallery > ul > li a:hover .demo-gallery-poster {
                      background-color: rgba(0, 0, 0, 0.5);
                    }
                    .demo-gallery .justified-gallery > a > img {
                      -webkit-transition: -webkit-transform 0.15s ease 0s;
                      -moz-transition: -moz-transform 0.15s ease 0s;
                      -o-transition: -o-transform 0.15s ease 0s;
                      transition: transform 0.15s ease 0s;
                      -webkit-transform: scale3d(1, 1, 1);
                      transform: scale3d(1, 1, 1);
                      height: 100%;
                      width: 100%;
                    }
                    .demo-gallery .justified-gallery > a:hover > img {
                      -webkit-transform: scale3d(1.1, 1.1, 1.1);
                      transform: scale3d(1.1, 1.1, 1.1);
                    }
                    .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
                      opacity: 1;
                    }
                    .demo-gallery .justified-gallery > a .demo-gallery-poster {
                      background-color: rgba(0, 0, 0, 0.1);
                      bottom: 0;
                      left: 0;
                      position: absolute;
                      right: 0;
                      top: 0;
                      -webkit-transition: background-color 0.15s ease 0s;
                      -o-transition: background-color 0.15s ease 0s;
                      transition: background-color 0.15s ease 0s;
                    }
                    .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
                      left: 50%;
                      margin-left: -10px;
                      margin-top: -10px;
                      opacity: 0;
                      position: absolute;
                      top: 50%;
                      -webkit-transition: opacity 0.3s ease 0s;
                      -o-transition: opacity 0.3s ease 0s;
                      transition: opacity 0.3s ease 0s;
                    }
                    .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
                      background-color: rgba(0, 0, 0, 0.5);
                    }
                    .demo-gallery .video .demo-gallery-poster img {
                      height: 48px;
                      margin-left: -24px;
                      margin-top: -24px;
                      opacity: 0.8;
                      width: 48px;
                    }
                    .demo-gallery.dark > ul > li a {
                      border: 3px solid #04070a;
                    }
                    .home .demo-gallery {
                      padding-bottom: 80px;
                    }
                </style>

    </head>
 <?php get_template_part( 'partials/header/nav-bopentries'); ?>
