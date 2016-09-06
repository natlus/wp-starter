<?php

# Create menu item
add_action( 'admin_menu', 'do_options_menu' );
function do_options_menu() {
	add_options_page( 'Theme Options', 'Theme Options', 'manage_options', 'dd-theme-options', 'do_theme_options' );
}

# Create options page
function do_theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
  <div class="wrap">
    <h1>Custom Theme Settings</h1>
    <form method="post" action="options.php">
    <table class="form-table">
      <tbody>
        <tr>
          <?php settings_fields( 'theme_options_form' ); ?>
          <?php do_settings_sections( 'theme_options_form' ); ?>
          <th scope="row">
            <label style="font-weight: 600;" for="custom_site_logo">Site Logo</label>
          </th>
          <td>
            <input class="regular-text" type="url" name="custom_site_logo" placeholder="Logo URL" value="<?php echo esc_attr( get_option('custom_site_logo') ); ?>" />
          </td>
        </tr>
        <tr>
          <?php settings_fields( 'theme_options_form' ); ?>
          <?php do_settings_sections( 'theme_options_form' ); ?>
          <th scope="row">
            <label style="font-weight: 600;" for="custom_footer_text">Footer Text</label>
          </th>
          <td>
            <input class="regular-text" type="text" name="custom_footer_text" placeholder="Copyright © 2016..." value="<?php echo esc_attr( get_option('custom_footer_text') ); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
    <?php submit_button(); ?>
    </form>
  </div>

<?php }

if ( is_admin() ) {
  add_action( 'admin_menu', 'do_options_menu' );
  add_action( 'admin_init', 'register_theme_options' );
}

// Options
function register_theme_options() {
  register_setting( 'theme_options_form', 'custom_site_logo' );
  register_setting( 'theme_options_form', 'custom_footer_text' );
}
