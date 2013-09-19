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
		<section>
			<nav role="navigation">
					
			<?php if (!is_single()){ ?>
			
				<?php
				// if using page.php (about, webdev landing, dev-tools and useful-reference):
				if(!$post->post_parent){
					// will display the subpages of this top level page
					$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				}else{
					// diplays only the subpages of parent level
					//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
					if($post->ancestors)
					{
						// get the top ancestor's ID of this page using php end() - which sets the internal pointer in the array to its last item
						$ancestors = end($post->ancestors);
						$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
						
						// you will always get the whole subpages list
					}
				}
				if ($children) { ?>
					<h3><?php echo (get_the_title($ancestors)); ?></h3>
					<ul id="subnav">
						<?php echo $children; ?>
						<li>
							<h4>Blog categories</h4>
							<ul>
								<?php wp_list_categories('show_count=1&title_li='); ?>
							</ul>
						</li>
					</ul>
					
					
				<?php } 

				// end code for page.php ?>

			<?php } else { ?>
				<?php if (is_category()){ ?>
					<h3>Category</h3>
					<ul id="subnav">
						<li class="page_item page-item-78"><a title="dev tools" href="/webdev/dev-tools">dev tools</a></li>
						<li class="page_item page-item-83 current_page_item"><a title="dev notes" href="/webdev/dev-notes">dev notes</a>
						<ul>
							<?php wp_list_categories(); ?> 
						</ul>
						</li>
					</ul>	
				<?php } else { ?>
					<h3>Webdev</h3>
					<ul id="subnav">
						<li class="page_item page-item-78"><a title="dev tools" href="/webdev/dev-tools">dev tools</a></li>
						<li class="page_item page-item-83 current_page_item"><a title="dev notes" href="/webdev/dev-notes">dev notes</a>
						<ul>
							<?php wp_list_categories(); ?> 
						</ul>
						</li>
					</ul>	
				<?php } ?>
			<?php } ?>
			</nav>		
			<!-- end:subnavigation -->
			<?php if (is_category()){ ?>
					<h3>Category</h3>
					<ul id="subnav">
						<li class="page_item page-item-78"><a title="dev tools" href="/webdev/dev-tools">dev tools</a></li>
						<li class="page_item page-item-83 current_page_item"><a title="dev notes" href="/webdev/dev-notes">dev notes</a>
						<ul>
							<?php wp_list_categories(); ?> 
						</ul>
						</li>
					</ul>	
			<?php } ?>
		</section>

		<?php if (is_single()){ ?>
		<section id="tagcloud">
			<h3>Tags</h3>
			<p><?php wp_tag_cloud( array( 'taxonomy' => 'post_tag' ) ); ?>	</p>		
		</section>
		<?php } ?>


		<!-- include template parts here for about page -->
		<section>
			<h3>recent work</h3>
			<ul>
				<li>Quisque odio felis, laoreet id luctus quis</li>
				<li>Aenean viverra feugiat eros</li>
				<li>Mauris eget est vitae est</li>
				<li>Vitae consectetur turpis</li>
			</ul>
		</section>
		<a class="sidetab" href="#top" title="Back to top">Back to top</a>
		<!-- / sidebar for about page -->



		<section>
			<h3><?php _e( 'Meta', 'suko443_underscored' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</section>
		


	</aside>
	<!-- /right col sidebar -->
	<a class="sidetab" href="#aside" title="Go to summary">Jump to summary</a>
	
