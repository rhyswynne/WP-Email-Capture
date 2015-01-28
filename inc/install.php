<?php 



function wp_email_capture_install() {

   global $wpdb;

   global $wp_email_capture_db_version;

   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

   $table_name = $wpdb->prefix . "wp_email_capture_registered_members";

   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

      

      $sql = "CREATE TABLE " . $table_name . " (

	 	id INT( 255 ) NOT NULL AUTO_INCREMENT ,

		name TINYTEXT NOT NULL ,

		email TEXT NOT NULL ,

		PRIMARY KEY (id)

	);";

	dbDelta($sql);

	}

   $table_name = $wpdb->prefix . "wp_email_capture_temp_members";

   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

      

      $sql = "CREATE TABLE " . $table_name . " (

	  id INT( 255 ) NOT NULL AUTO_INCREMENT ,

		name TINYTEXT NOT NULL ,

		email TEXT NOT NULL ,

	

	  confirm_code TEXT NOT NULL,

	  PRIMARY KEY (id)

	);";

	

	dbDelta($sql);

	



	}
    $from =  get_option('admin_email');
	add_option('wp_email_capture_link', 1);
    add_option('wp_email_capture_from',$from);
	add_option("wp_email_capture_db_version", $wp_email_capture_db_version);

}



?>