<?php

/**
 * Set up the WP Email Capture Database Tables.
 * 
 * @return void
 */
function wp_email_capture_install() {

	global $wpdb;

	global $wp_email_capture_db_version;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$registered_members_table = WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;

	if ( $wpdb->get_var( "show tables like '$registered_members_table'" ) != $registered_members_table ) {

		$create_registered_members_table_sql = "

		CREATE TABLE " . $registered_members_table . " (

			id INT( 255 ) NOT NULL AUTO_INCREMENT ,

			name TINYTEXT NOT NULL ,

			email TEXT NOT NULL ,

			PRIMARY KEY (id)

			);";

		dbDelta( $create_registered_members_table_sql );

	}

	$temp_members_table_name = WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE;

	if ( $wpdb->get_var( "show tables like '$temp_members_table_name'" ) != $temp_members_table_name ) {

		$create_temp_members_table_sql = "

		CREATE TABLE " . $temp_members_table_name . " (

			id INT( 255 ) NOT NULL AUTO_INCREMENT ,

			name TINYTEXT NOT NULL ,

			email TEXT NOT NULL ,

			confirm_code TEXT NOT NULL,

			PRIMARY KEY (id)

		);";

		dbDelta( $create_temp_members_table_sql );

	}

	$from =  get_option( 'admin_email' );
	add_option( 'wp_email_capture_link', 1 );
	add_option( 'wp_email_capture_from', $from );
	add_option( "wp_email_capture_db_version", $wp_email_capture_db_version );

}



?>
