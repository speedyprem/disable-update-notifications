<?php
/*
 * Plugin Name: Disable WordPress Update Notifications
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
require_once( dirname( __FILE__ ) . '/disable-auto-email-notification.php' );

function admin_style() {
	wp_enqueue_style( 'fm_admin_style', plugins_url( "css/admin_style.css", __FILE__ ) );
}

add_action( 'admin_enqueue_scripts', 'admin_style' );

function dwnSettings() {
	if ( isset( $_GET[ 'msg' ] ) ) {
		echo '<div class="updated notice notice-success is-dismissible below-h2" id="message"><p>Settings updated. </p></div>';
	}
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
                <fieldset id="factory-form-group-form-group-1481797469" class="factory-form-group factory-form-group-form-group-1481797469">
                    <div class="wbcr-factory-page-group-header">
                        <p>Do you know the situation, when some plugin offers you to update to premium, to collect technical data and shows many annoying notices? You are close these notices every now and again but they newly appears and interfere your work with WordPress. Even worse, some plugin’s authors delete “close” button from notices and they shows in your admin panel forever.</p>
                    </div>
                    <div class="form-group form-group-checkbox  factory-control-show_notices_in_adminbar">
                        <label for="wbcr_dan_show_notices_in_adminbar" class="col-sm-4 control-label">
                            Enable hidden notices in adminbar																<span class="factory-hint-icon factory-hint-icon-green" data-toggle="factory-tooltip" data-placement="right" title="" data-original-title="By default, the plugin hides all notices, which you specified. If you enable this option, the plugin will collect all hidden notices and show them into the top admin toolbar. It will not disturb you but will allow to look notices at your convenience.">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAQAAABKmM6bAAAAUUlEQVQIHU3BsQ1AQABA0X/komIrnQHYwyhqQ1hBo9KZRKL9CBfeAwy2ri42JA4mPQ9rJ6OVt0BisFM3Po7qbEliru7m/FkY+TN64ZVxEzh4ndrMN7+Z+jXCAAAAAElFTkSuQmCC" alt="">

						</span>
                        </label>
                        <div class="control-group col-sm-8">
                            <div class="factory-checkbox factory-from-control-checkbox factory-buttons-way btn-group">
                                <button type="button" class="btn btn-default btn-small btn-sm factory-on">On</button>
                                <button type="button" class="btn btn-default btn-small btn-sm factory-off active" data-value="0">Off</button>
                                <input type="checkbox" style="display: none" id="wbcr_dan_show_notices_in_adminbar" class="factory-result" name="wbcr_dan_show_notices_in_adminbar" value="0" "="">
                            </div>

                        </div>
                    </div>
            </article>
        </section>
        <section id="section2">
            <input type="radio" name="sections" id="option2">
            <label for="option2">Hide admin items
                    <span class="dashicons dashicons-menu"></span>
                    <div class="wbcr-factory-tab__short-description">
                        Hide any admin menu
                    </div>
                </label>
            <article>
                <h2>Paul McCartney</h2>
                <p>Sir James Paul McCartney, (born 18 June 1942), is an English musician, singer, songwriter, multi-instrumentalist, and composer. With John Lennon, George Harrison and Ringo Starr, he gained worldwide fame as a member of the Beatles, widely regarded as one of the most popular and influential acts in the history of rock music; his songwriting partnership with Lennon is one of the most celebrated of the 20th century. After the band's break-up, he pursued a solo career and later formed Wings with his first wife, Linda, and Denny Laine.</p>
                <p>McCartney has been recognised as one of the most successful composers and performers of all time, with 60 gold discs and sales of over 100 million albums and 100 million singles of his work with the Beatles and as a solo artist.[2] More than 2,200 artists have covered his Beatles song "Yesterday", more than any other copyrighted song in history. Wings' 1977 release "Mull of Kintyre" is one of the all-time best-selling singles in the UK. Inducted into the Rock and Roll Hall of Fame as a solo artist in March 1999, McCartney has written, or co-written 32 songs that have reached number one on the Billboard Hot 100, and as of 2014 he has sold more than 15.5 million RIAA-certified units in the United States. McCartney, Lennon, Harrison and Starr received MBEs in 1965, and in 1997, McCartney was knighted for his services to music.</p>
                <p>McCartney has released an extensive catalogue of songs as a solo artist and has composed classical and electronic music. He has taken part in projects to promote international charities related to such subjects as animal rights, seal hunting, land mines, vegetarianism, poverty, and music education. He has married three times and is the father of five children.</p>
            </article>
        </section>
        <section id="section3">
            <input type="radio" name="sections" id="option3">
            <label for="option3">George Harrison</label>
            <article>
                <h2>George Harrison</h2>
                <p>George Harrison, (25 February 1943 – 29 November 2001), was an English musician, multi-instrumentalist, singer and songwriter who achieved international fame as the lead guitarist of the Beatles. Although John Lennon and Paul McCartney were the band's primary songwriters, most of their albums included at least one Harrison composition, including "While My Guitar Gently Weeps", "Here Comes the Sun" and "Something", which became the Beatles' second-most-covered song.</p>
            </article>
        </section>
        <section id="section4">
            <input type="radio" name="sections" id="option4">
            <label for="option4">Help
                <span class="dashicons dashicons-admin-users"></span>
                <div class="wbcr-factory-tab__short-description">
                    Having Issues?
                </div>
            </label>
            <article>
                <div id="wbcr-clr-support-widget" class="wbcr-factory-sidebar-widget">
                        <p>
                            <strong>Do you want the plugin to improved and update?</strong>
                        </p>
                        <p>Help the author, leave a review on wordpress.org. Thanks to feedback, I will know that the plugin is really useful to you and is needed.</p>
                    <p><strong>Having Issues?</strong></p>
                    <div class="wbcr-clr-support-widget-body">
                        <p>
                            We provide free support for this plugin. If you are pushed with a problem, just create a new ticket. We will definitely help you!				</p>
                        <ul>
                            <li><span class="dashicons dashicons-sos"></span>
                                <a href="#" target="_blank" rel="noopener">Get starting free support</a>
                            </li>
                            <li style="margin-top: 15px;background: #fff4f1;padding: 10px;color: #a58074;">
                                <span class="dashicons dashicons-warning"></span>
                                If you find a php error or a vulnerability in plugin, you can <a href="#" target="_blank" rel="noopener">create ticket</a> in hot support that we responded instantly.					</li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
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
}

// Disable the wordpress core update notifications
if ( get_option( 'dwcun_setting' ) == "on" ) {
	add_action( 'after_setup_theme', 'remove_core_updates' );

	function remove_core_updates() {
		if ( ! current_user_can( 'update_core' ) ) {
			return;
		}
		//fadd_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', '__return_null' );
		add_filter( 'pre_site_transient_update_core', '__return_null' );
	}
}

?>