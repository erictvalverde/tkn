<?php get_header(); ?>

<section id="heading">
		
	<div class="wrapper">
		<h1>
			Hi there! I’m Tarsila, an <span>Illustrator</span> and <span>Designer</span> <i>with a passion for children's books and art.</i>
		</h1>
		<?php /* <i id="mainillustration"></i> */ ?>
	</div>

</section>
<section id="content">
<div id="main">
			
		<section id="featured">
			<h2>Check out some of my latest works</h2>
			<section id="works" class="flexslider">
				<ul class="slides">
				
					<li>
						<a class="imgholder" href="<?php echo stripslashes(get_option('tkn_slide1_link')); ?>" rel="bookmark">
						    <img src="<?php echo stripslashes(get_option('tkn_slide1_img')); ?>" />
						</a>
						<h1>
							<a href="<?php echo stripslashes(get_option('tkn_slide1_link')); ?>" rel="bookmark">
								<?php echo stripslashes(get_option('tkn_slide1_title')); ?>
							</a>
						</h1>
					</li>
					<li>
						<a class="imgholder" href="<?php echo stripslashes(get_option('tkn_slide2_link')); ?>" rel="bookmark">
						    <img src="<?php echo stripslashes(get_option('tkn_slide2_img')); ?>" />
						</a>
						<h1>
							<a href="<?php echo stripslashes(get_option('tkn_slide2_link')); ?>" rel="bookmark">
								<?php echo stripslashes(get_option('tkn_slide2_title')); ?>
							</a>
						</h1>
					</li>
					<li>
						<a class="imgholder" href="<?php echo stripslashes(get_option('tkn_slide3_link')); ?>" rel="bookmark">
						    <img src="<?php echo stripslashes(get_option('tkn_slide3_img')); ?>" />
						</a>
						<h1>
							<a href="<?php echo stripslashes(get_option('tkn_slide3_link')); ?>" rel="bookmark">
								<?php echo stripslashes(get_option('tkn_slide3_title')); ?>
							</a>
						</h1>
					</li>
				
				</ul>
			</section>
			<?php /*
			<div id="getintouch">
				<p>Do you have a project?<br /> I'd love to work with you!</p>
				<a href=""><i>Get in touch</i></a>
			</div>
			*/ ?>
		</section>	
		
		<section id="blog-hp">

			<div class="wrapper">

				<div class="col blog">
					<h2>Blog</h2>
					<?php $my_query = new WP_Query('showposts=2&cat=58'); while ($my_query->have_posts()) : $my_query->the_post(); if ( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); $do_not_duplicate = $post->ID; ?>
					<article class="article-snippet">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		                    <i class="imgholder"><?php the_post_thumbnail('thumbnail') ?></i>
		                    <?php } ?>
						<?php the_excerpt(); ?>
					</article>
					<?php endwhile; ?>
				</div>
				<div id="about-me" class="col">
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('About')) : else : ?> <?php endif; ?>
				</div>
				<div id="contact" class="col">
					<h2>Contact</h2>
					<div id="respond">
					<form action="<?php bloginfo('template_url'); ?>/enviaForm.php" method="post" id="contactForm">
	 					<input type="hidden" name="subject" value="Contact from tarsilakruse.com.br" />	
	 						<label for="name" class="name">Name:</label>
							<input id="name" name="name" type="text" placeholder="Name" /> 
							<label for="email" class="email">Email:</label>
							<input id="email" name="email" type="text"  placeholder="E-mail" />
							<label for="msg">Message:</label>
							<textarea id="msg" cols="10" rows="4" name="msg" placeholder="Message"></textarea>
							<input id="submit" type="submit" value="Send Message" />					
						</form>
					</div>
				</div>

			</div>

		</section>
		
</div>
</section> <!--/#content -->
<?php get_footer(); ?>