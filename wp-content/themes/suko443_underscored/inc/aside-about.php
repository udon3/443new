<?php
/*
Template Name: aside-about-fragment*/
 ?>
						
				
				<section>
					<h3>summary</h3>
					<ul class="bullet">
						<?php 
						/*using custom field for 'summary' list*/
						// create variable for each custom field key
						$summarylist = get_post_meta($post->ID, 'summary-list', $single = true);
						echo $summarylist; 
						?>
					</ul>
					
				</section>
				<section>
					<h3>contact</h3>
					<p>For more information please <a href="/contact">contact me</a>.</p>
				</section>
				<section>
					<h3>recent work</h3>
					<ul class="bullet">
						<?php /*using custom field for 'recent work'*/
						$recentwork = get_post_meta($post->ID, 'recent-work', $single = true);
						echo $recentwork; 
						?>
					</ul>
				</section>