<?php
/**
 * Template for Off canvas Menu
 * @since ecommerce-prime 1.0.0
 */
?>
<div id="offcanvas-menu">
    <div class="offcanvas-wraper">
        
        <div class="close-offcanvas-menu">
            <div class="offcanvas-close">
                <a href="javascript:void(0)" class="skip-link-offcanvas-start"></a>
                <button type="button" class="button-style button-transparent button-offcanvas-close">
                <span class="bars">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>
                </button>
            </div>
        </div>

        <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
            <h3 class="entry-title entry-title-medium">
                <?php esc_html_e('Main Navigation', 'ecommerce-prime'); ?>
            </h3>


            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'ecommerce-prime'); ?>" role="navigation">
                <ul class="primary-menu">
                    <?php
                    if( has_nav_menu('twp-primary-menu') ){

                        wp_nav_menu(
                            array(
                                'container' => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'twp-primary-menu',
                                'show_toggles' => true,
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


        <?php if (has_nav_menu('twp-social-menu')) { ?>
            <div class="offcanvas-social offcanvas-item">
                <h3 class="entry-title entry-title-medium">
                    <?php esc_html_e('Social profiles', 'ecommerce-prime'); ?>
                </h3>
                <div class="social-icons">
                    <?php
                    wp_nav_menu(
                        array('theme_location' => 'twp-social-menu',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                            'menu_id' => 'social-menu',
                            'fallback_cb' => false,
                            'menu_class' => false
                        )); ?>
                </div>
            </div>
        <?php } ?>

        <a href="javascript:void(0)" class="skip-link-offcanvas-end"></a>
    </div>
</div>