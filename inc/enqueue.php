<?php

function wp_email_capture_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_style( 'wpemailcapturestyles', WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-styles.css', array(), '1.0' );
   }
add_action( 'wp_enqueue_scripts', 'wp_email_capture_scripts' );

?>