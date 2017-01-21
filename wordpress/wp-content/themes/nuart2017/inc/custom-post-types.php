<?

function add_theme_caps(){
  $admins = get_role('administrator');
  $admins->add_cap('edit_artist'); 
  $admins->add_cap('edit_artists'); 
  $admins->add_cap('edit_other_artists'); 
  $admins->add_cap('publish_artists'); 
  $admins->add_cap('read_artist'); 
  $admins->add_cap('read_private_artists'); 
  $admins->add_cap('create_artists');
  $admins->add_cap('delete_artist'); 
  $admins->add_cap('delete_artists'); 
}

add_action('admin_init', 'add_theme_caps');


function as_init() {
  register_post_type('artists', array(
    'labels'                => array(
      'name'                => __('Artists'),
      'singular_name'       => __('Artist'),
      'add_new'             => __('Add new Artist'),
      'add_new_item'        => __('Add a new Artist'),
      'view_item'           => __('View Artist'),
      'edit_item'           => __('Edit Artist'),
      'search_items'        => __('Search Artists'),
      'not_found'           => __('No Artists found'),
      'not_found_in_trash'  => __('No Artists found in trash'),
      ),
    'public'                => false,
    'has_archive'           => false,
    'hierarchical'          => false,
    'menu_position'         => 5,
    'supports'              => array('title', 'thumbnail'),
    'show_ui'               => true,
    'query_var'             => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-admin-customizer',
    'capability_type'       => 'artist',
    'taxonomies'            => array('post_tag', 'category'),
    'capabilities'          => array(
      'edit_post'           => 'edit_artist', 
      'read_post'           => 'read_artist', 
      'edit_posts'          => 'edit_artists', 
      'edit_others_posts'   => 'edit_others_artists', 
      'publish_posts'       => 'publish_artists',       
      'read_private_posts'  => 'read_private_artists', 
      'create_posts'        => 'create_artists', 
      'delete_posts'        => 'delete_artists', 
      ),
    'show_in_rest'          => true,
    'rest_base'             => 'artists',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );
}

add_action('init', 'as_init');