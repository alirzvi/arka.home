<?php
global $product;

$action_classes  = '';
$add_btn_classes = '';


if ( 'carousel' === woodmart_loop_prop('products_view') ) {
	$action_classes  .= ' woodmart-buttons wd-pos-r-t';
	$add_btn_classes .= ' wd-action-btn wd-add-cart-btn wd-style-icon';
} else {
	$action_classes  .= ' wd-bottom-actions';
}

do_action( 'woocommerce_before_shop_loop_item' ); ?>

<div  class="product-wrapper mootanroslider">
	<div class="content-product-imagin"></div>
	<div class="inner"  class="product-element-top">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="product-image-link">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woodmart_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</a>
	<?php
			/**
			 * woocommerce_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			
			do_action( 'woocommerce_shop_loop_item_title' );
		?>
		<div class="product-rating-price">
			<div class="wrapp-product-price">
				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
			</div>
		</div>
		<div class="wrapp-swatches"></div>
	
		<div  class="product-information">
	
	
	<ul>

		<li>
		
		<?php woodmart_add_to_compare_loop_btn(); ?>
			<?php echo woodmart_swatches_list();?>
		
			</li>
			<li>
			<div class="wrap-wishlist-button"><?php do_action( 'woodmart_product_action_buttons' ); ?></div>
			</li>
				<li>
				<div class="woodmart-add-btn wd-action-btn wd-add-cart-btn wd-style-icon"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
				</li>
				<li>
				<div class="wrap-quickview-button"><?php woodmart_quick_view_btn( get_the_ID() ); ?></div>
		</li>
		
		
		</ul>
		
		<?php
			woodmart_product_categories();
			woodmart_product_brands_links();
		?>
		
		
		
		
		
	
	</div>
	</div>
<style>




.woodmart-highlighted-products .elements-grid, .woodmart-highlighted-products .woodmart-carousel-container
{
	border:0px  !important;
}

.woodmart-highlighted-products:not(.with-title) .owl-nav > div[class*="prev"]{
	    right: 5px;
    width: 25px;
    font-size: 14px;
	top: 48% !important;
    height: 25px;
	    border-radius: 0;
    background-color: transparent;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
}
 .woodmart-highlighted-products:not(.with-title) .owl-nav > div[class*="next"]
{  left: 5px;
    width: 25px;
    font-size: 14px;
    height: 25px;
	    border-radius: 0;
    background-color:transparent;
	top: 48% !important;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
	
}




</style>

</div>
  
