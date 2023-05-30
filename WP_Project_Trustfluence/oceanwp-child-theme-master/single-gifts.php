<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>



				<?php
				

					// Start loop.
					while ( have_posts() ) :
						the_post();

						echo do_shortcode('[reviews_form]');

					endwhile;

			
				?>


<?php get_footer(); ?>
