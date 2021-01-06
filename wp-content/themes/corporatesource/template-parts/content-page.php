<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Source
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('post-modern') ); ?>>
	


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
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporatesource' ),
				'after'  => '</div>',
			) );
        ?>
    </div>
</div>



	

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'corporatesource' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
