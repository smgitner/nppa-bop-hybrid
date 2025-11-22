<?php /* Template Name: Video List
         Template Post Type: post, page,
*/
get_header(); ?>

<!-- TOP OF STORY PAGE -->
<main id="mainContent" class="wrapper">

  <div class="c-faculty-staff w-container">
          <h1 class="mmi-page-headline">Past Participants 2007 to 2018</h1>
        </div>
      </div>


  <div class="s-register">
        <div class="c-register w-container">

<?php
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'videos', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>

<ul>

    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <h3><li><!-- <a href="<?php the_permalink(); ?>"> --> <?php the_title(); ?><!-- </a> --></li></h3>
    <?php endwhile; ?>
    <!-- end of the loop -->

</ul>

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

          </div>


      </div>
=





</main>

<?php get_footer(); ?>
