<div class="mt-3 mb-4">
	<span class="h5">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</span>
	<span class="small"><?php edit_post_link(' edit this post'); ?></span>
	<hr class="small mb-0">
	<span class="small text-uppercase">
		POSTED: <?php the_time('F jS, Y'); ?>
	</span>
</div>