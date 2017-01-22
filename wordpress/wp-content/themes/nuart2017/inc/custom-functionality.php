<?

/**Get current url*/
function current_url() {
    // Protocol
    $url = ( isset($_SERVER['HTTPS']) && 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'];
    // Port
    $url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];

    return trailingslashit( $url );
}


if(!is_admin() && !function_exists('get_home_path'))
{
	function get_home_path() {
		$home = get_option( 'home' );
		$siteurl = get_option( 'siteurl' );
		if ( ! empty( $home ) && 0 !== strcasecmp( $home, $siteurl ) ) {
			$wp_path_rel_to_home = str_ireplace( $home, '', $siteurl ); /* $siteurl - $home */
			$pos = strripos( str_replace( '\\', '/', $_SERVER['SCRIPT_FILENAME'] ), trailingslashit( $wp_path_rel_to_home ) );
			$home_path = substr( $_SERVER['SCRIPT_FILENAME'], 0, $pos );
			$home_path = trailingslashit( $home_path );
		} else {
			$home_path = ABSPATH;
		}

		return rtrim(str_replace( '\\', '/', $home_path ),'/');
	}
	
}

function curl_get_contents($url){
    $curl  =curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}


// SET CUSTOM FIELDS PAGE FOR GLOBAL CUSTOM FIELDS 
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