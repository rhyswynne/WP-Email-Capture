<?php

/**
 * Enqueue stylesheets associated with the plugin.
 * @return void
 */
function wp_email_capture_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_style( 'wpemailcapturestyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-styles.css', array(), '1.0' );     
}


/**
 * Enqueue stylesheets associated with the plugin.
 * @return void
 */
function wp_email_capture_admin_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_script( 'wpemailcaptureadminjs', WP_EMAIL_CAPTURE_URL . '/inc/js/admin-custom.js', array( 'jquery' ), '3.0' );
       wp_enqueue_style( 'wpemailcapturestyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-admin-styles.css', array(), '1.0' );     
}

?>