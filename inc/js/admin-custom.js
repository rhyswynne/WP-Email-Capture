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
});