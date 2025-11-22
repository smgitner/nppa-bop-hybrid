<?php /* Template Name: HTML ONLY / NO FORMATTING
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
          
<!-- BASIC CONTENT AREA START -->
<!-- Center Column Start -->

        <div class="main-storytext-areas-div">
          <div class="stripe-storytext-wysiwyg">
            <p class="paragraph-10"><?php the_field( 'no_wysiwyg_content_field' ); ?>
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