<?php

/**
 * Set up the WP Email Capture Menus
 * @return void
 */
function wp_email_capture_menus()
{
	$avatar = WP_EMAIL_CAPTURE_URL . '/images/wpemailcapture-dashicon.png';
	//add_options_page( __( 'WP Email Capture Options', 'wp-email-capture' ), 'WP Email Capture', 'activate_plugins', 'wpemailcaptureoptions', 'wp_email_capture_options' );
	add_menu_page(__('WP Email Capture'), __('WP Email Capture', 'wp-email-capture'), 'activate_plugins', 'wpemailcapture', 'wp_email_capture_dashboard', $avatar, 85);
	add_submenu_page('wpemailcapture', __('Settings'), __('Settings', 'wp-email-capture'), 'activate_plugins', 'wpemailcapturefreesettings', 'wp_email_capture_free_options');
	add_submenu_page('wpemailcapture', __('Help'), __('Help', 'wp-email-capture'), 'activate_plugins', 'wpemailcapturefreehelp', 'wp_email_capture_free_help');
}


/**
 * Contents of the WP Email Capture Dashboard Page
 *
 * @todo   Build this
 * @return void
 */
function wp_email_capture_dashboard()
{

	$extensionstopush = array(
		array(
			'name'          => __('WP Email Capture - Moosend Integration', 'WPEC'),
			'description'   => __('Integrate WP Email Capture with <a href="https://www.wpemailcapture.com/recommends/moosend/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur">Moosend</a>'),
			'price'         => '15',
			'purchaseurl'   => 'https://www.wpemailcapture.com/checkout/?edd_action=add_to_cart&download_id=4577&utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcapture',
			'infourl'       => 'https://www.wpemailcapture.com/downloads/wp-email-capture-moosend-integration/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcapture',
			'imageurl'      => WP_EMAIL_CAPTURE_URL . '/inc/img/moosend-image.png',
			'slug'          => 'wpemailcapturemoosendintegration'
		),
		array(
			'name'          => __('WP Email Capture - Redirect If Present', 'WPEC'),
			'description'   => __('Redirect signups to the final page, rather than show an error, should they not be present'),
			'price'         => '20',
			'purchaseurl'   => 'https://www.wpemailcapture.com/checkout/?edd_action=add_to_cart&download_id=4153&utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur',
			'infourl'       => 'https://www.wpemailcapture.com/downloads/wp-email-capture-returning-user-redirect/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcapture',
			'imageurl'      => WP_EMAIL_CAPTURE_URL . '/inc/img/redirect-if-present.png',
			'slug'          => 'wpemailcaptureredirectifpresent'
		),
		array(
			'name'          => __('WP Email Capture - Akismet Integration', 'WPEC'),
			'description'   => __('Integrate WP Email Capture with <a href="https://akismet.com/">Akismet</a>'),
			'price'         => '20',
			'purchaseurl'   => 'https://www.wpemailcapture.com/checkout/?edd_action=add_to_cart&download_id=2823&utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur',
			'infourl'       => 'https://www.wpemailcapture.com/downloads/wp-email-capture-akismet-integration/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur',
			'imageurl'      => WP_EMAIL_CAPTURE_URL . '/inc/img/akismet-image.gif',
			'slug'          => 'wpemailcaptureakismetintegration'
		),
		array(
			'name'          => __('WP Email Capture - Drip Integration', 'WPEC'),
			'description'   => __('Integrate WP Email Capture with <a href="https://www.wpemailcapture.com/recommends/drip/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur">Drip</a>'),
			'price'         => '15',
			'purchaseurl'   => 'https://www.wpemailcapture.com/checkout/?edd_action=add_to_cart&download_id=2415&utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcaptur',
			'infourl'       => 'https://www.wpemailcapture.com/downloads/wp-email-capture-drip-integration/?utm_source=plugin-dashboard-extensions&utm_medium=plugin&utm_campaign=wpemailcapture',
			'imageurl'      => WP_EMAIL_CAPTURE_URL . '/inc/img/drip-image.png',
			'slug'          => 'wpemailcapturedripintegration'
		)
	);

	$compatibleservices = array(

		array(
			'name'  => 'Aweber',
			'url'   => 'https://www.wpemailcapture.com/recommends/aweber/'
		),
		array(
			'name'  => 'Moosend',
			'url'   => 'https://www.wpemailcapture.com/recommends/moosend/'
		),
		array(
			'name'  => 'Constant Contact',
			'url'   => 'https://www.wpemailcapture.com/recommends/constant-contact/'
		),

		array(
			'name'  => 'Mailchimp',
			'url'   => 'https://www.wpemailcapture.com/recommends/mailchimp/'
		),

		array(
			'name'  => 'Madmimi',
			'url'   => 'https://www.wpemailcapture.com/recommends/madmimi/'
		),

	);

?>
	<div class="wrap about-wrap wpec-about-wrap">

		<h1><?php _e('Welcome to WP Email Capture!', 'wp-email-capture'); ?></h1>

		<div class="about-text">
			<?php _e('Start collecting email subscribers today!', 'wp-email-capture'); ?><br />
		</div>

		<h2 class="nav-tab-wrapper" id="wpemailcapture-tabs">
			<a class="nav-tab" href="#dashboard" id="dashboard-tab"><?php _e('Dashboard', 'wp-email-capture'); ?></a>
			<a class="nav-tab" href="#changelog" id="changelog-tab"><?php _e('Changelog', 'wp-email-capture'); ?></a>
			<a class="nav-tab" href="#credits" id="credits-tab"><?php _e('Credits', 'wp-email-capture'); ?></a>
		</h2>

		<?php

		if (array_key_exists('wpecupgrade', $_GET)) {
			$activedashboard    = "";
			$activeupgrade      = " active";
		} else {
			$activedashboard    = " active";
			$activeupgrade      = "";
		}

		?>
		<div id="dashboard" class="wpemailcapture-tab <?php echo $activedashboard; ?>">
			<h2><?php _e('Welcome to WP Email Capture', 'wp-email-capture'); ?></h2>

			<h3><?php _e('New in 3.9 - reCAPTCHA Integration', 'wp-email-capture'); ?></h3>

			<p><?php _e('Version 3.9 will allow you to protect your blog from spam, using reCAPTCHA integration.', 'wp-email-capture'); ?></p>
			<p><?php _e('Grab a key from Google and use reCAPTCHA v3 to grade your signups, block those that are troublesome, and allowing those that are genuine.', 'wp-email-capture'); ?></p>

			<p><a class="non-nav-tab" href="#changelog" id="changelog-tab"><?php _e('Read the changelog', 'wp-email-capture'); ?></a></p>

			<?php

			do_action('wp_email_capture_dashboard_premium_upsell');

			?>

			<h2><?php _e('Extensions', 'wp-email-capture'); ?></h2>
			<table class="extensions">
				<tr>
					<?php

					$loop = 0;

					foreach ($extensionstopush as $extension) {
						$loop++;
						if ($loop > 3) {
							$loop = 0;
					?>
				</tr>
				<tr>
				<?php
						}
				?>
				<td align="center">
					<h3><?php echo $extension['name'] ?></h3>
					<img src="<?php echo $extension['imageurl']; ?>">
					<p><?php echo $extension['description']; ?></p>
					<p>
						<a class="button-primary" href="<?php echo $extension['purchaseurl']; ?>"><?php echo "$" . $extension['price'] . ".00"; ?> <?php _e('Buy Now', 'WPEC'); ?></a>
						<a class="button-secondary" href="<?php echo $extension['infourl']; ?>"><?php _e('More Info', 'WPEC'); ?></a>
					</p>
				</td>
			<?php

					}
			?>
				</tr>
			</table>

			<h2><?php _e('Compatible Services', 'wp-email-capture'); ?></h2>
			<p><?php _e('WP Email Capture email lists are compatible with the following marketing services.', 'wp-email-capture'); ?></p>
			<ul>
				<?php

				$loop = 0;

				foreach ($compatibleservices as $service) {
				?>
					<li><a href="<?php echo $service['url']; ?>?utm_source=plugin-dashboard-compatibleservices&utm_medium=plugin&utm_campaign=wpemailcapture"><?php echo $service['name']; ?></a></li>
				<?php

				}
				?>
			</ul>

		</div>

		<div id="changelog" class="wpemailcapture-tab <?php echo $activeupgrade; ?>">
			<h2><?php _e('Changelog', 'wp-email-capture'); ?></h2>

			<?php

			$changelog = wp_email_capture_get_changelog_array();

			if (!empty($changelog)) {

				foreach ($changelog as $version) {

					$title = "";

					if (array_key_exists('version', $version)) {

						$title .= sprintf(__('Version %s', 'wp-email-capture'), $version['version']);
					}

					if (array_key_exists('title', $version)) {

						$title .= " - " . $version['title'];
					}

					if ($title) {

						echo '<h3>' . $title . '</h3>';
					}

					if (array_key_exists('intro', $version)) {

						echo '<p>' . $version['intro'] . '</p>';
					}

					if (array_key_exists('list', $version)) {

						echo '<ul>';

						foreach ($version['list'] as $listitem) {

							echo '<li>' . $listitem . '</li>';
						}

						echo '</ul>';
					}
				}
			}
			?>

		</div>

		<div id="credits" class="wpemailcapture-tab">
			<h2><?php _e('Credits', 'wp-email-capture'); ?></h2>
			<p><?php _e('This plugin has been helped and improved by the following people', 'wp-email-capture'); ?></p>
			<ul>
				<li><?php echo sprintf(__('<strong>3.1:</strong> <a href="%s" target="_blank">Hassan Raza</a>', 'wp-email-capture'), 'http://hassan-raza.com/'); ?></li>
			</ul>
			<h3><?php _e('Translations', 'wp-email-capture'); ?></h3>
			<ul>
				<li><?php echo sprintf(__('<strong>French Translation:</strong> <a href="%s" target="_blank">Olivier</a> & <a href="%s" target="_blank">Andrew Patton</a> <a href="%s" target="_blank">(@andpatton)</a>.', 'wp-email-capture'), 'http://www.ticket-system.net/', 'http://www.acusti.ca/', 'http://twitter.com/andpatton'); ?></li>
				<li><?php echo sprintf(__('<strong>German Translation:</strong> <a href="%s" target="_blank">Stephan</a>, <a href="%s" target="_blank">Marc Nilius</a> <a href="%s" target="_blank">(@libertello)</a>, Ov3rFly &amp; <a href="%s">Lars Kasper</a>', 'wp-email-capture'), 'http://www.computersniffer.com/', 'http://www.libertello.de/', 'http://twitter.com/libertello', 'http://larskasper.de/'); ?></li>
				<li><?php echo sprintf(__('<strong>Brazilian Portugese Translation:</strong> <a href="%s" target="_blank">Nick Lima</a> <a href="%s" target="_blank">(@nick_linux)</a>', 'wp-email-capture'), 'http://www.nicklima.com.br', 'http://twitter.com/nick_linux'); ?></li>
				<li><?php echo sprintf(__('<strong>Dutch Translation:</strong> <a href="%s" target="_blank">Sander</a>', 'wp-email-capture'), 'http://www.zanderz.net/'); ?></li>
				<li><?php echo sprintf(__('<strong>Hungarian Translation:</strong> <a href="%s" target="_blank">Surbma</a>', 'wp-email-capture'), 'http://surbma.hu/'); ?></li>
				<li><?php echo sprintf(__('<strong>Spanish Translation:</strong> <a href="%s" target="_blank">David Bravo</a>', 'wp-email-capture'), 'http://dimensionmultimedia.com'); ?></li>
				<li><?php echo sprintf(__('<strong>Italian Translation:</strong> <a href="%s" target="_blank">Giuseppe Marino</a>', 'wp-email-capture'), 'http://it.gravatar.com/gpmarino'); ?></li>
				<li><?php echo sprintf(__('<strong>Serbian Translation:</strong> <a href="%s" target="_blank">Borisa Djuraskovic</a>', 'wp-email-capture'), 'http://www.webhostinghub.com/'); ?></li>
				<li><?php echo sprintf(__('<strong>Croatian Translation:</strong> <a href="%s" target="_blank">Lem Treursić</a>', 'wp-email-capture'), 'http://grafika-dizajn.com/'); ?></li>
			</ul>
			<h3><?php _e('Contribute?', 'wp-email-capture'); ?></h3>
			<h4><?php echo sprintf(__('If you want to help, you can contribute a fix or report a bug on our <a href="%s" target="_blank">Github</a>', 'wp-email-capture'), 'https://github.com/rhyswynne/wp-email-capture'); ?></h4>
		</div>
	</div>
<?php

}


/**
 * Contents of the WP Email Capture Options Page
 *
 * @return void
 */
function wp_email_capture_free_options()
{

	echo '<div class="wrap">
	<div style="width:70%;float:left;clear:both;" class="postbox-container">
		<div class="metabox-holder"><div class="meta-box-sortables">
			<h2>' . __('WP Email Capture Options', 'wp-email-capture') . '</h2>
			<h3>' . __('Options', 'wp-email-capture') . '</h3>';

?>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">

		<?php wp_nonce_field('update-options'); ?>

		<?php settings_fields('wp-email-capture-group'); ?>

		<table class="form-table">

			<tbody>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Subscription Page URL (full web address ie: http://www.domain.com/this-page/)', 'wp-email-capture'); ?></th>

					<td><input type="text" name="wp_email_capture_signup" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_signup')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label for="wp_email_capture_redirection"><?php _e('Confirmation Page URL  (full web address ie: http://www.domain.com/this-other-page/)', 'wp-email-capture'); ?></label></th>

					<td><input type="text" name="wp_email_capture_redirection" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_redirection')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label for="wp_email_capture_from"><?php _e('From Which Email Address', 'wp-email-capture'); ?></label></th>

					<td><input type="text" name="wp_email_capture_from" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_from')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label for="wp_email_capture_from_name"><?php _e('From Which Name', 'wp-email-capture'); ?></label></th>

					<td><input type="text" name="wp_email_capture_from_name" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_from_name')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Subject of Email', 'wp-email-capture'); ?></th>

					<td><input type="text" name="wp_email_capture_subject" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_subject')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label for="wp_email_capture_body"><?php _e('Body of Email', 'wp-email-capture'); ?><br>
							<?php _e('(use %NAME% to use the form\'s &quot;Name&quot; field in their welcome email)', 'wp-email-capture'); ?></label>
					</th>

					<td><textarea name="wp_email_capture_body" style="width: 25em;"><?php echo get_option('wp_email_capture_body'); ?></textarea></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label><?php _e('Link to us (optional, but appreciated)', 'wp-email-capture'); ?></label></th>

					<td>
						<input type="checkbox" name="wp_email_capture_link" value="1" <?php checked(get_option('wp_email_capture_link'), 1); ?> id="wp_email_capture_link_checkbox" />
						<?php $prechecked = get_option('wp_email_capture_link') == 1 ? "wp_email_capture_admin_discount_active" : ""; ?>
					</td>

				</tr>

				<tr class="wp_email_capture_admin_discount <?php echo $prechecked; ?>">
					<td colspan="2">
						<?php printf(__('Thanks for linking to us! As a thank you, use code <strong>LINK20</strong> to get 20&#37; off <a href="%s">WP Email Capture Premium</a>, or any extension from the <a href="%s">WP Email Capture Shop</a>.', 'wp-email-capture'), 'https://www.wpemailcapture.com/premium/?utm_source=plugin-options&utm_medium=plugin&utm_term=checkedlink&utm_campaign=wpemailcapture', 'https://www.wpemailcapture.com/downloads/?utm_source=plugin-options&utm_medium=plugin&utm_term=checkedlink&utm_campaign=wpemailcapture'); ?>
					</td>
				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><label><?php _e('Make The "Name" field a required field?', 'wp-email-capture'); ?></label></th>



					<td><input type="checkbox" name="wp_email_capture_name_required" value="1" <?php checked(get_option('wp_email_capture_name_required'), 1); ?> /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Delimeter (leave blank for a comma)', 'wp-email-capture'); ?></th>

					<td><input type="text" name="wp_email_capture_name_delimeter" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_name_delimeter')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Send HTML email?', 'wp-email-capture'); ?></th>

					<td><input type="checkbox" name="wp_email_capture_send_email_html" value="1" <?php checked(get_option('wp_email_capture_send_email_html'), 1); ?> /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Disable Headers', 'wp-email-capture'); ?></th>

					<td><input type="checkbox" name="wp_email_capture_disabled_headers" value="1" <?php checked(get_option('wp_email_capture_disabled_headers'), 1); ?> /><br />
						<span class="description"><?php _e('If you are having problems with sending emails (such as with Amazon SES), disable this', 'wp-email-capture'); ?></span>
					</td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Use Default Styling', 'wp-email-capture'); ?></th>

					<td><input type="checkbox" name="wp_email_capture_default_styling" value="1" <?php checked(get_option('wp_email_capture_default_styling'), 1); ?> /><br />
						<span class="description"><?php _e('If you want to have some easy styling on your forms, check this box. Otherwise leave it unchecked if your theme already styles forms', 'wp-email-capture'); ?></span>
					</td>

				</tr>

				<?php do_action('wp_email_capture_added_free_options'); ?>

			</tbody>

		</table>

		<h2><?php _e('reCAPTCHA Settings', 'wp-email-capture'); ?></h2>

		<?php _e('We can use <a href="https://www.google.com/recaptcha/about/">reCAPTCHA</a> (v3) for free (<a href="https://www.wpemailcapture.com/downloads/wp-email-capture-akismet-integration/" target="_blank">Akismet is avialable here</a>). Add your keys below.', 'WPEC'); ?>
		<table class="form-table">
			<tbody>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('reCAPTCHA Site Key', 'wp-email-capture'); ?></th>

					<td><input type="text" name="wp_email_capture_recaptcha_client_api_key" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_recaptcha_client_api_key')); ?>" /></td>

				</tr>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('reCAPTCHA Secret Key', 'wp-email-capture'); ?></th>

					<td><input type="text" name="wp_email_capture_recaptcha_server_api_key" class="regular-text code" value="<?php echo esc_attr(get_option('wp_email_capture_recaptcha_server_api_key')); ?>" /></td>

				</tr>
				<?php /*
												<tr valign="top">

                                                    <th scope="row" style="width:400px"><?php _e( 'reCAPTCHA Type', 'wp-email-capture' ); ?></th>

                                                    <td>
													<input type="radio" id="checkbox" name="wp_email_capture_recaptcha_api_type" value="checkbox" <?php checked( get_option( 'wp_email_capture_recaptcha_api_type' ), 'checkbox' ); ?>>
													<label for="checkbox">Checkbox</label>
													<input type="radio" id="invisible" name="wp_email_capture_recaptcha_api_type" value="invisible" <?php checked( get_option( 'wp_email_capture_recaptcha_api_type' ), 'invisible' ); ?>>
													<label for="invisible">Invisible</label>
													<input type="radio" id="disable" name="wp_email_capture_recaptcha_api_type" value="disable" <?php checked( get_option( 'wp_email_capture_recaptcha_api_type' ), 'disable' ); ?>>
													<label for="disable">Disable</label>
													</td>

                                                </tr> */ ?>




			</tbody>
		</table>

		<h2><?php _e('GDPR Settings', 'wp-email-capture'); ?></h2>

		<table class="form-table">

			<tbody>

				<tr valign="top">

					<th scope="row" style="width:400px"><?php _e('Enable GDPR Settings', 'wp-email-capture'); ?></th>
					<td><input type="checkbox" id="wp_email_capture_enable_gdpr" name="wp_email_capture_enable_gdpr" value="1" <?php checked(get_option('wp_email_capture_enable_gdpr'), 1); ?> /><br /><span class="description"><?php _e('If you wish to enable GDPR settings, please check this box.', 'wp-email-capture'); ?></span></td>
				</tr>

			</tbody>

		</table>

		<?php

		if (get_option('wp_email_capture_enable_gdpr')) {
			$hiddengdpr = '';
		} else {
			$hiddengdpr = 'style="display:none;"';
		}

		?>
		<div class="gdpr-table" <?php echo $hiddengdpr; ?>>
			<table class="form-table">

				<tbody>

					<tr valign="top">

						<th scope="row" style="width:400px"><?php _e('How long do you want to keep data on your servers?', 'wp-email-capture'); ?></th>

						<td>
							<input type="text" name="wp_email_capture_number_for_privacy" id="wp_email_capture_number_for_privacy" class="regular-text code" value="<?php echo esc_attr( get_option('wp_email_capture_number_for_privacy') ); ?>" />

							<select name="wp_email_capture_unit_for_privacy" id="wp_email_capture_unit_for_privacy">
								<option value="days" <?php selected(get_option('wp_email_capture_unit_for_privacy'), 'days'); ?>><?php _e('Days', 'wp-email-capture'); ?></option>
								<option value="weeks" <?php selected(get_option('wp_email_capture_unit_for_privacy'), 'weeks'); ?>><?php _e('Weeks', 'wp-email-capture'); ?></option>
								<option value="months" <?php selected(get_option('wp_email_capture_unit_for_privacy'), 'months'); ?>><?php _e('Months', 'wp-email-capture'); ?></option>
							</select>

							<br /><span class="description"><?php _e('When visitors submit their email details, the plugin stores users data in the database. You can choose to automatically delete this data after a certain amount of days. Leave blank or "0" to not delete data.', 'wp-email-capture'); ?></span>
						</td>

					</tr>

					<tr valign="top">

						<th scope="row" style="width:400px"><?php _e('Privacy Policy', 'wp-email-capture'); ?></th>

						<td>

							<?php

							$addedstring = "";

							if (get_option('wp_email_capture_number_for_privacy')) {
								$number        = get_option('wp_email_capture_number_for_privacy');
								$unit          = get_option('wp_email_capture_unit_for_privacy');
								$addedstring   = sprintf(__('We hold this data for a maximum of %s %s, at which point it is deleted.', 'wp-email-capture'), $number, $unit);
							}

							?>

							<p class="notice notice-error save-to-change" style="display:none;"><?php _e('Save the page to update the text in the below box.', 'wp-email-capture'); ?></p>

							<textarea disabled style="min-width:100%;height:200px;" id="copyrightnotice"><?php _e('We use a WordPress plugin called WP Email Capture to aid management of our email marketing list. Should you wish to subscribe to our newsletter, we collect the following data.', 'wp-email-capture'); ?>

										<?php _e('Your Name (or what you chose to address yourself as). This is used for simple personalisation purposes.', 'wp-email-capture'); ?>

										<?php _e('Your Email Address. This is used to contact you and include you in our newsletter.', 'wp-email-capture'); ?>

										<?php _e('The date of signup. This is so we can reference when to delete your data at a later date.', 'wp-email-capture'); ?>
										<?php

										if ($addedstring && $number && $unit) {
											echo $addedstring;
										}

										?>

									</textarea>

							<button class="button-secondary" id="copytext" type="button"><?php _e('Copy Privacy Policy text to clipboard', 'wp-email-capture'); ?></button>
							<br /><span class="description"><?php _e('Copy and paste this text to your Privacy Policy, as this details how WP Email Capture handles data. We try and add this to your Privacy Policy automatically, but if we are unable to do so, we add it here.', 'wp-email-capture'); ?></span>
						</td>

					</tr>

				</tbody>

			</table>
		</div>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="wp_email_capture_redirection,wp_email_capture_from,wp_email_capture_subject,wp_email_capture_signup,wp_email_capture_body,wp_email_capture_from_name,wp_email_capture_link,wp_email_capture_name_required,wp_email_capture_name_delimeter,wp_email_capture_send_email_html,wp_email_capture_disabled_headers,wp_email_capture_enable_gdpr,wp_email_capture_number_of_privacy,wp_email_capture_number_of_privacy" />

		<p class="submit">

			<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'wp-email-capture') ?>" />

		</p>

	</form>



	<?php

	wp_email_capture_writetable();

	echo '<a name="list"></a><h3>' . __('Export', 'wp-email-capture') . '</h3>
				<form name="wp_email_capture_export" action="' . esc_url($_SERVER['REQUEST_URI']) . '#list" method="post">

					<label>' . __('Use the button below to export your list as a CSV to use in software such as <a href="https://www.wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="https://www.wpemailcapture.com/recommends/constant-contact/">Constant Contact</a>', 'wp-email-capture') . '</label>
					<input type="hidden" name="wp_email_capture_export" />
					<div class="submit">
						<input type="submit" value="' . __('Export List', 'wp-email-capture') . '" class="button"  />
					</div>

				</form>';

	$tempemails             = wp_email_capture_count_temp();
	$lastsignupdatestring   = wp_email_capture_get_last_singup_date();

	if ($lastsignupdatestring) {
		$lastsignupdate         = date("jS F, Y g:ia", strtotime($lastsignupdatestring));
		$lastsignupdatesentance = __(' The last attempted signup was on ' . $lastsignupdate . '.',  'wp-email-capture');
	} else {
		$lastsignupdatesentance = "";
	}

	echo "<a name='truncate'></a><h3>" . __('Temporary e-mails', 'wp-email-capture') . "</h3>\n";

	echo '<form name="wp_email_capture_truncate" action="' . esc_url($_SERVER['REQUEST_URI']) . '#truncate" method="post">';

	echo '<label>' . __('There are', 'wp-email-capture') . ' ' . $tempemails . __(' e-mail addresses that have been unconfirmed.' . $lastsignupdatesentance . ' Delete them to save space below.', 'wp-email-capture') . '</label>';

	echo '<input type="hidden" name="wp_email_capture_truncate"/>';

	wp_nonce_field('truncate_list', 'wp_email_capture_truncate_nonce');

	echo '<div class="submit"><input type="submit" value="' . __('Delete Unconfirmed e-mail Addresses', 'wp-email-capture') . '" class="button"  /></div>';

	echo "</form>";

	echo "<a name='emptyallemails'></a><h3>" . __('Delete Current List', 'wp-email-capture') . "</h3>\n";

	echo '<form name="wp_email_capture_delete" action="' . esc_url($_SERVER['REQUEST_URI']) . '#delete" method="post">';

	echo '<label>' . __('Want to delete the entire list? Click the link below. <strong>WARNING: </strong> this will delete all confirmed emails, so make sure you have a backup.', 'wp-email-capture') . '</label>';

	echo '<input type="hidden" name="wp_email_capture_delete"/>';

	wp_nonce_field('delete_whole_list', 'wp_email_capture_delete_nonce');

	echo '<div class="submit"><input type="submit" value="' . __('Delete Confirmed e-mail Addresses', 'wp-email-capture') . '" class="button"  /></div>';

	echo "</form>";

	echo '</div></div></div>';

	wp_email_capture_admin_sidebar("getwpemailcapturepremiumdescription,affiliates,news,supportus");

	echo '</div>';
	?>


<?php
}


/**
 * Save the options from the WP Email Capture Options Page.
 *
 * @return void
 */
function wp_email_capture_options_process()
{ // whitelist options

	register_setting('wp-email-capture-group', 'wp_email_capture_signup');
	register_setting('wp-email-capture-group', 'wp_email_capture_redirection');
	register_setting('wp-email-capture-group', 'wp_email_capture_from');
	register_setting('wp-email-capture-group', 'wp_email_capture_subject');
	register_setting('wp-email-capture-group', 'wp_email_capture_body');
	register_setting('wp-email-capture-group', 'wp_email_capture_link');
	register_setting('wp-email-capture-group', 'wp_email_capture_from_name');
	register_setting('wp-email-capture-group', 'wp_email_capture_name_required');
	register_setting('wp-email-capture-group', 'wp_email_capture_name_delimeter');
	register_setting('wp-email-capture-group', 'wp_email_capture_send_email_html');
	register_setting('wp-email-capture-group', 'wp_email_capture_disabled_headers');
	register_setting('wp-email-capture-group', 'wp_email_capture_default_styling');
	register_setting('wp-email-capture-group', 'wp_email_capture_enable_gdpr');
	register_setting('wp-email-capture-group', 'wp_email_capture_recaptcha_client_api_key');
	register_setting('wp-email-capture-group', 'wp_email_capture_recaptcha_server_api_key');
	register_setting('wp-email-capture-group', 'wp_email_capture_recaptcha_api_type');
	register_setting('wp-email-capture-group', 'wp_email_capture_unit_for_privacy');
	register_setting('wp-email-capture-group', 'wp_email_capture_number_for_privacy', 'wp_email_capture_check_number_is_a_number');

	if (isset($_REQUEST['wp_email_capture_export'])) {

		if (is_user_logged_in() ) {
			if ( current_user_can('administrator') ) {
				wp_email_capture_export();
			} else {
				wp_die( "Admin's Only Please" );
			}
		} else {
			wp_die( "You need to be logged in for this" );
		}

		
	}

	if (isset($_REQUEST['wp_email_capture_deleteid'])) {
		$wpemaildeleteid = esc_attr($_POST['wp_email_capture_deleteid']);

		if (isset($_POST['wp_email_capture_delete_individual_nonce'])) {
			if (wp_verify_nonce($_POST['wp_email_capture_delete_individual_nonce'], 'delete_id_' . $wpemaildeleteid)) {

				wp_email_capture_deleteid($wpemaildeleteid);
			}
		}
		
	}


	if (isset($_REQUEST['wp_email_capture_truncate'])) {

		if (isset($_POST['wp_email_capture_truncate_nonce'])) {
			if (wp_verify_nonce($_POST['wp_email_capture_truncate_nonce'], 'truncate_list')) {

				wp_email_capture_truncate();
			}
		}
	}

	if (isset($_REQUEST['wp_email_capture_delete'])) {

		if (isset($_POST['wp_email_capture_delete_nonce'])) {
			if (wp_verify_nonce($_POST['wp_email_capture_delete_nonce'], 'delete_whole_list')) {

				wp_email_capture_delete();
			}
		}
	}

	/**
	 * Action to hook into to register any other options.
	 */
	do_action('wp_email_capture_added_option_process');
}


/**
 * Box to upsell WP Email Capture Premium
 *
 * @return void
 */
function wp_email_capture_premium_upsell()
{
?>
	<h3><?php _e('Upgrade To WP Email Capture Premium', 'wp-email-capture'); ?></h3>
	<p><?php _e('Thanks for using the free version of WP Email Capture. We\'re incredibly greatful in you using it. Should you wish to upgrade to WP Email Capture Premium, you get a bunch of new features.', 'wp-email-capture'); ?></p>
	<ul>
		<li><?php _e('<strong>Stat tracking</strong> - track the visitors to your site and where your sign ups come from.', 'wp-email-capture'); ?></li>
		<li><?php _e('<strong>Autoresponders</strong> - Create an autoresponder email, an email sent to the user when they sign up to your site.', 'wp-email-capture'); ?></li>
		<li><?php _e('<strong>Multiple lists</strong> - Create multiple lists for your site.', 'wp-email-capture'); ?></li>
		<li><?php _e('<strong>Build External Lists</strong> - If you have a Mailchimp or Aweber account, you can use WP Email Capture to build to these services directly.', 'wp-email-capture'); ?></li>
		<li><?php _e('<strong>Custom Fields</strong> - You can capture more than just visitors name & email, add your own custom fields to capture (such as phone number or Address).', 'wp-email-capture'); ?></li>
	</ul>
	<p><?php _e('You also get premium support for a whole year!', 'wp-email-capture'); ?></p>
	<a href="https://www.wpemailcapture.com/premium/?utm_source=plugin-dashboard&utm_medium=plugin&utm_campaign=wpemailcapture" target="_blank"><button><?php _e('Click here to buy', 'wp-email-capture'); ?></button></a>
<?php
}
add_action('wp_email_capture_dashboard_premium_upsell', 'wp_email_capture_premium_upsell');


/**
 * Check if a number is numeric. If so, save. if not, display an error.
 *
 * @param  string $input Input we are validating to make sure that it is a number.
 * @return mixed        Validated number if true, false if not.
 */
function wp_email_capture_check_number_is_a_number($input)
{

	$message = null;
	$type = null;

	if (!is_numeric($input) && "" !== $input) {

		$message = __('Please make sure that the "How long do you want to keep data on your servers?" option is a number.', 'wp-email-capture');
		$type    = 'error';
	}

	if ($message && 'error' == $type) {
		add_settings_error('wp_email_capture_numeric', 'wp_email_capture_numeric', $message, $type);
		return "";
	}

	return $input;
}


/**
 * Building the array for the changelog.
 *
 * Keeping out of the way for ease of use.
 *
 * @return array An array of changes.
 */
function wp_email_capture_get_changelog_array()
{

	$changelog = array();

	$changelog[] = array(
		'version' => __('3.9.3', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a notice bug in the recaptcha which meant it would not work for certain forms with WP_DEBUG switched on', 'wp-email-capture'),
			__('Tested to 6.0', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.9', 'wp-email-capture'),
		'list'    => array(
			__('Added Google reCAPTCHA v3 integration', 'wp-email-capture'),
			__('Tested to 5.6', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.8.2', 'wp-email-capture'),
		'list'    => array(
			__('Tested to 5.5.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.8.1', 'wp-email-capture'),
		'list'    => array(
			__('Version with all the missing files from 3.8!', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.8', 'wp-email-capture'),
		'list'    => array(
			__('Added a new button to the classic editor allowing you to place the form anywhere.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.7.3', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a small bug in the site.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.7.2', 'wp-email-capture'),
		'list'    => array(
			__('Tested to 5.3.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.7.1', 'wp-email-capture'),
		'list'    => array(
			__('Corrected the “Requires at Least” as it was showing as being incompatible in the plugin store (when it is).', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.7', 'wp-email-capture'),
		'list'    => array(
			__('Added filter - `wp_email_capture_change_user_present_error_url`, needed for an additional plugin - WP Email Capture: Redirect If Present.', 'wp-email-capture'),
			__('Tested with WordPress 5.2', 'wp-email-capture'),
			__('Fixed a few CSS changes on the option pages.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.6', 'wp-email-capture'),
		'list'    => array(
			__('Tested up to 5.1', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.5', 'wp-email-capture'),
		'list'    => array(
			__('Tested with Constant Contact so reflected help screens to mention that.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.4', 'wp-email-capture'),
		'list'    => array(
			__('Clarified further a couple of options that people were having problems with.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.3', 'wp-email-capture'),
		'list'    => array(
			__('Some files didn\'t manage to upload. I\'ve now pushed them live.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.2', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a bug in Gutenberg.', 'wp-email-capture'),
			__('Checking for "register_block_type" rather than "the_gutenberg_project" in prep for 5.0', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6.1', 'wp-email-capture'),
		'list'    => array(
			__('Added Gutenberg information to the help section.', 'wp-email-capture'),
			__('Removed a spelling mistake in one of the URL\'s on the setup form.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.6', 'wp-email-capture'),
		'list'    => array(
			__('Fix Gutenberg compatability bug. If you use Gutenberg, you may have to recreate your blocks, hence the version major bump. Otherwise you should be fine.', 'wp-email-capture'),
		),
	);


	$changelog[] = array(
		'version' => __('3.5.4', 'wp-email-capture'),
		'list'    => array(
			__('Added a note should a version of MySQL earlier than 5.6 is shared.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.5.3', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a bug that saving with GDPR switched off resulted in a display error (even though it was saved correctly).', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.5.2', 'wp-email-capture'),
		'list'    => array(
			__('A few cosmetic changes to the help pages. Could use more work but is a bit neater for now.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.5.1', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a bug that made the widget for WP Email Capture work.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.5', 'wp-email-capture'),
		'intro'   => __('This version was released to try and make WP Email Capture more compatible with the GDPR legislation.', 'wp-email-capture'),
		'list'    => array(
			__('Integration with WordPress GDPR checker.', 'wp-email-capture'),
			__('You can have a checkbox on your forms, explicitly giving consent to users to sign up to your newsletter.', 'wp-email-capture'),
			__('You can delete data after a period of time on the site.', 'wp-email-capture'),
			__('You can search the database, allowing you to see and delete what data you have for people', 'wp-email-capture'),
			__('Improved the changelog routine, allowing it to be updated more frequently.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.4.2', 'wp-email-capture'),
		'list'    => array(
			__('Introduced "wp_email_capture_is_premium" function, to make further development easier.', 'wp-email-capture'),
			__('Fixed a bug from Gutenberg 3.4 that called a undefined variable (blocks.source.children & blocks.source.attr).', 'wp-email-capture'),
			__('Switched from wp.blocks.InspectorControls.TextControl to wp.components.TextControl.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.4.1', 'wp-email-capture'),
		'list'    => array(
			__('Fixes a fatal error', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.4', 'wp-email-capture'),
		'intro'   => __('This version introduced compatability with Gutenberg.', 'wp-email-capture'),
		'list'    => array(
			__('Added Default Styles should you wish to activate them.', 'wp-email-capture'),
			__('Gutenberg Compatibility!', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.3.4', 'wp-email-capture'),
		'list'    => array(
			__('Fix a few dead links in the plugin', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.3.3', 'wp-email-capture'),
		'list'    => array(
			__('Fix bug in header on export (props Ov3rfly).', 'wp-email-capture'),
			__('Tested in 4.9', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.3.2', 'wp-email-capture'),
		'list' => array(
			__('Make it compatible with 4.8', 'wp-email-capture'),
			__('Make the "Buy Link" in WP Email Capture include a coupon', 'wp-email-capture'),
			__('Include links to compatible services on the Plugin Dashboard', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.3.1', 'wp-email-capture'),
		'list'    => array(
			__('Fixes a conflict with other plugins that send HTML emails.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.3', 'wp-email-capture'),
		'intro'   => __('This version introduced the ability to have HTML emails in WP Email Capture', 'wp-email-capture'),
		'list'    => array(
			__('Introduced the ability to have "HTML" enabled lists.', 'wp-email-capture'),
			__('Introduced the ability to send emails without headers. Useful for Amazon SES.', 'wp-email-capture'),
			__('Added a charset on export of CSV. (Props Ov3rfly)', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.2', 'wp-email-capture'),
		'list'    => array(
			sprintf(__('Correction in the German translation (props <a href="%s" target="_blank">Lars Kasper</a>)', 'wp-email-capture'), 'http://larskasper.de/'),
			__('Added a wp_email_capture_extra_checks action, that will allow people to run checks on the name/email address.', 'wp-email-capture'),
			__('Removed some legacy code that was commented out.', 'wp-email-capture'),
			__('Fix an encoding issue for new installs, now the tables match the database\'s encoding.', 'wp-email-capture'),
			__('Fixed a bug for new installs that had a "The plugin generated XXX characters of unexpected output during activation.".', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.1.4', 'wp-email-capture'),
		'list'    => array(
			__('Fixed a bug that caused an "Unexpected Output" on some database setups.', 'wp-email-capture'),
			__('Used UNIQUE KEY rather than PRIMARY KEY, so activation and deactivation doesn\'t cause database errors.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.1.3', 'wp-email-capture'),
		'list' => array(
			__('Added wp_email_capture_complete_before_redirect action. Allowing data to be manipulated before the redirect.', 'wp-email-capture'),
			__('Added Extensions area of dashboard.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.1.2', 'wp-email-capture'),
		'list'    => array(
			__('Reward linkers with a voucher code.', 'wp-email-capture'),
			__('Included the "Last Temporary Signup" date, so they get know the last attempted signup.', 'wp-email-capture'),
			__('Tested up to 4.5.', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.1.1', 'wp-email-capture'),
		'list'    => array(
			__('Removed a redundant file that, if hacked in, could lead to an injection of content. This file was *not* called normally but in order to remove it upgrade to this version. <strong>Update strongly required</strong>', 'wp-email-capture'),
			__('Fixed a bug which saw a notice appear of a missing option on the upgrade and dashboard page.', 'wp-email-capture'),
			__('Removed a double header in Dashboard widget (props Ove3rfly).', 'wp-email-capture'),
			__('Correct textdomain used in some files (props Ov3rfly).', 'wp-email-capture'),
			__('Removed all PHP closing tags through the site (props Ov3rfly).', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.1', 'wp-email-capture'),
		'list'    => array(
			sprintf(__('Removed the default widget title should widget text be blank (props <a href="%s" target="_blank">Hassan Raza</a>)', 'wp-email-capture'), 'http://hassan-raza.com/'),
			__('Changed word from "Update" to "Upgrade" for large lists as it was confusing people.', 'wp-email-capture'),
			__('Changed to new Text Domain as per WordPress new internationalisation integration (wp-email-capture).', 'wp-email-capture'),
		),
	);

	$changelog[] = array(
		'version' => __('3.0', 'wp-email-capture'),
		'title'   => __('Code Factorisation', 'wp-email-capture'),
		'intro'   => __('Version 3.0 introduces a completely rewritten back end, making it faster for the average user, and allowing extensions to be added to the plugin.', 'wp-email-capture'),
	);

	return $changelog;
}
