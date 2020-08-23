<div class="clearfix mb-2">
    <?php
        $user = wp_get_current_user();
        $user_id = $user->ID;
        // Get the url of the avatar 50px in size
        $avatar = get_avatar( $user_id, 50 );
        // Get user first and last name
        // URL of the page to change their avatar
        $edit_pic_url = site_url( '/change-your-staff-photo/' );
        // URL of the admin dashboard
        $dash_url = get_dashboard_url();
        // URL to log user out
        $logout_url = wp_logout_url( home_url() );
		// Obtain the personalTitle mapped attribute from the LDAP plugin
        // get_user_meta returns an array of data so we need to select the single item
        // from the array we need which is specified using the value of $key
        // $single = true: If true return value of meta data field
        // See https://developer.wordpress.org/reference/functions/get_user_meta/
        $key = 'ad_displayname';
        $single = true;
        $displayName = get_user_meta( $user_id, $key, $single ); ?>
        
        <div class="userbox">
			<div class="profile-pic float-left">
				<?php echo $avatar; ?>
			</div>
		</div>
		<div class="float-left pl-2" id="user-nfo">
			<span class="h5"><?php echo $displayName; ?></span>
			<br>
			<span class="small">
				<a href="<?php echo $logout_url ?>">Logout</a>
			</span>
		</div>
</div>