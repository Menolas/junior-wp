<?php
/**
 * Default theme options.
 *
 * @package corporatesource
 */

if ( ! function_exists( 'corporatesource_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function corporatesource_get_default_theme_options() {

		$defaults = array();
		
		
				
		/*Posts Layout*/
		$defaults['blog_layout']     				= esc_attr('right-sidebar');
		$defaults['pagination_type']     			= esc_attr('default');
		$defaults['blog_loop_content_type']     	= esc_attr('full-post');
		/*Posts Layout*/
		$defaults['page_layout']     				= esc_attr('right-sidebar');
		$defaults['primary_color']     				= esc_attr('#78abf1');
		
		/*layout*/
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'corporatesource' );
		
		$defaults['dialog_top'] 					= esc_html__( 'Your Trusted 24 Hours Service Provider! ', 'corporatesource' );
		
		$defaults['mailing_section_show']     		= false;
		
		$defaults['mailing_section_content']['address']['title']	= '';
		$defaults['mailing_section_content']['address']['text']		= '';
		$defaults['mailing_section_content']['address']['icon']		= esc_attr( 'fa-map-marker');
		
		$defaults['mailing_section_content']['call_us']['title']	= '';
		$defaults['mailing_section_content']['call_us']['text']		= '';
		$defaults['mailing_section_content']['call_us']['icon']		= esc_attr( 'fa-phone');
		
		$defaults['mailing_section_content']['email']['title']		= '';
		$defaults['mailing_section_content']['email']['text']		= '';
		$defaults['mailing_section_content']['email']['icon']		= esc_attr( 'fa-envelope-o');

		// Pass through filter.
		$defaults = apply_filters( 'corporatesource_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
