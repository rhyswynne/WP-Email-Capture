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