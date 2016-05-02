<?php

/**
 * @package WP Email Capture   
 * @subpackage Admin
 */
if ( ! defined( 'WP_EMAIL_CAPTURE_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * WPEC Tracking Class, taken from the Yoast SEO Tracking class. Props Yoast & team. :)
 */
class WPEC_Tracking {
	/**
	 * @var    object    Instance of this class
	 */
	public static $instance;
	/**
	 * Class constructor
	 */
	function __construct() {
		add_action( 'wpec_tracking', array( $this, 'tracking' ), 10 );
		add_filter( 'wpec_tracking_filters', array( $this, 'tracking_additions' ), 5 );
	}
	/**
	 * Get the singleton instance of this class
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Main tracking function.
	 */
	function tracking() {
		$transient_key = 'wpec_tracking_cache';
		$data          = get_transient( $transient_key );
		// bail if transient is set and valid
		if ( $data !== false ) {
			return;
		}
		// Make sure to only send tracking data once a week
		set_transient( $transient_key, 1, WEEK_IN_SECONDS );
		// Start of Metrics
		global $blog_id, $wpdb;
		$hash = get_option( 'WPEC_Tracking_Hash', false );
		if ( ! $hash || empty( $hash ) ) {
			// create and store hash
			$hash = md5( site_url() );
			update_option( 'WPEC_Tracking_Hash', $hash );
		}
		$pts        = array();
		$post_types = get_post_types( array( 'public' => true ) );
		if ( is_array( $post_types ) && $post_types !== array() ) {
			foreach ( $post_types as $post_type ) {
				$count             = wp_count_posts( $post_type );
				$pts[ $post_type ] = $count->publish;
			}
		}
		unset( $post_types );
		$comments_count = wp_count_comments();
		$theme_data     = wp_get_theme();
		$theme          = array(
			'name'       => $theme_data->display( 'Name', false, false ),
			'theme_uri'  => $theme_data->display( 'ThemeURI', false, false ),
			'version'    => $theme_data->display( 'Version', false, false ),
			'author'     => $theme_data->display( 'Author', false, false ),
			'author_uri' => $theme_data->display( 'AuthorURI', false, false ),
			);
		$theme_template = $theme_data->get_template();
		if ( $theme_template !== '' && $theme_data->parent() ) {
			$theme['template'] = array(
				'version'    => $theme_data->parent()->display( 'Version', false, false ),
				'name'       => $theme_data->parent()->display( 'Name', false, false ),
				'theme_uri'  => $theme_data->parent()->display( 'ThemeURI', false, false ),
				'author'     => $theme_data->parent()->display( 'Author', false, false ),
				'author_uri' => $theme_data->parent()->display( 'AuthorURI', false, false ),
				);
		}
		else {
			$theme['template'] = '';
		}
		unset( $theme_template );
		$plugins       = array();
		$active_plugin = get_option( 'active_plugins' );
		foreach ( $active_plugin as $plugin_path ) {
			if ( ! function_exists( 'get_plugin_data' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			$plugin_info = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin_path );
			$slug           = str_replace( '/' . basename( $plugin_path ), '', $plugin_path );
			$plugins[ $slug ] = array(
				'version'    => $plugin_info['Version'],
				'name'       => $plugin_info['Name'],
				'plugin_uri' => $plugin_info['PluginURI'],
				'author'     => $plugin_info['AuthorName'],
				'author_uri' => $plugin_info['AuthorURI'],
				);
		}
		unset( $active_plugins, $plugin_path );
		$data = array(
			'site'     => array(
				'hash'      => $hash,
				'version'   => get_bloginfo( 'version' ),
				'multisite' => is_multisite(),
				'users'     => $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->users INNER JOIN $wpdb->usermeta ON ({$wpdb->users}.ID = {$wpdb->usermeta}.user_id) WHERE 1 = 1 AND ( {$wpdb->usermeta}.meta_key = %s )", 'wp_' . $blog_id . '_capabilities' ) ),
				'lang'      => get_locale(),
				),
			'pts'      => $pts,
			'comments' => array(
				'total'    => $comments_count->total_comments,
				'approved' => $comments_count->approved,
				'spam'     => $comments_count->spam,
				'pings'    => $wpdb->get_var( "SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_type = 'pingback'" ),
				),
			'options'  => apply_filters( 'wpec_tracking_filters', array() ),
			'theme'    => $theme,
			'plugins'  => $plugins,
			);
		$args = array(
			'body'      => $data,
			'blocking'  => false,
			'sslverify' => false,
			);
		//wp_die(print_r($data));
		wp_remote_post( 'http://tracking.winwar.co.uk/', $args );
	}

	function tracking_additions( $options ) {
	
		if ( function_exists( 'curl_version' ) ) {
			$curl = curl_version();
		}
		else {
			$curl = null;
		}
		
		$options['wpemailcapture'] = array( 
			'listsize'	=> wp_email_capture_get_number_of_registered_users(),
			'tempsize'	=> wp_email_capture_count_temp(),
			'linktous'	=> get_option( 'wp_email_capture_link' )
			);
		return $options;
	}
} /* End of class */

/**
 * Start tracking
 * @return void
 */
function wpec_start_tracking() {
	$tracking = new WPEC_Tracking;
} 

/**
 * Action tracking wrapper.
 * @return void
 */
function wpec_do_tracking() {
	do_action('wpec_tracking');
}