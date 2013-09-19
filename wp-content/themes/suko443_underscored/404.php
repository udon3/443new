<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Suko443_underscored
 */

get_header(); ?>

	<!--*404.PHP*-->
	<div class="page-body">
		<section class="content-bg">
					
			<div class="post">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'suko443_underscored' ); ?></p>

				<?php get_search_form(); ?>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				<?php if ( suko443_underscored_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
				<div class="widget widget_categories">
					<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'suko443_underscored' ); ?></h2>
					<ul>
					<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					?>
					</ul>
				</div><!-- .widget -->
				<?php endif; ?>

				<?php
				/* translators: %1$s: smiley */
				$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'suko443_underscored' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>

				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

			</div><!-- /.post -->

			
		</section><!--/#main -->

	
		<!-- right col sidebar here -->	
		<?php get_sidebar(); ?>
				
	</div>


<?php get_footer(); ?>