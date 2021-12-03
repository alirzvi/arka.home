<?php
/**
* Layouts Settings.
*
* @package eCommerce Prime
*/

$default = ecommerce_prime_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Layout Settings', 'ecommerce-prime' ),
	'priority'   => 60,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Global Sidebar Layout.
$wp_customize->add_setting( 'global_sidebar_layout',
	array(
	'default'           => $default['global_sidebar_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'ecommerce_prime_sanitize_select',
	)
);
$wp_customize->add_control( 'global_sidebar_layout',
	array(
	'label'       => esc_html__( 'Global Sidebar Layout', 'ecommerce-prime' ),
	'section'     => 'layout_setting',
	'type'        => 'select',
	'choices'     => array(
		'right-sidebar' => esc_html__( 'Right Sidebar', 'ecommerce-prime' ),
		'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecommerce-prime' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'ecommerce-prime' ),
	    ),
	)
);

// Archive Layout.
$wp_customize->add_setting(
    'ecommerce_prime_archive_layout',
    array(
        'default' 			=> $default['ecommerce_prime_archive_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select'
    )
);
$wp_customize->add_control(
    new Ecommerce_Prime_Custom_Radio_Image_Control( 
        $wp_customize,
        'ecommerce_prime_archive_layout',
        array(
            'settings'      => 'ecommerce_prime_archive_layout',
            'section'       => 'layout_setting',
            'label'         => esc_html__( 'Archive Layout', 'ecommerce-prime' ),
            'choices'       => array(
                'archive-layout-1'  => get_template_directory_uri() . '/assets/images/Layout-style-1.png',
                'archive-layout-2'  => get_template_directory_uri() . '/assets/images/Layout-style-2.png',
            )
        )
    )
);