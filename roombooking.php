<?php
/*
Template Name: Room Booking
*/
?>
<?php get_header(); ?>

<div class="col-3">
	<?php get_template_part('login-form'); ?>
	<?php dynamic_sidebar( 'search-widget-area' ); ?>
	<?php dynamic_sidebar( 'weekly-notices-widget-area' ); ?>
	<?php dynamic_sidebar( 'data-collection-widget-area' ); ?>
	<?php dynamic_sidebar( 'useful-docs-widget-area' ); ?>	
</div>

<div class="col-9 col-md-8">
	<div class="row mb-4">
		<div class="col-12">
			<span class="h2 display-5"><?php echo cat_icon(); ?><?php the_title(); ?></span>
			<hr class="small">
			<div class="row">
			<div class="col-12 my-3"><span class="h5">Select a room...</span></div>
					<?php
					// Create recursive directory iterator which skips dot folders
					$dir = new RecursiveDirectoryIterator( './booking/rooms', FilesystemIterator::SKIP_DOTS );

					// Flatten the recursive iterator, folders come before their files
					$it = new RecursiveIteratorIterator( $dir, RecursiveIteratorIterator::SELF_FIRST );

					// Maximum depth is 0 levels deeper than the base folder
					$it->setMaxDepth( 0 );

					// Basic loop displaying different messages based on file or folder
					foreach ( $it as $fileinfo ) {
						if ( $fileinfo->isDir() ) {
							//printf("Folder - %s\n", $fileinfo->getFilename());
						} elseif ( $fileinfo->isFile() ) {
							//printf("%s<br />", $fileinfo->getFilename());
							$file = basename( ( $fileinfo->getFilename() ), ".html" );
							echo "<div class=\"col-2 mb-3\">";
							echo "<a class=\"btn btn-primary  btn-block\" role=\"button\"href=\"http://intranet/booking/rooms/" . $file . ".html\">" . $file . "</a>";
							echo "</div>";
						}
					}
					?>

		</div>
		
		<div class="row">
		<div class="col-12 my-3"><span class="h5">Select a set of iPads...</span></div>
			<?php
			// Create recursive directory iterator which skips dot folders
			$dir = new RecursiveDirectoryIterator( './booking/ipads', FilesystemIterator::SKIP_DOTS );

			// Flatten the recursive iterator, folders come before their files
			$it = new RecursiveIteratorIterator( $dir, RecursiveIteratorIterator::SELF_FIRST );

			// Maximum depth is 0 levels deeper than the base folder
			$it->setMaxDepth( 0 );

			// Basic loop displaying different messages based on file or folder
			foreach ( $it as $fileinfo ) {
				if ( $fileinfo->isDir() ) {
					//printf("Folder - %s\n", $fileinfo->getFilename());
				} elseif ( $fileinfo->isFile() ) {
					//printf("%s<br />", $fileinfo->getFilename());
					$file = basename( ( $fileinfo->getFilename() ), ".html" );
					echo "<div class=\"col-3 mb-3\">";
					echo "<a class=\"btn btn-primary text-uppercase text-center btn-block\" role=\"button\"href=\"http://intranet/booking/ipads/" . $file . ".html\">" . $file . "</a>";
					echo "</div>";
				}
			}
			?>
		
		</div>
		
		</div>
	</div>
</div>
		
<?php get_footer(); ?>