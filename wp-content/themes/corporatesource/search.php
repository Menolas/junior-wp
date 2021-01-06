<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Corporate_Source
 */

get_header(); ?>
<?php
/**
* Hook - corporatesource_page_wrp_before.
*
* @hooked corporatesource_page_wrp_before - 11
*/
do_action( 'corporatesource_page_wrp_before' );
?>

		<?php
		if ( have_posts() ) : ?>

		

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			/**
			* Hook - corporatesource_posts_loop_navigation.
			*
			* @hooked corporatesource_posts_loop_navigation - 10
			*/
			do_action('corporatesource_posts_loop_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<?php
/**
* Hook - corporatesource_page_wrp_after.
*
* @hooked corporatesource_blog_main_end - 10
* @hooked corporatesource_blog_widgets - 20
* @hooked corporatesource_page_wrp_after - 30
*/
do_action( 'corporatesource_page_wrp_after' );
?>	
<?php

get_footer();
