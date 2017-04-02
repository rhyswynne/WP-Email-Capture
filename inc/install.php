<?php

/**
 * Set up the WP Email Capture Database Tables.
 * 
 * @return void
 */
function wp_email_capture_install() {

	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();

	global $wp_email_capture_db_version;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$registered_members_table = WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;
	$temp_members_table_name = WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE;

	$create_registered_members_table_sql = 
	"CREATE TABLE {$registered_members_table} (
	id INT( 255 ) NOT NULL AUTO_INCREMENT ,
	name TINYTEXT NOT NULL ,
	email TEXT NOT NULL ,
	UNIQUE KEY   (id)) $charset_collate ;";

	dbDelta( $create_registered_members_table_sql );

	$create_temp_members_table_sql = 
	"CREATE TABLE {$temp_members_table_name} ( 
	id INT( 255 ) NOT NULL AUTO_INCREMENT ,
	name TINYTEXT NOT NULL ,
	email TEXT NOT NULL ,
	confirm_code TEXT NOT NULL ,
	date DATETIME NOT NULL , 
	UNIQUE KEY id (id)) $charset_collate;";

	dbDelta( $create_temp_members_table_sql );

	update_option( "wp_email_capture_db_version", $wp_email_capture_db_version );

	$from = get_option('admin_email');
	add_option( 'wp_email_capture_from', $from );

}


/**
 * Upgrade the database to the latest free one if needed.
 * 
 * @return void
 */
function wp_email_capture_database_upgdrade() {

	global $wp_email_capture_db_version;

	if ( get_site_option( 'wp_email_capture_db_version' ) != $wp_email_capture_db_version ) {
		wp_email_capture_install();
	}

}

?>