<!-- Stripe: Large Image  -->
<section class="s-large-image">
      <div class="s-fullwidth-lead-container w-container">
        <figure class="fullwidth-lede-image">




          <img <?php $image_field = get_sub_field( 'image_field' ); ?>
        <?php if ( $image_field ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'image_field' ),'image-large','1000px'); ?>
alt="<?php echo get_post_meta($image_field, '_wp_attachment_image_alt', true) ?>"
        <?php } ?>/>



        <div class="post-photo-byline"><?php the_sub_field( 'photo_credit' ); ?></div>
        <div class="leadimage-caption"><?php the_sub_field( 'caption_field' ); ?></div>
        </figure>
      </div>
    </section>
