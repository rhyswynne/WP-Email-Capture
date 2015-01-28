<?php





function wp_email_capture_export()

{

	global $wpdb;
    $delimeter = get_option('wp_email_capture_name_delimeter');
    if (!$delimeter)
    {
        $delimeter = ",";
    }
	$csv_output = "";

	$csv_output .= __('Name','WPEC').$delimeter.__('Email','WPEC');

	$csv_output .= "\n";



	 

   	$table_name = $wpdb->prefix . "wp_email_capture_registered_members";

   	$sql = "SELECT name, email FROM " . $table_name;

   	$results = $wpdb->get_results($sql);

 	foreach ($results as $result) {

		$csv_output .= $result->name .$delimeter. $result->email ."\n";

	}


    $file = 'WP_Email_Capture';
	$filename = $file."_".date("Y-m-d_H-i",time());

	header("Content-type: application/vnd.ms-excel");

	header("Content-disposition: csv" . date("Y-m-d") . ".csv");

	header( "Content-disposition: filename=".$filename.".csv");

	print $csv_output;

	exit;

}



?>