<!-- Stripeset: Page Post Lede Figure Start -->

<?php if ( have_rows( 'lede_figure_stripeset' ) ): ?>
	<?php while ( have_rows( 'lede_figure_stripeset' ) ) : the_row(); ?>

		<?php if ( get_row_layout() == 'center_text_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-text'); ?>
			<!-- END -->


		<?php elseif ( get_row_layout() == 'center_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagesmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'large_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagelarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'jumbo_image_stripe' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-imagejumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videosmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_large' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videolarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'video_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-videojumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'photo_gallery_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-gallerysmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'photo_gallery_large' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-gallerylarge'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'three_image_group' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-trigroup'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'sidebyside_images_small' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-sidebysidesmall'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'sidebyside_images_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-sidebysidejumbo'); ?>
			<!-- END -->

		<?php elseif ( get_row_layout() == 'photo_gallery_jumbo' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-galleryjumbo'); ?>
			<!-- END -->


		<?php elseif ( get_row_layout() == 'stripe_spacer' ) : ?>

			<!-- START -->
			<?php get_template_part( 'partials/stripesets-bop/page-post-ledefigure/stripe-spacer'); ?>
			<!-- END -->




		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
<!-- Stripeset: Page Post Lede Figure End -->
