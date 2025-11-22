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

<!-- Light Gallery Start -->

<div class="cont">


<?php $poster = get_field( 'poster' ); ?>
<?php if ( $poster ) : ?>
<a id="dynamic" href>
  <img src="<?php echo esc_url( $poster['url'] ); ?>" alt="<?php echo esc_attr( $poster['alt'] ); ?>" />
</a>
<?php endif; ?>


</div>



<script type="text/javascript">

$('#dynamic').on('click', function(e) {

    e.preventDefault();
    $(this).lightGallery({
        dynamic: true,
        dynamicEl: [{

          <?php $gallery_images = get_field( 'gallery' ); ?>
          <?php if ( $gallery_images ) :  ?>
          	<?php foreach ( $gallery_images as $gallery_image ): ?>


            "src": '<?php echo esc_url( $gallery_image['sizes']['large'] ); ?>',
            'thumb': '<?php echo esc_url( $gallery_image['sizes']['thumbnail'] ); ?>',
            'subHtml': '<p><?php echo esc_html( $gallery_image['caption'] ); ?></p>'
        },{

        <?php endforeach; ?>
        <?php endif; ?>


      }]
    });
});
//]]></script>




<!-- Light Gallery End -->





</main><!-- MAIN CONTENT END -->





<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
