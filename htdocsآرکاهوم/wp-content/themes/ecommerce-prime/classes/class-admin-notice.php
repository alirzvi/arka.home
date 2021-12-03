<?php
if ( !class_exists('Ecommerce_Prime_Dashboard_Notice') ):

    class Ecommerce_Prime_Dashboard_Notice
    {
        function __construct()
        {	
            global $pagenow;
        	if( $this->ecommerce_prime_show_hide_notice() ){

	            if( is_multisite() ){

                  add_action( 'network_admin_notices',array( $this,'ecommerce_prime_admin_notiece' ) );

                } else {
                  add_action( 'admin_notices',array( $this,'ecommerce_prime_admin_notiece' ) );
                }
	        }
	        add_action( 'wp_ajax_ecommerce_prime_notice_dismiss', array( $this, 'ecommerce_prime_notice_dismiss' ) );
			add_action( 'switch_theme', array( $this, 'ecommerce_prime_notice_clear_cache' ) );
        }
        
        public static function ecommerce_prime_show_hide_notice( $status = false ){

            if( $status ){

                if( ( class_exists( 'Booster_Extension_Class' ) && 
                    class_exists( 'WooCommerce' ) && 
                    class_exists( 'WOOCS_STARTER' ) && 
                    class_exists( 'Demo_Import_Kit_Class' ) && 
                    class_exists( 'Themeinwp_Import_Companion' ) && 
                    Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','mailchimp-for-wp','mailchimp-for-wp.php' ) && 
                    Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-wishlist','init.php' ) && 
                    Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-quick-view','init.php' ) && 
                    Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-compare','init.php' ) && 
                    Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','woocommerce-currency-switcher','index.php' )  ) ||
                    get_option('twp_ecommerce_prime_admin_notice') ){

                    return false;

                }else{

                    return true;

                }

            }

            // Check If current Page 
            if ( isset( $_GET['page'] ) && $_GET['page'] == 'ecommerce-prime-about'  ) {
                return false;
            }

        	// Hide if dismiss notice
        	if( get_option('twp_ecommerce_prime_admin_notice') ){
				return false;
			}

        	// Hide if all plugin active
        	if( class_exists( 'Booster_Extension_Class' ) && 
                class_exists( 'WooCommerce' ) && 
                class_exists( 'WOOCS_STARTER' ) && 
                class_exists( 'Demo_Import_Kit_Class' ) && 
                class_exists( 'Themeinwp_Import_Companion' ) && 
                Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','mailchimp-for-wp','mailchimp-for-wp.php' ) && 
                Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-wishlist','init.php' ) && 
                Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-quick-view','init.php' ) && 
                Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','yith-woocommerce-compare','init.php' ) && 
                Ecommerce_Prime_Getting_started::ecommerce_prime_plugin_status_raw( '','woocommerce-currency-switcher','index.php' ) ){
                    return false;

            }

			// Hide On TGMPA pages
			if ( ! empty( $_GET['tgmpa-nonce'] ) ) {
				return false;
			}

			// Hide if user can't access
        	if ( current_user_can( 'manage_options' ) ) {
				return true;
			}
			
        }

        // Define Global Value
        public static function ecommerce_prime_admin_notiece(){

            ?>
            <div class="updated notice is-dismissible welcome-panel twp-ecommerce-prime-notice">

                <h3><?php esc_html_e('Quick Setup','ecommerce-prime'); ?></h3>

                <strong><p><?php esc_html_e('Install recommended plugins just by click button.','ecommerce-prime'); ?></p></strong>

                <p>
                    <a class="button button-primary twp-install-active" href="javascript:void(0)"><?php esc_html_e('Install and Active all recommended plugins.','ecommerce-prime'); ?></a>
                    <span class="theme-loading-area"><span class="theme-loading-icon"></span></span>
                    <a class="btn-dismiss twp-custom-setup" href="javascript:void(0)"><?php esc_html_e('No Thanks, I prefer custom setup.','ecommerce-prime'); ?></a>
                </p>

            </div>

        <?php
        }

        public function ecommerce_prime_notice_dismiss(){

        	if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_wpnonce' ] ) ), 'ecommerce_prime_ajax_nonce' ) ) {

	        	update_option('twp_ecommerce_prime_admin_notice','hide');

	        }

            die();

        }

        public function ecommerce_prime_notice_clear_cache(){

        	update_option('twp_ecommerce_prime_admin_notice','');

        }

    }
    new Ecommerce_Prime_Dashboard_Notice();
endif;