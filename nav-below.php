<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
<nav id="nav-below" class="navigation" role="navigation">
	<div class="nav-previous float-left">
		<?php echo get_next_posts_link('<i class="fas fa-angle-left"></i>&nbsp;Older Posts'); ?>
	</div>
	<div class="nav-next float-right">
		<?php echo get_previous_posts_link('Newer Posts&nbsp;<i class="fas fa-angle-right"></i>'); ?>
	</div>
</nav>
<?php } ?>