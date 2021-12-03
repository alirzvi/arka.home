<?php
/**
* Tab Block 2 Function.
*
* @package eCommerce Prime
*/

if ( !function_exists( 'ecommerce_prime_tab_block_2' ) ):

    // Header Featured Post.
    function ecommerce_prime_tab_block_2( $ecommerce_prime_home_section,$repeat_times ){

        $categories = '';
        $product_category = isset( $ecommerce_prime_home_section->product_category ) ? $ecommerce_prime_home_section->product_category : '' ;
        $cat_array = array();
        $cat_array[] = $product_category;

        $tab_1_title = isset( $ecommerce_prime_home_section->section_title ) ? $ecommerce_prime_home_section->section_title : '' ;
        
        $slide_image_1 = isset( $ecommerce_prime_home_section->slide_image_1 ) ? $ecommerce_prime_home_section->slide_image_1 : '' ;
        $slide_image_2 = isset( $ecommerce_prime_home_section->slide_image_2 ) ? $ecommerce_prime_home_section->slide_image_2 : '' ;
        $slide_image_3 = isset( $ecommerce_prime_home_section->slide_image_3 ) ? $ecommerce_prime_home_section->slide_image_3 : '' ;

        $image_link_1 = isset( $ecommerce_prime_home_section->image_link_1 ) ? $ecommerce_prime_home_section->image_link_1 : '' ;
        $image_link_2 = isset( $ecommerce_prime_home_section->image_link_2 ) ? $ecommerce_prime_home_section->image_link_2 : '' ;
        $image_link_3 = isset( $ecommerce_prime_home_section->image_link_3 ) ? $ecommerce_prime_home_section->image_link_3 : '' ;

        $ed_slider_autoplay = isset( $ecommerce_prime_home_section->slider_autoplay ) ? $ecommerce_prime_home_section->slider_autoplay : '' ;
        $ed_slider_dots     = isset( $ecommerce_prime_home_section->slider_dots ) ? $ecommerce_prime_home_section->slider_dots : '' ;
        $ed_slider_arrows   = isset( $ecommerce_prime_home_section->slider_arrows ) ? $ecommerce_prime_home_section->slider_arrows : '' ;

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
        
        if( empty( $slide_image_1 ) && empty( $slide_image_2 ) && empty( $slide_image_3 ) ){
            $wraper_class = 'column-12';
        }else{
            $wraper_class = 'column-9';
        }

        if( $product_category ){

            $categories = '';
            $term = get_term_by('slug', $product_category, 'product_cat');
            if( $term ){
                $categories = get_terms( 'product_cat', ['child_of' => $term->term_id] );
            }

            if( $categories ){
                foreach( $categories as $category ){
                    $cat_array[] = $category->slug;
                }
            }
        }

        if( $product_category ){

            $tab_product_query = new WP_Query(
                array( 
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => $cat_array,
                            ),
                        ),
                ) 
            );

        }else{

             $tab_product_query = new WP_Query(
                array( 
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                ) 
            );

        } ?>
        
        <div class="twp-blocks twp-block-2 light-bg">
            <div class="wrapper">

                <div class="wrapper-row wrapper-row-small">
                    <div class="column column-12">
                        <header class="block-title-header-1">
                            <div class="block-title-wrapper">

                                <?php if ($tab_1_title) { ?>
                                    <h2 class="block-title">
                                        <?php echo esc_html($tab_1_title); ?>
                                    </h2>
                                <?php } ?>

                                <div class="title-controls">
                                    <ul class="nav twp-nav-tabs twp-tabs-horizontal twp-nav-tabs-control" role="tablist">
                                        <li role="presentation" class="active">
                                            <a tab-layout="horizontal" class="content-added" href="javascript:void(0)"
                                               indicator="new-arrive"
                                               main-cat="<?php echo esc_attr($product_category); ?>"
                                               aria-controls="new-arrive-<?php echo absint($repeat_times) ?>" role="tab"
                                               data-toggle="tab"><?php esc_html_e('New Arrivals', 'ecommerce-prime'); ?></a>
                                        </li>

                                        <li role="presentation">
                                            <a tab-layout="horizontal" href="javascript:void(0)"
                                               indicator="twp-best-seller"
                                               main-cat="<?php echo esc_attr($product_category); ?>"
                                               aria-controls="twp-best-seller-<?php echo absint($repeat_times) ?>"
                                               role="tab"
                                               data-toggle="tab"><?php esc_html_e('Best Sellers', 'ecommerce-prime'); ?></a>
                                        </li>

                                        <li role="presentation">
                                            <a tab-layout="horizontal" href="javascript:void(0)" indicator="best-deals"
                                               main-cat="<?php echo esc_attr($product_category); ?>"
                                               aria-controls="best-deals-<?php echo absint($repeat_times) ?>" role="tab"
                                               data-toggle="tab"><?php esc_html_e('Best Deals', 'ecommerce-prime'); ?></a>
                                        </li>
                                        <?php
                                        if ($categories) {
                                            foreach ($categories as $category) { ?>
                                                <li role="presentation">
                                                    <a tab-layout="horizontal" href="javascript:void(0)"
                                                       indicator="other-cat"
                                                       main-cat="<?php echo esc_attr($category->slug); ?>"
                                                       aria-controls="<?php echo esc_attr($category->slug); ?>-<?php echo absint($repeat_times) ?>"
                                                       role="tab"
                                                       data-toggle="tab"><?php echo esc_html($category->name); ?></a>
                                                </li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>
                <div class="wrapper-row wrapper-row-small">
                    <?php if( $slide_image_1 || $slide_image_2 || $slide_image_3 ){ ?>

                        <div class="column column-3 hidden-small hidden-extra-small">
                            <div class="twp-lead-images">
                                <div class="twp-lead-slider nav-slider-hidden slick-dotted" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

                                    <?php if( $slide_image_1 ){

                                        $attach_id_1 = attachment_url_to_postid( $slide_image_1 );
                                        $slide_image_1 = wp_get_attachment_image_src($attach_id_1, 'full')[0];
                                        $thumb_alt_1 = get_post_meta( $attach_id_1, '_wp_attachment_image_alt', true ); ?>
                                        <div class="twp-lead-items">
                                            <div class="twp-lead-image">
                                                <a href="<?php echo esc_url( $image_link_1 ); ?>" class="bg-image bg-image-lead">
                                                    <img src="<?php echo esc_url( $slide_image_1 ); ?>" alt="<?php echo esc_attr( $thumb_alt_1 ); ?>" title="<?php echo esc_attr( $thumb_alt_1 ); ?>" >
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if( $slide_image_2 ){ 

                                        $attach_id_2 = attachment_url_to_postid( $slide_image_2 );
                                        $slide_image_2 = wp_get_attachment_image_src($attach_id_2, 'full')[0];
                                        $thumb_alt_2 = get_post_meta( $attach_id_2, '_wp_attachment_image_alt', true );?>
                                        <div class="twp-lead-items">
                                            <div class="twp-lead-image">
                                                <a href="<?php echo esc_url( $image_link_2 ); ?>" class="bg-image bg-image-lead">
                                                    <img src="<?php echo esc_url( $slide_image_2 ); ?>" alt="<?php echo esc_attr( $thumb_alt_2 ); ?>" title="<?php echo esc_attr( $thumb_alt_2 ); ?>" >
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if( $slide_image_3 ){

                                        $attach_id_3 = attachment_url_to_postid( $slide_image_3 );
                                        $slide_image_3 = wp_get_attachment_image_src($attach_id_3, 'full')[0];
                                        $thumb_alt_3 = get_post_meta( $attach_id_3, '_wp_attachment_image_alt', true ); ?>
                                        <div class="twp-lead-items">
                                            <div class="twp-lead-image">
                                                <a href="<?php echo esc_url( $image_link_3 ); ?>" class="bg-image bg-image-lead">
                                                    <img src="<?php echo esc_url( $slide_image_3 ); ?>" alt="<?php echo esc_attr( $thumb_alt_3 ); ?>" title="<?php echo esc_attr( $thumb_alt_3 ); ?>" >
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="column <?php echo esc_attr( $wraper_class ); ?>">
                        <div class="tab-content store-tab-content clearfix">

                            <?php
                            if( $tab_product_query->have_posts() ){ ?>
                                <div role="tabpanel" class="tab-pane active" id="new-arrive-<?php echo absint( $repeat_times ) ?>">
                                    <div class="twp-products-wrapper">
                                        <ul class="twp-products-grid">
                                            <?php
                                            while( $tab_product_query->have_posts() ){
                                                $tab_product_query->the_post();

                                                    wc_get_template_part( 'content', 'product-2' );

                                            } ?>
                                        </ul>
                                    </div>

                                </div>
                            <?php wp_reset_postdata();
                            } ?>

                            <div role="tabpanel" class="tab-pane" id="twp-best-seller-<?php echo absint( $repeat_times ) ?>">
                                <ul class="twp-products-grid">

                                </ul>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="best-deals-<?php echo absint( $repeat_times ) ?>">
                                <ul class="twp-products-grid">

                                </ul>
                            </div>

                            <?php
                            if( $product_category && $categories ){
                                foreach( $categories as $category ){ ?>
                                    <div role="tabpanel" class="tab-pane" id="<?php echo esc_attr( $category->slug.'-'.$repeat_times ); ?>">
                                        <ul class="twp-products-grid">

                                        </ul>
                                    </div>
                                <?php }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php
    }

endif;