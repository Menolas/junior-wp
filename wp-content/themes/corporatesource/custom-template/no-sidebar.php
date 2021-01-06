<?php
/*
Template Name: No Sidebar
*/
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
do_action( 'corporatesource_page_wrp_before', 'no-sidebar' );
?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
<?php
/**
* Hook - corporatesource_page_wrp_after.
*
* @hooked corporatesource_blog_main_end - 10
* @hooked corporatesource_blog_widgets - 20
* @hooked corporatesource_page_wrp_after - 30
*/
do_action( 'corporatesource_page_wrp_after', 'no-sidebar' );
?>	
<?php

get_footer();