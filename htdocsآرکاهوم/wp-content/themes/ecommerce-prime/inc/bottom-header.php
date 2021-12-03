<?php
/**
 * Header Product category Function.
 *
 * @package eCommerce Prime
 */


if (!function_exists('ecommerce_prime_bottom_header')):

    // Header product category.
    function ecommerce_prime_bottom_header(){

        $default = ecommerce_prime_get_default_theme_options();
        $ed_mid_header_product_category = get_theme_mod( 'ed_mid_header_product_category',$default['ed_mid_header_product_category'] );
        $ed_mid_header_wishlist = get_theme_mod( 'ed_mid_header_wishlist',$default['ed_mid_header_wishlist'] );
        $header_login_page_link = get_theme_mod( 'header_login_page_link',$default['header_login_page_link'] );
        $ed_mid_header_login_reg = get_theme_mod( 'ed_mid_header_login_reg',$default['ed_mid_header_login_reg'] );
        $header_product_cat = array(); ?>

            <div class="twp-secondary-navbar">
                <div class="wrapper-fluid">
                    <div class="twp-header-area">
                        

                        <div class="twp-headerarea-left">
                            <?php
                            if ( class_exists('WooCommerce') && $ed_mid_header_product_category ) {

                                ecommerce_prime_bottom_header_product_category();

                            }

                            ?>
                            <div class="navbar-controls hide-no-js">
                                <button type="button" class="navbar-control button-style button-transparent navbar-control-offcanvas">
                                    <span class="bars">
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="site-navigation">
                                <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'ecommerce-prime'); ?>" role="navigation">
                                <ul class="primary-menu">
                                    <?php
                                    if (has_nav_menu('twp-primary-menu')) {
                                        wp_nav_menu(
                                            array(
                                                'container' => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'twp-primary-menu',
                                                'show_sub_menu_icons' => true,
                                            )
                                        );
                                    }else{

                                        wp_list_pages(
                                            array(
                                                'match_menu_classes' => true,
                                                'show_sub_menu_icons' => true,
                                                'title_li' => false,
                                                'walker' => new Ecommerce_Prime_Walker_Page(),
                                            )
                                        );
                                    }
                                    ?>
                                </ul>
                            </nav><!-- .primary-menu-wrapper -->
                            </div>
                        </div>
                        <?php
                        if( class_exists('WooCommerce') && ( $ed_mid_header_login_reg || $ed_mid_header_wishlist ) ){ ?>

                            <div class="twp-headerarea-right">

                                <?php if( $ed_mid_header_login_reg ){ ?>

                                    <div class="twp-user-mgmt header-right-item">
                                        <div class="twp-user-icon">
                                            <a href="<?php echo esc_url( $header_login_page_link ); ?>">
                                                <?php ecommerce_prime_the_theme_svg('user'); ?>
                                            </a>
                                        </div>
                                        <?php if( !is_user_logged_in() ): ?>
                                        <div class="twp-user-tools hidden-small hidden-extra-small">
                                            <a href="<?php echo esc_url( $header_login_page_link ); ?>" class="user-tools-link twp-user-login">
                                                <?php esc_html_e('Log in','ecommerce-prime'); ?>
                                            </a>
                                            <a href="<?php echo esc_url( $header_login_page_link ); ?>" class="user-tools-link twp-user-register">
                                                <?php esc_html_e('Register','ecommerce-prime'); ?>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="twp-user-tools hidden-small hidden-extra-small">
                                            <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="user-tools-link twp-user-myaccount">
                                                <?php esc_html_e('My Account','ecommerce-prime'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    </div>

                                <?php } ?>

                                <?php if ( class_exists('YITH_WCWL') && $ed_mid_header_wishlist ) {
                                $header_wishlist_page_link = get_theme_mod( 'header_wishlist_page_link',$default['header_wishlist_page_link'] ); ?>
                                    <div class="twp-wishlist-count header-right-item">
                                        <a href="<?php echo esc_url( $header_wishlist_page_link ); ?>" class="twp-header-wishlist">
                                            <i class="nav-icon-right ion ion-md-heart-empty" aria-hidden="true"></i>
                                            <span class="twp-wishlist-count">
                                                <?php echo absint( yith_wcwl_count_all_products() ); ?>
                                            </span>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
    <?php
    }

endif;