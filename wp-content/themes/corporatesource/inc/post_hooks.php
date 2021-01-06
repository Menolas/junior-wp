<?php
/**
 * Functions hooked to post page.
 *
 * @package corporatesource
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 if ( ! function_exists( 'corporatesource_posts_formats_thumbnail' ) ) :

	/**
	 * Post formats thumbnail.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_formats_thumbnail() {
	?>
		<?php 
		$formats = get_post_format(get_the_ID());
		if ( has_post_thumbnail() ) :
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
		?>
           <div class="blog-media <?php echo esc_attr( $formats );?>">
           		<?php if ( is_singular() ) :?>
               		 <a href="<?php echo esc_url( $post_thumbnail_url );?>" class="image-popup">
                <?php else: ?>
                	<a href="<?php echo esc_url( get_permalink() );?>" class="image-link">
                <?php endif;?>
                <span class="style_1"><?php the_post_thumbnail('full');?></span>
                </a>
            </div>
         
         
        <?php endif;?>  
	<?php
	}

endif;
add_action( 'corporatesource_posts_formats_thumbnail', 'corporatesource_posts_formats_thumbnail' );


if ( ! function_exists( 'corporatesource_posts_formats_video' ) ) :

	/**
	 * Post Formats Video.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_formats_video() {
	
		$content = apply_filters( 'the_content', get_the_content(get_the_ID()) );
		$video = false;
		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}
		
		
			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) :
				foreach ( $video as $video_html ) {
					echo '<div class="blog-media"><div class="entry-video embed-responsive embed-responsive-16by9">';
						echo $video_html;
					echo '</div></div>';
				}
			else: 
				do_action('corporatesource_posts_formats_thumbnail');	
			endif;
		
		
	 }

endif;
add_action( 'corporatesource_posts_formats_video', 'corporatesource_posts_formats_video' ); 


if ( ! function_exists( 'corporatesource_posts_formats_audio' ) ) :

	/**
	 * Post Formats audio.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_formats_audio() {
		$content = apply_filters( 'the_content', get_the_content() );
		$audio = false;
	
		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		}
	
		
	
		// If not a single post, highlight the audio file.
		if ( ! empty( $audio ) ) :
			foreach ( $audio as $audio_html ) {
				echo '<div class="blog-media">';
					echo $audio_html;
				echo '</div>';
			}
		else: 
			do_action('corporatesource_posts_formats_video');	
		endif;
	
		
	 }

endif;
add_action( 'corporatesource_posts_formats_audio', 'corporatesource_posts_formats_audio' ); 

add_filter( 'use_default_gallery_style', '__return_false' );


if ( ! function_exists( 'corporatesource_posts_formats_gallery' ) ) :

	/**
	 * Post Formats gallery.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_formats_gallery() {
		
		if ( get_post_gallery() ) :
			echo '<div class="corporatesource-carousel">';
				echo get_post_gallery();
			echo '<div class="clearfix"></div></div>';
		else: 
			do_action('corporatesource_posts_formats_thumbnail');	
		endif;	
	
	 }

endif;
add_action( 'corporatesource_posts_formats_gallery', 'corporatesource_posts_formats_gallery' ); 




if ( ! function_exists( 'corporatesource_posts_formats_header' ) ) :

	/**
	 * Post corporatesource_posts_blog_media
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_blog_media() {
		$formats = get_post_format(get_the_ID());
	
		switch ( $formats ) {
			default:
				
				do_action('corporatesource_posts_formats_thumbnail');
			break;
			case 'gallery':
				do_action('corporatesource_posts_formats_gallery');
			break;
			case 'audio':
				do_action('corporatesource_posts_formats_audio');
			break;
			case 'video':
				do_action('corporatesource_posts_formats_video');
			break;
		} 
		
	 }

endif;
add_action( 'corporatesource_posts_blog_media', 'corporatesource_posts_blog_media' ); 






if ( ! function_exists( 'corporatesource_posts_loop_navigation' ) ) :

	/**
	 * Post Posts Loop Navigation
	 *
	 * @since 1.0.0
	 */
	function corporatesource_posts_loop_navigation() {
		
		$nav = corporatesource_get_option( 'pagination_type' );
		
		if( $nav == 'default' ):
			$args = array (
			   'prev_text'          => '<i class="fa fa-long-arrow-left"></i>'. esc_html__('Previous Posts','corporatesource'),
			   'next_text'          =>  esc_html__('Next Posts','corporatesource').'<i class="fa fa-long-arrow-right"></i>',
			);
			echo '<div class="pagination-custom">';
			the_posts_navigation( $args );
			echo '</div>';
		else:
		
			echo '<div class="pagination-custom">';
			the_posts_pagination( array(
				'format' => '/page/%#%',
				'type' => 'list',
				'mid_size' => 2,
				'prev_text' => esc_html__( 'Previous', 'corporatesource' ),
				'next_text' => esc_html__( 'Next', 'corporatesource' ),
				'screen_reader_text' => esc_html__( '&nbsp;', 'corporatesource' ),
			) );
		echo '</div>';
		endif;
	}

endif;
add_action( 'corporatesource_posts_loop_navigation', 'corporatesource_posts_loop_navigation', 11 ); 




if ( ! function_exists( 'corporatesource_single_post_navigation' ) ) :

	/**
	 * Post Single Posts Navigation 
	 *
	 * @since 1.0.0
	 */
	function corporatesource_single_post_navigation( ) {
		
		$prevPost = get_previous_post(true);
		$nextPost = get_next_post(true);
		if( $prevPost || $nextPost) :
		echo '<div class="container single-prev-next"><div class="row ">';
		if( $prevPost ) :
			echo '<div class="col-md-6 col-sm-6 ">';
				$prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(40,40) );
				echo '<div class="col-sm-2">';
				previous_post_link('%link',$prevthumbnail , TRUE); 
				echo '</div>';
				echo '<div class="text col-sm-10"><h6>'.esc_html__('Previous Article','corporatesource').'</h6>';
					previous_post_link('%link',"<span>%title</span>", TRUE); 
				echo '</div>';
				
			echo '</div>';
			
		endif;
		
		
		if( $nextPost ) : 
			echo '<div class="col-md-6 col-sm-6  text-right">';
				$nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(40,40) );
				
				echo '<div class="text col-sm-10"><h6>'.esc_html__('Next Article','corporatesource').'</h6>';
					next_post_link('%link',"<span>%title</span>", TRUE);
				echo '</div>';
				
				echo '<div class="col-sm-2 text-right">';
				next_post_link('%link',$nextthumbnail, TRUE);
				echo '</div>';
				
			echo '</div>';
			
		endif;
		echo '</div></div>';
		
		endif;
	} 

endif;
add_action( 'corporatesource_single_post_navigation', 'corporatesource_single_post_navigation', 10 ); 


if( ! function_exists( 'corporatesource_blog_loop_content_type' ) && ! is_admin() ) :

    /**
    
     *
     * @since  Blog Expert 1.0.0
     *
     * @param null
     * @return int
     */
    function corporatesource_blog_loop_content_type( $length ){
       $type = corporatesource_get_option( 'blog_loop_content_type' );
  		
        if ( $type === 'excerpt-only' ) {
        	the_excerpt();
        }else{
			$content = preg_replace("/<embed[^>]+>/i", "", get_the_content() , 1);
			echo strip_shortcodes( $content );
		}

        return $length;

    }

endif; 
add_action( 'corporatesource_blog_loop_content_type', 'corporatesource_blog_loop_content_type', 10 ); 



if( ! function_exists( 'corporatesource_blog_loop_footer' ) ) :

    /**
     * corporatesource_blog_loop_footer
     *
     * @return html
     */
    function corporatesource_blog_loop_footer(){
        $formats = get_post_format(get_the_ID());
		
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		if ( get_the_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'corporatesource' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		?>
        <div class="post-modern__footer">
          <ul class="post-modern__meta">
            <li><i class="fa fa-clock-o" aria-hidden="true"></i>
              <?php echo $posted_on;?>
            </li>
            
            <?php
			// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'corporatesource' ) );
			if ( $categories_list ) {
				
				printf( ' <li><i class="fa fa-folder-o" aria-hidden="true"></i>' .$categories_list . ' </li>' ); // WPCS: XSS OK.
			}

		}
		?> 
        
			<?php
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<li><span class="comments-link"><i class="fa fa-comment-o" aria-hidden="true"></i>';
            comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'corporatesource' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
            );
            echo '</span></li>';
            }
            ?>
          </ul>
          <div class="post-modern__label">
            <a href="<?php echo  esc_url( get_permalink() ) ;?>">
           	 <span class="read_more_icon dashicons <?php echo esc_attr( $formats );?>"></span>
            </a>
          </div>
        </div>
        <?php
       

    }

endif; 
add_action( 'corporatesource_blog_loop_footer', 'corporatesource_blog_loop_footer', 10 );



if( ! function_exists( 'corporatesource_read_more_link' ) ) :
	/**
	* Adds custom Read More.
	*
	*/
	function corporatesource_read_more_link() {
		return '<div class="clearfix"><br/><br/><div class="blog-bottom text-center"><a class="btn btn-primary" href="' . esc_url( get_permalink() ) . '">'.esc_html__( 'Continue reading', 'corporatesource' ).'<i class="fa fa-long-arrow-right"></i></a></div></div>';
	}
	add_filter( 'the_content_more_link', 'corporatesource_read_more_link' );
endif;



if ( ! function_exists( 'corporatesource_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function corporatesource_entry_footer() {
		// Hide category and tag text for pages.
		
	
		$tags_list = get_the_tag_list();
			
		if( $tags_list || is_admin() ):
		echo '<div class="tags_wrp">';	
		if ( 'post' === get_post_type() && $tags_list ) {
		
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'corporatesource' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		
			
		}

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
		echo '</div>';
	  endif;
	}
endif;

add_action( 'corporatesource_entry_footer', 'corporatesource_entry_footer', 10 );