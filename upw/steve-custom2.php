<?php
/**
 * Standard ultimate posts widget template
 *
 * @version     2.1.1
 */
?>

<?php if ($instance['before_posts']) : ?>
  <div class="upw-before">
    <?php echo wpautop($instance['before_posts']); ?>
  </div>
<?php endif; ?>

<div class="news-headlines">
	<?php if ($upw_query->have_posts()) : ?>
		<?php while ($upw_query->have_posts()) : $upw_query->the_post(); ?>
			<?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>
			<article <?php post_class($current_post); ?>>
					<span class="h5 entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</span>
					<div class="entry-meta">
						<time class="published small" datetime="<?php echo get_the_time('c'); ?>"><em><?php echo get_the_time($instance['date_format']); ?></em></time>
					</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p class="upw-not-found">
			<?php echo wpautop($instance['custom_empty']); ?>
		</p>
	<?php endif; ?>
</div>

<?php if ($instance['after_posts']) : ?>
	<div class="upw-after">
		<?php echo wpautop($instance['after_posts']); ?>
	</div>
<?php endif; ?>
