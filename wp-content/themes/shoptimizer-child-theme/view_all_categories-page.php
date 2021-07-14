<?php
/**
 * The template for displaying full browser width pages.
 *
 * Template Name: View All Categories
 *
 * @package shoptimizer
 */

get_header();


$terms = get_terms( 'product_cat' );

?>


<div class="home-section-title-block">
    <h3 class="section-title">Categories list</h3>
    </div>
    <div class="home-product-list-section home-product-list-section-all-pages">
        <?php
foreach($terms as $term){
    $term_link = get_term_link( $term );
	?>
        <div class="home-product-item">
        <a href="<?php echo  esc_url( $term_link ) ?>">
                <?php $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
                        echo '<img src="' . $image[0] . '" alt="">';      
                        echo '<div class="image" style="background-image: url("' . $image[0] .'")"></div>'; ?>
                                  
            
            <p class="product-name"><?php echo $term->name ?></p>	
            </a>
        </div>
<?php
}
?>
					
 </div>
</div>
<?php
get_footer();