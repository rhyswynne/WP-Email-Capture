<?php 

function wp_email_capture_sanitize($string)
{

	$string = esc_attr($string);

	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

	return $string;

}



function wp_email_capture_checkIfPresent($email){

	global $wpdb;

	$table_name = $wpdb->prefix . "wp_email_capture_registered_members";

	$sql = 'SELECT COUNT(*)

	FROM '. $table_name . ' WHERE email = "%s"';
	
	$prep = $wpdb->prepare($sql,$email);

	$result = $wpdb->get_var($prep);
	
  	if($result > 0)

  	{

  		return true;

  	}else{

  	return false;

  }

}



function wp_email_capture_admin_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
    if (!get_user_meta($user_id, 'example_ignore_notice')) {
        if (get_option('wp_email_capture_signup')=="" || get_option('wp_email_capture_redirection')=="") {
        echo '<div class="error"><p>';
        printf(__('<strong>Please Note: </strong> You have not created a subscription page, confirmation page or both in WP Email Capture, please go to the WP Email Capture Settings Page to add them. | <a href="%1$s">Hide Notice</a>'), '?wp_email_capture_nag_ignore=0');
        echo "</p></div>";
    
        }    
    }
}

function wp_email_capture_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['wp_email_capture_nag_ignore']) && '0' == $_GET['wp_email_capture_nag_ignore'] ) {
             add_user_meta($user_id, 'wp_email_capture_ignore_notice', 'true', true);
    }
}

function wp_email_capture_fetch_rss_feed() {
    include_once(ABSPATH . WPINC . '/feed.php');
	$rss = fetch_feed("http://wpemailcapture.com/feed?cat=-4");
			
	if ( is_wp_error($rss) ) { return false; }
			
	$rss_items = $rss->get_items(0, 5);
    
    return $rss_items;

}


?>