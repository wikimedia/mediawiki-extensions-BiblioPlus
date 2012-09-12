jQuery(document).ready(function() {
	$('.tooltip-from-element').qtip({
		content: {
			text: function(api) {
				var key =  $(this).attr('tooltip-id');		
				key = key.substring(1); //strip the # sign from the beginning
				return document.getElementById(key).innerHTML;
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
			viewport: $(window),
			my: 'top left',
			at: 'bottom center',
			adjust: {
				method: 'flip',
			}
		}
	})
});
