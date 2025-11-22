<!-- Stripe: Small Photo Gallery -->
<section id="1" class="s-small-gallery">
      <div class="c-small-image w-container">
        <?php $gallery_images = get_sub_field( 'gallery' ); ?>
              <?php if ( $gallery_images ) :  ?>
                <figure class="d-image-small">
                  <div data-animation="over" data-duration="500" data-infinite="1" class="slider-small w-slider">
                    <div class="w-slider-mask">
                <?php foreach ( $gallery_images as $gallery_image ): ?>
              <div class="w-slide">
              <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    						<img src="<?php echo esc_url( $gallery_image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
    					</a>
    					<p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
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
      </div>
    </section>
