<?php 
add_action( 'wp_enqueue_scripts', 'phlox_child_theme_enqueue_styles' );
function phlox_child_theme_enqueue_styles() {
 	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 
		   
 /* HamyarWP.COM Feed AND Footer */
include get_stylesheet_directory().'/feed.class.php';

add_action( 'after_switch_theme', 'check_theme_dependencies', 10, 2 );

function check_theme_dependencies( $oldtheme_name, $oldtheme ) {

  if (!class_exists('hwpfeed')) :

    switch_theme( $oldtheme->stylesheet );
	
      return false;

  endif;

}

add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
function wp_generate_theme_initialize(  ) {
    echo base64_decode('2YHYp9ix2LPbjCDYs9in2LLbjCDZvtmI2LPYqtmHINiq2YjYs9i3OiA8YSBocmVmPSJodHRwczovL2hhbXlhcndwLmNvbS8/dXRtX3NvdXJjZT11c2Vyd2Vic2l0ZXMmdXRtX21lZGl1bT1mb290ZXJsaW5rJnV0bV9jYW1wYWlnbj1mb290ZXIiIHRhcmdldD0iX2JsYW5rIj7Zh9mF24zYp9ixINmI2LHYr9m+2LHYszwvYT4=');
}
add_action('after_setup_theme', 'setup_theme_after_run', 999);
function setup_theme_after_run() {
    if( empty(has_action( 'wordpress_theme_initialize',  'wp_generate_theme_initialize')) ) {
        add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
    }
}

include get_stylesheet_directory().'/hwp_inc/font_changer.php';