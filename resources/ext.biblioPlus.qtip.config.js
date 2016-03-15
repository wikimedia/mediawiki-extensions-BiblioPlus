jQuery( document ).ready( function () {
	var key;
	var ref;

	jQuery( '.tooltip-from-element' ).qtip ( {
		content: {
			text: function() {
				key = jQuery( this ).attr( 'href' );
				ref = jQuery( key ).html();
				if ( ref.length !== 0 ) {
					return ref;
				}
			}
		},
		style: {
			classes: 'ui-tooltip-shadow ui-tooltip-bootstrap',
			width: 400
		},
		hide: {
			fixed: true,
			delay: 500
		},
		position: {
			viewport: jQuery( window ),
			my: 'top left',
			at: 'bottom center',
			adjust: {
				method: 'flip',
			}
		}
	});
});
