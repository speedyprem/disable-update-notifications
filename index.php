<?php
/*
 * Plugin Name: Disable Update Notifications
 * Plugin URI: http://www.freewebmentor.com/2016/04/disable-wordpress-update-notifications.html
 * Description: This plugin will disable WordPress core update notification, plugin update notification and theme update notifications and inline warnings in your admin panel.
 * Author: Prem Tiwari
 * Version: 2.2.1
 * Author URI: https://www.freewebmentor.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// include disable auto-update Email Notifications.
require_once ( dirname(__FILE__). '/disable-auto-email-notification.php' );

function admin_style() {
	wp_enqueue_style( 'fm_admin_style', plugins_url( "css/admin_style.css", __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'admin_style' );

function dwnSettings() {
	echo '<h3 class="mlw-header">Settings - Hide system notifications and inline warnings.</h3><hr>';
	if ( isset( $_GET[ 'msg' ] ) ) {
		echo '<div class="updated notice notice-success is-dismissible below-h2" id="message"><p>Settings updated. </p></div>';
	}
	?>
	<div class="fm-wrapper">
		<form name="fm_dwun" method="POST">
			<table class="fm-content">
				<tbody>
				<tr class="mlw-box-left">
					<th scope="row">
						<label for="dpun">Plugin Update Notifications </label>
					</th>
					<td>
						<label class="switch">
							<input class="switch-input" name="dpun"
								   type="checkbox" <?php if ( get_option( "dpun_setting" ) == "on" ) {
								echo "checked";
							} ?>/>
							<span class="switch-label" data-on="ON" data-off="OFF"></span>
							<span class="switch-handle"></span>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="dwtu">Theme Update Notifications</label>
					</th>
					<td>
						<label class="switch">
							<input class="switch-input" name="dwtu"
								   type="checkbox" <?php if ( get_option( "dwtu_setting" ) == "on" ) {
								echo "checked";
							} ?>/>
							<span class="switch-label" data-on="ON" data-off="OFF"></span>
							<span class="switch-handle"></span>
						</label>

					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="dwcun">Core Update Notifications</label>
					</th>
					<td>
						<label class="switch">
							<input class="switch-input" name="dwcun"
								   type="checkbox" <?php if ( get_option( "dwcun_setting" ) == "on" ) {
								echo "checked";
							} ?>/>
							<span class="switch-label" data-on="ON" data-off="OFF"></span>
							<span class="switch-handle"></span>
						</label>
					</td>
				</tr>
				</tbody>
			</table>
			<p class="fm-footer">
				<input type="submit" name="publish" id="publish" class="button button-primary" value="Save Changes">
			</p>
		</form>
	</div>
	<?php
// Update plugin settings
	if ( isset( $_REQUEST[ 'publish' ] ) ) {
		// set the variables
		if ( $_POST[ 'dpun' ] ) {
			$dpun = 'on';
		} else {
			$dpun = 'off';
		}
		if ( $_POST[ 'dwtu' ] ) {
			$dwtu = 'on';
		} else {
			$dwtu = 'off';
		}
		if ( $_POST[ 'dwcun' ] ) {
			$dwcun = 'on';
		} else {
			$dwcun = 'off';
		}
		//update in option table
		update_option( 'dpun_setting', $dpun );
		update_option( 'dwtu_setting', $dwtu );
		update_option( 'dwcun_setting', $dwcun );

		echo( "<SCRIPT LANGUAGE='JavaScript'>
			   window.location.href='" . $_SERVER[ 'HTTP_REFERER' ] . "&msg=success';
			</SCRIPT>" );
	}
}

#add in admin side panel
function Amin_menu_dwnSettings() {
	add_options_page( 'Disable Wordpress Notification Settings', 'Disable Notification Settings', 'manage_options', 'fm-dwns', 'dwnSettings' );
}

add_action( 'admin_menu', 'Amin_menu_dwnSettings' );

// Disable the wordpress plugin update notifications
if ( get_option( 'dpun_setting' ) == "on" ) {
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', '__return_null' );
}

// Disable the wordpress theme update notifications
if ( get_option( 'dwtu_setting' ) == "on" ) {
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
}

// Disable the wordpress core update notifications
if ( get_option( 'dwcun_setting' ) == "on" ) {
	add_action( 'after_setup_theme', 'remove_core_updates' );

	function remove_core_updates() {
		if ( ! current_user_can( 'update_core' ) ) {
			return;
		}
		add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', '__return_null' );
		add_filter( 'pre_site_transient_update_core', '__return_null' );
	}
}

?>