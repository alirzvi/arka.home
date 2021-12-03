<?php
/**
 * eCommerce Prime functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ecommerce_Prime
 */

if (!function_exists('ecommerce_prime_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ecommerce_prime_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on eCommerce Prime, use a find and replace
         * to change 'ecommerce-prime' to the name of your theme in all the template files.
         */
        load_theme_textdomain('ecommerce-prime', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Starter Content
        add_theme_support( 'starter-content', array(
                'posts' => array(
                    'login' => array(
                        'post_type' => 'page',
                        'post_title' => esc_html__('Login','ecommerce-prime'),
                        'template' => 'template-parts/woocommerce-login.php',
                    ),
                    'wishlist' => array(
                        'post_type' => 'page',
                        'post_title' => esc_html__('Wishlist','ecommerce-prime'),
                        'post_content' => esc_html('[yith_wcwl_wishlist]','ecommerce-prime'),
                    ),
                ),
            )
        );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'twp-primary-menu' => esc_html__('Primary Menu', 'ecommerce-prime'),
            'twp-footer-menu' => esc_html__('Footer Menu', 'ecommerce-prime'),
            'twp-social-menu' => esc_html__('Social Menu', 'ecommerce-prime'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('ecommerce_prime_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        /*
         * Posts Formate.
         *
         * https://wordpress.org/support/article/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'video',
            'audio',
            'gallery',
            'quote',
            'image'
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        /**
         * Add theme support for gutenberg block
         *
         */
        add_theme_support( 'align-wide' );
    }
endif;
add_action('after_setup_theme', 'ecommerce_prime_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_prime_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('ecommerce_prime_content_width', 730);
}

add_action('after_setup_theme', 'ecommerce_prime_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function ecommerce_prime_scripts()
{
    $fonts_url = ecommerce_prime_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('ecommerce-prime-google-fonts', $fonts_url, array(), null);
    }
    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons.min.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/lib/slick/css/slick.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css');
    wp_enqueue_style('sidr-nav', get_template_directory_uri() . '/assets/lib/sidr/css/jquery.sidr.dark.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/lib/wow/css/animate.css');
    wp_enqueue_style('ecommerce-prime-style', get_stylesheet_uri());
   

    wp_enqueue_script('ecommerce-prime-skip-link-focus-fix', get_template_directory_uri() . '/assets/lib/default/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/lib/slick/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-sidr', get_template_directory_uri() . '/assets/lib/sidr/js/jquery.sidr.min.js', array('jquery'), '', true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/lib/theiaStickySidebar/theia-sticky-sidebar.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-matchHeight', get_template_directory_uri() . '/assets/lib/jquery-match-height/js/jquery.matchHeight.min.js', array('jquery'), '', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/lib/wow/js/wow.min.js', array('jquery'), '', true);
    wp_enqueue_script('ecommerce-prime-custom-script', get_template_directory_uri() . '/assets/lib/twp/js/script.js', array('jquery'), '', 1);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script( 'ecommerce-prime-ajax', get_template_directory_uri() . '/assets/lib/twp/js/ajax.js', array('jquery'), '', true );

    wp_localize_script( 
        'ecommerce-prime-ajax', 
        'ecommerce_prime_ajax',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
            'loadmore'   => esc_html__( 'Load More', 'ecommerce-prime' ),
            'nomore'     => esc_html__( 'No More Posts', 'ecommerce-prime' ),
            'loading'    => esc_html__( 'Loading...', 'ecommerce-prime' ),
         )
    );

}

add_action('wp_enqueue_scripts', 'ecommerce_prime_scripts',100);

/**
 * Admin enqueue scripts and styles.
 */
function ecommerce_prime_admin_scripts()
{

    wp_enqueue_style('ecommerce-prime-admin', get_template_directory_uri() . '/assets/lib/twp/css/admin.css');
    // Enqueue Script Only On Widget Page.
    wp_enqueue_media();
    wp_enqueue_script('ecommerce-prime-custom-widgets', get_template_directory_uri() . '/assets/lib/twp/js/widget.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ecommerce-prime-admin', get_template_directory_uri() . '/assets/lib/twp/js/admin.js', array('jquery'), '', 1);
    
    $ajax_nonce = wp_create_nonce('ecommerce_prime_ajax_nonce');
            
    wp_localize_script( 
        'ecommerce-prime-admin', 
        'ecommerce_prime_admin',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
            'ajax_nonce' => $ajax_nonce,
            'active' => esc_html__('Active','ecommerce-prime'),
            'deactivate' => esc_html__('Deactivate','ecommerce-prime'),
         )
    );
}

add_action('admin_enqueue_scripts', 'ecommerce_prime_admin_scripts');

/**
 * Customizer Enqueue scripts and styles.
 */
function ecommerce_prime_customizer_scripts()
{   
    wp_enqueue_script('jquery-ui-button');
    
    wp_enqueue_style('sifter', get_template_directory_uri() . '/assets/lib/twp/css/sifter.css');
    wp_enqueue_style('ecommerce-prime-customizer', get_template_directory_uri() . '/assets/lib/twp/css/customizer.css');
    wp_enqueue_script('ecommerce-prime-customizer', get_template_directory_uri() . '/assets/lib/twp/js/customizer.js', array('jquery','customize-controls'), '', 1);
    wp_enqueue_script('sifter', get_template_directory_uri() . '/assets/lib/twp/js/sifter.js', array('jquery','customize-controls'), '', 1);
    wp_enqueue_script('ecommerce-prime-repeater', get_template_directory_uri() . '/assets/lib/twp/js/repeater.js', array('jquery','customize-controls'), '', 1);
    wp_localize_script( 
        'ecommerce-prime-repeater', 
        'ecommerce_prime_repeater',
        array(
            'optionns'   =>  "<option value='slide-banner'>". esc_html__('Slide Banner Block','ecommerce-prime')."</option>
            <option value='product-category'>". esc_html__('Product Category Block','ecommerce-prime')."</option>
            <option value='tab-block-1'>". esc_html__('Tab Block 1','ecommerce-prime')."</option>
            <option value='carousel'>". esc_html__('Carousel Block','ecommerce-prime')."</option>
            <option value='tab-block-2'>". esc_html__('Tab Block 2','ecommerce-prime')."</option>
            <option value='cta'>". esc_html__('Call To Action','ecommerce-prime')."</option>
            <option value='best-deal-slide'>". esc_html__('Best Deal Slide','ecommerce-prime')."</option>
            <option value='latest-news'>". esc_html__('Ajax Infinity Load Blog Block','ecommerce-prime')."</option>
            <option value='testimonial'>". esc_html__('Testimonial','ecommerce-prime')."</option>
            <option value='featured-posts'>". esc_html__('Featured Posts Block','ecommerce-prime')."</option>
            <option value='client'>". esc_html__('Client','ecommerce-prime')."</option>
            <option value='info'>". esc_html__('Info Block','ecommerce-prime')."</option>
            <option value='advertise-area'>". esc_html__('Advertisement Block','ecommerce-prime')."</option>
            <option value='lead-image-area'>". esc_html__('Lead Image Block','ecommerce-prime')."</option>",
             'new_section'   =>  esc_html__('New Section','ecommerce-prime'),
             'uplolead_image'   =>  esc_html__('Choose Image','ecommerce-prime'),
             'use_imahe'   =>  esc_html__('Select','ecommerce-prime'),
         )
    );
}

add_action('customize_controls_enqueue_scripts', 'ecommerce_prime_customizer_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Home Sections Functions.
 */
require get_template_directory() . '/inc/home/slider.php';
require get_template_directory() . '/inc/home/latest-news.php';
require get_template_directory() . '/inc/home/tab-block-1.php';
require get_template_directory() . '/inc/home/tab-block-2.php';
require get_template_directory() . '/inc/home/carousel.php';
require get_template_directory() . '/inc/home/product-deal-slide.php';
require get_template_directory() . '/inc/home/cta.php';
require get_template_directory() . '/inc/home/testimonial.php';
require get_template_directory() . '/inc/home/featured-posts.php';
require get_template_directory() . '/inc/home/product-category.php';
require get_template_directory() . '/inc/home/client.php';
require get_template_directory() . '/inc/home/slide-banner.php';
require get_template_directory() . '/inc/home/advertise.php';
require get_template_directory() . '/inc/home/lead-image.php';
require get_template_directory() . '/inc/home/subscribe.php';
require get_template_directory() . '/inc/home/info.php';
require get_template_directory() . '/inc/header-category.php';

/**
 * Bottom Header Functions.
 */
require get_template_directory() . '/inc/bottom-header.php';

/**
 * Recommended Posts Functions.
 */
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-page.php';
require get_template_directory() . '/classes/class-starter-plugins.php';
require get_template_directory() . '/classes/class-about-page.php';
require get_template_directory() . '/classes/class-admin-notice.php';

/**
 * Related Posts Functions.
 */
require get_template_directory() . '/inc/single/related-posts.php';

/**
 * Sidebar Metabox.
 */
require get_template_directory() . '/inc/single/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Breadcrumb Trail
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Widget Register
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * TGM Plugin Recommendation.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Dynamic Style
 */
require get_template_directory() . '/assets/lib/twp/css/style.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined('JETPACK__VERSION') ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Woocommerce Plugin SUpport.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/advance-product-search.php';
    require get_template_directory() . '/inc/woocommerce.php';
    
    /**
    * Woocommerce Login Form
    **/
    require get_template_directory() . '/inc/woocommerce-login.php';
}