<!-- Stripeset: Page Post Content START -->

<?php if ( have_rows( 'center_stripeset' ) ): ?>
	<?php while ( have_rows( 'center_stripeset' ) ) : the_row(); ?>

		<?php if ( get_row_layout() == 'center_text_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-text'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'center_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagesmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'featured_left' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-featuredleft'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'featured_right' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-featuredright'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'soliloquy_gallery_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-soliloquyjumbo'); ?>
			<!-- END -->


		<?php elseif ( get_row_layout() == 'large_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagelarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'jumbo_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-imagejumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videosmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_large' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videolarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-videojumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'photo_gallery_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-gallerysmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'photo_gallery_large' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-gallerylarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'three_image_group' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-trigroup'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'sidebyside_images_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-sidebysidesmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'sidebyside_images_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-content/stripe-sidebysidejumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'stripe_spacer' ) : ?>


		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>

<!-- Stripeset: Page Post Content END -->
