<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Suko443_underscored
 */
?>
			</main>
			<!-- #searchwrap here -->
			
			<?php get_search_form(); ?>

			<!-- footer here -->
			<?php get_footer(); ?>
			<footer role="contentinfo" class="clfx">
				<ul>
					<li><a href="/contact">contact</a></li>
					<li><a href="/accessibility">accessibilty</a></li>
					<li><a href="/sitemap">sitemap</a></li>
				</ul>
				<p>The 'Folk' font used for the logo and navigation in this site: by <a href="http://www.marcelomagalhaes.net/" target="_blank">Marcelo Magalhães</a>.</p>
				<p>suko443 is proudly powered by <a href="http://wordpress.org/" target="_blank">WordPress 3.0.1</a></p>
				<p>&copy;suko443.com</p>
			</footer>
			

		</div><!-- /#centre -->
	</div><!-- /#wrap -->




	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.10.1.min.js"><\/script>')</script>

	<?php wp_footer(); ?>

</body>
</html>