(function($) {
	var cache = [];
	// Arguments are image paths relative to the current page.
	$.preLoadImages = function() {
		var args_len = arguments.length;
		for (var i = args_len; i--;) {
			var cacheImage = document.createElement('img');
			cacheImage.src = arguments[i];
			cache.push(cacheImage);
		}
	}
})(jQuery);

jQuery.preLoadImages('images/mental-health-hover.gif', 'images/military-social-work-hover.gif', 'images/copa-hover.gif', 'images/families-and-children-hover.gif', 'images/bar-33.gif', 'images/bar-66.gif', 'images/bar-100.gif');

USCSSW = function() {
	function _init() {
		// kill default action on share this button
		$('#share-button').click(function(e) {
			e.preventDefault();
		});
		
		$('#sidebar a').hover(
			function() {
				var src = $(this).find('img:first').attr('src');
				var new_src = src.replace(/.jpg/gi, '-hover.gif');
				$(this).find('img:first').attr('src', new_src);
			},
			function() {
				var src = $(this).find('img:first').attr('src');
				var new_src = src.replace(/-hover.gif/gi, '.jpg');
				$(this).find('img:first').attr('src', new_src);
			}
		);
		
		$('fieldset button').click(function() {
			$(this).blur();
		});
		
		$('#next-1').click(function() {
			if ($('input[name="00NA00000037Wnm"]:checked').length == 0) {
				alert('You must select which best describes you.');
				return false;
			} else {
				$('#step-1').fadeOut('fast', function() {
					$('#progress-bar').removeClass('bar-0').addClass('bar-33');
					$('#progress-bar span:first').text('33');
					$('#step-2').fadeIn('fast');
				});
			}
		});
		
		$('#next-2').click(function() {
			var ok = true;
			
			if ($('#education-level').val() == '') {
				alert('Please select your highest level of education.');
				$('#education-level').focus();
				ok = false;
			}
			
			if (ok) {
				if ($('#gpa').val() == '') {
					alert('Please select your Undergraduate GPA range.');
					$('#gpa').focus();
					ok = false;
				}
			}
			
			if (ok) {
				$('#step-2').fadeOut('fast', function() {
					$('#progress-bar').removeClass('bar-33').addClass('bar-66');
					$('#progress-bar span:first').text('66');
					$('#step-3').fadeIn('fast');
				});
			}
		});
		
		$('#submit').click(function() {
			var ok = true;
			
			if ($('#first_name').val() == '') {
				alert('Please enter your first name.');
				$('#first_name').focus();
				return false;
			}
			
			if ($('#last_name').val() == '') {
				alert('Please enter your last name.');
				$('#last_name').focus();
				return false;
			}
			
			if ($('#email').val() == '') {
				alert('Please enter your email address.');
				$('#email').focus();
				return false;
			}
			
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			if (!pattern.test($('#email').val())) {
				alert('Please enter a valid email address.');
				$('#email').focus();
				return false;
			}
			
			if ($('#phone').val() == '') {
				alert('Please enter your phone number.');
				$('#phone').focus();
				return false;
			}
			
			if ($('#city').val() == '') {
				alert('Please enter your city.');
				$('#city').focus();
				return false;
			}
			
			if ($('#state').val() == '') {
				alert('Please select your state.');
				$('#state').focus();
				return false;
			}
			
			// determine if user is eligible
			if ($('#education-level')[0].selectedIndex == 1 || $('#education-level')[0].selectedIndex == 2) {
				$('#info-form').attr('action', $('#rejection-url').val());
			}
			
			$('#progress-bar').removeClass('bar-66').addClass('bar-100');
			$('#progress-bar span:first').text('100');
			
			return true;
		});
	}
	
	return {
		init: function() { _init(); }
	}
}();

$(document).ready(function() {
	USCSSW.init();
});