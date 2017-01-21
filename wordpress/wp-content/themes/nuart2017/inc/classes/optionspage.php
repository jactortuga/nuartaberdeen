<?

// class options_page {
// 	function __construct() {
// 		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
// 	}

// 	function admin_menu () {
// 		add_options_page( 'Apricus Info', 'Apricus Info', 'manage_options', 'wat_info', array( $this, 'settings_page' ) );
// 		add_action( 'admin_init', array( $this, 'register_settings' ) );
// 	}
	
// 	function register_settings() {
// 		//register our settings
// 		register_setting( 'watintelligence-settings-group', 'wat_telephone' );
// 		register_setting( 'watintelligence-settings-group', 'wat_fax' );
// 		register_setting( 'watintelligence-settings-group', 'wat_email' );
// 		register_setting( 'watintelligence-settings-group', 'wat_address' );
// 		register_setting( 'watintelligence-settings-group', 'wat_website' );
// 		register_setting( 'watintelligence-settings-group', 'wat_facebook' );
// 		register_setting( 'watintelligence-settings-group', 'wat_instagram' );
// 	}

// 	function  settings_page () {
// 		echo '<div class="wrap">
// 			<h2>Apricus options</h2>

// 			<form method="post" action="options.php">';
// 			    settings_fields( "watintelligence-settings-group" );
// 			    do_settings_sections( "watintelligence-settings-group" );
// 		echo '	    <table class="form-table">
// 			        <tr valign="top">
// 			        <th scope="row">Telephone</th>
// 			        <td><input type="text" class="regular-text" name="wat_telephone" value="'.esc_attr( get_option("wat_telephone") ).'" /></td>
// 			        </tr>

// 			        <tr valign="top">
// 			        <th scope="row">Fax</th>
// 			        <td><input type="text" class="regular-text" name="wat_fax" value="'.esc_attr( get_option("wat_fax") ).'" /></td>
// 			        </tr>
			         
// 			        <tr valign="top">
// 			        <th scope="row">Address</th>
// 			        <td><input type="text" class="regular-text" name="wat_address" value="'.esc_attr( get_option("wat_address") ).'" /></td>
// 			        </tr>

// 			        <tr valign="top">
// 			        <th scope="row">Email</th>
// 			        <td><input type="text" class="regular-text" name="wat_email" value="'.esc_attr( get_option("wat_email") ).'" /></td>
// 			        </tr>

// 			        <tr valign="top">
// 			        <th scope="row">Website</th>
// 			        <td><input type="text" class="regular-text" name="wat_website" value="'.esc_attr( get_option("wat_twitter") ).'" /></td>
// 			        </tr>

// 			        <tr valign="top">
// 			        <th scope="row">Facebook</th>
// 			        <td><input type="text" class="regular-text" name="wat_facebook" value="'.esc_attr( get_option("wat_facebook") ).'" /></td>
// 			        </tr>

// 			        <tr valign="top">
// 			        <th scope="row">Instagram</th>
// 			        <td><input type="text" class="regular-text" name="wat_instagram" value="'.esc_attr( get_option("wat_instagram") ).'" /></td>
// 			        </tr>
			        
// 			    </table>';	
// 		submit_button();
// 		echo '</form>
// 			</div>';
// 	}
// }
// new options_page;