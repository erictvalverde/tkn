<?php get_header(); ?>
<?php
	global $post;
	$categories = get_the_category($post->ID);
	$catID = $categories[0]->cat_ID;
	$catName = $categories[0]->category_nicename;
?>
<div id="<?php echo $catName ?>">
<section id="heading">
<i id="mainillustration"></i>
</section>

<section id="content">

	<div id="main" class="wrapper">
		
		<?php $my_query = new WP_Query('showposts=1&cat='.$catID); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<div class="copy">
					
					<?php the_content(); ?>
					
				</div>		
			</article>
		
		<?php endwhile; ?>

			
	</div>

	<?php get_sidebar(); ?>

</section> <!--/#content -->
</div>
<?php get_footer(); ?>