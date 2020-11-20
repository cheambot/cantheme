<?php
/*
Template Name: Internal CCTV
*/
?>
<?php get_header('cctv-ext'); ?>
<!--- FIXED BOTTOM LINKS -->
<div class="fixed-bottom bg-white text-center border-top p-1 cctv-bottom-nav">Quick Jump: 
<?php
// TEXTLINKS - THIS CODE GENERATES THE TEXT LINKS TO EACH BLOCKS ANCHOR LINK				
// Create recursive directory iterator which skips dot folders
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cantheme/internal-cctv/thumbs', FilesystemIterator::SKIP_DOTS );
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

<div class="row">
	<div class="col-12">
		<span class="h3">
				<?php the_title(); ?>
		</span>
		<hr class="small mb-4">
		<p>Please note that these are not the live camera feeds. They are just examples of each cameras viewpoint so you can tell us which camera(s) you want footage from.</p>
		<h5>To submit your request for <strong>Internal CCTV</strong> footage, please <a href="http://staffintranet/it-support/open-support-ticket">Open A Support Ticket</a></h5>
		<p>Click on the block name to jump to that buildings cameras:</p>
		<hr class="small mb-4">
<?php
// TEXTLINKS - THIS CODE GENERATES THE TEXT LINKS TO EACH BLOCKS ANCHOR LINK				
// Create recursive directory iterator which skips dot folders
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cantheme/internal-cctv/thumbs', FilesystemIterator::SKIP_DOTS );
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
$dir = new RecursiveDirectoryIterator( './wp-content/themes/cantheme/internal-cctv/thumbs', FilesystemIterator::SKIP_DOTS );
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
			echo "<a href=\"/wp-content/themes/cantheme/internal-cctv/" . $dir . "/" . $file . ".jpg\"  data-toggle=\"lightbox\" data-title=\"".$file."\"  data-gallery=\"".$dir."\"><img class=\"img-fluid pb-1\" src=\"/wp-content/themes/cantheme/internal-cctv/thumbs/" . $dir . "/" . $file . ".jpg\"><br>" . $file . "</a>\n";
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