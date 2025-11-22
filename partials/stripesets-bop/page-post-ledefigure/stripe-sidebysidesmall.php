<!-- Stripe: Image Side By Side Small -->
<section class="s-sidebyside-small">
      <div class="stripeset-container-flexbox w-container">
        <div class="main-storytext-areas-div">
          <div class="doublewide-div">
            <div class="row-doublewide w-row">
              <div class="w-col w-col-6">
                <figure class="captioninset">

                  <?php $left_sidebyside_image = get_sub_field( 'left_sidebyside_image' ); ?>
                  <?php if ( $left_sidebyside_image ) { ?>
                    <img src="<?php echo $left_sidebyside_image['url']; ?>" alt="<?php echo $left_sidebyside_image['alt']; ?>" width="412x" height="100%" class="inset-image">
                  <?php } ?>

                  <div class="post-photo-byline"><?php the_sub_field( 'left_photo_credit' ); ?></div>
                  <p class="sidebyside-large-image-caption"><?php the_sub_field( 'left_caption' ); ?></p>
                </figure>
              </div>
              <div class="w-col w-col-6">
                <figure>

                  <?php $right_sidebyside_image = get_sub_field( 'right_sidebyside_image' ); ?>
                  <?php if ( $right_sidebyside_image ) { ?>
                    <img src="<?php echo $right_sidebyside_image['url']; ?>" alt="<?php echo $right_sidebyside_image['alt']; ?>" width="412px" height="100%" class="inset-image">
                  <?php } ?>



                  <div class="post-photo-byline"><?php the_sub_field( 'right_photo_credit' ); ?></div>
                  <p class="sidebyside-large-image-caption"><?php the_sub_field( 'right_caption_' ); ?></p>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
