<?php get_header(); ?>
	<section id="content">

		<div id="main" class="wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?><a></h1>
					<?php if ( !is_page() ){ ?>
						<p class="meta">
							By <?php the_author() ?> on <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_date('d-m-Y', '<span class="date">', '</span>'); ?></time>
							 | 
							<span class="comments">comments: <?php comments_popup_link(__('0','basic-theme-br'), __('1','basic-theme-br'), __('%','basic-theme-br'), 'comments-link', ''); ?></span>
						</p>
					<?php }; ?>
					
					<div class="entry-content">
						
						<?php the_content(); ?>
				
					</div>

				</article>


			<?php endwhile; ?>

			<?php else : ?>

				<article>
					<h2 class="notfound"><?php _e('Sorry, nothing found.','basic-theme-br');?></h2>
				</article>

			<?php endif; ?>
			
			 <?php if (function_exists("pagination")) {
             	pagination($additional_loop->max_num_pages);
         	 } ?>

		</div>
			
		<?php get_sidebar(); ?>
		
	</section> <!--/#content -->

<?php get_footer(); ?>