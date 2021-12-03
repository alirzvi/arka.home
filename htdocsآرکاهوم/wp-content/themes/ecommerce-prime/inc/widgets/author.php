<?php
/**
 * Author Widgets.
 *
 * @package eCommerce Prime
 */

if ( !function_exists('ecommerce_prime_author_widgets') ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function ecommerce_prime_author_widgets(){

        // Auther widget.
        register_widget('Ecommerce_Prime_Author_widget');

    }
endif;
add_action('widgets_init', 'ecommerce_prime_author_widgets');

/*Video widget*/
if ( !class_exists('Ecommerce_Prime_Author_widget') ) :

    /**
     * Author widget Class.
     *
     * @since 1.0.0
     */
    class Ecommerce_Prime_Author_widget extends Ecommerce_Prime_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'ecommerce_prime_author_widget',
                'description' => esc_html__('Displays authors details in post.', 'ecommerce-prime'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'ecommerce-prime'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'image_bg_url' => array(
                    'label' => esc_html__('Widget Background Image:', 'ecommerce-prime'),
                    'type'  => 'image',
                ),
                'author-name' => array(
                    'label' => esc_html__('Name:', 'ecommerce-prime'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => esc_html__('Description:', 'ecommerce-prime'),
                    'type'  => 'textarea',
                    'class' => 'widget-content widefat'
                ),
                'image_url' => array(
                    'label' => esc_html__('Author Image:', 'ecommerce-prime'),
                    'type'  => 'image',
                ),
                'url-fb' => array(
                   'label' => esc_html__('Facebook URL:', 'ecommerce-prime'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-tw' => array(
                   'label' => esc_html__('Twitter URL:', 'ecommerce-prime'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-lt' => array(
                   'label' => esc_html__('Linkedin URL:', 'ecommerce-prime'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-ig' => array(
                   'label' => esc_html__('Instagram URL:', 'ecommerce-prime'),
                   'type' => 'esc_html__',
                   'class' => 'widefat',
                    ),
            );

            parent::__construct( 'ecommerce-prime-author-layout', esc_html__('EP: Author Widget', 'ecommerce-prime'), $opts, array(), $fields );
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance )
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if ( ! empty( $params['title'] ) ) {
                echo $args['before_title'] . $params['title'] . $args['after_title'];
            } ?>

            <div class="author-info <?php if( $params['image_bg_url'] ){ echo "author-bg-enable"; } ?>">
                <?php if ( ! empty( $params['image_bg_url'] ) ) { ?>
                    <div class="author-background bg-image">
                        <img src="<?php echo esc_url( $params['image_bg_url'] ); ?>">
                    </div>
                <?php } ?>
                <div class="author-avatar">
                    <?php if ( ! empty( $params['image_url'] ) ) { ?>
                        <div class="profile-image bg-image">
                            <img src="<?php echo esc_url( $params['image_url'] ); ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="author-details">
                    <?php if ( ! empty( $params['author-name'] ) ) { ?>
                        <h3 class="author-name"><?php echo esc_html( $params['author-name'] );?></h3>
                    <?php } ?>
                    <?php if ( ! empty( $params['description'] ) ) { ?>
                        <div class="author-bio"><?php echo wp_kses_post( $params['description']); ?></div>
                    <?php } ?>
                </div>
                <div class="author-social">
                    <?php if ( ! empty( $params['url-fb'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-fb'] ); ?>" target="_blank"><i class="ion ion-logo-facebook"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-tw'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-tw'] ); ?>" target="_blank"><i class="ion ion-logo-twitter"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-lt'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-lt'] ); ?>" target="_blank"><i class="ion ion-logo-linkedin"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-ig'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-ig'] ); ?>" target="_blank"><i class="ion ion-logo-instagram"></i></a>
                    <?php } ?>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;