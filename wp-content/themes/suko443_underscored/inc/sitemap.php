<?php
/*
Template Name: sitemap-fragment*/
 ?>
	<!--*SITEMAP INCLUDE*-->


	<?php
	    
	    //note: 'theme location - needs setting up in http://suko443.new:8080/wp-admin/nav-menus.php' first
	    $args = array( 'theme_location' => 'fullnav', 'menu' => 'fullnav', 'menu_id' => 'sitemap', 'container' => false, 'depth' => 1);
	    wp_nav_menu($args);
	 ?>

	<h3><?php echo (get_the_title($ancestors)); ?></h3>
	<ul id="categories">
		<?php echo $children; ?>
		<li>
			<h3>Blog categories</h3>
			<ul>
				<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul>
		</li>
	</ul>
	