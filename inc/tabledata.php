<?php


/**
 * Display a table showing the latest members
 * @param  int 		$limit  The amount of rows to show (default all)
 * @param  string  	$header the header text of the table
 * @return void
 */
function wp_email_capture_writetable( $limit = 0, $header = '' ) {

	global $wpdb;

	$registered_members_table = WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;

	$get_registered_members_sql = "SELECT id, name, email FROM " . $registered_members_table;

	if ( $limit != 0 ) {

		$get_registered_members_sql .= " ORDER BY id DESC LIMIT 3";

	}

	$registered_members = $wpdb->get_results( $get_registered_members_sql );

	$tabletoshow = "";

	if ( $header == '' ) {

		$header = "<h3>".__( 'Members', 'wp-email-capture' )."</h3>";

	}

	$tabletoshow .= $header;

	$tabletoshow .= '

	<table border="0">

	<tr><td><strong>' . __( 'Name', 'wp-email-capture' ) . '</strong></td><td colspan="2"><strong>' . __( 'Email', 'wp-email-capture' ) . '</strong></td></tr>';


	foreach ( $registered_members as $member ) {

		if ( $limit == 0 ) {

			$delid = wp_email_capture_formdelete( $member->id, $member->email, 'width:300px;' );

		} else {

			$delid = '';

		}

		$tabletoshow .= '<tr><td style="width: 300px;">' . $member->name . '</td><td style="width: 300px;">' . $member->email . '</td><td style="width: 300px;">'
		. $delid . '</td></tr>';

	}

	$tabletoshow .= '</table>';

	$tabletoshow = apply_filters( 'wp_email_capture_display_table', $tabletoshow );

	echo $tabletoshow;

}


/**
 * The form to delete members from the database
 * @param  int 		$id           the email address ID in the database the database.
 * @param  string 	$email        Optional, the email address for deletion. Will be used for display only
 * @param  string   $style        Optional, Any styling you wish to add to the button
 * @param  string   $table        Optional, the table to delete the data from.
 * @param  array    $hiddenvalues Optional, extra values to be hidden within the form
 * @return void
 */
function wp_email_capture_formdelete( $id, $email = '', $style = '', $table = '', $hiddenvalues = array() ) {
	$formdelete = "<form action='" . esc_url( $_SERVER['REQUEST_URI'] ) . "#list' method='post'>
	<input type='hidden' name='wp_email_capture_deleteid' value='". $id . "' />";

	if ( $table ) {
		$formdelete .= "<input type='hidden' name='wp_email_capture_deletefromtable' value='" . $table . "' />";
	}

	if ( !empty( $hiddenvalues ) ) {

		foreach ($hiddenvalues as $key => $value) {
			$formdelete .= "<input type='hidden' name='" . $key . "' value='" . $value . "' />";
		}

	}

	$formdelete .= "<input type='submit' value='" . __( 'Delete ', 'wp-email-capture' ) . $email . "' style='" . $style . "' class='button' />";
	$formdelete .= wp_nonce_field( 'delete_id_' . $id , 'wp_email_capture_delete_individual_nonce', true, false );
	$formdelete .= '</form>';

	return $formdelete;
}


/**
 * Delete a member from the database.
 * @param  int 		$id     The database ID to delete
 * @param  string   $table  Optional. The table we are deleting table from.
 * @return void
 */
function wp_email_capture_deleteid( $id, $table = WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE ) {
	global $wpdb;

	$delete_member_sql = "DELETE FROM $table WHERE id = '%d'";

	$delete_member = $wpdb->query( $wpdb->prepare( $delete_member_sql, $id ) );

	/**
	 * Action to add on extra things on deleted ID.
	 */
	do_action( 'wp_email_capture_after_delete_email_address', $id );

}