<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="http://intranet/wp-content/css/bootstrap.css?v=1.8" type="text/css">
	<link rel="stylesheet" href="http://intranet/wp-content/css/all.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://intranet/wp-content/themes/cheamtheme/style.css?v=2.0.5.0"/>
	<?php if ( is_front_page() ) { ?>
	<link rel="stylesheet" type="text/css" href="http://intranet/wp-content/themes/cheamtheme/index-style.css ">
	<?php } ?>
</head>
<body <?php body_class(); ?>>
	<div class="nav-div mb-3">
		<div class="maxwide m-auto p-0">
			<nav class="navbar navbar-toggleable-sm navbar-light p-0 pl-2">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<img class="float-right d-none d-lg-inline" src="http://intranet/wp-content/images/small-logo.png" alt="CHS Logo">
			</nav>
		</div>
	</div>
	<div class="container-fluid maxwide">
	<div class="row">