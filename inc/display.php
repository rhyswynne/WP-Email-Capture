<?php 


/**
 * Displays the WP Email Capture Form 
 * 
 * @param  string 	$error 		The error message
 * @return void
 */
function wp_email_capture_form( $error = "" ) {

	$url = get_option('home');
	$url = trailingslashit($url);

	?> 
	<div id="wp_email_capture" class="wp-email-capture wp-email-capture-widget wp-email-capture-widget-worldwide">
		<form name="wp_email_capture" method="post" action="<?php echo $url; ?>">

			<?php 

			if ( isset( $_GET['wp_email_capture_error'] ) ) {

				$error = esc_attr( $_GET['wp_email_capture_error'] );

				echo "<div class='wp-email-capture-error'>".__('Error:','WPEC'). " " .$error ."</div>";

			} 

			?>

			<label class="wp-email-capture-name wp-email-capture-label wp-email-capture-widget-worldwide wp-email-capture-name-widget wp-email-capture-name-label wp-email-capture-name-label-widget<?php if (get_option("wp_email_capture_name_required") == 1 ) { $display .= " wp-email-capture-required"; } ?>" for="wp-email-capture-name-widget"><?php _e('Name:','WPEC'); ?></label> <input name="wp-email-capture-name" id="wp-email-capture-name-widget" type="text" class="wp-email-capture-name wp-email-capture-input wp-email-capture-widget-worldwide wp-email-capture-name-widget wp-email-capture-name-input wp-email-capture-name-input-widget" title="Name" /><br/>

			<label class="wp-email-capture-email wp-email-capture-label wp-email-capture-widget-worldwide wp-email-capture-email-widget wp-email-capture-email-label wp-email-capture-email-label-widget"  for="wp-email-capture-email-widget"><?php _e('Email:','WPEC'); ?></label> <input name="wp-email-capture-email" id="wp-email-capture-email-widget" type="text" class="wp-email-capture-email wp-email-capture-input wp-email-capture-widget-worldwide wp-email-capture-email-widget wp-email-capture-email-input wp-email-capture-email-input-widget" title="Email" /><br/>

			<input type="hidden" name="wp_capture_action" value="1" />

			<input name="Submit" type="submit" value="<?php _e('Submit','WPEC'); ?>" class="wp-email-capture-submit wp-email-capture-widget-worldwide" />

		</form>

	</div>

	<?php if (get_option("wp_email_capture_link") == 1) {

		echo "<p style='font-size:10px;'>".__('Powered by','WPEC')." <a href='http://wpemailcapture.com/' target='_blank'>WP Email Capture</a></p>\n";

	}

}


/**
 * Build the WP Email Capture Form - used for shortcodes.
 * 
 * @param  array  	$atts 	Any attributes included in the shrotcode.
 * @param  string 	$error 	The error message
 * @return string         	The built form.
 */
function wp_email_capture_form_page( $atts, $error = "") {

	$url = get_option('home');
	$url = trailingslashit($url);
	$display = "";
	$display .= "<div id='wp_email_capture_2' class='wp-email-capture wp-email-capture-display'><form name='wp_email_capture_display' method='post' action='" . $url ."'>\n";

	if ( isset( $_GET['wp_email_capture_error'] ) ) {

		$error = esc_attr($_GET['wp_email_capture_error']);

		$display .= "<div class='wp-email-capture-error'>" . __('Error:','WPEC'). " " . $error ."</div>\n";

	} 

	$display .= "<label class='wp-email-capture-name wp-email-capture-label wp-email-capture-display-worldwide wp-email-capture-name-display wp-email-capture-name-label wp-email-capture-name-label-display"; 

	if (get_option("wp_email_capture_name_required") == 1) { $display .= " wp-email-capture-required"; }

	$display .= "' for='wp-email-capture-name-display'>".__('Name:','WPEC')."</label> <input name='wp-email-capture-name' id='wp-email-capture-name-display' type='text' class='wp-email-capture-name wp-email-capture-label wp-email-capture-display-worldwide wp-email-capture-name-display wp-email-capture-name-input wp-email-capture-name-input-display' title='Name' /><br/>\n";

	$display .= "<label class='wp-email-capture-email wp-email-capture-label wp-email-capture-display wp-email-capture-email-display wp-email-capture-email-label wp-email-capture-email-label-display' for='wp-email-capture-email-display'>".__('Email:','WPEC')."</label> <input name='wp-email-capture-email' id='wp-email-capture-email-display' type='text' class='wp-email-capture-email wp-email-capture-input wp-email-capture-display wp-email-capture-email-display wp-email-capture-email-input wp-email-capture-email-input-display' title='Email' /><br/>\n";

	$display .= "<input type='hidden' name='wp_capture_action' value='1' />\n";

	$display .= "<input name='Submit' type='submit' value='".__('Submit','WPEC')."' class='wp-email-capture-submit' /></form></div>\n";

	if (get_option("wp_email_capture_link") == 1) {

		$display .= "<p style='font-size:10px;'>".__('Powered by','WPEC')." <a href='http://wpemailcapture.com/' target='_blank'>WP Email Capture</a></p>\n";
	} 

	$display = apply_filters( 'wp_email_capture_display_form', $display, $atts );

	return $display;

}


/**
 * Process the WP Email Capture Form, including any attributes
 * @return void
 */
function wp_email_capture_form_process_atts( $atts ) {
	return wp_email_capture_form_page( $atts );
}

?>