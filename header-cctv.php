<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="http://intranet/wp-content/css/bootstrap.css?v=1.8" type="text/css">
	<link href="http://intranet/wp-content/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link href="http://intranet/wp-content/css/tether.css" rel="stylesheet" type="text/css">
	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="http://intranet/wp-content/css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="http://intranet/wp-content/css/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="http://intranet/wp-content/themes/cheamtheme/style.css?v=2.0.2.2"/>
	<link href="http://intranet/wp-content/themes/cheamtheme/cctv-css/ekko-lightbox.css" rel="stylesheet" type="text/css">
</head>
<body <?php body_class(); ?>>
	<div class="bg-dark mb-3">
		<div class="maxwide m-auto p-0">
			<nav class="navbar navbar-toggleable-sm navbar-light p-0 pl-2">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<img class="float-right" src="http://intranet/wp-content/images/small-logo.png" alt="CHS Logo">
			</nav>
		</div>
	</div>
	<div class="container-fluid maxwide">
		<?php dynamic_sidebar( 'alert-widget-area' ); ?>
			<div class="row">