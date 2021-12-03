<?php
/**
 * Shopay Store Theme Customizer
 *
 * @package Shopay
 * @subpackage Shopay Store
 * 
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
add_action( 'customize_register', 'shopay_store_customize_settings', 99 );
 
if ( !function_exists( 'shopay_store_customize_settings' ) ) :
    /**
     * 
     * @since 1.0.0
     *  
     */
    function shopay_store_customize_settings( $wp_customize ) {
        $wp_customize->get_setting( 'shopay_header_textcolor' )->default   = sanitize_hex_color( '#333333' );
        $wp_customize->get_setting( 'background_color' )->default          = sanitize_hex_color( '#ffffff' );
        $wp_customize->get_setting( 'shopay_primary_color' )->default      = sanitize_hex_color( '#fed700' );
        $wp_customize->get_setting( 'shopay_copyright_text' )->default     = esc_html__( 'Shopay Store', 'shopay-store' );
        $wp_customize->remove_control( 'shopay_services_items' );
        
        /**
         * Repeater field for Homepage services items
         *
         * Theme Options > Homepage > Services Section
         */
        $wp_customize->add_setting( 'shopay_services_items',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'mt_item_icon'  => '',
                            'mt_item_desc'  => '',
                            'mt_item_desc_long'  => ''
                        )
                    )
                ),
                'sanitize_callback' => 'shopay_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new Shopay_Control_Repeater(
            $wp_customize, 
            'shopay_services_items',
                array(
                    'priority'                      => 5,
                    'section'                       => 'shopay_section_home_services',
                    'settings'                      => 'shopay_services_items',
                    'label'                         => __( 'Services Items', 'shopay-store' ),
                    'shopay_box_label_text'         => __( 'Service Item','shopay-store' ),
                    'shopay_box_add_control_text'   => __( 'Add New Service','shopay-store' )
                ),
                array(
                    'mt_item_icon' => array(
                        'type'        => 'icon',
                        'label'       => __( 'Service Icon', 'shopay-store' ),
                        'description' => __( 'Choose required icon from available list.', 'shopay-store' )
                    ),
                    'mt_item_desc' => array(
                        'type'        => 'text',
                        'label'       => __( 'Description', 'shopay-store' ),
                        'description' => __( 'Add description for service item.', 'shopay-store' )
                    ),
                    'mt_item_desc_long' => array(
                        'type'        => 'text',
                        'label'       => __( 'Description ( Two )', 'shopay-store' ),
                        'description' => __( 'Add another description for service item.', 'shopay-store' )
                    )
                )
            )
        );
    }
     
endif;