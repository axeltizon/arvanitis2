<?php
/* 
Plugin Name: Contact Us Page
Plugin URI: https://dropshippa.se/
Description: Contact Us Page
Version: 1.0
Author: Mattias Jönsson
Author URI: https://dropshippa.se/
License: GPL2

Contact Us Page is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Contact Us Page is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Contact Us Page. If not, see www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

add_action( 'wp_enqueue_scripts', 'cup_add_scripts' );

function cup_add_scripts() {
    
        wp_register_style( 'cupStyle', plugins_url('css/cupStyle.css', __FILE__) );
		wp_enqueue_style( 'cupStyle' );
}

add_action('admin_menu', 'cup_admin_pages');

function cup_admin_pages() {
        add_menu_page('Contact Us Page', 'Contact Us Page', 'manage_options', 'cup_settings', 'cup_settings_pages' );
}

include( plugin_dir_path( __FILE__ ) . 'settings/cup_settings.php');
include( plugin_dir_path( __FILE__ ) . 'includes/cup_email.php');
include( plugin_dir_path( __FILE__ ) . 'includes/cup_contact_layout.php');

add_shortcode( 'contact_us_page', 'cup_add_shortcode' );

function cup_add_shortcode() {
	cup_contact_us_page();
	cup_deliver_mail() ;
}
?>