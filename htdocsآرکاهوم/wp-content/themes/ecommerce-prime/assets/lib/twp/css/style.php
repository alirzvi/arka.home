<?php
/**
 * eCommerce Prime Dynamic Styles
 *
 * @package eCommerce Prime
 */

function ecommerce_prime_dynamic_css()
{

    $ecommerce_prime_default = ecommerce_prime_get_default_theme_options();
    $background_color = '#' . get_theme_mod('background_color', 'ffffff');
    echo "<style type='text/css' media='all'>"; ?>

    #offcanvas-menu .offcanvas-wraper{
                background-color: <?php echo esc_attr($background_color); ?>;
        }

        <?php echo "</style>";
    }

add_action('wp_head', 'ecommerce_prime_dynamic_css', 100);
