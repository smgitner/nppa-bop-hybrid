<?php
/**
 * Template Name: CSV List
 * Template Post Type: post, page
 *
 * This template displays a list of posts with featured images
 * imported from a CSV file. The CSV data should be imported
 * into this post using the CSV Import meta box.
 *
 * @package bop_theme
 */

get_header();
?>

<main class="main-sitecontent">
  <body class="body-page">

    <!-- Page Header -->
    <section class="s-page-header">
      <div class="c-page-header w-container">
        <h1 class="page-headline"><?php the_title(); ?></h1>
        <?php if ( get_field( 'top_text_field' ) ) : ?>
          <div class="page-dek">
            <?php the_field( 'top_text_field' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <!-- CSV List Display -->
    <article class="d-pagepost-stripe-sections">
      <section class="s-csv-list">
        <div class="c-csv-list w-container">
          <div class="d-csv-list">
            <?php
            // Display the CSV list with matching posts and featured images
            echo bop_display_csv_list();
            ?>
          </div>
        </div>
      </section>
    </article>

  </body>
</main>

<?php get_footer(); ?>

