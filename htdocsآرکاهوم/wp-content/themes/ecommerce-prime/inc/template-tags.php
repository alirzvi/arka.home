<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ecommerce_Prime
 */

if ( ! function_exists( 'ecommerce_prime_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ecommerce_prime_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$year = get_the_date('Y');
		$month = get_the_date('m');
		$day = get_the_date('d');
		$link = get_day_link( $year, $month, $day );
		$posted_on = '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ecommerce_prime_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ecommerce_prime_posted_by() {

		$author_img = get_avatar( get_the_author_meta( 'ID' ) , 100, '', '', array( 'class' => 'avatar-img' ) );
		echo '<span class="author-img"> ' .wp_kses_post( $author_img ). '</span>';

		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ecommerce_prime_comment_count' ) ) :
	/**
	 * Post Comment Count.
	 */
	function ecommerce_prime_comment_count() {

		echo '<span class="date-icon"><i class="ion ion-ios-chatbubbles"></i></span>';

		?><span class="post-comment-link"><a href="<?php esc_url( comments_link() ); ?>"><?php echo absint( get_comments_number() ); ?></a></span><?php

	}
endif;

if ( ! function_exists( 'ecommerce_prime_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ecommerce_prime_entry_footer( $cats = true, $tags = true, $edits = true ) {
			
			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {

				if( $cats ){

					/* translators: used between list items, there is a space after the comma */
					$categories = get_the_category();
                
                    echo '<div class="entry-meta-item entry-meta-categories">';
                    echo '<div class="entry-meta-wrapper">';

                    /* translators: 1: list of categories. */
                
                    echo '<span class="cat-links">';
                        foreach( $categories as $category ){

                            $cat_name = $category->name;
                            $cat_slug = $category->slug;
                            $cat_url = get_category_link( $category->term_id );
                            ?>

                            <a class="dolpa-cat-color-<?php echo esc_attr( $cat_slug ); ?>" href="<?php echo esc_url( $cat_url ); ?>" rel="category tag"><?php echo esc_html( $cat_name ); ?></a>

                        <?php }
                    echo '</span>';

                    echo '</div>';
                    echo '</div>';

				}

				if( $tags ){

					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( ' ', esc_html_x( ', ', 'list item separator', 'ecommerce-prime' ) );
					if ( $tags_list ) {
						/* translators: 1: list of tags. */
						echo '<span class="tags-links">' . esc_html__( 'Tagged', 'ecommerce-prime' ). $tags_list . '</span>'; // WPCS: XSS OK.
					}
				}

			}

			if( is_single() ){

				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<span class="comments-link">';
					comments_popup_link(
						sprintf(
							wp_kses(
								/* translators: %s: post title */
								__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ecommerce-prime' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						)
					);
					echo '</span>';
				}
			}

		if( $tags && ( is_single() || is_page() ) ){
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'ecommerce-prime' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}

	}
endif;

if ( ! function_exists( 'ecommerce_prime_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ecommerce_prime_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$sidebar_layout = '';
		$latest_post_layout = '';
		$default = ecommerce_prime_get_default_theme_options();
		$global_sidebar_layout = get_theme_mod( 'global_sidebar_layout',$default['global_sidebar_layout'] );
		$ecommerce_prime_archive_layout = get_theme_mod( 'ecommerce_prime_archive_layout',$default['ecommerce_prime_archive_layout'] );
		$twp_ecommerce_prime_home_sections = get_theme_mod( 'twp_ecommerce_prime_home_sections', json_encode( $default['twp_ecommerce_prime_home_sections'] ) );
		$twp_ecommerce_prime_home_sections = json_decode( $twp_ecommerce_prime_home_sections );
		foreach( $twp_ecommerce_prime_home_sections as $ecommerce_prime_home_section ){

			$home_section_type = isset( $ecommerce_prime_home_section->home_section_type ) ? $ecommerce_prime_home_section->home_section_type : '' ;
            switch( $home_section_type ){

		        case 'latest-post':
		        $sidebar_layout     = isset( $ecommerce_prime_home_section->sidebar_layout ) ? $ecommerce_prime_home_section->sidebar_layout : '' ;
		        $latest_post_layout = isset( $ecommerce_prime_home_section->latest_post_layout ) ? $ecommerce_prime_home_section->latest_post_layout : '' ;
				
		        break;
		    }
		}

		if( is_front_page() ){

			if( $latest_post_layout == 'index-layout-2' ){

				if( $sidebar_layout == 'no-sidebar' ){
					$image_size = 'full';
				}else{
					$image_size = 'large';
				}

			}else{
				$image_size = 'medium_large';
			}

		}else{

			if( $ecommerce_prime_archive_layout == 'archive-layout-2' ){

				if( $global_sidebar_layout == 'no-sidebar' ){
					$image_size = 'full';
				}else{
					$image_size = 'large';
				}

			}else{
				$image_size = 'medium_large';
			}

		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( $image_size, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
			<?php 
			if( !is_single() && !is_page() ){
				$format = get_post_format( get_the_ID() ) ? : 'standard';
	            $icon = ecommerce_prime_post_formate_icon( $format );
				if( !empty( $icon ) ){ ?>
	                <span class="format-icon">
	                    <i class="ion <?php echo esc_attr( $icon ); ?>"></i>
	                </span>
	            <?php }
            } ?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
