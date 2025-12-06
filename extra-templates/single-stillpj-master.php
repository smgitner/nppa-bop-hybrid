<?php
/**
 * The template for displaying all single still photojournalism posts
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
          </div>
        </div>
      </section>
<!-- SECTION HEADLINE DEK END -->

<!-- STILL PJ START -->

      <?php if ( have_rows( 'winning_images' ) ) : ?>
        <?php while ( have_rows( 'winning_images' ) ) : the_row(); ?>

          <!-- PLACE 1 START -->
          <div class="s-stillwinners-stills">
              <div class="c-winner-still w-container">
                <?php if ( have_rows( 'first_place_group' ) ) : ?>
                  <?php while ( have_rows( 'first_place_group' ) ) : the_row(); ?>
                <div class="d-place">
                  <div class="place"><?php the_sub_field( 'place' ); ?></div>
                </div>

            <div class="d-image">

                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
                <?php endif; ?>
            </div>


        <!-- PLACE 1 GALLERY START -->

        <!-- Light Gallery Start -->



<div class="d-image">

  <button id="dynamic" class="btn btn-primary btn-lg">Open Gallery</button>

        <a id="dynamic" href>
                    <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


</div>





        <script type="text/javascript">
        $(document).ready(function() {
        $('#dynamic').on('click', function(e) {

            e.preventDefault();
            $(this).lightGallery({
              dynamic:true,
              download: false,
              rotate: false,
              flipHorizontal: false,
              flipVertical: false,
              zoom: false,
              share: false,
              dynamicEl: [{

                  <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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
      });
        //]]></script>




        <!-- Light Gallery End -->

        <!-- PLACE 1 GALLERY END -->

        <div class="d-byline-caption">
          <div class="d-byline-item">
            <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
             <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
          <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
          <p class="d-caption"> <?php echo $image['caption']; // image caption ?></p>
        </div>
        </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <!-- PLACE 1 END -->

        <!-- PLACE 2 START -->
        <div class="s-stillwinners-stills">
            <div class="c-winner-still w-container">
              <?php if ( have_rows( 'second_place_group' ) ) : ?>
              			<?php while ( have_rows( 'second_place_group' ) ) : the_row(); ?>
              <div class="d-place">
                <div class="place"><?php the_sub_field( 'place' ); ?></div>
              </div>

          <div class="d-image">

              <?php $image = get_sub_field( 'image' ); ?>
              <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
              <?php endif; ?>
          </div>

      <!-- PLACE 2 GALLERY START -->
      <!-- Light Gallery Start -->

      <div class="d-image">

          <button id="dynamic2" class="btn btn-primary btn-lg">Open Gallery</button>

      <a id="dynamic2" href>
                          <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


      </div>



      <script type="text/javascript">

      $('#dynamic2').on('click', function(e) {

          e.preventDefault();
          $(this).lightGallery({
              dynamic: true,
			        download: false,
              rotate: false,
              flipHorizontal: false,
              flipVertical: false,
              zoom: false,
                share: false,
              dynamicEl: [{

                <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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
      <!-- PLACE 2 GALLERY END -->

      <div class="d-byline-caption">
        <div class="d-byline-item">
          <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
           <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
        <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
        <p class="d-caption"> <?php echo $image['caption']; // image caption ?></p>
      </div>
      </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <!-- PLACE 2 END -->

      <!-- PLACE 3 START -->
      <div class="s-stillwinners-stills">
          <div class="c-winner-still w-container">
            <?php if ( have_rows( 'third_place_group' ) ) : ?>
              <?php while ( have_rows( 'third_place_group' ) ) : the_row(); ?>
            <div class="d-place">
              <div class="place"><?php the_sub_field( 'place' ); ?></div>
            </div>

        <div class="d-image">

            <?php $image = get_sub_field( 'image' ); ?>
            <?php if ( $image ) : ?>
              <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
            <?php endif; ?>
        </div>

    <!-- PLACE 3 GALLERY START -->
    <!-- Light Gallery Start -->

    <div class="d-image">

        <button id="dynamic3" class="btn btn-primary btn-lg">Open Gallery</button>

    <a id="dynamic3" href>
                        <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


    </div>


    <script type="text/javascript">

    $('#dynamic3').on('click', function(e) {

        e.preventDefault();
        $(this).lightGallery({
            dynamic: true,
download: false,
rotate: false,
flipHorizontal: false,
flipVertical: false,
zoom: false,
  share: false,
            dynamicEl: [{

              <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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
    <!-- PLACE 3 GALLERY END -->

    <div class="d-byline-caption">
      <div class="d-byline-item">
        <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
         <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
      <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
      <p class="d-caption"> <?php echo $image['caption']; // image caption ?></p>
    </div>
    </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <!-- PLACE 3 END -->

    <!-- PLACE 4 START -->
    <div class="s-stillwinners-stills">
        <div class="c-winner-still w-container">
          <?php if ( have_rows( 'hm_one_place_group' ) ) : ?>
              <?php while ( have_rows( 'hm_one_place_group' ) ) : the_row(); ?>
          <div class="d-place">
            <div class="place"><?php the_sub_field( 'place' ); ?></div>
          </div>

      <div class="d-image">

          <?php $image = get_sub_field( 'image' ); ?>
          <?php if ( $image ) : ?>
            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
          <?php endif; ?>
      </div>

  <!-- PLACE 4 GALLERY START -->
  <!-- Light Gallery Start -->

  <div class="d-image">

  <a id="dynamic4" href>
                      <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


  </div>



  <script type="text/javascript">

  $('#dynamic4').on('click', function(e) {

      e.preventDefault();
      $(this).lightGallery({
          dynamic: true,
download: false,
rotate: false,
flipHorizontal: false,
flipVertical: false,
zoom: false,
  share: false,
          dynamicEl: [{

            <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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
  <!-- PLACE 4 GALLERY END -->

  <div class="d-byline-caption">
    <div class="d-byline-item">
      <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
       <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
    <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
    <p class="d-caption"> <?php echo $image['caption']; // image caption ?></p>
  </div>
  </div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  <!-- PLACE 4 END -->

  <!-- PLACE 5 START -->
    <div class="s-stillwinners-stills">
        <div class="c-winner-still w-container">
          <?php if ( have_rows( 'hm_two_place_group' ) ) : ?>
  <?php while ( have_rows( 'hm_two_place_group' ) ) : the_row(); ?>
          <div class="d-place">
            <div class="place"><?php the_sub_field( 'place' ); ?></div>
          </div>
      <div class="d-image">
          <?php $image = get_sub_field( 'image' ); ?>
          <?php if ( $image ) : ?>
            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
          <?php endif; ?>
      </div>

  <!-- PLACE 5 GALLERY START -->
  <!-- Light Gallery Start -->

  <div class="d-image">

  <a id="dynamic5" href>
                      <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


  </div>



  <script type="text/javascript">

  $('#dynamic5').on('click', function(e) {

      e.preventDefault();
      $(this).lightGallery({
          dynamic: true,
download: false,
rotate: false,
flipHorizontal: false,
flipVertical: false,
zoom: false,
  share: false,
          dynamicEl: [{

            <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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




  <!-- Light Gallery End --><!-- PLACE 5 GALLERY END -->

  <div class="d-byline-caption">
    <div class="d-byline-item">
      <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
       <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
    <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
    <p class="d-caption"><?php echo $image['caption']; // image caption ?></p>
  </div>
  </div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  <!-- PLACE 5 END -->

  <!-- PLACE 6 START -->
<div class="s-stillwinners-stills">
    <div class="c-winner-still w-container">
      <?php if ( have_rows( 'hm_three_place_group' ) ) : ?>
          <?php while ( have_rows( 'hm_three_place_group' ) ) : the_row(); ?>
      <div class="d-place">
        <div class="place"><?php the_sub_field( 'place' ); ?></div>
      </div>

    <div class="d-image">

      <?php $image = get_sub_field( 'image' ); ?>
      <?php if ( $image ) : ?>
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_sub_field( 'place' ); ?>" />
      <?php endif; ?>
  </div>

<!-- PLACE 6 GALLERY START -->
<!-- Light Gallery Start -->

<div class="d-image">

<a id="dynamic6" href>
                    <img <?php awesome_acf_responsive_image(get_sub_field( 'poster' ),'large','1024px'); ?>  alt="<?php the_sub_field( 'place' ); ?>" /></a>


</div>

<script type="text/javascript">

$('#dynamic6').on('click', function(e) {

    e.preventDefault();
    $(this).lightGallery({
        dynamic: true,
download: false,
rotate: false,
flipHorizontal: false,
flipVertical: false,
zoom: false,
  share: false,
        dynamicEl: [{

          <?php $gallery_images = get_sub_field( 'gallery' ); ?>
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
<!-- PLACE 6 GALLERY END -->

<div class="d-byline-caption">
  <div class="d-byline-item">
    <div class="d-byline-photog"><span class="photog"><?php the_sub_field( 'first_name' ); ?>
     <?php the_sub_field( 'last_name' ); ?> </span><span class="publication"><?php the_sub_field( 'publication' ); ?></span></div>
  <div class="d-byline-title"><span class="entrytitle"><?php the_sub_field( 'entry_name' ); ?></span></div>
  <p class="d-caption"> <?php echo $image['caption']; // image caption ?></p>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<!-- PLACE 6 END -->


<!-- CLOSING Group WHILEif Statement Below -->
      <?php endwhile; ?>
    <?php endif; ?>



</main><!-- MAIN CONTENT END -->


<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
