<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="row">
	<div class="col-12">
		<span class="h3">
				<?php the_title(); ?>
		</span>
		<hr>
		<?php the_content(); ?>
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>