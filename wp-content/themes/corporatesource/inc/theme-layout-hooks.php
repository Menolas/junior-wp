<?php
/**
 * Functions hooked to custom hook.
 *
 * @package corporatesource
 */

/*-----------------------------------------
* HEADER
*----------------------------------------*/
if( !function_exists('corporatesource_header_start') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_header_start(){
	?>
    <header class="page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-body-class="rd-navbar-absolute-linked swiper-jumbotron-mod" data-stick-up-clone="false" data-md-stick-up-offset="72px" data-lg-stick-up-offset="72px">
        <div class="rd-navbar-inner">
    <?php
	}
}
add_action( 'corporatesource_header_container', 'corporatesource_header_start', 10 );


if( !function_exists('corporatesource_header_brand') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_header_brand(){
	?>
    <div class="rd-navbar-panel">
        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
        <!-- RD Navbar Brand-->
        <div class="rd-navbar-brand">
            <?php
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            }else{
            ?>	
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            <?php }?>  
        </div>
    </div>
    <?php
	}
}
add_action( 'corporatesource_header_container', 'corporatesource_header_brand', 20 );


if( !function_exists('corporatesource_header_nav_search_bar') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_header_nav_search_bar(){
	?>
    <div class="rd-navbar-nav-wrap"> 
        <div class="rd-navbar-nav-wrap-bg"></div>
        
        
        <?php
		do_action('corporatesource_header_custom_search');
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 3,
            'menu_class'        => 'rd-navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    
    </div>
    <?php
	}
}
add_action( 'corporatesource_header_container', 'corporatesource_header_nav_search_bar', 30 );


if( !function_exists('corporatesource_header_custom_search') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_header_custom_search(){	
	?>
    
    <div class="rd-navbar-nav-wrap-inner">
          
          <!-- RD Search-->
          <div class="rd-navbar-search rd-navbar-search_toggled rd-navbar-search_not-collapsable">
            <div class="rd-navbar-search-inner"></div>
            
                 <form role="search" method="get" class="search-form rd-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="form-wrap">
                     <input type="search" class="search-field form-input" id="rd-navbar-search-form-input" placeholder="<?php echo esc_attr__( 'Search...', 'corporatesource' );?>" value="" name="s" title="<?php echo esc_attr__( 'Search for:', 'corporatesource' );?>" />
                    </div>
                    
                    <button class="rd-search__submit search-submit" type="submit"></button>
                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                </form>
           
          </div>
        </div>
        
        
  
    <?php
	}
}

add_action( 'corporatesource_header_custom_search', 'corporatesource_header_custom_search', 10 );

if( !function_exists('corporatesource_header_end') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_header_end(){
	?>
       </div><!--.rd-navbar rd-navbar-transparent-->
      </nav>
    </div><!--.rd-navbar-inner-->
    </header>
    <?php
	}
}
add_action( 'corporatesource_header_container', 'corporatesource_header_end', 40 );


/*-----------------------------------------
* PAGE LAYOUT
*----------------------------------------*/
if( !function_exists('corporatesource_page_wrp_before') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_page_wrp_before( $layout ='' ){
	 if( $layout == '' ){
		 if( is_page() ){
			  $layout = corporatesource_get_option('page_layout');
		 }else{
			 $layout = corporatesource_get_option('blog_layout');
		 }
	 }
	?>
    <div id="primary" class="content-area container">
      <div class="row">
      	<?php if( $layout == 'full-container' ): ?>
        <main id="main" class="site-main col-md-12">
        <?php elseif( $layout == 'no-sidebar' ): ?>
        <main id="main" class="site-main col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
        <?php else: ?>
		<main id="main" class="site-main col-md-8 col-sm-8 <?php echo esc_attr($layout);?>">
        <?php endif;?>
    <?php
	}
}
add_action( 'corporatesource_page_wrp_before', 'corporatesource_page_wrp_before', 10 );


if( !function_exists('corporatesource_blog_main_end') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_blog_main_end(){
	?>
  	 </main><!-- #main -->
    <?php
	}
}
add_action( 'corporatesource_page_wrp_after', 'corporatesource_blog_main_end', 10 );


if( !function_exists('corporatesource_blog_widgets') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_blog_widgets( $layout = '' ){
	 if( $layout == '' ){
		 if( is_page() ){
			  $layout = corporatesource_get_option('page_layout');
		 }else{
			 $layout = corporatesource_get_option('blog_layout');
		 }
	 }
		
	if( $layout == 'full-container' || $layout == 'no-sidebar'  ) { return false; }
	?>
    <div class="col-md-4 col-sm-4 <?php echo esc_attr($layout);?>">
    	<?php get_sidebar();?>
    </div>	
    <?php
	}
}
add_action( 'corporatesource_page_wrp_after', 'corporatesource_blog_widgets', 20 );

if( !function_exists('corporatesource_page_wrp_after') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_page_wrp_after(){
	?><div class="clearfix"></div>
    	</div><!-- .row -->
	</div><!-- #primary -->
    <?php
	}
}
add_action( 'corporatesource_page_wrp_after', 'corporatesource_page_wrp_after', 30 );



/*-----------------------------------------
* FOOTER
*----------------------------------------*/


if( !function_exists('corporatesource_footer') ){
	/**
	*
	* @since 1.0.0
	*/
	function corporatesource_footer(){
	?>
    
    <?php if ( is_active_sidebar( 'footer' ) ) { ?>
    <footer class="footer-main container-fluid no-padding">
        <!-- Container -->
        
        <div class="container">
         	<div class="row d-flex">
           <?php dynamic_sidebar( 'footer' ); ?>
           </div>
        </div><!-- Container -->
    </footer>
    <?php }?>
    
    <div class="bottom-footer  ">
		<!-- Container -->
		<div class="container">
       
            <?php if ( corporatesource_get_option('mailing_section_show') == 1 && count( corporatesource_get_option('mailing_section_content') ) > 0 )  : ?>
			<div class="row">
			 <div class="address-box">	
             
             
                <?php $i=0; foreach ( corporatesource_get_option('mailing_section_content') as $key => $text): $i++; ?>	
						
                  <div class="col-md-4 col-sm-4 col-xs-6 <?php echo ( $i == 2) ? 'address-content-1' : '';?>">
					<div class="address-content">
						<i class="fa <?php echo esc_attr( $text['icon'] );?>" aria-hidden="true"></i>
						<h6><?php echo esc_html( $text['title'] );?></h6>
						<p><?php echo esc_html( $text['text'] );?></p>
					</div>
				  </div>
                		
				<?php endforeach;?>			
                            
			</div>
            </div>
            <?php endif;?>
		</div><!-- Container /- -->
		<div class="footer-copyright">
			<p><?php  echo esc_html ( corporatesource_get_option('copyright_text') ); ?></p>
           		 
                        <a href="<?php /* translators:straing */ echo esc_url( esc_html__( 'https://wordpress.org/', 'corporatesource' ) ); ?>"><?php /* translators:straing */  printf( esc_html__( 'Proudly powered by %s .', 'corporatesource' ), 'WordPress' ); ?></a>
                        
                        <?php
                        printf( /* translators:straing */  esc_html__( 'Theme: %1$s by %2$s.', 'corporatesource' ), 'Corporate Source', '<a href="' . esc_url( __( 'https://edatastyle.com/product/corporatesource-clean-minimal-wordpress-theme/', 'corporatesource' ) ) . '" target="_blank">' . esc_html__( 'eDataStyle', 'corporatesource' ) . '</a>' ); ?>
		</div>
	</div>
	<a href="#" id="ui-to-top" class="ui-to-top fa fa-angle-up active"></a>
    
    
    <?php
	}
}
add_action( 'corporatesource_footer_container', 'corporatesource_footer', 10 );