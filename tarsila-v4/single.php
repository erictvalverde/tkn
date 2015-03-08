<?php get_header(); ?>
	<section id="content">

		<div id="main" class="wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p class="meta">
						By <?php the_author() ?> on <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_date('d-m-Y', '<span class="date">', '</span>'); ?></time>
						 | 
						<span class="comments">comments: <?php comments_popup_link(__('0','basic-theme-br'), __('1','basic-theme-br'), __('%','basic-theme-br'), 'comments-link', ''); ?></span>
					</p>
					
					<div class="entry-content">
						
						<?php the_content(); ?>
				
					</div>

				</article>

				<?php comments_template(); ?>


			<?php endwhile; ?>

			<?php else : ?>

				<article>
					<h2 class="notfound"><?php _e('Sorry, nothing found.','basic-theme-br');?></h2>
				</article>

			<?php endif; ?>
			
			<div class="archiveNav">
				<div class="left"><?php previous_post_link('%link', '&laquo; %title', true) ?></div>
				<div class="right"><?php next_post_link('%link', '%title &raquo;', true); ?> </div>
			</div>

		</div>
			
		<?php get_sidebar(); ?>
		
	</section> <!--/#content -->

<?php get_footer(); ?>