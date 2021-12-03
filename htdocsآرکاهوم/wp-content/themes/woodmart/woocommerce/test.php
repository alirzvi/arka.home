<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_images_attr = $product_image_summary_class = '';

$product_images_class  	= woodmart_product_images_class();
$product_summary_class 	= woodmart_product_summary_class();
$single_product_class  	= woodmart_single_product_class();
$content_class 			= woodmart_get_content_class();
$product_design 		= woodmart_product_design();
$breadcrumbs_position 	= woodmart_get_opt( 'single_breadcrumbs_position' );
$image_width 			= woodmart_get_opt( 'single_product_style' );
$full_height_sidebar    = woodmart_get_opt( 'full_height_sidebar' );
$page_layout            = woodmart_get_opt( 'single_product_layout' );
$tabs_location 			= woodmart_get_opt( 'product_tabs_location' );
$reviews_location 		= woodmart_get_opt( 'reviews_location' );

//Full width image layout
if ( $image_width == 5 ) {
	if ( 'wpb' === woodmart_get_opt( 'page_builder', 'wpb' ) ) {
		$product_images_class .= ' vc_row vc_row-fluid vc_row-no-padding';
		$product_images_attr = 'data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true"';
	} else {
		$product_images_class .= ' wd-section-stretch-content';
	}
}

$container_summary = $container_class = $full_height_sidebar_container = 'container';

if ( $full_height_sidebar && $page_layout != 'full-width' ) {
	$single_product_class[] = $content_class;
	$product_image_summary_class = 'col-lg-12 col-md-12 col-12';
} else {
	$product_image_summary_class = $content_class;
}

if ( woodmart_get_opt( 'single_full_width' ) ) {
	$container_summary = 'container-fluid';
	$full_height_sidebar_container = 'container-fluid';
}

if ( $full_height_sidebar && $page_layout != 'full-width' ) {
	$container_summary = 'container-none';
	$container_class = 'container-none';
}

?>

<?php if ( ( ( $product_design == 'alt' && ( $breadcrumbs_position == 'default' || empty( $breadcrumbs_position ) ) ) || $breadcrumbs_position == 'below_header' ) && ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) || woodmart_get_opt( 'products_nav' ) ) ): ?>
	<div class="single-breadcrumbs-wrapper">
		<div class="container">
			<?php if ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) ) : ?>
				<?php woodmart_current_breadcrumbs( 'shop' ); ?>
			<?php endif; ?>

		
		</div>
	</div>
<?php endif ?>


<div class="container">
<?php if ( ( ( $product_design == 'default' && ( $breadcrumbs_position == 'default' || empty( $breadcrumbs_position ) ) ) || $breadcrumbs_position == 'summary' ) && ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) || woodmart_get_opt( 'products_nav' ) ) ): ?>
								<div class="single-breadcrumbs-wrapper">
									<div class="single-breadcrumbs">
										<?php if ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) ) : ?>
											<?php woodmart_current_breadcrumbs( 'shop' ); ?>
										<?php endif; ?>

									
									</div>
								</div>
							<?php endif ?>
	<?php
		/**
		 * Hook: woocommerce_before_single_product.
		 */
		 do_action( 'woocommerce_before_single_product' );

		 if ( post_password_required() ) {
		 	echo get_the_password_form();
		 	return;
		 }

	?>
</div>

<?php if ( $full_height_sidebar && $page_layout != 'full-width' ) echo '<div class="' . $full_height_sidebar_container . '"><div class="row full-height-sidebar-wrap">'; ?>




<div id="product-<?php the_ID(); ?>" <?php wc_product_class( $single_product_class, $product ); ?>>

	<div class="<?php echo esc_attr( $container_summary ); ?>">

		<?php
			/**
			 * Hook: woodmart_before_single_product_summary_wrap.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 */
			do_action( 'woodmart_before_single_product_summary_wrap' );
		?>

		<div class="row product-image-summary-wrap">
			<div class="product-image-summary <?php echo esc_attr( $product_image_summary_class ); ?>">
				<div class="row product-image-summary-inner">
					<div class="col-lg-5 col-12 col-md-5  product-images" <?php echo !empty( $product_images_attr ) ? $product_images_attr: ''; ?>>
						<div class="product-images-inner">
						  <?php
$sale_date_end = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
					    $sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
					    if( $sale_date_end ){?>
					<div style="margin-bottom: 5px;
    margin-bottom: 5px;
    border-bottom: 1px solid #d6064473;
    width: 99%;
    margin: 0 auto;
    border-bottom: 1px solid #d6064473;" class="row pishsiteimg">
					<div style="    padding-left: 0px;
    padding-right: 7px;
    padding-bottom: 15px;
    margin-top: 21px;" class="col-md-6">
					<img style="max-width:130px;" class="c-product-gallery__offer-img" src="http://dev-wp.ir/digikala/wp-content/uploads/2020/05/pishnahad.png">
					</div>
					
					<div class="col-md-6">
				
					    
					<?php 
				  woodmart_product_sale_countdown();
?>
						
					</div>
					
					</div>
						<?php }?>
					
					
	

						
						
							<?php
								/**
								 * woocommerce_before_single_product_summary hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								 
								 
						 
								do_action( 'woocommerce_before_single_product_summary' );
							?>
						</div>
					</div>
					<?php if ( $image_width == 5 && 'wpb' === woodmart_get_opt( 'page_builder', 'wpb' ) ): ?>
						<div class="vc_row-full-width"></div>
					<?php endif ?>
					<div class="col-lg-7 col-12 col-md-7 summary entry-summary row">

			
					
						
						
							<div style="width:100%" class="summary-inner">
							
							<?php 
							do_action( 'woocommerce_single_product_summary' );
							?>
							</div>
					
		
		<div class="btndw">
					
					<?php
 $vendrname=woodmart_get_opt( 'vendor_name' );
 if($vendrname=="1")
 {?>
	 	 <span class="supplement-info" style="background: #dff0d8; padding: 15px 10px 10px 10px; border-radius: 3px;margin-bottom:10px;float:right">
              <i class="fa fa-check" style="color: #3c763d; background-color: #fff; font-size: 1.2em;padding: 3px;border-radius: 26px;"></i> تامین شده از  <strong>فروشگاه <?php  the_author(); ?></strong>           </span>
 <?php
 }
 
 

					?>
		
		<?php    $button_comment=woodmart_get_opt( 'button_comment' );
     if($button_comment=="1")
	 {?>
		 <div class="dvcument">
		
		
				<a class="btncumpro" href="#reviews">
                    <i class="fa fa-comments"></i>
                    مشاهده نظرات محصول</a>
			</div>
		 <?php
	 }?>
	 
		
			 
		
			
			
			
			</div>
	 
		
			 
		
			
			
			
			</div>
					</div>
					
				</div><!-- .summary -->
					<?php 
				if ( ! $full_height_sidebar ) {
					/**
					 * woocommerce_sidebar hook
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				}
			?>
			</div>

			

		</div>
		
		<?php
			/**
			 * woodmart_after_product_content hook
			 *
			 * @hooked woodmart_product_extra_content - 20
			 */
			do_action( 'woodmart_after_product_content' );
		?>

	</div>

	<?php if ( $tabs_location != 'summary' || $reviews_location == 'separate' ) : ?>
		<div class="product-tabs-wrapper">
			<div class="<?php echo esc_attr( $container_class ); ?>">
				<div class="row">
					<div class="col-12 poduct-tabs-inner">
						<?php
							/**
							 * woocommerce_after_single_product_summary hook
							 *
							 * @hooked woocommerce_output_product_data_tabs - 10
							 * @hooked woocommerce_upsell_display - 15
							 * @hooked woocommerce_output_related_products - 20
							 */
							do_action( 'woocommerce_after_single_product_summary' );
							
							
						?>
					</div>
				</div>	
			</div>
		</div>
	<?php endif; ?>

	<?php do_action( 'woodmart_after_product_tabs' ); ?>

	<div class="<?php echo esc_attr( $container_class ); ?> related-and-upsells"><?php 
		/**
		 * woodmart_woocommerce_after_sidebar hook
		 *
		 * @hooked woocommerce_upsell_display - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woodmart_woocommerce_after_sidebar' );
	?></div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php 
	if ( $full_height_sidebar && $page_layout != 'full-width' ) {
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	}
?>

<?php if ( $full_height_sidebar && $page_layout != 'full-width' ) echo '</div></div>'; ?>



<style>
.woodmart-more-desc table tr td:last-child, .woocommerce-product-details__short-description table tr td:last-child, .product-image-summary .shop_attributes tr td:last-child
{
	text-align:right;
}
.product-image-summary .shop_attributes
{
	width:83%;
}
.product_attributes
{
	width:55%;
	float:right;
	    max-height: none;
    height: 120px;
}
.btndw .woodmart-open-popup
{

    color: #fff;
    line-height: 40px !important;
    padding: 0 25px;
    display: inline-block;
    border-radius: 10px;
    font-size: 13px !important;
    width: auto ;
    height: auto ;
}
.btndw .woodmart-open-popup:hover
{
	color:white;
}
{
	    background-color: #d60644;
    color: #fff;
    line-height: 40px;
    padding: 0 25px;
    display: inline-block;
    border-radius: 10px;
    font-size: 13px;
    width: auto;
    height: auto;
}
.tabs-layout-tabs .tabs
{    clear: both;
    float: right;
	    width: 100%;
	    background-color: #f9f9f9;
    border-bottom: 1px solid #f0f0f0;
}
.woocommerce-product-details__short-description li
{
	       list-style: square;
    margin-top: 9px;
    margin-right: 20px;
}
.countentdigi
{
    
    min-height: 180px;
    border-bottom: 1px solid #eeeeee;
   
}
.tabs-layout-tabs .tabs li.active a{
	    opacity: 1;
    background-color: #ffffff;
    /* margin-top: 2px; */
    margin-bottom: -2px;
}

.btndw .wd-action-btn
{
	float:right;
	margin-left:6px;
}
.btndw 
{
	
	bottom:0px;
	width:96%;
}
.shipping_tab,.seller_enquiry_form_tab 
{
	    display: none !important;
}
#tab-additional_information .shop_attributes th, #tab-additional_information .shop_attributes td
{
	    padding-right: 0;
    padding: 10px 0px;
    padding-left: 0;
}
#tab-additional_information .shop_attributes td
{
	    padding: 10px 20px;
}
#tab-additional_information .shop_attributes th{
	    text-align: center;
    font-size: 14px;
    width: 150px;
    background-color: #f3f3f3;
}
#tab-additional_information .shop_attributes td{
	    text-align: right;
    background-color: #fbfbfb;
}
.woocommerce-Tabs-panel table td
{
	border-bottom: 0px solid #E6E6E6;
}
.tabs-layout-tabs #tab-additional_information .shop_attributes{
	    max-width: 100%;
		    border-collapse: separate;
    border-spacing: 10px;
}
table tbody th, table tfoot th
{
	border-bottom: 1px solid #E6E6E6;
}
.hide-larger-price .price:before
{
	content:'قیمت:' ;
	visibility: visible;
}
.woodmart-more-desc table th, .woocommerce-product-details__short-description table th, .product-image-summary .shop_attributes th
{
    color: #dd3264;
	font-weight: 600;
}
.product-image-summary .cart
{
	      margin-bottom: 15px;
    clear: both;
    padding-top: 12px;
    border-top: 1px solid #eeeeee;
}
.single_add_to_cart_button
{
	  
    color: #fff;
    line-height: 40px;
    padding: 0 25px;
    display: inline-block;
    border-radius: 10px;
    font-size: 13px;
    width: auto;
    height: auto;
}

.quantity .minus
{
	    border-radius: 0px 5px 5px 0px;
}
.quantity .plus
{
	    border-radius: 5px 0px 0px 5px;
}
.tabs-layout-tabs .tabs li a
{
	      position: relative;
    display: inline-block;
    padding-top: 30px;
    padding-bottom: 10px;
    color: inherit;
    text-transform: uppercase;
    padding: 14px 26px;
    color: #6f6f6f;
    font-size: 17px;
    display: block;
    font-weight: inherit;
    font-size: 13px;
    opacity: .7;
}
.tabs-layout-tabs .tabs li
{
	float:right;
}

.product-tabs-wrapper
{
    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,.11);
    border: 1px solid #eee;
    margin: 0 0 20px 0;	
}
.product-image-summary-wrap .btncumpro:hover{
	color:#11bec4;
}
.product-image-summary-wrap .wd-action-btn.wd-add-cart-btn > a:before
{
	    
    font-family: "woodmart-font";
    font-size: 18px;
    padding-left: 7px;
    vertical-align: middle;
}
.dvcument
{
	float:left;margin-left: 3px;
}
.tt
{
	display:block !important;
}
.product-image-summary .summary-inner>.price, .product-image-summary .woodmart-scroll-content>.price
{
    clear:both;
   
    font-size:20px;
}
.product-image-summary-wrap .btncumpro{
	    border: 2px solid #11bec4;
    color: #11bec4;
    line-height: 40px !important;
    padding: 0 15px;
    display: inline-block !important;
    border-radius: 10px;
    width: auto !important;
    height: auto !important;
    font-size: 13px !important;
}
.breadcrumbs-location-summary .single-breadcrumbs-wrapper
{
	
}
.product-images .labels-rectangular
{
    top:55px;
}
.product-images .labels-rectangular
{
	    top: 58px;
}
.product-images .labels-rounded
{
	    top: 59px;
}

.summary-inner > .wd-action-btn
{
	margin-top:20px;
	    
}
p.stock.out-of-stock
{
    clear:both;
}
.descshort li
{
	list-style:square;
	    margin-top: 9px;
margin-right:10px;
}
.descshort{
	    flex: 0 1 30%;
}
.breadcrumbs-location-summary .single-breadcrumbs-wrapper{
	margin-bottom: 8px;
}
.product-image-summary-wrap .woodmart-compare-btn a:hover
{
	color: #909090;
}
.product-image-summary-wrap .woodmart-wishlist-btn a:hover{
	    color: #11bec4;
}
.product-image-summary-wrap .wd-action-btn.wd-style-icon .button:hover{
	    background-color: #80092c;
}

.product-image-summary-wrap .wd-action-btn.wd-style-icon > a:after
{
	   
    font-family: "woodmart-font";
	    position: absolute;
    top: 50%;
    right: 27px;
    margin-top: -9px;
    left: auto;
    margin-left: -9px;
	    width: auto;
    height: auto;
	    border: 0px solid #BBB;
    border-left-color: #000;
	    top: 55%;
}
.summary-inner .wc-forward
{
	display:none !important;
}
#wp-comment-cookies-consent
{
    width:auto;
}

.product-image-summary-wrap .wd-action-btn.wd-wishlist-btn > a:before{
	    
    font-family: "woodmart-font";
    font-size: 18px;
    vertical-align: middle;
    padding-left: 5px;
}
.product-image-summary-wrap .woodmart-compare-btn a{
	    border: 2px solid #909090;
    color: #909090;
    line-height: 40px !important;
    padding: 0 25px;
    display: inline-block !important;
    border-radius: 10px;
    font-size: 13px !important;
    width: auto !important;
    height: auto !important;
}
.product-image-summary-wrap .wd-action-btn.wd-compare-btn > a:before{
	    content: "\f122";
    font-family: "woodmart-font";
    font-size: 18px;
    vertical-align: middle;
}
.woocommerce-Reviews
{
	    display: block;
}
.woocommerce-Reviews #comments, .woocommerce-Reviews #review_form_wrapper{
	    flex: auto;
    padding-right: 30px;
    padding-left: 30px;
     max-width: 100%;
}

.comment-form-rating .stars
{
	    padding-top: 23px;
}
.woocommerce-breadcrumb, .yoast-breadcrumb
{
	    vertical-align: middle;
    font-size: 14px;
    line-height: 20px;
    margin: 11px 0px;
    padding-right: 13px;
    padding-right: 10px;
    display: flex;
    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,0.11);
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding: 10px;
       border-top: 2px solid <?php echo get_option ('primary-color'); ?>;
      
}

.comment-form .form-submit input
{
	    border: 2px solid #11bec4;
    color: white;
    line-height: 40px !important;
    padding: 0 15px;
    display: inline-block !important;
    border-radius: 10px;
    /* width: auto !important; */
    height: auto !important;
    font-size: 13px !important;
    background-color: #11bec4!important;
    width: 100%;
}
.product-images-inner{
	margin-top:0px !important;
    border-left: 1px solid #9e9e9e2b;
}
.woodmart-product-countdown
{
	text-align:left !important;
}
.woodmart-timer > span
{
	    min-width: 37px;
		    margin: 0 0px 5px;
		    box-shadow: 0 0 0px rgba(0, 0, 0, 0.1);
			    color: #d60644;
font-size: 13px;
}
.woodmart-timer > span span
{
	  color: #d60644;
}
.product-image-summary-wrap
{
	    padding: 0px 0px 10px 0px !important;
}
.breadcrumbs-location-summary .single-breadcrumbs-wrapper
{
	margin-top:10px;
}
.thumbnails-ready .owl-item img
{
    border: 1px solid #ccc;
    border-radius: 11px;
    -webkit-box-align: center;	
}
.product-image-summary .entry-title{
    
        font-size: 18px;
            padding-top: 9px;
}
.ressite 
{
     margin-top:20px;   flex: 0 1 70%;
}
.twocul
{
      margin:10px 0px;
}


@media screen and (max-width: 770px) {
  .ressite {

      margin-top:20px;   flex: 0 1 100%;
  }
  
  .single-product-page .summary-inner
  {
       margin-bottom: 0px;   
       padding-right:10px;
  }
  .woocommerce-product-details__short-description
  {
      width:100% !important;
      
  }
  .product-image-summary .shop_attributes
  {
      width:100% !important;
      
  }

  .breadcrumbs-location-summary .single-product-page
{
    margin-top:0px;
}
  .btndw
  {
      position: relative;
      padding-right:13px;
  }
  .btndw div
  {
      margin:5px 1px;
      width:100%;
  }
  .btndw div a
  {
       width:100% !important; 
  }
  .countentdigi
  {
      display:grid;
      
  }
  .descshort
  {
       margin-right:10px;
  }
}

/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 600px) {
  body {
    background-color: olive;
  }
}
.twocul .wd-action-btn
{
	display:none !important; 
}
.product-tabs-wrapper
{
	    background-color: transparent;
}
.tabs-location-standard.reviews-location-separate.tabs-type-tabs .woocommerce-tabs
{
	    background-color: white;
}
.product-tabs-wrapper
{
	box-shadow: 0 0px 0px 0 rgba(181,181,181,.11);
    border: 0px solid #eee;
}
.product-image-summary-wrap
{
	    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,0.11);
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding: 10px;
    margin: 0 0 20px 0;
}
.main-page-wrapper
{
    background-color: #f6f6f6;
}

.product-image-summary-wrap
{
    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,0.11);
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding: 10px;
    margin: 0 0 20px 0;	
}
.product-images-inner{
	    margin-top: 10%
}
.woocommerce-product-gallery .thumbnails.thumbnails-ready
{
	margin-top:10px
}

.woocommerce-breadcrumb, .yoast-breadcrumb
{
	vertical-align: middle;
    font-size: 14px;
    line-height: 20px;
    margin: 11px 0px;
    padding: 0;
   
    display: flex;
  
}


.product_title
{
	border-bottom: 1px solid #eeeeee;
	margin: 0 0 10px 0 !important;
    font-weight: normal !important;
    font-size: 1.4em !important;
    line-height: 2em !important;
}

.dvattr{
margin: 4px 0px;
    clear: both;
    float: right;
}
.atrname
{
	 color: #333;
	float:right;
    font-weight: 600;
}
.atrval
{
	font-weight: 600;
	float:right;
	    padding-right: 13px;
	 
}
.tabs-layout-tabs
{
 background-color:white ;   
}
.single-breadcrumbs-wrapper .woocommerce-breadcrumb, .single-breadcrumbs-wrapper .yoast-breadcrumb
{
	padding:10px;
}
.product-image-summary .woodmart-product-countdown
{
	float:left;
}
.woodmart-sizeguide-btn
{
        background-color: transparent;
    border: 2px solid #9E9E9E;
        color: #9E9E9E !important;
    line-height: 40px !important;
    padding: 0 10px;
    display: inline-block !important;
    border-radius: 10px;
    font-size: 13px !important;
    width: auto !important;
    height: auto !important;
    
}

.product-image-summary .woodmart-product-brands
{
	display:none;
}
<?php
     $tabs=woodmart_get_opt( 'product_tabs_layout' );
	 
	 if($tabs=="tabs")
	 {
		 ?>
		 .woodmart-tab-wrapper{
	    margin: 0 0 5px 0;
    padding: 0px 36px;
}
.woodmart-tab-wrapper {
	    clear: both;
}
#comments
{
	    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,0.11);
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding: 30px 20px 20px 20px;
    margin: 0 0 20px 0;
}
.woocommerce-Reviews #comments, .woocommerce-Reviews #review_form_wrapper{
	    flex: auto;
    padding-right: 30px;
    background-color: #fff;
    box-shadow: 0 12px 12px 0 rgba(181,181,181,0.11);
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding: 30px 20px 20px 20px;
    margin: 0 0 20px 0;
    padding-left: 30px;
    max-width: 100%;
}
		 
		 <?php
	 }else{
		 ?>
		 .tabs-layout-accordion .woodmart-tab-wrapper
		 {
			     border-bottom: 1px solid rgba(119, 119, 119, 0.17);
    background-color: white;
    /* border-radius: 7px; */
    padding: 6px;
		 }
		 
		 <?php
		 
	 }
 

 ?>





<?php 
if ( woodmart_get_opt( 'attr_after_short_desc' ) ) {
		?>
		.woocommerce-product-details__short-description
{
	float:left;
	width:40%;
}
.product-image-summary .shop_attributes
{
    float: right;
    width: 53%;
    border-left: 1px solid #eeeeee;
    padding-left: 24px;
	
}
.product-image-summary .woodmart-product-brands
{
	display:none;
}

		
		<?php
		}

?>
</style>