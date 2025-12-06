<?php
/**
 * The template for displaying all single still photojournalism posts
 *
 * @package nppa_bop_theme
 */

get_header(); ?>

<!-- TOP OF STORY POST PAGE -->

<body class="body-winners">
<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->

<!-- POST NAVIGATION START -->
  <!-- <div class="s-crumbs">
    <div class="c-crumbs w-container">
      <div class="previous">
        <div class="postnav"><strong><?php previous_post_link(); ?></strong></div>
      </div>
      <div class="next">
        <div class="postnav"><strong><?php next_post_link(); ?></strong></div>
      </div>
    </div>
  </div> -->
<!-- POST NAVIGATION END -->

<!-- SECTION HEADLINE DEK START -->
      <section id="headline-dek" class="stripe-headline-dek">
        <div class="container-header story-container w-container">
          <div class="header-div">
            <!-- <div class="header-section-meta"><?php the_category(','); ?></div> -->
            <h1 class="page-headline"><?php the_title(''); ?></h1>
          </div>
        </div>
      </section>
<!-- SECTION HEADLINE DEK END -->

<!-- STILL PJ START -->

      <?php if ( have_rows( 'winning_images' ) ) : ?>
        <?php while ( have_rows( 'winning_images' ) ) : the_row(); ?>

          <!-- PLACE 1 START -->
          <div class="s-stillwinners-stills">
              <div class="c-winner-still w-container">
                <?php if ( have_rows( 'first_place_group' ) ) : ?>
                  <?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
                <div class="d-place">
                  <div class="place"><?php the_sub_field( 'place' ); ?></div>
                </div>

            <div class="d-image">

                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
                <?php endif; ?>
            </div>


        <!-- PLACE 1 GALLERY START -->





<div class="d-image">


<?php
// If at least 1 image is present in the Project Images Gallery field
if( $images = get_sub_field('gallery') ) {
$image_ids = wp_list_pluck( $images, 'id' );
// Soliloquy Dynamic requires image IDs to be passed as a comma separated list
$image_ids_string = implode( ',', $image_ids );
echo '<div class="project-images-slider">';
  soliloquy_dynamic( array(
    'id' => 'custom-project-images1',
    'images' => $image_ids_string
  ) );
echo '</div>';
}
?>

<?php the_sub_field( 'custom_gallery' ); ?>

</div>



        <!-- PLACE 1 GALLERY END -->

        <div class="d-byline-caption">
        <div class="d-byline-photog">
          <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'first_name' ); ?>
           <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication' ); ?></span></div>
        </div>
      </div>
      <div class="d-stillcaption">
        <p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
      </div>
    </div>
  </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <!-- PLACE 1 END -->

        <!-- PLACE 2 START -->

        <div class="s-stillwinners-stills">
            <div class="c-winner-still w-container">
              <?php if ( have_rows( 'second_place_group' ) ) : ?>
              			<?php while ( have_rows( 'second_place_group' ) ) : the_row(); ?>
              <div class="d-place">
                <div class="place"><?php the_sub_field( 'place' ); ?></div>
              </div>

          <div class="d-image">

              <?php $image = get_sub_field( 'image' ); ?>
              <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
              <?php endif; ?>
          </div>

      <!-- PLACE 2 GALLERY START -->


      <div class="d-image">


      <?php
      // If at least 1 image is present in the Project Images Gallery field
      if( $images = get_sub_field('gallery') ) {
      $image_ids = wp_list_pluck( $images, 'id' );
      // Soliloquy Dynamic requires image IDs to be passed as a comma separated list
      $image_ids_string = implode( ',', $image_ids );
      echo '<div class="project-images-slider">';
        soliloquy_dynamic( array(
          'id' => 'custom-project-images2',
          'images' => $image_ids_string
        ) );
      echo '</div>';
      }
      ?>

      </div>

      <?php if( get_field('last_name') ): ?>/<?php endif; ?>



      <!-- PLACE 2 GALLERY END -->

      <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication' ); ?></span></div>
      </div>
    </div>
    <div class="d-stillcaption">
      <p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
    </div>
  </div>
</div>
      <?php endwhile; ?>
      <?php endif; ?>

      <!-- PLACE 2 END -->

      <!-- PLACE 3 START -->

      <div class="s-stillwinners-stills">
          <div class="c-winner-still w-container">
            <?php if ( have_rows( 'third_place_group' ) ) : ?>
              <?php while ( have_rows( 'third_place_group' ) ) : the_row(); ?>
            <div class="d-place">
              <div class="place"><?php the_sub_field( 'place' ); ?></div>
            </div>

        <div class="d-image">

            <?php $image = get_sub_field( 'image' ); ?>
            <?php if ( $image ) : ?>
              <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
            <?php endif; ?>
        </div>

    <!-- PLACE 3 GALLERY START -->


    <div class="d-image">


    <?php
    // If at least 1 image is present in the Project Images Gallery field
    if( $images = get_sub_field('gallery') ) {
    $image_ids = wp_list_pluck( $images, 'id' );
    // Soliloquy Dynamic requires image IDs to be passed as a comma separated list
    $image_ids_string = implode( ',', $image_ids );
    echo '<div class="project-images-slider">';
      soliloquy_dynamic( array(
        'id' => 'custom-project-images3',
        'images' => $image_ids_string
      ) );
    echo '</div>';
    }
    ?>

    </div>





    <!-- PLACE 3 GALLERY END -->

    <div class="d-byline-caption">
    <div class="d-byline-photog">
      <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
    </div>
    <div class="d-byline-title">
      <div class="nameandorg">
       <?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?> <span class="organization"> <?php the_sub_field( 'publication' ); ?></span></div>
    </div>
  </div>
  <div class="d-stillcaption">
    <p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
  </div>
</div>
</div>
    <?php endwhile; ?>
    <?php endif; ?>

    <!-- PLACE 3 END -->

    <!-- PLACE 4 START -->

    <div class="s-stillwinners-stills">
        <div class="c-winner-still w-container">
          <?php if ( have_rows( 'hm_one_place_group' ) ) : ?>
              <?php while ( have_rows( 'hm_one_place_group' ) ) : the_row(); ?>
          <div class="d-place">
            <div class="place"><?php the_sub_field( 'place' ); ?></div>
          </div>

      <div class="d-image">

          <?php $image = get_sub_field( 'image' ); ?>
          <?php if ( $image ) : ?>
            <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
          <?php endif; ?>
      </div>

  <!-- PLACE 4 GALLERY START -->


  <div class="d-image">


  <?php
  // If at least 1 image is present in the Project Images Gallery field
  if( $images = get_sub_field('gallery') ) {
  $image_ids = wp_list_pluck( $images, 'id' );
  // Soliloquy Dynamic requires image IDs to be passed as a comma separated list
  $image_ids_string = implode( ',', $image_ids );
  echo '<div class="project-images-slider">';
    soliloquy_dynamic( array(
      'id' => 'custom-project-images4',
      'images' => $image_ids_string
    ) );
  echo '</div>';
  }
  ?>

  </div>





  <!-- PLACE 4 GALLERY END -->

  <div class="d-byline-caption">
  <div class="d-byline-photog">
    <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
  </div>
  <div class="d-byline-title">
    <div class="nameandorg">
     <?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication' ); ?></span></div>
  </div>
</div>
<div class="d-stillcaption">
  <p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
</div>
</div>
</div>
  <?php endwhile; ?>
  <?php endif; ?>

  <!-- PLACE 4 END -->

  <!-- PLACE 5 START -->

    <div class="s-stillwinners-stills">
        <div class="c-winner-still w-container">
          <?php if ( have_rows( 'hm_two_place_group' ) ) : ?>
  <?php while ( have_rows( 'hm_two_place_group' ) ) : the_row(); ?>
          <div class="d-place">
            <div class="place"><?php the_sub_field( 'place' ); ?></div>
          </div>
      <div class="d-image">
          <?php $image = get_sub_field( 'image' ); ?>
          <?php if ( $image ) : ?>
            <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
          <?php endif; ?>
      </div>

  <!-- PLACE 5 GALLERY START -->


  <div class="d-image">


  <?php
  // If at least 1 image is present in the Project Images Gallery field
  if( $images = get_sub_field('gallery') ) {
  $image_ids = wp_list_pluck( $images, 'id' );
  // Soliloquy Dynamic requires image IDs to be passed as a comma separated list
  $image_ids_string = implode( ',', $image_ids );
  echo '<div class="project-images-slider">';
    soliloquy_dynamic( array(
      'id' => 'custom-project-images5',
      'images' => $image_ids_string
    ) );
  echo '</div>';
  }
  ?>

  </div>




  <!-- PLACE 5 GALLERY END -->

  <div class="d-byline-caption">
  <div class="d-byline-photog">
    <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
  </div>
  <div class="d-byline-title">
    <div class="nameandorg"><?php the_sub_field( 'first_name' ); ?>
     <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication' ); ?></span></div>
  </div>
</div>
<div class="d-stillcaption">
  <p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
</div>
</div>
</div>
  <?php endwhile; ?>
  <?php endif; ?>

  <!-- PLACE 5 END -->

  <!-- PLACE 6 START -->

<div class="s-stillwinners-stills">
    <div class="c-winner-still w-container">
      <?php if ( have_rows( 'hm_three_place_group' ) ) : ?>
          <?php while ( have_rows( 'hm_three_place_group' ) ) : the_row(); ?>
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'place' ); ?></div>
      </div>

    <div class="d-image">

      <?php $image = get_sub_field( 'image' ); ?>
      <?php if ( $image ) : ?>
        <img src="<?php echo esc_url( $image['url'] ); ?>" class="galleryimage" alt="<?php the_sub_field( 'place' ); ?>" />
      <?php endif; ?>
  </div>

<!-- PLACE 6 GALLERY START -->


<div class="d-image">


<?php
// If at least 1 image is present in the Project Images Gallery field
if( $images = get_sub_field('gallery') ) {
$image_ids = wp_list_pluck( $images, 'id' );
// Soliloquy Dynamic requires image IDs to be passed as a comma separated list
$image_ids_string = implode( ',', $image_ids );
echo '<div class="project-images-slider">';
  soliloquy_dynamic( array(
    'id' => 'custom-project-images6',
    'images' => $image_ids_string
  ) );
echo '</div>';
}
?>

</div>





<!-- PLACE 6 GALLERY END -->

<div class="d-byline-caption">
<div class="d-byline-photog">
  <div class="text-block-5"><?php the_sub_field( 'entry_name' ); ?></div>
</div>
<div class="d-byline-title">
  <div class="nameandorg"><?php the_sub_field( 'first_name' ); ?>
   <?php the_sub_field( 'last_name' ); ?><?php if( get_sub_field('last_name') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication' ); ?></span></div>
</div>
</div>
<div class="d-stillcaption">
<p class="paragraph"><?php echo $image['caption']; // image caption ?></p>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<!-- PLACE 6 END -->


<!-- CLOSING Group WHILEif Statement Below -->
      <?php endwhile; ?>
    <?php endif; ?>



</main><!-- MAIN CONTENT END -->


<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
