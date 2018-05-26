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

	jQuery('#wp_email_capture_enable_gdpr').change(function () {
		if (this.checked) {
			jQuery('.gdpr-table').show();
		} else {
			jQuery('.gdpr-table').hide();
		}
	});

	jQuery('#wp_email_capture_unit_for_privacy').change(function () {
		jQuery('.save-to-change').show();
		jQuery('#copytext').prop( "disabled", true );
	});

	jQuery('#wp_email_capture_number_for_privacy').change(function () {
		jQuery('.save-to-change').show();
		jQuery('#copytext').prop("disabled", true);
	});

	jQuery('#copytext').click( function () {
		/* Select the text field */
		jQuery('#copyrightnotice').prop('disabled', false);
		jQuery('#copyrightnotice').select();
		document.execCommand("Copy");
		jQuery('#copyrightnotice').prop('disabled', true);
	});

});