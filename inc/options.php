<?php

/**
 * Set up the WP Email Capture Menus
 * @return void
 */
function wp_email_capture_menus() {
    $avatar = WP_EMAIL_CAPTURE_URL . '/images/wpemailcapture-dashicon.png';
    //add_options_page( __( 'WP Email Capture Options', 'wp-email-capture' ), 'WP Email Capture', 'activate_plugins', 'wpemailcaptureoptions', 'wp_email_capture_options' );
    add_menu_page(__('WP Email Capture'),__('WP Email Capture','WPEC'), 'activate_plugins', 'wpemailcapture', 'wp_email_capture_dashboard',$avatar,85);
    add_submenu_page('wpemailcapture',__('Settings'), __('Settings','WPEC'), 'activate_plugins', 'wpemailcapturefreesettings', 'wp_email_capture_free_options');
    add_submenu_page('wpemailcapture',__('Help'), __('Help','WPEC'), 'activate_plugins', 'wpemailcapturefreehelp', 'wp_email_capture_free_help');
}


/**
 * Contents of the WP Email Capture Dashboard Page
 *
 * @todo   Build this
 * @return void
 */
function wp_email_capture_dashboard() {

    ?>
    <div class="wrap about-wrap">

        <h1><?php _e( 'Welcome to WP Email Capture!', 'wp-email-capture' ); ?></h1>

        <div class="about-text">
            <?php _e( 'Start collecting email subscribers today!', 'wp-email-capture' ); ?><br/>
        </div>

        <h2 class="nav-tab-wrapper" id="wpemailcapture-tabs">
            <a class="nav-tab" href="#dashboard" id="dashboard-tab"><?php _e( 'Dashboard', 'wp-email-capture' ); ?></a>
            <a class="nav-tab" href="#changelog" id="changelog-tab"><?php _e( 'Changelog', 'wp-email-capture' ); ?></a>
            <a class="nav-tab" href="#credits" id="credits-tab"><?php _e( 'Credits', 'wp-email-capture' ); ?></a>
        </h2>

        <div id="dashboard" class="wpemailcapture-tab <?php if ( !esc_attr( $_GET['wpecupgrade'] ) ) { echo " active "; } ?>">
            <h2><?php _e( 'Welcome to WP Email Capture', 'wp-email-capture' ); ?></h2>

            <h3><?php _e( 'New in 3.0 - Complete Rewrite', 'wp-email-capture' ); ?></h3>

            <p><?php _e( 'Version 3.0 introduces a completely rewritten back end, making it faster for the average user, and allowing extensions to be added to the plugin. We also introduced two new translations and fixed a bug.', 'WPEC'); ?></p>

            <p><a class="non-nav-tab" href="#changelog" id="changelog-tab"><?php _e( 'Read the changelog', 'WPEC'); ?></a></p>

            <?php

            do_action( 'wp_email_capture_dashboard_premium_upsell' );

            ?>

            <?php /* <h2><?php _e( 'Extensions', 'wp-email-capture' ); ?></h2> */ ?>
        </div>

        <div id="changelog" class="wpemailcapture-tab <?php if ( esc_attr( $_GET['wpecupgrade'] ) ) { echo " active "; } ?>">
            <h2><?php _e( 'Changelog', 'wp-email-capture' ); ?></h2>
            <h3><?php _e( 'Code Refactorisation', 'wp-email-capture' ); ?></h3>
            <p><?php _e( 'Version 3.0 introduces a completely rewritten back end, making it faster for the average user, and allowing extensions to be added to the plugin.', 'WPEC'); ?></p>
            <h3><?php _e( 'Other Changes', 'wp-email-capture' ); ?></h3>
            <ul>
                <li><?php _e( 'Fixed a bug that the "Hide Notice" dismissive now works.', 'wp-email-capture' ); ?></li>
                <li><?php echo sprintf( __( 'Updated French Translation (thanks <a href="%s" target="_blank">Andrew</a>).', 'wp-email-capture' ), 'http://www.acusti.ca/' ); ?></li>
                <li><?php echo sprintf( __( 'Added Croatian Translation (thanks <a href="%s" target="_blank">Lem Treursić</a>).', 'wp-email-capture'), 'http://grafika-dizajn.com/' ); ?></li>
                <li><?php _e( 'Added Welcome Screen', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Added P tag around text widget introduction.', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Added better help documentation within the plugin.', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Added signup & confirm actions, to allow users to remove/add their own actions.', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Added a filter to the display form, so it can be changed.', 'wp-email-capture' ); ?></li>
                <li><?php echo sprintf( __( 'Add a filter for other subscription plugins (props  <a href="%s" target="_blank">Dylan Kuhn</a>', 'wp-email-capture' ) , 'http://www.cyberhobo.net/' ); ?></li>
                <li><?php _e( 'Changed menu structure', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Made compatible with WordPress 4.3, with new widget structure.', 'wp-email-capture' ); ?></li>
                <li><?php _e( 'Made compatible with new language packs.', 'wp-email-capture' ); ?></li>
            </ul>
        </div>

        <div id="credits" class="wpemailcapture-tab">
            <h2><?php _e( 'Credits', 'wp-email-capture' ); ?></h2>
            <p><?php _e( 'This plugin has been helped and improved by the following people', 'wp-email-capture' ); ?></p>
            <h3><?php _e('Translations', 'wp-email-capture' ); ?></h3>
            <ul>
                <li><?php echo sprintf( __( '<strong>French Translation:</strong> <a href="%s" target="_blank">Olivier</a> & <a href="%s" target="_blank">Andrew Patton</a> <a href="%s" target="_blank">(@andpatton)</a>.','WPEC' ), 'http://www.ticket-system.net/', 'http://www.acusti.ca/', 'http://twitter.com/andpatton' ); ?><li> 
                    <li><?php echo sprintf( __( '<strong>German Translation:</strong> <a href="%s" target="_blank">Stephan</a>, <a href="%s" target="_blank">Marc Nilius</a> <a href="%s" target="_blank">(@libertello)</a> &amp; Ov3rFly', 'wp-email-capture' ), 'http://www.computersniffer.com/', 'http://www.libertello.de/', 'http://twitter.com/libertello' ); ?></li> 
                    <li><?php echo sprintf( __( '<strong>Brazilian Portugese Translation:</strong> <a href="%s" target="_blank">Nick Lima</a> <a href="%s" target="_blank">(@nick_linux)</a>', 'wp-email-capture' ), 'http://www.nicklima.com.br', 'http://twitter.com/nick_linux' ); ?></li> 
                    <li><?php echo sprintf( __( '<strong>Dutch Translation:</strong> <a href="%s" target="_blank">Sander</a>', 'wp-email-capture' ), 'http://www.zanderz.net/' ); ?></li>
                    <li><?php echo sprintf( __( '<strong>Hungarian Translation:</strong> <a href="%s" target="_blank">Surbma</a>', 'wp-email-capture' ), 'http://surbma.hu/' ); ?></li>
                    <li><?php echo sprintf( __( '<strong>Spanish Translation:</strong> <a href="%s" target="_blank">David Bravo</a>' , 'wp-email-capture' ), 'http://dimensionmultimedia.com' ); ?></li>
                    <li><?php echo sprintf( __( '<strong>Italian Translation:</strong> <a href="%s" target="_blank">Giuseppe Marino</a>' , 'wp-email-capture' ), 'http://it.gravatar.com/gpmarino' ); ?></li>
                    <li><?php echo sprintf( __( '<strong>Serbian Translation:</strong> <a href="%s" target="_blank">Borisa Djuraskovic</a>' , 'wp-email-capture' ), 'http://www.webhostinghub.com/' ); ?></li>
                    <li><?php echo sprintf( __( '<strong>Croatian Translation:</strong> <a href="%s" target="_blank">Lem Treursić</a>' , 'wp-email-capture' ), 'http://grafika-dizajn.com/' ); ?></li>
                </ul>
                <h3><?php _e( 'Contribute?', 'wp-email-capture' ); ?></h3>
                <h4><?php echo sprintf( __( 'If you want to help, you can contribute a fix or report a bug on our <a href="%s" target="_blank">Github</a>', 'wp-email-capture' ), 'https://github.com/rhyswynne/wp-email-capture' ); ?></h4>
            </div>
        </div>
        <?php

    }


/**
 * Contents of the WP Email Capture Options Page
 *
 * @return void
 */
function wp_email_capture_free_options() {

    echo '<div class="wrap">
    <div style="width:70%;float:left;clear:both;" class="postbox-container">
    <div class="metabox-holder"><div class="meta-box-sortables">
    <h2>'.__( 'WP Email Capture Options', 'wp-email-capture' ).'</h2>
    <h3>'.__( 'Options', 'wp-email-capture' ).'</h3>';

    ?>

    <form method="post" action="options.php">

        <?php wp_nonce_field( 'update-options' ); ?>

        <?php settings_fields( 'wp-email-capture-group' ); ?>

        <table class="form-table">

            <tbody>

                <tr valign="top">

                    <th scope="row" style="width:400px"><?php _e( 'Page to redirect to on sign up (full web address ie: http://www.domain.com/this-page/)', 'wp-email-capture' ); ?></th>

                    <td><input type="text" name="wp_email_capture_signup" class="regular-text code" value="<?php echo get_option( 'wp_email_capture_signup' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_redirection"><?php _e( 'Page to redirect to on confirmation of email address  (full web address ie: http://www.domain.com/this-other-page/)', 'wp-email-capture' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_redirection" class="regular-text code" value="<?php echo get_option( 'wp_email_capture_redirection' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_from"><?php _e( 'From Which Email Address', 'wp-email-capture' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_from" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_from' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_from_name"><?php _e( 'From Which Name', 'wp-email-capture' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_from_name" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_from_name' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><?php _e( 'Subject of Email', 'wp-email-capture' ); ?></th>

                    <td><input type="text" name="wp_email_capture_subject" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_subject' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_body"><?php _e( 'Body of Email', 'wp-email-capture' ); ?><br>
                        <?php _e( '(use %NAME% to use the form\'s &quot;Name&quot; field in their welcome email)', 'wp-email-capture' ); ?></label>
                    </th>

                    <td><textarea name="wp_email_capture_body" style="width: 25em;"><?php echo get_option( 'wp_email_capture_body' ); ?></textarea></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label><?php _e( 'Link to us (optional, but appreciated)', 'wp-email-capture' ); ?></label></th>

                    <td><input type="checkbox" name="wp_email_capture_link" value="1" <?php checked( get_option( 'wp_email_capture_link' ), 1 ); ?> /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label><?php _e( 'Make The "Name" field a required field?', 'wp-email-capture' ); ?></label></th>

                    <td><input type="checkbox" name="wp_email_capture_name_required" value="1" <?php checked( get_option( 'wp_email_capture_name_required' ), 1 ); ?> /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><?php _e( 'Delimeter (leave blank for a comma)', 'wp-email-capture' ); ?></th>

                    <td><input type="text" name="wp_email_capture_name_delimeter" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_name_delimeter' ); ?>" /></td>

                </tr>

            </tbody>

        </table>

        <input type="hidden" name="action" value="update" />

        <input type="hidden" name="page_options" value="wp_email_capture_redirection,wp_email_capture_from,wp_email_capture_subject,wp_email_capture_signup,wp_email_capture_body,wp_email_capture_from_name,wp_email_capture_link,wp_email_capture_name_required,wp_email_capture_name_delimeter" />

        <p class="submit">

            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'wp-email-capture' ) ?>" />

        </p>

    </form>



    <?php

    wp_email_capture_writetable();

    echo '<a name="list"></a><h3>'.__( 'Export', 'wp-email-capture' ).'</h3>
    <form name="wp_email_capture_export" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#list" method="post">

    <label>'.__( 'Use the button below to export your list as a CSV to use in software such as <a href="http://wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="http://wpemailcapture.com/recommends/mailchimp">Mailchimp</a>', 'wp-email-capture' ).'</label>
    <input type="hidden" name="wp_email_capture_export" />
    <div class="submit">
    <input type="submit" value="'.__( 'Export List', 'wp-email-capture' ).'" class="button"  />
    </div>

    </form>';

    $tempemails = wp_email_capture_count_temp();

    echo "<a name='truncate'></a><h3>".__( 'Temporary e-mails', 'wp-email-capture' )."</h3>\n";

    echo '<form name="wp_email_capture_truncate" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#truncate" method="post">';

    echo '<label>'.__( 'There are', 'wp-email-capture' ).' '. $tempemails . ' '.__( 'e-mail addresses that have been unconfirmed. Delete them to save space below.', 'wp-email-capture' ).'</label>';

    echo '<input type="hidden" name="wp_email_capture_truncate"/>';

    echo '<div class="submit"><input type="submit" value="'.__( 'Delete Unconfirmed e-mail Addresses', 'wp-email-capture' ).'" class="button"  /></div>';

    echo "</form>";

    echo "<a name='emptyallemails'></a><h3>".__( 'Delete Current List', 'wp-email-capture' )."</h3>\n";

    echo '<form name="wp_email_capture_delete" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#delete" method="post">';

    echo '<label>'.__( 'Want to delete the entire list? Click the link below. <strong>WARNING: </strong> this will delete all confirmed emails, so make sure you have a backup.', 'wp-email-capture' ).'</label>';

    echo '<input type="hidden" name="wp_email_capture_delete"/>';

    echo '<div class="submit"><input type="submit" value="'.__( 'Delete Confirmed e-mail Addresses', 'wp-email-capture' ).'" class="button"  /></div>';

    echo "</form>";

    echo '</div></div></div>';

    wp_email_capture_admin_sidebar( "getwpemailcapturepremiumdescription,affiliates,news,supportus" );

    echo '</div>';
    ?>


    <?php 
}


/**
 * Save the options from the WP Email Capture Options Page.
 * 
 * @return void
 */
function wp_email_capture_options_process() { // whitelist options

    register_setting( 'wp-email-capture-group', 'wp_email_capture_signup' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_redirection' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_from' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_subject' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_body' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_link' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_from_name' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_name_required' );

    register_setting( 'wp-email-capture-group', 'wp_email_capture_name_delimeter' );

    if ( isset( $_REQUEST['wp_email_capture_export'] ) ) {

        wp_email_capture_export();

    }

    if ( isset( $_REQUEST['wp_email_capture_deleteid'] ) ) {
        $wpemaildeleteid = esc_attr( $_POST['wp_email_capture_deleteid'] );
        wp_email_capture_deleteid( $wpemaildeleteid );
    }


    if ( isset( $_REQUEST['wp_email_capture_truncate'] ) ) {

        wp_email_capture_truncate();

    }

    if ( isset( $_REQUEST['wp_email_capture_delete'] ) ) {

        wp_email_capture_delete();

    }

    /**
     * Action to hook into to register any other options.
     */
    do_action( 'wp_email_capture_added_option_process' );

}


/**
 * Box to upsell WP Email Capture Premium
 * 
 * @return void
 */
function wp_email_capture_premium_upsell() {
    ?>
    <h3><?php _e( 'Upgrade To WP Email Capture Premium', 'wp-email-capture' ); ?></h3>
    <p><?php _e( 'Thanks for using the free version of WP Email Capture. We\'re incredibly greatful in you using it. Should you wish to upgrade to WP Email Capture Premium, you get a bunch of new features.', 'wp-email-capture' ); ?></p>
    <ul>
        <li><?php _e( '<strong>Stat tracking</strong> - track the visitors to your site and where your sign ups come from.', 'wp-email-capture' ); ?></li>
        <li><?php _e( '<strong>Autoresponders</strong> - Create an autoresponder email, an email sent to the user when they sign up to your site.', 'wp-email-capture' ); ?></li>
        <li><?php _e( '<strong>Multiple lists</strong> - Create multiple lists for your site.', 'wp-email-capture' ); ?></li>
        <li><?php _e( '<strong>Build External Lists</strong> - If you have a Mailchimp or Aweber account, you can use WP Email Capture to build to these services directly.', 'wp-email-capture' ); ?></li>
        <li><?php _e( '<strong>Custom Fields</strong> - You can capture more than just visitors name & email, add your own custom fields to capture (such as phone number or Address).', 'wp-email-capture' ); ?></li>
    </ul>
    <p><?php _e( 'You also get premium support for a whole year!', 'wp-email-capture' ); ?></p>
    <a href="http://wpemailcapture.com/premium/?utm_source=plugin-dashboard&utm_medium=plugin&utm_campaign=wpemailcapture" target="_blank"><button><?php _e( 'Click here to buy', 'wp-email-capture' ); ?></button></a>
    <?php
} add_action( 'wp_email_capture_dashboard_premium_upsell', 'wp_email_capture_premium_upsell' );

?>