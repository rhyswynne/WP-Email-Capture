(function() {
	tinymce.PluginManager.add('wpemailcapturebutton', function( editor, url ) {
		var urlimg = url.replace("js", "img");
		console.log( urlimg );
        editor.addButton( 'wpemailcapturebutton', {
			title: 'Add WP Email Capture Form',
			image: urlimg + "/wpemailcapture-avatar.png",
			//icon: 'icon dashicons-lightbulb',
			onclick: function() {
                ebaystring = '[wp_email_capture_form]';
                editor.insertContent( ebaystring );
			}
		});
	});
})();