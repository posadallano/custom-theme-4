<?php
/**
 * Customizer settings.
 *
 * @package David Annakie
 */


/**
 * Register a social icons setting.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */

function david_annakie_customize_social_icons( $wp_customize ) {
	// Create an array of our social links for ease of setup.
	$social_networks = array( 'facebook', 'instagram', 'twitter', 'youtube', 'linkedin' );
	// Loop through our networks to setup our fields.
	foreach ( $social_networks as $network ) {
		// Register a setting.
		$wp_customize->add_setting(
			'david_annakie_' . $network . '_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url',
			)
		);

		// Create the setting field.
		$wp_customize->add_control(
			'david_annakie_' . $network . '_link',
			array(
				'label'   => /* translators: the social network name. */ sprintf( esc_html__( '%s URL', 'david_annakie' ), ucwords( $network ) ),
				'section' => 'david_annakie_social_links_section',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'david_annakie_customize_social_icons' );



/**
 * Register Footer settings.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function david_annakie_customize_footer( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_social_title',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'david_annakie_social_title',
			array(
				'label'       => esc_html__( 'Social Title', 'david_annakie' ),
				'section'     => 'david_annakie_footer_section',
				'type'        => 'text',
			)
		)
	);
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_display_footer_isotype',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'david_annakie_display_footer_isotype',
			array(
				'label'       => esc_html__( 'Footer isotype', 'david_annakie' ),
				'description' => esc_html__( 'Add a footer Isotype', 'david_annakie' ),
				'section'     => 'david_annakie_footer_section',			
			)
		)
	);
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_copyright_text',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new Text_Editor_Custom_Control(
			$wp_customize,
			'david_annakie_copyright_text',
			array(
				'label'       => esc_html__( 'Copyright Text', 'david_annakie' ),
				'description' => esc_html__( 'The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'david_annakie' ),
				'section'     => 'david_annakie_footer_section',
				'type'        => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', 'david_annakie_customize_footer' );

/**
 * Register Blog settings.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function david_annakie_customize_blog( $wp_customize ) {
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_blog_title',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'david_annakie_blog_title',
			array(
				'label'       => esc_html__( 'Title', 'david_annakie' ),
				'section'     => 'david_annakie_blog_section',
				'type'        => 'text',
			)
		)
	);
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_blog_name',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'david_annakie_blog_name',
			array(
				'label'       => esc_html__( 'Name', 'david_annakie' ),
				'section'     => 'david_annakie_blog_section',
				'type'        => 'text',
			)
		)
	);	
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_blog_url',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'david_annakie_blog_url',
			array(
				'label'       => esc_html__( 'URL Button', 'david_annakie' ),
				'section'     => 'david_annakie_blog_section',
				'type'        => 'text',
			)
		)
	);	
	// Register a setting.
	$wp_customize->add_setting(
		'david_annakie_display_blog_image',
		array(
			'default' => '',
		)
	);
	// Create the setting field.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'david_annakie_display_blog_image',
			array(
				'label'       => esc_html__( 'Image', 'david_annakie' ),
				'description' => esc_html__( 'Add an image', 'david_annakie' ),
				'section'     => 'david_annakie_blog_section',			
			)
		)
	);
}
add_action( 'customize_register', 'david_annakie_customize_blog' );