<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bop_theme
 */

get_header();
?>

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



<!-- Left Column END -->
<!-- SOCIAL STORY PAGE TEMPLATE END -->

<!-- BASIC CONTENT AREA START -->
<!-- Center Column Start -->

        <div class="main-storytext-areas-div">
          <div class="stripe-storytext-wysiwyg">
			<p class="paragraph-10"><?php the_field( 'no_wysiwyg_content_field' ); ?>


					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bop_theme' ); ?></h1>


				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bop_theme' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

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


<?php get_footer(); ?>
