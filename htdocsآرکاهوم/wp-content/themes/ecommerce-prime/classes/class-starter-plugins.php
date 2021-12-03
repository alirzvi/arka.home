<?php
if ( !class_exists('Ecommerce_Prime_Getting_started') ):

    class Ecommerce_Prime_Getting_started
    {   

        function __construct()
        {	

	        add_action( 'wp_ajax_ecommerce_prime_getting_started', array( $this, 'ecommerce_prime_getting_started' ) );

            // Include required libs for installation
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
            require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';
        }
        
        public static function ecommerce_prime_plugin_icon($plugin){

            $url = get_template_directory_uri();
            $icons = array(
                'booster-extension' => esc_url( $url.'/assets/images/be.jpg' ),
                'demo-import-kit' => esc_url( $url.'/assets/images/import-kit.jpg'),
                'themeinwp-import-companion' => esc_url( $url.'/assets/images/import-companion.jpg'),
                'woocommerce' => esc_url( $url.'/assets/images/woo.png'),
                'yith-woocommerce-wishlist' => esc_url( $url.'/assets/images/yith-woocommerce-wishlist.jpg'),
                'yith-woocommerce-quick-view' => esc_url( $url.'/assets/images/yith-woocommerce-quick-view.jpg'),
                'yith-woocommerce-compare' => esc_url( $url.'/assets/images/yith-woocommerce-compare.jpg'),
                'mailchimp-for-wp' => esc_url( $url.'/assets/images/mailchimp-for-wp.png'),
                'woocommerce-currency-switcher' => esc_url( $url.'/assets/images/woocommerce-currency-switcher.png'),
                'seo-friendly-urls-for-woocommerce' => esc_url( $url.'/assets/images/seo-friendly-url.jpg'),
            );
            return $icons[$plugin];
        }

        // Check Plugins Status
        public static function ecommerce_prime_plugin_status($plugin_class = '', $plugin_folder, $plugin_file){

            if( $plugin_class && class_exists( $plugin_class ) ){

                return array('status' => 'active','string' => esc_html__('Deactivate','ecommerce-prime') );

            }else{

                $path = WP_PLUGIN_DIR.'/'.esc_attr( $plugin_folder ).'/'.esc_attr( $plugin_file );

                if( file_exists( $path ) ) {

                    if( is_plugin_active ( esc_attr( $plugin_folder ).'/'.esc_attr( $plugin_file ) ) ){

                        return array('status' => 'active','string' => esc_html__('Deactivate','ecommerce-prime') );

                    }else{

                        return array('status' => 'deactivate','string' => esc_html__('Activate','ecommerce-prime') );

                    }

                }else{

                    return array('status' => 'not-install','string' => esc_html__('Install & Active','ecommerce-prime') );

                }

            }

            return;

        }

        public static function ecommerce_prime_plugin_status_raw($plugin_class = '', $plugin_folder, $plugin_file){

            $pluginstatus = Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status( $plugin_class, $plugin_folder, $plugin_file );

            $PluginStatus = $pluginstatus['status'];
            if( $PluginStatus == 'deactivate' ){
                return false;
            }else{
                return true;
            }

        }

        public static function ecommerce_prime_required_plugins(){

            return $plugin_lists = array(
                'booster-extension' => array(
                    'PluginFile' => 'booster-extension.php',
                    'class' => 'Booster_Extension_Class',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=booster-extension' ),
                ),
                'seo-friendly-urls-for-woocommerce' => array(
                    'PluginFile' => 'seo-friendly-urls-for-woocommerce.php',
                    'class' => 'Seo_Friendly_Urls_For_Woocommerce',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=seo-friendly-urls-for-woocommerce' ),
                ),
                'mailchimp-for-wp' => array(
                    'PluginFile' => 'mailchimp-for-wp.php',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=mailchimp-for-wp' ),
                ),
                'demo-import-kit' => array(
                    'PluginFile' => 'demo-import-kit.php',
                    'class' => 'Demo_Import_Kit_Class',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=demo-import-kit' ),
                ),
                'themeinwp-import-companion' => array(
                    'PluginFile' => 'themeinwp-import-companion.php',
                    'class' => 'Themeinwp_Import_Companion',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=demo-import-kit' ),
                ),
                'woocommerce' => array(
                    'PluginFile' => 'woocommerce.php',
                    'class' => 'WooCommerce',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=wc-admin' ),
                ),
                'yith-woocommerce-wishlist' => array(
                    'PluginFile' => 'init.php',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=yith_wcwl_panel' ),
                ),
                'yith-woocommerce-quick-view' => array(
                    'PluginFile' => 'init.php',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=yith_wcqv_panel' ),
                ),
                'yith-woocommerce-compare' => array(
                    'PluginFile' => 'init.php',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=yith_woocompare_panel' ),
                ),
                'woocommerce-currency-switcher' => array(
                    'PluginFile' => 'index.php',
                    'class' => 'WOOCS_STARTER',
                    'setting_page' => esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=wc-settings&tab=woocs' ),
                ),

            );

        }

        // Install Active Deactive
        public function ecommerce_prime_getting_started(){

            $nonce = isset( $_POST["_wpnonce"] ) ? sanitize_text_field( wp_unslash( $_POST["_wpnonce"] ) ) : '';

            if ( ! current_user_can('install_plugins') ) {
                wp_die( esc_html__( 'Sorry, you are not allowed to install plugins on this site.', 'ecommerce-prime' ) );
            }

            // Check our nonce, if they don't match then bounce!
            if (! wp_verify_nonce( $nonce, 'ecommerce_prime_ajax_nonce' )) {

                wp_die( esc_html__( 'Error - unable to verify nonce, please try again.', 'ecommerce-prime') );

            }

            $plugin_lists = array();

            if( isset( $_POST['single'] ) ){
                
                if( isset( $_POST['PluginStatus'] ) && 
                    isset( $_POST['PluginSlug'] ) && 
                    isset( $_POST['PluginFile'] ) && 
                    isset( $_POST['PluginFolder'] ) && 
                    isset( $_POST['PluginName'] ) &&
                    isset( $_POST['pluginClass'] ) ){

                    $plugin_lists = array(

                        $_POST['PluginSlug'] => array(
                            'PluginFile' => sanitize_text_field( wp_unslash( $_POST['PluginFile'] ) ),
                        )


                    );

                    if( $_POST['pluginClass'] ){
                        $plugin_lists[ $_POST['PluginSlug'] ]['class'] = sanitize_text_field( wp_unslash( $_POST['pluginClass'] ) );
                    }

                }

            }else{

                $plugin_lists = $this->ecommerce_prime_required_plugins();

            }

            foreach( $plugin_lists as $key => $plugin ){

                if( isset( $_POST['single'] ) ){

                    $PluginStatus = sanitize_text_field( wp_unslash( $_POST['PluginStatus'] ) );

                }else{
                    if( isset( $plugin['class'] ) ){
                        $plugin_class = $plugin_class;
                    }else{
                        $plugin_class = '';
                    }
                    $pluginstatus   = $this->ecommerce_prime_plugin_status( $plugin_class,$key,$plugin['PluginFile'] );
                    $PluginStatus = $pluginstatus['status'];

                }
                
                $plugin_file    = $plugin['PluginFile'];
                $plugin_dir     = ABSPATH . 'wp-content/plugins/'.esc_html( $key ).'/'.esc_html( $plugin_file );

                if( isset( $_POST['single'] ) && $PluginStatus == 'active' ) {

                    deactivate_plugins( $plugin_dir );
                    esc_html_e('Deactivated' , 'ecommerce-prime');
                    die();

                }elseif( $PluginStatus == 'deactivate' && file_exists($plugin_dir) ) {

                    activate_plugin($plugin_dir);

                    if( isset( $_POST['single'] ) ) {

                        esc_html_e('Activated' , 'ecommerce-prime');
                        die();

                    }

                }elseif( $PluginStatus == 'not-install' ){

                    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

                    $plugin_info = plugins_api(
                        'plugin_information',
                        array(
                            'slug'   => sanitize_key( wp_unslash( $key ) ),
                            'fields' => array(
                                'sections' => false,
                            ),
                        )
                    );

                    $skin     = new WP_Ajax_Upgrader_Skin();
                    $upgrader = new Plugin_Upgrader( $skin );
                    $upgrader->install($plugin_info->download_link);
                    $plugin_file = esc_html($key).'/'.esc_html($plugin_file);
                    
                    if( file_exists($plugin_dir) ) {

                        activate_plugin($plugin_dir);

                        if( isset( $_POST['single'] ) ) {

                            esc_html_e('Installed & Activated' , 'ecommerce-prime');
                            die();
                            
                        }

                    }

                    if( isset( $_POST['single'] ) ) {

                        esc_html_e('Failed' , 'ecommerce-prime');
                        die();

                    }

                }else{

                    if( isset( $_POST['single'] ) ) {

                        esc_html_e('Failed' , 'ecommerce-prime');
                        die();

                    }

                }

            }

            if( !isset( $_POST['single'] ) ) {

                echo esc_url( get_home_url(null, '/').'wp-admin/themes.php?page=ecommerce-prime-about' );

            }

            die();

        }

    }

    new Ecommerce_Prime_Getting_started();

endif;