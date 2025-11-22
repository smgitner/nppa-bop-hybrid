<?php /* Template Name: Still Winners
         Template Post Type: post, page,
*/
get_header(); ?>

<!-- TOP OF STORY PAGE -->
<main id="mainContent" class="wrapper">


<!-- Story Page (Global Basics) START -->

  <div id="page-container" class="wrapper">
    <section id="main-headline" class="section-headline">
      <div class="container-header story-container w-container">
        <div class="header-div">
          <div class="header-section-meta"><?php the_category(' '); ?></div>
          <!-- HEADLINE START -->
          <h1 class="post-headline-desktop w-hidden-small w-hidden-tiny"><?php the_title(''); ?></h1>
          <h2 class="post-headline-mobile w-hidden-main w-hidden-medium"><?php the_field( 'mobile_title_field' ); ?></h2>
          <!-- HEADLINE END-->


<!-- Story Page (Global Basics) END -->

    <div class="section-storytext-flexbox">
      <div class="stripeset-container-flexbox w-container">

<!--  SOCIAL STORY PAGE TEMPLATE START -->
<!-- Left Column Start -->

            <div class="socialthis-storypage">
             <a class="w-inline-block" href="https://twitter.com/newshouse">
                            <img class="tw-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/twitter-circle.png">
                        </a>
              <a class="w-inline-block" href="https://www.facebook.com/theNewsHouse/">
                            <img class="fb-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/facebook-circle.png">
                        </a>
          </div>

<!-- Left Column END -->
<!-- SOCIAL STORY PAGE TEMPLATE END -->

<?php if ( have_rows( 'winning_images' ) ) : ?>
<?php while ( have_rows( 'winning_images' ) ) : the_row(); ?>
<?php if ( have_rows( 'first_place_group' ) ) : ?>
<?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'second_place_group' ) ) : ?>
<?php while ( have_rows( 'second_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'third_place_group' ) ) : ?>
<?php while ( have_rows( 'third_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'hm_one_place_group' ) ) : ?>
<?php while ( have_rows( 'hm_one_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'hm_two_place_group' ) ) : ?>
<?php while ( have_rows( 'hm_two_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php if ( have_rows( 'hm_three_place_group' ) ) : ?>
<?php while ( have_rows( 'hm_three_place_group' ) ) : the_row(); ?>
<?php $image = get_sub_field( 'image' ); ?>
<?php if ( $image ) : ?>
<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>
<?php $gallery_images = get_sub_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
  <a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
    <img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
  </a>
  <p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
<?php endforeach; ?>
<?php endif; ?>
<?php the_sub_field( 'place' ); ?>
<?php the_sub_field( 'first_name' ); ?>
<?php the_sub_field( 'last_name' ); ?>
<?php the_sub_field( 'publication' ); ?>
<?php the_sub_field( 'entry_name' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<!-- BASIC CONTENT AREA START -->
<!-- Center Column Start -->

<div class="s-stillwinners">
<div class="c-winner w-container">
<?php if ( have_rows( 'winning_images' ) ) : ?>
	<?php while ( have_rows( 'winning_images' ) ) : the_row(); ?>
    <?php if ( have_rows( 'first_place_group' ) ) : ?>
			<?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
<div class="d-image">
        <?php $image = get_sub_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
      </div>
      <div class="d-image">
				<?php $gallery_images = get_sub_field( 'gallery' ); ?>
				<?php if ( $gallery_images ) :  ?>
					<?php foreach ( $gallery_images as $gallery_image ): ?>
						<a href="<?php echo esc_url( $gallery_image['url'] ); ?>">
							<img src="<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
						</a>
						<p><?php echo esc_html( $gallery_image['caption'] ); ?></p>
					<?php endforeach; ?>
				<?php endif; ?>
        </div>
        <div class="d-byline-caption">
          <div class="d-byline"><?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?>/<?php the_sub_field( 'publication' ); ?></div>
          <p class="d-caption"><span class="text-span"><?php the_sub_field( 'place' ); ?>:</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>





			<?php endwhile; ?>
		<?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>

<img src="images/image3.jpg" loading="lazy" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 940px" srcset="images/image3-p-500.jpeg 500w, images/image3-p-800.jpeg 800w, images/image3-p-1080.jpeg 1080w, images/image3-p-1600.jpeg 1600w, images/image3.jpg 2000w" alt=""></div>
<div class="d-byline-caption">
<div class="d-byline">John Smith/The Publication</div>
<p class="d-caption"><span class="text-span">First Place:</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
<div class="d-byline-teams">Team Entry - John Smith, Bob Smith, Mike Smith - The New York Times</div>
</div>
</div>
</div>

<!-- Center Column END -->
<!-- BASIC CONTENT AREA END -->


<!-- Right Column START -->
        </div>
        <div class="storypage-empty-spacer w-hidden-medium w-hidden-small w-hidden-tiny">
        </div>
<!-- Right Column END -->

       <!-- END OF PAGE -->
      </div>
    </div> </div> </div> </div> </div> </div>





</main>
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>

<?php get_footer(); ?>
