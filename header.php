<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/all.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?v=0.0.3"/>
	<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	<link rel="manifest" href="/favicons/site.webmanifest">
	<link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#05324e">
	<link rel="shortcut icon" href="/favicons/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo( 'name' ); ?>">
	<meta name="application-name" content="<?php echo get_bloginfo( 'name' ); ?>">
	<meta name="msapplication-TileColor" content="#05324e">
	<meta name="msapplication-config" content="/favicons/browserconfig.xml">
	<meta name="theme-color" content="#05324e">
</head>
<body <?php body_class(); ?>>
	<div class="container">
		<div class="row breadcrumbs-row">
			<div class="col-12 pt-2">
			<!--	<img class="float-right" src="<?php // echo get_template_directory_uri(); ?>/images/site-logos/logo-50px-no-txt.png" alt="OPH Logo"> -->
			<?php get_template_part('inc/username-50px-avatar'); ?>
			</div>
		</div>
	<div class="row nav-bg">
		<nav class="nav">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
	</div>
	<div class="row breadcrumbs-row pt-2">
		<div class="breadcrumbs mb-2" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php
				if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
		</div>
	</div>