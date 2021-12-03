<?php
/**
 * Function for handling widgets files. 
 * 
 * @package Shopay
 * @subpackage Shopay Store
 * @since 1.0.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( !function_exists( 'shopay_store_widgets_init' ) ) :
    
    /**
     * Widget init function 
     * 
     */
    function shopay_store_widgets_init() {
        /**
         * Register widgets
         */
        unregister_widget( 'Shopay_Slider' );
        unregister_widget( 'Shopay_Services' );
        register_widget( 'Shopay_Store_Slider' );
        register_widget( 'Shopay_Store_Services' );
    }

endif;
add_action( 'widgets_init', 'shopay_store_widgets_init', 99 );

/**
 * Require widgets files
 * 
 */
require get_stylesheet_directory().'/inc/widgets/sps-slider-widget.php';
require get_stylesheet_directory().'/inc/widgets/sps-services.php';