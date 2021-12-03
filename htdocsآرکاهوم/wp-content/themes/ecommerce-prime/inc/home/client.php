<?php
/**
* Client Function.
*
* @package eCommerce Prime
*/

if( !function_exists('ecommerce_prime_client') ):

    // Recommended Posts Functions.
    function ecommerce_prime_client( $ecommerce_prime_home_section ){

        $client_post_category = isset( $ecommerce_prime_home_section->post_category ) ? $ecommerce_prime_home_section->post_category : '' ;
        $slider_client_type = isset( $ecommerce_prime_home_section->slider_client_type ) ? $ecommerce_prime_home_section->slider_client_type : '' ;
        $banner_slide_page_1 = isset( $ecommerce_prime_home_section->banner_slide_page_1 ) ? $ecommerce_prime_home_section->banner_slide_page_1 : '' ;
        $banner_slide_page_2 = isset( $ecommerce_prime_home_section->banner_slide_page_2 ) ? $ecommerce_prime_home_section->banner_slide_page_2 : '' ;
        $banner_slide_page_3 = isset( $ecommerce_prime_home_section->banner_slide_page_3 ) ? $ecommerce_prime_home_section->banner_slide_page_3 : '' ;
        $banner_slide_page_4 = isset( $ecommerce_prime_home_section->banner_slide_page_4 ) ? $ecommerce_prime_home_section->banner_slide_page_4 : '' ;
        $banner_slide_page_5 = isset( $ecommerce_prime_home_section->banner_slide_page_5 ) ? $ecommerce_prime_home_section->banner_slide_page_5 : '' ;
        $banner_slide_page_6 = isset( $ecommerce_prime_home_section->banner_slide_page_6 ) ? $ecommerce_prime_home_section->banner_slide_page_6 : '' ;
        $banner_slide_page_7 = isset( $ecommerce_prime_home_section->banner_slide_page_7 ) ? $ecommerce_prime_home_section->banner_slide_page_7 : '' ;
        $banner_slide_page_8 = isset( $ecommerce_prime_home_section->banner_slide_page_8 ) ? $ecommerce_prime_home_section->banner_slide_page_8 : '' ;
        $banner_slide_page_9 = isset( $ecommerce_prime_home_section->banner_slide_page_9 ) ? $ecommerce_prime_home_section->banner_slide_page_9 : '' ;
        $banner_slide_page_10 = isset( $ecommerce_prime_home_section->banner_slide_page_10 ) ? $ecommerce_prime_home_section->banner_slide_page_10 : '' ;
        $ed_slider_autoplay    = isset( $ecommerce_prime_home_section->slider_autoplay ) ? $ecommerce_prime_home_section->slider_autoplay : '' ;
        $ed_slider_arrows  = isset( $ecommerce_prime_home_section->slider_arrows ) ? $ecommerce_prime_home_section->slider_arrows : '' ;
        $ed_slider_dots    =  isset( $ecommerce_prime_home_section->slider_dots ) ? $ecommerce_prime_home_section->slider_dots : '' ;

        if ( $ed_slider_autoplay != 'no' ) {
            $autoplay = 'true';
        }else{
            $autoplay = 'false';
        }
        if( $ed_slider_dots != 'no' ) {
            $dots = 'true';
        }else {
            $dots = 'false';
        }
        if( $ed_slider_arrows != 'no' ) {
            $arrows = 'true';
        }else {
            $arrows = 'false';
        }
        if( is_rtl() ) {
            $rtl = 'true';
        }else{
            $rtl = 'false';
        }

        $page_array = array( $banner_slide_page_1,$banner_slide_page_2,$banner_slide_page_3,$banner_slide_page_4,$banner_slide_page_5,$banner_slide_page_6,$banner_slide_page_7,$banner_slide_page_8,$banner_slide_page_9,$banner_slide_page_10 );
        

        if( $client_post_category || $banner_slide_page_1 || $banner_slide_page_2 || $banner_slide_page_3 || $banner_slide_page_4 || $banner_slide_page_5 || $banner_slide_page_6 || $banner_slide_page_7 || $banner_slide_page_8 || $banner_slide_page_9 || $banner_slide_page_10 ){ ?>

            <div class="twp-clients twp-blocks">
                <div class="wrapper">
                    <div class="wrapper-row">
                        <div class="column column-12">

                            <div class="twp-clients-carousal nav-slider-hidden" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

                                <?php
                                if( $slider_client_type == 'category' ){

                                    $client_post_query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 10, 'category_name' => esc_html( $client_post_category ) ) );

                                    if( $client_post_query->have_posts() ):

                                        while( $client_post_query->have_posts() ){
                                            $client_post_query->the_post();
                                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );

                                            if( $featured_image[0] ){ ?>

                                                <div class="clients-items">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo esc_url( $featured_image[0] ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                                                    </a>
                                                </div>

                                            <?php
                                            }
                                        }
                                        wp_reset_postdata();
                                    endif;

                                }else{

                                    foreach( $page_array as $post_id ){

                                        if( $post_id ){

                                            $client_post_query_2 = new WP_Query( array( 'post_type' => 'page','posts_per_page' => 10, 'post__in' => array( $post_id ) ) );

                                            if( $client_post_query_2->have_posts() ):

                                                while( $client_post_query_2->have_posts() ){
                                                    $client_post_query_2->the_post();
                                                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );

                                                    if( $featured_image[0] ){ ?>

                                                        <div class="clients-items">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <img src="<?php echo esc_url( $featured_image[0] ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                                                            </a>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                wp_reset_postdata();

                                            endif;

                                        }

                                    }


                                } ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
    }

endif;