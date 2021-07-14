<?php
/**
 * The template for displaying full browser width pages.
 *
 * Template Name: View All Author Book
 *
 * @package shoptimizer
 */


get_header();

$args = array ( 
	'post_type'  => 'product',
	'posts_per_page'  => -1,
	'tax_query'             => array( array(
		'taxonomy'      => 'pa_book-author',
		'tag'         => 'term_id',
		'terms'         => 43,
	), ),
);

	$productType1 = new WP_Query( $args );

		if ( $productType1->have_posts() ) : ?>
			<div class="home-section-title-block">
			<h3 class="section-title">Author list</h3>
			</div>

			<div class="home-product-list-section home-product-list-section-all-pages">
					<?php	while ( $productType1->have_posts() )  : $productType1->the_post() ; ?>
						<div class="home-product-item">
							<a href="<?php echo get_the_permalink(); ?>">
								<?php if(has_post_thumbnail()){ ?>
									<img src="<?php echo get_the_post_thumbnail_url(); ?>">
								<?php } ?>
								<p class="product-name"><?php echo get_the_title(); ?></p>
								<span class="price"><?php echo $product->get_price_html() ?></span>							
							</a>
						</div>	
					<?php	endwhile; ?>
			</div>
<?php endif ?>
<?php


get_footer();