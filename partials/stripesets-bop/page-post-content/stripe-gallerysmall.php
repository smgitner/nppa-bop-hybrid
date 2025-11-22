<!-- Stripe: Small Photo Gallery -->
<section id="1" class="s-small-gallery">
      <div class="c-small-image w-container">
          <figure class="d-image-small">

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



        </figure>
      </div>
    </section>
