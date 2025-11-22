<?php
/*
Template Name: Archives
*/
get_header('boppages'); ?>



<main class="main-sitecontent">

  <body class="body-page">

  <?php
    $args = array(
            'post_type' => 'stillphotojournalism',
            'posts_per_page' => -1
        )
    $query = new WP_Query($args);
    if ($query->have_posts() ) :
        echo '<select>';
        while ( $query->have_posts() ) : $query->the_post();
                echo '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';
        endwhile;
        echo '</select>';
        wp_reset_postdata();
    endif;
?>


  <!-- Stripeset: Page Post Lede Figure Start -->

  <?php if ( have_rows( 'lede_stripeset' ) ): ?>
  	<?php while ( have_rows( 'lede_stripeset' ) ) : the_row(); ?>

      <?php if ( get_row_layout() == 'stripe_headline_and_dek' ) : ?>

        <!-- START -->
        <?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-hedanddek'); ?>
        <!-- END -->


  		<?php elseif ( get_row_layout() == 'center_text_stripe' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-text'); ?>
  			<!-- END -->


  		<?php elseif ( get_row_layout() == 'center_image_stripe' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagesmall'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'large_image_stripe' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagelarge'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'jumbo_image_stripe' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagejumbo'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'video_small' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videosmall'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'video_large' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videolarge'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'video_jumbo' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videojumbo'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'photo_gallery_small' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-gallerysmall'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'photo_gallery_large' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-gallerylarge'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'three_image_group' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-trigroup'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'sidebyside_images_small' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-sidebysidesmall'); ?>
  			<!-- END -->

  		<?php elseif ( get_row_layout() == 'sidebyside_images_jumbo' ) : ?>

  			<!-- START -->
  			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-sidebysidejumbo'); ?>
  			<!-- END -->

      <?php elseif ( get_row_layout() == 'photo_gallery_jumbo' ) : ?>

        <!-- START -->
        <?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-galleryjumbo'); ?>
        <!-- END -->


      <?php endif; ?>
    <?php endwhile; ?>
  <?php else: ?>
    <?php // no layouts found ?>
  <?php endif; ?>

  <!-- Stripeset: Page Post Lede Figure End -->

<article class="d-pagepost-stripe-sections">

  <!-- Stripe: Top Text -->
      <section class="s-textarea">
        <div class="c-textarea w-container">
          <div class="d-textarea">
            <p class="story-text">
                <?php the_field( 'top_text_field' ); ?>
              </p>
          </div>
        </div>
      </section>



    <!-- Stripeset: Page Post Content START -->

    <?php if ( have_rows( 'center_stripeset' ) ): ?>
    	<?php while ( have_rows( 'center_stripeset' ) ) : the_row(); ?>

    		<?php if ( get_row_layout() == 'center_text_stripe' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-text'); ?>
    			<!-- END -->


    		<?php elseif ( get_row_layout() == 'center_image_stripe' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagesmall'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'large_image_stripe' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagelarge'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'jumbo_image_stripe' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagejumbo'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'video_small' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videosmall'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'video_large' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videolarge'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'video_jumbo' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videojumbo'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'photo_gallery_small' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-gallerysmall'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'photo_gallery_large' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-gallerylarge'); ?>
    			<!-- END -->

        <?php elseif ( get_row_layout() == 'photo_gallery_jumbo' ) : ?>

          <!-- START -->
          <?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-galleryjumbo'); ?>
          <!-- END -->

    		<?php elseif ( get_row_layout() == 'three_image_group' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-trigroup'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'sidebyside_images_small' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-sidebysidesmall'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'sidebyside_images_jumbo' ) : ?>

    			<!-- START -->
    			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-sidebysidejumbo'); ?>
    			<!-- END -->

    		<?php elseif ( get_row_layout() == 'stripe_spacer' ) : ?>


    		<?php endif; ?>
    	<?php endwhile; ?>
    <?php else: ?>
    	<?php // no layouts found ?>
    <?php endif; ?>

    <!-- Stripeset: Page Post Content END -->




  </article>



</main>















<!-- BOTTOM OF PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
