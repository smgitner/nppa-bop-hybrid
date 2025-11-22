<?php
/**
 * The template for displaying all single opvi posts
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


<div class="s-ovpi-place1">
    <div class="c-ovpi-gallery w-container">
  <div class="d-place-top">
    <?php if ( have_rows( 'first_place_group' ) ) : ?>
	     <?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
         <div class="place"><?php the_sub_field( 'place_1' ); ?></div>
  </div>
  <div class="d-image">
    <?php $one_single_image = get_sub_field( 'one_single_image' ); ?>
    		<?php if ( $one_single_image ) : ?>
    			<img src="<?php echo esc_url( $one_single_image['url'] ); ?>" alt="<?php echo esc_attr( $one_single_image['alt'] ); ?>" />
    		<?php endif; ?>
  </div>
    <div class="d-captionbyline">
      <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'entry_title_1' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( 'firstname_1' ); ?> <?php the_sub_field( 'lastname_1' ); ?><?php if( get_sub_field('lastname_1') ): ?>/<?php endif; ?><span class="organization"> <?php the_sub_field( 'publication_1' ); ?></span></div>
      </div>
    </div>
    <?php if( get_sub_field('entry_description') ): ?>
        <div class="d-stillcaption">
          <p class="paragraph"><?php the_sub_field( 'entry_description' ); ?></p>
      </div>
    </div>
    <?php endif; ?>

    <?php if( get_sub_field('team_members_1') ): ?>
    <div class="d-teamentry">
    <div class="d-byline-teams"><?php the_sub_field( 'team_members_1' ); ?></div>
    </div>
    <?php endif; ?>

    <?php if( get_sub_field('1p_storylink1') ): ?>
    <div class="d-ovpstorylinks">
      <div class="d-linkblock">
    <a href="<?php the_sub_field( '1p_storylink1' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('1p_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      </div>
    <?php endif; ?>
        <?php if( get_sub_field('1p_storylink2') ): ?>
      <div class="d-linkblock">
    <a href="<?php the_sub_field( '1p_storylink2' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('1p_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      </div>
      <?php endif; ?>
          <?php if( get_sub_field('1p_storylink3') ): ?>
      <div class="d-linkblock">
    <a href="<?php the_sub_field( '1p_storylink3' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('1p_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      </div>
            <?php endif; ?>
                <?php if( get_sub_field('1p_storylink4') ): ?>
      <div class="d-linkblock">
    <a href="<?php the_sub_field( '1p_storylink4' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('1p_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
    </div>
          <?php endif; ?>
              <?php if( get_sub_field('1p_storylink5') ): ?>
    <div class="d-linkblock">
    <a href="<?php the_sub_field( '1p_storylink5' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('1p_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
    </div>
    </div>
          <?php endif; ?>

    <?php if( get_sub_field('1p_videolink1') ): ?>
    <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '1p_videolink1' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_videolink1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
            </div>
        </div>

    </div>
      <?php endif; ?>

        <?php if( get_sub_field('1p_Videolink2') ): ?>
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '1p_Videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_Videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
          </div>
          </div>

    </div>
      <?php endif; ?>

      <?php if( get_sub_field('1p_Videolink3') ): ?>
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '1p_Videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_Videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
        </div>
          </div>

    </div>
          <?php endif; ?>

        <?php if( get_sub_field('1p_Videolink4') ): ?>
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">

          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '1p_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
          </div>
          </div>

    </div>
          <?php endif; ?>

              <?php if( get_sub_field('1p_Videolink5') ): ?>
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">

          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '1p_Videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_Videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
          </div>
          </div>

    </div>
      <?php endif; ?>

      <?php endwhile; ?>
      <?php endif; ?>

</div></div></div></div></div></div>

<!-- SECOND PLACE -->

<div class="s-ovpi-place2">
<div class="c-ovpi-gallery w-container">
  <div class="d-place-top">
<?php if ( have_rows( 'second_place_group' ) ) : ?>
	<?php while ( have_rows( 'second_place_group' ) ) : the_row(); ?>
    <div class="place"><?php the_sub_field( '2p_place' ); ?></div>
  </div>


  <div class="d-image">

    <?php $two_single_image = get_sub_field( 'two_single_image' ); ?>
		<?php if ( $two_single_image ) : ?>
			<img src="<?php echo esc_url( $two_single_image['url'] ); ?>" alt="<?php echo esc_attr( $two_single_image['alt'] ); ?>" />
		<?php endif; ?>


  </div>



  <div class="d-captionbyline">
    <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( '2p_entry_title' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( '2p_firstname' ); ?> <?php the_sub_field( '2p_lastname' ); ?><?php if( get_sub_field('2p_lastname') ): ?>/<?php endif; ?><span class="organization"> <?php the_sub_field( '2p_publication' ); ?></span></div>
      </div>
    </div>
    <div class="d-stillcaption">
        <?php if( get_sub_field('2p_entry_description') ): ?>
      <p class="paragraph"><?php the_sub_field( '2p_entry_description' ); ?></p>
    </div>
          <?php endif; ?>
  </div>
  <div class="d-teamentry">
    <?php if( get_sub_field('2p_team_members_2') ): ?>
    <div class="d-byline-teams"><?php the_sub_field( '2p_team_members' ); ?></div>
          <?php endif; ?>
  </div>


  <div class="d-ovpstorylinks">
    <div class="d-linkblock">
      <?php if( get_sub_field('2p_storylink1') ): ?>
      <a href="<?php the_sub_field( '2p_storylink1' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('2p_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('2p_storylink2') ): ?>
      <a href="<?php the_sub_field( '2p_storylink2' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('2p_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('2p_storylink3') ): ?>
      <a href="<?php the_sub_field( '2p_storylink3' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('2p_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
        <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('2p_storylink4') ): ?>
      <a href="<?php the_sub_field( '2p_storylink4' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('2p_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('2p_storylink5') ): ?>
      <a href="<?php the_sub_field( '2p_storylink5' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('2p_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
      <?php endif; ?>
    </div>
  </div>
<?php if( get_sub_field('2p_videolink1') ): ?>
  <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
      <div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '2p_videolink1' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '2p_videolink1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true">
          </iframe>
        </div>

    </div>
    </div>
<?php endif; ?>

<?php if( get_sub_field('2p_Videolink2') ): ?>
    <div class="d-vidlinkblock">
        <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '2p_Videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '2p_Videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true">
          </iframe>
        </div>

    </div>
    </div>
      <?php endif; ?>

      <?php if( get_sub_field('2p_Videolink3') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '2p_Videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '2p_Videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true">
          </iframe>
        </div>

    </div>
</div>
      <?php endif; ?>

      <?php if( get_sub_field('2p_Videolink4') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '2p_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '2p_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true">
          </iframe>
        </div>

    </div>
</div>
<?php endif; ?>

      <?php if( get_sub_field('2p_Videolink5') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '2p_Videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '1p_Videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true">
          </iframe>
        </div>

    </div>
</div>
      <?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>
</div></div></div></div></div></div>

<!-- Third Place -->

<div class="s-ovpi-place3">
<div class="c-ovpi-gallery w-container">
  <div class="d-place-top">
<?php if ( have_rows( 'third_place_group' ) ) : ?>
	<?php while ( have_rows( 'third_place_group' ) ) : the_row(); ?>
    <div class="place"><?php the_sub_field( '3p_place' ); ?></div>
  </div>


  <div class="d-image">

    <?php $three_single_image = get_sub_field( 'three_single_image' ); ?>
		<?php if ( $three_single_image ) : ?>
			<img src="<?php echo esc_url( $three_single_image['url'] ); ?>" alt="<?php echo esc_attr( $three_single_image['alt'] ); ?>" />
		<?php endif; ?>

  </div>



  <div class="d-captionbyline">
    <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( '3p_entry_title' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( '3p_firstname' ); ?> <?php the_sub_field( '3p_lastname' ); ?><?php if( get_sub_field('3p_lastname') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( '3p_publication' ); ?></span></div>
      </div>
    </div>
    <div class="d-stillcaption">
        <?php if( get_sub_field('3p_entry_description') ): ?>
      <p class="paragraph"><?php the_sub_field( '3p_entry_description' ); ?></p>
    </div>
          <?php endif; ?>
  </div>
  <div class="d-teamentry">
    <?php if( get_sub_field('3p_team_members') ): ?>
    <div class="d-byline-teams"><?php the_sub_field( '3p_team_members' ); ?></div>
          <?php endif; ?>
  </div>


  <div class="d-ovpstorylinks">
    <div class="d-linkblock">
      <?php if( get_sub_field('3p_storylink1') ): ?>
      <a href="<?php the_sub_field( '3p_storylink1' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('3p_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('3p_storylink2') ): ?>
      <a href="<?php the_sub_field( '3p_storylink2' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('3p_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('3p_storylink3') ): ?>
      <a href="<?php the_sub_field( '3p_storylink3' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('3p_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('3p_storylink4') ): ?>
      <a href="<?php the_sub_field( '3p_storylink4' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('3p_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
    <div class="d-linkblock">
      <?php if( get_sub_field('3p_storylink5') ): ?>
      <a href="<?php the_sub_field( '3p_storylink5' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('3p_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
  </div>

<?php if( get_sub_field('3p_videolink1') ): ?>
  <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '3p_videolink1' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '3p_videolink1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
        </div>
        </div>


</div>
  <?php endif; ?>

    <?php if( get_sub_field('3p_Videolink2') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '3p_Videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '3p_Videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
<?php endif; ?>

<?php if( get_sub_field('3p_Videolink3') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '3p_Videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '3p_Videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
      <?php endif; ?>

<?php if( get_sub_field('3p_Videolink4') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '3p_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '3p_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
  <?php endif; ?>

<?php if( get_sub_field('3p_Videolink5') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( '3p_Videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( '3p_Videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>


    </div>
<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>
</div></div></div></div></div></div>

<!--HM 4 -->
<div class="s-ovpi-place4">
<div class="c-ovpi-gallery w-container">
<div class="d-place-top">
<?php if ( have_rows( 'hm4_place_group' ) ) : ?>
<?php while ( have_rows( 'hm4_place_group' ) ) : the_row(); ?>



<!--ACF HIDE IF EMPTY CUSTOM FIELD --><?php if( get_sub_field('hm4_place') ): ?>
    <div class="place"><?php the_sub_field( 'hm4_place' ); ?></div>
  </div>


  <div class="d-image">

    <?php $hm4_single_image = get_sub_field( 'hm4_single_image' ); ?>
		<?php if ( $hm4_single_image ) : ?>
			<img src="<?php echo esc_url( $hm4_single_image['url'] ); ?>" alt="<?php echo esc_attr( $hm4_single_image['alt'] ); ?>" />
		<?php endif; ?>

  </div>



  <div class="d-captionbyline">
    <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm4_entry_title' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( 'hm4_firstname' ); ?> <?php the_sub_field( 'hm4_lastname' ); ?><span class="organization"><?php the_sub_field( 'hm4_publication' ); ?></span></div>
      </div>
    </div>

    <div class="d-stillcaption">
      <?php if( get_sub_field('hm4_entry_description') ): ?>
      <p class="paragraph"><?php the_sub_field( 'hm4_entry_description' ); ?></p>
<?php endif; ?>
    </div>
  </div>
  <div class="d-teamentry">
          <?php if( get_sub_field('hm4_team_members') ): ?>
    <div class="d-byline-teams"><?php the_sub_field( 'hm4_team_members' ); ?></div>

  </div>
  <?php endif; ?>
<?php endif; ?>
  <div class="d-ovpstorylinks">
    <?php if( get_sub_field('hm4_storylink1') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm4_storylink1' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm4_storylink2') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm4_storylink2' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm4_storylink3') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm4_storylink3' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
  <?php endif; ?>
    <?php if( get_sub_field('hm4_storylink4') ): ?>
    <div class="d-linkblock">
            >
      <a href="<?php the_sub_field( 'hm4_storylink4' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm4_storylink5') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm4_storylink5' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
              <?php endif; ?>
    </div>
  </div>

<?php if( get_sub_field('hm4_videolink2') ): ?>
  <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm4_videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm4_videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
        </div>
        </div>


</div>
<?php endif; ?>

<?php if( get_sub_field('hm4_videolink3') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm4_videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm4_videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
      <?php endif; ?>

<?php if( get_sub_field('hm4_Videolink7') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm4_Videolink7' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm4_Videolink7' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
<?php endif; ?>

      <?php if( get_sub_field('hm4_Videolink4') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm4_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm4_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

</div>
<?php endif; ?>

    <?php if( get_sub_field('hm4_videolink5') ): ?>
    <div class="d-vidlinkblock">
<div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm4_videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm4_videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>


    </div>
      <?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

</div></div></div></div></div></div>

<!--HM 5 -->

<div class="s-ovpi-place5">
<div class="c-ovpi-gallery w-container">
  <div class="d-place-top">
<?php if ( have_rows( 'hm5_place_group' ) ) : ?>
	<?php while ( have_rows( 'hm5_place_group' ) ) : the_row(); ?>
    <!--ACF HIDE IF EMPTY CUSTOM FIELD --><?php if( get_sub_field('hm5_place') ): ?>
    <div class="place"><?php the_sub_field( 'hm5_place' ); ?></div>
  </div>


  <div class="d-image">

    <?php $hm5_single_image = get_sub_field( 'hm5_single_image' ); ?>
		<?php if ( $hm5_single_image ) : ?>
			<img src="<?php echo esc_url( $hm5_single_image['url'] ); ?>" alt="<?php echo esc_attr( $hm5_single_image['alt'] ); ?>" />
		<?php endif; ?>

  </div>



  <div class="d-captionbyline">
    <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm5_entry_title' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( 'hm5_firstname' ); ?> <?php the_sub_field( 'hm5_lastname' ); ?><?php if( get_sub_field('hm5_lastname') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'hm5_publication' ); ?></span></div>
      </div>
    </div>
    <div class="d-stillcaption">
      <?php if( get_sub_field('hm5_entry_description') ): ?>
      <p class="paragraph"><?php the_sub_field( 'hm5_entry_description' ); ?></p>
<!--ACF HIDE IF EMPTY CUSTOM FIELD --><?php endif; ?>
    </div>
  </div>
  <div class="d-teamentry">
    <?php if( get_sub_field('hm5_team_members') ): ?>
    <div class="d-byline-teams"><?php the_sub_field( 'hm5_team_members' ); ?></div>

  </div>
<?php endif; ?>
<?php endif; ?>
  <div class="d-ovpstorylinks">
    <?php if( get_sub_field('hm5_storylink1') ): ?>
    <div class="d-linkblock">
      <a href="<?php the_sub_field( 'hm5_storylink1' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm5_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm5_storylink2') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm5_storylink2' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm5_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm5_storylink3') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm5_storylink3' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm5_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm5_storylink4') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm5_storylink4' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm5_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
    <?php endif; ?>
    <?php if( get_sub_field('hm5_storylink5') ): ?>
    <div class="d-linkblock">

      <a href="<?php the_sub_field( 'hm5_storylink5' ); ?>" class="w-inline-block">
        <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm5_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

    </div>
  </div>
<?php endif; ?>

      <?php if( get_sub_field('hm5_Videolink1') ): ?>
  <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm5_Videolink1' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm5_Videolink1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
        </div>
        </div>


  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm5_videolink2') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm5_videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm5_videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm5_videolink3') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm5_videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm5_videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm5_Videolink4') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm5_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm5_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm5_videolink5') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm5_videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm5_videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>


    </div>
      <?php endif; ?>

  <?php endwhile; ?>
  <?php endif; ?>
</div></div></div></div></div></div>

<!--HM 6 -->
<div class="s-ovpi-place6">
    <div class="c-ovpi-gallery w-container">
<div class="d-place-top">
<?php if ( have_rows( 'hm6_place_group' ) ) : ?>
<?php while ( have_rows( 'hm6_place_group' ) ) : the_row(); ?>


<!--ACF HIDE IF EMPTY CUSTOM FIELD --><?php if( get_sub_field('hm6_place') ): ?>
    <div class="place"><?php the_sub_field( 'hm6_place' ); ?></div>
  </div>


  <div class="d-image">

    <?php $hm6_single_image = get_sub_field( 'hm6_single_image' ); ?>
		<?php if ( $hm6_single_image ) : ?>
			<img src="<?php echo esc_url( $hm6_single_image['url'] ); ?>" alt="<?php echo esc_attr( $hm6_single_image['alt'] ); ?>" />
		<?php endif; ?>

  </div>



  <div class="d-captionbyline">
    <div class="d-byline-caption">
      <div class="d-byline-photog">
        <div class="text-block-5"><?php the_sub_field( 'hm6_entry_title' ); ?></div>
      </div>
      <div class="d-byline-title">
        <div class="nameandorg"><?php the_sub_field( 'hm6_firstname' ); ?> <?php the_sub_field( 'hm6_lastname' ); ?><?php if( get_sub_field('hm6_lastname') ): ?>/<?php endif; ?><span class="organization"><?php the_sub_field( 'hm6_publication' ); ?></span></div>
      </div>
    </div>

    <div class="d-stillcaption">
      <?php if( get_sub_field('hm6_entry_description') ): ?>
      <p class="paragraph"><?php the_sub_field( 'hm6_entry_description' ); ?></p>
<!--ACF HIDE IF EMPTY CUSTOM FIELD --><?php endif; ?>
    </div>
  </div>
  <div class="d-teamentry">
          <?php if( get_sub_field('hm6_team_members') ): ?>
    <div class="d-byline-teams"><?php the_sub_field( 'hm6_team_members' ); ?></div>
  </div>
  <?php endif; ?>
<?php endif; ?>

<div class="d-ovpstorylinks">
  <?php if( get_sub_field('hm6_storylink1') ): ?>
  <div class="d-linkblock">

    <a href="<?php the_sub_field( 'hm6_storylink1' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm6_storylink1') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

  </div>
  <?php endif; ?>
  <?php if( get_sub_field('hm6_storylink2') ): ?>
  <div class="d-linkblock">

    <a href="<?php the_sub_field( 'hm6_storylink2' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm4_storylink2') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

  </div>
  <?php endif; ?>
  <?php if( get_sub_field('hm6_storylink3') ): ?>
  <div class="d-linkblock">

    <a href="<?php the_sub_field( 'hm6_storylink3' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm6_storylink3') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

  </div>
<?php endif; ?>
  <?php if( get_sub_field('hm6_storylink4') ): ?>
  <div class="d-linkblock">
          >
    <a href="<?php the_sub_field( 'hm6_storylink4' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm6_storylink4') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>

  </div>
  <?php endif; ?>
  <?php if( get_sub_field('hm6_storylink5') ): ?>
  <div class="d-linkblock">

    <a href="<?php the_sub_field( 'hm6_storylink5' ); ?>" class="w-inline-block">
      <?php echo do_shortcode('[snapshot url="'. get_sub_field('hm6_storylink5') .'" alt="'. get_field('alt') .'" width="400" height="300"]'); ?></a>
  </div>
</div>
<?php endif; ?>

      <?php if( get_sub_field('hm6_Videolink1') ): ?>
  <div class="d-ovpvideolinks">
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">

        <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed">
          <iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm6_Videolink1' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm6_Videolink1' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>
        </div>
        </div>


  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm6_videolink2') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm6_videolink2' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm6_videolink2' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

  <?php if( get_sub_field('hm6_videolink3') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm6_videolink3' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm6_videolink3' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

   <?php if( get_sub_field('hm6_Videolink4') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm6_Videolink4' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm6_Videolink4' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>

  </div>
      <?php endif; ?>

      <?php if( get_sub_field('hm6_videolink5') ): ?>
    <div class="d-vidlinkblock">
  <div class="d-yt-ovpi">


          <div style="padding-top:56.17021276595745%" class="video-embed-ovpi w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2F<?php the_sub_field( 'hm6_videolink5' ); ?>>%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D<?php the_sub_field( 'hm6_videolink5' ); ?>&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FTX6hFnvd4Xw%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
          </div>


    </div>
      <?php endif; ?>

  <?php endwhile; ?>
  <?php endif; ?>
</div></div></div></div></div></div>

</main><!-- MAIN CONTENT END -->




<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
