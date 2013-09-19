<?php
/*
Template Name: aside-webdev-fragment*/
 ?>



					

<section>
	<!--<h3>Web dev</h3>-->
	<nav role="navigation">
		<h3><a href="/webdev/">Webdev</a></h3>
	<?php
	    
	    //note: 'theme location - needs setting up in http://suko443.new:8080/wp-admin/nav-menus.php' first
	    $args = array( 'theme_location' => 'webdevnav', 'menu' => 'webdevnav', 'menu_id' => 'webdevnav', 'container' => false, 'depth' => 2);
	    wp_nav_menu($args);
	 ?>
	</nav>
	<nav role="navigation">
		<h3>Dev notes categories</h3>
		<ul>
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>

	</nav>	
	<?php if (is_single()||is_category()){ ?>


		<?php if (is_single()){ ?>
		<!-- tag cloud -->
		<section id="tagcloud">
			<h3>Tags</h3>
			<p><?php wp_tag_cloud( array( 'taxonomy' => 'post_tag' ) ); ?>	</p>		
		</section>
		<?php } ?>
	<?php } ?>



</section>