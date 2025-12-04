<?php /**
 * The template for displaying all single judge posts
 *
 * @package bop_theme_2026
 */
get_header('boppages');?>

<main class="main-sitecontent">

  <div class="s-crumbs">
      <div class="c-crumbs w-container">
        <div class="breadcrumbs">
          <div class="crumbs">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>
</div>
        </div>
      </div>
    </div>

  <body class="body-page">

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

    <div class="s-headline-dek">
      <div class="container-header story-container w-container">
        <div class="header-div">
          <h1>2021 <?php the_field( 'judging_division' ); ?> Judge</h1>
        </div>
      </div>
    </div>


    <div class="s-judges">
   <div class="c-judges w-container">
     <div class="w-row">
       <div class="w-col w-col-3">
         <div class="d-mug">

           <?php $mugshot = get_field( 'mugshot' ); ?>
<?php if ( $mugshot ) : ?>
	<img src="<?php echo esc_url( $mugshot['url'] ); ?>" alt="<?php the_field( 'full_name' ); ?> is a 2021 BOP Judge" loading="lazy" width="400" height="100%" />
<?php endif; ?>

        </div>
         </div>
       <div class="w-col w-col-9">
         <div class="div-block-4">
         <h2 class="judge-name heading-15"><?php the_field( 'full_name' ); ?></h2>
         <p class="d-bio"><?php the_field( 'biography' ); ?></p>
       </div>
     </div>
       </div>
            </div>
   </div>



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
