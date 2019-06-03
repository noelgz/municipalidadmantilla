<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package newsmagz
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="nf-404-page text-center">
				<div class="container">
						<h2 class="nf-404-title"><?php esc_html_e( '404', 'newsmagz' ); ?></h2>
						<h3 class="nf-404-subtitle"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'newsmagz' ); ?></h3>

						<p class="nf-404-content center-block"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'newsmagz' ); ?></p>

						<?php get_search_form(); ?>
				</div><!-- .container -->
		</div><!-- .nf-404-page -->
	</div><!-- .row -->
</div><!-- .container -->


<?php get_footer(); ?>
