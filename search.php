<?php get_header(); ?>

<div class="col-3">
	<?php get_template_part('left-sidebar'); ?>
</div> <!-- /col-3 -->

<div class="col-7">
	<div class="row mb-4">
		<div class="col-12">
			<?php if ( have_posts() ) : ?>
			<span class="h3">
				<i class="fas fa-search"></i>&nbsp;Search Results: "<?php printf( __( '%s', 'blankslate' ), get_search_query() ); ?>"
			</span>
			<hr class="small">
			<?php get_template_part( 'nav', 'below' ); ?>
			<div class="clearfix"></div> <!-- /clearfix -->
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>
			<?php endwhile; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
			<?php else : ?>
			<span class="h3">
				<i class="fas fa-search"></i>&nbsp;No Search Results: "<?php printf( __( '%s', 'blankslate' ), get_search_query() ); ?>"
			</span>
			<hr class="small">
			<div class="text-center">
				<img src="http://intranet/wp-content/images/no-results-homer.jpg">
			</div>
			<?php // get_search_form(); ?>
			<?php endif; ?>
<?php get_footer(); ?>
