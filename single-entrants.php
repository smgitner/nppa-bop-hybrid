<?php
/**
 * The template for displaying all single opvi posts
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


<?php the_field( 'first_name' ); ?>
<?php the_field( 'last_name' ); ?>
<?php the_field( 'publication' ); ?>
<?php if ( get_field( 'headshot' ) ) : ?>
<img src="<?php the_field( 'headshot' ); ?>" />
<?php endif ?>
<?php the_field( 'short_bio' ); ?>
<?php if ( have_rows( 'winning_entry' ) ) : ?>
<?php while ( have_rows( 'winning_entry' ) ) : the_row(); ?>
<?php $winning_entry = get_sub_field( 'winning_entry' ); ?>
<?php if ( $winning_entry ) : ?>
  <?php foreach ( $winning_entry as $post ) : ?>
    <?php setup_postdata ( $post ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>














</main><!-- MAIN CONTENT END -->




<!-- BOTTOM OF STORY POST PAGE -->
<?php get_template_part( 'partials/footer/wrapper-footer'); ?>



<?php get_footer(); ?>
