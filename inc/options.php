<?php

function wp_email_capture_menus() {
    $avatar = WP_EMAIL_CAPTURE_URL . '/images/wpemailcapture-dashicon.png';
    //add_options_page( __( 'WP Email Capture Options', 'WPEC' ), 'WP Email Capture', 'activate_plugins', 'wpemailcaptureoptions', 'wp_email_capture_options' );
    add_menu_page(__('WP Email Capture'),__('WP Email Capture','WPEC'), 'activate_plugins', 'wpemailcapture', 'wp_email_capture_dashboard',$avatar,85);
    add_submenu_page('wpemailcapture',__('WP Email Capture Settings'), __('WP Email Capture Settings','WPEC'), 'activate_plugins', 'wpemailcapturefreesettings', 'wp_email_capture_free_options');
}


function wp_email_capture_dashboard() {

}


function wp_email_capture_free_options() {

    echo '<div class="wrap">
    <div style="width:70%;float:left;clear:both;" class="postbox-container">
    <div class="metabox-holder"><div class="meta-box-sortables">
    <h2>'.__( 'WP Email Capture Options', 'WPEC' ).'</h2>
    <h3>'.__( 'Options', 'WPEC' ).'</h3>';

    ?>

    <form method="post" action="options.php">

        <?php wp_nonce_field( 'update-options' ); ?>

        <?php settings_fields( 'wp-email-capture-group' ); ?>

        <table class="form-table">

            <tbody>

                <tr valign="top">

                    <th scope="row" style="width:400px"><?php _e( 'Page to redirect to on sign up (full web address ie: http://www.domain.com/this-page/)', 'WPEC' ); ?></th>

                    <td><input type="text" name="wp_email_capture_signup" class="regular-text code" value="<?php echo get_option( 'wp_email_capture_signup' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_redirection"><?php _e( 'Page to redirect to on confirmation of email address  (full web address ie: http://www.domain.com/this-other-page/)', 'WPEC' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_redirection" class="regular-text code" value="<?php echo get_option( 'wp_email_capture_redirection' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_from"><?php _e( 'From Which Email Address', 'WPEC' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_from" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_from' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_from_name"><?php _e( 'From Which Name', 'WPEC' ); ?></label></th>

                    <td><input type="text" name="wp_email_capture_from_name" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_from_name' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><?php _e( 'Subject of Email', 'WPEC' ); ?></th>

                    <td><input type="text" name="wp_email_capture_subject" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_subject' ); ?>" /></td>

                </tr>

                <tr valign="top">

                    <th scope="row" style="width:400px"><label for="wp_email_capture_body"><?php _e( 'Body of Email', 'WPEC' ); ?><br>
                        <?php _e( '(use %NAME% to use the form\'s &quot;Name&quot; field in their welcome email)', 'WPEC' ); ?></label></th>

                        <td><textarea name="wp_email_capture_body" style="width: 25em;"><?php echo get_option( 'wp_email_capture_body' ); ?></textarea></td>

                    </tr>

                    <tr valign="top">

                        <th scope="row" style="width:400px"><label><?php _e( 'Link to us (optional, but appreciated)', 'WPEC' ); ?></label></th>

                        <td><input type="checkbox" name="wp_email_capture_link" value="1" <?php checked( get_option( 'wp_email_capture_link' ), 1 ); ?> /></td>

                        </tr>

                        <tr valign="top">

                            <th scope="row" style="width:400px"><label><?php _e( 'Make The "Name" field a required field?', 'WPEC' ); ?></label></th>

                            <td><input type="checkbox" name="wp_email_capture_name_required" value="1" <?php checked( get_option( 'wp_email_capture_name_required' ), 1 ); ?> /></td>

                            </tr>

                            <tr valign="top">

                                <th scope="row" style="width:400px"><?php _e( 'Delimeter (leave blank for a comma)', 'WPEC' ); ?></th>

                                <td><input type="text" name="wp_email_capture_name_delimeter" class="regular-text code"  value="<?php echo get_option( 'wp_email_capture_name_delimeter' ); ?>" /></td>

                            </tr>

                        </tbody>

                    </table>

                    <input type="hidden" name="action" value="update" />

                    <input type="hidden" name="page_options" value="wp_email_capture_redirection,wp_email_capture_from,wp_email_capture_subject,wp_email_capture_signup,wp_email_capture_body,wp_email_capture_from_name,wp_email_capture_link,wp_email_capture_name_required,wp_email_capture_name_delimeter" />

                    <p class="submit">

                        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'WPEC' ) ?>" />

                    </p>

                </form>



                <?php

                wp_email_capture_writetable();

                echo '<a name="list"></a><h3>'.__( 'Export', 'WPEC' ).'</h3>
                <form name="wp_email_capture_export" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#list" method="post">

                <label>'.__( 'Use the button below to export your list as a CSV to use in software such as <a href="http://wpemailcapture.com/recommends/aweber" title="Email Marketing">Aweber</a> or <a href="http://wpemailcapture.com/recommends/mailchimp">Mailchimp</a>', 'WPEC' ).'</label>
                <input type="hidden" name="wp_email_capture_export" />
                <div class="submit">
                <input type="submit" value="'.__( 'Export List', 'WPEC' ).'" class="button"  />
                </div>

                </form>';

                $tempemails = wp_email_capture_count_temp();

                echo "<a name='truncate'></a><h3>".__( 'Temporary e-mails', 'WPEC' )."</h3>\n";

                echo '<form name="wp_email_capture_truncate" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#truncate" method="post">';

                echo '<label>'.__( 'There are', 'WPEC' ).' '. $tempemails . ' '.__( 'e-mail addresses that have been unconfirmed. Delete them to save space below.', 'WPEC' ).'</label>';

                echo '<input type="hidden" name="wp_email_capture_truncate"/>';

                echo '<div class="submit"><input type="submit" value="'.__( 'Delete Unconfirmed e-mail Addresses', 'WPEC' ).'" class="button"  /></div>';

                echo "</form>";

                echo "<a name='emptyallemails'></a><h3>".__( 'Delete Current List', 'WPEC' )."</h3>\n";

                echo '<form name="wp_email_capture_delete" action="'. esc_url( $_SERVER['REQUEST_URI'] ) . '#delete" method="post">';

                echo '<label>'.__( 'Want to delete the entire list? Click the link below. <strong>WARNING: </strong> this will delete all confirmed emails, so make sure you have a backup.', 'WPEC' ).'</label>';

                echo '<input type="hidden" name="wp_email_capture_delete"/>';

                echo '<div class="submit"><input type="submit" value="'.__( 'Delete Confirmed e-mail Addresses', 'WPEC' ).'" class="button"  /></div>';

                echo "</form>";

                echo '</div></div></div>';

                wp_email_capture_admin_sidebar( "getwpemailcapturepremiumdescription,affiliates,news,supportus" );

                echo '</div>';
                ?>


                <?php }



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

}

?>
