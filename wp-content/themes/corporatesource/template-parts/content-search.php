<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Source
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( array('post-modern') ); ?>>

    <div class="post-modern__header">
      <h3 class="post-modern__title"><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?> </h3>
    </div>
    
<div class="post-modern__body">
 
    <div class="post-modern__media">
		<?php the_excerpt(); ?>
    </div>
</div>

<?php
/**
* Hook - corporatesource_blog_loop_footer.
*
* @hooked corporatesource_blog_loop_footer - 10
*/
do_action('corporatesource_blog_loop_footer');
?>
    

</article>

<!-- #post-<?php the_ID(); ?> -->