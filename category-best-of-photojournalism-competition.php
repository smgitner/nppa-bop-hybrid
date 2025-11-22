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
        <div class="story-main-headline-desktop">
          <h1>2021 Best of Photojournalism Winning Entries by Contest and Division<h1></div>
      </div>
    </div>
  </section>



  <section class="s-textarea">
    <div class="c-textarea w-container">
      <div class="d-textarea">
        <p class="story-text">

          <!-- LIST OF OVPI POSTS START -->
          <section class="s-textarea">
                <div class="c-textarea w-container">
                  <div class="d-textarea">
                    <p class="story-text">

                      <div class="story-main-headline-desktop">
                        <h6>Online Video Presentation and Innovation</h6></div>
                    </div>

                      <?php
                      $loop = new WP_Query( array( 'post_type' => 'ovpi', 'posts_per_page' => 30 ) );

                      while ( $loop->have_posts() ) : $loop->the_post();

                      the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
                      ?>

                  <?php the_excerpt();  ?>

                      <?php endwhile; ?>

                  </div>
                </div>
              </section>

          <!-- LIST OF OVPI POSTS END -->

          <!-- LIST OF picture editing POSTS START -->
          <section class="s-textarea">
                <div class="c-textarea w-container">
                  <div class="d-textarea">
                    <p class="story-text">

                      <div class="story-main-headline-desktop">
                        <h6>Picture Editing</h6></div>
                    </div>

                      <?php
                      $loop = new WP_Query( array( 'post_type' => 'pictureediting', 'posts_per_page' => 30 ) );

                      while ( $loop->have_posts() ) : $loop->the_post();

                      the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
                      ?>

                  <?php the_excerpt();  ?>

                      <?php endwhile; ?>

                  </div>
                </div>
              </section>

          <!-- LIST OF picture editing POSTS END -->

          <!-- LIST OF still PJ POSTS START -->
          <section class="s-textarea">
                <div class="c-textarea w-container">
                  <div class="d-textarea">
                    <p class="story-text">

                      <div class="story-main-headline-desktop">
                        <h6>Still Photojournalism<//h6></div>
                    </div>

                      <?php
                      $loop = new WP_Query( array( 'post_type' => 'stillphotojournalism', 'posts_per_page' => 30 ) );

                      while ( $loop->have_posts() ) : $loop->the_post();

                      the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
                      ?>

                  <?php the_excerpt();  ?>

                      <?php endwhile; ?>

                  </div>
                </div>
              </section>

          <!-- LIST OF still PJ POSTS END -->

          <!-- LIST OF video editing POSTS START -->
          <section class="s-textarea">
                <div class="c-textarea w-container">
                  <div class="d-textarea">
                    <p class="story-text">

                      <div class="story-main-headline-desktop">
                        <h6>Video Editing</h6></div>
                    </div>

                      <?php
                      $loop = new WP_Query( array( 'post_type' => 'videoediting', 'posts_per_page' => 30 ) );

                      while ( $loop->have_posts() ) : $loop->the_post();

                      the_title( '<h6 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
                      ?>

                  <?php the_excerpt();  ?>

                      <?php endwhile; ?>

                  </div>
                </div>
              </section>

          <!-- LIST OF video ediiting POSTS END -->

          <!-- LIST OF VIDEO PJ POSTS START -->
          <section class="s-textarea">
                <div class="c-textarea w-container">
                  <div class="d-textarea">
                    <p class="story-text">

                      <div class="story-main-headline-desktop">
                        <h6>Video Photojournalism</h6></div>
                    </div>

                      <?php
                      $loop = new WP_Query( array( 'post_type' => 'videophotojournalism', 'posts_per_page' => 30 ) );

                      while ( $loop->have_posts() ) : $loop->the_post();

                      the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
                      ?>

                  <?php the_excerpt();  ?>

                      <?php endwhile; ?>

                  </div>
                </div>
              </section>

          <!-- LIST OF Video PJ POSTS END -->

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
