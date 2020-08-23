<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="row">
	<div class="col-9">
		<span class="h3">
				<?php the_title(); ?>
		</span>
		<hr>
		<?php the_content(); ?>
	</div>
	<div class="col-3">
		<?php get_template_part('right-sidebar'); ?>
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>