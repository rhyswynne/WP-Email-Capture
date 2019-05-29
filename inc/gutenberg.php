<?php

defined( 'ABSPATH' ) || exit;



function wp_email_capture_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'wp-email-capture-gutenberg',
		WP_EMAIL_CAPTURE_URL . '/inc/js/block.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'underscore', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . '/js/block.js' )
	);
}



function wp_email_capture_enqueue_block_editor_css() {
	wp_enqueue_style(
		'wp-email-capture-gutenberg-css-styles',
		WP_EMAIL_CAPTURE_URL . '/inc/css/wp-email-capture-gutenberg-styles.css',
		array( 'wp-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . '/css/wp-email-capture-gutenberg-styles.css' )
	);
}