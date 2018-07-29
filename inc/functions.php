<?php

/* function wp_email_capture_sanitize($string)
{

  $string = esc_attr($string);

  $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

  return $string;

}
*/

/**
 * Check if the email is already present in the list.
 * 
 * @param  string $email The email address to check
 * @return boolean       TRUE if the email is present, FALSE if not.
 */
function wp_email_capture_checkIfPresent( $email ) {

	global $wpdb;

	$get_email = '
	SELECT      COUNT(*)
	FROM    ' . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE . ' 
	WHERE       email = "%s"';

	$prepared_get_email = $wpdb->prepare( $get_email, $email );

	$number_of_email_instances = $wpdb->get_var( $prepared_get_email );

	if ( $number_of_email_instances > 0 ) {

		return true;

	} else {

		return false;

	}

}


/**
 * Add admin notices:-
 *
 * If the user tracking option isn't present, asks the user to set it.
 *
 * If the user hasn't set up WP Email Capture, encourage it.
 * 
 * @return void
 */
function wp_email_capture_admin_notice() {

	/* Check Tracking First */
	if ( !get_option( 'wpec_set_tracking' ) && current_user_can('activate_plugins') ) {
		echo '<div class="updated">';
		echo '<h4>';
		_e( 'Allow Tracking?', 'wp-email-capture' );
		echo '</h4>';
		echo '<p>';
		_e( 'Thank you for installing WP Email Capture. Please help us improve by allowing us to gather anonymous usage stats such as themes and plugins used on your site, to help us test.','wp-email-capture');
		echo '</p>';
		printf ( __('<p><a href="%1$s" class="button-primary">Allow Tracking</a> <a href="%2$s" class="button-secondary">Do Not Allow Tracking</a></p>', 'wp-email-capture' ), '?wp_email_capture_tracking=1', '?wp_email_capture_tracking=2' );
		echo '</div>';
	} else {
		global $current_user ;
		$user_id = $current_user->ID;
		/* Check that the user hasn't already clicked to ignore the message */
		if ( !get_user_meta( $user_id, 'wp_email_capture_setup_ignore' ) ) {
			if ( get_option( 'wp_email_capture_signup' ) == "" || get_option( 'wp_email_capture_redirection' ) == "" ) {
				echo '<div class="error"><p>';
				printf( __( '<strong>Please Note: </strong> You have not created a subscription page, confirmation page or both in WP Email Capture, please go to the WP Email Capture Settings Page to add them. | <a href="%1$s">Hide Notice</a>' ), '?wp_email_capture_setup_ignore=0' );
				echo "</p></div>";
			}
		}
	}
}


/**
 * If the user has over 500 emails, try to upsell.
 * 
 * @return void
 */
function wp_email_capture_admin_upsell() {
	global $current_user;
	$user_id = $current_user->ID;
	$infourl = "https://www.wpemailcapture.com/premium/?utm_source=upsellinfo&utm_medium=plugin&utm_campaign=wpemailcapture";
	$upgradeurl = "https://www.wpemailcapture.com/checkout/?edd_action=add_to_cart&download_id=802&discount=BIGLISTUPGRADE&utm_source=upsell&utm_medium=plugin&utm_campaign=wpemailcapture";
	$discountcode = "BIGLISTUPGRADE";
	$discountamount = "15%";
	/* Check that the user hasn't already clicked to ignore the message */

	if ( !get_user_meta( $user_id, 'wp_email_capture_upsell_ignore' ) ) {
		if ( 500 < wp_email_capture_get_number_of_registered_users() ) {
			echo '<div class="updated welcome-panel" style="padding: 23px 10px 0;">';
			printf( __( '<a href="%1$s" class="welcome-panel-close">Hide Notice</a>
				<div class="welcome-panel-content">
					<h3>WP Email Capture - Over 500 Emails</h3>
					<p>WP Email Capture has over 500 entries. Whilst the plugin is free for use forever, it does struggle a bit with very large lists.</p>
					<p>WP Email Caputre Premium is better suited to large lists, so please consider upgrading. As a thank you for using us for so long, use discount code <strong>%3$s</strong> for <strong>%4$s</strong> off.</p>
					<p><a href="%2$s" class="button button-primary button-hero"><strong>Upgrade WP Email Capture</strong></a><a href="%5$s" class="button button-secondary button-hero"><strong>More Info</strong></a></p></div>' ), '?wp_email_capture_upsell_ignore=0', $upgradeurl, $discountcode, $discountamount, $infourl );
			echo "</div>";
		}
	}
}


/**
 * If the user clicks "Dismiss Notice", we hide the notice for that user.
 * @return void
 */
function wp_email_capture_nag_ignore() {

	global $current_user;
	$user_id = $current_user->ID;

	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['wp_email_capture_setup_ignore'] ) && '0' == $_GET['wp_email_capture_setup_ignore'] ) {
		update_user_meta( $user_id, 'wp_email_capture_setup_ignore', 'true', true );
	}

	if ( isset( $_GET['wp_email_capture_upsell_ignore'] ) && '0' == $_GET['wp_email_capture_upsell_ignore'] ) {
		update_user_meta( $user_id, 'wp_email_capture_upsell_ignore', 'true', true );
	}

	if ( isset( $_GET[ 'wp_email_capture_tracking' ] ) ) {
		update_option( 'wpec_set_tracking', $_GET['wp_email_capture_tracking'] );
	}
}


/**
 * Fetch the WP Email Capture RSS Feed
 * 
 * @return mixed  		RSS object should the feed return correctly, FALSE if not.
 */
function wp_email_capture_fetch_rss_feed() {

	include_once ABSPATH . WPINC . '/feed.php';
	$rss = fetch_feed( "https://www.wpemailcapture.com/feed?cat=-4" );

	if ( is_wp_error( $rss ) ) { return false; }

	$rss_items = $rss->get_items( 0, 5 );

	return $rss_items;

}


/**
 * Get the number of registered valid email addresses.
 * 
 * @return int 		The Number of Registered users.
 */
function wp_email_capture_get_number_of_registered_users() {
	$registered_members_table = WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;
	global $wpdb;
	$get_number_of_regs_sql = '
	SELECT 		COUNT(*) 
	FROM 	' . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;

	$get_number_of_regs = $wpdb->get_var( $get_number_of_regs_sql );

	return $get_number_of_regs;

}


/**
 * Get the last date of temporary emails.
 * 
 * @return mixed 		the last date of signup if known. False if not.
 */ 
function wp_email_capture_get_last_singup_date() {

	global $wpdb;
	$get_last_date_sql = '
	SELECT 		`date` 
	FROM 	' . WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE . '
	ORDER BY 	`date` DESC
	LIMIT 		1';

	$get_last_date = $wpdb->get_var( $get_last_date_sql );

	if ( $get_last_date != '0000-00-00 00:00:00') {
		return $get_last_date;
	} else {
		return false;
	}

}


/**
 * Set the email type to text/html
 * @return string "text/html"
 */
function wp_email_capture_set_html_mail_content_type() {
	return 'text/html';
}


/**
 * Set the email type to text/plain
 *
 * Happens after sending an email.
 *
 * - DEPRECATED 3.3 -
 * 
 * @return string "text/plain"
 */
function wp_email_capture_set_plain_content_type() {
	return 'text/plain';
}


/**
 * Set email to HTML, if you wish to.
 * 
 * @return void
 */
function wp_email_capture_set_email_to_html() {

	if ( 1 == get_option( 'wp_email_capture_send_email_html' ) ) {
		add_filter( 'wp_mail_content_type', 'wp_email_capture_set_html_mail_content_type' );
	}
	
} 


/**
 * Return email to standard email.
 * 
 * @return void
 */
function wp_email_capture_set_email_to_plain() {
	if ( has_filter( 'wp_mail_content_type', 'wp_email_capture_set_html_mail_content_type' ) ) {
		if ( 1 == get_option( 'wp_email_capture_send_email_html' ) ) {
			remove_filter( 'wp_mail_content_type', 'wp_email_capture_set_html_mail_content_type' );
		}
	}
}


/**
 * Check if we have the premium version installed
 * 
 * @return boolean
 */
function wp_email_capture_is_premium() {
	if ( function_exists( 'wp_email_capture_premium_plugins_loaded' ) ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Get temproart data from an email address 
 *
 * @param  string $email The email address we are using.
 * @return mixed         The data we have to collect, false if no data.
 */
function wp_email_capture_get_data_from_email_temp( $email ) {

	global $wpdb;

	$select_gdpr_temp_sql = 'SELECT * FROM ' . WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE . " WHERE email = '%s'";

	$select_gdpr_array = $wpdb->get_results( $wpdb->prepare( $select_gdpr_temp_sql, $email ) );

	return $select_gdpr_array;

}

/**
 * Get temproart data from an email address 
 *
 * @param  string $email The email address we are using.
 * @return mixed         The data we have to collect.
 */
function wp_email_capture_get_data_from_email_main( $email ) {

	global $wpdb;

	$select_gdpr_main_sql = 'SELECT * FROM ' . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE . " WHERE email = '%s'";

	$select_gdpr_array = $wpdb->get_results( $wpdb->prepare( $select_gdpr_main_sql, $email ) );

	return $select_gdpr_array;
}


/**
 * Check If MySQL version is 5.6, if not we fire a warning
 *
 * @return void
 */
function wp_email_capture_mysql_upsell() {

	$hostingurl = 'https://www.wpemailcapture.com/wp-email-capture-premium-compatible-products/?utm_source=mysqlhelp&utm_medium=plugin&utm_campaign=wpemailcapture#hosting';

	if ( ! get_option( 'dismissed-wp_email_capture_mysql_deprecated', false ) ) {

		if ( ! wp_email_capture_check_db_version() ) {

			printf( __( '<div class="notice notice-error notice-wp-email-mysql is-dismissible"  data-notice="wp_email_capture_mysql_deprecated">
					<h3>WP Email Capture - MySQL version 5.6 and above needed</h3>
					<p>Thank you for installing WP Email Capture. I really appreciate it. However you have an out of date version of MySQL on your site. <strong>WP Email Capture will not work</strong>.</p>
					<p>A minimum of MySQL 5.6 is needed for this plugin to work. Speak to your host to upgrade. Alternatively, you can contact any of these hosts we have found that work with WP Email Capture.</p>
					<p><a href="%2$s" class="button button-primary button-hero"><strong>View Hosting Recommendations</strong></a></p></div>' ), '?wp_email_capture_mysql_ignore=0', $hostingurl );

		}
	}
}


/**
 * Get the DB Version for the server. To see if it's valid.
 *
 * @return void
 */
function wp_email_capture_check_db_version() {

	global $wpdb;

	$mysql_server_type    = '';
	$mysql_server_version = '';

	if ( method_exists( $wpdb, 'db_version' ) ) {
		if ( $wpdb->use_mysqli ) {
			// phpcs:ignore WordPress.DB.RestrictedFunctions.mysql_mysqli_get_server_info
			$mysql_server_type = mysqli_get_server_info( $wpdb->dbh );
		} else {
			// phpcs:ignore WordPress.DB.RestrictedFunctions.mysql_mysql_get_server_info
			$mysql_server_type = mysql_get_server_info( $wpdb->dbh );
		}

		$mysql_server_version = $wpdb->get_var( 'SELECT VERSION()' );
	}

	if ( stristr( $mysql_server_type, 'mariadb' ) ) {
		$mariadb                        = true;
		$health_check_mysql_rec_version = '10.0';
		return true;
	}

	$mysql_min_version_check = version_compare( WP_EMAIL_MIN_MYSQL_VERSION, $mysql_server_version, '<=' );

	//set_transient( 'wp_email_capture_valid_version', $mysql_min_version_check, 14*24*HOUR_IN_SECONDS );

	return $mysql_min_version_check;

}




/**
 * AJAX handler to store the state of dismissible notices.
 */
function ajax_notice_handler() {
    // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
    $type = esc_attr( $_POST['type'] );
    // Store it in the options table
    update_option( 'dismissed-' . $type, TRUE );
} add_action( 'wp_ajax_dismissed_notice_handler', 'ajax_notice_handler' );

/**
 * Get the GDPR Data Table
 *
 * @depreciated 3.5
 * @param string $table   The table we are looking at, used to delete the data
 * @param array  $results The results already obtained
 * @return string 
 */
/* function wp_email_capture_print_gdpr_data_table( $table, $results ) {

	$tablestring = '<table class="widefat fixed" cellspacing="0">
    <thead>
    <tr>';

	// First we need to get all keys in the array.
	$columns     = get_object_vars( $results[0] );
	$datatocheck = array();
	$extravalues = array();

	if ( array_key_exists( 'wp_email_capture_gdpr_email', $_POST ) ) {

			$extravalues = array( 'wp_email_capture_gdpr_email' => esc_attr( $_POST['wp_email_capture_gdpr_email'] ) );

	}

	if ( $columns ) {
		foreach ( $columns as $column => $value ) {

			$tablestring  .= '<td>' . ucfirst( $column ) . '</td>';
			$datatocheck[] = $column;

		}

		$tablestring .= '<td>' . __( 'Delete', 'wp-email-capture' ) . '</td>';

	}

	$tablestring .= '</tr>';
	$tablestring .= '<tbody>';

	if ( $results ) {

		foreach ( $results as $result ) {

			$tablestring .= '<tr>';

			foreach ( $datatocheck as $keytoadd ) {

				$tablestring .= '<td>' . $result->$keytoadd . '</td>';

			}



			$tablestring .= '<td>' . wp_email_capture_formdelete( $result->id, '', '', $table, $extravalues ) . '</td>';

			$tablestring .= '</tr>';

		}

	}

	$tablestring .= '</tbody>';
	$tablestring .= '</table>';

	return $tablestring;
} */


