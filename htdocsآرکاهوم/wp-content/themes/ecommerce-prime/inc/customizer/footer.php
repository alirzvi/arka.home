<?php
/**
* Footer Settings.
*
* @package eCommerce Prime
*/

$default = ecommerce_prime_get_default_theme_options();
$ecommerce_prime_page_lists = ecommerce_prime_page_lists();

// Footer Section.
$wp_customize->add_section( 'footer_setting',
	array(
	'title'      => esc_html__( 'Footer Settings', 'ecommerce-prime' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


// Discover Enable Disable.
$wp_customize->add_setting('ed_scroll_top_button',
    array(
        'default' => $default['ed_scroll_top_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_scroll_top_button',
    array(
        'label' => esc_html__('Enable Scroll To Top Button', 'ecommerce-prime'),
        'section' => 'footer_setting',
        'type' => 'checkbox',
    )
);

// Footer Layout.
$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'ecommerce_prime_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'ecommerce-prime' ),
	'section'     => 'footer_setting',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'ecommerce-prime' ),
		'2' => esc_html__( 'Two Column', 'ecommerce-prime' ),
		'3' => esc_html__( 'Three Column', 'ecommerce-prime' ),
	    ),
	)
);

// Header Image Ad Link.
$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'ecommerce-prime' ),
	'section'  => 'footer_setting',
	'type'     => 'text',
	)
);