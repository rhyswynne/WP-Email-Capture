( function( blocks, i18n, element, _ ) {
	var el = element.createElement;
	var Fragment = wp.element.Fragment;
	var RichText = wp.editor.RichText;

	blocks.registerBlockType( 'wp-email-capture/wp-email-capture-form', {
		title: i18n.__( 'WP Email Capture Form' ),
		icon: 'email-alt',
		category: 'widgets',
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: 'h2',
			},
			subscriptiondetails: {
				type: 'array',
				source: 'children',
				selector: '.steps',
			},
		},
		edit: function( props ) {
			var focusedEditable = props.focus ? props.focus.editable || 'title' : null;
			var attributes = props.attributes;

			return (
				el( 
					Fragment,
					null,
					el( 'div', { className: props.className },
						el( RichText, {
							tagName: 'h2',
							inline: true,
							placeholder: i18n.__( 'WP Email Capture title…' ),
							value: attributes.title,
							onChange: function( value ) {
								props.setAttributes( { title: value } );
							},
							focus: focusedEditable === 'title' ? focus : null,
							onFocus: function( focus ) {
								props.setFocus( _.extend( {}, focus, { editable: 'title' } ) );
							},
						} ),
						el( RichText, {
							tagName: 'p',
							inline: false,
							placeholder: i18n.__( 'Write your signup paragraph here…' ),
							value: attributes.subscriptiondetails,
							onChange: function( value ) {
								props.setAttributes( { subscriptiondetails: value } );
							},
							focus: focusedEditable === 'subscriptiondetails' ? focus : null,
							onFocus: function( focus ) {
								props.setFocus( _.extend( {}, focus, { editable: 'subscriptiondetails' } ) );
							},
						} ),
						el ('div', { className: 'wp-email-capture wp-email-capture-display' },
							el( 'h3', { className: 'wp-email-capture-admin-form' }, i18n.__( 'The WP Email Capture Form Will Be Here' ) )
							)
						)
					)
				);
		},
		save: function( props ) {
			var attributes = props.attributes;

			return (
				el( 'div', { className: props.className },
					el( 'h2', {}, attributes.title ),
					el( 'div', { className: 'steps' }, attributes.subscriptiondetails ),
					el( 'div', {}, '[wp_email_capture_form]')
					)
				);
		},
	} );

} )(
window.wp.blocks,
window.wp.i18n,
window.wp.element,
window._,
);