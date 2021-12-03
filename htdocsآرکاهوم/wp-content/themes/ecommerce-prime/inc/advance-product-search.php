<?php
/**
* Advance Product Functions.
*
* @package eCommerce Prime
*/

if( !function_exists('ecommerce_prime_product_search') ):

    // Advance Product Search
    function ecommerce_prime_product_search(){ ?>

        <div class="twp-product-search">
            <form class="twp-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="twp-search-wrapper">
                    <div class="twp-cat-list">
                        <?php
                        $cats = ecommerce_prime_get_product_categories();
                            
                            echo '<select class="twp-product-cats" id="twp-product-cat" name="product_cat">';
                                echo '<option value="">'. esc_html__( 'All Category', 'ecommerce-prime' ) .'</option>';
                                if ( count( $cats ) > 0 ) {
                                    foreach( $cats as $cat ) {
                                        if ( $cat->parent === 0 ) {
                                            echo '<option value="'.esc_attr( $cat->category_nicename ).'" '.esc_attr( ecommerce_prime_cat_selected( $cat->category_nicename ) ).'>'.esc_html( $cat->name ) .'</option>';
                                            $children = ecommerce_prime_get_product_categories(array('parent' => $cat->term_id ));
                                            if ( count($children) ) {
                                                foreach( $children as $ct ) {
                                                    echo '<option value="'.esc_attr( $ct->category_nicename ).'">&nbsp&nbsp'.esc_attr( $ct->name ).'</option>';
                                                }
                                            }
                                        }
                                    }
                                }
                            echo '</select>';
                           
                        ?>
                    </div>

                    <div class="twp-search-text">
                        <input type="hidden" name="post_type" value="product" />
                        <input type="text" name="s" class="twp-form-field" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'I\'m searching for...', 'ecommerce-prime' ); ?>"/>
                    </div>


                    <button type="submit" class="twp-search-submit">
                        Search
                    </button>

                </div>
            </form>
        </div>
        <?php

    }

endif;

if( !function_exists('ecommerce_prime_get_product_categories') ):

    // Get Product Sub Category
    function ecommerce_prime_get_product_categories( $args = array() ) {

        $args = wp_parse_args( $args, array(
                     'taxonomy'     => 'product_cat',
                     'orderby'      => 'name',
                     'show_count'   => 0,
                     'pad_counts'   => 0,
             ) );

        return get_categories( $args );

    }

endif;

if( !function_exists('ecommerce_prime_cat_selected') ):

    // Category Select on list after search
    function ecommerce_prime_cat_selected( $cat_nicename ) {

        $q_var = get_query_var( 'product_cat' );

        if ( $q_var === $cat_nicename ) {

            return esc_attr('selected="selected"');
        }

        return false;
    }

endif;