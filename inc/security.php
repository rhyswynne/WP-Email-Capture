<?php



/* Check for injection characters */

function wp_email_injection_chars($s = "") {

	return (stripos("\r", $s) || stripos("\n", $s) || stripos("%0a", $s) || stripos("%0d", $s)) ? TRUE : FALSE;

}





/* Make output safe for the browser */

function wp_email_capture_bsafe($input = "") {

	return htmlspecialchars(stripslashes($input));

}









function wp_email_stripslashes($s = "") {

	if (defined('TEMPLATEPATH') || (get_magic_quotes_gpc())) {

		return stripslashes($s);

	} else {

		return $s;

	}

}





function wp_email_injection_test($str = "") { 

	$tests = array("/bcc\:/i", "/Content\-Type\:/i", "/Mime\-Version\:/i", "/cc\:/i", "/from\:/i", "/to\:/i", "/Content\-Transfer\-Encoding\:/i"); 

	return preg_replace($tests, "", $str); 

} 



?>