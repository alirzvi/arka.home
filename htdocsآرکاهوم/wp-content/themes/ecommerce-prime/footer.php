<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecommerce_Prime
 */

?>
<?php if ( !is_front_page() || ( is_front_page() && class_exists( 'WooCommerce' ) && is_shop() ) ): ?>
</div><!-- #content -->
<?php endif; ?>


<?php
if( !is_home() && !is_front_page() ){
    get_template_part('template-parts/footer/footer', 'subscribe');
}
$default = ecommerce_prime_get_default_theme_options();
?>

<?php if( is_singular('post') ):
    // Single Posts Related Posts.
    ecommerce_prime_related_posts();
endif; ?>

<footer id="colophon" class="site-footer">
    <?php
    
    if ( is_active_sidebar('ecommerce-prime-footer-widget-0') || is_active_sidebar('ecommerce-prime-footer-widget-1') || is_active_sidebar('ecommerce-prime-footer-widget-2') ):

        
        $footer_column_layout = absint( get_theme_mod('footer_column_layout', $default['footer_column_layout'] ) ); ?>

        <div class="footer-top <?php echo 'footer-column-' . absint($footer_column_layout); ?>">
            <div class="wrapper">
                <div class="footer-grid twp-row">
                    <?php if ( is_active_sidebar('ecommerce-prime-footer-widget-0') ): ?>
                        <div class="column">
                            <?php dynamic_sidebar('ecommerce-prime-footer-widget-0'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar('ecommerce-prime-footer-widget-1') ): ?>
                        <div class="column">
                            <?php dynamic_sidebar('ecommerce-prime-footer-widget-1'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar('ecommerce-prime-footer-widget-2') ): ?>
                        <div class="column">
                            <?php dynamic_sidebar('ecommerce-prime-footer-widget-2'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if( has_nav_menu('twp-social-menu') || has_nav_menu('twp-footer-menu') ) { ?>
        <div class="footer-middle">
            <div class="wrapper">
                <div class="wrapper-row">
                    <?php if (has_nav_menu('twp-social-menu')) { ?>
                        <div class="column column-4 column-sm-12">
                            <div class="footer-social">
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
                        </div>
                    <?php } ?>
                    
                    
                    <?php if ( has_nav_menu('twp-footer-menu') ) { ?>
                        <div class="column column-8 column-sm-12">
                            <div class="footer-menu">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'twp-footer-menu',
                                    'menu_id' => 'footer-menu',
                                    'container' => 'div',
                                    'container_class' => 'menu',
                                    'depth' => 1,
                                ) ); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="footer-bottom">
        <div class="wrapper">
            <div class="footer-info">
                
                <div class="site-info">

                    <?php
                    $footer_copyright_text = wp_kses_post(get_theme_mod('footer_copyright_text', $default['footer_copyright_text']));
                    echo esc_html__('Copyright ', 'ecommerce-prime') . '&copy ' . absint(date('Y')) . ' <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . '" ><span>' . esc_html(get_bloginfo('name', 'display')) . '. </span></a> ' . esc_html($footer_copyright_text);

                    echo '<br>';
                    echo esc_html__('Theme: ', 'ecommerce-prime') . 'eCommerce Prime ' . esc_html__('By ', 'ecommerce-prime') . '<a rel="nofollow" href="' . esc_url('https://www.themeinwp.com/theme/ecommerce-prime') . '"  title="' . esc_attr__('ThemeInWP', 'ecommerce-prime') . '" target="_blank" rel="author"><span>' . esc_html__('ThemeInWP. ', 'ecommerce-prime') . '</span></a>';
                    echo esc_html__('Powered by ', 'ecommerce-prime') . '<a rel="nofollow" href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'ecommerce-prime') . '" target="_blank"><span>' . esc_html__('WordPress.', 'ecommerce-prime') . '</span></a>';
                    
                    ?>
                </div>

            </div>
        </div>
    </div>
</footer>

<?php get_template_part('template-parts/header/offcanvas', 'menu'); ?>
<?php get_template_part('template-parts/footer/footer', 'component'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
