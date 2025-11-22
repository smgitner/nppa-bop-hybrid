<!-- Stripe: Three Picture Group (TOP Horizontal) -->


<section class="s-trigroup-horizontaltop">
      <article class="c-text-container w-container">
        <div class="w-layout-grid trigroup-grid">
          <figure id="w-node-_31de0ae1-58fd-8eb4-f6d7-b1c7ab93d05b-9adefa8e" class="tri-group-horizontal">
<div class="d-image-byline-caption">
            <img <?php $tri_top_image = get_sub_field( 'tri_top_image' ); ?>
          <?php if ( $tri_top_image ) { ?>
    <?php awesome_acf_responsive_image(get_sub_field( 'tri_top_image' ),'tri-image','725px', '100%'); ?>
    alt="<?php echo get_post_meta($image_field, '_wp_attachment_image_alt', true) ?>"
          <?php } ?>/>

            <div class="image-caption-metadata">

            </div>
            </div>
          </figure>

          <figure id="w-node-_31de0ae1-58fd-8eb4-f6d7-b1c7ab93d064-9adefa8e" class="trigroup-lowerleft">

<div class="d-image-byline-caption">
            <img <?php $left_small_image = get_sub_field( 'left_small_image' ); ?>
          <?php if ( $left_small_image ) { ?>
    <?php awesome_acf_responsive_image(get_sub_field( 'left_small_image' ),'one-col-image','300px', '100%'); ?>
    alt="<?php echo get_post_meta($left_small_image, '_wp_attachment_image_alt', true) ?>"
          <?php } ?>/>

            <div class="image-caption-metadata">


            </div>
            </div>
          </figure>

          <figure id="w-node-_31de0ae1-58fd-8eb4-f6d7-b1c7ab93d06d-9adefa8e" class="trigroup-lowerright">

<div class="d-image-byline-caption">
            <img <?php $right_small_image = get_sub_field( 'right_small_image' ); ?>
          <?php if ( $right_small_image ) { ?>
    <?php awesome_acf_responsive_image(get_sub_field( 'right_small_image' ),'one-col-image','300px', '100%'); ?>
    alt="<?php echo get_post_meta($right_small_image, '_wp_attachment_image_alt', true) ?>"
          <?php } ?>/>

            <div class="image-caption-metadata">



            </div>
            </div>
          </figure>
        </div>
      </article>
    </section>
