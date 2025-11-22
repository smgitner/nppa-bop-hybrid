<!-- Stripe: Featured Left -->
<section id="feature-section" class="s-featuredleft">
    <div class="flex-container w-container">
      <div class="feature-image-mask">
        <?php $image = get_sub_field( 'image' ); ?>
  			<?php if ( $image ) : ?>
  				<img src="<?php echo esc_url( $image['url'] ); ?>" class="feature-image" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <?php endif; ?>
      </div>
      <div>
        <h2><?php the_sub_field( 'hed' ); ?></h2>
        <?php the_sub_field( 'dek' ); ?>
      </div>
    </div>
  </section>
