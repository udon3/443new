<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Suko443_underscored
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css">
<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<meta name="author" content="suko" />
<meta name="description" content="suko443.com is the serious website of Suko Yoshimi, a London-based freelance front-end web developer." />
<meta name="keywords" content="suko, yoshimi, atsuko, 443, web, developer, webdeveloper, front-end, html, html5, xhtml, css, jquery, javascript" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--<div id="responsivetest">
<b>RESPONSIVE TEST</b>
</div>-->

<div id="page" class="hfeed site">

<!-- #wrap contains the image bg, #center is the centered content area-->
	<div id="wrap">	
		<div id="centre">
	<?php do_action( 'before' ); ?>
			<a class="skip" href="#main">skip to main content</a>
			<header id="top">
			<!-- site logo -->
				<img id="logo" src="<?php bloginfo('template_directory'); ?>/css/assets/logo.png" alt="suko443 logo" />
				
				<!-- main nav -->
				<nav role="navigation">
					<!-- simple nav : screen width < 480 -->
					<ul id="simple-nav">
						<li class="menu-button"><a href="" title="view main navigation">menu</a></li>
						<li class="aside-button"><a href="" title="view supplementary content">aside</a></li>
					</ul>
					<a class="searchtab" href="#search">Search</a>

					<?php if (is_single()||is_category()){ ?>
					<!-- posts and category pages should appear under webdev -->
					<ul class="classNav offcanvas" id="mainnav">
						<li class="menu-item" id="menu-item-302"><a href="/">Home</a></li>
						<li class="menu-item" id="menu-item-303"><a href="/about">About</a></li>
						<li class="menu-item current-menu-item"><a href="/webdev">Webdev</a></li>
					</ul>
					<?php } else {?>

					<?php
				        //note: 'theme location - needs setting up in http://suko443.new:8080/wp-admin/nav-menus.php' first
				        $args = array( 'theme_location' => 'mainnav', 'menu' => 'mainnav', 'menu_class' => 'classNav', 'menu_id' => 'mainnav', 'container' => false, 'depth' => 1);
				        wp_nav_menu($args);
					} ?>

				<!-- #site-navigation -->
				
				</nav>			
				<!-- /main nav -->

				
				
			</header>
						
			
			
			<main role="main" class="page-body">