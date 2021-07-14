<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package shoptimizer
 */

get_header();

do_action( 'shoptimizer_page_start' );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="main_blok">
				<?php
				if ( have_posts() ) :
				?> 
				<?php
					// get_template_part( 'loop' );
				    $args = array(
						'post_type'      => 'product',
						'posts_per_page' => 6,
						// 'meta_query'     => array( array(
						// 	'key' => '_visibility',
						// 	'value' => array('catalog', 'visible'),
						// 	'compare' => 'IN',
						// ) ),
					   'tax_query'      => array( array(
							'taxonomy'        => 'pa_color',
							'field'           => 'slug',
							'terms'           =>  'blue',
							'operator'        => 'IN',
						) )
					);
				
					$loop = new WP_Query( $args );?>
				<div class="all_products">
					
						<?php
						while ( $loop->have_posts() ) : $loop->the_post();
							global $product; ?>
							<div class="product_items">
								<a class="product_permalink" href="<?php echo get_permalink(); ?>"> 
									<?php echo woocommerce_get_product_thumbnail(); ?> 
									<?php echo get_the_title(); ?>
								</a>
							</div>
					<?php	endwhile;?>
					
				</div>
				<?php
					wp_reset_query();

				else :

					get_template_part( 'content', 'none' );

				endif;
				?>
			</div>
            
			<?php // while ( have_posts() ) : the_post();

				//do_action( 'shoptimizer_page_before' );

				//get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to shoptimizer_page_after action
				 *
				 * @hooked shoptimizer_display_comments - 10
				 */
				//do_action( 'shoptimizer_page_after' );

			//endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php do_action( 'shoptimizer_page_sidebar' ); ?>


<?php
get_footer();

