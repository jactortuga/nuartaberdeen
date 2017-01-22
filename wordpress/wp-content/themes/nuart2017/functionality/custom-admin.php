<?php


// CUSTOMIZE WORDPRESS ADMIN LOGIN LOGO
function custom_login_logo() { ?>
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
add_action('login_enqueue_scripts', 'custom_login_logo');


// ADD LINK TO WORDPRESS ADMIN LOGIN LOGO
function add_logo_url($url) {
    return get_site_url();
}
add_filter('login_headerurl', 'add_logo_url');


// CUSTOMIZE ADMIN BAR
function customize_admin_bar() {
    global $wp_admin_bar;   
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('comments'); 
}
add_action('admin_bar_menu', 'customize_admin_bar', 999);
add_filter('show_admin_bar', '__return_false');


// CLEAN WORDPRESS DASHBOARD
function remove_dashboard_widgets() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
} 
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


// REMOVE COMMENTS FUNCTIONALITY
function remove_admin_menu_items() {
    $remove_menu_items = array(__('Comments'));
    global $menu;
    end ($menu);
    while (prev($menu)){
        $item = explode(' ',$menu[key($menu)][0]);
        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
        unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_admin_menu_items');



// REMOVE POSTS "ADD MEDIA BUTTON"
function remove_media_button() {
    remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','remove_media_button');


// ALLOW SVG UPLOADS IN MEDIA LIBRARY
function allow_svgs($mimes){
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgs');


// CUSTOMIZE POSTS METABOXES
function customize_posts_metaboxes() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    remove_meta_box('tagsdiv-post_tag','post','normal');
    //remove_meta_box( 'categorydiv','post','normal' );
}
add_action('admin_menu','customize_posts_metaboxes');
















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


// SET THEME SETTINGS PAGE FOR GLOBAL CUSTOM FIELDS 
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Theme Header Settings',
    'menu_title'  => 'Header',
    'parent_slug' => 'theme-general-settings',
  ));
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Theme Footer Settings',
    'menu_title'  => 'Footer',
    'parent_slug' => 'theme-general-settings',
  ));
  
}