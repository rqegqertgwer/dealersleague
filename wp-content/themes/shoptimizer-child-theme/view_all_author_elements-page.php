<?php
/**
 * The template for displaying full browser width pages.
 *
 * Template Name: View All Author elements
 *
 * @package shoptimizer
 */


get_header();

$author_lists = get_terms( 'pa_book-author' );
 
?>

<div class="home-product-list-section">
<?php
foreach($author_lists as $author_list){
	?>

			<div class="home-product-item">
			   <a href='/view-all-<?php echo $term->name ?>'>
					<?php if(has_post_thumbnail()){ ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php } ?>
				</a>
				<p class="product-name"><?php echo $author_list->name ?></p>						
			</div>	

<?php
}
?>
</div>


<?php
get_footer();