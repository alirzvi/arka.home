
<style>
    .single-product-sidebar.sidebar-right
{
	border:0px;
}
.woodmart-widget
{
	padding:0px !important;
    box-shadow: 0 0px 0px 0px #e6e6e6 !important; 
	background:transparent;
	border-radius:0px;
		
}
.product-image-summary .wd-product-brands
{
    display:none;
}
.single-breadcrumbs-wrapper .woocommerce-breadcrumb, .single-breadcrumbs-wrapper .yoast-breadcrumb
{
    background-color: white;

    padding: 10px;
    border-top: 2px solid #6d6466;
}
.product_title
{
    font-size:23px;
    padding-bottom:10px;
}
.product-tabs-wrapper
{
    box-shadow: 0 0px 0px 0 rgb(181 181 181 / 11%);
    border: 0px solid #eee;
}
    .single-breadcrumbs-wrapper .woocommerce-breadcrumb, .single-breadcrumbs-wrapper .yoast-breadcrumb
    {
            margin-bottom: 2px;
    }
    .product-tabs-wrapper
    {
        background-color: transparent;
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
	/* border: 0px solid #eee; */
}
.wc-tabs-wrapper 
{
        box-shadow: 0 12px 12px 0 rgb(181 181 181 / 11%);
    /* border: 1px solid #eee; */
    background-color: white;
}
.wc-tab-inner
{
    padding:10px;
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
.tabs-layout-tabs .tabs li
{
    float:right;
}
.tabs-layout-tabs .tabs li.active a
{
        opacity: 1;
    background-color: #ffffff;
    /* margin-top: 2px; */
    margin-bottom: -2px;
}.tabs-layout-tabs .tabs li a
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

.summary-inner .wd-compare-btn a
{
	border: 2px solid #909090;
    color: #909090;
    line-height: 40px !important;
    padding: 0 25px !important;
    display: inline-block !important;
    border-radius: 10px;
    font-size: 13px !important;
    width: auto;
    height: auto !important;
}
.summary-inner .wd-action-btn.wd-style-text>a:before{
	display:inherit;
}

.wd-action-btn.wd-style-text>a:after{
	right:10px;
}
.summary-inner .wd-wishlist-btn a
{
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
.summary-inner>.wd-action-btn
{
	margin-left:3px;
}
.summary-inner .wd-sizeguide-btn a
{
	    border: 2px solid #6f5a82;
    color: #6f5a82;
    line-height: 40px !important;
    padding: 0 15px;
    display: inline-block !important;
    border-radius: 10px;
    width: auto !important;
    height: auto !important;
    font-size: 13px !important;
}
</style>



<?php 
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

			<?php if ( woodmart_get_opt( 'products_nav' ) ): ?>
				<?php woodmart_products_nav(); ?>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>

<div class="container">
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

		<div style="     padding-top: 11px;
    background-color: #fff;
    margin-right:auto;
    margin-left:auto;
    box-shadow: 0 12px 12px 0 rgb(181 181 181 / 11%);
    border: 1px solid #eee;
    border-radius: 3px;" class="row product-image-summary-wrap">
			<div class="product-image-summary <?php echo esc_attr( $product_image_summary_class ); ?>">
				<div class="row product-image-summary-inner">
					<div class="<?php echo esc_attr( $product_images_class ); ?> product-images" <?php echo !empty( $product_images_attr ) ? $product_images_attr: ''; ?>>
						<div class="product-images-inner">
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
					<div class="<?php echo esc_attr( $product_summary_class ); ?> summary entry-summary">
						<div class="summary-inner">
							<?php if ( ( ( $product_design == 'default' && ( $breadcrumbs_position == 'default' || empty( $breadcrumbs_position ) ) ) || $breadcrumbs_position == 'summary' ) && ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) || woodmart_get_opt( 'products_nav' ) ) ): ?>
								<div class="single-breadcrumbs-wrapper">
									<div class="single-breadcrumbs">
										<?php if ( woodmart_get_opt( 'product_page_breadcrumbs', '1' ) ) : ?>
											<?php woodmart_current_breadcrumbs( 'shop' ); ?>
										<?php endif; ?>

										<?php if ( woodmart_get_opt( 'products_nav' ) ): ?>
											<?php woodmart_products_nav(); ?>
										<?php endif ?>
									</div>
								</div>
							<?php endif ?>

							<?php
								/**
								 * woocommerce_single_product_summary hook
								 *
								 * @hooked woocommerce_template_single_title - 5
								 * @hooked woocommerce_template_single_rating - 10
								 * @hooked woocommerce_template_single_price - 10
								 * @hooked woocommerce_template_single_excerpt - 20
								 * @hooked woocommerce_template_single_add_to_cart - 30
								 * @hooked woocommerce_template_single_meta - 40
								 * @hooked woocommerce_template_single_sharing - 50
								 */
								do_action( 'woocommerce_single_product_summary' );
							?>
						</div>
					</div>
				</div><!-- .summary -->
			</div>

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
