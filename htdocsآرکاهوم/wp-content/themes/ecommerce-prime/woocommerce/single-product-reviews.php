<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
	return;
}

$count = $product->get_review_count(); ?>

<div id="reviews" class="woocommerce-Reviews">

	<?php if ( $count && wc_review_ratings_enabled() ): ?>
		
		<div class="twp-single-rating">
		
			<div class="twp-rating-bar">

				<div class="twp-average-rating">

					<div class="twp-review-info">

						<h4 class="twp-average-title">
							<?php esc_html_e( 'Average Rating', 'ecommerce-prime' ); ?>
						</h4>

						<?php
						$average_rating = round( $product->get_average_rating(), 2 );
						if ( $average_rating > 0 ){ ?>
							<h3 class="average-percent"><?php echo number_format( $average_rating, 2 ); ?></h3>
						<?php } ?>

						<?php
						if ( function_exists( 'woocommerce_template_single_rating' ) ) {
							woocommerce_template_single_rating();
						} ?>

					</div>

					<div class="twp-rating-bar">
						<?php
						$review_count   = $product->get_rating_count();
						$rating_array 	= $product->get_rating_counts();
		
						for ( $i=1; $i <= 5; $i++ ) {
							echo '<div class="twp-bar-rating" >';
								echo '<div class="twp-star-text" >'.$i.esc_html(' Star','ecommerce-prime').'</div>';
			                    if( isset( $rating_array[$i] ) ){

			                    	$percent = $rating_array[$i]/$review_count;
									$percent_friendly = number_format( $percent * 100, 0 ).'%';

			                    	echo '<div class="individual-rating-bar"><div class="individual-bar-bg"><span style="width:'.esc_attr( $percent_friendly ).'" class="individual-bar-percent" >';
			                    	echo '</span></div></div>';
			                    	echo '<div class="individual-rating-percent" >';
			                    		echo esc_html( $percent_friendly );
			                    	echo '</div>';

			                    }else{
			                    	echo '<div class="individual-rating-bar"><div class="individual-bar-bg"><span style="width:0%" class="individual-bar-percent" >';
			                    	echo '</span></div></div>';
			                    	echo '<div class="twp-rating-percent" >';
			                    		esc_html_e('0%','ecommerce-prime');
			                    	echo '</div>';

			                    }
			                    echo '</div>';

		                } ?>
					</div>

				</div>

			</div>
		
		</div>
	<?php endif; ?>

	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'ecommerce-prime' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product );
			} else {
				esc_html_e( 'Reviews', 'ecommerce-prime' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'ecommerce-prime' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? __( 'Add a review', 'ecommerce-prime' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'ecommerce-prime' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => __( 'Leave a Reply to %s', 'ecommerce-prime' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'fields'              => array(
						'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'ecommerce-prime' ) . '&nbsp;<span class="required">*</span></label> ' .
									'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
						'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'ecommerce-prime' ) . '&nbsp;<span class="required">*</span></label> ' .
									'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p>',
					),
					'label_submit'        => __( 'Submit', 'ecommerce-prime' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'ecommerce-prime' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'ecommerce-prime' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'ecommerce-prime' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'ecommerce-prime' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'ecommerce-prime' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'ecommerce-prime' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'ecommerce-prime' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'ecommerce-prime' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'ecommerce-prime' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'ecommerce-prime' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
