<?php 



function wp_email_capture_writetable($limit = 0, $header = '')

{

   global $wpdb;

   $table_name = $wpdb->prefix . "wp_email_capture_registered_members";

   $sql = "SELECT id, name, email FROM " . $table_name;

	if ($limit != 0) {

	$sql .= " ORDER BY id DESC LIMIT 3"; 

	}

  $results = $wpdb->get_results($sql);



	if ($header == '') {

	$header = "<h3>".__('Members','WPEC')."</h3>";

	}

	echo $header;

?> 

<table border="0">

<tr><td><strong><?php _e('Name','WPEC'); ?></strong></td><td colspan="2"><strong><?php _e('Email','WPEC'); ?></strong></td></tr>

<?php foreach ($results as $result) {
    if ($limit == 0) {
    $delid = wp_email_capture_formdelete($result->id, $result->email);
    } else {
    $delid = '';
    }
	echo "<tr><td style='width: 300px;'>" . $result->name ."</td><td style='width: 300px;'>" . $result->email ."</td><td style='width: 300px;'>
	". $delid ."</td>

	</tr>";

}

 ?>

</table>

<?php 

}


function wp_email_capture_formdelete($id, $email)
{
	return "<form action='" . esc_url($_SERVER['REQUEST_URI']) . "#list' method='post'>
	   <input type='hidden' name='wp_email_capture_deleteid' value='". $id."' />
	   <input type='submit' value='".__('Delete ','WPEC'). $email ."' style='width: 300px;' class='button' />
	   </form>"; 
}

function wp_email_capture_deleteid($id)
{
	global $wpdb;
	
 	$table_name = $wpdb->prefix . "wp_email_capture_registered_members";
	
	$sql = "DELETE FROM " . $table_name . " WHERE id = '%d'";

  	$result = $wpdb->query($wpdb->prepare($sql,$id));

}
?>