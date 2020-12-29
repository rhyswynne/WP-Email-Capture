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

	// Only listen to YOUR notices being dismissed
	jQuery(document).on('click', '.notice-wp-email-mysql .notice-dismiss', function () {
		// Read the "data-notice" information to track which notice
		// is being dismissed and send it via AJAX
		var type = jQuery(this).closest('.notice-wp-email-mysql').data('notice');
		// Make an AJAX call
		// Since WP 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.ajax(ajaxurl,
			{
				type: 'POST',
				data: {
					action: 'dismissed_notice_handler',
					type: type,
				}
			});
	});
});
