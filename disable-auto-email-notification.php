<?php
/**
 * Disable auto-update Email Notifications.
 * @since 2.2 version.
 */

// Disable plugins auto-update email notifications .
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// Disable themes auto-update email notifications.
add_filter( 'auto_theme_update_send_email', '__return_false' );
