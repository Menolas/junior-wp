<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Source
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
    /**
    * Hook - corporatesource_header_container.
    *
    * @hooked corporatesource_header_start - 10
	* @hooked corporatesource_header_brand - 20
	* @hooked corporatesource_header_nav_search_bar - 30
	* @hooked corporatesource_header_end - 40
    */
    do_action( 'corporatesource_header_container' );
    ?>
      
      
	<?php
    /**
    * Hook - corporatesource_hero_block.
    *
    * @hooked corporatesource_hero_block_before - 10
	* @hooked corporatesource_title_h1_text - 20
	* @hooked corporatesource_sub_title - 30
	* @hooked corporatesource_hero_block_after - 40
    */
	
	if ( !is_404() ) {
		if ( is_front_page() && is_active_sidebar( 'front_page_sidebar' )){
			dynamic_sidebar( 'front_page_sidebar' );
		}else if ( is_home() && is_active_sidebar( 'blog_page_sidebar' )){
			dynamic_sidebar( 'blog_page_sidebar' );
		}else{
			do_action( 'corporatesource_hero_block' );
		}
	}
	
    ?>  


