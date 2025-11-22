<?php /* Template Name: Past Coaches
         Template Post Type: post, page,
*/ 
get_header(); ?>

 <div class="main-sitecontent">
    <div class="w-container">
      <h1 class="heading-10">Professionals who have volunteered as video coaches in the past:</h1>
    </div>
    <div class="article-profiles coach-profile">
      <div class="coach-bio-block w-container">
        <ul class="w-list-unstyled">
          <li>
            <ul class="coaches-list">
            
            <?php if ( have_rows( 'past_coaches' ) ) : ?>
	<?php while ( have_rows( 'past_coaches' ) ) : the_row(); ?>

		

              <li class="coach-list-item list-item"><a href="../authors/<?php the_sub_field( 'first_name' ); ?>-<?php the_sub_field( 'last_name' ); ?>"><?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?></a> - <?php the_sub_field( 'affiliation_website' ); ?>  </li>
            
            	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
</ul>
          </li>
        </ul>
      </div>
    </div>
  </div>

<?php get_template_part( 'partials/misc/sponsors'); ?>

<?php get_footer(); ?>

