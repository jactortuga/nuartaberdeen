<?php

function tl_remove_media_controls() {
     remove_action( 'media_buttons', 'media_buttons' );
}
 add_action('admin_head','tl_remove_media_controls');

/*-----------------------------------------------------------------------------------*/
/* Remove Dashboard widgets */
/*-----------------------------------------------------------------------------------*/
function tl_remove_dashboard_widget() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
} 
 
// Hook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'tl_remove_dashboard_widget' );

/*-----------------------------------------------------------------------------------*/
/* Replace Logo on login page */
/*-----------------------------------------------------------------------------------*/
function tl_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-black.svg);
            padding-bottom: 0;
            width: 150px;
            height: 53px;
            margin-bottom: 5px;
            background-size: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'tl_login_logo' );

add_filter( 'login_headerurl', 'tl_loginlogo_url' );
function tl_loginlogo_url($url) {
  return get_site_url();
}

/* Allow svg uploads in media library */
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function tl_remove_my_post_metaboxes() {
  //remove_meta_box( 'categorydiv','post','normal' ); // Categories Metabox
  remove_meta_box( 'tagsdiv-post_tag','post','normal' ); // Tags Metabox
   remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
add_action('admin_menu','tl_remove_my_post_metaboxes');

add_filter('show_admin_bar', '__return_false');


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function tl_remove_admin_menu_items() {
	$remove_menu_items = array(__('Comments'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'tl_remove_admin_menu_items');

add_action( 'admin_bar_menu', 'tl_remove_wp_nodes', 999 );
//remove from the NEW bar
function tl_remove_wp_nodes() 
{
    global $wp_admin_bar;   
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('comments'); 
    //$wp_admin_bar->remove_menu('post'); 
}

// Custom WordPress Footer
function tl_remove_footer_admin () {
    echo "<?php
  //  Using jQuery: How to allow Editors to edit only Menus (or more!)  [by Chris Lemke aka PrettySickPuppy|gmail]

  if ( is_user_logged_in() ) { // This IF may be redundant, but safe is better than sorry...
    if ( current_user_can('edit_theme_options') && !current_user_can('manage_options') ) { // Check if non-Admin
?>
      <script>
    jQuery.noConflict();
    jQuery(document).ready(function() {
      //  Comment out the line you WANT to enable, so it displays (is NOT removed).
      //  For example, the jQuery line for MENUS is commented out below so it's not removed.

      // THEMES:  If you want to allow THEMES, also comment out APPEARANCE if you want it to display Themes when clicked. (Default behaviour)
      jQuery('li#menu-appearance.wp-has-submenu li a[href=\"themes.php\"]').remove();
      jQuery('li#menu-appearance.wp-has-submenu a.wp-has-submenu').removeAttr(\"href\");

      // WIDGETS:
      jQuery('li#menu-appearance.wp-has-submenu li a[href=\"widgets.php\"]').remove();

      // MENUS:
      // jQuery('li#menu-appearance.wp-has-submenu li a[href=\"nav-menus.php\"]').remove();

      // BACKGROUND:
      jQuery('li#menu-appearance.wp-has-submenu li a[href=\"themes.php?page=custom-background\"]').remove();
    });
      </script>
<?php
    } // End IF current_user_can...
  } // End IF is_user_logged_in...
?>";
}
add_filter('admin_footer_text', 'tl_remove_footer_admin');


//remve meta boxes 
function tl_remove_meta_boxes() 
{
    remove_meta_box('commentsdiv', 'product', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('slugdiv', 'post', 'normal');
}
add_action( 'add_meta_boxes', 'tl_remove_meta_boxes', 999 );

/* Remove unwanted columns from post */
function tl_manage_columns( $columns ) {
  unset($columns['comments']);
  return $columns;
}

function tl_column_init() {
  add_filter( 'manage_posts_columns' , 'tl_manage_columns' );
  add_filter( 'manage_pages_columns' , 'tl_manage_columns' );
}
add_action( 'admin_init' , 'tl_column_init' );
