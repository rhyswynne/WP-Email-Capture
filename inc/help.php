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

	$furtherhelpurl = "https://www.wpemailcapture.com/2012/10/how-to-set-up-wp-email-capture-free/?utm_source=plugin&utm_medium=help&utm_campaign=wpemailcapture";

?>
	<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'Setup', 'wp-email-capture' ); ?></h3>
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
	</div>
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
	<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'Further Options', 'wp-email-capture' ); ?></h3>
	
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>
					<p><?php printf( __( 'On the <a href="%s">WP Email Capture Settings Page</a>, as well as being able to structure your email, you can also add the following options.', 'wp-email-capture' ), $settingspageurl ); ?></p>				
					<p><?php printf( __( '<strong>Link to us (optional, but appreciated):</strong> This option, when ticked, adds a small, unobtrusive text link beneath the widget. Totally optional, but very appreciated as it helps support the plugin.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Make The "Name" field a required field?</strong> If ticked, the user will have to fill in both their name & email address. This means you get better data, but can affect conversion rates.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Delimeter (leave blank for a comma)</strong> This will allow you to set the delimiter used in the CSV export. Should commas be used in names, for example, you may want to change this to something like a semi-colon.', 'wp-email-capture' ) ); ?></p>
					<p><?php printf( __( '<strong>Use Default Styling</strong> The plugin comes with a simple default styling that makes the plugin look neater. Use if you are not comfortable with CSS, or your theme does not style forms.', 'wp-email-capture' ) ); ?></p>
				</td>
			</tr>
		</tbody>
	</table>
</div>

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
<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'Display', 'wp-email-capture' ); ?></h3>
	
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
</div>
	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_display_help', 30 );



/**
 * Displays the help for the "List Operations" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_list_help() {

	$settingspageurl = apply_filters( 'wp_email_capture_change_settings_url', admin_url( 'admin.php?page=wpemailcapturefreesettings' ) );
	$purchasepageurl = apply_filters( 'wp_email_capture_change_purchase_url', 'https://www.wpemailcapture.com/premium/?utm_source=help-page&utm_medium=plugin&utm_campaign=wpemailcapture' );

	?>
<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'List Operations', 'wp-email-capture' ); ?></h3>
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
							printf( __( '<p>WP Email Capture is only designed to be used for small (under 500 entries) lists. You can use it for more, but please consider <a href="%s" target="_blank">purchasing the premium version</a> if your list gets too big.</p>','wp-email-capture' ), $purchasepageurl ); 
						}
					?>

				</td>
			</tr>
		</tbody>
	</table>
</div>
	<?php
} add_action( 'wp_email_capture_help_boxes', 'wp_email_capture_list_help', 40 );


/**
 * Displays the help for the "List Operations" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_gdpr_help() {

	$settingspageurl = apply_filters( 'wp_email_capture_change_settings_url', admin_url( 'admin.php?page=wpemailcapturefreesettings' ) );
	//$purchasepageurl = apply_filters( 'wp_email_capture_change_purchase_url', "https://www.wpemailcapture.com/premium/?utm_source=help-page&utm_medium=plugin&utm_campaign=wpemailcapture" );
?>
<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'GDPR Guidelines', 'wp-email-capture' ); ?></h3>

	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>

					<p><?php printf( __( 'You will need to be running version 4.9.6 of WordPress to use the GDPR settings. Your settings are located in the <a href="%s">WP Email Capture Settings page</a> (in the GDPR section).' , 'wp-email-capture' ), $settingspageurl ); ?></p>

					<p><?php printf( __( 'You can specify a privacy policy that - if present, activates a checkbox allowing signups to accept your privacy policy. Users will need to check that to sign up. You can also choose to delete responses after a number of days/weeks/months, and there is a section of text you can paste into your privacy policy too.', 'wp-email-capture' ) ); ?></p>

					<p><?php printf( __( 'Should you ever receive a request to export/delete, you can use the new Export/Delete personal data, held in the Tools section.', 'wp-email-capture' ) ); ?>

				</td>
			</tr>
		</tbody>
	</table>
</div>
	<?php
} 



/**
 * Displays the help for the "Gutenberg" section of the help documentation.
 *
 * @return void
 */
function wp_email_capture_gutenberg_help() {
?>
<div class="wp_email_capture_help_box">
		<h3 class="header"><?php echo __( 'New WordPress Editor (Codenamed Gutenberg)', 'wp-email-capture' ); ?></h3>

	<table class="form-table">
		<tbody>
			<tr valign="top">
				<td>

					<p><?php printf( __( 'If you are using the new WordPress editor (codenamed Gutenberg), you can add a WP Email Capture Gutenberg content block.' , 'wp-email-capture' ) ); ?></p>

					<p><?php printf( __( 'Search for "WP Email Capture Form" to add it to your site. It is also located under "Widgets"', 'wp-email-capture' ) ); ?></p>

					<p><?php printf( __( 'This widget works similar to the WP Email Capture widget, in that you can define an intro text and a title to help introduce your box.', 'wp-email-capture' ) ); ?>

					<p><?php printf( __( 'There is a placeholder for where the form goes as well, this will show the form on the front end, but not on the back end.', 'wp-email-capture' ) ); ?>

				</td>
			</tr>
		</tbody>
	</table>
</div>
	<?php
}
