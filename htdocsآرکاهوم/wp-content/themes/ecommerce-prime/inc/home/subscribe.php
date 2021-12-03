<?php
/**
* Mailchimp Function.
*
* @package eCommerce Prime
*/

if( !function_exists('ecommerce_prime_subscribe') ):

    function ecommerce_prime_subscribe( $ecommerce_prime_home_section ){

        $footer_newsletter_title = isset( $ecommerce_prime_home_section->section_title ) ? $ecommerce_prime_home_section->section_title : '' ;
        $footer_newsletter_desc = isset( $ecommerce_prime_home_section->section_desc ) ? $ecommerce_prime_home_section->section_desc : '' ;
        $footer_newsletter_shortcode = isset( $ecommerce_prime_home_section->mailchimp_shortcode ) ? $ecommerce_prime_home_section->mailchimp_shortcode : '' ;
        ?>
        <div class="twp-blocks twp-newsletter-subscription">
            <div class="upper-footer-top">
                <div class="wrapper">
                    <div class="wrapper-row">
                        <div class="column column-12">
                            <div class="newsletter-block">
                                <div class="wrapper-row">
                                    <div class="column column-6">

                                        <?php if( $footer_newsletter_title ){ ?>
                                            <h2 class="entry-title entry-title-medium">
                                                <?php echo esc_html ( $footer_newsletter_title ); ?>
                                            </h2>
                                        <?php } ?>

                                        <?php if( $footer_newsletter_desc ){ ?>
                                            <div class="block-subtitle">
                                                <?php echo esc_html ( $footer_newsletter_desc ); ?>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <?php if( $footer_newsletter_shortcode ){ ?>
                                        <div class="column column-6">
                                            <?php echo do_shortcode( $footer_newsletter_shortcode ); ?>
                                        </div>
                                    <?php } ?>

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