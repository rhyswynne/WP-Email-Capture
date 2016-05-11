jQuery(document).ready(function () {
	jQuery('a.nav-tab').click(function () {
		jQuery('.wpemailcapture-tab').removeClass('active');
		jQuery('.wpemailcapture-tab').removeClass('active');
		var id = jQuery(this).attr('href');
		jQuery(id).addClass('active');
	});

	jQuery('a.non-nav-tab').click(function () {
		jQuery('.wpemailcapture-tab').removeClass('active');
		jQuery('.wpemailcapture-tab').removeClass('active');
		var id = jQuery(this).attr('href');
		jQuery(id).addClass('active');
	});

	jQuery('#wp_email_capture_link_checkbox').change(function() {
		if(this.checked) {
			jQuery('.wp_email_capture_admin_discount').show();
		} else {
			jQuery('.wp_email_capture_admin_discount').hide();
		}
	});
});