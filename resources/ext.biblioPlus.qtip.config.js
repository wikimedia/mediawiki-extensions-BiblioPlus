jQuery( document ).ready( function () {
	var key;

	$( '.tooltip-from-element' ).qtip ( {
		content: {
			text: function( api ) {
				key = $( this ).attr( 'href' );
				ref = $( key ).html();
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
			viewport: $( window ),
			my: 'top left',
			at: 'bottom center',
			adjust: {
				method: 'flip',
			}
		}
	})
});
