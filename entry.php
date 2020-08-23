<div class="my-3">
	<div class="title-text-container mb-2">
		<span class="h5">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</span>
		<span class="small"><?php edit_post_link(' edit this post'); ?></span>
		<br>
		<span class="small">
			<time class="" datetime="<?php the_time('Y-m-d H:i'); ?>"><em><?php the_time('F jS, Y g:i a'); ?></em></time> <!-- in <?php the_category(', '); ?> -->
		</span>
	</div>
	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</div>