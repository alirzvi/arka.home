<?php
/**
* Slider Function.
*
* @package eCommerce Prime
*/

if ( !function_exists( 'ecommerce_prime_slider' ) ):

    // Header Slider
    function ecommerce_prime_slider( $ecommerce_prime_home_section ){

        $ed_slider  = isset( $ecommerce_prime_home_section->slider_ed ) ? $ecommerce_prime_home_section->slider_ed : '' ;
        

        if( $ed_slider != 'no' ) {
            
            $slider_category = isset( $ecommerce_prime_home_section->slider_category ) ? $ecommerce_prime_home_section->slider_category : '' ;
            $slider_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'category_name' => esc_html( $slider_category ) ) );

            if ( $slider_query->have_posts() ):

                $ed_slider_autoplay = isset( $ecommerce_prime_home_section->slider_autoplay ) ? $ecommerce_prime_home_section->slider_autoplay : '' ;
                $ed_slider_dots = isset( $ecommerce_prime_home_section->slider_dots ) ? $ecommerce_prime_home_section->slider_dots : '' ;
                $ed_slider_arrows = isset( $ecommerce_prime_home_section->slider_arrows ) ? $ecommerce_prime_home_section->slider_arrows : '' ;

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

                ?>
                <div class="latest-slider" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

                    <?php while( $slider_query->have_posts() ):

                        $slider_query->the_post();
                        $slider_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' ); ?>

                        <div class="slide-item">
                            <a href="<?php the_permalink(); ?>" class="slide-bg data-bg" data-background="<?php echo esc_url( $slider_image[0] ); ?>"></a>
                            <div class="slide-details">

                                <div class="entry-meta entry-meta-category">
                                    <?php ecommerce_prime_entry_footer( $cats = true,$tags = false ); ?>
                                </div>
                                
                                <h2 class="entry-title entry-title-medium">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>
                <?php
                wp_reset_postdata();
            endif;
        }
    }

endif;