<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Suko443_underscored
 */
?>
	<!--*SIDEBAR.PHP*-->
	<?php do_action( 'before_sidebar' ); ?>
		
	<!-- right col sidebar -->		
	<aside id="aside" role="complementary">

			<?php if (is_page('about')){ 
				get_template_part('inc/aside-about') ; 
			} else if ( is_page('webdev')||is_page('devnotes')|| is_single()||is_category()){
				get_template_part('inc/aside-webdev') ; 
			}    
			if($post->ancestors){
				// get the top ancestor's ID of this page using php end() - which sets the internal pointer in the array to its last item
				$ancestors = end($post->ancestors);
				if($ancestors == 20){
				get_template_part('inc/aside-webdev') ; 
				}
			}
			?>

		
				
			



		<!--<section>
			<h3><?php _e( 'Meta', 'suko443_underscored' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</section>-->
		


	</aside>
	<!-- /right col sidebar -->
	<a class="sidetab" href="#aside" title="Go to summary">Jump to summary</a>
	
