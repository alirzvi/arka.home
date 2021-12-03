<?php
/**
* Sections Repeater Options.
*
* @package eCommerce Prime
*/

$ecommerce_prime_post_category_list = ecommerce_prime_post_category_list();
$ecommerce_prime_product_category_list = ecommerce_prime_product_category_list();
$ecommerce_prime_page_lists = ecommerce_prime_page_lists();
$ecommerce_prime_product_lists = ecommerce_prime_product_lists();
$default = ecommerce_prime_get_default_theme_options();
$home_sections = array(
    'slide-banner' => esc_html__('Slide Banner Block','ecommerce-prime'),
    'product-category' => esc_html__('Product Category Block','ecommerce-prime'),
    'tab-block-1' => esc_html__('Tab Block 1','ecommerce-prime'),
    'carousel' => esc_html__('Carousel Block','ecommerce-prime'),
    'tab-block-2' => esc_html__('Tab Block 2','ecommerce-prime'),
    'cta' => esc_html__('Call To Action Block','ecommerce-prime'),
    'best-deal-slide' => esc_html__('Best Deal Slide','ecommerce-prime'),
    'latest-post' => esc_html__('Latest Blog Block','ecommerce-prime'),
    'latest-news' => esc_html__('Ajax Infinity Load Blog Block','ecommerce-prime'),
    'testimonial' => esc_html__('Testimonial Block','ecommerce-prime'),
    'featured-posts' => esc_html__('Featured Posts Block','ecommerce-prime'),
    'client' => esc_html__('Client Block','ecommerce-prime'),
    'advertise-area' => esc_html__('Advertise Area Block','ecommerce-prime'),
    'subscribe' => esc_html__('Subscribe Block 1','ecommerce-prime'),
    'info' => esc_html__('Info Block','ecommerce-prime'),
    'lead-image-area' => esc_html__('Lead Image Block','ecommerce-prime'),
    );

$home_sidebar = array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'ecommerce-prime' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecommerce-prime' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'ecommerce-prime' ),
    );
$testimonial_layout = array(
        'slide' => esc_html__( 'Single Slide', 'ecommerce-prime' ),
        'carousel'  => esc_html__( 'Carousel Slide', 'ecommerce-prime' ),
    );
$sorting_option = array(
        'latest' => esc_html__( 'Latest Product', 'ecommerce-prime' ),
        'sellers'  => esc_html__( 'Best Sellers', 'ecommerce-prime' ),
    );
$testimonial_type = array(
        'product-review' => esc_html__( 'Product Review', 'ecommerce-prime' ),
        'post-cat'  => esc_html__( 'Post Category', 'ecommerce-prime' ),
        'page'    => esc_html__( 'Pages', 'ecommerce-prime' ),
    );
$home_layout = array(
        'index-layout-1' => esc_html__( 'Grid Layout', 'ecommerce-prime' ),
        'index-layout-2'  => esc_html__( 'Full Width Layout', 'ecommerce-prime' ),
    );

$cta_type = array(
        'page' => esc_html__( 'Page', 'ecommerce-prime' ),
        'custom'  => esc_html__( 'Custom Fields', 'ecommerce-prime' ),
    );

$ecommerce_prime_slide_banner_type = array(
        'category' => esc_html__( 'Category', 'ecommerce-prime' ),
        'product'  => esc_html__( 'Products', 'ecommerce-prime' ),
        'page'  => esc_html__( 'Page', 'ecommerce-prime' ),
    );
$ecommerce_prime_featured_post_type = array(
        'product'  => esc_html__( 'Product Products', 'ecommerce-prime' ),
        'category' => esc_html__( 'Post Category', 'ecommerce-prime' ),
    );
$ecommerce_prime_slide_banner_height = array(
        'small' => esc_html__( 'Small', 'ecommerce-prime' ),
        'medium'  => esc_html__( 'Medium', 'ecommerce-prime' ),
        'large'  => esc_html__( 'Large', 'ecommerce-prime' ),
    );

$ecommerce_prime_client_type = array(
        'category' => esc_html__( 'Category', 'ecommerce-prime' ),
        'page'  => esc_html__( 'Page', 'ecommerce-prime' ),
    );

// Slider Section.
$wp_customize->add_section( 'home_sections_repeater',
	array(
    	'title'      => esc_html__( 'Homepage Content', 'ecommerce-prime' ),
    	'priority'   => 150,
    	'capability' => 'edit_theme_options',
	)
);

// Recommended Posts Enable Disable.
$wp_customize->add_setting( 'twp_ecommerce_prime_home_sections', array(
    'sanitize_callback' => 'ecommerce_prime_sanitize_repeater',
    'default' => json_encode( $default['twp_ecommerce_prime_home_sections'] ),
));

$wp_customize->add_control(  new Ecommerce_Prime_Repeater_Controler( $wp_customize, 'twp_ecommerce_prime_home_sections', 
    array(
        'section' => 'home_sections_repeater',
        'settings' => 'twp_ecommerce_prime_home_sections',
        'ecommerce_prime_box_label' => esc_html__('New Section','ecommerce-prime'),
        'ecommerce_prime_box_add_control' => esc_html__('Add New Section','ecommerce-prime'),
    ),
        array(
            'section_ed' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Section', 'ecommerce-prime' ),
                'class'       => 'home-section-ed'
            ),
            'subacribe_ed_all_page' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Subscribe Section on All Page', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs subscribe-fields'
            ),
            'home_section_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Section Type', 'ecommerce-prime' ),
                'options'     => $home_sections,
                'class'       => 'home-section-type'
            ),
            'slider_ed' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Slider', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-post-fields'
            ),
            'slider_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Category', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_post_category_list,
                'class'       => 'home-repeater-fields-hs latest-post-fields'
            ),
            'section_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Section Title', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-news-fields carousel-fields tab-block-1-fields tab-block-2-fields best-deal-slide-fields testimonial-fields product-category-fields subscribe-fields featured-posts-fields'
            ),
            'featured_post_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Featured Posts Type', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_featured_post_type,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-type-ac'
            ),
            'featured_cat_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Featured Category One', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_post_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-category-ac'
            ),
            'featured_slider_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Featured Slider Category', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_post_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-category-ac'
            ),
            'featured_cat_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Featured Category Two', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_post_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-category-ac'
            ),
            'featured_product_cat_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category One', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-product-ac'
            ),
            'featured_product_slider_cat' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Slider Category', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-product-ac'
            ),
            'featured_product_cat_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category Two', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs featured-posts-fields featured-posts-product-ac'
            ),
            'section_desc' => array(
                'type'        => 'textarea',
                'label'       => esc_html__( 'Section Description', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs subscribe-fields latest-news-fields'
            ),
            'mailchimp_shortcode' => array(
                'type'        => 'textarea',
                'label'       => esc_html__( 'Mailchimp Shortcode', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs subscribe-fields'
            ),
            'quick_info_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Quick Info Page 1', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs info-fields'
            ),
            'quick_info_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Quick Info Page 2', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs info-fields'
            ),
            'quick_info_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Quick Info Page 3', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs info-fields'
            ),
            'quick_info_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Quick Info Page 4', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs info-fields'
            ),
            'slider_banner_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Banner Type', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_slide_banner_type,
                'class'       => 'home-repeater-fields-hs home-ac-banner-type slide-banner-fields'
            ),
            'slider_overlay' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Overlay', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields product-category-fields cta-fields'
            ),
            'fixed_background' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Fixed Background', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields'
            ),
            'slider_banner_height' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Slider Banner Height', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_slide_banner_height,
                'class'       => 'home-repeater-fields-hs slide-banner-fields cta-fields'
            ),
            'slider_client_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Client Content Type', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_client_type,
                'class'       => 'home-repeater-fields-hs client-fields slider-client-type-ac'
            ),
            'testimonial_layout' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Testimonial Layout', 'ecommerce-prime' ),
                'options'     => $testimonial_layout,
                'class'       => 'home-repeater-fields-hs testimonial-fields'
            ),
            'testimonial_content_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Testimonial Type', 'ecommerce-prime' ),
                'options'     => $testimonial_type,
                'class'       => 'home-repeater-fields-hs testimonial-fields testimonial-content-type-ac'

            ),
            'post_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Post Category', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_post_category_list,
                'class'       => 'home-repeater-fields-hs carousel-posts-fields grid-posts-fields latest-news-fields slide-banner-fields testimonial-fields client-fields post-category-ac'
            ),
            'cta_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Call To Action Method', 'ecommerce-prime' ),
                'options'     => $cta_type,
                'class'       => 'home-repeater-fields-hs cta-fields cta-type-ac'
            ),
            'banner_slide_page_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 1', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields cta-fields testimonial-fields client-fields banner-lide-page-1-ac'
            ),
            'banner_slide_link_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Link 1', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields banner-slide-link-1-ac'
            ),
            'banner_slide_buy_new_button_label_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Button Label 1', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields btn-lbl-1-ac'
            ),
            'banner_slide_page_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 2', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields testimonial-fields client-fields banner-lide-page-2-ac'
            ),
            'banner_slide_link_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Link 2', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields banner-slide-link-2-ac'
            ),
             'banner_slide_buy_new_button_label_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Button Label 2', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields btn-lbl-2-ac'
            ),
            'banner_slide_page_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 3', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields testimonial-fields client-fields banner-lide-page-3-ac'
            ),
            'banner_slide_link_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Link 3', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields banner-slide-link-3-ac'
            ),
            'banner_slide_buy_new_button_label_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Button Label 3', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs slide-banner-fields btn-lbl-3-ac'
            ),
            'banner_slide_page_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 4', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs testimonial-fields client-fields banner-lide-page-4-ac'
            ),
            'banner_slide_page_5' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 5', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-5-ac'
            ),
            'banner_slide_page_6' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 6', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-6-ac'
            ),
            'banner_slide_page_7' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 7', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-7-ac'
            ),
            'banner_slide_page_8' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 8', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-8-ac'
            ),
            'banner_slide_page_9' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 9', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-9-ac'
            ),
            'banner_slide_page_10' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Page 10', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs client-fields banner-lide-page-10-ac'
            ),
            'banner_slide_product_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product 1', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields prdct-1-ac'
            ),
            'banner_slide_product_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product 2', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields prdct-2-ac'
            ),
            'banner_slide_product_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product 3', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_lists,
                'class'       => 'home-repeater-fields-hs slide-banner-fields prdct-3-ac'
            ),
            'ed_relevant_cat' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Show Relevant Category Only', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-news-fields'
            ),
            'ed_escerpt_content' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Excerpt Content', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs multiple-category-posts-fields'
            ),
            'advertise_image' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Advertise Image', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 970x250 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs advertise-area-fields'
            ),
            'advertise_link' => array(
                'type'        => 'link',
                'label'       => esc_html__( 'Advertise Image Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs advertise-area-fields'
            ),
            'product_category' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields carousel-fields best-deal-slide-fields product-category-fields'
            ),
            'enable_review_comment' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Review Comment Content', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs best-deal-slide-fields'
            ),
            'section_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Best Selling Section Title', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs best-deal-slide-fields'
            ),
            'sorting_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Sorting', 'ecommerce-prime' ),
                'options'     => $sorting_option,
                'class'       => 'home-repeater-fields-hs best-deal-slide-fields'
            ),
            'product_category_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category Two', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs best-deal-slide-fields product-category-fields'
            ),
            'product_category_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category Three', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs product-category-fields'
            ),
            'product_category_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category Four', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs product-category-fields'
            ),
            'product_category_5' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Product Category Five', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_product_category_list,
                'class'       => 'home-repeater-fields-hs product-category-fields'
            ),
            'slider_arrows' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Arrows', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-post-fields carousel-fields slide-banner-fields best-deal-slide-fields testimonial-fields client-fields tab-block-2-fields tab-block-1-fields featured-posts-fields'
            ),
            'slider_dots' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Dots', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-post-fields carousel-fields slide-banner-fields best-deal-slide-fields testimonial-fields client-fields tab-block-2-fields tab-block-1-fields featured-posts-fields'
            ),
            'slider_autoplay' => array(
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Enable Autoplay', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs latest-post-fields carousel-fields slide-banner-fields best-deal-slide-fields testimonial-fields client-fields tab-block-2-fields tab-block-1-fields featured-posts-fields'
            ),
            'sidebar_layout' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Sidebar Layout', 'ecommerce-prime' ),
                'options'     => $home_sidebar,
                'class'       => 'home-repeater-fields-hs latest-post-fields'
            ),
            'latest_post_layout' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Latest Posts Layout', 'ecommerce-prime' ),
                'options'     => $home_layout,
                'class'       => 'home-repeater-fields-hs latest-post-fields'
            ),
            'slide_image_1' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Banner Image 1', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'image_link_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Banner Image Link 1', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'slide_image_2' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Banner Image 2', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'image_link_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Banner Image Link 2', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'slide_image_3' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Banner Image 3', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'image_link_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Banner Image Link 3', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs tab-block-1-fields tab-block-2-fields'
            ),
            'cta_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'CTA Title', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields cta-title-ac'
            ),
            'cta_sub_title' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'CTA Sub Title', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields cta-sub-title-ac'
            ),
            'cta_button_label' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'CTA Button Label', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields cta-button-label-ac'
            ),
            'cta_button_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'CTA Button Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields cta-button-link-ac'
            ),
            'cta_bg' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'CTA Background', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs cta-fields cta-bg-ac'
            ),
            'lead_banner_type' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner type', 'ecommerce-prime' ),
                'options'     => $cta_type,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac'
            ),
            'lead_banner_page_1' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner Page 1', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-page'
            ),
            'lead_banner_page_2' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner Page 2', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-page'
            ),
            'lead_banner_page_3' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner Page 3', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-page'
            ),
            'lead_banner_page_4' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner Page 4', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-page'
            ),
            'lead_banner_page_5' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Lead Banner Page 5', 'ecommerce-prime' ),
                'options'     => $ecommerce_prime_page_lists,
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-page'
            ),
            'lead_image_1' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Lead Image 1', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_title_1' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image Title 1', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_1_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image 1 Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_2' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Lead Image 2', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_title_2' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image Title 2', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_2_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image 2 Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_3' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Lead Image 3', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_title_3' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image Title 3', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_3_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image 3 Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_4' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Lead Image 4', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_title_4' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image Title 4', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_4_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image 4 Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_5' => array(
                'type'        => 'upload',
                'label'       => esc_html__( 'Lead Image 5', 'ecommerce-prime' ),
                'description' => esc_html__( 'Recommended Image Size is 270x630 PX.', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_title_5' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image Title 5', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),
            'lead_image_5_link' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Lead Image 5 Link', 'ecommerce-prime' ),
                'class'       => 'home-repeater-fields-hs lead-image-area-fields lead-image-area-ac-custom'
            ),

    )
));


// Info.
$wp_customize->add_setting(
    'ecommerce_prime_notiece_info',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Ecommerce_Prime_Info_Notiece_Control( 
        $wp_customize,
        'ecommerce_prime_notiece_info',
        array(
            'settings' => 'ecommerce_prime_notiece_info',
            'section'       => 'home_sections_repeater',
            'label'         => esc_html__( 'Info', 'ecommerce-prime' ),
        )
    )
);