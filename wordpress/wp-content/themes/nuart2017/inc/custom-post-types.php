<?

function add_theme_caps(){
  $admins = get_role('administrator');
  $admins->add_cap('edit_project'); 
  $admins->add_cap('edit_projects'); 
  $admins->add_cap('edit_other_projects'); 
  $admins->add_cap('publish_projects'); 
  $admins->add_cap('read_project'); 
  $admins->add_cap('read_private_projects'); 
  $admins->add_cap('create_projects');
  $admins->add_cap('delete_project'); 
  $admins->add_cap('delete_projects'); 
}

add_action('admin_init', 'add_theme_caps');


function as_init() {
  register_post_type( 'projects', array(
    'labels'                => array(
      'name'                => __('Projects'),
      'singular_name'       => __('Project'),
      'add_new'             => __('Add new Project'),
      'add_new_item'        => __('Add a new Project'),
      'view_item'           => __('View Project'),
      'edit_item'           => __('Edit Project'),
      'search_items'        => __('Search Projects'),
      'not_found'           => __('No Projects found'),
      'not_found_in_trash'  => __('No Projects found in trash'),
      ),
    'public'                => false,
    'has_archive'           => false,
    'hierarchical'          => false,
    'menu_position'         => 5,
    'supports'              => array('title', 'thumbnail'),
    'show_ui'               => true,
    'query_var'             => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-admin-appearance',
    'capability_type'       => 'project',
    'taxonomies'            => array('post_tag', 'category'),
    'capabilities'          => array(
      'edit_post'           => 'edit_project', 
      'read_post'           => 'read_project', 
      'edit_posts'          => 'edit_projects', 
      'edit_others_posts'   => 'edit_others_projects', 
      'publish_posts'       => 'publish_projects',       
      'read_private_posts'  => 'read_private_projects', 
      'create_posts'        => 'create_projects', 
      'delete_posts'        => 'delete_projects', 
      ),
    'show_in_rest'          => true,
    'rest_base'             => 'projects',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
        )
    );
}

add_action('init', 'as_init');