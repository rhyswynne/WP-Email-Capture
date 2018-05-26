<?php

/**
 * Get the privacy policy string
 *
 * @return string   
 */
function wp_email_capture_get_privacy_policy_string() {

	$privacy_policy_string = "";

	if ( get_option( 'wp_email_capture_enable_gdpr' ) && get_option( 'wp_page_for_privacy_policy' ) ) {

		$privacy_policy_string = '<p><input type="checkbox" value="1" name="wp-email-capture-accept-privacy-policy" />' . sprintf( __( ' I agree to the <a href="%s">Privacy Policy</a> of this website.', 'wp-email-capture' ), get_permalink( get_option( 'wp_page_for_privacy_policy' ) ) ) . '</p>';

	} elseif (  get_option( 'wp_email_capture_enable_gdpr' ) && !get_option( 'wp_page_for_privacy_policy' ) ) {

		$privacy_policy_string = '<p><input type="checkbox" value="1" name="wp-email-capture-accept-privacy-policy" />' . __( ' I agree to the Privacy Policy of this website.', 'wp-email-capture' ) . '</p>';

	}

	$privacy_policy_string = apply_filters( 'wp_email_capture_prviacy_policy_string', $privacy_policy_string );

	return $privacy_policy_string;
}


/**
 * Add before the submit button on the echo form the Privacy Policy 
 *
 * @return void
 */
function wp_email_capture_add_privacy_policy_before_submit_echo_form() {

	echo wp_email_capture_get_privacy_policy_string();

}


/**
 * Add before the submit button on the shortcode form the Privacy Policy 
 *
 * @param  string  $formhtml  The form HTML
 * @return string             The replacement HTML, with added privacy policy HTML.
 */
function wp_email_capture_add_privacy_policy_before_submit_display_form( $formhtml ) {

	$privacy_policy_string = wp_email_capture_get_privacy_policy_string();

	$formhtml = str_replace( "<input type='hidden' name='wp_capture_action' value='1' />", $privacy_policy_string . "<input type='hidden' name='wp_capture_action' value='1' />", $formhtml );

	return $formhtml;
}


/**
 * GDPR Process.
 * 
 * Checks if the user has ticked the checkbox. If not, we throw them back.
 *
 * @return void
 */
function wp_email_capture_gdpr_process() {

	$starturl = esc_url( $_SERVER['HTTP_REFERER'] );
	$acceptprivacypolicy = FALSE;

	if ( get_option( 'wp_email_capture_enable_gdpr' ) ) {


		if ( array_key_exists( 'wp-email-capture-accept-privacy-policy', $_POST ) ) {

			$acceptprivacypolicy = $_POST[ 'wp-email-capture-accept-privacy-policy' ];

		}

		if ( ! $acceptprivacypolicy ) {

			if ( strpos( $starturl, '?' ) === false ) { $extrastring = "?"; } else { $extrastring = "&"; }

			$error = urlencode( __( 'Please Accept the Privacy Policy', 'wp-email-capture' ) );
			$url   = $starturl . $extrastring . 'wp_email_capture_error="' . $error;
			wp_redirect( $url );
			die();

		}

	}

}


/**
 * Delete records after a certain time
 *
 * @return void
 */
function wp_email_capture_gdpr_deletion() {

	if ( get_option( 'wp_email_capture_enable_gdpr' ) ) {

		$unit   = get_option( 'wp_email_capture_unit_for_privacy' );
		$number = get_option( 'wp_email_capture_number_for_privacy' );

		if ( $unit && $number > 0 ) {

			$timestring = strtotime( "-" . $number . " " . $unit );
			$mysqldate  = date( 'Y-m-d H:i:s', $timestring );

			global $wpdb;

			$delete_gdpr_temp_sql = 'DELETE FROM ' . WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE . " WHERE date < '%s'";
			$delete_gdpr_main_sql = 'DELETE FROM ' . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE . " WHERE date < '%s'";

			$delete_gdpr      = $wpdb->query( $wpdb->prepare( $delete_gdpr_main_sql, $mysqldate ) );
			$delete_gdpr_temp = $wpdb->query( $wpdb->prepare( $delete_gdpr_temp_sql, $mysqldate ) );

		}
	}
}



/**
 * Create the hourly filter
 *
 * @return void
 */
function wp_email_capture_gdpr_activation() {
	if ( ! wp_next_scheduled( 'wp_email_capture_hourly' ) ) {
		wp_schedule_event( time(), 'hourly', 'wp_email_capture_hourly' );
	}
}


/**
 * Add the GDPR page to WP Email Capture
 * @depreciated 3.5
 * @return void
 */
/* function wp_email_capture_add_gdpr_page() {
	add_submenu_page( 'wpemailcapture', __( 'GDPR' ), __( 'GDPR', 'wp-email-capture' ), 'activate_plugins', 'wpemailcapturegdprsettings', 'wp_email_capture_gdpr_options' );
} */

/**
 * Options page for GDPR
 * @depreciated 3.5
 * @return void
 */
/* function wp_email_capture_gdpr_options() {

	?>
	<div class="wrap">

			<h1><?php _e( 'GDPR Data Checker', 'wp-email-capture' ); ?></h1>

			<?php

			if ( isset( $_POST['wp_email_capture_deleteid'] ) ) {

				$wpemaildeleteid = esc_attr( $_POST['wp_email_capture_deleteid'] );
				$table           = esc_attr( $_POST[ 'wp_email_capture_deletefromtable' ] );
				wp_email_capture_deleteid( $wpemaildeleteid, $table );
				?>

				<div class="notice notice-success is-dismissible">
					<p><?php echo sprintf( __( 'Data from row ID %s have been deleted', 'wp-email-capture' ), $wpemaildeleteid ); ?></p>
				</div>
	
			<?php
			} 
			?>
			<div class="about-text">
				<?php _e( 'Please enter in the box below the email address you want to check if you have any data on.', 'wp-email-capture' ); ?><br/>
			</div>

			<form method="post" action="<?php esc_url( $_SERVER['REQUEST_URI'] ); ?>">

				<input name="wp_email_capture_gdpr_email" type="text" /> <?php submit_button( __('Check for email address', 'wp-email-capture' ) ); ?>

			</form>

			<?php

			if ( array_key_exists( 'wp_email_capture_gdpr_email', $_POST ) ) {

				$email = esc_attr( $_POST['wp_email_capture_gdpr_email'] );

				?>
				<h2><?php echo sprintf( __( 'Results for %s', 'wp-email-capture' ), $email ) ?></h1>
				<?php

				$emaildatatemp = wp_email_capture_get_data_from_email_temp( $email );
				$emaildatamain = wp_email_capture_get_data_from_email_main( $email );

				if ( !empty( $emaildatatemp ) || !empty( $emaildatamain ) ) {

					$tempdata = array(
						WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE => $emaildatamain,
						WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE => $emaildatatemp
					);

					foreach ( $tempdata as $table => $results ) {
						if (!empty( $results ) ) {

							echo wp_email_capture_print_gdpr_data_table( $table, $results );

						}
					}

				} else {

					echo '<p>' . sprintf( __( 'We hold no data for the email address %s', 'wp-email-capture' ), $email ) . '</p>'; 

				}
			}
			?>
		</div>
	<?php
} */


/**
 * Add Privacy Policy Content to WP Email Capture
 *
 * @return void
 */
function wp_email_capture_add_privacy_policy_content() {

	if ( ! function_exists( 'wp_add_privacy_policy_content' ) ) {
		return;
	}

	$addedstring = '';

	if ( get_option( 'wp_email_capture_number_for_privacy' ) ) {
		$number        = get_option( 'wp_email_capture_number_for_privacy' );
		$unit          = get_option( 'wp_email_capture_unit_for_privacy' );
		$addedstring   = sprintf( __( '
		
		We hold this data for a maximum of %s %s, at which point it is deleted.', 'wp-email-capture' ), $number, $unit );
	}

	$content = __( 'We use a WordPress plugin called WP Email Capture to aid management of our email marketing list. Should you wish to subscribe to our newsletter, we collect the following data:-
 
		Your Name (or what you chose to address yourself as). This is used for simple personalisation purposes.

		Your Email Address. This is used to contact you and include you in our newsletter.
		
		The date of signup. This is so we can reference when to delete your data at a later date.',

	'wp-email-capture' ) . $addedstring;

	wp_add_privacy_policy_content(
		'WP Email Capture',
		wp_kses_post( wpautop( $content, false ) )
	);
}


/**
 * This function links into the GDPR exporter, meaning we can begin to export registered today.
 *
 * @param  string  $email_address The email address we are looking for.
 * @param  integer $page          The page of data we are grabbing.
 * @return array                  An array of data we will need to find.
 */
function wp_email_capture_plugin_exporter( $email_address, $page = 1 ) {

	$number = 500; // Limit us to avoid timing out
	$page   = (int) $page;

	$export_items       = array();
	$emaildatatocheck[] = wp_email_capture_get_data_from_email_temp( $email_address );
	$emaildatatocheck[] = wp_email_capture_get_data_from_email_main( $email_address );
	$x                  = '';

	foreach ( $emaildatatocheck as $emaildatatemp ) {

		$datatocheck = array();
		$columns     = get_object_vars( $emaildatatemp[0] );

		foreach ( $columns as $column => $value ) {
			$datatocheck[] = $column;
		}

		foreach ( (array) $emaildatatemp as $emaildata ) {

			$x++;

			$item_id = "wp-email-capture-{$emaildata->id}";

			// Core group IDs include 'comments', 'posts', etc.
			// But you can add your own group IDs as needed
			$group_id = 'emailcapture';

			// Optional group label. Core provides these for core groups.
			// If you define your own group, the first exporter to
			// include a label will be used as the group label in the
			// final exported report
			$group_label = __( 'WP Email Capture Data' );

			$data = array();

			// Plugins can add as many items in the item data array as they want
			foreach ( $datatocheck as $header ) {

				$data[] = array(
					'name'  => $header,
					'value' => $emaildata->$header,
				);

			}

			$export_items[] = array(
				'group_id'    => $group_id,
				'group_label' => $group_label,
				'item_id'     => $item_id,
				'data'        => $data,
			);
		}
	}

	$done = $x < $number;
	return array(
		'data' => $export_items,
		'done' => $done,
	);

}


/**
 * Hook function adding the wp-email-capture array to the GDPR friendly plugin exporter.
 *
 * @param  array $exporters All current Exporters
 * @return array            All exporters plus the WP Email Capture one.
 */
function wp_email_capture_register_plugin_exporter( $exporters ) {
	$exporters['wp-email-capture'] = array(
		'exporter_friendly_name' => __( 'WP Email Capture' ),
		'callback'               => 'wp_email_capture_plugin_exporter',
	);
	return $exporters;
}


/**
 * WP Email Capture Eraser function.
 * 
 * Removes all data from the WP Email Capture tables.
 *
 * @param  string  $email_address The email address we are looking to erase.
 * @param  integer $page          The page we are looking for.
 * @return array                  Array containing data on how successful the erasure process has been.
 */
function wp_email_capture_plugin_eraser( $email_address, $page = 1 ) {

	$number        = 500; // Limit us to avoid timing out
	$page          = (int) $page;
	$items_removed = false;
	$tabledata     = array( WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE, WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE );

	global $wpdb;

	foreach ( $tabledata as $table ) {

		//$delete_member_sql = "DELETE FROM $table WHERE email = '%s'";
		$querysuccessful = $wpdb->delete( $table, array( 'email' => $email_address ), array( '%s' ) );

		if ( false !== $querysuccessful && true !== $items_removed ) {
			$items_removed = true;
			$rowsremoved   = $rowsremoved + $querysuccessful;
		}
	}

	// Tell core if we have more comments to work on still
	$done = $querysuccessful < $number;

	return array( 
		'items_removed'  => $items_removed,
		'items_retained' => false, // always false in this example
		'messages'       => array(), // no messages in this example
		'done'           => $done,
	);
}


/**
 * Register the Plugin Eraser for WP Email Capture
 *
 * @param  array     $erasers     All erasers.
 * @return array     $erasers     All erasers with the WP Email Capture one.
 */
function wp_email_capture_register_plugin_eraser( $erasers ) {
	$erasers['wp-email-capture'] = array(
		'eraser_friendly_name' => __( 'WP Email Capture' ),
		'callback'             => 'wp_email_capture_plugin_eraser',
	);

	return $erasers;
}
