<?php
/**
* Recommended Posts Function.
*
* @package eCommerce Prime
*/

if( !function_exists('ecommerce_prime_latest_posts') ):

	// Recommended Posts Functions.
	function ecommerce_prime_latest_posts( $ecommerce_prime_home_section,$repeat_times ){

		$recommended_post_title = isset( $ecommerce_prime_home_section->section_title ) ? $ecommerce_prime_home_section->section_title : '' ;
		$section_desc = isset( $ecommerce_prime_home_section->section_desc ) ? $ecommerce_prime_home_section->section_desc : '' ;
		$recommended_post_category = isset( $ecommerce_prime_home_section->post_category ) ? $ecommerce_prime_home_section->post_category : '' ;

        global $twp_paged;
		$twp_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $recommended_post_query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 3, 'category_name' => esc_html( $recommended_post_category ), 'paged'=>$twp_paged,'post__not_in' => get_option("sticky_posts") ) );

        if ( $recommended_post_query->have_posts() ): ?>

        	<div class="twp-blocks site-latest-news twp-latest-post-<?php echo esc_attr( $repeat_times ); ?>">
			    <div class="wrapper">
			        <?php
			        if( $recommended_post_title ){ ?>
                        <div class="wrapper-row">
                            <div class="column column-12">
                                <header class="block-title-header-2">
                                    <div class="block-title-wrapper">
                                        
                                        <h2 class="block-title">
                                            <?php echo esc_html( $recommended_post_title ); ?>
                                        </h2>

                                        <?php if( $section_desc ){ ?>
	                                        <div class="block-subtitle">
	                                            <?php echo esc_html( $section_desc ); ?>
	                                        </div>
	                                    <?php } ?>

                                    </div>
                                </header>
                            </div>
                        </div>
				    <?php } ?>
                    <div class="latest-blog-wrapper">
			        <div class="wrapper-row">
			        	<?php while( $recommended_post_query->have_posts() ):
			        		$recommended_post_query->the_post();

			        		$format = get_post_format( get_the_ID() ) ? : 'standard';
                            $icon = ecommerce_prime_post_formate_icon( $format );
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' ); ?>

				            <div class="column column-4 column-sm-6 column-xs-12 latest-news-load wow fadeInUp" data-wow-delay="0.3s">
				                <article class="latest-news-article">
				                    <div class="post-thumb">
				                        <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="data-bg data-bg-big"
				                           data-background="<?php echo esc_url( $featured_image[0] ); ?>">

			                                <?php if( !empty( $icon ) ){ ?>
                                                <span class="format-icon">
                                                    <i class="ion <?php echo esc_attr( $icon ); ?>"></i>
                                                </span>
                                            <?php } ?>

				                        </a>
				                    </div>

				                    <div class="entry-content">
                                        <div class="entry-meta entry-meta-category">
                                            <?php ecommerce_prime_entry_footer( $cats = true,$tags = false, $edits = false ); ?>
                                        </div>

				                        <h3 class="entry-title entry-title-medium">
				                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
				                        </h3>
				                    </div>

				                </article>
				            </div>

			        	<?php endwhile; ?>

			        </div>
                    </div>

			        <a href="javascript:void(0)" class="infinity-btn">
                        <span paged="2" repeat-time="<?php echo esc_attr( $repeat_times ); ?>" data-cat="<?php echo esc_attr( $recommended_post_category ); ?>" class="loadmore"><?php echo esc_html('Load More Posts','ecommerce-prime'); ?></span>
                    </a>

			    </div>
			</div>

		<?php
		wp_reset_postdata();
        endif;

	}

endif;