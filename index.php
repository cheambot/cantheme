<?php get_header(); ?>
<div class="row mt-3">
	<div class="col-12">
		<?php dynamic_sidebar( 'alert-widget-area' ); ?>
	</div>
</div>


<div class="row">
	<!-- Column 1 -->
	<div class="col-lg-7 col-sm-6" id="home-col-1">
		<?php dynamic_sidebar('col-1-widget-area'); ?>
		<?php get_template_part('left-sidebar'); ?>
	</div>
	
	<!-- Column 2 -->
	<div class="col-lg-3 col-sm-6" id="home-col-2">
		<?php dynamic_sidebar('expand-collapse-widget-area'); ?>
		<?php dynamic_sidebar('col-2-widget-area'); ?>
	</div>

	<!-- Column 3 -->
	<div class="col-lg-2 col-sm-6" id="home-col-3">
		<?php dynamic_sidebar( 'col-3-widget-area' ); ?>
	</div>
</div>

<?php get_footer(); ?>