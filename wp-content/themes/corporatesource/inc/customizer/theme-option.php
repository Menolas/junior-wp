<?php 

/**
 * Theme Options Panel.
 *
 * @package corporatesource
 */

$default = corporatesource_get_default_theme_options();



// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'corporatesource' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
	)
);

// Styling Options.*/

$wp_customize->add_section( 'styling_section_settings',
	array(
		'title'      => esc_html__( 'Styling Options', 'shopstore' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Primary Color.
$wp_customize->add_setting( 'primary_color',
	array(
	'default'           => $default['primary_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'primary_color',
	array(
	'label'    	   => esc_html__( 'Primary Color Scheme:', 'shopstore' ),
	'section'  	   => 'styling_section_settings',
	'description'  => esc_html__( 'The theme comes with unlimited color schemes for your theme\'s styling. upgrade pro for color options & features', 'shopstore' ),
	'type'     => 'color',
	'priority' => 120,
	)
);


/*Posts management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Blog Management', 'corporatesource' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

		/*Posts Layout*/
		$wp_customize->add_setting( 'blog_layout',
			array(
				'default'           => $default['blog_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corporatesource_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_layout',
			array(
				'label'    => esc_html__( 'Blog Layout Options', 'corporatesource' ),
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'corporatesource' ),
				'section'  => 'theme_option_section_settings',
				'choices'   => array(
					'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'corporatesource' ),
					'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'corporatesource' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'corporatesource' ),
					'full-container'    => esc_html__( 'Full Container/ No Sidebar', 'corporatesource' ),
					),
				'type'     => 'select',
				'priority' => 170,
			)
		);
		
		
		
		/*Blog Loop Content*/
		$wp_customize->add_setting( 'blog_loop_content_type',
			array(
				'default'           => $default['blog_loop_content_type'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corporatesource_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_loop_content_type',
			array(
				'label'    => esc_html__( 'Blog Looop Content', 'corporatesource' ),
				'section'  => 'theme_option_section_settings',
				'choices'               => array(
					'excerpt-only' => __( 'Excerpt Only', 'corporatesource' ),
					'full-post' => __( 'Full Post', 'corporatesource' ),
					),
				'type'     => 'select',
				'priority' => 180,
			)
		);
		
		/*Pagination*/
		$wp_customize->add_setting( 'pagination_type',
			array(
				'default'           => $default['pagination_type'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corporatesource_sanitize_select',
			)
		);
		$wp_customize->add_control( 'pagination_type',
			array(
				'label'    => esc_html__( 'Pagination Type', 'corporatesource' ),
				'section'  => 'theme_option_section_settings',
				'choices'               => array(
					'default' => __( 'Default', 'corporatesource' ),
					'numeric' => __( 'Numeric list', 'corporatesource' ),
					),
				'type'     => 'select',
				'priority' => 180,
			)
		);
		
		
/*Posts management section start */
$wp_customize->add_section( 'page_option_section_settings',
	array(
		'title'      => esc_html__( 'Page Management', 'corporatesource' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

	
		/*Home Page Layout*/
		$wp_customize->add_setting( 'page_layout',
			array(
				'default'           => $default['blog_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corporatesource_sanitize_select',
			)
		);
		$wp_customize->add_control( 'page_layout',
			array(
				'label'    => esc_html__( 'Page Layout Options', 'corporatesource' ),
				'section'  => 'page_option_section_settings',
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'corporatesource' ),
				'choices'   => array(
					'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'corporatesource' ),
					'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'corporatesource' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'corporatesource' ),
					'full-container'    => esc_html__( 'Full Container/ No Sidebar', 'corporatesource' ),
					),
				'type'     => 'select',
				'priority' => 170,
			)
		);


// Footer Section.
$wp_customize->add_section( 'footer_section',
	array(
	'title'      => esc_html__( 'Footer Options', 'corporatesource' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'corporatesource' ),
	'section'  => 'footer_section',
	'type'     => 'text',
	'priority' => 120,
	)
);


// Footer Section.
$wp_customize->add_section( 'mailing_section',
	array(
	'title'      => esc_html__( 'Footer Mailing info', 'corporatesource' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);
		
		/*Social Profile*/
		$wp_customize->add_setting( 'mailing_section_show',
			array(
				'default'           => $default['mailing_section_show'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corporatesource_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'mailing_section_show',
			array(
				'label'    => esc_html__( 'Show Footer Mailing Section', 'corporatesource' ),
				'section'  => 'mailing_section',
				'type'     => 'checkbox',
				
			)
		);
	 
		/*
		Award .
		*/
		$award['address']['title']= array(
			'label' => esc_html__('Address Title', 'corporatesource'),
			
		);
		$award['address']['text']= array(
			'label' => esc_html__('Address Text', 'corporatesource'),
		);
		$award['address']['icon']= array(
			'label' => esc_html__('Fontawesome Icon ', 'corporatesource'),
		);
		
		$award['call_us']['title']= array(
			'label' => esc_html__('Call Us  Title', 'corporatesource'),
			
		);
		$award['call_us']['text']= array(
			'label' => esc_html__('Call Us Text', 'corporatesource'),
			
		);
		$award['call_us']['icon']= array(
			'label' => esc_html__('Fontawesome Icon ', 'corporatesource'),
		);
		
		$award['email']['title']= array(
			'label' => esc_html__('Email  Title', 'corporatesource'),
			
		);
		$award['email']['text']= array(
			'label' => esc_html__('Email  Text', 'corporatesource'),
			
		);
		$award['email']['icon']= array(
			'label' => esc_html__('Fontawesome Icon ', 'corporatesource'),
		);
		
	
		foreach( $award as $key => $award_group ):
			foreach( $award_group as $k => $val ):
				// SETTINGS
				if ( isset( $key ) && isset( $k ) ){
					
					$wp_customize->add_setting('mailing_section_content['.$key .']['. $k .']',
						array(
							'default'           => $default['mailing_section_content'][$key][$k],
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field'
						)
					);
					// CONTROLS
					$wp_customize->add_control('mailing_section_content['.$key .']['. $k .']', 
						array(
							'label' => esc_html( $val['label'] ), 
							'section'    => 'mailing_section',
							'type'     => 'text',
							
						)
					);
				}
			
			endforeach;
		endforeach;

