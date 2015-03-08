<?php get_header(); ?>
<div id="blog">
	<section id="heading">
			
	</section>

	<section id="content">

		<div id="main" class="wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
			<?php if(!is_page()){ ?>
				<time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_date('d-m Y', '<span class="date">', '</span>'); ?></time>
				<span class="comments"><?php comments_popup_link(__('0','basic-theme-br'), __('1','basic-theme-br'), __('%','basic-theme-br'), 'comments-link', ''); ?></span>
			<?php } ?>
				
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">
					
					<?php the_content(); ?>
			
				</div>
			<?php if(!is_page()){ ?>
				<aside id="commentsbox">
					<?php comments_template(); ?>
				</aside>
			<?php } ?>
			
			<?php if(is_page('contact') ):  ?>
			
				<div id="respond">
					<form action="<?php bloginfo('template_url'); ?>/enviaForm.php" method="post" id="contactForm">
	 					<input type="hidden" name="subject" value="Contact from tarsilakruse.com.br" />	
	 						<label for="name">Name:</label>
							<input id="name" name="name" type="text" /> 
							<label for="email">Email:</label>
							<input id="email" name="email" type="text" />
							<label for="msg">Message:</label>
							<textarea id="msg" cols="10" rows="4" name="msg"></textarea>
							<input id="submit" type="submit" value="Send Message" />					
						</form>
					</div>
		
		<?php endif; ?>

			</article>


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
</div>
<?php get_footer(); ?>