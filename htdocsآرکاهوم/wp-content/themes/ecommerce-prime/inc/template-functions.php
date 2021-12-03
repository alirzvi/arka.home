<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ecommerce_Prime
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ecommerce_prime_body_classes($classes)
{   
    $default = ecommerce_prime_get_default_theme_options();
    global $post;
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }

    $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$default['global_sidebar_layout'] ) );
    
    if ( ! is_active_sidebar( 'sidebar-1' ) ) { $global_sidebar_layout = 'no-sidebar'; }
    if( ecommerce_prime_check_woocommerce_page() ){ if ( ! is_active_sidebar( 'ecommerce-prime-woocommerce-widget' ) ) { $global_sidebar_layout = 'no-sidebar'; } }
    
    if( is_front_page() || is_single() || is_page() ){

        if( ( is_front_page() && !is_home() && is_page() ) || ( is_single() || is_page() ) ){

            if( ecommerce_prime_check_woocommerce_page() && is_product() ){

                $ecommerce_prime_post_sidebar = esc_html( get_theme_mod( 'product_sidebar_layout',$default['product_sidebar_layout'] ) );
                
            }elseif( ecommerce_prime_check_woocommerce_page() && ( is_cart() || is_checkout() ) ){
                $ecommerce_prime_post_sidebar = 'no-sidebar';
            }else{

                $ecommerce_prime_post_sidebar = esc_html( get_post_meta( $post->ID, 'ecommerce_prime_post_sidebar_option', true ) );
                if( $ecommerce_prime_post_sidebar == 'global-sidebar' || empty( $ecommerce_prime_post_sidebar ) ){ $ecommerce_prime_post_sidebar = $global_sidebar_layout; }
            }
            
            $classes[] = $ecommerce_prime_post_sidebar;

        }else{
            $default = ecommerce_prime_get_default_theme_options();
            $twp_ecommerce_prime_home_sections = get_theme_mod( 'twp_ecommerce_prime_home_sections', json_encode( $default['twp_ecommerce_prime_home_sections'] ) );
            $twp_ecommerce_prime_home_sections = json_decode( $twp_ecommerce_prime_home_sections );
            foreach( $twp_ecommerce_prime_home_sections as $ecommerce_prime_home_section ){

                $home_section_type = isset( $ecommerce_prime_home_section->home_section_type ) ? $ecommerce_prime_home_section->home_section_type : '' ;
                switch( $home_section_type ){
                    case 'latest-post':
                    $global_sidebar_layout = isset( $ecommerce_prime_home_section->sidebar_layout ) ? $ecommerce_prime_home_section->sidebar_layout : '' ;
                    break;
                }

            }
            $classes[] = $global_sidebar_layout;

        }
        
    }else{

        if( is_404() ){

            $classes[] = 'no-sidebar';

        }else{

            $classes[] = $global_sidebar_layout;

        }
    }

    if( is_search() || is_archive() || ( is_home() && !is_front_page() ) ){
        $ecommerce_prime_archive_layout = esc_html( get_theme_mod( 'ecommerce_prime_archive_layout',$default['ecommerce_prime_archive_layout'] ) );
        $classes[] = $ecommerce_prime_archive_layout;
    }

    if( is_front_page() && is_home() ){
        $latest_post_layout = '';
        $default = ecommerce_prime_get_default_theme_options();
        $twp_ecommerce_prime_home_sections = get_theme_mod( 'twp_ecommerce_prime_home_sections', json_encode( $default['twp_ecommerce_prime_home_sections'] ) );
        $twp_ecommerce_prime_home_sections = json_decode( $twp_ecommerce_prime_home_sections );
        foreach( $twp_ecommerce_prime_home_sections as $ecommerce_prime_home_section ){
            
            $home_section_type = isset( $ecommerce_prime_home_section->home_section_type ) ? $ecommerce_prime_home_section->home_section_type : '' ;
            switch( $home_section_type ){
                case 'latest-post':
                $latest_post_layout = isset( $ecommerce_prime_home_section->latest_post_layout ) ? $ecommerce_prime_home_section->latest_post_layout : '' ;
                break;
            }
        }
        $classes[] = $latest_post_layout;
    }

    if( has_header_video() ){
        $classes[] = 'twp-has-video';
    }
    if( has_header_image() ){
        $classes[] = 'twp-has-image';
    }

    return $classes;
}

add_filter('body_class', 'ecommerce_prime_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ecommerce_prime_pingback_header()
{
    if ( is_singular() && pings_open() ) {
        printf('<link rel="pingback" href="%s">', esc_url( get_bloginfo('pingback_url') ) );
    }
}

add_action('wp_head', 'ecommerce_prime_pingback_header');
