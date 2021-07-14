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
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$shoptimizer_layout_archives_sidebar = '';
$shoptimizer_layout_archives_sidebar = shoptimizer_get_option( 'shoptimizer_layout_archives_sidebar' );

$shoptimizer_layout_blog = '';
$shoptimizer_layout_blog = shoptimizer_get_option( 'shoptimizer_layout_blog' );

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo shoptimizer_safe_html( $shoptimizer_layout_blog ); ?>">

		<?php

	global $product;	

$args = array ( 
	'post_type'  => 'product',
	'posts_per_page'  => -1,
	'tax_query'             => array( array(
		'taxonomy'      => 'pa_color',
		'field'         => 'term_id',
		'terms'         => 24,
	), ),
);

	$productType1 = new WP_Query( $args );

		if ( $productType1->have_posts() ) : ?>
		

<?php
/*$test = wp_list_categories( array(
	'title_li' => 'Color',
	'orderby' => 'name',
	'taxonomy' => 'pa_color',
) ); */

$terms = get_terms( 'pa_color' );
 
echo "<div class='term_pa_colors'><ul>";
foreach($terms as $term){
    echo "<li class='pa_colors'><a href='/view-all-" . $term->name . "'>" . $term->name . "</a></li>";
}
echo "</ul></div>";




?>
<div class="arrow_left"><</div>
<div class="clearfix"></div>

<div class="home-section-title-block">
<h3 class="section-title">Blue Book</h3><a href="/view-all-blue" class="view-all-btn">View All</a>
</div>
<div class="home-product-list-section home-product-list-section-one">
	<div class="block_one">
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
</div>
<?php endif ?>
<div class="arrow_right">></div>


<?php 
$args2 = array ( 
	'post_type'  => 'product',
	'posts_per_page'  => -1,
	'tax_query'             => array( array(
		'taxonomy'      => 'pa_color',
		'field'         => 'term_id',
		'terms'         => 26,
	), ),
);

	$productType2 = new WP_Query( $args2 );

		if ( $productType2->have_posts() ) : ?>

<div class="home-section-title-block">
<h3 class="section-title">Green Book</h3><a href="/view-all-green/" class="view-all-btn">View All</a>
</div>

<div class="home-product-list-section">
		<?php	while ( $productType2->have_posts() )  : $productType2->the_post() ; ?>
			<div class="home-product-item">
				<a href="<?php echo get_the_permalink(); ?>">
					<?php if(has_post_thumbnail()){ ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php } ?>
				</a>
				<p class="product-name"><?php echo get_the_title(); ?></p>
				<span class="price"><?php echo $product->get_price_html() ?></span>							

			</div>	
		<?php	endwhile; ?>
</div>

<?php endif; ?>

<?php 
$args3 = array ( 
	'post_type'  => 'product',
	'posts_per_page'  => -1,
	'tax_query'             => array( array(
		'taxonomy'      => 'pa_color',
		'field'         => 'term_id',
		'terms'         => 27,
	), ),
);

	$productType3 = new WP_Query( $args3 );

		if ( $productType3->have_posts() ) : ?>

<div class="home-section-title-block">
<h3 class="section-title">Grey Book</h3><a href="/view-all-grey/" class="view-all-btn">View All</a>
</div>

<div class="home-product-list-section">
		<?php	while ( $productType3->have_posts() )  : $productType3->the_post() ; ?>
			<div class="home-product-item">
				<a href="<?php echo get_the_permalink(); ?>">
					<?php if(has_post_thumbnail()){ ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php } ?>
				</a>
				<p class="product-name"><?php echo get_the_title(); ?></p>
				<span class="price"><?php echo $product->get_price_html() ?></span>							

			</div>	
		<?php	endwhile; ?>
</div>

<?php endif; ?>


 <!-- categories   -->

<?php
$terms = get_terms( 'product_cat' );
 
?>
<div class="home-section-title-block">
<h3 class="section-title">Categories</h3><a href="/view-all-categories/" class="view-all-btn">View All</a>
</div>
<div class="home-product-list-section">
<?php
foreach($terms as $term){
	$term_link = get_term_link( $term );
	?>
<a href="<?php echo  esc_url( $term_link ) ?>">
			<div class="home-product-item">
                <?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
                        echo '<img src="' . $image[0] . '" alt=""  class="category_img">';      
                        echo '<div class="image" style="background-image: url("' . $image[0] .'")"></div>'; ?>
                                  
			</a>
		</a>
				<p class="product-name"><?php echo $term->name ?></p>						
			</div>	

<?php
}
?>
</div>

<!-- author list -->
<?php
$author_lists = get_terms( 'pa_book-author' );


$terms = get_terms('pa_book-author');

foreach($terms as $term){
	    $value = get_term_meta($term->term_id, 'image', true);
		$image = $value ? wp_get_attachment_image_src( $value ) : '';
		$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
		printf( '<img class="author_img" src="%s" width="44px" height="44px">', esc_url( $image ) );
		
		?><div class="home-product-item">
		<a href='/view-all-author-list?taxonomy=pa_book-author&term=<?php echo $author_list->slug ?>'>
				 <!--<img class='author_img' src="<?php echo get_the_post_thumbnail_url(); ?>">-->
		 </a>
		 <p class="product-name"><?php echo $term->name ?></p>						
	 </div>	<?php
}



?>
 
<div class="home-section-title-block">
<h3 class="section-title">Author list</h3><a href="/view-all-author-elements" class="view-all-btn">View All</a>
</div>

<div class="home-product-list-section">
<?php
foreach($author_lists as $author_list){
		
	?>
			<div class="home-product-item">
			   <a href='/view-all-author-list?taxonomy=pa_book-author&term=<?php echo $author_list->slug ?>'> <!--view-all-author-list/-->
						<!--<img class='author_img' src="<?php echo get_the_post_thumbnail_url(); ?>">-->
				</a>
				<p class="product-name"><?php echo $author_list->name ?></p>						
			</div>	
<?php
}
?>
</div>



<!-- 
<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button tablink" onclick="openProductList(event, 'Blue')">Blue</button>
  <button class="w3-bar-item w3-button tablink" onclick="openProductList(event, 'Green')">Green</button>
  <button class="w3-bar-item w3-button tablink" onclick="openProductList(event, 'Red')">Red</button>
  <button class="w3-bar-item w3-button tablink" onclick="openProductList(event, 'Yellow')">Yellow</button>
</div>

<div id="Blue" class="attr-name">
  <h2>Blue</h2>
  <?php 
$argstab1 = array ( 
	'post_type'  => 'product',
	'posts_per_page'  => -1,
	'tax_query'             => array( array(
		'taxonomy'      => 'pa_color',
		'field'         => 'term_id',
		'terms'         => 24,
	), ),
);

	$productTypeTab1 = new WP_Query( $argstab1 );

		if ( $productTypeTab1->have_posts() ) : ?>

<div class="home-tab-product-list-section">
		<?php	while ( $productTypeTab1->have_posts() )  : $productTypeTab1->the_post() ; ?>
			<div class="home-tab-product-item">
				<a href="<?php echo get_the_permalink(); ?>">
					<?php if(has_post_thumbnail()){ ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php } ?>
				</a>
				<p class="product-name"><?php echo get_the_title(); ?></p>
				<span class="price"><?php echo $product->get_price_html() ?></span>							

			</div>	
		<?php	endwhile; ?>
</div>

<?php endif; ?>
</div>

<div id="Green" class="attr-name active-tab" style="display:none">
  <h2>Green</h2>
  <p>Paris is the capital of France.</p>
</div>

<div id="Red" class="attr-name" style="display:none">
  <h2>Red</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Yellow" class="attr-name" style="display:none">
  <h2>Yellow</h2>
  <p>Tokyo is the capital of Japan.</p>
</div> -->

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php if ( 'no-archives-sidebar' !== $shoptimizer_layout_archives_sidebar ) { ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-posts' ); ?>
	</div><!-- #secondary -->
	<?php } ?>

<script>
function openProductList(evt, attrName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("attr-name");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active-tab", "");
  }
  document.getElementById(attrName).style.display = "block";
  evt.currentTarget.className += " active-tab";
}

</script>

<script>
	jQuery('.arrow_left').on('click', function(){
		var leftPos = jQuery('.home-product-list-section-one').scrollLeft();
		console.log(leftPos);
		 //jQuery('.home-product-list-section-one').animate({scrollLeft : leftPos - 200 + "px"}, 1000);
		 jQuery('.block_one').animate({ marginLeft: "+=190"}, 1000);
   });

			  /*animate({
                scrollLeft: '+='+200 
              }, 1000);*/
	
	jQuery('.arrow_right').on('click', function(){
		
		jQuery('.block_one').animate({marginLeft: '-=190' }, 1000);

			 /*animate({
			   scrollLeft: '+='+200 
			 }, 1000);*/
   });
</script>


<?php
get_footer();




