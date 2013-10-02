<?php
/**
 * @package Suko443_underscored
 * Template Name: Webdev demos
 */
 get_header(); ?>
	
	<!--*PAGE-WEBDEVDEMOS.PHP*-->
	<!-- template for pages containing demos in the webdev section -->
		<section class="content-bg">
					
			<div class="post">

				<header class="entry-header">
					<h1><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

			<!-- this div content will be a 'post' -->
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php the_content(); ?>
				
				<?php if(is_page(jquery-accordions)){
					//accordions demo
					get_template_part('inc_webdev_demos/accordions'); ?>


				<?php } ?>	

				<?php endwhile; // end of the loop. ?>

				<a href="#top" class="toplink">Back to top</a>

			</div><!-- /.post -->

			
		</section><!--/.content-bg -->

	
		<!-- right col sidebar here -->	
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>

				
	






