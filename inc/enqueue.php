<?php

function wp_email_capture_scripts() {
       /* Register our stylesheet. */
       wp_enqueue_style( 'wpemailcapturestyles', plugins_url('/css/wp-email-capture-styles.css',__FILE__), array(), '1.0' );
   }
add_action( 'wp_enqueue_scripts', 'wp_email_capture_scripts' );

?>