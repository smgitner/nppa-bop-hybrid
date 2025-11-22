<!-- Stripe: Small Video -->

<section class="s-small-video">
      <div class="c-smallvideo w-container">
        <div class="empty-div"></div>
        <figure class="d-smallvideo">
          <div style="padding-top:56.17021276595745%" class="video w-video w-embed">

            <?php if ( have_rows( 'video' ) ): ?>
              <?php while ( have_rows( 'video' ) ) : the_row(); ?>
                <?php if ( get_row_layout() == 'embedded_video_player' ) : ?>
                  <?php the_sub_field( 'video_field' ); ?>
                <?php elseif ( get_row_layout() == 'video_player' ) : ?>
                  <?php the_sub_field( 'video_player' ); ?>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php else: ?>
              <?php // no layouts found ?>
            <?php endif; ?>
            
            </div>
            <div class="post-photo-byline"><?php the_sub_field( 'video_credit' ); ?></div>
            <div class="leadimage-caption"><?php the_sub_field( 'video_caption' ); ?></div>



        </figure>
      </div>
    </section>
