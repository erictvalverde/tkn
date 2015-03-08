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
	<div id="ajax-filter">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<div class="copy">
					
					<?php the_content(); ?>
					
				</div>		
			</article>
		<?php endwhile; endif; ?>

	</div>			
	</div>

	<?php get_sidebar(); ?>

</section> <!--/#content -->
</div>
<?php get_footer(); ?>