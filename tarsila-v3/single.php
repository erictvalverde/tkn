<?php get_header(); ?>

<?php if(in_category(array(1,4))){ 

	get_template_part( 'inc/single-template' );

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
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">
					
					<?php the_content(); ?>
					<span class="byline author vcard">
						Author: <span class="fn"><?php the_author() ?></span>
					</span>
				</div>
				
				<aside id="commentsbox">
					<?php comments_template(); ?>
				</aside>

			</article>

		

		<?php endwhile; ?>
		<?php else : ?>

			<h2 class="notfound"><?php _e('Sorry, nothing found.','basic-theme-br');?></h2>

		<?php endif; ?>
		<div class="archiveNav">
			<div class="left"><?php previous_post_link('%link', '&laquo; %title', true) ?></div>
			<div class="right"><?php next_post_link('%link', '%title &raquo;', true); ?> </div>
		</div>
		</div>
			
		<?php get_sidebar(); ?>
		
		

	</section> <!--/#content -->
</div>
<?php } //end else ?>	
<?php get_footer(); ?>