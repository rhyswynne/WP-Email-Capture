<?php


/**
 * Wrapper function after the user submits an email address.
 *
 * Runs two actions, that can be overwritten if need be.
 * 
 * @return void
 */
function wp_email_capture_process() {

	do_action( 'wp_email_capture_set_wp_email_capture_email_settings' );

	if ( isset( $_REQUEST['wp_capture_action'] ) ) {
		
		do_action( 'wp_email_capture_signup_actions' );
		
	}

	if ( isset( $_GET['wp_email_confirm'] ) || isset( $_REQUEST['wp_email_confirm'] ) ) {
		
		do_action( 'wp_email_capture_confirm_actions' );

		//wp_capture_email_confirm();
	}

	do_action( 'wp_email_capture_set_normal_email_settings' );

}


/*
function wp_email_capture_double_check_everything($name, $email) {

	if (wp_email_injection_chars($name) || wp_email_injection_chars($email) || wp_email_injection_chars($name) || wp_email_injection_chars($email))

	{

		return FALSE;

	} else {

		return TRUE;
	}

} */


/**
 * Get the email submission form entry, validates it, adds it to the tempoaray database, 
 * and redirects user to the "Please check your email" page.
 * 
 * @return void
 */
function wp_email_capture_signup() {

	global $wpdb;

	// Random confirmation code

	$confirm_code=md5( uniqid( rand() ) );

	$name = esc_attr( $_REQUEST['wp-email-capture-name'] );
	$starturl = esc_url( $_SERVER['HTTP_REFERER'] );

	if ( strpos( $starturl, "?" ) === false ) { $extrastring = "?"; } else { $extrastring = "&"; }

	if ( get_option( "wp_email_capture_name_required" ) == 1 && $name == "" ) {
		
		$error = urlencode( __( 'Please Provide A Name', 'wp-email-capture' ) );
		$url =  $starturl . $extrastring . "wp_email_capture_error=" . $error;
		wp_redirect( $url );
		die();

	}

	$email = trim( esc_attr( $_REQUEST['wp-email-capture-email'] ) );

	if ( !is_email( $email ) ) {

		$error = urlencode( __( 'Not a valid email', 'wp-email-capture' ) );
		$url = $starturl . $extrastring . "wp_email_capture_error=" . $error;

		wp_redirect( $url );

		die();

	}

	$name = esc_attr( $name );
	$email = esc_attr( $email );

	$name = wp_email_injection_test( $name );
	$email = wp_email_injection_test( $email );

	$name = wp_email_stripslashes( $name );
	$email = wp_email_stripslashes( $email );

	do_action( 'wp_email_capture_extra_checks', $name, $email );

	$referrer = esc_url( $_SERVER['HTTP_REFERER'] );
	$ip = esc_attr( $_SERVER['REMOTE_ADDR'] );
	$date = date( "Y-m-d H-i" );


	if ( wp_email_capture_checkIfPresent( $email ) ) {

		$error = urlencode( __( 'User already present', 'wp-email-capture' ) );
		$url = $starturl . $extrastring . "wp_email_capture_error=" . $error;

		wp_redirect( $url );

		die();

	}

	$member_data = array( 'confirm_code' => $confirm_code, 'name' => $name, 'email' => $email, 'date' => $date );

	/**
	 * Filter whether we handle a new subscription.
	 *
	 * This allows other plugins to do subscriptions if desired.
	 *
	 * @param bool True for WP Email Capture subscription handling.
	 * @param array {
	 *      @type string $confirm_code
	 *      @type string $name
	 *      @type string $email
	 * }
	 */
	$do_subscription = apply_filters( 'wp_email_capture_do_subscription', true, $member_data );

	if ( !$do_subscription )
		return;

	// Insert data into database
	$insert_into_temp=$wpdb->insert( WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE, $member_data, array( '%s', '%s', '%s', '%s' ) );

	// if suceesfully inserted data into database, send confirmation link to email

	if ( $insert_into_temp ) {

		// ---------------- SEND MAIL FORM ----------------

		// send e-mail to ...

		$to = $email;
		$message = "";
		$siteurl = get_option( 'home' );
		$siteurl = trailingslashit( $siteurl );

		// Your subject
		$subject = "";
		$subject = get_option( 'wp_email_capture_subject' );

		if ( $subject == "" ) {
			$subject = __( "Sign Up For Our Newsletter", "wp-email-capture" );
		}

		// From
		$from = "";
		$from = get_option( 'wp_email_capture_from' );

		if ( $from == "" ) {
			$from =  get_option( 'admin_email' );
		}

		$fromname = "";
		$fromname = get_option( 'wp_email_capture_from_name' );
		
		if ( $from == "" ) {
			$fromname =  get_option( 'blogname' );
		}

		$contenttype = ( 1 == get_option( 'wp_email_capture_send_email_html' ) ) ? "text/html" : "text/plain";

		$header = "MIME-Version: 1.0\n" . "From: " . $fromname . " <" . $from . ">\n";
		$header .= "Content-Type: ". $contenttype . "; charset=\"" .  get_option( 'blog_charset' ) . "\"\n";
		
		// Your message
		$splitstring 	= ( 1 == get_option( 'wp_email_capture_send_email_html' ) ) ? "<br/>" : "\n";
		$htmlurl 		= ( 1 == get_option( 'wp_email_capture_send_email_html' ) ) ? '<p><a href="' . $siteurl .'?wp_email_confirm=1&wp_email_capture_passkey=' . $confirm_code . '">Click Here to Subscribe!</a><br/></p>' : $siteurl ."?wp_email_confirm=1&wp_email_capture_passkey=" . $confirm_code;

		$message.= get_option( 'wp_email_capture_body' ) . $splitstring . $splitstring;

		if ( $message == $splitstring . $splitstring ) {
			$message .= __( "Thank you for signing up for our newsletter, please click the link below to confirm your subscription", "wp-email-capture" ) . "\n\n";
		}

		$message .= $htmlurl;
		$message .= $splitstring . "----" . $splitstring;
		$message .= __( "This is an automated message that is generated because somebody with the IP address of", 'wp-email-capture' )." " . $ip ." ".__( '(possibly you) on', 'wp-email-capture' )." ". $date ." ".__( 'filled out the form on the following page', 'wp-email-capture' )." " . $referrer . $splitstring;
		$message .= __( "If you are sure this isn't you, please ignore this message, you will not be sent another message.", 'wp-email-capture' );
		$message = str_replace( "%NAME%", $name, $message );

		// send email

		$sentmail = apply_filters( 'wp_email_capture_send_email', $to, $subject, $message, $header );

		//wp_die( $header );
		// if your email succesfully sent

		if ( $sentmail ) {
			$halfreg = "";
			$halfreg = get_option( 'wp_email_capture_signup' );
			if ( $halfreg == "" ) {
				$halfreg = get_bloginfo( 'url' );
			}
			wp_redirect( $halfreg );

			die();

		} else {

			$error = urlencode( __( 'Email unable to be sent', 'wp-email-capture' ) );
			$url = $starturl . $extrastring . "wp_email_capture_error=" . $error;

			wp_redirect( $url );

			die();

		}

	}



}



// if not found

/* else {

	echo __( "Not found your email in our database", 'wp-email-capture' );

}





} */


/**
 * Confirm the email address has been validated by the user and register the user, allowing the site owner to
 * see/export their email address. Redirects user to final destination page.
 *
 * @return void
 */
function wp_capture_email_confirm() {

	global $wpdb;

	// Passkey that got from link

	$passkey = esc_attr( $_GET['wp_email_capture_passkey'] );

	$get_confirmation_code = "SELECT id FROM ". WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE ." WHERE confirm_code ='%s'";

	$confirmation_code = $wpdb->get_var( $wpdb->prepare( $get_confirmation_code, $passkey ) );

	if ( $confirmation_code != '' ) {

		$get_confirmation_row = "SELECT * FROM ". WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE ." WHERE confirm_code ='%s'";

		$confirmation_row = $wpdb->get_row( $wpdb->prepare( $get_confirmation_row, $passkey ) );

		/* foreach ( $confirmation_rows as $confirmation_row ) { */

			$name = $confirmation_row->name;

			$email = $confirmation_row->email;

			$add_to_registered_members_table = $wpdb->insert( WP_EMAIL_CAPTURE_REGISTERED_MEMBERS_TABLE, array( 'name' => $name, 'email' => $email ), array( '%s', '%s' ) );

			// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
			
			$delete_from_temp_members_sql = "DELETE FROM ". WP_EMAIL_CAPTURE_TEMP_MEMBERS_TABLE . " WHERE confirm_code = '%s'";

			$delete_from_temp_members = $wpdb->query( $wpdb->prepare( $delete_from_temp_members_sql, $passkey ) );

			$fullreg = "";
			$fullreg = get_option( 'wp_email_capture_redirection' );

			if ( $fullreg == "" ) {
				$fullreg = get_bloginfo( 'url' );
			}

			$emaildataarray = array(
				'name' => $name,
				'email' => $email 
				);

			do_action( 'wp_email_capture_complete_before_redirect', $emaildataarray );

			wp_redirect( $fullreg );
			echo "<meta http-equiv='refresh' content='0;". $fullreg ."'>";
			die();

			/* } */

		} else {

			if ( strpos( $url, "?" ) === false ) { $extrastring = "?"; } else { $extrastring = "&"; }

			$error = urlencode( __( 'Wrong confirmation code', 'wp-email-capture' ) );
			$url = $url  . $extrastring . "wp_email_capture_error=" . $error;

			wp_redirect( $url );
			die();

		}
	}



/**
 * Default function to send emails. Can be overwritten using filters.
 * @param  string $to      where the email is going
 * @param  string $subject the email subject
 * @param  string $message the message of the email
 * @param  string $header  the header of the email
 * @return boolean         whether the email was successful in sending.
 */
function wp_email_capture_send_email_default( $to, $subject, $message, $header ) {

	$disableheaders = get_option( 'wp_email_capture_disabled_headers' );

	if ( $disableheaders ) {

		$sendmail = wp_mail( $to, $subject, $message );

	} else {

		$sendmail = wp_mail( $to, $subject, $message, $header );

	}

	// CLEAN THIS UP
	// @todo CLEAN UP
	/* if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer( true );
	} */

	/* DEPRECATED 3.3 */
	// Set SMTPDebug to true
	/* $phpmailer->SMTPDebug = false;

	echo "<br/><br/>To: " . $to;
	echo "<br/>Subject " . $subject; 
	echo "<br/>Message " . $message; 
	echo "<br/>Header " . $header; 

	//$sendmail = wp_mail( $to, $subject, $message );

	if ( $sendmail ) { $addedfield = "Email Sent!"; } else { $addedfield = "Email Not Sent"; }

	// Start output buffering to grab smtp debugging output
	/* ob_start();
	add_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );
			// Send the test mail
	//$result = wp_mail( $to, $subject, $message, $header );
	remove_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );
			// Grab the smtp debugging output
	$smtp_debug = ob_get_clean();

			// Output the response
	?>
	<div id="message" class="updated fade"><p><strong><?php _e( 'Test Message Sent', 'amgsessmtp' ); ?></strong></p>
		<p><?php _e( 'The result was:', 'amgsessmtp' ); ?></p>
		<pre><?php var_dump( $sendmail ); ?></pre>
		<p><?php _e( 'The full debugging output is shown below:', 'amgsessmtp' ); ?></p>
		<pre><?php var_dump( $phpmailer ); ?></pre>
		<p><?php _e( 'The SMTP debugging output is shown below:', 'amgsessmtp' ); ?></p>
		<pre><?php echo $smtp_debug ?></pre>
	</div>
	<?php

	wp_die( "Sendmail is: "  . $sendmail . "<br/>
		Disableheaders is: " . $disableheaders); */

	return $sendmail;
}