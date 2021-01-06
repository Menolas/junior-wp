<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Source
 */

?>
	<?php
    /**
    * Hook - corporatesource_footer_container.
    *
    * @hooked corporatesource_footer_container - 10
    */
    do_action( 'corporatesource_footer_container' );
    ?>

<?php wp_footer(); ?>

</body>
</html>
