<?php
/*
Template Name: CCTV
*/
?>
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
<!--- FIXED BOTTOM LINKS -->
<div class="fixed-bottom bg-white text-center border-top p-1 cctv-bottom-nav">Quick Jump: 
<?php
// TEXTLINKS - THIS CODE GENERATES THE TEXT LINKS TO EACH BLOCKS ANCHOR LINK				
// Create recursive directory iterator which skips dot folders
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cheamtheme/cctv/thumbs', FilesystemIterator::SKIP_DOTS );
// Flatten the recursive iterator, folders come before their files
$it = new RecursiveIteratorIterator( $dir, RecursiveIteratorIterator::SELF_FIRST );
// Maximum depth is 0 levels deeper than the base folder
$it->setMaxDepth( 0 );
$array[] = $it;
sort($array);
// Basic loop displaying different messages based on file or folder
foreach ( $it as $fileinfo ) {
	if ( $fileinfo->isDir() ) {
		printf("<a href=\"#%s\"><u>%s</u></a> | \n", $fileinfo->getFilename(), $fileinfo->getFilename());
	} 
}
// END OF TEXTLINKS
?>
</div>

<div class="col-3">
	<?php get_template_part('login-form'); ?>
	<?php dynamic_sidebar( 'search-widget-area' ); ?>
	<?php dynamic_sidebar( 'weekly-notices-widget-area' ); ?>
	<?php dynamic_sidebar( 'data-collection-widget-area' ); ?>
	<?php dynamic_sidebar( 'useful-docs-widget-area' ); ?>	
</div>

<div class="col-8">
	<div class="row mb-4">
		<div class="col-12">
		<span class="h3 display-5"><?php the_title(); ?></span>
		<hr class="small mb-4">
		<p>Please note that these are not the live camera feeds. They are just examples of each cameras viewpoint so you can tell us which camera(s) you want footage from.</p>
		<h5>To submit your request for <strong>Internal CCTV</strong> footage, please <a href="http://intranet/it-support/open-support-ticket">Open A Support Ticket</a></h5>
		<p>Click on the block name to jump to that buildings cameras:</p>
		<hr class="small mb-4">
<?php
// TEXTLINKS - THIS CODE GENERATES THE TEXT LINKS TO EACH BLOCKS ANCHOR LINK				
// Create recursive directory iterator which skips dot folders
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cheamtheme/cctv/thumbs', FilesystemIterator::SKIP_DOTS );
// Flatten the recursive iterator, folders come before their files
$it = new RecursiveIteratorIterator( $dir, RecursiveIteratorIterator::SELF_FIRST );
// Maximum depth is 0 levels deeper than the base folder
$it->setMaxDepth( 0 );
$array[] = $it;
sort($array);
// Basic loop displaying different messages based on file or folder
foreach ( $it as $fileinfo ) {
	if ( $fileinfo->isDir() ) {
		printf("<a href=\"#%s\"><u>%s</u></a> | \n", $fileinfo->getFilename(), $fileinfo->getFilename());
	} 
}
// END OF TEXTLINKS
?>
<div>
	<div>
		<div>
<?php
// THUMBNAILS - THIS CODE GENERATES THE THUMBNAILS FOR EACH BLOCK
// Create recursive directory iterator which skips dot folders
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cheamtheme/cctv/thumbs', FilesystemIterator::SKIP_DOTS );
// Flatten the recursive iterator, folders come before their files
$it = new RecursiveIteratorIterator( $dir, RecursiveIteratorIterator::SELF_FIRST );
// Maximum depth is 1 level deeper than the base folder. The code will scan inside each
// blocks folder but not folders inside those.
$it->setMaxDepth( 1 );
$array[] = $it;
sort($array);
// Basic loop displaying different messages based on file or folder
foreach ( $it as $fileinfo ) {
	if ( $fileinfo->isDir() ) {
		printf("</div></div></div><div class=\"card mt-4\"><h3 class=\"card-header\"><a name=\"%s\"></a>%s</h3><div class=\"card-body\"><div class=\"row\">\n", $fileinfo->getFilename(), $fileinfo->getFilename()); } 
	elseif ( $fileinfo->isFile() ) {
		$filetypes = array("jpg", "png");
		$filetype = pathinfo($fileinfo, PATHINFO_EXTENSION);
		if (in_array(strtolower($filetype), $filetypes)) {
			$file = basename( ( $fileinfo->getFilename() ), ".jpg" );
			echo "<div class=\"col-md-2 col-sm-3 p-2 text-center\">\n";
			echo "<a href=\"/wp-content/themes/cheamtheme/cctv/" . $dir . "/" . $file . ".jpg\"  data-toggle=\"lightbox\" data-title=\"".$file."\"  data-gallery=\"".$dir."\"><img class=\"img-fluid pb-1\" src=\"/wp-content/themes/cheamtheme/cctv/thumbs/" . $dir . "/" . $file . ".jpg\"><br>" . $file . "</a>\n";
			echo "</div>\n";
		}
	}
}
// END OF THUMBNAILS
?>
		</div>
	</div>
</div>
		
<?php get_footer('cctv'); ?>