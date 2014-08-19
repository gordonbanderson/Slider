/*jslint white: true */

(function($) {
	$(document).ready(function() {

		$('#TreeDropdownField_Form_EditForm_InternalPageID').entwine({
			onchange: function(e) {
				console.log('change detected');
				var selector = $('#Form_EditForm_InternalPageID');
				var selectedID = selector.val();
				var json = $('#TreeDropdownField_Form_EditForm_InternalPageID').attr('data-metadata');
				console.log(json);
				console.log(selectedID);
				var parsed = JSON.parse(json);
				var originalID = parsed.id;
				console.log('Original id:'+originalID);

				if (selectedID !== originalID) {
					console.log('POPULATE FIELDS');
				}

				/*
				var sel = $(e.target);
				console.log(sel);
				if(sel.val() == 'Internal') {
					$('#URL').addClass('hide');
					$('#InternalPageID').removeClass('hide');
				} else {
					$('#URL').removeClass('hide');
					$('#InternalPageID').addClass('hide');
				}
				*/
			},
			onmatch: function(e) {
				/*
				var sel = $(e.target);

				// hide either the internal or external link editing box depending on which link type the link is
				// (internal or external)
				if(sel.val() == 'Internal') {
					$('#URL').addClass('hide');
				} else {
					$('#InternalPageID').addClass('hide');
				}
				*/
			}
			
		});

		
	});
})(jQuery);