<?php
/**
 * eCommerce Prime Theme Customizer
 *
 * @package Ecommerce_Prime
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_prime_customize_register( $wp_customize ) {

	/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/custom-control.php';

	/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/sanitize.php';

	/** Header Media Options. **/
	require get_template_directory() . '/inc/customizer/header-media.php';

	/** Header Options. **/
	require get_template_directory() . '/inc/customizer/header.php';

	/** Home Content Options. **/
	require get_template_directory() . '/inc/customizer/home/home-content.php';

	/** Layout Options. **/
	require get_template_directory() . '/inc/customizer/layout.php';

	/** Single Post Options. **/
	require get_template_directory() . '/inc/customizer/single.php';

	/** Footer Options. **/
	require get_template_directory() . '/inc/customizer/footer.php';

	if ( class_exists( 'WooCommerce' ) ) {
		/** Woocommerce. **/
		require get_template_directory() . '/inc/customizer/woocommerce.php';
	}

	/** Theme Options. **/
	require get_template_directory() . '/inc/customizer/theme-option.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ecommerce_prime_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ecommerce_prime_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'Ecommerce_Prime_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Ecommerce_Prime_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'eCommerce Prime Pro', 'ecommerce-prime' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'ecommerce-prime' ),
				'pro_url'  => esc_url('https://www.themeinwp.com/theme/ecommerce-prime-pro/'),
				'priority'  => 1,
			)
		)
	);

}
add_action( 'customize_register', 'ecommerce_prime_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ecommerce_prime_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ecommerce_prime_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ecommerce_prime_customize_preview_js() {
	wp_enqueue_script( 'ecommerce-prime-customizer', get_template_directory_uri() . '/assets/lib/default/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ecommerce_prime_customize_preview_js' );
