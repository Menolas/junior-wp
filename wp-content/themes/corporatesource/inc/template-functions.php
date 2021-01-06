<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Corporate_Source
 */

if ( ! function_exists( 'corporatesource_walker_comment' ) ) : 
	/**
	 * Implement Custom Comment template.
	 *
	 * @since 1.0.0
	 *
	 * @param $comment, $args, $depth
	 * @return $html
	 */
	  
	function corporatesource_walker_comment($comment, $args, $depth) {
		
		
		?>
            <div class="media">
                <div class="media-left">
                   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 70 ); ?>
                </div>
                <div class="media-body">
                    <div class="media-content last">
                        <h4 class="media-heading"><?php echo get_comment_author_link();?><span> <?php
							/* translators: 1: date, 2: time */
							printf( esc_html__('%1$s at %2$s', 'corporatesource' ), get_comment_date(),  get_comment_time() );
							 ?></span></h4>
                        <p>  <?php comment_text(); ?></p>
                        
                         <?php 
					$args ['reply_text'] =  esc_html__( 'Reply', 'corporatesource' );
                    comment_reply_link( array_merge( $args, array(  'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
            </div>
		<?php
	}
	
	function corporatesource_replace_reply_link_class($class){
		$class = str_replace("class='comment-reply-link", "class='reply", $class);
		return $class;
	}
	add_filter('comment_reply_link', 'corporatesource_replace_reply_link_class');
endif;






if ( ! function_exists( 'corporatesource_hero_block_before' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_hero_block_before() {
		
	$header_image = get_header_image();
	if( $header_image !="" ):
		$bg_src = 'background:url('.esc_url( $header_image ).') no-repeat center center; ';
	else:
		$bg_src = '';	
	endif;
	?>
	<section id="hero_block" style=" <?php echo esc_attr($bg_src);?>  background-size:cover;"> 
    <div class="header_center">		
	<?php
	}

endif;
add_action( 'corporatesource_hero_block', 'corporatesource_hero_block_before', 10 );

if ( ! function_exists( 'corporatesource_title_h1_text' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_title_h1_text() {
		
		if ( is_home() ) {
				echo '<h1 class="page-title-text">';
				echo bloginfo( 'name' );
				echo '</h1>';
				echo '<p class="subtitle">';
				echo esc_html(get_bloginfo( 'description', 'display' ));
				echo '</p>';
		}else if ( function_exists('is_shop') && is_shop() ){
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				echo '<h1 class="page-title-text">';
				echo esc_html( woocommerce_page_title() );
				echo '</h1>';
				
			}
		}else if( function_exists('is_product_category') && is_product_category() ){
			echo '<h1 class="page-title-text">';
			echo esc_html( woocommerce_page_title() );
			echo '</h1>';
			echo '<div class="white_text">';
			do_action( 'woocommerce_archive_description' );
			echo '</div>';
			
		}elseif ( is_singular() ) {
			echo '<h1 class="page-title-text">';
			echo single_post_title( '', false );
			echo '</h1>';
		} elseif ( is_archive() ) {
			the_archive_title( '<h1 class="page-title-text">', '</h1>' );
		} elseif ( is_search() ) {
			echo '<h1 class="title">';
			printf( /* translators:straing */ esc_html__( 'Search Results for: %s', 'corporatesource' ),  get_search_query() );
			echo '</h1>';
		} 
		
		  if ( function_exists('is_product') && is_product() ){
			do_action( 'corporatesource_single_product_summary' );
		  }

		

	}

endif;
add_action( 'corporatesource_hero_block', 'corporatesource_title_h1_text', 20 );



if ( ! function_exists( 'corporatesource_sub_title' ) ) :

	/**
	 * Add Sub Title title in custom header.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_sub_title() {
		
		echo '<div class="subtitle">';

		if ( is_archive() ) {
			?>
              <?php the_archive_description( '<div class="subtitle">', '</div>' );?>
            <?php
		}else{
			?>
             <?php if ( function_exists( 'the_subtitle' ) ) { ?>
                 <div class="subtitle"><?php  the_subtitle() ;?></div>  
              <?php }?>
             
            <?php
			
		}

		echo '</div>';

	}

endif;
add_action( 'corporatesource_hero_block', 'corporatesource_sub_title',30 );


if ( ! function_exists( 'corporatesource_hero_block_after' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function corporatesource_hero_block_after() {
	?>
	</div>
	</section>  	
	<?php
	}

endif;
add_action( 'corporatesource_hero_block', 'corporatesource_hero_block_after', 40 );
