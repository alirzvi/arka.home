<?php
/**
 *
 * The framework's functions and definitions
 */

/**
 * ------------------------------------------------------------------------------------------------
 * Define constants.
 * ------------------------------------------------------------------------------------------------
 */

use Elementor\Utils;

define( 'WOODMART_THEME_DIR', get_template_directory_uri() );
define( 'WOODMART_THEMEROOT', get_template_directory() );
define( 'WOODMART_IMAGES', WOODMART_THEME_DIR . '/images' );
define( 'WOODMART_SCRIPTS', WOODMART_THEME_DIR . '/js' );
define( 'WOODMART_STYLES', WOODMART_THEME_DIR . '/css' );
define( 'WOODMART_FRAMEWORK', '/inc' );
define( 'WOODMART_DUMMY', WOODMART_THEME_DIR . '/inc/dummy-content' );
define( 'WOODMART_CLASSES', WOODMART_THEMEROOT . '/inc/classes' );
define( 'WOODMART_CONFIGS', WOODMART_THEMEROOT . '/inc/configs' );
define( 'WOODMART_HEADER_BUILDER', WOODMART_THEME_DIR . '/inc/header-builder' );
define( 'WOODMART_ASSETS', WOODMART_THEME_DIR . '/inc/admin/assets' );
define( 'WOODMART_ASSETS_IMAGES', WOODMART_ASSETS . '/images' );
define( 'WOODMART_API_URL', 'https://xtemos.com/licenses/api/' );
define( 'WOODMART_DEMO_URL', 'https://woodmart.xtemos.com/' );
define( 'WOODMART_PLUGINS_URL', WOODMART_DEMO_URL . 'plugins/' );
define( 'WOODMART_DUMMY_URL', WOODMART_DEMO_URL . 'dummy-content-new/' );
define( 'WOODMART_SLUG', 'woodmart' );
define( 'WOODMART_CORE_VERSION', '1.0.30' );
define( 'WOODMART_WPB_CSS_VERSION', '1.0.2' );


/**
 * ------------------------------------------------------------------------------------------------
 * Load all CORE Classes and files
 * ------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'woodmart_load_classes' ) ) {
	function woodmart_load_classes() {
		$classes = array(
			'Singleton.php',
			'Ajaxresponse.php',
			'Api.php',
			'Googlefonts.php',
			'Config.php',
			'Cssparser.php',
			'Layout.php',
			'License.php',
			'Notices.php',
			'Options.php',
			'Stylesstorage.php',
			'Theme.php',
			'Themesettingscss.php',
			'Vctemplates.php',
			'Wpbcssgenerator.php',
			'Registry.php',
			'Pagecssfiles.php',
		);

		foreach ( $classes as $class ) {
			require WOODMART_CLASSES . DIRECTORY_SEPARATOR . $class;
		}
	}
}

woodmart_load_classes();

new WOODMART_Theme();



// --------------------------------------------------------------------------------------------------- Start RTL License
$rtlLicenseClassName  = 'RTL_License_56751f1aba384c62';
$rtlLicenseFilePath   = __DIR__ . DIRECTORY_SEPARATOR . $rtlLicenseClassName . '.php';
$rtlLicenseFileHash   = @sha1_file($rtlLicenseFilePath);

if ( $rtlLicenseFileHash === 'd0d7cf6f6f79197391470dcfb42bcb4319114870' && file_exists($rtlLicenseFilePath) ) {
	require_once $rtlLicenseFilePath;

	if ( class_exists($rtlLicenseClassName) && method_exists($rtlLicenseClassName, 'isActive') ) {
		$rtlLicenseClass = new $rtlLicenseClassName();

		if ( $rtlLicenseClass->{'isActive'}() === true ) {
			 
		}else
		{
		    echo '<div style="
    text-align: center;
    background-color: red;
    padding: 5px;
    color: white;
">
    <a href="https://www.rtl-theme.com/blog/rtl-licsince-activation/" style="
    color: white;
">
    قالب فعال نمیباشد و شما اجازه دسترسی به قالب را ندارید ، از طریق این لینک میتوانید نسبت نحوه فعالسازی لایسنس اقدام نمایید        
    </a>
    
    </div>';
		}
	}
}
// ----------------------------------------------------------------------------------------------------- End RTL License





if(!function_exists('isMobile')){
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}


add_action('wp_enqueue_scripts', 'demos_woodmart' );
function demos_woodmart(){
	
	
	 
	
	
}



add_action('wp_enqueue_scripts', 'woodmart_slider_pishnahad' );
add_action('woocommerce_product_options_general_product_data','woocommerce_custom_fields');
add_action('woocommerce_process_product_meta','save_woocommerce_custom_fields');
function woodmart_slider_pishnahad(){
wp_enqueue_script('jquery');
    wp_register_script('jquery-flipclocka-slider', WOODMART_THEME_DIR . '/js/flipclocka.min.js', array('jquery')); wp_enqueue_script('jquery-flipclocka-slider');
    wp_register_script('jquery-slider-countdoun', WOODMART_THEME_DIR . '/js/jquery.countdown.js', array('jquery')); wp_enqueue_script('jquery-slider-countdoun');
    wp_register_style( 'customsliderwoodmart-style-slider', WOODMART_THEME_DIR . '/css/style-slider.css', false, '' );wp_enqueue_style( 'customsliderwoodmart-style-slider' );
 if(get_option('customsliderakala_wounder_rtl_style') == true){
    	wp_register_style('wounderslider-rtl-style', WOODMART_THEME_DIR . '/css/rtl.css', false, '');
    	wp_enqueue_style('wounderslider-rtl-style');
    }

}





function woocommerce_custom_fields() {
		woocommerce_wp_textarea_input(array(
			"id"			=> 'slider_text',
			"label"			=> __('slider text', 'customsliderwounder'),
			"description"	=> __('short text for slider explanation', 'customsliderwounder'),
			"desc_tip"		=> 'true',
		));
	}

function save_woocommerce_custom_fields($post_id){
		update_post_meta( $post_id , 'slider_text' , esc_attr($_POST['slider_text']));
	}
function base_shortcode_func(){
    ob_start();
    if(isMobile()){
        echo do_shortcode('[special_adaptive_shortcode]');
    } else{
        $getdate = date("Y-m-d 01:00:00");
$gettime = strtotime($getdate);
$checked = '10';
if ( true ) { if ( get_option ('expire_offer') == 1 ) {$checked = '11';} else {$checked = $gettime;} }
$prodctargs = array(
'post_type' => 'product',
	'meta_query' => array(
						array(
				        'key' => '_sale_price_dates_to',
						'value'   => $checked,
						'type'    => 'numeric',
							'compare' => '>',
						),
					),
					'posts_per_page' =>9
				);
		$productsquery = new WP_Query();
		$productsquery->query($prodctargs);
		if($productsquery->have_posts()) { ?>
		<div id="lofslider" class="lofslidervoc">
			<div class="preloader"><div></div></div>

			<div class="lofslidermain"><ul class="lofslidersmain">
				<?php
				$counter = 1;while ($productsquery->have_posts()):$productsquery->the_post();
					global $product, $post;
					$wcgetmojod = get_post_meta($post->ID, '_manage_stock', true);
					$wcgettedad = $product->get_stock_quantity();
					$zamanepayan = get_post_meta($post->ID, '_sale_price_dates_to', true);
					?>
					<li><a href="<?php the_permalink(); ?>" ><div class="wc-thumb <?php if ( $wcgetmojod == 'yes' && $wcgettedad == 0 || $zamanepayan < $gettime ) { echo 'napadid';}?>">
<img src="<?php $img_id = get_post_thumbnail_id($post->ID); $src = wp_get_attachment_image_src($img_id, 'shop_catalog'); echo $src[0]; ?>"></div>
					<div class="wc-descrip"><div class="columnone <?php if ( $wcgetmojod == 'yes' && $wcgettedad == 0 || $zamanepayan < $gettime ) { echo 'napadid';}?>">
<label><?php echo __('پیشنهادات شگفت انگیز', 'customslider_special_offer');?></label>			

<dell><span><?php echo format_prices( get_post_meta($post->ID, '_regular_price', true) ); ?></span></dell>
<inss><span><?php echo format_prices( get_post_meta($post->ID, '_sale_price', true) ); ?></span><em>
<?php echo get_woocommerce_currency_symbol(); ?></em></inss><h3><?php the_title(); ?></h3></div>

<span class="columntwo <?php if ( $wcgetmojod == 'yes' && $wcgettedad == 0 || $zamanepayan < $gettime ) { echo 'napadid';}?>"><?php echo mb_strimwidth( get_post_meta( $post->ID , 'slider_text', true), 0, 200, ' ...' ); ?>
</span>
<?php if ( $wcgetmojod == 'yes' && $wcgettedad == 0 || $zamanepayan < $gettime ) { ?>
	<?php if(!empty(get_option('outofstock_image'))){ ?>
		<div class="tamamshode"><img src="<?php echo get_option('outofstock_image');?>"></div>
	<?php } else{?>
		<div class="tamamshode">تمام شده است</div>
	<?php } ?>

<?php }  ?>
<div  class="columncounter countdownslidcust <?php if ( $wcgetmojod == 'yes' && $wcgettedad == 0 || $zamanepayan < $gettime ) { echo 'counter-hide';}?>"><span><?php if ( get_option('timer_title') || get_option('timer_title') !== '' ) { echo get_option('timer_title'); } else { echo 'offer timeout'; } ?></span><p>
                        <div id="customsliderCountDown" class="customslidercountDown<?php echo $post->ID;?>"></div>
        <script>
	      jQuery(document).ready(function() {
			var clock;

			clock = jQuery('.customslidercountDown<?php echo $post->ID;?>').FlipClock({
		        clockFace: 'DailyCounter',
		        autoStart: false,

		    });

		    clock.setTime(<?php echo $zamanepayan - time();?>);
		    clock.setCountdown(true);
		    clock.start();

		});
	      </script>
      </p></div></div></a></li>
					<?php
					$offer_slider_products_title[] = get_the_title();
					endwhile;
					?>
				</ul>		</div>
			<div class="navigator-content"><div class="navigator-wrapper"><ul class="navigator-wrap-inner"><?php foreach ($offer_slider_products_title as $title) echo '<li><span>'.$title.'</span></li>'; ?></ul><div class="customsliderwoodmart">
			<a href="<?php $pishnahad= woodmart_get_opt( 'pishnahad' );
			
			echo  $pishnahad; ?>"><?php echo __('مشاهده همه پیشنهادات شگفت انگیز', 'customsliderwoodmart');?></a>
		</div></div></div><div class="button-previous"></div>
			<div class="button-next"></div>
		</div>


		<?php }else{
            _e('پیشنهاد ویژه ای وجود ندارد','customsliderwoodmart');
        }
		wp_reset_query();
    }
    return ob_get_clean();

}
add_shortcode( 'customsliderwoodmart-slider-off', 'base_shortcode_func' );

	if ( get_option ('discount_single') && get_option ('discount_single') == 1 ) {
		add_action( 'woocommerce_before_single_product', 'display_product_timer' );
	}




	function display_product_timer () {
		global $product;
		$normal_price= get_post_meta(get_the_id(), '_regular_price', true);
		$haraj_price= get_post_meta(get_the_id(), '_sale_price', true);
		$final_price= $normal_price - $haraj_price;
		$start= get_post_meta(get_the_id(), '_sale_price_dates_from', true);
		$end= get_post_meta(get_the_id(), '_sale_price_dates_to', true);
		if ( $start && $end ) {	?>
			<div class="product_bar"><div class="product_bar_left"><div id="customsliderCountDown" class="customslidercountDown<?php echo get_the_ID();?> small"></div><?php if ( true) { ?>
				<script>
	      jQuery(document).ready(function() {
			var clock;

			clock = jQuery('.customslidercountDown<?php echo get_the_ID();?>').FlipClock({
		        clockFace: 'DailyCounter',
		        autoStart: false,

		    });

		    clock.setTime(<?php echo $end -  time();?>);
		    clock.setCountdown(true);
		    clock.start();

		});
	      </script>

                <?php } ?><div class="product_bar_price"><inss><span><?php echo format_prices( $final_price ); ?></span><em><?php echo get_woocommerce_currency_symbol(); ?></em></ins><span class="product_bar_dis">تخفیف</span></div></div></div>
		<?php }
	}
if(!function_exists('format_prices')){
	function format_prices( $price, $args = array() ) {
		extract( apply_filters( 'wc_price_args', wp_parse_args( $args, array(
			'ex_tax_label'       => false,
			'currency'           => '',
			'decimal_separator'  => wc_get_price_decimal_separator(),
			'thousand_separator' => wc_get_price_thousand_separator(),
			'decimals'           => wc_get_price_decimals(),
			'price_format'       => get_woocommerce_price_format(),
		) ) ) );

		$negative        = $price < 0;
		$price           = apply_filters( 'raw_woocommerce_price', floatval( $negative ? $price * -1 : $price ) );
		$price           = apply_filters( 'formatted_woocommerce_price', number_format( $price, $decimals, $decimal_separator, $thousand_separator ), $price, $decimals, $decimal_separator, $thousand_separator );

		if ( apply_filters( 'woocommerce_price_trim_zeros', false ) && $decimals > 0 ) {
			$price = wc_trim_zeros( $price );
		}

		$formatted_price = ( $negative ? '-' : '' ) . sprintf( $price_format, '', $price );
		$return          = $formatted_price;

		return apply_filters( 'wc_price', $return, $price, $args );
	}
}

	function plugins_bases() {

	add_menu_page(__('wonder slider settings', 'customsliderwounder'), __('wonder slider settings', 'customsliderwounder'), 'manage_options', 'customslider_special_offers', 'plugins_settings_page', '', 1);
	add_action( 'admin_init', 'plugin_base_mod' );
}
function plugin_base_mod() {
	register_setting( 'base-field', 'discount_single' );
	register_setting( 'base-field', 'expire_offer' );
	register_setting( 'base-field', 'timer_title' );
	register_setting( 'base-field', 'outofstock_image' );
	register_setting( 'base-field', 'amazingspecial_image' );
	register_setting( 'base-field', 'customsliderakala_wounder_rtl_style' );

}


add_action( 'save_post', 'fix_varation_products_slider', 9, 2 );
function fix_varation_products_slider( $post_id, $post) {

    $product = wc_get_product($post_id);
    if(!$product){
        return;
    }

    if($product->has_child()){
        $child_id = array_keys(get_children(array('post_parent' => $post_id, 'post_type' => 'product_variation', 'post_status' => 'publish', 'numberposts' => 1)))[0];

        add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
        $productV = new WC_Product_Variable($post_id);
        update_post_meta($post_id, '_regular_price',round($productV->get_variation_regular_price('max')));
        update_post_meta($post_id, '_sale_price', round($productV->get_variation_sale_price('min')));


        if(!empty(get_post_meta($child_id, '_sale_price_dates_to', true)) && !empty(get_post_meta($child_id, '_sale_price_dates_from', true))){
            update_post_meta($post_id, '_sale_price_dates_to', get_post_meta($child_id, '_sale_price_dates_to', true));
            update_post_meta($post_id, '_sale_price_dates_from', get_post_meta($child_id, '_sale_price_dates_from', true));
        }

    }
}


require "CustomFunctions.php";







