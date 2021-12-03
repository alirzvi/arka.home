<?php
/**
 * Template Name: Woocommerce Login/Register
 **/
get_header();

    if ( class_exists( 'WooCommerce' ) ) {

        if ( is_active_sidebar('ecommerce-prime-login-page-widget') ){
            $wraper_class = 'column column-6 column-xs-12';
        }else{
            $wraper_class = 'column column-12';
        } ?>
        <div class="twp-blocks twp-blocks-account">

                <div class="wrapper-row">
                    <div class="<?php echo esc_attr( $wraper_class ); ?>">
                        <div class="twp-account-panel">
                            <div class="twp-account-header">
                                <ul class="nav twp-nav-tabs twp-tabs-horizontal twp-nav-tabs-login-control" role="tablist">
                                    <li role="presentation" class="active">
                                        <a content-id="twp-login-area">
                                            <?php esc_html_e('Login','ecommerce-prime'); ?>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a content-id="twp-register-area">
                                            <?php esc_html_e('Register','ecommerce-prime'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="twp-login-area">
                                    <div class="twp-account-box twp-login-box">
                                        <?php do_action('ecommerce_prime_login_form_woocommerce_action'); ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="twp-register-area">
                                    <div class="twp-account-box twp-register-box">
                                        <?php do_action('ecommerce_prime_register_form_woocommerce_action'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ( is_active_sidebar('ecommerce-prime-login-page-widget') ): ?>
                        <div class="column column-6 column-xs-12">
                            <?php dynamic_sidebar('ecommerce-prime-login-page-widget'); ?>
                        </div>
                    <?php endif; ?>

                </div>

        </div>

    <?php
    }
get_footer();