<?php
/**
* Header Options.
*
* @package eCommerce Prime
*/

$default = ecommerce_prime_get_default_theme_options();
$ecommerce_prime_product_category_list = ecommerce_prime_product_category_list();

// Header Advertise Area Section.
$wp_customize->add_section( 'header_mid_header_bar',
	array(
	'title'      => esc_html__( 'Header Settings', 'ecommerce-prime' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Header Advertise Image
$wp_customize->add_setting('header_advertise_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'header_advertise_image',
    	array(
        	'label'      => esc_html__( 'Header Advertise Image', 'ecommerce-prime' ),
           	'section'    => 'header_mid_header_bar',
       	)
   	)
);

// Header Image Ad Link.
$wp_customize->add_setting( 'header_advertise_link',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'header_advertise_link',
	array(
	'label'    => esc_html__( 'Header Advertise Image Link', 'ecommerce-prime' ),
	'section'  => 'header_mid_header_bar',
	'type'     => 'text',
	)
);

// Currency Switcher Shortcode.
$wp_customize->add_setting( 'header_currency_switcher_shortcode',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_currency_switcher_shortcode',
    array(
    'label'    => esc_html__( 'Currency Switcher Shortcode', 'ecommerce-prime' ),
    'description'    => esc_html__( 'If you want to enable this feature please install the recommended plugin for currency switcher and paste "[woocs]" shortcode in below input field. ', 'ecommerce-prime' ),
    'section'  => 'header_mid_header_bar',
    'type'     => 'text',
    )
);

// Enable Disable Product Category.
$wp_customize->add_setting('ed_mid_header_cart',
    array(
        'default' => $default['ed_mid_header_cart'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_mid_header_cart',
    array(
        'label' => esc_html__('Enable Cart Icon', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'checkbox',
    )
);

// Enable Disable Product Category.
$wp_customize->add_setting('ed_mid_header_product_category',
    array(
        'default' => $default['ed_mid_header_product_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_mid_header_product_category',
    array(
        'label' => esc_html__('Enable Product Category', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'checkbox',
    )
);

// Enable Disable Product Category.
$wp_customize->add_setting('header_product_category_title',
    array(
        'default' => $default['header_product_category_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('header_product_category_title',
    array(
        'label' => esc_html__('Product Category Title', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'text',
    )
);

// Product Category 1
$wp_customize->add_setting('header_product_cat_1',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_1',
    array(
        'label' => esc_html__('Header Product Category 1', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 2
$wp_customize->add_setting('header_product_cat_2',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_2',
    array(
        'label' => esc_html__('Header Product Category 2', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 3
$wp_customize->add_setting('header_product_cat_3',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_3',
    array(
        'label' => esc_html__('Header Product Category 3', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 4
$wp_customize->add_setting('header_product_cat_4',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_4',
    array(
        'label' => esc_html__('Header Product Category 4', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 5
$wp_customize->add_setting('header_product_cat_5',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_5',
    array(
        'label' => esc_html__('Header Product Category 5', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 6
$wp_customize->add_setting('header_product_cat_6',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_6',
    array(
        'label' => esc_html__('Header Product Category 6', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 7
$wp_customize->add_setting('header_product_cat_7',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_7',
    array(
        'label' => esc_html__('Header Product Category 7', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 8
$wp_customize->add_setting('header_product_cat_8',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_8',
    array(
        'label' => esc_html__('Header Product Category 8', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 9
$wp_customize->add_setting('header_product_cat_9',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_9',
    array(
        'label' => esc_html__('Header Product Category 9', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Product Category 10
$wp_customize->add_setting('header_product_cat_10',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_select',
    )
);
$wp_customize->add_control('header_product_cat_10',
    array(
        'label' => esc_html__('Header Product Category 10', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'select',
        'choices' => $ecommerce_prime_product_category_list,
    )
);

// Enable Disable Header Search.
$wp_customize->add_setting('ed_mid_header_search',
    array(
        'default' => $default['ed_mid_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_mid_header_search',
    array(
        'label' => esc_html__('Enable Header Search', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'checkbox',
    )
);

// Enable Disable Header Search.
$wp_customize->add_setting('ed_mid_header_login_reg',
    array(
        'default' => $default['ed_mid_header_login_reg'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_mid_header_login_reg',
    array(
        'label' => esc_html__('Enable Header Login/Register', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'checkbox',
    )
);

// Enable Disable Header Wishlist.
$wp_customize->add_setting('ed_mid_header_wishlist',
    array(
        'default' => $default['ed_mid_header_wishlist'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ecommerce_prime_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_mid_header_wishlist',
    array(
        'label' => esc_html__('Enable Header Wishlist', 'ecommerce-prime'),
        'section' => 'header_mid_header_bar',
        'type' => 'checkbox',
    )
);

// Bottom Header Login Page Link.
$wp_customize->add_setting( 'header_login_page_link',
    array(
    'default'           => $default['header_login_page_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'header_login_page_link',
    array(
    'label'    => esc_html__( 'Login Page Link', 'ecommerce-prime' ),
    'section'  => 'header_mid_header_bar',
    'type'     => 'text',
    )
);

// Bottom Header Wishlist Page Link.
$wp_customize->add_setting( 'header_wishlist_page_link',
    array(
    'default'           => $default['header_wishlist_page_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'header_wishlist_page_link',
    array(
    'label'    => esc_html__( 'Wishlist Page Link', 'ecommerce-prime' ),
    'section'  => 'header_mid_header_bar',
    'type'     => 'text',
    )
);