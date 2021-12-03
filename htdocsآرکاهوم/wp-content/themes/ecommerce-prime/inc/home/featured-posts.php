<?php
/**
* Grid Posts Function.
*
* @package Infinity News
*/

if ( !function_exists( 'ecommerce_prime_featured_posts' ) ):

    // Header Grid Post.
    function ecommerce_prime_featured_posts( $ecommerce_prime_home_section ){

        $section_title = isset( $ecommerce_prime_home_section->section_title ) ? $ecommerce_prime_home_section->section_title : '' ;

        $featured_post_type = isset( $ecommerce_prime_home_section->featured_post_type ) ? $ecommerce_prime_home_section->featured_post_type : '' ;
        if( $featured_post_type == 'category' ){

            $featured_cat_1 = isset( $ecommerce_prime_home_section->featured_cat_1 ) ? $ecommerce_prime_home_section->featured_cat_1 : '' ;
            $featured_slider_cat = isset( $ecommerce_prime_home_section->featured_slider_cat ) ? $ecommerce_prime_home_section->featured_slider_cat : '' ;
            $featured_cat_2 = isset( $ecommerce_prime_home_section->featured_cat_2 ) ? $ecommerce_prime_home_section->featured_cat_2 : '' ;

        }else{
            $featured_cat_1 = isset( $ecommerce_prime_home_section->featured_product_cat_1 ) ? $ecommerce_prime_home_section->featured_product_cat_1 : '' ;
            $featured_slider_cat = isset( $ecommerce_prime_home_section->featured_product_slider_cat ) ? $ecommerce_prime_home_section->featured_product_slider_cat : '' ;
            $featured_cat_2 = isset( $ecommerce_prime_home_section->featured_product_cat_2 ) ? $ecommerce_prime_home_section->featured_product_cat_2 : '' ;
        }

        $ed_slider_autoplay    = isset( $ecommerce_prime_home_section->slider_autoplay ) ? $ecommerce_prime_home_section->slider_autoplay : '' ;
        $ed_slider_arrows  = isset( $ecommerce_prime_home_section->slider_arrows ) ? $ecommerce_prime_home_section->slider_arrows : '' ;
        $ed_slider_dots    =  isset( $ecommerce_prime_home_section->slider_dots ) ? $ecommerce_prime_home_section->slider_dots : '' ;

        ?>

        <div class="twp-blocks twp-featured-posts-blocks">
            <div class="wrapper">

                <div class="wrapper-row">
                    <div class="column column-12">
                        <header class="block-title-wrapper">

                            <div class="hr-line"></div>
                            <?php if( $section_title ){ ?>
                                <h2 class="block-title block-title-bg"><?php echo esc_html( $section_title ); ?></h2>
                            <?php } ?>

                        </header>
                    </div>
                </div>

                <div class="wrapper-row wrapper-row-small">
                    <?php
                    ecommerce_prime_banner_tile_block_1( $featured_cat_1, $featured_post_type );
                    ecommerce_prime_banner_tile_block_2( $featured_slider_cat, $ed_slider_autoplay, $ed_slider_arrows, $ed_slider_dots, $featured_post_type );
                    ecommerce_prime_banner_tile_block_3( $featured_cat_2, $featured_post_type );
                    ?>
                </div>
            </div>
        </div>

    <?php
    }
endif;

function ecommerce_prime_banner_tile_block_1( $featured_cat_1, $featured_post_type ){

    ?>
    <div class="column column-3 column-sm-6 column-sm-order-2">

        <?php

        if( $featured_post_type == 'category' ){

            $featured_query_1 = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => esc_html( $featured_cat_1 ),
                    'post__not_in' => get_option("sticky_posts"),
                )
            );

        }else{

            $featured_query_1 = new WP_Query(
                array( 
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => $featured_cat_1,
                            ),
                        ),
                ) 
            );

        }
        if( $featured_post_type == 'product' ){
            ?><ul class="twp-featured-products clearfix"><?php
        }
        while( $featured_query_1->have_posts() ){
            $featured_query_1->the_post(); 
            $featured_image_1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );

            if( $featured_post_type == 'category' ){ ?>

                <article class="story-leader story-leader-jumbotron story-leader-tiles">
                    <div class="post-panel block-bg-alt">
                        <div class="post-thumb">
                            <a href="" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image_1[0] ); ?>">
                                <span class="data-bg-overlay"></span>
                            </a>
                        </div>
                        <div class="entry-content">

                            <div class="entry-meta entry-meta-category">
                                <?php ecommerce_prime_entry_footer( $cats = true,$tags = false, $edits = false ); ?>
                            </div>

                            <h3 class="entry-title entry-title-big">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="entry-meta">
                                <?php
                                ecommerce_prime_posted_by();
                                echo "<span class='sep-date-author'><i class='ion ion-ios-remove'></i></span>";
                                ecommerce_prime_posted_on();
                                ?>
                            </div><!-- .entry-meta -->

                        </div>
                    </div>
                </article>

            <?php }else{

                wc_get_template_part( 'content', 'product' );

            }
        }

        if( $featured_post_type == 'product' ){
            ?></ul><?php
        }

        wp_reset_postdata(); ?>

    </div>
    <?php
}

function ecommerce_prime_banner_tile_block_2( $featured_slider_cat, $ed_slider_autoplay, $ed_slider_arrows, $ed_slider_dots, $featured_post_type ){

    ?>
    <div class="column column-6 column-sm-12 column-sm-order-1">

        <?php

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

        if( $featured_post_type == 'category' ){

            $featured_query_slider = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'category_name' => esc_html( $featured_slider_cat ),
                    'post__not_in' => get_option("sticky_posts"),
                )
            );

        }else{

            $featured_query_slider = new WP_Query(
                array( 
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => $featured_slider_cat,
                            ),
                        ),
                ) 
            );

        }

        if( $featured_post_type == 'product' ){
                ?><div class="twp-featured-slider" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'><?php
            }else{ ?>

                <div class="twp-featured-slider" data-slick='{"autoplay": <?php echo esc_attr( $autoplay ); ?>, "dots": <?php echo esc_attr( $dots ); ?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "rtl": <?php echo esc_attr( $rtl ); ?>}'>

            <?php } ?>

        
            <?php
            while( $featured_query_slider->have_posts() ){
                $featured_query_slider->the_post(); 
                $featured_image_1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );

                if( $featured_post_type == 'category' ){ ?>

                    <article class="story-leader story-leader-jumbotron story-leader-tiles">
                        <div class="post-panel block-bg-alt">
                            <div class="post-thumb">
                                <a href="" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image_1[0] ); ?>">
                                    <span class="data-bg-overlay"></span>
                                </a>
                            </div>
                            <div class="entry-content">

                                <div class="entry-meta entry-meta-category">
                                    <?php ecommerce_prime_entry_footer( $cats = true,$tags = false, $edits = false ); ?>
                                </div>

                                <h3 class="entry-title entry-title-big">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <div class="entry-meta">
                                    <?php
                                    ecommerce_prime_posted_by();
                                    echo "<span class='sep-date-author'><i class='ion ion-ios-remove'></i></span>";
                                    ecommerce_prime_posted_on();
                                    ?>
                                </div><!-- .entry-meta -->

                            </div>
                        </div>
                    </article>

                <?php }else{

                    wc_get_template_part( 'content', 'product' );

                }

            }
            wp_reset_postdata();

            if( $featured_post_type == 'product' ){
                ?></div><?php
            }else{ ?>

                </div>

            <?php } ?>

        

    </div>
    <?php

}

function ecommerce_prime_banner_tile_block_3( $featured_cat_2, $featured_post_type ){ ?>
        
    <div class="column column-3 column-sm-6 column-sm-order-3">

        <?php
        if( $featured_post_type == 'category' ){

            $featured_query_2 = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'category_name' => esc_html( $featured_cat_2 ),
                    'post__not_in' => get_option("sticky_posts"),
                )
            );

        }else{

            $featured_query_2 = new WP_Query(
                array( 
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => $featured_cat_2,
                            ),
                        ),
                ) 
            );

        }

        if( $featured_post_type == 'product' ){
            ?><ul class="twp-featured-products clearfix"><?php
        }

        while( $featured_query_2->have_posts() ){
            $featured_query_2->the_post(); 
            $featured_image_1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );

            if( $featured_post_type == 'category' ){ ?>

                <article class="story-leader story-leader-jumbotron story-leader-tiles">
                    <div class="post-panel block-bg-alt">
                        <div class="post-thumb">
                            <a href="" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image_1[0] ); ?>">
                                <span class="data-bg-overlay"></span>
                            </a>
                        </div>
                        <div class="entry-content">

                            <div class="entry-meta entry-meta-category">
                                <?php ecommerce_prime_entry_footer( $cats = true,$tags = false, $edits = false ); ?>
                            </div>

                            <h3 class="entry-title entry-title-big">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="entry-meta">
                                <?php
                                ecommerce_prime_posted_by();
                                echo "<span class='sep-date-author'><i class='ion ion-ios-remove'></i></span>";
                                ecommerce_prime_posted_on();
                                ?>
                            </div><!-- .entry-meta -->

                        </div>
                    </div>
                </article>

            <?php }else{

                wc_get_template_part( 'content', 'product' );

            }

        }

        if( $featured_post_type == 'product' ){
            ?></ul><?php
        }

        wp_reset_postdata(); ?>

    </div>
    <?php

}