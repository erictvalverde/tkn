<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'basic-theme-br' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">	
	<meta name="google-site-verification" content=""><!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	<meta name="author" content="Eric Valverde">
	<meta name="Copyright" content="Copyright Tarsila Kruse 2011. All Rights Reserved.">
	<meta name="DC.title" content="Tarsila Kruse">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link href="http://feeds.feedburner.com/TarsilaKruseIllustrator" rel="alternate" title="RSS 2.0" type="application/rss+xml" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/style.css">
	<script src="<?php bloginfo('template_directory'); ?>/javascripts/modernizr.min.js"></script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<?php //load_theme_textdomain( 'basic-theme-br') ?> 
</head>
<body <?php body_class(); ?> >

	<header id="header">
		<div class="wrapper">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<nav id="mainnav">
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
			</nav>
		</div>	
	</header>
	