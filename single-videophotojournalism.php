<?php
/**
 * The template for displaying all single videophotojournalism posts
 *
 * @package nppa_bop_theme
 */

get_header('bopwins'); ?>

<!-- TOP OF STORY POST PAGE -->


<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->
    <article class="story-article-post">

      <!-- <div class="s-crumbs">
          <div class="c-crumbs w-container">
            <div class="breadcrumbs">
              <div class="crumbs">

<?php previous_post_link(); ?>  |  <?php next_post_link(); ?>
</div>
            </div>
          </div>
        </div> -->

        <!-- SECTION HEADLINE DEK START -->
              <section id="headline-dek" class="stripe-headline-dek">
                <div class="container-header story-container w-container">
                  <div class="header-div">
                    <!-- <div class="header-section-meta"><?php the_category(','); ?></div> -->
                    <h1 class="page-headline"><?php the_title(''); ?></h1>
                  </div>
                </div>
              </section>
        <!-- SECTION HEADLINE DEK END -->

<!-- FIRST PLACE -->
<div class="s-videowinners">
  <?php if ( have_rows( 'first_place_winner' ) ) : ?>
  	<?php while ( have_rows( 'first_place_winner' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'place_1' ); ?></div>
      </div>
      <div class="d-video">
        <div class="d-videobyline">
          <div class="d-yt">
            <?php if( get_sub_field('videolink_1') ): ?>
          <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'videolink_1' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'videolink_1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          <?php endif; ?>
          </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'entry_title_1' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'firstname_1' ); ?> <?php the_sub_field( 'lastname_1' ); ?><?php if( get_sub_field('lastname_1') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication_1' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
      <div class="d-captionbyline">
        <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'explanation_1' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'teammembers_1' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>

<!-- SECOND PLACE -->
<div class="s-videowinners">
  <?php if ( have_rows( 'second_place_winner' ) ) : ?>
    <?php while ( have_rows( 'second_place_winner' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'place_2' ); ?></div>
      </div>
      <div class="d-video">
        <div class="d-videobyline">
          <div class="d-yt">
            <?php if( get_sub_field('videolink_2') ): ?>
          <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'videolink_2' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'videolink_2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          <?php endif; ?>
          </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'entry_title_2' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'firstname_2' ); ?> <?php the_sub_field( 'lastname_2' ); ?><?php if( get_sub_field('lastname_2') ): ?>/<?php endif; ?><span class="organization"> <?php the_sub_field( 'publication_2' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
        <div class="d-captionbyline">
      <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'explanation_2' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'teammembers_2' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>



<!-- THIRD PLACE -->
<div class="s-videowinners">
  <?php if ( have_rows( 'third_place_winner' ) ) : ?>
    <?php while ( have_rows( 'third_place_winner' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'place_3' ); ?></div>
      </div>
      <div class="d-video">
        <div class="d-videobyline">
            <div class="d-yt">
              <?php if( get_sub_field('videolink_3') ): ?>
            <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'videolink_3' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'videolink_3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
            <?php endif; ?>
            </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'entry_title_3' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'firstname_3' ); ?> <?php the_sub_field( 'lastname_3' ); ?><?php if( get_sub_field('lastname_3') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'publication_3' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-captionbyline">
  <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'explanation_3' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'teammembers_3' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>

<!-- HM1 -->
<div class="s-videowinners">
  <?php if ( have_rows( 'hm_place_winner_1' ) ) : ?>
    <?php while ( have_rows( 'hm_place_winner_1' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'hm_place_1' ); ?></div>
      </div>
      <div class="d-video">
      <div class="d-videobyline">
          <div class="d-yt">
            <?php if( get_sub_field('hm_videolink_1') ): ?>
          <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm_videolink_1' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm_videolink_1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          <?php endif; ?>
          </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm_entry_title_1' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'hm_firstname_1' ); ?> <?php the_sub_field( 'hm_lastname_1' ); ?><?php if( get_sub_field('hm_lastname_1') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'hm_publication_1' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
        <div class="d-captionbyline">
      <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'hm_explanation_1' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'hm_teammembers_1' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>

<!-- HM2 -->
<div class="s-videowinners">
  <?php if ( have_rows( 'hm_place_winner_2' ) ) : ?>
    <?php while ( have_rows( 'hm_place_winner_2' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'hm_place_2' ); ?></div>
      </div>
      <div class="d-video">
        <div class="d-videobyline">
              <div class="d-yt">
                <?php if( get_sub_field('hm_videolink_2') ): ?>
              <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm_videolink_2' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm_videolink_2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
              <?php endif; ?>
              </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm_entry_title_2' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'hm_firstname_2' ); ?> <?php the_sub_field( 'hm_lastname_2' ); ?><?php if( get_sub_field('hm_lastname_2') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'hm_publication_2' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
        <div class="d-captionbyline">
      <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'hm_explanation_2' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'hm_teammembers_2' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>

<!-- HM3 -->
<div class="s-videowinners">
  <?php if ( have_rows( 'hm_place_winner_3' ) ) : ?>
    <?php while ( have_rows( 'hm_place_winner_3' ) ) : the_row(); ?>
    <div class="c-winner-video w-container">
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'hm_place_3' ); ?></div>
      </div>
      <div class="d-video">
        <div class="d-videobyline">
  <div class="d-yt">
    <?php if( get_sub_field('hm_videolink_3') ): ?>
  <div style="padding-top:56.17021276595745%" class="video-embed w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm_videolink_3' ); ?>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm_videolink_3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
  <?php endif; ?>
  </div>
      <div class="d-byline-caption">
        <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm_entry_title_3' ); ?></div>
        </div>
        <div class="d-byline-title">
          <div class="nameandorg"><?php the_sub_field( 'hm_firstname_3' ); ?> <?php the_sub_field( 'hm_lastname_3' ); ?><?php if( get_sub_field('hm_lastname_3') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'hm_publication_3' ); ?></span></div>
        </div>
      </div>
    </div>
  </div>
        <div class="d-captionbyline">
      <div class="d-explainer">
        <p class="paragraph"><?php the_sub_field( 'hm_explanation_3' ); ?></p>
      </div>

      <div class="d-team-members">
        <p class="paragraph"><?php the_sub_field( 'hm_teammembers_3' ); ?></p>
      </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>
<?php endif; ?>









</main><!-- MAIN CONTENT END -->




<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
