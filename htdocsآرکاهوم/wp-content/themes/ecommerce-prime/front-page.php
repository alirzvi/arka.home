<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce Prime
 */

get_header();
$default = ecommerce_prime_get_default_theme_options();
$twp_ecommerce_prime_home_sections = get_theme_mod( 'twp_ecommerce_prime_home_sections', json_encode( $default['twp_ecommerce_prime_home_sections'] ) );
$paged_active = false;
if ( !is_paged() ) {
	$paged_active = true;
}
$twp_ecommerce_prime_home_sections = json_decode( $twp_ecommerce_prime_home_sections );
$repeat_times = 1;

echo '<div class="home-sections-blocks">';
foreach( $twp_ecommerce_prime_home_sections as $ecommerce_prime_home_section ){
	
	$home_section_type = isset( $ecommerce_prime_home_section->home_section_type ) ? $ecommerce_prime_home_section->home_section_type : '' ;

	switch( $home_section_type ){

        case 'latest-post':
        $ed_latest_post = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;

        if( $ed_latest_post != 'no' ){

        $default = ecommerce_prime_get_default_theme_options(); ?>
        <div class="twp-blocks twp-block-blogs">
            <div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <?php
                        if( is_front_page() ):
                            ecommerce_prime_slider( $ecommerce_prime_home_section);
                        endif;

                        if ( have_posts() ) :

                            if ( is_home() && ! is_front_page() ) : ?>

                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>

                            <?php endif; ?>

                            <div class="twp-main-container">

                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();

                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', get_post_type() );

                                endwhile; ?>

                            </div>

                            <?php ecommerce_prime_posts_navigation();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <?php
                if( is_front_page() && !is_home() ){

                    $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$default['global_sidebar_layout'] ) );
                    $ecommerce_prime_post_sidebar_option = esc_html( get_post_meta( $post->ID, 'ecommerce_prime_post_sidebar_option', true ) );

                    if( $ecommerce_prime_post_sidebar_option == 'global-sidebar' || empty( $ecommerce_prime_post_sidebar_option ) ){
                        $ecommerce_prime_post_sidebar_option = $global_sidebar_layout;
                    }

                    if( $ecommerce_prime_post_sidebar_option != 'no-sidebar' ):

                        if( ecommerce_prime_check_woocommerce_page() && is_active_sidebar( 'ecommerce-prime-woocommerce-widget' ) && !is_cart() && !is_checkout() ){ ?>

                            <aside id="secondary" class="widget-area">
                                <?php dynamic_sidebar( 'ecommerce-prime-woocommerce-widget' ); ?>
                            </aside><!-- #secondary -->

                        <?php
                        }else{
                            get_sidebar();
                        }


                    endif;

                }else{

                    $sidebar_layout = isset( $ecommerce_prime_home_section->sidebar_layout ) ? $ecommerce_prime_home_section->sidebar_layout : '' ;
                    if( $sidebar_layout != 'no-sidebar' ):
                        get_sidebar();
                    endif;

                } ?>

            </div>
        </div>
		<?php
	
		}
		
        break;

        case 'latest-news':
		
		$ed_recommended_posts = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_recommended_posts == 'yes' && $paged_active ){
	        ecommerce_prime_latest_posts( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

        case 'tab-block-1':
		
		$ed_tab_block_1_posts = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( class_exists( 'WooCommerce' ) && $ed_tab_block_1_posts == 'yes' && $paged_active ){
	        ecommerce_prime_tab_block_1( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

         case 'tab-block-2':
		
		$ed_tab_block_2_posts = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( class_exists( 'WooCommerce' ) && $ed_tab_block_2_posts == 'yes' && $paged_active ){
	        ecommerce_prime_tab_block_2( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

        case 'carousel':
		
		$ed_carousel_posts = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( class_exists( 'WooCommerce' ) && $ed_carousel_posts == 'yes' && $paged_active ){
	        ecommerce_prime_tab_carousel( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

        case 'best-deal-slide':
		
		$ed_best_deal_slide_posts = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( class_exists( 'WooCommerce' ) && $ed_best_deal_slide_posts == 'yes' && $paged_active ){
	        ecommerce_prime_product_deal_slide( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

        case 'slide-banner':
		
		$ed_slide_banner_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_slide_banner_ed== 'yes' && $paged_active ){
	        ecommerce_prime_slide_banner( $ecommerce_prime_home_section,$repeat_times );
	    }

        break;

        case 'cta':
		
		$ed_cta_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_cta_ed== 'yes' && $paged_active ){
	        ecommerce_prime_cta( $ecommerce_prime_home_section );
	    }

        break;

        case 'testimonial':
		
		$ed_testimonial_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_testimonial_ed== 'yes' && $paged_active ){
	        ecommerce_prime_testimonial( $ecommerce_prime_home_section );
	    }

	    case 'featured-posts':
		
		$ed_featured_posts_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_featured_posts_ed == 'yes' && $paged_active ){
	        ecommerce_prime_featured_posts( $ecommerce_prime_home_section );
	    }

        break;

        case 'product-category':
		
		$ed_product_cat_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( class_exists( 'WooCommerce' ) && $ed_product_cat_ed== 'yes' && $paged_active ){
	        ecommerce_prime_product_category( $ecommerce_prime_home_section );
	    }

        break;

        case 'client':
		
		$ed_client_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_client_ed== 'yes' && $paged_active ){
	        ecommerce_prime_client( $ecommerce_prime_home_section );
	    }

        break;

        case 'advertise-area':
		
		$ed_advertise = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;

		if( $ed_advertise == 'yes' && $paged_active ){
	        ecommerce_prime_advertise( $ecommerce_prime_home_section );
	    }

        break;

        case 'lead-image-area':
		
		$ed_image_advertise = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;

		if( $ed_image_advertise == 'yes' && $paged_active ){
	        ecommerce_prime_image_advertise( $ecommerce_prime_home_section );
	    }

        break;

        case 'subscribe':
		
		$ed_subscribe = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;

		if( $ed_subscribe == 'yes' && $paged_active ){
	        ecommerce_prime_subscribe( $ecommerce_prime_home_section );
	    }

        break;

        case 'info':
		
		$ed_info = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;

		if( $ed_info == 'yes' && $paged_active ){
	        ecommerce_prime_info( $ecommerce_prime_home_section );
	    }

        break;

        default:

        $ed_slide_banner_ed = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		
		if( $ed_slide_banner_ed== 'yes' && $paged_active ){
	        ecommerce_prime_slide_banner( $ecommerce_prime_home_section,$repeat_times );
	    }

		break;

	}
$repeat_times++;
}

echo '</div>';

get_footer();
