<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecommerce_Prime
 */
?>

<article id="post-<?php the_ID(); ?>"  <?php if( is_archive() || is_home() ){  ?> <?php post_class('wow fadeInUp'); ?> data-wow-delay="0.3s" <?php }else{ post_class(); } ?>>

	<?php if( is_archive() || is_home() ){ ?>
		<div class="article-wrapper">
	<?php } ?>
		
		<?php if( is_archive() || is_home() ){ ecommerce_prime_post_thumbnail(); } ?>

		<div class="article-details">
			
			<?php if( is_archive() || is_home() ) : ?>

				<header class="entry-header">

					<?php

					if ( 'post' === get_post_type() ){
	                    echo '<div class="entry-meta entry-meta-category">';
	                    ecommerce_prime_entry_footer( $cats = true,$tags = false );
	                    echo '</div>';
	                }

					the_title( '<h2 class="entry-title entry-title-medium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

					<div class="entry-meta">
                        <?php
                        ecommerce_prime_posted_by();
                        echo "<span class='sep-date-author'><i class='ion ion-ios-remove'></i></span>";
                        ecommerce_prime_posted_on();
                        ?>
                    </div><!-- .entry-meta -->

				</header><!-- .entry-header -->

			<?php endif; ?>

			<?php
			if( is_singular('post') ):
				?>
				<div class="post-content-wrap">

			        <?php if ( class_exists('Booster_Extension_Class') && 'post' === get_post_type()) { ?>

			            <div class="post-content-share">
			                <?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
			            </div>

			        <?php } ?>

			        <div class="post-content">

			            <div class="entry-content">

			                <?php
			                the_content();

			                if( !class_exists('Booster_Extension_Class') ):
			                	
				               	wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecommerce-prime' ),
									'after'  => '</div>',
								) );

							endif; ?>

			            </div>


			        </div>

			    </div>

			<?php
			else:
				?>
				<div class="entry-content">
					<?php
					if( is_single() ):

						the_content();

					else:

						if( has_excerpt() ){
							
							the_excerpt();

						}else{

							echo esc_html( wp_trim_words( get_the_content(),30,'...' ) );

						}

					endif;

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecommerce-prime' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
			<?php
			endif;
			

			
			if( is_single() ){
				$tags = true;
			}else{
				$tags = false;
			}
			?>
			<footer class="entry-footer">
				<?php ecommerce_prime_entry_footer( $cats = false,$tags ); ?>
			</footer><!-- .entry-footer -->

		</div>

	<?php if( is_archive() || is_home() ){ ?>
		</div>
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->