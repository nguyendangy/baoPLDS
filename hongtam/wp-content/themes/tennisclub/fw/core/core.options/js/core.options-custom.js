/* global jQuery:false */

jQuery(document).ready(function() {
	"use strict";
	if (typeof TENNISCLUB_STORAGE == 'undefined') var TENNISCLUB_STORAGE = {};
	TENNISCLUB_STORAGE['media_frame'] = null;
	TENNISCLUB_STORAGE['media_link'] = '';
	jQuery('.tennisclub_media_selector').on('click', function(e) {
		tennisclub_show_media_manager(this);
		e.preventDefault();
		return false;
	});
});

function tennisclub_show_media_manager(el) {
	"use strict";

	TENNISCLUB_STORAGE['media_link'] = jQuery(el);
	// If the media frame already exists, reopen it.
	if ( TENNISCLUB_STORAGE['media_frame'] ) {
		TENNISCLUB_STORAGE['media_frame'].open();
		return false;
	}

	// Create the media frame.
	TENNISCLUB_STORAGE['media_frame'] = wp.media({
		// Set the title of the modal.
		title: TENNISCLUB_STORAGE['media_link'].data('choose'),
		// Tell the modal to show only images.
		library: {
			type: 'image'
		},
		// Multiple choise
		multiple: TENNISCLUB_STORAGE['media_link'].data('multiple')===true ? 'add' : false,
		// Customize the submit button.
		button: {
			// Set the text of the button.
			text: TENNISCLUB_STORAGE['media_link'].data('update'),
			// Tell the button not to close the modal, since we're
			// going to refresh the page when the image is selected.
			close: true
		}
	});

	// When an image is selected, run a callback.
	TENNISCLUB_STORAGE['media_frame'].on( 'select', function(selection) {
		"use strict";
		// Grab the selected attachment.
		var field = jQuery("#"+TENNISCLUB_STORAGE['media_link'].data('linked-field')).eq(0);
		var attachment = '';
		if (TENNISCLUB_STORAGE['media_link'].data('multiple')===true) {
			TENNISCLUB_STORAGE['media_frame'].state().get('selection').map( function( att ) {
				attachment += (attachment ? "\n" : "") + att.toJSON().url;
			});
			var val = field.val();
			attachment = val + (val ? "\n" : '') + attachment;
		} else {
			attachment = TENNISCLUB_STORAGE['media_frame'].state().get('selection').first().toJSON().url;
		}
		field.val(attachment);
		if (field.siblings('img').length > 0) field.siblings('img').attr('src', attachment);
		field.trigger('change');
	});

	// Finally, open the modal.
	TENNISCLUB_STORAGE['media_frame'].open();
	return false;
}
