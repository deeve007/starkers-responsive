<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
	
	<!-- Stylesheet for flexnav responsive menu -->
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/flexnav.css" rel="stylesheet" type="text/css" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	
	<header id="masthead" role="banner">
		<h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php bloginfo( 'description' ); ?>
		
		<div class="menu-button">Menu</div>
		<nav role="navigation">
			<?php wp_nav_menu( array('menu' => 'Primary', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s flexnav" data-breakpoint="959">%3$s</ul>', )); ?>
		</nav>
	</header>