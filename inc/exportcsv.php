<?php

function wp_email_capture_export() {


	global $wpdb;
	$delimeter = get_option( 'wp_email_capture_name_delimeter' );

	if ( !$delimeter ) {
		$delimeter = ",";
	}

	$csv_output = "";
	$csv_output .= __( 'Name', 'WPEC' ). $delimeter .__( 'Email', 'WPEC' );
	$csv_output .= "\n";

	$registered_members_sql = apply_filters( 'wpec_change_export_sql', "SELECT name, email FROM " . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE );

	$registered_members = $wpdb->get_results( $registered_members_sql );

	foreach ( $registered_members as $member ) {

		$csv_output .= $member->name .$delimeter. $member->email ."\n";

	}


	$file_prefix = 'WP_Email_Capture';
	$filename = apply_filters( 'wpec_change_csv_filename', $file_prefix."_".date( "Y-m-d_H-i", time() ));

	header( "Content-type: application/vnd.ms-excel" );

	header( "Content-disposition: csv" . date( "Y-m-d" ) . ".csv" );

	header( "Content-disposition: filename=".$filename.".csv" );

	print $csv_output;

	exit;

}



?>
