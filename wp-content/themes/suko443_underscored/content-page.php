<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Suko443_underscored
 */
?>
<!--*CONTENT-PAGE.PHP*-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
<?php if(is_page(sitemap)){
	//SITEMAP PAGE
	get_template_part('inc/sitemap') ;
} else { 
	//GENERAL CONTENT PAGE
	?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'suko443_underscored' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'suko443_underscored' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
<?php } ?>
	
</article><!-- #post-## -->
