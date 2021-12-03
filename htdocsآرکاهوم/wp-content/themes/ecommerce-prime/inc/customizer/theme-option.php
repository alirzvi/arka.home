<?php
/**
* Theme Options.
*
* @package eCommerce Prime
*/

$default = ecommerce_prime_get_default_theme_options();

// Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'ecommerce-prime' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);
// Breadcrumb Section.
$wp_customize->add_section( 'breadcrumb_section',
	array(
	'title'      => esc_html__( 'Breadcrumb Settings', 'ecommerce-prime' ),
	'priority'   => 50,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Breadcrumb Layout.
$wp_customize->add_setting( 'breadcrumb_layout',
	array(
	'default'           => $default['breadcrumb_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'ecommerce_prime_sanitize_select',
	)
);
$wp_customize->add_control( 'breadcrumb_layout',
	array(
	'label'       => esc_html__( 'Breadcrumb Layout', 'ecommerce-prime' ),
	'description' => sprintf( esc_html__( 'Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin.', 'ecommerce-prime' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
	'section'     => 'breadcrumb_section',
	'type'        => 'select',
	'choices'               => array(
		'disable' => esc_html__( 'Disabled', 'ecommerce-prime' ),
		'simple' => esc_html__( 'Simple', 'ecommerce-prime' ),
		'advanced' => esc_html__( 'Advanced', 'ecommerce-prime' ),
	    ),
	'priority'    => 10,
	)
);

// Pagination Section.
$wp_customize->add_section( 'pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'ecommerce-prime' ),
	'priority'   => 80,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Pagination Layout.
$wp_customize->add_setting( 'pagination_layout',
	array(
	'default'           => $default['pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'ecommerce_prime_sanitize_select',
	)
);
$wp_customize->add_control( 'pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Layout', 'ecommerce-prime' ),
	'section'     => 'pagination_section',
	'type'        => 'select',
	'choices'               => array(
		'classic' => esc_html__( 'Classic(Previous/Next)', 'ecommerce-prime' ),
		'numeric' => esc_html__( 'Numeric', 'ecommerce-prime' ),
	    ),
	'priority'    => 10,
	)
);

// Preloader Section.
$wp_customize->add_section( 'preloader_section',
	array(
	'title'      => esc_html__( 'Preloader Settings', 'ecommerce-prime' ),
	'priority'   => 5,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Enable Disable Preloader.
$wp_customize->add_setting('ed_preloader',
    array(
        'default' => $default['ed_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_preloader',
    array(
        'label' => esc_html__('Enable Preloader', 'ecommerce-prime'),
        'description' => esc_html__('Enable/Disable Loading Animation.', 'ecommerce-prime'),
        'section' => 'preloader_section',
        'type' => 'checkbox',
    )
);

// Footer Mailchimp Section Desc.
$wp_customize->add_setting( 'preloader_text',
	array(
	'default'           => $default['preloader_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'preloader_text',
	array(
	'label'    => esc_html__( 'Preloader Text', 'ecommerce-prime' ),
	'section'  => 'preloader_section',
	'type'     => 'text',
	)
);