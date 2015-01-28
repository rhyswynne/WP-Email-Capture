<?php

function wp_email_capture_truncate()

{

	global $wpdb;

	$table_name = $wpdb->prefix . "wp_email_capture_temp_members";

   	$sql = "TRUNCATE " . $table_name;

	$result = $wpdb->query($sql);

}

function wp_email_capture_delete()

{

	global $wpdb;

	$table_name = $wpdb->prefix . "wp_email_capture_registered_members";

   	$sql = "TRUNCATE " . $table_name;

	$result = $wpdb->query($sql);

}


function wp_email_capture_count_temp()

{

	global $wpdb;

	$table_name = $wpdb->prefix . "wp_email_capture_temp_members";

	$sql = 'SELECT COUNT(*)

	FROM '. $table_name;


	$result = $wpdb->get_var($sql);

	return $result;

}

?>