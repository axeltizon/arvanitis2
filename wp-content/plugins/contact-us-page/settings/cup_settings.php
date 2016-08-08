<?php
add_action( 'admin_init', 'cup_register_contact_info' );

function cup_register_contact_info() {
		register_setting( 'cup-settings-group', 'cup_address' );
        register_setting( 'cup-settings-group', 'cup_phone' );
        register_setting( 'cup-settings-group', 'cup_fax' );
        register_setting( 'cup-settings-group', 'cup_email' );
		register_setting( 'cup-settings-group', 'cup_form_shortcode' );
		register_setting( 'cup-settings-group', 'cup_info' );
		register_setting( 'cup-settings-group', 'cup_facebook' );
		register_setting( 'cup-settings-group', 'cup_twitter' );
		register_setting( 'cup-settings-group', 'cup_google' );	
}

function cup_settings_pages() {
?>
<div class="wrap">
<h2>Contact Us Page</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'cup-settings-group' ); ?>
    <?php do_settings_sections( 'cup-settings-group' );?>
	<table class="form-table">
		
		<tr valign="top">
        <th scope="row">Shortcode:</th>
		<td><p>[contact_us_page]</p></td>
		</tr>
		
        <tr valign="top">
        <th scope="row">Address:</th>
        <td><input type="text" name="cup_address" size="40" value="<?php echo get_option('cup_address'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Phone Number:</th>
        <td><input type="text" name="cup_phone" size="40" value="<?php echo get_option('cup_phone'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Fax number:</th>
        <td><input type="text" name="cup_fax" size="40" value="<?php echo get_option('cup_fax'); ?>" /></td>
        </tr>
      
        <tr valign="top">
        <th scope="row">E-mail:</th>
        <td><input type="text" name="cup_email" size="40" value="<?php echo get_option('cup_email'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Facebook URL:</th>
        <td><input type="url" name="cup_facebook" size="40" value="<?php echo get_option('cup_facebook'); ?>" /></td>
        </tr>
		
        <tr valign="top">
        <th scope="row">Twitter URL:</th>
        <td><input type="url" name="cup_twitter" size="40" value="<?php echo get_option('cup_twitter'); ?>" /></td>
        </tr>
		
        <tr valign="top">
        <th scope="row">Google+ URL:</th>
        <td><input type="url" name="cup_google" size="40" value="<?php echo get_option('cup_google'); ?>" /></td>
        </tr>			
		
		<tr valign="top">
        <th scope="row">Contact Form Shortcode:</th>
        <td><input type="text" name="cup_form_shortcode" size="40" value="<?php echo get_option('cup_form_shortcode'); ?>" /></td>
        </tr>
        
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php }
?>