<?php


/**
 * Function to display the dashboard widget. Contains the last 3 subscribers, as well as some options.
 *
 * @return void
 */
function wp_email_capture_dashboard_widget() {
	
	wp_email_capture_writetable(3, "<strong>".__('Last Three Members To Join','wp-email-capture')."</strong><br/><br/>");

	echo '<br/><br/><a name="list"></a><strong>'.__('Export','wp-email-capture').'</strong>';
	echo '<form name="wp_email_capture_export" action="'. esc_url($_SERVER['REQUEST_URI']) . '#list" method="post">';
	echo '<label>'.__('Use the button below to export your list as a CSV to use in software such as','wp-email-capture').' <a href="https://www.wpemailcapture.com/recommends/aweber/" title="Email Marketing">Aweber</a>.</label>';
	echo '<input type="hidden" name="wp_email_capture_export" />';
	echo '<div class="submit"><input type="submit" value="'.__('Export List','wp-email-capture').'" class="button" /></div>';
	echo "</form><br/><br/>";

	$tempemails = wp_email_capture_count_temp();
	$lastsignupdatestring   = wp_email_capture_get_last_singup_date();

    if ( $lastsignupdatestring ) {
        $lastsignupdate         = date(  "jS F, Y g:ia", strtotime( $lastsignupdatestring ) );
        $lastsignupdatesentance = __( ' The last attempted signup was on ' . $lastsignupdate . '.',  'wp-email-capture' );
    } else {
        $lastsignupdatesentance = "";
    }
	
	echo "<a name='truncate'></a><strong>".__('Temporary e-mails','wp-email-capture')."</strong>\n";
	echo '<form name="wp_email_capture_truncate" action="'. esc_url($_SERVER['REQUEST_URI']) . '#truncate" method="post">';
	echo '<label>'.__('There are','wp-email-capture').' '. $tempemails . ' '.__('e-mail addresses that have been unconfirmed.' . $lastsignupdatesentance . ' Delete them to save space below.','wp-email-capture').'</label>';

	echo '<input type="hidden" name="wp_email_capture_truncate"/>';
	echo '<div class="submit"><input type="submit" value="'.__('Delete Unconfirmed e-mail Addresses','wp-email-capture').'" class="button"  /></div>';
	echo "</form>";



} 


/**
 * Wrapper function to help display the dashboard widget. Checks user privleges before adding the widget.
 * 
 * @return void
 */
function wp_email_capture_add_dashboard_widgets() {

	if (current_user_can( apply_filters( 'wp_email_capture_dashboard_capability', 'manage_options' ) )){
		wp_add_dashboard_widget('wp_email_capture_dashboard_widget', __('WP Email Capture - At A Glance','wp-email-capture'), 'wp_email_capture_dashboard_widget');	
	}

}