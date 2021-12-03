<?php
/**
* Advertise Image Function.
*
* @package eCommerce Prime
*/

if ( !function_exists( 'ecommerce_prime_advertise' ) ):

	function ecommerce_prime_advertise( $ecommerce_prime_home_section ){

		$advertise_image = isset( $ecommerce_prime_home_section->advertise_image ) ? $ecommerce_prime_home_section->advertise_image : '' ;
		$advertise_link = isset( $ecommerce_prime_home_section->advertise_link ) ? $ecommerce_prime_home_section->advertise_link : '' ;
		if( $advertise_image ){ ?>

			<div class="home-lead-block twp-blocks">
			    <div class="wrapper">
			        <div class="wrapper-row">
			            <div class="column">
			                <a href="<?php echo esc_url( $advertise_link ); ?>" target="_blank" class="home-lead-link">
			                    <img src="<?php echo esc_url( $advertise_image ); ?>" alt="<?php esc_attr_e('Advertise Image','ecommerce-prime'); ?>">
			                </a>
			            </div>
			        </div>
			    </div>
			</div>

		<?php
		}
	}

endif; ?>