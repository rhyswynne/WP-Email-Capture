<?php

/**
 * Class to display the WP Email Capture Widget.
 */
class wp_email_capture_widget_class extends WP_Widget {
	
	public function __construct() {
		parent::__construct('wp_email_capture_widget_class', __('WP Email Capture','WPEC'), array('description' =>__('Widget for WP Email Capture','WPEC')));	
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

		echo '<div class="textwidget"><p>'.$text.'</p></div>';

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



function wp_email_capture_widget_init(){
	// curl need to be installed
	register_widget('wp_email_capture_widget_class');
}


?>