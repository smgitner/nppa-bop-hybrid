<?php
/**
 * The template for displaying all single posts
 *
 * @package nh_webflow_theme
 */

get_header(); ?>

<!-- TOP OF STORY POST PAGE -->


<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->
    <article class="story-article-post">

<!-- SECTION HEADLINE DEK START -->
      <section id="headline-dek" class="stripe-headline-dek">
        <div class="container-header story-container w-container">
          <div class="header-div">
            <!-- <div class="header-section-meta"><?php the_category(','); ?></div> -->
            <h1 class="page-headline"><?php the_title(''); ?></h1>
            <h2 class="post-headline-mobile w-hidden-main w-hidden-medium"><?php the_field( 'mobile_title_field' ); ?></h2>
            <div class="post-dek w-hidden-small w-hidden-tiny"><?php the_field( 'dek_field' ); ?></div>
            <div class="byline"><?php get_template_part( 'partials/single/stripe-storypost-bylines'); ?></div>
            <div class="publishedon-post"><?php the_date(); ?></div>
          </div>
        </div>
      </section>
<!-- SECTION HEADLINE DEK END -->


<!-- BOP TEST CODE START -->

<div>
       <div class="w-container">
         <?php $first_place = get_field( 'first_place' ); ?>
         <?php if ( $first_place ) : ?>
         	<img src="<?php echo esc_url( $first_place['url'] ); ?>" alt="<?php echo esc_attr( $first_place['alt'] ); ?>" />
                     <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
         <?php endif; ?>

         <?php $second_place = get_field( 'second_place' ); ?>
         <?php if ( $second_place ) : ?>
         	<img src="<?php echo esc_url( $second_place['url'] ); ?>" alt="<?php echo esc_attr( $second_place['alt'] ); ?>" />
                     <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
         <?php endif; ?>
         <?php $third_place = get_field( 'third_place' ); ?>
         <?php if ( $third_place ) : ?>
         	<img src="<?php echo esc_url( $third_place['url'] ); ?>" alt="<?php echo esc_attr( $third_place['alt'] ); ?>" />
                     <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
         <?php endif; ?>
         <?php if ( have_rows( 'honorable_mention' ) ) : ?>
         	<?php while ( have_rows( 'honorable_mention' ) ) : the_row(); ?>
         		<?php if ( get_sub_field( 'hm_image' ) ) : ?>
         			<img src="<?php the_sub_field( 'hm_image' ); ?>" />
                         <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
         		<?php endif ?>
         	<?php endwhile; ?>
         <?php else : ?>
         	<?php // no rows found ?>
         <?php endif; ?>

        <div>

         </div>
       </div>
     </div>
   </div>




<!-- BOP TEST CODE END -->

<!-- BOP TEST CODE START -->

<div>
       <div class="w-container">
         <?php  $video = get_field('first_youtube_video');
          echo "<h1>" . $video->title . "</h1>";
          echo "<p>" . $video->desc . "</p>";
          echo $video->embed; ?>
                     <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>


        <div>

         </div>
       </div>
     </div>
   </div>





<!-- BOP TEST CODE END -->

<!-- BOP TEST CODE START -->

<div>
       <div class="w-container">
         <!-- BOP TEST CODE START -->

         <div>
                <div class="w-container">
                  <?php if ( have_rows( 'first_place_group' ) ) : ?>
	<?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
		<?php $first_place_webproject = get_sub_field( 'first_place_webproject' ); ?>
		<?php if ( $first_place_webproject ) : ?>
			<img src="<?php echo esc_url( $first_place_webproject['url'] ); ?>" alt="<?php echo esc_attr( $first_place_webproject['alt'] ); ?>" />
		<?php endif; ?>
		<?php the_sub_field( 'link_to_work' ); ?>
	<?php endwhile; ?>
<?php endif; ?>
                              <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>


                 <div>

                  </div>
                </div>
              </div>
            </div>





         <!-- BOP TEST CODE END -->
                     <p class="paragraph-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>


        <div>

         </div>
       </div>
     </div>
   </div>





<!-- BOP TEST CODE END -->


<!-- STRIPESET SINGLE LEDE FIGURES START -->
<?php get_template_part( 'partials/stripesets/page-post-ledefigure'); ?>
<!-- STRIPESET SINGLE LEDE FIGURES END -->


<!-- WYSIWYG TOP TEXT START -->
      <div class="stripe-top-text">
        <div class="stripeset-container-text w-container">
          <div class="socialthis-storypage w-hidden-medium w-hidden-small w-hidden-tiny"></div>
          <div class="main-storytext-areas-div">
            <?php the_field( 'top_text_field' ); ?>
          </div>
          <div class="storypage-empty-spacer w-hidden-medium w-hidden-small w-hidden-tiny"></div>
        </div>
      </div>
<!-- WYSIWYG TOP TEXT END -->


<!-- STRIPESET SINGLE CONTENT START -->
<?php get_template_part( 'partials/stripesets/page-post-content'); ?>
<!-- STRIPESET SINGLE CONTENT END -->

<!-- AUTHOR BOX START-->
<?php get_template_part( 'partials/pageparts/authorbox'); ?>
<!-- AUTHOR BOX END -->

<!-- Stripeset: Story Post Related Links START -->
<?php get_template_part( 'partials/pageparts/related-linksimages'); ?>
<!-- Stripeset: Story Post Related Links END -->

<!-- Stripeset: Story Post News Links START -->
<?php get_template_part( 'partials/pageparts/news-linksimages'); ?>
<!-- Stripeset: Story Post News Links END -->

</main><!-- MAIN CONTENT END -->



<?php get_template_part( 'partials/misc/sponsors'); ?>

<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
