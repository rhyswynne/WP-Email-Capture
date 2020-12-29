<?php


/**
* Check if we're on rich text editor of 4.9< and if so add the TinyMCE buttons
* @return void
*/
function wp_email_capture_add_freebuttons() {
	// Don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
		return;

	// Add only in Rich Editor mode
	if ( get_user_option( 'rich_editing' ) == 'true' ) {
		add_filter( "mce_external_plugins", "wp_email_capture_add_tinymce_plugin" );
		add_filter( 'mce_buttons', 'wp_email_capture_free_button' );
	}
}


/**
* Add the button for WP eBay Product Feeds
* @param  array 		$buttons 			Array of current buttons
* @return array 							Array of buttons with WP eBay Product Feeds added
*/
function wp_email_capture_free_button( $buttons ) {
	array_push( $buttons, "separator", "wpemailcapturebutton" );
	return $buttons;
}


// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function wp_email_capture_add_tinymce_plugin( $plugin_array ) {
	$url = WP_EMAIL_CAPTURE_URL . "/inc/js/wp_email_capture_button.js";
	$plugin_array['wpemailcapturebutton'] = $url;
	return $plugin_array;
}