<?php
$default = ecommerce_prime_get_default_theme_options();
$twp_ecommerce_prime_home_sections = get_theme_mod( 'twp_ecommerce_prime_home_sections', json_encode( $default['twp_ecommerce_prime_home_sections'] ) );
$paged_active = false;
if ( !is_paged() ) {
	$paged_active = true;
}
$twp_ecommerce_prime_home_sections = json_decode( $twp_ecommerce_prime_home_sections );

foreach( $twp_ecommerce_prime_home_sections as $ecommerce_prime_home_section ){

	$home_section_type = isset( $ecommerce_prime_home_section->home_section_type ) ? $ecommerce_prime_home_section->home_section_type : '' ;
    switch( $home_section_type ){

        case 'subscribe':
		
		$ed_subscribe = isset( $ecommerce_prime_home_section->section_ed ) ? $ecommerce_prime_home_section->section_ed : '' ;
		$subacribe_ed_all_page = isset( $ecommerce_prime_home_section->subacribe_ed_all_page ) ? $ecommerce_prime_home_section->subacribe_ed_all_page : '' ;

		if( $ed_subscribe == 'yes' && $subacribe_ed_all_page == 'yes' && $paged_active ){
	        ecommerce_prime_subscribe( $ecommerce_prime_home_section );
	    }

        break;

        default:

		break;

	}

}
