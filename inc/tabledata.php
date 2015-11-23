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

	echo $tabletoshow .= $header;

	$tabletoshow .= '

	<table border="0">

	<tr><td><strong>' . __( 'Name', 'wp-email-capture' ) . '</strong></td><td colspan="2"><strong>' . __( 'Email', 'wp-email-capture' ) . '</strong></td></tr>';


	foreach ( $registered_members as $member ) {

		if ( $limit == 0 ) {

			$delid = wp_email_capture_formdelete( $member->id, $member->email );

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
 * @param  int 		$id    the email address ID in the database the database.
 * @param  string 	$email The email address
 * @return void
 */
function wp_email_capture_formdelete( $id, $email ) {
	return "<form action='" . esc_url( $_SERVER['REQUEST_URI'] ) . "#list' method='post'>
	<input type='hidden' name='wp_email_capture_deleteid' value='". $id."' />
	<input type='submit' value='".__( 'Delete ', 'wp-email-capture' ). $email ."' style='width: 300px;' class='button' />
	</form>";
}


/**
 * Delete a member from the database.
 * @param  int 		$id The database ID to delete
 * @return void
 */
function wp_email_capture_deleteid( $id ) {
	global $wpdb;

	$delete_member_sql = "DELETE FROM " . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE . " WHERE id = '%d'";

	$delete_member = $wpdb->query( $wpdb->prepare( $delete_member_sql, $id ) );

	/**
	 * Action to add on extra things on deleted ID.
	 */
	do_action( 'wp_email_capture_after_delete_email_address', $id );

}
?>
