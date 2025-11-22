<!-- Stripe: Small Video -->

    <!-- Stripe: Text -->
    <section class="s-textarea">
          <div class="c-textarea w-container">
            <div class="d-textarea">
              <div class="d-yt">
                <?php if( get_sub_field('video_field') ): ?>
              <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'video_field' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'video_field' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
              <?php endif; ?>
              </div>
                <div class="post-photo-byline"><?php the_sub_field( 'video_credit' ); ?></div>
                <div class="leadimage-caption"><?php the_sub_field( 'video_caption' ); ?></div>
            </div>
          </div>
        </section>
