<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
do_action( 'corporatesource_page_wrp_before', 'full-container' );
?>



<article id="post-<?php the_ID(); ?>" <?php post_class( array('post-modern') ); ?>>

   
    
<div class="post-modern__body">
 
    <div class="post-modern__media" style="text-align:center;">
    
    
    	<img src="<?php echo esc_url( get_theme_file_uri( '/images/page-404-icon.png' ) );?>" alt="" title="" />
		
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'corporatesource' ); ?></h1>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'corporatesource' ); ?></p>
			<?php
				get_search_form();?>
    </div>
</div>


    

</article>


<?php
    /**
    * Hook - corporatesource_page_wrp_after.
    *
	* @hooked corporatesource_blog_main_end - 10
	* @hooked corporatesource_blog_widgets - 20
	* @hooked corporatesource_page_wrp_after - 30
    */
    do_action( 'corporatesource_page_wrp_after', 'full-container'  );
    ?>	
<?php
get_footer();
