<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package nh_newshouse_theme
 * @since nh_newshouse_theme 1.0
 */
 
//Hide update nag within the admin
function remove_upgrade_nag() {
   echo '<style type="text/css">
           .update-nag {display: none}
         </style>';
}
add_action('admin_head', 'remove_upgrade_nag');

