<?php
/**
 * The template for displaying all single posts
 *
 * @package bop_theme_2026
 */

get_header(); ?>

<!-- TOP OF STORY POST PAGE -->


<main class="wrapper" id="mainContent"><!-- MAIN CONTENT START -->
    <article class="story-article-post">

      <div class="s-crumbs">
          <div class="c-crumbs w-container">
            <div class="breadcrumbs">
              <div class="crumbs">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                      yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                ?>
</div>
            </div>
          </div>
        </div>

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


<?php if ( have_rows( 'winning_images' ) ) : ?>
	<?php while ( have_rows( 'winning_images' ) ) : the_row(); ?>
		<?php if ( have_rows( 'winner_group_1' ) ) : ?>
			<?php while ( have_rows( 'winner_group_1' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( have_rows( 'winner_group_2' ) ) : ?>
			<?php while ( have_rows( 'winner_group_2' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( have_rows( 'winner_group_3' ) ) : ?>
			<?php while ( have_rows( 'winner_group_3' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( have_rows( 'winner_group_4' ) ) : ?>
			<?php while ( have_rows( 'winner_group_4' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( have_rows( 'winner_group_5' ) ) : ?>
			<?php while ( have_rows( 'winner_group_5' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( have_rows( 'winner_group_6' ) ) : ?>
			<?php while ( have_rows( 'winner_group_6' ) ) : the_row(); ?>
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
				<?php the_sub_field( 'entry_name' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'publication' ); ?>
				<?php $mug = get_sub_field( 'mug' ); ?>
				<?php if ( $mug ) : ?>
					<img src="<?php echo esc_url( $mug['url'] ); ?>" alt="<?php echo esc_attr( $mug['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'short_bio' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>






<!-- Light Gallery Start -->
<?php $poster = get_field( 'poster' ); ?>
<?php if ( $poster ) : ?>
<a id="dynamic" href><img src="<?php echo esc_url( $poster['url'] ); ?>" alt="<?php echo esc_attr( $poster['alt'] ); ?>" /></a>
<?php endif; ?>




<script type="text/javascript">//<![CDATA[
$('#dynamic').on('click', function(e) {

  e.preventDefault();
  $(this).lightGallery({
      dynamic: true,
      mode: 'lg-fade',
      download: false,
      enableDrag: true,
      enableSwipe: true,
      thumbnail: false,
      dynamicEl: [

          <?php $gallery_images = get_field( 'gallery' ); ?>
          <?php if ( $gallery_images ) :  ?>
          	<?php foreach ( $gallery_images as $gallery_image ): ?>

        {
            "src": '<?php echo esc_url( $gallery_image['sizes']['large'] ); ?>',
            'thumb': '<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>',
            'subHtml': '<p><?php echo esc_html( $gallery_image['caption'] ); ?></p>'
        },

        <?php endforeach; ?>
        <?php endif; ?>


      ]
    })

});
//]]></script>




<!-- Light Gallery End -->





</main><!-- MAIN CONTENT END -->





<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
