<?php get_header(); ?>

<div class="col-3">
	<?php get_template_part('left-sidebar'); ?>
</div> <!-- /col-3 -->
<div class="col-7">
	<div class="row mb-4">
		<div class="col-12">
			<span class="h3">
<?php if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'blankslate' ); }
?>
			</span>
			<hr class="small">
			<?php get_template_part( 'nav', 'below' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry', 'archive' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
		</div> <!-- /col-12 -->
	</div> <!-- /row mb-4 -->
</div> <!-- /col-7 -->

<?php get_footer(); ?>
