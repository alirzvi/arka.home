<?php
/**
* Widget FUnctions.
*
* @package eCommerce Prime
*/

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function ecommerce_prime_widgets_init()
{   
    $default = ecommerce_prime_get_default_theme_options();
    
    register_sidebar( array(
        'name' => esc_html__('Sidebar', 'ecommerce-prime'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'ecommerce-prime'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => esc_html__('Offcanvas Widget', 'ecommerce-prime'),
        'id' => 'ecommerce-prime-offcanvas-widget',
        'description' => esc_html__('Add widgets here.', 'ecommerce-prime'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name' => esc_html__('Login Page Widget', 'ecommerce-prime'),
        'id' => 'ecommerce-prime-login-page-widget',
        'description' => esc_html__('Add widgets here.', 'ecommerce-prime'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    $footer_column_layout = absint( get_theme_mod( 'footer_column_layout',$default['footer_column_layout'] ) );

    for( $i = 0; $i < $footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','ecommerce-prime'); }
    	if( $i == 1 ){ $count = esc_html__('Two','ecommerce-prime'); }
    	if( $i == 2 ){ $count = esc_html__('Three','ecommerce-prime'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'ecommerce-prime').$count,
	        'id' => 'ecommerce-prime-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'ecommerce-prime'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'ecommerce_prime_widgets_init');

/**
 * Widget Base Class.
 */
require get_template_directory() . '/inc/widgets/widget-base-class.php';

/**
 * Recent Post Widget.
 */
require get_template_directory() . '/inc/widgets/recent-post.php';

/**
 * Social Link Widget.
 */
require get_template_directory() . '/inc/widgets/social-link.php';

/**
 * Author Widget.
 */
require get_template_directory() . '/inc/widgets/author.php';

/**
 * Post Tabs Widget.
 */
require get_template_directory() . '/inc/widgets/tab-posts.php';

if ( class_exists( 'WooCommerce' ) ) {

    /**
     * Product Tabs Widget.
     */
    require get_template_directory() . '/inc/widgets/products-tab.php';

    /**
     * Product Lists Widget.
     */
    require get_template_directory() . '/inc/widgets/product-lists.php';

    /**
     * Product Category Widget.
     */
    require get_template_directory() . '/inc/widgets/product-category.php';

}

/**
 * Category Widget.
 */
require get_template_directory() . '/inc/widgets/category.php';