<?php get_header(); ?>



<div class="col-9">
	<span class="h4">
		<?php single_cat_title('Browsing: '); ?>
	</span>
	<hr>
	<?php get_template_part( 'nav', 'below' ); ?>
	<div class="">
	<?php if ( is_category('isolating-students') ) { ?>
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry', 'title' ); ?>
		<?php endwhile; endif; ?>
	<?php } else { ?>	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
		<?php endwhile; endif; ?>
		
	<?php } ?>
	
	
	</div>
	<?php get_template_part( 'nav', 'below' ); ?>
</div> <!-- /col-12 -->

<div class="col-3">
	<?php get_template_part('left-sidebar'); ?>
</div>

<?php get_footer(); ?>
