<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Suko443_underscored
 */

get_header(); ?>
	<!--*SINGLE.PHP*-->
	
		<section class="content-bg">
					
			<div class="post">
			<!-- this div content will be a 'post' -->
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php suko443_underscored_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

				<?php endwhile; // end of the loop. ?>

				<a href="#top" class="toplink">Back to top</a>

			</div><!-- /.post -->

			
		</section><!--/.content-bg -->

	
<?php get_sidebar(); ?>
<?php get_footer(); ?>

				
	
			
			
			





