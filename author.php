<?php get_header(); ?>
<?php
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div class="col-9">
	<div class="row mb-4"> 
		<div class="staff-profile clearfix mb-3">
			<div class="float-left pr-4">
				<?php echo get_avatar( $curauth->user_email , '250'); ?>
			</div>
			<div class="float-left">
				<h2><?php echo $curauth->ad_title; ?> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>  (<?php echo $curauth->ad_staffcode; ?>)</h2>	
				<p>
					<strong>Phone: </strong><?php echo $curauth->ad_phone; ?><br>
					<strong>Email: </strong><a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a><br><br>
					<strong>Department: </strong><?php echo $curauth->ad_department; ?><br>
					<strong>Position: </strong><?php echo $curauth->ad_job_title; ?><br>
					<strong>Location: </strong><?php echo $curauth->ad_location; ?><br>
					<strong>House: </strong><?php echo $curauth->ad_house; ?>
				</p>
			</div>
		</div>
			<?php 
			$user = wp_get_current_user();
			$user_id = $user->ID;
			$currauth_id = $curauth->ID;
			if ($currauth_id == $user_id) {
				get_template_part('inc/upload-avatar');
				// get_template_part('partials/latest', 'news');
			};
			?>
	</div> <!-- /row mb-4 -->
</div> <!-- /col-9 -->

<div class="col-3">
</div>
<?php get_footer(); ?>
