<?php get_header(); ?>

<?php if(is_category(array(1,4))){ 

	get_template_part( 'inc/cat-template' );

}else{ ?>

<div id="blog">
	<section id="heading">
			
	</section>

	<section id="content">

		<div id="main" class="wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_date('d-m Y', '<span class="date">', '</span>'); ?></time>
					<span class="comments"><?php comments_popup_link(__('0','basic-theme-br'), __('1','basic-theme-br'), __('%','basic-theme-br'), 'comments-link', ''); ?></span>
					 
					 <?php /*
					 <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>

                        <a href="<?php the_permalink() ?>" rel="bookmark" class="imgholder"><?php the_post_thumbnail('thumbnail'); ?> </a>

                     <?php } else { ?>
                         <a href="<?php the_permalink() ?>" rel="bookmark" class="imgholder"><img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" /></a>
                      <?php } ?>
					*/ ?>
					
					<h1 class="entry-title"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					
					<?php the_content(); ?>
					<!--p><a href="<?php the_permalink() ?>" rel="bookmark">Read more</a></p-->
				</article>

			<?php endwhile;?>

			<?php if (function_exists("pagination")) {
              pagination($additional_loop->max_num_pages);
          	} ?>
          	<?php else : ?>
          		<article>
					<h2 class="notfound"><?php _e('Sorry, nothing found.','basic-theme-br');?></h2>
				</article>
			<?php endif; ?>
		</div>
		
		<?php get_sidebar(); ?>
	</section> <!--/#content -->
</div>

<?php } ?>


<?php get_footer(); ?>