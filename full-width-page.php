<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="col-12 text-center">
	<div class="row mb-4">
		<div class="col-12">
			<span class="h3 display-5">
				<?php the_title(); ?>
		    </span>
			<hr class="small mb-4">
			<?php the_content(); ?>
			
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>