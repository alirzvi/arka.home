<?php
/**
* Sanitization Functions.
*
* @package eCommerce Prime
*/


if ( ! function_exists( 'ecommerce_prime_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 */
	function ecommerce_prime_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'ecommerce_prime_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function ecommerce_prime_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'ecommerce_prime_sanitize_repeater' ) ) :
	
	/**
	* Sanitise Repeater Field
	*/
	function ecommerce_prime_sanitize_repeater($input){
	    $input_decoded = json_decode( $input, true );  
	    
	    if(!empty($input_decoded)) {
	        foreach ($input_decoded as $boxes => $box ){
	            foreach ($box as $key => $value){
	                
	                if( $key == 'category_color' ){

                        $input_decoded[$boxes][$key] = sanitize_hex_color( $value );

                    }elseif( $key == 'section_ed' || $key == 'slider_ed' || $key == 'subacribe_ed_all_page' || $key == 'slider_overlay' || $key == 'fixed_background' || $key == 'ed_relevant_cat' || $key == 'ed_escerpt_content' || $key == 'enable_review_comment' || $key == 'slider_dots' || $key == 'slider_autoplay' ){

                        $input_decoded[$boxes][$key] = ecommerce_prime_sanitize_repeater_ed( $value );

                    }elseif( $key == 'lead_image_1' || $key == 'lead_image_2' || $key == 'lead_image_3' || $key == 'lead_image_4' || $key == 'lead_image_5' ){

                    	$input_decoded[$boxes][$key] = esc_url_raw( $value );

                    }elseif( $key == 'home_section_type' ){

                    	$input_decoded[$boxes][$key] = ecommerce_prime_sanitize_home_section( $value );

                    }elseif( $key == 'slider_category' || $key == 'featured_cat_1' || $key == 'featured_slider_cat' || $key == 'featured_cat_2' || $key == 'post_category' ){

                    	$input_decoded[$boxes][$key] = ecommerce_prime_sanitize_category( $value );

                    }elseif( $key == 'lead_banner_page_1' || $key == 'lead_banner_page_2' || $key == 'lead_banner_page_3' || $key == 'lead_banner_page_4' || $key == 'lead_banner_page_5' || $key == 'banner_slide_page_10' || $key == 'banner_slide_page_9' || $key == 'banner_slide_page_8' || $key == 'banner_slide_page_7' || $key == 'banner_slide_page_6' || $key == 'banner_slide_page_5' || $key == 'banner_slide_page_4' || $key == 'banner_slide_page_3' || $key == 'banner_slide_page_2' || $key == 'banner_slide_page_1' || $key == 'banner_slide_page_2'  || $key == 'banner_slide_page_3' ){

                    	$input_decoded[$boxes][$key] = ecommerce_prime_sanitize_page( $value );

                    }else{

                        $input_decoded[$boxes][$key] = sanitize_text_field( $value );

                    }

	            }
	        }
	        return json_encode($input_decoded);
	    }    
	    return $input;
	}
endif;

function ecommerce_prime_sanitize_repeater_ed( $input ) {

    $valid_keys = array('yes','no');
    if ( in_array( $input , $valid_keys ) ) {
        return $input;
    }
    return '';

}

function ecommerce_prime_sanitize_home_section( $input ) {

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

    if ( array_key_exists( $input , $home_sections ) ) {
        return $input;
    }
    return '';

}

function ecommerce_prime_sanitize_page( $input ) {

   $ecommerce_prime_page_lists = ecommerce_prime_page_lists();
    if ( array_key_exists( $input , $ecommerce_prime_page_lists ) ) {
        return $input;
    }
    return '';

}

function ecommerce_prime_sanitize_category( $input ) {

   $ecommerce_prime_post_category_list = ecommerce_prime_post_category_list();
    if ( array_key_exists( $input , $ecommerce_prime_post_category_list ) ) {
        return $input;
    }
    return '';

}