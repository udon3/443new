<?php
/*
Template Name: aside-tag-fragment*/
 ?>
			<aside role="complementary">				
				<!-- aside-tag-frag.php --> 
				<section>
					<h3>Webdev section</h3>
					<!-- start:subnavigation -->
					<nav role="navigation">
					<?php
					if(!$post->post_parent){
						
						// will display the subpages of this top level page
						$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
					}else{
						// diplays only the subpages of parent level
						//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
						
						if($post->ancestors)
						{
							// now you can get the the top ID of this page
							// wp is putting the ids DESC, thats why the top level ID is the last one
							$ancestors = end($post->ancestors);
							$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
							// you will always get the whole subpages list
						}
					}
					if ($children) { ?>
						<ul id="subnav">
							<?php echo $children; ?>
						</ul>
					<?php } ?>
					
					</nav>	
					<!-- end:subnavigation -->
					
				</section>
			</aside>