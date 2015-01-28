<?php 

/*

Plugin Name: WP Email Capture

Plugin URI: http://www.wpemailcapture.com

Description: Captures email addresses for insertion into software such as <a href="http://wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="http://wpemailcapture.com/recommends/mailchimp/">Mailchimp</a>

Version: 2.11

Author: Rhys Wynne

Author URI: http://www.rhyswynne.co.uk/

*/

global $wp_email_capture_db_version;

$wp_email_capture_db_version = "1.0";

define('WP_EMAIL_CAPTURE_PATH', dirname(__FILE__));

require_once(WP_EMAIL_CAPTURE_PATH . '/inc/core.php');

add_action('plugins_loaded','wp_email_capture_plugins_loaded');

function wp_email_capture_plugins_loaded()
{

	if (function_exists('load_plugin_textdomain'))
	{
		$plugin_dir = basename(dirname(__FILE__));
		load_plugin_textdomain('WPEC','wp-content/plugins/'.$plugin_dir.'/languages',$plugin_dir.'/languages');
	}
	
	return;
}

if ( is_admin() ){ // admin actions

  add_action( 'admin_init', 'wp_email_capture_options_process' );

  add_action('wp_dashboard_setup', 'wp_email_capture_add_dashboard_widgets' );
  add_action('admin_menu', 'wp_email_capture_menus');

} else {

  add_action('init','wp_email_capture_process');

 //add_filter( 'the_content', 'wp_email_capture_display_form_in_post');

}



register_activation_hook(__FILE__,'wp_email_capture_install');

add_shortcode( 'wp_email_capture_form', 'wp_email_capture_form_page');

add_action('admin_notices', 'wp_email_capture_admin_notice');
add_action('admin_init', 'wp_email_capture_nag_ignore');

?>