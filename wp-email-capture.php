<?php

/*

Plugin Name: WP Email Capture

Plugin URI: https://www.wpemailcapture.com/?utm_source=plugin-link&utm_medium=plugin&utm_campaign=wpemailcapture

Description: Captures email addresses for insertion into software such as <a href="http://wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="http://wpemailcapture.com/recommends/mailchimp/">Mailchimp</a>

Version: 3.3.2

Author: Winwar Media

Author URI: https://www.winwar.co.uk/?utm_source=author-link&utm_medium=plugin&utm_campaign=wpemailcapture

*/

global $wp_email_capture_db_version;
global $wpdb;

// Definitions
$wp_email_capture_db_version = "1.2";

define( 'WP_EMAIL_CAPTURE_PATH', dirname( __FILE__ ) );
define( 'WP_EMAIL_CAPTURE_URL', plugins_url( '', __FILE__ ) );
define( 'WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE', $wpdb->prefix . 'wp_email_capture_temp_members');
define( 'WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE', $wpdb->prefix . 'wp_email_capture_registered_members');
define( 'WP_EMAIL_CAPTURE_VERSION', '3.3.1' );

require_once WP_EMAIL_CAPTURE_PATH . '/inc/core.php';

/**
 * Function to initialise all WordPress Functionality.
 *
 * Loads textdomain, then loads admin functions, then front end functionality.
 *  
 * @return void
 */
function wp_email_capture_plugins_loaded() {

	// Textdomain
	if ( function_exists( 'load_plugin_textdomain' ) ) {
		$plugin_dir = basename( dirname( __FILE__ ) );
		load_plugin_textdomain( 'wp-email-capture', false , dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	// Admin Functions
	add_action( 'admin_init', 'wp_email_capture_options_process' ); 
	add_action( 'wp_dashboard_setup', 'wp_email_capture_add_dashboard_widgets' );
	add_action( 'admin_menu', 'wp_email_capture_menus', 10 );
	//add_action( 'admin_notices', 'wp_email_capture_admin_notice' );
	add_action( 'admin_notices', 'wp_email_capture_admin_upsell' );
	add_action( 'admin_init', 'wp_email_capture_nag_ignore' );
	add_action( 'widgets_init', 'wp_email_capture_widget_init', 10);
		
	// Front End Functions
	add_action( 'init', 'wp_email_capture_process' );
	add_action( 'wp_email_capture_signup_actions', 'wp_email_capture_signup', 10 );
	add_action( 'wp_email_capture_confirm_actions', 'wp_capture_email_confirm', 10 );
	add_action( 'wp_enqueue_scripts', 'wp_email_capture_scripts' );
	add_action( 'admin_enqueue_scripts', 'wp_email_capture_admin_scripts' );
	add_shortcode( 'wp_email_capture_form', 'wp_email_capture_form_process_atts' );
	add_filter( 'wp_email_capture_send_email', 'wp_email_capture_send_email_default', 10, 4 );
	add_action( 'wp_email_capture_set_wp_email_capture_email_settings', 'wp_email_capture_set_email_to_html', 10 );
	add_action( 'wp_email_capture_set_normal_email_settings', 'wp_email_capture_set_email_to_plain', 10 );

	// Running this on the same hook so it can be removed if need be.
    add_action( 'plugins_loaded', 'wp_email_capture_database_upgdrade', 50 );
}

// Activation functionality
add_action( 'plugins_loaded', 'wp_email_capture_plugins_loaded', 10 );
register_activation_hook( __FILE__, 'wp_email_capture_install' );