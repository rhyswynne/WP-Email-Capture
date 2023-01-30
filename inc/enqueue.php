<?php

/**
 * Enqueue stylesheets associated with the plugin.
 * @return void
 */
function wp_email_capture_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_style( 'wpemailcapturestyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-styles.css', array(), WP_EMAIL_CAPTURE_VERSION );

       if ( 1 == get_option( 'wp_email_capture_default_styling' ) ) {
       	/* Register our default stylesheet. */
       wp_enqueue_style( 'wpemailcapturedefaultstyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-default-styles.css', array(), WP_EMAIL_CAPTURE_VERSION );
       }

       /* if ( 'disable' != get_option( 'wp_email_capture_recaptcha_api_type' ) && get_option( 'wp_email_capture_recaptcha_api_type' ) ) {
              wp_enqueue_script( 'wpec-recaptcha-v2', 'https://www.google.com/recaptcha/api.js', array() );
       }

       if ( 'invisible' == get_option( 'wp_email_capture_recaptcha_api_type' ) ) {
              wp_enqueue_script( 'wpec-recaptcha-v2', WP_EMAIL_CAPTURE_URL . '/inc/js/enqueue-invisible.js', array( 'wpec-recaptcha-v2' ), WP_EMAIL_CAPTURE_VERSION );
       } */

       if ( get_option( 'wp_email_capture_recaptcha_server_api_key') && get_option( 'wp_email_capture_recaptcha_client_api_key') ) {
              wp_enqueue_script( 'wpec-recaptcha-v3', 'https://www.google.com/recaptcha/api.js?render=' . get_option( 'wp_email_capture_recaptcha_client_api_key' ), array() );
              wp_register_script( 'wpec-recaptcha-handling', WP_EMAIL_CAPTURE_URL . '/inc/js/recaptcha-handling.js', array('wpec-recaptcha-v3', 'jquery'), WP_EMAIL_CAPTURE_VERSION );
              wp_localize_script( 'wpec-recaptcha-handling', 'wpec_recaptcha_object',
                     array(
                     'client_side_key' => get_option( 'wp_email_capture_recaptcha_client_api_key' ),
                     )
              );
              wp_enqueue_script( 'wpec-recaptcha-handling' );
       }
}


/**
 * Enqueue stylesheets associated with the plugin.
 * @return void
 */
function wp_email_capture_admin_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_script( 'wpemailcaptureadminjs', WP_EMAIL_CAPTURE_URL . '/inc/js/admin-custom.js', array( 'jquery' ), WP_EMAIL_CAPTURE_VERSION );
       wp_enqueue_style( 'wpemailcapturestyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-admin-styles.css', array(), WP_EMAIL_CAPTURE_VERSION );
}