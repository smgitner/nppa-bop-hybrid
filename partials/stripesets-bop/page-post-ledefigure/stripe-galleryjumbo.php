<!-- Stripe: Jumbo Photo Gallery -->
<section id="3" class="s-jumbo-gallery">


    <?php $gallery_images = get_sub_field( 'gallery' ); ?>
    <?php if ( $gallery_images ) :  ?>
      <figure class="d-jumbo-image">
    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider-jumbo w-slider">
      <div class="w-slider-mask">


        <?php foreach ( $gallery_images as $gallery_image ): ?>
      <div class="w-slide">
      <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
        <img src="<?php echo esc_url( $gallery_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" sizes="(max-width: 2000px) 100vw, 2000px" class="image-3" />
      </a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>


      </div>
      <div class="w-slider-arrow-left">
        <div class="w-icon-slider-left"></div>
      </div>
      <div class="w-slider-arrow-right">
        <div class="w-icon-slider-right"></div>
      </div>
      <div class="w-slider-nav w-slider-nav-invert w-shadow w-round"></div>
    </div>
  </figure>
</section>
