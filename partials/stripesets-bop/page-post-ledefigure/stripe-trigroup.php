<!-- Stripe: Three Picture Group (TOP Horizontal) -->
<section class="s-three-picture-group-h-top">
  <figure class="w-container">
    <div class="w-layout-grid grid-4">
      <figure id="w-node-f291ebf45752-166d083d" class="tri-group-top-image-grid">

        <img <?php $tri_top_image = get_sub_field( 'tri_top_image' ); ?>
      <?php if ( $tri_top_image ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'tri_top_image' ),'tri_top_image','725px'); ?>
alt="<?php echo get_post_meta($image_field, '_wp_attachment_image_alt', true) ?>"
      <?php } ?>/>







      </figure>
      <div id="w-node-f291ebf45754-166d083d" class="tri-group-left-grid">

        <img <?php $right_small_image = get_sub_field( 'right_small_image' ); ?>
      <?php if ( $right_small_image ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'right_small_image' ),'one-col-image','300px'); ?>
alt="<?php echo get_post_meta($right_small_image, '_wp_attachment_image_alt', true) ?>"
      <?php } ?>/>





        <div class="byline-caption">
          <div class="post-photo-byline"><?php the_sub_field( 'left_small_credit' ); ?></div>
          <div class="leadimage-caption"><?php the_sub_field( 'left_small_caption' ); ?></div>
        </div>
      </div>
      <div id="w-node-f291ebf4575b-166d083d" class="byline-caption">
        <div class="post-photo-byline-copy"><?php the_sub_field( 'top_credit' ); ?></div>
        <div><?php the_sub_field( 'top_small_caption' ); ?></div>
      </div>
      <div id="w-node-f291ebf45760-166d083d" class="tri-group-right">

        <img <?php $left_small_image = get_sub_field( 'left_small_image' ); ?>
      <?php if ( $left_small_image ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'left_small_image' ),'one-col-image','300px'); ?>
alt="<?php echo get_post_meta($left_small_image, '_wp_attachment_image_alt', true) ?>"
      <?php } ?>/>





        <div class="byline-caption">
          <div class="post-photo-byline"><?php the_sub_field( 'right_small_credit' ); ?></div>
          <div class="leadimage-caption"><?php the_sub_field( 'right_small_caption' ); ?></div>
        </div>
      </div>
    </div>
  </figure>
</section>
