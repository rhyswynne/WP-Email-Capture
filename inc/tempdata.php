<?php


/**
 * Delete the members in the tempoarary members table.
 * @return void
 */
function wp_email_capture_truncate() {

	global $wpdb;

   	$truncate_temp_sql = "TRUNCATE " . WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE;

	$truncated_table = $wpdb->query($truncate_temp_sql);

}


/**
 * Delete the members of the registered members table.
 * @return void
 */
function wp_email_capture_delete() {

	global $wpdb;

   	$truncate_registered_sql = "TRUNCATE " . WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE;

	$truncated_registered = $wpdb->query($truncate_registered_sql);

}


/**
 * Count the members in the temporary members table.
 * @return int 	The number of members in the tempoarary members table.
 */
function wp_email_capture_count_temp() {

	global $wpdb;

	$count_temp_sql = 'SELECT COUNT(*)

	FROM '. WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE;

	$temp_members = $wpdb->get_var($count_temp_sql);

	return $temp_members;

}

?>