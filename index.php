<?php
/*
 * Plugin Name: Disable WordPress Update Notifications
 * Plugin URI: https://www.premtiwari.in/disable-wordpress-update-notifications/
 * Description: This plugin will disable WordPress core update notification, plugin update notification and theme update notifications and inline warnings in your admin panel.
 * Author: Prem Tiwari
 * Version: 2.4.2
 * Author URI: https://www.premtiwari.in/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'DWUN_PLUGIN_BASE', plugin_basename( __FILE__ ) );

// include disable auto-update Email Notifications.
require_once( ABSPATH . 'wp-includes/pluggable.php' );

function dwun_plugin_admin_style() {
	if ( isset( $_GET['page'] ) && 'fm-dwns' === $_GET['page'] ) {
		wp_enqueue_style( 'dwun-admin-style', plugins_url( "css/admin-style.css", __FILE__ ) );
	}
}
add_action( 'admin_enqueue_scripts', 'dwun_plugin_admin_style' );

function dwun_plugin_settings() {
	/**
	 * Update the plugin settings.
	 *
	 * @author Prem Tiwari
	 * @since  2.4.0
	 */
	if ( isset( $_POST['submit-nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['submit-nonce'] ) ), 'dwun_plugin_submit_form' ) ) {
		// Safe: Update plugin settings
		$dwun_values = [
			'dpun_setting'  => isset( $_POST[ 'dpun' ] ),
			'dwtu_setting'  => isset( $_POST[ 'dwtu' ] ),
			'dwcun_setting' => isset( $_POST[ 'dwcun' ] ),
			'den_setting'   => isset( $_POST[ 'den' ] ),
		];

		update_option( 'dwun_plugin_options', $dwun_values );
		// Print the success message.
		echo '<div class="updated notice notice-success is-dismissible below-h2" id="message"><p>Settings updated successfully. </p></div>';
	}

	// Get option settings values.
	$settings_values = get_option( 'dwun_plugin_options' );
	?>
	<div class="clear"></div>
	<div class="wbcr-factory-page-header">
		<h1 style="color:#fff">Disable Admin Notices — Settings </h1>
	</div>

	<div class="tabordion">
		<section id="section1">
			<input type="radio" name="sections" id="option1" checked>
			<label for="option1">Settings
				<span class="dashicons dashicons-admin-generic"></span>
				<div class="wbcr-factory-tab__short-description">
					General settings
				</div>
			</label>
			<article>
				<h2>Admin notifications</h2>
				<p>Do you know the situation, when some plugin offers you to update to premium, to collect technical data and shows many annoying notices? You are close these notices every now and again but they newly appears and interfere your work with WordPress. Even worse, some plugin’s authors delete “close” button from notices and they shows in your admin panel forever.</p>
				<form name="fm_dwun" method="POST">
					<table>
						<tbody>
						<tr class="mlw-box-left">
							<th scope="row">
								<span for="dpun">Plugin Update </span><br>
								<small>Select 'On' to hide all plugins update notifications.</small>
							</th>
							<td>
								<div class="onoffswitch">
										<input type="checkbox" name="dpun" class="onoffswitch-checkbox" id="myonoffswitch" <?php if ( ! empty( $settings_values['dpun_setting'] ) ) {
										echo "checked"; } ?>>
										
									<label class="onoffswitch-label" for="myonoffswitch" style="background: none; width: 56px; border: none;padding: inherit;">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</td>
						</tr>
						<tr class="mlw-box-left">
							<th scope="row">
								<span for="dwtu">Theme Update</span><br>
								<small>Select 'On' to hide all themes update notifications.</small>
							</th>
							<td>
								<div class="onoffswitch">
									<input type="checkbox" name="dwtu" class="onoffswitch-checkbox" id="dwtu" <?php if ( ! empty( $settings_values['dwtu_setting'] ) ) {
										echo "checked"; } ?>>
									<label class="onoffswitch-label" for="dwtu" style="background: none; width: 56px; border: none;padding: inherit;">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</td>
						</tr>
						<tr class="mlw-box-left">
							<th scope="row">
								<span for="dwcun">WordPress Core Update</span><br>
								<small>Select 'On' to hide WordPress core version update notifications.</small>
							</th>
							<td>
								<div class="onoffswitch">
									<input type="checkbox" name="dwcun" class="onoffswitch-checkbox" id="dwcun" <?php if ( ! empty( $settings_values['dwcun_setting'] ) ) {
										echo "checked"; } ?>>
									<label class="onoffswitch-label" for="dwcun" style="background: none; width: 56px; border: none;padding: inherit;">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</td>
						</tr>
					 
						<tr class="mlw-box-left">
							<th scope="row">
								<span for="den">Disable auto-update Email Notifications</span><br>
								<small>Select 'On' to disable plugins & themes auto-update email notifications.</small>
							</th>
							<td>
								<div class="onoffswitch">
									<input type="checkbox" name="den" class="onoffswitch-checkbox" id="den" <?php if ( ! empty( $settings_values['den_setting'] ) ) {
										echo "checked"; } ?>>
									<label class="onoffswitch-label" for="den" style="background: none; width: 56px; border: none;padding: inherit;">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
					<p class="fm-footer">
						<?php wp_nonce_field( 'dwun_plugin_submit_form', 'submit-nonce' ); ?>
						<input type="submit" name="publish" id="publish" class="button button-primary" value="Save Changes">
					</p>
				</form>
			</article>
		</section>
		
		<section id="section3">
			<input type="radio" name="sections" id="option3">
			<label for="option3">Help
				<span class="dashicons dashicons-admin-users"></span>
				<div class="wbcr-factory-tab__short-description">
					Having Issues?
				</div>
			</label>
			<article>
				<h2>Need Support</h2>
				<div id="wbcr-clr-support-widget" class="wbcr-factory-sidebar-widget">
					<p>
						<strong>Do you want the plugin to improved and update?</strong>
					</p>
					<p>Help the author, leave a review on wordpress.org. Thanks to feedback, I will know that the plugin is really useful to you and is needed.</p>
					<p><strong>Having Issues?</strong></p>
					<div class="wbcr-clr-support-widget-body">
						<p>
							We provide free support for this plugin. If you are pushed with a problem, just create a new ticket. We will definitely help you!               </p>
						<ul>
							<li style="margin-top: 15px;background: #fff4f1;padding: 10px;color: #a58074;">
								<span class="dashicons dashicons-warning"></span>
								If you find a php error or a vulnerability in plugin, you can <a href="https://github.com/speedyprem/disable-update-notifications/issues" target="_blank" rel="noopener">raise an issue</a> in github.</li>
						</ul>
					</div>
				</div>
			</article>
		</section>
	</div>
	<div class="clear" style="min-height:550px;"></div>
	<?php
}

// Add in admin side panel.
function dwun_plugin_admin_menu() {
	add_options_page( 'Disable Wordpress Notification Settings', 'Disable Notifications', 'manage_options', 'fm-dwns', 'dwun_plugin_settings' );
}

add_action( 'admin_menu', 'dwun_plugin_admin_menu' );

// Get option settings values.
$settings_values = get_option( 'dwun_plugin_options' );

// Disable the wordpress plugin update notifications.
if ( ! empty( $settings_values[ 'dpun_setting' ] ) ) {
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', '__return_null' );
}

// Disable the wordpress theme update notifications.
if ( ! empty( $settings_values[ 'dwtu_setting' ] ) ) {
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	add_filter('pre_site_transient_update_themes','dwun_plugin_disable_theme_updates');
}

// Disable the wordpress core update notifications
if ( ! empty( $settings_values[ 'dwcun_setting' ] ) ) {
	add_action( 'after_setup_theme', 'dwun_plugin_disable_core_updates' );
	function dwun_plugin_disable_core_updates() {
		if ( ! current_user_can( 'update_core' ) ) {
			return;
		}
		add_filter( 'pre_option_update_core', '__return_null' );
		add_filter( 'pre_site_transient_update_core', '__return_null' );
	}
}

/**
 * Disable auto-update Email Notifications.
 * 
 * @since 2.2 version.
 */
if ( ! empty( $settings_values[ 'den_setting' ] ) ) {
	// Disable plugins auto-update email notifications.
	add_filter( 'auto_plugin_update_send_email', '__return_false' );
	// Disable themes auto-update email notifications.
	add_filter( 'auto_theme_update_send_email', '__return_false' );
}

/**
 * Genral plugins functions used for Admin and frontend enterface.
 */
function dwun_plugin_settings_link($links) {
	$settings_link = '<a href="options-general.php?page=fm-dwns">Settings</a>'; 
	array_unshift($links, $settings_link); 
	return $links; 
  }

add_filter( 'plugin_action_links_' . DWUN_PLUGIN_BASE, 'dwun_plugin_settings_link' );

/**
 * Disable WordPress theme update notifications.
 *
 * @return void
 */
function dwun_plugin_disable_theme_updates() {
	global $wp_version; return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
