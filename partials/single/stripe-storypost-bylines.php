<!-- Stripeset: Story Page Bylines START -->
<div class="byline">
<?php the_field( 'author_byline_labels' ); ?> <?php the_author_posts_link(); ?>

<?php if ( have_rows( 'multiple_author_story' ) ): ?>
	<?php while ( have_rows( 'multiple_author_story' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'multi-author_field' ) : ?>
		 and <?php $author_byline_url = get_sub_field( 'author_byline_url' ); ?>
			<?php if ( $author_byline_url ) { ?>
				<a href="<?php echo $author_byline_url; ?>"><?php the_sub_field( 'author_byline_field' ); ?></a>
			<?php } ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>

<?php the_field( 'visuals_byline_labels' ); ?>


<?php $photog_byline_url = get_field( 'photog_byline_url' ); ?>
<?php if ( $photog_byline_url ) { ?>
	<a href="<?php echo $photog_byline_url; ?>"><?php the_field( 'visual_storyteller_byline' ); ?></a>
<?php } ?>
</div>
<!-- Stripeset: Story Page Bylines END -->