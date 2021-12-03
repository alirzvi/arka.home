<?php
/**
* Advertise Image Function.
*
* @package eCommerce Prime
*/

if ( !function_exists( 'ecommerce_prime_image_advertise' ) ):

	function ecommerce_prime_image_advertise( $ecommerce_prime_home_section ){

		$lead_image_1 = isset( $ecommerce_prime_home_section->lead_image_1 ) ? $ecommerce_prime_home_section->lead_image_1 : '' ;
		$lead_image_1_link = isset( $ecommerce_prime_home_section->lead_image_1_link ) ? $ecommerce_prime_home_section->lead_image_1_link : '' ;
        $lead_image_title_1 = isset( $ecommerce_prime_home_section->lead_image_title_1 ) ? $ecommerce_prime_home_section->lead_image_title_1 : '' ;

		$lead_image_2 = isset( $ecommerce_prime_home_section->lead_image_2 ) ? $ecommerce_prime_home_section->lead_image_2 : '' ;
		$lead_image_2_link = isset( $ecommerce_prime_home_section->lead_image_2_link ) ? $ecommerce_prime_home_section->lead_image_2_link : '' ;
        $lead_image_title_2 = isset( $ecommerce_prime_home_section->lead_image_title_2 ) ? $ecommerce_prime_home_section->lead_image_title_2 : '' ;

		$lead_image_3 = isset( $ecommerce_prime_home_section->lead_image_3 ) ? $ecommerce_prime_home_section->lead_image_3 : '' ;
		$lead_image_3_link = isset( $ecommerce_prime_home_section->lead_image_3_link ) ? $ecommerce_prime_home_section->lead_image_3_link : '' ;
        $lead_image_title_3 = isset( $ecommerce_prime_home_section->lead_image_title_3 ) ? $ecommerce_prime_home_section->lead_image_title_3 : '' ;

		$lead_image_4 = isset( $ecommerce_prime_home_section->lead_image_4 ) ? $ecommerce_prime_home_section->lead_image_4 : '' ;
		$lead_image_4_link = isset( $ecommerce_prime_home_section->lead_image_4_link ) ? $ecommerce_prime_home_section->lead_image_4_link : '' ;
        $lead_image_title_4 = isset( $ecommerce_prime_home_section->lead_image_title_4 ) ? $ecommerce_prime_home_section->lead_image_title_4 : '' ;

		$lead_image_5 = isset( $ecommerce_prime_home_section->lead_image_5 ) ? $ecommerce_prime_home_section->lead_image_5 : '' ;
		$lead_image_5_link = isset( $ecommerce_prime_home_section->lead_image_5_link ) ? $ecommerce_prime_home_section->lead_image_5_link : '' ;
        $lead_image_title_5 = isset( $ecommerce_prime_home_section->lead_image_title_5 ) ? $ecommerce_prime_home_section->lead_image_title_5 : '' ;


        $lead_banner_type = isset( $ecommerce_prime_home_section->lead_banner_type ) ? $ecommerce_prime_home_section->lead_banner_type : '' ;
        if( $lead_banner_type == 'page' || $lead_banner_type == '' ){

            $lead_banner_page_1 = isset( $ecommerce_prime_home_section->lead_banner_page_1 ) ? $ecommerce_prime_home_section->lead_banner_page_1 : '' ;
            $lead_banner_page_2 = isset( $ecommerce_prime_home_section->lead_banner_page_2 ) ? $ecommerce_prime_home_section->lead_banner_page_2 : '' ;
            $lead_banner_page_3 = isset( $ecommerce_prime_home_section->lead_banner_page_3 ) ? $ecommerce_prime_home_section->lead_banner_page_3 : '' ;
            $lead_banner_page_4 = isset( $ecommerce_prime_home_section->lead_banner_page_4 ) ? $ecommerce_prime_home_section->lead_banner_page_4 : '' ;
            $lead_banner_page_5 = isset( $ecommerce_prime_home_section->lead_banner_page_5 ) ? $ecommerce_prime_home_section->lead_banner_page_5 : '' ;

            if( $lead_banner_page_1 || $lead_banner_page_2 || $lead_banner_page_3 || $lead_banner_page_4 || $lead_banner_page_5 ){ ?>

                <div class="twp-blocks home-lead-block light-bg">
                    <div class="wrapper">
                        <div class="wrapper-row wrapper-row-small">

                            <?php if( $lead_banner_page_1 || $lead_banner_page_2 ){ ?>

                                <div class="column column-3 column-sm-6 column-sm-order-2">

                                    <?php if( $lead_banner_page_1 ){

                                        $lead_banner_1_query = new WP_Query( array( 'post_type' => 'page', 'post_per_page' => 1, 'post__in' => array( $lead_banner_page_1 ) ) );

                                        if( $lead_banner_1_query->have_posts() ){

                                            while( $lead_banner_1_query->have_posts() ){
                                                $lead_banner_1_query->the_post();
                                                $featured_image = $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );
                                                $featured_image = $featured_image[0]; ?>

                                                <article class="story-panel-tiles">
                                                    <div class="post-panel block-bg-alt">
                                                        
                                                        <div class="post-thumb">
                                                            <a href="<?php the_permalink(); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image ); ?>">
                                                                <span class="data-bg-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="entry-content">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </article>

                                            <?php
                                            }

                                            wp_reset_postdata();

                                        }

                                    } ?>

                                    <?php if( $lead_banner_page_2 ){

                                        $lead_banner_2_query = new WP_Query( array( 'post_type' => 'page', 'post_per_page' => 1, 'post__in' => array( $lead_banner_page_2 ) ) );

                                        if( $lead_banner_2_query->have_posts() ){

                                            while( $lead_banner_2_query->have_posts() ){
                                                $lead_banner_2_query->the_post();
                                                $featured_image = $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );
                                                $featured_image = $featured_image[0]; ?>

                                                <article class="story-panel-tiles">
                                                    <div class="post-panel block-bg-alt">
                                                        
                                                        <div class="post-thumb">
                                                            <a href="<?php the_permalink(); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image ); ?>">
                                                                <span class="data-bg-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="entry-content">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </article>

                                            <?php
                                            }

                                            wp_reset_postdata();

                                        }

                                    } ?>

                                </div>

                            <?php } ?>

                            

                            <?php if( $lead_banner_page_3 ){ ?>

                                <div class="column column-6 column-sm-12 column-sm-order-1">
                                    <?php
                                    $lead_banner_3_query = new WP_Query( array( 'post_type' => 'page', 'post_per_page' => 1, 'post__in' => array( $lead_banner_page_3 ) ) );

                                        if( $lead_banner_3_query->have_posts() ){

                                            while( $lead_banner_3_query->have_posts() ){
                                                $lead_banner_3_query->the_post();
                                                $featured_image = $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'larrge' );
                                                $featured_image = $featured_image[0]; ?>

                                                <article class="story-panel-tiles">
                                                    <div class="post-panel block-bg-alt">
                                                        
                                                        <div class="post-thumb">
                                                            <a href="<?php the_permalink(); ?>" class="data-bg data-bg-large" data-background="<?php echo esc_url( $featured_image ); ?>">
                                                                <span class="data-bg-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="entry-content">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </article>

                                            <?php
                                            }

                                            wp_reset_postdata();

                                        }
                                        ?>
                                </div>

                            <?php } ?>

                            <?php if( $lead_banner_page_4 || $lead_banner_page_5 ){ ?>

                                <div class="column column-3 column-sm-6 column-sm-order-3">

                                    <?php if( $lead_banner_page_4 ){

                                        $lead_banner_4_query = new WP_Query( array( 'post_type' => 'page', 'post_per_page' => 1, 'post__in' => array( $lead_banner_page_4 ) ) );

                                        if( $lead_banner_4_query->have_posts() ){

                                            while( $lead_banner_4_query->have_posts() ){
                                                $lead_banner_4_query->the_post();
                                                $featured_image = $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );
                                                $featured_image = $featured_image[0]; ?>

                                                <article class="story-panel-tiles">
                                                    <div class="post-panel block-bg-alt">
                                                        
                                                        <div class="post-thumb">
                                                            <a href="<?php the_permalink(); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image ); ?>">
                                                                <span class="data-bg-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="entry-content">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </article>

                                            <?php
                                            }

                                            wp_reset_postdata();

                                        }

                                    } ?>

                                    <?php if( $lead_banner_page_5 ){

                                        $lead_banner_5_query = new WP_Query( array( 'post_type' => 'page', 'post_per_page' => 1, 'post__in' => array( $lead_banner_page_5 ) ) );

                                        if( $lead_banner_5_query->have_posts() ){

                                            while( $lead_banner_5_query->have_posts() ){
                                                $lead_banner_5_query->the_post();
                                                $featured_image = $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium' );
                                                $featured_image = $featured_image[0]; ?>

                                                <article class="story-panel-tiles">
                                                    <div class="post-panel block-bg-alt">
                                                        
                                                        <div class="post-thumb">
                                                            <a href="<?php the_permalink(); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $featured_image ); ?>">
                                                                <span class="data-bg-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="entry-content">
                                                            <h3 class="entry-title entry-title-medium">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </article>

                                            <?php
                                            }

                                            wp_reset_postdata();

                                        }

                                    } ?>

                                </div>

                            <?php } ?>

                            

                        </div>
                    </div>
                </div>

            <?php
            }

        }else{

            if( $lead_image_1 || $lead_image_2 || $lead_image_3 || $lead_image_4 || $lead_image_5 ){ ?>

                <div class="twp-blocks home-lead-block light-bg">
                    <div class="wrapper">
                        <div class="wrapper-row wrapper-row-small">

                            <?php if( $lead_image_1 || $lead_image_2 ){ ?>

                                <div class="column column-3 column-sm-6 column-sm-order-2">

                                    <?php if( $lead_image_1 ){ ?>
                                        <article class="story-panel-tiles">
                                            <div class="post-panel block-bg-alt">
                                                <div class="post-thumb">
                                                    <a href="<?php echo esc_url( $lead_image_1_link ); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $lead_image_1 ); ?>">
                                                        <span class="data-bg-overlay"></span>
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h3 class="entry-title entry-title-medium">
                                                        <a href="<?php echo esc_url( $lead_image_1_link ); ?>">
                                                            <?php echo esc_html( $lead_image_title_1 ); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>

                                    <?php if( $lead_image_2 ){ ?>
                                        <article class="story-panel-tiles">
                                            <div class="post-panel block-bg-alt">
                                                <div class="post-thumb">
                                                    <a href="<?php echo esc_url( $lead_image_2_link ); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $lead_image_2 ); ?>">
                                                        <span class="data-bg-overlay"></span>
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h3 class="entry-title entry-title-medium">
                                                        <a href="<?php echo esc_url( $lead_image_2_link ); ?>">
                                                            <?php echo esc_html( $lead_image_title_2 ); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>

                                </div>

                            <?php } ?>

                            

                            <?php if( $lead_image_3 ){ ?>

                                <div class="column column-6 column-sm-12 column-sm-order-1">
                                    <article class="story-panel-tiles">
                                        <div class="post-panel block-bg-alt">
                                            <div class="post-thumb">
                                                <a href="<?php echo esc_url( $lead_image_3_link ); ?>" class="data-bg data-bg-large" data-background="<?php echo esc_url( $lead_image_3 ); ?>">
                                                    <span class="data-bg-overlay"></span>
                                                </a>
                                            </div>
                                            <div class="entry-content">
                                                <h3 class="entry-title entry-title-big">
                                                    <a href="<?php echo esc_url( $lead_image_3_link ); ?>">
                                                        <?php echo esc_html( $lead_image_title_3 ); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            <?php } ?>

                            <?php if( $lead_image_4 || $lead_image_5 ){ ?>

                                <div class="column column-3 column-sm-6 column-sm-order-3">

                                    <?php if( $lead_image_4 ){ ?>
                                        <article class="story-panel-tiles">
                                            <div class="post-panel block-bg-alt">
                                                <div class="post-thumb">
                                                    <a href="<?php echo esc_url( $lead_image_4_link ); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $lead_image_4 ); ?>">
                                                        <span class="data-bg-overlay"></span>
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h3 class="entry-title entry-title-medium">
                                                        <a href="<?php echo esc_url( $lead_image_4_link ); ?>">
                                                            <?php echo esc_html( $lead_image_title_4 ); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>

                                    <?php if( $lead_image_5 ){ ?>
                                        <article class="story-panel-tiles">
                                            <div class="post-panel block-bg-alt">
                                                <div class="post-thumb">
                                                    <a href="<?php echo esc_url( $lead_image_5_link ); ?>" class="data-bg data-bg-big" data-background="<?php echo esc_url( $lead_image_5 ); ?>">
                                                        <span class="data-bg-overlay"></span>
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h3 class="entry-title entry-title-medium">
                                                        <a href="<?php echo esc_url( $lead_image_5_link ); ?>">
                                                            <?php echo esc_html( $lead_image_title_5 ); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>

                                </div>

                            <?php } ?>

                            

                        </div>
                    </div>
                </div>

            <?php
            }

        }
		
	}

endif; ?>