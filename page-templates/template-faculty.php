<?php /* Template Name: Faculty Template
         Template Post Type: page,
*/
get_header(); ?>

<!-- TOP OF STORY POST PAGE -->


<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->

  <div class="w-container">
    <div class="w-row">
      <div class="w-col w-col-4">
        <div class="c-biomug">
          <div class="d-mug"><?php if ( get_field( 'coach_photo' ) ) { ?>
<img src="<?php the_field( 'coach_photo' ); ?>" alt="<?php the_field( 'name' ); ?>" class="image-36" />
<?php } ?></div>
          <div class="d-biodeets">
            <div class="text-block-3"><?php the_field( 'name' ); ?></div>
            <div><?php the_field( 'position' ); ?></div>
            <div><?php the_field( 'affiliation' ); ?></div>
            <div><a href="http://www.twitter.com/<?php the_field( 'twitter' ); ?>">@<?php the_field( 'twitter' ); ?></a></div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-8">
        <div class="d-fullbio">
          <div class="d-fullbio-header">
            <h1 class="bio-heading small"><?php the_field( 'name' ); ?> - <?php the_field( 'affiliation' ); ?></h1>
          </div>
          <div class="d-fuillbio-words">
            <p class="paragraph-9"><?php the_field( 'full_bio' ); ?></p>
          </div>



          <div class="d-relatedwork">
            <h3>Related Work:</h3>
            <div class="div-block-109">
            <ul class="w-list-unstyled">
              <?php if ( have_rows( 'related_links' ) ) : ?>
    	<?php while ( have_rows( 'related_links' ) ) : the_row(); ?>
              <li class="l-related">

                  <div>
                    <?php $link_to_related_work = get_sub_field( 'link_to_related_work' ); ?>
                    <?php if ( $link_to_related_work ) { ?>
              			<a href="<?php echo $link_to_related_work['url']; ?>" target="<?php echo $link_to_related_work['target']; ?>" class="w-inline-block"><?php echo $link_to_related_work['title']; ?> </a>
              		<?php } ?>
                </div>

              </li>
            <?php endwhile; ?>
          <?php else : ?>
          	<?php // no rows found ?>
          <?php endif; ?>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</main><!-- MAIN CONTENT END -->


<?php get_template_part( 'partials/misc/sponsors'); ?>


<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
