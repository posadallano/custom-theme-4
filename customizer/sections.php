<?php
/**
 * Customizer sections.
 *
 * @package David Annakie
 */

/**
 * Register the section sections.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function david_annakie_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'david_annakie_additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'david_annakie' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'david_annakie_social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'david_annakie' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'david_annakie' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'david_annakie_header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'david_annakie' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'david_annakie_footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'david_annakie' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);


	// Register a blog section.
	$wp_customize->add_section(
		'david_annakie_blog_section',
		array(
			'title'    => esc_html__( 'Blog CTA', 'david_annakie' ),
			'priority' => 95,
			'panel'    => 'site-options',
		)
	);

}
add_action( 'customize_register', 'david_annakie_customize_sections' );
