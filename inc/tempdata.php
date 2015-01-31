<?php

/**
 * Delete the members in the tempoarary members table.
 * @return void
 */
function wp_email_capture_truncate() {

	global $wpdb;

	$temp_members_table = $wpdb->prefix . "wp_email_capture_temp_members";

   	$truncate_temp_sql = "TRUNCATE " . $temp_members_table;

	$truncated_table = $wpdb->query($truncate_temp_sql);

}

/**
 * Delete the members of the registered members table.
 * @return void
 */
function wp_email_capture_delete() {

	global $wpdb;

	$registered_members_table = $wpdb->prefix . "wp_email_capture_registered_members";

   	$truncate_registered_sql = "TRUNCATE " . $registered_members_table;

	$truncated_registered = $wpdb->query($truncate_registered_sql);

}

/**
 * Count the members in the temporary members table.
 * @return int 	The number of members in the tempoarary members table.
 */
function wp_email_capture_count_temp() {

	global $wpdb;

	$temp_members_table = $wpdb->prefix . "wp_email_capture_temp_members";

	$count_temp_sql = 'SELECT COUNT(*)

	FROM '. $temp_members_table;

	$temp_members = $wpdb->get_var($count_temp_sql);

	return $temp_members;

}

?>