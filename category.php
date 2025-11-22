<?php
/*
* Category Template: Categories
*/

get_header(); ?>

<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->


 <section class="section-headline">
    <div class="container-header story-container w-container">
      <div class="header-div">
        <!-- <div class="header-section-meta"><?php single_cat_title(); ?></div> -->
        <div class="story-main-headline-desktop"><h1><?php single_cat_title(); ?></h1></div>
      </div>
    </div>
  </section>

  <section class="s-textarea">
    <div class="c-textarea w-container">
      <div class="d-textarea">
        <p class="story-text">




        </p>
      </div>
    </div>
  </section>







    <div class="section-pagination">
        <div class="w-container">
          <div class="pagination"
    <?php the_posts_pagination( array(
    	'mid_size' => 10,
    	'prev_text' => __( 'Back', 'textdomain' ),
    	'next_text' => __( 'Next', 'textdomain' ),
    ) ); ?>


    </div>
        </div>




</main>
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>

<?php get_footer(); ?>
