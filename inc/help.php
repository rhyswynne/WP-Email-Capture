<?php

/**
 * Help Text for the free version.
 *
 * @return void
 */
function wp_email_capture_free_help() {
?>

	<div class="wrap">
		<div style="width:70%;float:left;clear:both;" class="postbox-container">
			<div class="metabox-holder">
				<div class="meta-box-sortables">
					<h2><?php echo __( 'WP Email Capture - Help', 'wp-email-capture' ); ?></h2>
					<?php
	/**
	 * Action to control the display of the help boxes on the help page.
	 *
	 * Hook into this to add/remove help boxes should there be a change between free & premium.
	 */
	do_action( 'wp_email_capture_help_boxes' ); ?>
				</div>
			</div>
		</div>
		<?php
	wp_email_capture_admin_sidebar( "getwpemailcapturepremiumdescription,affiliates,news,supportus" );
?>
	</div>
	<?php
}


/**
 * Displays the help for the "Setup" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_setup_help() {
	/**
	 * Filter for the settings page URL for WP Email Capture
	 *
	 * This allows us to change it should something change between the versions.
	 *
	 * @var string
	 */
	$settingspageurl = apply_filters( 'wp_email_capture_change_settings_url', admin_url( 'admin.php?page=wpemailcapturefreesettings' ) );

	$furtherhelpurl = "http://wpemailcapture.com/2012/10/how-to-set-up-wp-email-capture-free/?utm_source=plugin&utm_medium=help&utm_campaign=free-setup";

?>
	<h3><?php echo __( 'Setup', 'wp-email-capture' ); ?></h3>
	<table class="form-table">

		<tbody>

			<tr valign="top">
				<td>
					<p><?php _e( 'To get WP Email Capture to work effectively, please follow the following instructions:-', 'wp-email-capture' ); ?></p>
					<ol>
						<li><?php printf( __( 'Create a page on your site for "sign up" (this page will be forwarded to when the form is just filled in, informs the users that they need to click on a link in the email. ', 'wp-email-capture' ) ); ?></li>
						<li><?php printf( __( 'Create a page on your site for "confirmation" (thanking them for their enquiry, links to download etc). ', 'wp-email-capture' ) ); ?></li>
						<li><?php printf( __( 'After creating these, fill in the settings in the <a href="%s">WP Email Capture > Settings</a> page, making sure the URL of the "sign up" page is in the "Page to redirect to on sign up" text box and the "confirmation" page URL is in the "Page to redirect to on confirmation of email address" text box.', 'wp-email-capture' ), $settingspageurl ); ?></li>
					</ol>
					<p><?php  printf( __( 'Further help is available on the <a href="%s" target="_blank">WP Email Capture Support Site</a>.', 'wp-email-capture' ), $furtherhelpurl ); ?></p>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_setup_help', 10 );



/**
 * Displays the help for the "Options" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_options_help() {

	$settingspageurl = apply_filters( 'wp_email_capture_change_settings_url', admin_url( 'admin.php?page=wpemailcapturefreesettings' ) );

?>

	<h3><?php echo __( 'Further Options', 'wp-email-capture' ); ?></h3>
	
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>
				
					<p><?php printf( __( 'On the <a href="%s">WP Email Capture Settings Page</a>, as well as being able to structure your email, you can also add the following options.', 'wp-email-capture' ), $settingspageurl ); ?></p>
				
					<p><?php printf( __( '<strong>Link to us (optional, but appreciated):</strong> This option, when ticked, adds a small, unobtrusive text link beneath the widget. Totally optional, but very appreciated as it helps support the plugin.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Make The "Name" field a required field?</strong> If ticked, the user will have to fill in both their name & email address. This means you get better data, but can affect conversion rates.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Delimeter (leave blank for a comma)</strong> This will allow you to set the delimiter used in the CSV export. Should commas be used in names, for example, you may want to change this to something like a semi-colon.', 'wp-email-capture' ) ); ?></p>
				
				</td>
			</tr>
		</tbody>
	</table>

	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_options_help', 20 );


/**
 * Displays the help for the "Display" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_display_help() {

	$widgetpageurl = admin_url( 'widgets.php' );

?>

	<h3><?php echo __( 'Display', 'wp-email-capture' ); ?></h3>
	
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>
				
					<p><?php _e( 'Once the form is set up, you need to display the form on the front end of your website using one of a few methods:-', 'wp-email-capture' ); ?></p>
				
					<p><?php printf( __( '<strong>Widgets:</strong> To display the WP Email Capture form in a Widget, go to <a href="%s">your widgets page</a>, and drag the WP Email Capture widget to any widget area you have. You can add a title and text before the widget as well to try and entice subscriptions.', 'wp-email-capture' ), $widgetpageurl ); ?></p>
					<p><?php printf( __( '<strong>In Posts/Pages:</strong> To display the WP Email Capture Form in posts or pages, you can use the shortcode. [wp_email_capture_form]. This shortcode doesn\'t have any attributes.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>In PHP:</strong> To display the WP Email Capture Form in PHP, add <code>&lt;?php if (function_exists(\'wp_email_capture_form\')) { wp_email_capture_form(); } ?&gt;</code> to your template.', 'wp-email-capture' ) ); ?></p>
				
				</td>
			</tr>
		</tbody>
	</table>

	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_display_help', 30 );



/**
 * Displays the help for the "List Operations" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_list_help() {

	$settingspageurl = apply_filters( 'wp_email_capture_change_settings_url', admin_url( 'admin.php?page=wpemailcapturefreesettings' ) );
	$purchasepageurl = apply_filters( 'wp_email_capture_change_purchase_url', "http://wpemailcapture.com/premium/?utm_source=help-page&utm_medium=plugin&utm_campaign=wpemailcapture" );
?>

	<h3><?php echo __( 'List Operations', 'wp-email-capture' ); ?></h3>
	
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>
				
					<p><?php printf( __( 'After a while, your list should have a few subscribers. You can see the list on the <a href="%s">WP Email Capture Settings Page</a>, as well as do a few tasks as well.', 'wp-email-capture' ), $settingspageurl ); ?></p>
				
					<p><?php printf( __( '<strong>Delete [email-address]:</strong> Next to every email address is a delete button. Use this to delete any email from your list.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Export List:</strong> Use this to export your list to a CSV, ready for importing elsewhere.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Delete Unconfirmed Email Addresses:</strong> Unconfirmed email addresses are hidden in the database. Use this to delete them to reduce the space taken up by them.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Delete All Email Addresses:</strong> This will delete <em>all</em> email addresses in the system, both confirmed and unconfirmed. Please use with caution!', 'wp-email-capture' ) ); ?></p>

					<?php 

						if ( $purchasepageurl ) {
							printf( __( '<p>WP Email Capture is only designed to be used for small (under 500 entries) lists. You can use it for more, but please consider <a href="%s" target="_blank">purchasing the premium version</a> if your list gets too big.</p>','WPEC' ), $purchasepageurl ); 
						}
					?>

				</td>
			</tr>
		</tbody>
	</table>

	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_list_help', 40 );
