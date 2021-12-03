<?php
/**
 * Default theme options.
 *
 * @package eCommerce Prime
 */

if ( ! function_exists( 'ecommerce_prime_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function ecommerce_prime_get_default_theme_options() {

		$ecommerce_prime_defaults = array();
		
		
		// Home options.

		$ecommerce_prime_defaults['twp_ecommerce_prime_home_sections'] 	= array(

            array(
                    'home_section_type' => 'featured-posts',
                    'section_ed'        => 'no',
                    'section_title'         => esc_html__('Featured Posts','ecommerce-prime'),
                    'featured_cat_1'   => '',
                    'featured_cat_2'   => '',
                    'featured_slider_cat'   => '',
                    'featured_product_cat_1'   => '',
                    'featured_product_slider_cat'   => '',
                    'featured_product_cat_2'   => '',
                    'featured_post_type'   => 'product',
                    'slider_autoplay'       => 'yes',
                    'slider_dots'           => 'no',
                    'slider_arrows'         => 'yes',
            ),
            array(
                    'home_section_type' => 'slide-banner',
                    'product_category'    => '',
                    'section_ed'		=> 'no',
                    'slider_banner_type'		=> 'category',
                    'banner_slide_buy_new_button_label_1'     => esc_html__('Buy Now','ecommerce-prime'),
                    'banner_slide_buy_new_button_label_2'     => esc_html__('Buy Now','ecommerce-prime'),
                    'banner_slide_buy_new_button_label_3'     => esc_html__('Buy Now','ecommerce-prime'),
                    'slider_autoplay'	=> 'yes',
                    'slider_dots'		=> 'no',
                    'slider_arrows'		=> 'yes',
                    'banner_slide_product_1'    => '',
                    'banner_slide_product_2'    => '',
                    'banner_slide_product_3'    => '',
                    'banner_slide_page_1'    => '',
                    'banner_slide_page_2'    => '',
                    'banner_slide_page_3'    => '',
                    'banner_slide_page_4'    => '',
                    'slider_overlay'	=> 'no',
                    'slider_banner_height'	=> 'medium',
            ),
            array(
                    'home_section_type' => 'product-category',
                    'product_category'    => '',
                    'section_ed'		=> 'no',
                    'section_title'     => esc_html__('Featured Categories','ecommerce-prime'),
                    'slider_overlay'	=> 'yes',
            ),
            array(
                    'home_section_type' => 'tab-block-1',
                    'product_category'    => '',
                    'section_title'     => esc_html__('Vertical Tab','ecommerce-prime'),
                    'section_ed'		=> 'no',
                    'slide_image_1'		=> '',
                    'slide_image_2'		=> '',
                    'slide_image_3'		=> '',
                    'image_link_1'		=> '',
                    'image_link_2'		=> '',
                    'image_link_3'		=> '',
                    'slider_autoplay'   => 'yes',
                    'slider_dots'       => 'no',
                    'slider_arrows'     => 'yes',
            ),

            array(
                    'home_section_type' => 'carousel',
                    'product_category'    => '',
                    'section_ed'		=> 'no',
                    'section_title'     => esc_html__('Carousel Posts','ecommerce-prime'),
                    'slider_autoplay'	=> 'yes',
                    'slider_dots'		=> 'no',
                    'slider_arrows'		=> 'yes',
            ),
            array(
                    'home_section_type' => 'tab-block-2',
                    'product_category'    => '',
                    'section_title'     => esc_html__('Horizontal Tab','ecommerce-prime'),
                    'section_ed'		=> 'no',
                    'slide_image_1'		=> '',
                    'slide_image_2'		=> '',
                    'slide_image_3'		=> '',
                    'image_link_1'		=> '',
                    'image_link_2'		=> '',
                    'image_link_3'		=> '',
                    'slider_autoplay'   => 'yes',
                    'slider_dots'       => 'no',
                    'slider_arrows'     => 'yes',
            ),
            array(
                    'home_section_type' => 'cta',
                    'product_category'  => '',
                    'cta_title'			=> '',
                    'section_ed'		=> 'no',
                    'cta_sub_title'		=> '',
                    'cta_button_label'	=> esc_html__('Signup Now','ecommerce-prime'),
                    'cta_button_link'	=> '',
                    'cta_bg'			=> '',
                    'slider_overlay'	=> 'no',
                    'fixed_background'	=> 'yes',
                    'cta_type'			=> 'page',
                    'slider_banner_height' => 'small',
                    'banner_slide_page_1'  => '',
            ),
            array(
                    'home_section_type' => 'best-deal-slide',
                    'product_category'  => '',
                    'section_ed'		=> 'no',
                    'section_title'     => esc_html__('Trending Hot Deals','ecommerce-prime'),
                    'section_title_2'   => esc_html__('Best Selling Items','ecommerce-prime'),
                    'slider_autoplay'	=> 'yes',
                    'slider_dots'		=> 'no',
                    'slider_arrows'		=> 'yes',
                    'enable_review_comment'     => 'yes',
                    'sorting_type'		=> 'latest',
            ),
            array(
                    'home_section_type' => 'latest-post',
                    'section_title'     => '',
                    'section_ed'		=> 'yes',
                    'slider_ed'			=> 'yes',
                    'slider_category'   => '',
                    'slider_autoplay'	=> 'yes',
                    'slider_dots'		=> 'no',
                    'slider_arrows'		=> 'yes',
                    'sidebar_layout' 	=> 'right-sidebar',
                    'latest_post_layout'=> 'index-layout-1',
            ),

             array(
                    'home_section_type' => 'latest-news',
                    'section_title'     => esc_html__('Latest News','ecommerce-prime'),
                    'post_category'     => '',
                    'section_ed'		=> 'yes',
                    'advertise_link'	=> 'no',
                    'ed_relevant_cat'	=> 'no',
                    'section_desc'		=> '',
            ),
            
            array(
                    'home_section_type' => 'testimonial',
                    'post_category'    	=> '',
                    'section_ed'		=> 'no',
                    'testimonial_content_type'		=> 'product-review',
                    'testimonial_layout'			=> 'slide',
                    'section_title'     	=> esc_html__('Kind words from our Clients','ecommerce-prime'),
                    'slider_autoplay'		=> 'yes',
                    'slider_dots'			=> 'no',
                    'slider_arrows'			=> 'yes',
                    'banner_slide_page_1'   => '',
                    'banner_slide_page_2'   => '',
                    'banner_slide_page_3'   => '',
                    'banner_slide_page_4'   => '',
            ),
            array(
                    'home_section_type' => 'client',
                    'post_category'    	=> '',
                    'slider_client_type'    => 'category',
                    'section_ed'		=> 'no',
                    'slider_autoplay'	=> 'yes',
                    'slider_dots'		=> 'no',
                    'slider_arrows'		=> 'yes',
                    'banner_slide_page_1'    => '',
                    'banner_slide_page_2'    => '',
                    'banner_slide_page_3'    => '',
                    'banner_slide_page_4'    => '',
                    'banner_slide_page_5'    => '',
                    'banner_slide_page_6'    => '',
                    'banner_slide_page_7'    => '',
                    'banner_slide_page_8'    => '',
                    'banner_slide_page_9'    => '',
                    'banner_slide_page_10'    => '',
            ),
            array(
                    'home_section_type' => 'advertise-area',
                    'advertise_link'    => '',
                    'advertise_image'   => '',
                    'section_ed'		=> 'no',
            ),
            array(
                    'home_section_type' => 'lead-image-area',
                    'lead_image_1'    => '',
                    'lead_image_1_link'   => '',
                    'lead_image_2'    => '',
                    'lead_image_3_link'   => '',
                    'lead_image_3'    => '',
                    'lead_image_4_link'   => '',
                    'lead_image_4'    => '',
                    'lead_image_5_link'   => '',
                    'lead_image_5'    => '',
                    'lead_image_1_link'   => '',
                    'section_ed'        => 'no',
                    'lead_banner_type'        => 'page',
                    'lead_banner_page_1'    => '',
                    'lead_banner_page_2'    => '',
                    'lead_banner_page_3'    => '',
                    'lead_banner_page_4'    => '',
                    'lead_banner_page_5'    => '',
            ),
            array(
                    'home_section_type' => 'subscribe',
                    'section_ed'		=> 'no',
                    'subacribe_ed_all_page'     => 'no',
                    'section_title'     => esc_html__('Sign Up For Our Newsletter','ecommerce-prime'),
                    'section_desc'     => esc_html__('Subscribe our newsletter and get discount 20% Off','ecommerce-prime'),
                    'mailchimp_shortcode'		=> '',
            ),
            array(
                    'home_section_type' => 'info',
                    'section_ed'        => 'no',
                    'quick_info_1'    => '',
                    'quick_info_2'    => '',
                    'quick_info_3'    => '',
                    'quick_info_4'    => '',
            ),
        );

		// Theme Options
		$ecommerce_prime_defaults['ed_mid_header_product_category']			= 0;
		$ecommerce_prime_defaults['ed_mid_header_search']			= 1;
        $ecommerce_prime_defaults['ed_mid_header_cart']         = 1;
		$ecommerce_prime_defaults['ed_mid_header_wishlist']			= 1;
		$ecommerce_prime_defaults['ed_mid_header_login_reg']			= 1;
		$ecommerce_prime_defaults['header_product_category_title'] 			= esc_html__( 'Shop By Categories', 'ecommerce-prime' );
		$ecommerce_prime_defaults['preloader_text'] 			= esc_html__( 'Site Loading', 'ecommerce-prime' );
		$ecommerce_prime_defaults['header_medai_button_label'] 			= esc_html__( 'Learn More', 'ecommerce-prime' );
		$ecommerce_prime_defaults['breadcrumb_layout']				= 'simple';
		$ecommerce_prime_defaults['pagination_layout']				= 'numeric';
		$ecommerce_prime_defaults['ed_preloader']					= 1;
		$ecommerce_prime_defaults['header_wishlist_page_link']			= esc_url( home_url().'/wishlist');
		$ecommerce_prime_defaults['header_login_page_link']			= esc_url( home_url().'/login');
        $ecommerce_prime_defaults['header_medai_text']          = esc_html__( 'Signup Now', 'ecommerce-prime' );
		
		// Single Posts Option.
		$ecommerce_prime_defaults['ed_related_post']				= 1;
		$ecommerce_prime_defaults['related_post_title']				= esc_html__('Related Post','ecommerce-prime');
		$ecommerce_prime_defaults['ed_author_section']				= 1;

		// Layout Options.
		$ecommerce_prime_defaults['global_sidebar_layout'] 			= 'right-sidebar';
		$ecommerce_prime_defaults['ecommerce_prime_archive_layout'] 		= 'archive-layout-1';

		// Footer Options.
		$ecommerce_prime_defaults['footer_column_layout'] 			= 3;
		$ecommerce_prime_defaults['footer_copyright_text'] 			= esc_html__( 'Copyright All Rights Reserved.', 'ecommerce-prime' );
		$ecommerce_prime_defaults['footer_newsletter_title'] 			= esc_html__( 'Sign Up For Our Newsletter', 'ecommerce-prime' );
		$ecommerce_prime_defaults['footer_newsletter_desc'] 			= esc_html__( 'Subscribe our newsletter and get discount 20% Off', 'ecommerce-prime' );
        $ecommerce_prime_defaults['ed_scroll_top_button']           = 1;
        
		// Woocommerce.
		$ecommerce_prime_defaults['product_sidebar_layout']			= 'no-sidebar';
        $ecommerce_prime_defaults['ed_after_add_to_cart_popup']     = 1;

		// Pass through filter.
		$ecommerce_prime_defaults = apply_filters( 'ecommerce_prime_filter_default_theme_options', $ecommerce_prime_defaults );

		return $ecommerce_prime_defaults;

	}

endif;
