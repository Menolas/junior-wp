<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        while ( have_posts() ) : the_post();
        
            get_template_part( 'template-parts/single/content', get_post_type() );
        
		
            do_action('corporatesource_single_post_navigation');
			        
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
    do_action( 'corporatesource_page_wrp_after' );
    ?>		
<?php

get_footer();

