<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="row">
	<div class="col-9">
				<div <?php post_class(); ?>>
					<span class="h3 display-5"><?php the_title(); ?></span><span class="small"><?php edit_post_link(' edit this post'); ?></span>
					<br>
					<time class="small" datetime="<?php the_time('Y-m-d H:i'); ?>"><em><?php the_time('F jS, Y g:i a'); ?></em></time>
					<hr>
					<div class="">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
	<div class="col-3">

	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>