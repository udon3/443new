<?php
/*
Template Name: accordions-fragment*/
 ?>


	<!--*/INC_WEBDEV_DEMOS/ACCORDIONS.PHP*-->

<!-- (page slug: jquery-accordions)-->
			

		
			<!--<h2 class="h3-type">Notes on keyboard accessibility</h2>
As default, tabbing will only allow you to focus on the first accordion item.

'Unsetting' the <code>tabindex</code> attribute value will enable tabbing through each accordion header:
<pre><code>$(".ui-accordion-header").attr("tabindex","");</code></pre>
Resource (+ more info): <a href="http://lab.dotjay.co.uk/tests/jquery-ui-accordion-keyboard-accessibility/">http://lab.dotjay.co.uk/tests/jquery-ui-accordion-keyboard-accessibility/</a>-->
			
			<h2 class="h3-type">Example 1: </h2>
			
			<p><strike><code>navigation:true</code> enables an external link to target and open a specific segment of the accordion. BUT it wont work for same page links.</strike> The <code>navigation</code> option has been deprecated along with many others.</p>
			<p>The <code>navigation</code> option has been deprecated in v1.9 along with many others. (See <a href="http://jqueryui.com/upgrade-guide/1.9/">http://jqueryui.com/upgrade-guide/1.9/</a></p>
			<p>For same page links, use the autoOpenSegment function with the hashchange plugin. (It's a bit buggy in IE7 - the focus goes to the right element, but the panel doesn't open until you hit enter.)</p>


			<div id="accordion1" class="accordion" role="tablist">
				<h3 role="tab">navigable + no auto height</h3>
				<div role="tabpanel">
					<pre>
$('#accordion1').accordion({
	header:'h3',
	heightStyle: 'content'
});
					</pre>
				</div>
				<h3 role="tab">accordion header 2</h3>
				<div role="tabpanel">
					accordion segment content 2.
					Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar. 
				</div>
				<h3 role="tab">accordion header 3</h3>
				<div role="tabpanel">
					accordion segment content 3.
					Quisque vitae enim eu mauris suscipit porttitor ut ut libero. Curabitur sit amet libero at massa feugiat scelerisque. 
				</div>
			</div>



			<h2 class="h3-type">Example 2: </h2>
			<p>Actually, this could be done simply without the use of the UI plugin</p>
			<div id="accordion2" class="accordion" role="tablist">
				<h3 role="tab">collapsible + togglable accordion</h3>
				<div role="tabpanel">
					<pre>
$('#accordion2').accordion({
	collapsible:true,
	active:false
});
					</pre>
				</div>
				<h3 role="tab">accordion header 2</h3>
				<div role="tabpanel">
					accordion segment content 2.
					Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar. 
				</div>
				<h3 role="tab">accordion header 3</h3>
				<div role="tabpanel">
					accordion segment content 3.
					Quisque vitae enim eu mauris suscipit porttitor ut ut libero. Curabitur sit amet libero at massa feugiat scelerisque. 
				</div>
			</div>



			<h2 class="h3-type">Example 3: </h2>
			<p>When very long accordions are opened, the content sometimes opens with the top out of view of the viewport, neccessitating the user to scroll up. This script makes use of the <code>change</code> event to scroll the opened content to top. </p>
			<div id="accordion3" class="accordion" role="tablist">
				<h3 id="one" role="tab">with additional scroll script</h3>
				<div role="tabpanel">
					<pre>
$('#accordion3').accordion({
	heightStyle: 'content',
	// accordion activate adds event that fires after panel is activated. see http://api.jqueryui.com/accordion/#event-activate
    activate: function(event, ui) {				
		console.log('hi');
		//but only if the acordion's opening
		if (ui.newHeader.length > 0)
		{
			var y = ui.newHeader.offset().top - 100; // 100 provides buffer in viewport
			$('html,body').animate({ scrollTop: y }, 500);
		}
    }
});

					</pre>
					<p>accordion activate adds event that fires after panel is activated. see the <a href="http://api.jqueryui.com/accordion/#event-activate">official documentation on jQuery UI accordion</a></p>
				</div>
				<h3 id="two" role="tab">accordion tooooooooo</h3>
				<div role="tabpanel">
					accordion segment content 2.
					Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar. Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar.
				</div>
				<h3 id="three" role="tab">accordion header threeeeeee</h3>
				<div role="tabpanel">
					accordion segment content 3.
					Quisque vitae enim eu mauris suscipit porttitor ut ut libero. Curabitur sit amet libero at massa feugiat scelerisque. Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar. Sed placerat adipiscing ornare. Duis tristique tincidunt dolor, a tempus turpis lobortis et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet, nibh dapibus lobortis porta, diam felis ullamcorper enim, nec eleifend ligula risus quis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec commodo eros. Vivamus ut porta metus. Duis ligula orci, laoreet viverra ullamcorper at, condimentum ut ipsum. Nunc quis orci in ipsum pretium pulvinar.
				</div>
			</div>


			<h2 class="h3-type">Linking to an accordion section (from external page or same page)</h2>
			<p>The function <code>autoOpenSeg</code> checks for strings after the hash in <code>document.location</code> then triggers the cllck event on it (the function is called on document.ready.</p>

			<p>However, on its own it won't work if the section is linked from the same page. For this, use the <a href="http://benalman.com/projects/jquery-hashchange-plugin/">jquery hashchange plugin</a> and bind autoOpenSeg to the hashchange event.</p>
			<p><a href="#three">open "accordion threeeeeee" above.</a></p>
			<p>Note that the hashchange plugin is primarily useful for enabling "basic bookmarkable #hash history".</p>
			<p><a href="#two">open "accordion tooooooo" above, then test the back button.</a></p>