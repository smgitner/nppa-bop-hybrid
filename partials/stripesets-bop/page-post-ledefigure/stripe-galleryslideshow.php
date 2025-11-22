<!-- Soliloquy Gallery Start -->
<section id="3" class="s-jumbo-gallery-static">
    <figure class="d-jumbo-imagecaption">
<?php $gallery_ids = get_field( 'gallery' ); ?>
<div>
      <?php
      // If at least 1 image is present in the Project Images Gallery field
      if( $images = get_field('gallery') ) {
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
</div>

    </figure>
  </section>
<!-- Soliloquy Gallery END -->
