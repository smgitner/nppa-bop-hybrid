<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bop_theme
 */

get_header('bopentries');
?>

<main class="main-sitecontent">
     <div>
        <div class="w-container">


<?php if( have_posts() ):
                   while( have_posts() ): the_post(); ?>

<div class="s-register">
      <div class="c-register w-container">

        <h3 class="paragraph-headline"><?php the_title(); ?></h3>
        <p class="paragraph"><?php the_content(); ?></p>

      </div>
    </div>

    <?php
       endwhile;
   endif;

   ?>

 </div>
</div>
</div>















<!-- BOTTOM OF PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
