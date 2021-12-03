<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce Prime
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}

$default = ecommerce_prime_get_default_theme_options();
$ed_preloader = absint( get_theme_mod('ed_preloader', $default['ed_preloader'] ) );

if ( $ed_preloader && !is_customize_preview() ) {

    $preloader_text = esc_html( get_theme_mod('preloader_text', $default['preloader_text'] ) ); ?>

    <div class="preloader">
        <div class="preloader-inner">
            <svg class="tea" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="var(--secondary)" stroke-width="2"></path>
                <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="var(--secondary)" stroke-width="2"></path>
                <path id="teabag" fill="var(--secondary)" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
                <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="var(--secondary)"></path>
                <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="var(--secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php if( $preloader_text ){ ?>
                <div><?php echo esc_html( $preloader_text ); ?></div>
            <?php } ?>
        </div>
    </div>

<?php } ?>


<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'ecommerce-prime'); ?></a>

<?php
$header_advertise_image = esc_url(get_theme_mod('header_advertise_image'));
$header_advertise_link = esc_url(get_theme_mod('header_advertise_link'));

if ($header_advertise_image) { ?>
<div class="top-lead-banner">
    <?php if ($header_advertise_link) { ?>
        <a target="_blank" href="<?php echo esc_url($header_advertise_link) ?>">
            <?php } ?>
            <img src="<?php echo esc_url($header_advertise_image) ?>">
            <?php if ($header_advertise_link) { ?>
        </a>
    <?php } ?>
</div>
<?php } ?>

<header id="masthead" class="site-header">
    <div class="twp-primary-navbar">
        <div class="wrapper-fluid">
            <div class="twp-header-area">
                <div class="twp-headerarea twp-headerarea-left">
                    <?php if( is_active_sidebar('ecommerce-prime-offcanvas-widget') ): ?>
                        <button id="widgets-nav" class="icon-sidr">
                            <div class="trigger-icon">
                                <span class="menu-icon__line menu-icon__line-left"></span>
                                <span class="menu-icon__line"></span>
                                <span class="menu-icon__line menu-icon__line-right"></span>
                            </div>
                        </button>
                    <?php endif; ?>
                    <div class="site-branding">
                        <?php
                        the_custom_logo();
                        if (is_front_page() && is_home()) :
                            ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php
                        else :
                            ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </p>
                        <?php
                        endif;
                        $ecommerce_prime_description = get_bloginfo('description', 'display');
                        if ($ecommerce_prime_description || is_customize_preview()) :
                            ?>
                            <p class="site-description">
                                <span><?php echo esc_html($ecommerce_prime_description); /* WPCS: xss ok. */ ?></span>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="twp-headerarea twp-headerarea-center">
                    <?php
                    $ed_mid_header_search = esc_html( get_theme_mod( 'ed_mid_header_search',$default['ed_mid_header_search'] ) );
                    if ( class_exists('WooCommerce') && $ed_mid_header_search ) { ?>
                        <?php ecommerce_prime_product_search(); ?>
                    <?php } ?>
                </div>
                <div class="twp-headerarea twp-headerarea-right">
                    <?php if (has_nav_menu('twp-social-menu')) { ?>
                        <div class="social-icons hidden-extra-small">
                            <?php
                            wp_nav_menu(
                                array('theme_location' => 'twp-social-menu',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'fallback_cb' => false,
                                    'menu_class' => false,
                                    'depth' => 1,
                                )); ?>
                        </div>
                    <?php } ?>

                    <?php
                    $header_currency_switcher_shortcode = get_theme_mod('header_currency_switcher_shortcode');
                    if( $header_currency_switcher_shortcode ){
                        echo "<div class='twp-currency-switcher'>";
                        echo do_shortcode($header_currency_switcher_shortcode);
                        echo "</div>";
                    }
                    ?>

                    <?php
                    $ed_mid_header_cart = esc_html( get_theme_mod('ed_mid_header_cart', $default['ed_mid_header_cart'] ) );
                    if ( class_exists('WooCommerce') && $ed_mid_header_cart ) { ?>
                        <div class="twp-minicart">
                            <?php ecommerce_prime_woocommerce_header_cart(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <?php
    $ed_mid_header_product_category = esc_html( get_theme_mod( 'ed_mid_header_product_category',$default['ed_mid_header_product_category'] ) );
    $ed_mid_header_wishlist = esc_html( get_theme_mod( 'ed_mid_header_wishlist',$default['ed_mid_header_wishlist'] ) );
    $ed_mid_header_login_reg = esc_html( get_theme_mod( 'ed_mid_header_login_reg',$default['ed_mid_header_login_reg'] ) );

    if( $ed_mid_header_product_category ||
        $ed_mid_header_wishlist ||
        $ed_mid_header_login_reg ){

        ecommerce_prime_bottom_header();

    } ?>
</header>



<?php if (class_exists('WooCommerce')) {
    
    if ( is_store_notice_showing() ) { ?>

        <div class="twp-wc-notice">
            <?php woocommerce_demo_store(); ?>
        </div>
    
    <?php
    }

} ?>

<?php if ( ( ecommerce_prime_check_woocommerce_page() && ( is_cart() || is_checkout() ) ) || ( !ecommerce_prime_check_woocommerce_page() && !is_home() && !is_front_page() && !is_page_template( 'template-parts/woocommerce-login.php' ) ) ) {
    do_action('ecommerce_prime_header_banner_x');
} ?>

<?php if( has_custom_header() && is_home() && is_front_page() ){

    $header_medai_text = esc_html( get_theme_mod('header_medai_text') );
    $header_medai_button_label = esc_html( get_theme_mod('header_medai_button_label',$default['header_medai_button_label'] ) );
    $header_medai_text_link = esc_url( get_theme_mod('header_medai_text_link') );

    echo '<div class="twp-header-banner">';

        the_custom_header_markup();

        if( $header_medai_text ){ ?>
            <div class="header-intro">
                <div class="wrapper">
                    <div class="wrapper-row">
                        <div class="column column-8">
                            <div class="entry-content">

                                <h2 class="entry-title entry-title-large"><?php echo esc_html( $header_medai_text ); ?></h2>
                                <div class="block-link">
                                    <a href="<?php echo esc_url($header_medai_text_link); ?>" title="<?php echo esc_attr($header_medai_button_label); ?>" class="twp-btn twp-btn-radius twp-btn-outline">
                                        <?php echo esc_html($header_medai_button_label); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    echo '</div>';
} ?>

<?php if ( !is_front_page() || ( is_front_page() && class_exists( 'WooCommerce' ) && is_shop() ) ): ?>
    <div id="content" class="site-content">
<?php endif; ?>