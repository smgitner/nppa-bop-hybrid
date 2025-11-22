<!-- Stripe: Featured Right-->
<section id="feature-section" class="s-featuredright">
    <div class="flex-container w-container">
      <div>
        <h2><?php the_sub_field( 'hed' ); ?></h2>
        <?php the_sub_field( 'dek' ); ?>
      </div>
      <div class="feature-image-mask">
        <?php if ( $image ) : ?>
          <img src="<?php echo esc_url( $image['url'] ); ?>" class="feature-image" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <?php endif; ?>
      </div>
    </div>
  </section>
