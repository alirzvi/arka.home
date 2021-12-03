<?php
/**
* Custom Functions.
*
* @package eCommerce Prime
*/

if( !function_exists( 'ecommerce_prime_fonts_url' ) ) :

    //Google Fonts URL
    function ecommerce_prime_fonts_url(){

        $fonts_url = '';
        $fonts = array();

        $ecommerce_prime_font_1 = 'Open+Sans:300,300i,400,400i,600,600i,700,700i';

        $ecommerce_prime_fonts = array();
        $ecommerce_prime_fonts[] = $ecommerce_prime_font_1;

        $ecommerce_prime_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

        $i = 0;
        for ( $i = 0; $i < count( $ecommerce_prime_fonts ); $i++ ) {

            if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'ecommerce-prime' ), $ecommerce_prime_fonts[$i] ) ) {
                $fonts[] = $ecommerce_prime_fonts[$i];
            }

        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urldecode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw($fonts_url);
    }

endif;

if( !function_exists( 'ecommerce_prime_post_category_list' ) ) :

    // Post Category List.
    function ecommerce_prime_post_category_list(){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        $post_cat_cat_array[''] = esc_html__( '--Select Category--','ecommerce-prime' );

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;


if( !function_exists( 'ecommerce_prime_product_category_list' ) ) :

    // Post Category List.
    function ecommerce_prime_product_category_list(){

        $post_cat_lists = get_categories(
            array(
                'taxonomy'     => 'product_cat',
                'orderby'      => 'name',
                'show_count'   => 0,
                'pad_counts'   => 0,
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        $post_cat_cat_array[''] = esc_html__( '--Select Category--','ecommerce-prime' );

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists( 'ecommerce_prime_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function ecommerce_prime_sanitize_sidebar_option( $input ){
        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){
            return $input;
        }
        else{
            return '';
        }
    }

endif;


if( !function_exists( 'ecommerce_prime_sanitize_image_option' ) ) :

    // Sidebar Option Sanitize.
    function ecommerce_prime_sanitize_image_option( $input ){
        $metabox_options = array( 'global-image','enable-image','disable-image' );
        if( in_array( $input,$metabox_options ) ){
            return $input;
        }
        else{
            return '';
        }
    }

endif;

if( !function_exists( 'ecommerce_prime_posts_navigation' ) ) :

     // Posts Navigations.
    function ecommerce_prime_posts_navigation(){

        $default = ecommerce_prime_get_default_theme_options();
        $pagination_layout = esc_html( get_theme_mod( 'pagination_layout',$default['pagination_layout'] ) );

        if( $pagination_layout == 'classic' ){
            the_posts_navigation();
        }else{
            the_posts_pagination();
        }

    }

endif;

if( !function_exists( 'ecommerce_prime_breadcrumb' ) ) :

    // Trail Breadcrumb.
    function ecommerce_prime_breadcrumb(){ ?>

        <div class="twp-inner-banner">
            <div class="wrapper">

                <?php 
                $default = ecommerce_prime_get_default_theme_options();
                $breadcrumb_layout = get_theme_mod('breadcrumb_layout',$default['breadcrumb_layout']);

                if( $breadcrumb_layout != 'disable' && !is_front_page() ):
                        ecommerce_prime_breadcrumb_trail();
                endif; ?>

                <div class="twp-banner-details">

                    <?php
                    if( is_single() || is_page() ){

                        while (have_posts()) :
                            the_post();

                            if ( 'post' === get_post_type() ){
                                echo '<div class="entry-meta entry-meta-category">';
                                ecommerce_prime_entry_footer( $cats = true,$tags = false,$edits = false );
                                echo '</div>';
                            }

                            echo '<header class="entry-header">';
                            
                                echo '<h1 class="entry-title entry-title-big">';
                                the_title();
                                echo '</h1>';

                                if ( 'post' === get_post_type() ){ ?>

                                    <div class="entry-meta">
                                        <?php
                                        ecommerce_prime_posted_by();
                                        echo "<span class='sep-date-author'><i class='ion ion-ios-remove'></i></span>";
                                        ecommerce_prime_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->

                                <?php }

                                echo "</header>";

                            $ecommerce_prime_post_image = esc_html( get_post_meta( get_the_ID(), 'ecommerce_prime_post_image_option', true ) );

                            if( $ecommerce_prime_post_image == 'global-image' || $ecommerce_prime_post_image == '' ){

                                $ed_featured_image = get_theme_mod('ed_featured_image');
                                if( $ed_featured_image ){

                                    $ed_featured_image = false;

                                }else{

                                    $ed_featured_image = true;

                                }

                            }elseif( $ecommerce_prime_post_image == 'disable-image'){

                                $ed_featured_image = false;

                            }else{

                                $ed_featured_image = true;

                            }

                            if( $ed_featured_image ){
                                ecommerce_prime_post_thumbnail();
                            }

                            if( has_excerpt() ){
                                echo '<div class="twp-banner-excerpt">';
                                the_excerpt();
                                echo '</div>';
                            }

                        endwhile;

                    }

                    if( is_archive() ){ ?>
                        
                        <header class="page-header">
                            <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->

                    <?php 
                    }

                    if( is_search() ){ ?>

                        <header class="page-header">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'ecommerce-prime' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                            </h1>
                        </header><!-- .page-header -->

                    <?php } ?>

                </div>

            </div>
        </div>
    <?php
    }

endif;
add_action( 'ecommerce_prime_header_banner_x','ecommerce_prime_breadcrumb',20 );

if( !function_exists('ecommerce_prime_post_formate_icon') ):

    // Post Formate Icon.
    function ecommerce_prime_post_formate_icon( $formate ){

        if( $formate == 'video' ){
            $icon = 'ion-ios-play';
        }elseif( $formate == 'audio' ){
            $icon = 'ion-ios-musical-notes';
        }elseif( $formate == 'gallery' ){
            $icon = 'ion-md-images';
        }elseif( $formate == 'quote' ){
            $icon = 'ion-md-quote';
        }elseif( $formate == 'image' ){
            $icon = 'ion-ios-camera';
        }else{
            $icon = '';
        }

        return $icon;
    }

endif;

if( !function_exists('ecommerce_prime_check_woocommerce_page') ):
    
    // Check if woocommerce pages.
    function ecommerce_prime_check_woocommerce_page(){

        if( !class_exists( 'WooCommerce' ) ):
            return false;
        endif;

        if( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ){
            return true;
        }else{
            return false;
        }

    }
endif;

if( !function_exists('ecommerce_prime_page_lists') ):

    // Page Lists
    function ecommerce_prime_page_lists(){

        $pages = get_pages();

        $page_list = array();
        $page_list[] = esc_html__('--Select Page--','ecommerce-prime');

        if( $pages ){

            foreach( $pages as $page ){
                $page_list[$page->ID] = $page->post_title;
            }
        }

        return $page_list;
    }

endif;

if( !function_exists('ecommerce_prime_product_lists') ){

    // Products List
    function ecommerce_prime_product_lists(){

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
        );
        $product_list = array();
        $product_list[] = esc_html__('--Select Product--','ecommerce-prime');
        $products = new WP_Query( $args );

        if( $products->have_posts() ):

            while ( $products->have_posts() ) : $products->the_post();

               $product_list[ get_the_ID() ] = get_the_title();

            endwhile;

            wp_reset_query();

        endif;

        return $product_list;
    }

}

if ( ! function_exists( 'ecommerce_prime_cart_subtotal_escape' ) ) :
    
    /**
    * Sanitise Cart Subtotal
    */
    function ecommerce_prime_cart_subtotal_escape($input){

        $all_tags = array(
            'span'=>array(
                'class'=>array()
            )
         );
        return wp_kses($input,$all_tags);
        
    }
endif;

if( !function_exists('ecommerce_prime_assign_menu') ):
   
    // Assign menus to their locations.
    function ecommerce_prime_assign_menu() {
        
        $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'twp-primary-menu' => $main_menu->term_id,
                'twp-footer-menu' => $footer_menu->term_id,
                'twp-social-menu' => $social_menu->term_id,
            )
        );
    }
endif;
add_action( 'pt-ocdi/after_import', 'ecommerce_prime_assign_menu' );

function ecommerce_prime_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

    // Add sub menu toggles to the Expanded Menu with toggles.
    if ( isset( $args->show_toggles ) && $args->show_toggles ) {
        // Wrap the menu item link contents in a div, used for positioning.
        $args->before = '<div class="submenu-wrapper">';
        $args->after  = '';
        // Add a toggle to items with children.
        if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
            $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';
            // Add the sub menu toggle.
            $args->after .= '<button class="toggle submenu-toggle button-transparent" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'ecommerce-prime' ) . '</span>' . ecommerce_prime_get_theme_svg( 'chevron-down' ) . '</button>';
        }
        // Close the wrapper.
        $args->after .= '</div><!-- .submenu-wrapper -->';
        // Add sub menu icons to the primary menu without toggles.
    } elseif ( 'twp-primary-menu' === $args->theme_location ) {
        if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
            $args->after = '<span class="icon"></span>';
        } else {
            $args->after = '';
        }
    }

    return $args;
}
add_filter( 'nav_menu_item_args', 'ecommerce_prime_add_sub_toggles_to_main_menu', 10, 3 );

if( !function_exists('ecommerce_prime_the_theme_svg') ):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the Ecommerce_Prime_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function ecommerce_prime_the_theme_svg($svg_name, $return = false){
        if ($return) {
            return ecommerce_prime_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in ecommerce_prime_get_theme_svg();.
        } else {
            echo ecommerce_prime_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in ecommerce_prime_get_theme_svg();.
        }
    }
endif;
if( !function_exists('ecommerce_prime_get_theme_svg') ):
    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function ecommerce_prime_get_theme_svg($svg_name){
        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Ecommerce_Prime_SVG_Icons::get_svg($svg_name),
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'span' => array(
                    'class' => true,
                ),
            )
        );
        if (!$svg) {
            return false;
        }
        return $svg;
    }
endif;

if( !function_exists('ecommerce_prime_svg_sanitize') ):

    function ecommerce_prime_svg_sanitize($input){

        $svg = wp_kses(
            $input,
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'span' => array(
                    'class' => true,
                ),
            )
        );

        return $svg;
    }

endif;

add_filter('booster_extension_filter_ss_ed', 'ecommerce_prime_be_filter_ss_ed');
if( !function_exists('ecommerce_prime_be_filter_ss_ed') ):

    function ecommerce_prime_be_filter_ss_ed(){

        return false;

    }

endif;

if( class_exists( 'Booster_Extension_Class' ) ){

    add_filter('booster_extemsion_content_after_filter','ecommerce_prime_after_content_pagination');

}

if( !function_exists('ecommerce_prime_after_content_pagination') ):

    function ecommerce_prime_after_content_pagination($after_content){

        $pagination_single = wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecommerce-prime' ),
                    'after'  => '</div>',
                    'echo' => false
                ) );

        $after_content =  $pagination_single.$after_content;

        return $after_content;

    }

endif;