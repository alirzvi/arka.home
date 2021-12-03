<?php
/**
* Single Post Options.
*
* @package eCommerce Prime
*/

$ecommerce_prime_post_category_list = ecommerce_prime_post_category_list();
$default = ecommerce_prime_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'single_post_setting',
	array(
	'title'      => esc_html__( 'Single Post Settings', 'ecommerce-prime' ),
	'priority'   => 70,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// featured Image Enable Disable.
$wp_customize->add_setting('ed_featured_image',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_featured_image',
    array(
        'label' => esc_html__('Disable Featured Image', 'ecommerce-prime'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Related Posts Enable Disable.
$wp_customize->add_setting('ed_related_post',
    array(
        'default' => $default['ed_related_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_post',
    array(
        'label' => esc_html__('Enable Related Posts', 'ecommerce-prime'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Related Posts Section Title.
$wp_customize->add_setting( 'related_post_title',
    array(
    'default'           => $default['related_post_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'related_post_title',
    array(
    'label'    => esc_html__( 'Section Title', 'ecommerce-prime' ),
    'section'  => 'single_post_setting',
    'type'     => 'text',
    'priority' => 20,
    )
);

// Related Posts Enable Disable.
$wp_customize->add_setting('ed_author_section',
    array(
        'default' => $default['ed_author_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_author_section',
    array(
        'label' => esc_html__('Enable Author Bio', 'ecommerce-prime'),
        'section' => 'single_post_setting',
        'type' => 'checkbox',
        'priority' => 30,
    )
);