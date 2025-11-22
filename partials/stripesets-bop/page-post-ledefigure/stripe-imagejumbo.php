<!-- Stripe: Jumbo Image -->

<section class="s-jumbo-image">

  <img <?php $image_field = get_sub_field( 'image_field' ); ?>
<?php if ( $image_field ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'image_field' ),'lede-jumbo-image','100%'); ?>
alt="<?php echo get_post_meta($image_field, '_wp_attachment_image_alt', true) ?>"
<?php } ?>/>


      <div class="d-jumbo-imagecaption">
        <div class="post-photo-byline"><?php the_sub_field( 'photo_credit' ); ?></div>
        <div class="leadimage-caption"><?php the_sub_field( 'caption_field' ); ?></div>
      </div>
    </section>
