<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Suko443_underscored
 */

get_header(); ?>
	<!--*PAGE.PHP*-->
		<section class="content-bg">
					
			<div class="post">
			<!-- this div content will be a 'post' -->
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				<!--<?php
					// If comments are open or we have at least one comment, load up the comment template
					/*if ( comments_open() || '0' != get_comments_number() )
						comments_template();*/
				?>-->

				<?php endwhile; // end of the loop. ?>

				<a href="#top" class="toplink">Back to top</a>

			</div><!-- /.post -->

			
		</section><!--/.content-bg -->

	
		<!-- right col sidebar here -->	
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>
				
	






