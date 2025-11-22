<?php /* Template Name: NPPA-FrontPage
         Template Post Type: post, page,
*/ 
?>

<?php
if(is_page(NPPA-Front))
{
get_header('nppa');
}
else
{
get_header();
}
wp_head();
?>







<?php get_footer(); ?>