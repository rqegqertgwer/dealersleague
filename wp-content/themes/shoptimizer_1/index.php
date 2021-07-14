<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shoptimizer
 */

$shoptimizer_layout_archives_sidebar = '';
$shoptimizer_layout_archives_sidebar = shoptimizer_get_option( 'shoptimizer_layout_archives_sidebar' );

$shoptimizer_layout_blog = '';
$shoptimizer_layout_blog = shoptimizer_get_option( 'shoptimizer_layout_blog' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo shoptimizer_safe_html( $shoptimizer_layout_blog ); ?>">
			<div class="block_one">
				<?php
				if ( have_posts() ) :
				?> 
				<div class="block_one_title">
					<div class="title">
						<h2>Deals under $5</h2>
					</div>
					<div class="see_more">
						<input type="button" class="see_more_btn see_more_block_one" value="See more">
					</div>
				</div>
				<?php
					// get_template_part( 'loop' );
				    $args = array(
						'post_type'      => 'product',
						'posts_per_page' => 10,
					);
				
					$loop = new WP_Query( $args );?>
				<div class="all_products">
					<div class="products product_block_one">
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
				</div>
				<?php
					wp_reset_query();

				else :

					get_template_part( 'content', 'none' );

				endif;
				?>
			</div>
			<div class="block_two">
				<?php
				if ( have_posts() ) :
				?> 
				<div class="block_two_title">
					<div class="title">
						<h2>Start a new series</h2>
					</div>
					<div class="see_more">
						<input type="button" class="see_more_btn see_more_block_two" value="See more">
					</div>
				</div>
				<?php
				//	get_template_part( 'loop' );
					 $args = array(
						'post_type'      => 'product',
						'posts_per_page' => 6,
					);
				
					$loop = new WP_Query( $args );?>
				<div class="all_products">
					<div class="products product_block_two">
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
				</div>
				<?php
					wp_reset_query();
				
				else :

					get_template_part( 'content', 'none' );

				endif;
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


	<?php if ( 'no-archives-sidebar' !== $shoptimizer_layout_archives_sidebar ) { ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-posts' ); ?>
	</div><!-- #secondary -->
	<?php } ?>

<?php
get_footer();
?>
<script>
     jQuery(".see_more_block_one").on("click", function(){
		    jQuery(this).val('Close');
			if(jQuery(this).val == 'See more'){
				console.log()
				jQuery('.product_block_one').css({"white-space": "inherit", "overflow-x": "inherit"});
			}else{
                jQuery('.product_block_one').css({"white-space": "nowrap", "overflow-x": "scroll"});
			}
			
	 });
	 jQuery(".see_more_block_two").on("click", function(){
			jQuery('.product_block_two').css({"white-space": "inherit", "overflow-x": "inherit"});
	 });
</script>
