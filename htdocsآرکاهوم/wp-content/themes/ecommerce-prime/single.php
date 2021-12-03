<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ecommerce_Prime
 */

get_header();
$default = ecommerce_prime_get_default_theme_options();
global $post;
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());
                ?>

                <div class="twp-navigation-wrapper"><?php

                // Previous/next post navigation.
                the_post_navigation(array(
                    'next_text' => '<h2 class="entry-title entry-title-medium" aria-hidden="true">' . esc_html__('Next', 'ecommerce-prime') . '</h2> ' .
                        '<span class="screen-reader-text">' . esc_html__('Next post:', 'ecommerce-prime') . '</span> ' .
                        '<h3 class="entry-title entry-title-small">%title</h3>',
                    'prev_text' => '<h2 class="entry-title entry-title-medium" aria-hidden="true">' . esc_html__('Previous', 'ecommerce-prime') . '</h2> ' .
                        '<span class="screen-reader-text">' . esc_html__('Previous post:', 'ecommerce-prime') . '</span> ' .
                        '<h3 class="entry-title entry-title-small">%title</h3>',
                )); ?>

                </div><?php

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
$global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout', $default['global_sidebar_layout'] ) );
$ecommerce_prime_post_sidebar_option = esc_html( get_post_meta( $post->ID, 'ecommerce_prime_post_sidebar_option', true ) );

if ( $ecommerce_prime_post_sidebar_option == 'global-sidebar' || empty( $ecommerce_prime_post_sidebar_option ) ) {
    $ecommerce_prime_post_sidebar_option = $global_sidebar_layout;
}

if ( $ecommerce_prime_post_sidebar_option != 'no-sidebar' ):

    get_sidebar();

endif;

get_footer();
