<!-- Small Image -->

   <section class="s-small-image">
      <div class="c-small-image w-container">
        <figure class="d-image-small">

          <img <?php $image_field = get_sub_field( 'image_field' ); ?>
        <?php if ( $image_field ) { ?>
<?php awesome_acf_responsive_image(get_sub_field( 'image_field' ),'image-small','725px'); ?>
alt="<?php echo get_post_meta($image_field, '_wp_attachment_image_alt', true) ?>"
        <?php } ?>/>



          <div class="post-photo-byline"><?php the_sub_field( 'photo_credit' ); ?></div>
          <div class="leadimage-caption"><?php the_sub_field( 'caption_field' ); ?>
        </figure>
      </div>
    </section>
