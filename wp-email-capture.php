<?php

/*

Plugin Name: WP Email Capture

Plugin URI: http://wpemailcapture.com

Description: Captures email addresses for insertion into software such as <a href="http://wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="http://wpemailcapture.com/recommends/mailchimp/">Mailchimp</a>

Version: 3.0

Author: Winwar Media

Author URI: http://winwar.co.uk/

*/

global $wp_email_capture_db_version;
global $wpdb;

$wp_email_capture_db_version = "1.0";

define( 'WP_EMAIL_CAPTURE_PATH', dirname( __FILE__ ) );
define( 'WP_EMAIL_CAPTURE_URL', plugins_url( '', __FILE__ ) );
define( 'WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE', $wpdb->prefix . 'wp_email_capture_temp_members');
define( 'WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE', $wpdb->prefix . 'wp_email_capture_registered_members');
define( 'WP_EMAIL_CAPTURE_VERSION', '3.0' );

require_once WP_EMAIL_CAPTURE_PATH . '/inc/core.php';

add_action( 'plugins_loaded', 'wp_email_capture_plugins_loaded', 10 );

function wp_email_capture_plugins_loaded() {

	if ( function_exists( 'load_plugin_textdomain' ) ) {
		$plugin_dir = basename( dirname( __FILE__ ) );
		load_plugin_textdomain( 'WPEC', false , dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	add_action( 'admin_init', 'wp_email_capture_options_process' );
	add_action( 'wp_dashboard_setup', 'wp_email_capture_add_dashboard_widgets' );
	add_action( 'admin_menu', 'wp_email_capture_menus', 10 );
	add_action( 'admin_notices', 'wp_email_capture_admin_notice' );
	add_action( 'admin_notices', 'wp_email_capture_admin_upsell' );
	add_action( 'admin_init', 'wp_email_capture_nag_ignore' );

	if ( 1 == get_option( 'wpec_set_tracking' ) ) {

		add_action( 'plugins_loaded', 'wpec_start_tracking', 15 );
		add_action('admin_init','wpec_do_tracking');

	}
	
	add_action( 'init', 'wp_email_capture_process' );

	add_shortcode( 'wp_email_capture_form', 'wp_email_capture_form_process_atts' );

	add_action( 'wp_email_capture_signup_actions', 'wp_email_capture_signup', 10 );
	add_action( 'wp_email_capture_confirm_actions', 'wp_capture_email_confirm', 10 );

}

register_activation_hook( __FILE__, 'wp_email_capture_install' );


?>
