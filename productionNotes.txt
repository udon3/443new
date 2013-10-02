-------------------
Suko443 new project  (Aug 2013)

DEV environments 

template dev: flat html with SASS
	git repo: git@github.com:udon3/443new-flats.git
	local dev: http://suko443.flats:8080/ 
	local files: C:\wamp\www\suko443.new\443new-flats

site dev: wordpress
	git repo: git@github.com:udon3/443new.git
	local dev: http://suko443.new
	local files: C:\wamp\www\suko443.new\443new

Live site directory:
	\suko443_2013\
Local dev folder: C:\wamp\www\suko443.new\443new\

Dev live:
new.suko443.com

wp login / wp DB wp_suko443_2 - suko, norakurosan

-------------------
PRODUCTION NOTES
----------------



DB Migration from old:
----------------------

Generally keep the same content and structure (but maybe slightly alter the webdev area, so that all pages 

are blogs in this section (including the links and tools pages)

Imported ONLY the following DB tables (from live):
	wp_posts.sql
	wp_terms.sql
	wp_term_relationships.sql
	wp_term_taxonomy.sql

May be could've imported whole DB and mucked about, but The theme will be rebuilt from scratch, and with my 

limited database AND PHP knowledge, this feels cleaner.



IA + wireframing
-----------------

- responsive web

mobile-first or not?

http://www.lukew.com/ff/entry.asp?1569
Consider something incorporating these approaches:
	footerNav + Off-canvas
	Combined Off-canvas 
	Ajax lazy-loading

- using: https://www.lifeishao.com/rwdwire/  for rough layout  (login email gmail + usual pw)
	! this doesn't help for off-canvas designing



- support:
   desktop:
 	IE7+ (and test on IE10)
 	FF Mac/Win
 	Chrome
 	Opera
 	Safari Mac
   mobile:
	iPhone
	iPad
	Android
	Blackberry
	Windows Phone 7/8

- target audience:
	web dev community
	colleagues
	prospective clients
	me

- Screen resolutions (http://gs.statcounter.com/ for rough idea)
		     [Full downloaded data here - J:\WEB\SITES\SUKO443.com\SUKO443.new\1_production]
   desktop:	
	1366x768 (better look OK in this)		
	1024x768*(optimise for this, eventhough 1366x768 is apparently the most common today)		  	
	1440x900 (that's my pc monitor!)
	800x600
   mobile: (http://i-skool.co.uk/mobile-development/web-design-for-mobiles-and-tablets-viewport-sizes/)
	320x480 (most common - iphone 3/4, most blackberrys, some Android)
	320x568	(iphone5)
	360x340 (samsung galaxy s3)
	480x800 (htc Desire Z
	720x1280

*older ipads+ipad mini are at this res - most tablets are much higher res (http://www.tabletpccomparison.net/)

TESTING layouts and simple functionalities:
Screenfly 
WIndows Phone 8 SDK (but not on Windows 7 - need virtual machine set up: c.f. http://developer.nokia.com/Community/Wiki/Windows_Phone_8_SDK_on_a_Virtual_Machine_with_Working_Emulator)


-----------------
Tech
-----------------

Use Wordpress 3.6
-----------------
http://codex.wordpress.org/Version_3.6


Use SASS(SCSS) with Prepros 2.3.2 as compiler
---------------------------------------------
Prepros compiler app - No need for Ruby install.
(comes with latest version of sass, compass, + other preprocessing languages)
http://alphapixels.com/prepros/ (preprocessor/compiler - Prepros by Subash Pathak)

	Using Prepros
	-------------
	Need to manually change output path for each scss file - bit of a pain
	output path for compiled file is shown in the block - to change the path, click it.

	Using the Motherplate boilerplate, which comes with config.rb file
	
	Compass mixins: http://compass-style.org/reference/compass/css3/
	https://github.com/chriseppstein/compass/tree/stable/frameworks/compass/stylesheets/compass/css3
		

(should I look into bootstrap?? Actually, try Mother)

SASS/SCSS: http://sass-lang.com/


Use jQuery library
------------------
(+ jQueryMobile?)


Accessibility
-------------
color contrasts - checked OK
aria role attributes
skip nav or skip to content - applied skip link only
semantics headers and content order
images, other media - lazy load images?


TESTING
-------------
Contact form emails sent from localhost:
http://smtp4dev.codeplex.com/ (does away with needing to mess with php.ini settings)


WORDPRESS PLUGINS
-----------------

Contact Form 7 (disabled due to issues with markup!!)
	- incorporates cross-browser html5 placeholder attribute)
	- validation
	- captcha option
	see also: http://contactform7.com/controlling-behavior-by-setting-constants/



FUNCTIONALITIES
----------------

+ form validation and submit (with on blur error messages)
	more fun with forms:
	++ alternative/additional form fields for different queries/lang?
	++ show/hide additional fields / enable/disable fields according to selection, etc
+ accordions for list of dev tools + resources
+ print page (maybe even build a print basket??)
+ generic overlay plugin (that can act like a tooltip, with customisable options - position, markup, etc)
+ show message in an overlay after ajax loads


add to site for the rwd challenge:
http://mobile.smashingmagazine.com/2013/05/29/the-state-of-responsive-web-design/
+ embedded videos/iframe
+ feature photos (rwd resolution) + googlemap of photo's location in modal box (maybe carousel with modal?)
+ travel feature - rwd select options for continents or 'good for...food/views/challenge/etc'
  content: small travelogues accompanied by image carousels and maps, 
  with tabbed sections on tips (where I stayed, what I ate, how i got there)
+ responsive table (but with what content??)

 