<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Source
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('post-modern') ); ?>>

    <div class="post-modern__header">
      <h3 class="post-modern__title"><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?> </h3>
      
    <span class="author vcard">
	<?php
    echo sprintf(
    /* translators: %s: post author. */
    esc_html_x( 'by %s', 'post author', 'corporatesource' ),
    '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
    );
    ?>
    </span>
    </div>
    
<div class="post-modern__body">
  <figure>
  <?php
    /**
    * Hook - corporatesource_posts_blog_media.
    *
    * @hooked corporatesource_posts_blog_media - 10
    */
    do_action('corporatesource_posts_blog_media');
    ?>
  </figure>
    <div class="post-modern__media">
		<?php
			/**
			* Hook - corporatesource_blog_loop_content_type.
			*
			* @hooked corporatesource_blog_loop_content_type - 10
			*/
			do_action('corporatesource_blog_loop_content_type');
        ?>
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
