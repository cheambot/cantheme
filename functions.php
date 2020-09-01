<?php
// Hide admin bar on frontend for everyone
show_admin_bar( false );

add_action( 'after_setup_theme', 'cheamtheme_setup' );
function cheamtheme_setup() {
	load_theme_textdomain( 'cheamtheme', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	register_nav_menus( array( 'main-menu' => __( 'Main Menu', 'cheamtheme' ) ) );
}

// allow file types upload
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['pages'] = 'application/x-iwork-pages-sffpages'; //Adding pages
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// enqueue my keyword monitoring javascript
function cheamtheme_enqueue_scripts() {
	wp_enqueue_script('keyword-monitor', get_template_directory_uri() . '/js/keywords.js', array(), '1.7' );
}
add_action( 'wp_enqueue_scripts', 'cheamtheme_enqueue_scripts' );

// overrides the default cookie timeout for all post passwords to 10 secs
function tensec_post_password_expires() {
    return time() + 5; // Expire in 10 seconds
}
add_filter( 'post_password_expires', 'tensec_post_password_expires' );

//======================================================================
// Change messages on login screen
//======================================================================
add_filter( 'login_errors', function( $error ) {
	global $errors;
	$err_codes = $errors->get_error_codes();

	// Invalid username.
	// Default: '<strong>ERROR</strong>: Invalid username. <a href="%s">Lost your password</a>?'
	if ( in_array( 'invalid_username', $err_codes ) ) {
		$error = '<strong>ERROR</strong>: Invalid username.';
	}

	// Incorrect password.
	// Default: '<strong>ERROR</strong>: The password you entered for the username <strong>%1$s</strong> is incorrect. <a href="%2$s">Lost your password</a>?'
	if ( in_array( 'incorrect_password', $err_codes ) ) {
		$error = '<strong>ERROR</strong>: The password you entered is incorrect.';
	}

	return $error;
} );

//======================================================================
// Redirect users trying to access the lostpassword page
//======================================================================
function disable_lost_password() {
    if (isset( $_GET['action'] )){
        if ( in_array( $_GET['action'], array('lostpassword', 'retrievepassword') ) ) {
            wp_redirect( wp_login_url(), 301 );
            exit;
        }
    }
}
add_action( "login_init", "disable_lost_password" );

//======================================================================
// Remove meta boxes from the post edit screen
//======================================================================
function my_remove_meta_boxes() {
	if ( ! current_user_can( 'manage_options' ) ) {
	//	remove_meta_box( 'linktargetdiv', 'link', 'normal' );
	//	remove_meta_box( 'linkxfndiv', 'link', 'normal' );
	//	remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
	//	remove_meta_box( 'postexcerpt', 'post', 'normal' );
	//	remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
	//	remove_meta_box( 'postcustom', 'post', 'normal' );
	//	remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	//	remove_meta_box( 'commentsdiv', 'post', 'normal' );
	//	remove_meta_box( 'revisionsdiv', 'post', 'normal' );
	//	remove_meta_box( 'authordiv', 'post', 'normal' );
	//	remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
	}
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
//======================================================================
// Limit authors to their own content in WordPress Admin
//======================================================================
function posts_for_current_author($query) {
    global $pagenow;
 
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
 
    if( !current_user_can( 'edit_others_posts' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

//======================================================================
// If the given post is a single post, then add a class to this post.
//======================================================================
// @param    array       $classes    The array of classes being rendered on a single post element.
// @return   array       $classes    The array of classes being rendered on a single post element.
// @package  example
// @since    1.0.0
//======================================================================
function add_class_to_single_post( $classes ) {
	if ( is_single() ) {
		array_push( $classes, 'single-post' );
	} // end if
	return $classes;
}
add_filter( 'post_class', 'add_class_to_single_post' );

//======================================================================
// Dequeue Flexy Breadcrumb CSS
//======================================================================
function wpa_dequeue_style() {
    wp_dequeue_style( 'flexy-breadcrumb' );
}
add_action( 'wp_enqueue_scripts', 'wpa_dequeue_style', 100 );

//======================================================================
// Add notice to the profile edit page
//======================================================================
add_action( 'admin_notices', 'ecs_add_post_notice' );
function ecs_add_post_notice() {
	global $post;
	if( isset( $post->post_name ) && ( $post->post_name == 'chs-cctv' ) ) {
	  /* Add a notice to the edit page */
		add_action( 'edit_form_after_title', 'ecs_add_page_notice', 1 );
		/* Remove the WYSIWYG editor */
		remove_post_type_support( 'page', 'editor' );
	}	
}

//======================================================================
// Add warning to the CCTV page if you try and edit it
//======================================================================
function ecs_add_page_notice() {
	echo '<div style="background-color:#f8d7da;color:#721c24;padding:.5rem 1rem;font-weight:600;border:1px solid #721c24;width:80%;margin-top:10px;margin-left:auto;margin-right:auto;text-align:center;"><p>' . __( 'You are currently editing the CCTV page. Do not edit the title or URL of this page! Do not change the category from "CCTV". The title should be "CCTV" and the URL  "http://intranet/chs-cctv".', 'textdomain' ) . '</p></div>';
}

//======================================================================
// Register Custom Navigation Walker
//======================================================================
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

// Register a seperate menu to test the bootstrap walker
register_nav_menus( array(
	'bs-test-menu' => __( 'Booty Menu', 'cheamtheme' ),
) );

//======================================================================
// Applies the styles within admin-styles.css to the admin dashboard
//======================================================================
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin/admin-styles.css?ver=1.0.0.0');
}
add_action('admin_enqueue_scripts', 'admin_style');

//======================================================================
// Applies the styles within /login/login-styles.css to the admin dashboard
//======================================================================
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login-styles.css?v=1.2.0.0" />';
echo '<link rel="stylesheet" href="http://staffintranet/wp-content/themes/cheamtheme/css/bootstrap.min.css" type="text/css">';
}
add_action('login_head', 'my_custom_login');

//======================================================================
// Login Form Filters
//======================================================================
//===== Check the 'Remember Me' box by default
function login_checked_remember_me() {
add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );

function rememberme_checked() {
echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
//===== These filters modify the text displayed on the login page
add_filter(  'gettext',  'register_text'  );
add_filter(  'ngettext',  'register_text'  );
function register_text( $translated ) {
     $translated = str_ireplace(  'Username or Email Address',  '<div style="text-align:center;"><h3 id="login-title-1">' . get_bloginfo( 'name' ) . '</h3><span class="small">GDPR compliance requires all staff to be logged in. Your username & password are the same ones used to log on to PCs around the school.</span></div><label for"user_login">Username</label>',  $translated );
	return $translated;
}

//===== Remove breadcrumbs on home page
add_action('bcn_after_fill', 'home_bc_pop');
function home_bc_pop($trail)
{
if(is_home())
	{
		array_pop($trail->breadcrumbs);
	}
}

//======================================================================
// Removed the 'lost password' link from the login box as all passwords
// are synced from the AD and we don't want people trying to reset them via
// WordPress as it's pointless and confusing
//======================================================================
function remove_lostpassword_text ( $text ) {
	if ($text == 'Lost your password?') {
		$text = '';
	}
	return $text;
}
add_filter( 'gettext', 'remove_lostpassword_text' );

//======================================================================
// Add arrows to the main menu parents with dropdowns 
// //======================================================================
function oenology_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'has-children';
		}
	}
 	return $items;
}
add_filter( 'wp_nav_menu_objects', 'oenology_add_menu_parent_class' );

//======================================================================
// Return the icon for the category
// Where a suitable fontawesome icon was not available I used a custom image
// ======================================================================
function cat_icon() {
	// All the icons:
	// News Icon
	$icon_1 = '<i class="fas fa-newspaper"></i>&nbsp;';
	// IT News Icon
	$icon_3 = '<i class="fas fa-microchip"></i>&nbsp;';
	// Weekly Bulletin Icon
	$icon_23 = '<i class="fas fa-inbox"></i>&nbsp;';
	// Training Icon
	$icon_32 = '<i class="fas fa-graduation-cap"></i>&nbsp;';
	// Cheam High Flyer Icon
	$icon_33 = '<i class="fas fa-inbox"></i>&nbsp;';
	// Pupil Bulletin Icon
	$icon_35 = '<i class="far fa-newspaper"></i>&nbsp;';
	// Reminders Icon
	$icon_36 = '<i class="fas fa-bell"></i>&nbsp;';
	// Reprographics Icon
	$icon_61 = '<img src="http://intranet/wp-content/themes/cheamtheme/images/photocopier.png">&nbsp;';
	// Useful Documents
	$icon_66 = '<i class="fas fa-file-alt"></i>&nbsp;';
	// Search Icon
	$icon_127 = '<i class="far fa-newspaper"></i>&nbsp;';
	// Premises Icon
	$icon_128 = '<i class="fas fa-building"></i>&nbsp;';
	// Directory Icon
	$icon_129 = '<i class="fas fa-address-book"></i>&nbsp;';
	// Helpdesk Icon
	$icon_130 = '<i class="fas fa-medkit"></i>&nbsp;';
	// Helpdesk Ticket Icon
	$icon_131 = '<i class="fas fa-ticket-alt"></i>&nbsp;';
	// TV Icon
	$icon_132 = '<img src="http://intranet/wp-content/themes/cheamtheme/images/tv.png">&nbsp;';
	// CCTV Icon
	$icon_133 =	'<i class="fas fa-eye"></i>&nbsp;';
	// Booking Icon
	$icon_134 = '<i class="fas fa-calendar-check"></i>&nbsp;';

	$category = get_the_category();
	$category_id = $category[0]->cat_ID; 
	// Concat $icon_ with the categoryID to create the icon variable name
	return ${icon_ . $category_id};
}

//======================================================================
// Return the nice display name of the category
//======================================================================
function cat_name() {
	$category = get_the_category();
	$category_id = $category[0]->cat_ID;
	$cat_name = get_cat_name( $category_id );
	return $cat_name;
}

//======================================================================
// Return the category browse URL
//======================================================================
function cat_link() {
	$category = get_the_category();
	$category_id = $category[0]->cat_ID;
    $cat_link = get_category_link( $category_id );
	return $cat_link;
}

//======================================================================
// Allows selecting a category for pages, no longer just for posts
//======================================================================
function myplugin_settings() {  
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of the theme functions.php file 
add_action( 'init', 'myplugin_settings' );


function change_category_order( $query ) {
    if ( $query->is_category('142') && $query->is_main_query() ) {
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'change_category_order' );


//======================================================================
// Limit media library access to users without the permissions specified below
//======================================================================
add_filter( 'ajax_query_attachments_args', 'wpb_show_current_user_attachments' );
function wpb_show_current_user_attachments( $query ) {
    $user_id = get_current_user_id();
    if ( $user_id && !current_user_can('assign_ticket') ) {
        $query['author'] = $user_id;
    }
    return $query;
}

//======================================================================
// Replaces the standard excerpt with one that includes the original spacing
// Without this, the excerpt is returned as a single lump of text and looks hideous
// You can also alter the number of words in the excerpt by modifying the line:
// $excerpt_word_count = 75;
// Change to the number of words you want - simples!
//======================================================================
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'html_custom_wp_trim_excerpt'); 

function html_custom_wp_trim_excerpt($html_excerpt) {
	global $post;
	$raw_excerpt = $html_excerpt;
	if ( '' == $html_excerpt ) {
		$html_excerpt = get_the_content('');
		$html_excerpt = strip_shortcodes( $html_excerpt );
		$html_excerpt = apply_filters('the_content', $html_excerpt);
		$html_excerpt = str_replace(']]>', ']]&gt;', $html_excerpt);
		//Set the excerpt word count and only break after sentence is complete.
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
		$tokens = array();
		$excerptOutput = '';
		$count = 0;
		// Divide the string into tokens; HTML tags, or words, followed by any whitespace
		preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $html_excerpt, $tokens);
		foreach ($tokens[0] as $token) { 
			if ($count >= $excerpt_word_count && preg_match('/[\?\.\!]\s*$/uS', $token)) { 
				// Limit reached, continue until ? . or ! occur at the end
				$excerptOutput .= trim($token);
				break;
			}
			// Add words to complete sentence
			$count++;
			// Append what's left of the token
			$excerptOutput .= $token;
		}
		$html_excerpt = trim(force_balance_tags($excerptOutput));
		$excerpt_end = '.. <br><a href="'. esc_url( get_permalink() ) . '"><strong><em>Click to view the full post</em></strong></a>'; 
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 
		$pos = strrpos($html_excerpt, '</');
		if ($pos !== false) {
			// Inside last HTML tag
			$html_excerpt = substr_replace($html_excerpt, $excerpt_end, $pos, 0);
		}
		else {
			// After the content
			$html_excerpt .= $excerpt_end;
			return $html_excerpt;   
		}
	}
	return apply_filters('html_custom_wp_trim_excerpt', $html_excerpt, $raw_excerpt);
}

function modify_read_more_link() {
 return '...<br><a class="more-link" href="' . get_permalink() . '"><strong><em>Click to view the full post</em></strong></a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

//======================================================================
// Excludes pages from WordPress Search so only posts are returned
//======================================================================
if (!is_admin()) {
	function wpb_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','wpb_search_filter');
}

//======================================================================
// Check if is custom post type
//======================================================================
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

//======================================================================
// Gravity Forms Filters
//======================================================================
// This filter removes the comma from the specified form/field number
//======================================================================
add_filter( 'gform_include_thousands_sep_pre_format_number', function ( $include_seperator, $field ) {
    return $field->formId == 1 && $field->id == 35 ? false : $include_seperator;
}, 10, 2 );

add_filter( 'gform_include_thousands_sep_pre_format_number', function ( $include_seperator, $field ) {
    return $field->formId == 13 && $field->id == 38 ? false : $include_seperator;
}, 10, 2 );

add_filter( 'gform_include_thousands_sep_pre_format_number', function ( $include_seperator, $field ) {
    return $field->formId == 11 && $field->id == 12 ? false : $include_seperator;
}, 10, 2 );

add_filter( 'gform_include_thousands_sep_pre_format_number', function ( $include_seperator, $field ) {
    return $field->formId == 9 && $field->id == 13 ? false : $include_seperator;
}, 10, 2 );

//======================================================================
// Disable WordPress Admin Bar for all users but admins
//======================================================================
// show_admin_bar(false);

//======================================================================
// Modifies the search form to the code below
//======================================================================
function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" ><div><input type="text" value="' . get_search_query() . '" name="s" id="s" /><input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" /></div></form>';
	return $form;
}
add_filter( 'get_search_form', 'my_search_form', 100 );



//======================================================================
// Not really sure :/ 
//======================================================================
add_action( 'plugins_loaded', 'get_user_info' );

function get_user_info(){
  $current_user = wp_get_current_user(); 

  if ( !($current_user instanceof WP_User) ) 
    return; 

  echo $current_user->user_login;
  // Do the remaining stuff that has to happen once you've gotten your user info
}

//======================================================================
add_action( 'wp_enqueue_scripts', 'cheamtheme_load_scripts' );
function cheamtheme_load_scripts()
{
wp_enqueue_script( 'jquery' );
}

//======================================================================#
// Need to work out what this is
//======================================================================
add_filter( 'the_title', 'cheamtheme_title' );
function cheamtheme_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}

//======================================================================
// Need to work out what this is
//======================================================================
add_filter( 'wp_title', 'cheamtheme_filter_wp_title' );
function cheamtheme_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}

//======================================================================
// Fires after all default WordPress widgets have been registered
// Registers custom widgets
//======================================================================
add_action( 'widgets_init', 'cheamtheme_widgets_init' );
function cheamtheme_widgets_init() {
remove_filter('widget_text_content', 'wpautop');

//======================================================================
// Header Widgets
//======================================================================
// When you're adding widgets, the code here will define what gets displayed, not when it gets displayed.
// To actually add a widget area to, for example, the front page, you'll need to edit
// the index.php file. The 'id' of the widget is what you use to reference it elsewhere.
//======================================================================
register_sidebar( array (
	'name' => __( 'Alert Widget', 'cheamtheme' ),
	'id' => 'alert-widget-area',
	'before_widget' => '<div class="alert alert-danger" role="alert">',
	'after_widget' => '</div>',
	'before_title' => '<span class="h6">',
	'after_title' => '</span>',
) );

//======================================================================
// Expanding/Collapse Widgets
//======================================================================
register_sidebar( array (
	'name' => __( 'Expanding Widget', 'cheamtheme' ),
	'id' => 'expand-collapse-widget-area',
	'before_widget' => '<div class="mb-3">',
	'after_widget' => '</div>',
	'before_title' => '<p><a class="btn btn-primary" data-toggle="collapse" href="#collapseWeeklyNotices" role="button" aria-expanded="false" aria-controls="collapseWeeklyNotices">',
	'after_title' => '</a></p>',
) );

//======================================================================
// id="home-col-1" Widgets
//======================================================================
register_sidebar( array (
	'name' => __( 'Column 1', 'cheamtheme' ),
	'id' => 'col-1-widget-area',
	'before_widget' => '<div class="mb-3">',
	'after_widget' => '</div>',
	'before_title' => '<span class="h5">',
	'after_title' => '</span><hr class="small">',
) );
//======================================================================
// id="home-col-2" Widgets
//======================================================================
register_sidebar( array (
	'name' => __( 'Column 2', 'cheamtheme' ),
	'id' => 'col-2-widget-area',
	'before_widget' => '<div class="mb-3">',
	'after_widget' => '</div>',
	'before_title' => '<span class="h5">',
	'after_title' => '</span><hr class="small">',
) );
//======================================================================
// id="home-col-3" Widgets
//======================================================================
register_sidebar( array (
	'name' => __( 'Column 3', 'cheamtheme' ),
	'id' => 'col-3-widget-area',
	'before_widget' => '<div class="mb-3">',
	'after_widget' => '</div>',
	'before_title' => '<span class="h5">',
	'after_title' => '</span><hr class="small">',
) );	
}
