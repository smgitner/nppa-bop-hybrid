<?php
/**
 * The template for displaying the winner page
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
  <h3 class="paragraph-headline"><?php the_title(); ?></h3>
          <?php if ( have_rows( 'contest' ) ) : ?>
          	<?php while ( have_rows( 'contest' ) ) : the_row(); ?>
          		<!-- <?php the_sub_field( 'contest_category' ); ?> -->
          		<?php if ( have_rows( 'winners_list' ) ) : ?>
          			<?php while ( have_rows( 'winners_list' ) ) : the_row(); ?>
          				<!-- <?php the_sub_field( 'contest' ); ?> -->
          				<?php the_sub_field( 'contest_category' ); ?>
          				<?php the_sub_field( 'winning_place' ); ?>
          				<?php the_sub_field( 'project_title' ); ?>
          				<?php the_sub_field( 'first_name' ); ?>
          				<?php the_sub_field( 'last_name' ); ?>
          				<?php the_sub_field( 'publication' ); ?>
          				<?php $link_to_winning_entry = get_sub_field( 'link_to_winning_entry' ); ?>
          				<?php if ( $link_to_winning_entry ) : ?>
          					<?php foreach ( $link_to_winning_entry as $post ) : ?>
          						<?php setup_postdata ( $post ); ?>
          						<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
          					<?php endforeach; ?>
          					<?php wp_reset_postdata(); ?>
          				<?php endif; ?>
          				<?php the_sub_field( 'youtube_link' ); ?>
          			<?php endwhile; ?>
          		<?php else : ?>
          			<?php // no rows found ?>
          		<?php endif; ?>
          	<?php endwhile; ?>
          <?php else : ?>
          	<?php // no rows found ?>
          <?php endif; ?>


<?php if( have_posts() ):
                   while( have_posts() ): the_post(); ?>

<div class="s-register">
      <div class="c-register w-container">


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
