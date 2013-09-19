<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Suko443_underscored
 */
get_header(); ?>
<!--*HOME.PHP* (blog posts index template)-->
<section class="content-bg">

<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php suko443_underscored_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>	


</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
