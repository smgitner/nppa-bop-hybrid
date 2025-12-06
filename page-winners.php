<?php
/**
 * The template for displaying the winner page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bop_theme
 */

get_header();
?>

<style>
	.winners-display {
		font-size: 2rem;
		line-height: 1.6;
	}
	
	.winners-display * {
		font-size: inherit;
	}
	
	.winners-category-section {
		margin-bottom: 4rem;
		padding-bottom: 2rem;
		border-bottom: 3px solid #333;
	}
	
	.category-featured-image {
		width: 500px;
		max-width: 100%;
		margin: 0 auto 2rem;
	}
	
	.category-featured-image img {
		width: 100%;
		height: auto;
		display: block;
		border-radius: 4px;
	}
	
	.winners-category-heading {
		font-size: 3rem;
		font-weight: bold;
		margin: 0 0 1.5rem;
		padding-bottom: 0.5rem;
		text-align: center;
	}
	
	.winners-category-heading a {
		color: #333;
		text-decoration: none;
	}
	
	.winners-category-heading a:hover {
		color: #0066cc;
		text-decoration: underline;
	}
	
	.winners-place-group {
		margin-bottom: 2rem;
	}
	
	.winners-place-heading {
		font-size: 2.5rem;
		font-weight: bold;
		margin: 1.5rem 0 1rem;
		padding: 0;
		padding-bottom: 0.5rem;
		border-bottom: 1px solid #ccc;
		text-align: left;
	}
	
	.winners-list {
		margin-bottom: 3rem;
		margin-left: 0;
		padding-left: 0;
	}
	
	.winner-item {
		margin-bottom: 2rem;
		margin-left: 0;
		padding: 1.5rem;
		border: none;
		display: block;
	}
	
	.winner-image {
		width: 200px;
		margin-bottom: 1rem;
		display: block;
	}
	
	.winner-image img {
		width: 100%;
		height: auto;
		border-radius: 4px;
	}
	
	.winner-details {
		flex: 1;
	}
	
	.winner-category {
		font-size: 2.2rem;
		margin-bottom: 0.5rem;
	}
	
	.winner-name {
		font-size: 2rem;
		margin-bottom: 0.5rem;
	}
	
	.winner-name a {
		color: #0066cc;
		text-decoration: none;
	}
	
	.winner-name a:hover {
		text-decoration: underline;
	}
	
	.winner-publication {
		color: #666;
		font-weight: normal;
	}
	
	.winner-entry {
		font-size: 1.8rem;
		color: #555;
		margin-top: 0.5rem;
	}
	
	.winner-entry a {
		color: #0066cc;
		text-decoration: none;
	}
	
	.winner-entry a:hover {
		text-decoration: underline;
	}
	
	/* Responsive: stack on smaller screens */
	@media (max-width: 768px) {
		.winner-item {
			flex-direction: column;
		}
		
		.winner-image {
			min-width: 100%;
		}
	}
</style>

<main class="main-sitecontent">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<!-- Stripe: Top Text -->
			<section class="s-textarea">
				<div class="c-textarea w-container">
					<div class="d-textarea">
						<div class="entry-content" style="font-size: 2rem; line-height: 1.6;">
							<?php
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bop_theme' ),
									'after'  => '</div>',
								)
							);
							
							// Display all winners
							if ( function_exists( 'bop_display_all_winners' ) ) {
								echo bop_display_all_winners();
							}
							?>
						</div>
					</div>
				</div>
			</section>

		</article>

		<?php
	endwhile;
	?>

</main>

<?php
get_footer();
