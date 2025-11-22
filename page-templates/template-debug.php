<?php
/*
Template Name: Debug Test
Template Post Type: post,
*/
get_header();

echo "This will show";
trigger_error("This is a test error", E_USER_WARNING);

get_footer();