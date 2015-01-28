<?php

class wp_email_capture_widget_class extends WP_Widget {
	
	function wp_email_capture_widget_class() {
		parent::WP_Widget('wp_email_capture_widget_class', __('WP Email Capture','WPEC'), array('description' =>__('Widget for WP Email Capture','WPEC')));	
	}

	
	function widget($args, $instance) {



		// $args is an array of strings which help your widget
		// conform to the active theme: before_widget, before_title,
		// after_widget, and after_title are the array keys.

		extract($args);
		extract($args, EXTR_SKIP);

		$title = empty($instance['widget_title']) ? __('Subscribe!','WPEC') : apply_filters('widget_title', $instance['widget_title']);
		$text = empty($instance['widget_text']) ? __('Subscribe to my blog for updates','WPEC') : $instance['widget_text'];
        
        echo $before_widget;

		echo $before_title . $title . $after_title;

		echo '<div class="textwidget">'.$text.'</div>';

        wp_email_capture_form();

		echo $after_widget;


	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags($new_instance['widget_title']);
		$instance['widget_text'] = strip_tags($new_instance['widget_text']);
		return $instance;
	}
 
	/**
	 *	admin control form
	 */	 	
	function form($instance) {
		$default = array( 'widget_title' =>  __('Subscribe!','WPEC'), 'widget_text' =>  __('Subscribe to my blog for updates','WPEC')  );
		$instance = wp_parse_args( (array) $instance, $default );
 
		$title_id = $this->get_field_id('widget_title');
		$title_name = $this->get_field_name('widget_title');
		$text_id = $this->get_field_id('widget_text');
		$text_name = $this->get_field_name('widget_text');
		echo "\r\n".'<p><label for="'.$title_id.'">'.__('Widget title:','WPEC').': <input type="text" class="widefat" id="'.$title_id.'" name="'.$title_name.'" value="'.esc_attr( $instance['widget_title'] ).'" /><label></p>';
        echo "\r\n".'<p><label for="'.$text_id.'">'.__('Widget text:','WPEC').': <input type="text" class="widefat" id="'.$text_id.'" name="'.$text_name .'" value="'.esc_attr( $instance['widget_text'] ).'" /><label></p>';
    	
	}

}

add_action('widgets_init', 'wp_email_capture_widget_init');

function wp_email_capture_widget_init(){
	// curl need to be installed
	register_widget('wp_email_capture_widget_class');
}
/*
function wp_email_capture_widget_init() {



	// Check to see required Widget API functions are defined...

	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )

		return; // ...and if not, exit gracefully from the script.



	// This function prints the sidebar widget--the cool stuff!

	function wp_email_capture_widget($args) {



		// $args is an array of strings which help your widget

		// conform to the active theme: before_widget, before_title,

		// after_widget, and after_title are the array keys.

		extract($args);



		// Collect our widget's options, or define their defaults.

		$options = get_option('wp_email_capture_widget');

		$title = empty($options['title']) ? __('Subscribe!','WPEC') : $options['title'];

		$text = empty($options['text']) ? __('Subscribe to my blog for updates','WPEC') : $options['text'];



 		// It's important to use the $before_widget, $before_title,

 		// $after_title and $after_widget variables in your output.

		echo $before_widget;

		echo $before_title . $title . $after_title;

		echo $text;

		wp_email_capture_form();

		echo $after_widget;

	}



	// This is the function that outputs the form to let users edit

	// the widget's title and so on. It's an optional feature, but

	// we'll use it because we can!

	function wp_email_capture_widget_control() {



		// Collect our widget's options.

		$options = get_option('wp_email_capture_widget');
	
		$newoptions = get_option('wp_email_capture_widget');

		// This is for handing the control form submission.

		if ( $_POST['wp-email-capture-submit'] ) {

			// Clean up control form submission options

			$newoptions['title'] = strip_tags(stripslashes($_POST['wp-email-capture-title']));

			$newoptions['text'] = strip_tags(stripslashes($_POST['wp-email-capture-text']));

		}



		// If original widget options do not match control form

		// submission options, update them.

		if ( $options != $newoptions ) {

			$options = $newoptions;

			update_option('wp_email_capture_widget', $options);

		}



		// Format options as valid HTML. Hey, why not.

		$title = htmlspecialchars($options['title'], ENT_QUOTES);

		$text = htmlspecialchars($options['text'], ENT_QUOTES);



// The HTML below is the control form for editing options.

?>

		<div>

		<label for="wp-email-capture-title" style="line-height:35px;display:block;"><?php _e('Widget title:','WPEC'); ?> <input type="text" id="wp-email-capture-title" name="wp-email-capture-title" value="<?php echo $title; ?>" /></label>

		<label for="wp-email-capture-text" style="line-height:35px;display:block;"><?php _e('Widget text:','WPEC'); ?> <input type="text" id="wp-email-capture-text" name="wp-email-capture-text" value="<?php echo $text; ?>" /></label>

		<input type="hidden" name="wp-email-capture-submit" id="wp-email-capture-submit" value="1" />

		</div>

	<?php

	// end of widget_mywidget_control()

	}



	// This registers the widget. About time.

	wp_register_sidebar_widget('wpemailcapture',__('WP Email Capture','WPEC'), 'wp_email_capture_widget');



	// This registers the (optional!) widget control form.

	wp_register_widget_control('wpemailcapture',__('WP Email Capture','WPEC'), 'wp_email_capture_widget_control');

}



// Delays plugin execution until Dynamic Sidebar has loaded first.

add_action('plugins_loaded', 'wp_email_capture_widget_init');

*/

?>