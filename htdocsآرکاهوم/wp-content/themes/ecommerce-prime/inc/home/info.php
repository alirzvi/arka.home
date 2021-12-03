<?php
/**
* Info Function.
*
* @package eCommerce Prime
*/

if( !function_exists('ecommerce_prime_info') ):

    function ecommerce_prime_info( $ecommerce_prime_home_section ){

        $footer_quick_info_page_1 = isset( $ecommerce_prime_home_section->quick_info_1 ) ? $ecommerce_prime_home_section->quick_info_1 : '' ;
        $footer_quick_info_page_2 = isset( $ecommerce_prime_home_section->quick_info_2 ) ? $ecommerce_prime_home_section->quick_info_2 : '' ;
        $footer_quick_info_page_3 = isset( $ecommerce_prime_home_section->quick_info_3 ) ? $ecommerce_prime_home_section->quick_info_3 : '' ;
        $footer_quick_info_page_4 = isset( $ecommerce_prime_home_section->quick_info_4 ) ? $ecommerce_prime_home_section->quick_info_4 : '' ;

        $page_array = array( $footer_quick_info_page_1,$footer_quick_info_page_2,$footer_quick_info_page_3,$footer_quick_info_page_4 );
        
        ?>
        <div class="twp-blocks twp-info-block">

            <div class="upper-footer-bottom">
                <div class="wrapper">
                    <div class="wrapper-row">
                        <div class="column column-12">
                            <div class="quickinfo-block">
                                <div class="wrapper-row">

                                    <?php
                                    foreach( $page_array as $post_id ){

                                        if( $post_id ){

                                            $quick_info_query = new WP_Query( array( 'post_type' => 'page','posts_per_page' => 4, 'post__in' => array( $post_id ) ) );

                                            if( $quick_info_query->have_posts() ):
                                                while( $quick_info_query->have_posts() ){

                                                    $quick_info_query->the_post();
                                                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' ); ?>

                                                    <div class="column column-3 column-sm-6 quickinfo-block-grid">
                                                        <div class="quickinfo-single">

                                                            <?php if( $featured_image[0] ){ ?>
                                                                <div class="quickinfo-icon">
                                                                    <img src="<?php echo esc_url( $featured_image[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" >
                                                                </div>
                                                            <?php } ?>

                                                            <div class="quickinfo-details">
                                                                <h3 class="quickinfo-title">
                                                                    <?php the_title(); ?>
                                                                </h3>
                                                                <div class="quickinfo-desc">
                                                                    <?php if( has_excerpt() ){

                                                                      the_excerpt();

                                                                    }else{

                                                                        if( get_the_content() ){

                                                                            echo wp_kses_post( wp_trim_words( get_the_content(),20,'...') );

                                                                        }

                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                                }
                                                wp_reset_postdata();
                                            endif;

                                        }


                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
    }

endif;