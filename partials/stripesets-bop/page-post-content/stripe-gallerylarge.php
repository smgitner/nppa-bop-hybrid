<!-- LARGE GALLERY -->

<section id="2" class="s-large-gallery">
      <div class="s-fullwidth-lead-container w-container">
        <figure class="fullwidth-lede-image">

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
