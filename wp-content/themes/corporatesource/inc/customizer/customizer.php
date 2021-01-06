<?php 

/**
 * corporatesource Theme Customizer.
 *
 * @package corporatesource
 */

//customizer core option
require get_template_directory() . '/inc/customizer/core/customizer-core.php';

//customizer 
require get_template_directory() . '/inc/customizer/core/default.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporatesource_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/core/control.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/core/sanitize.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	
	/*theme option panel details*/
	require get_template_directory() . '/inc/customizer/theme-option.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'CorporateSource_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new CorporateSource_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => apply_filters('corporatesource_pro_theme_name',esc_html__( 'CorporateSource Pro', 'corporatesource' )),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'corporatesource' ),
				'pro_url'  => apply_filters('corporatesource_pro_theme_url',esc_url( 'https://edatastyle.com/product/corporatesource-clean-minimal-wordpress-theme/?ref=customize' )),
				'priority'  => 1,
			)
		)
	);

}
add_action( 'customize_register', 'corporatesource_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */

function corporatesource_customizer_css() {
	
	wp_enqueue_script( 'corporatesource_customize_controls', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-admin.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'corporatesource_customize_controls', get_template_directory_uri() . '/inc/customizer/assets/css/customizer-controll.css' );
	
}
add_action( 'customize_controls_enqueue_scripts', 'corporatesource_customizer_css',0 );


