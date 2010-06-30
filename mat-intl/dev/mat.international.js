MAT = window.MAT || {};

MAT.International = function() {
	function _init() {
		$('fieldset button').click(function() {
			$(this).blur();
		});
		
		$('#step-1').show();
		
		$('#next-1').click(function() {
			if ($('input[name="00N80000002UJr8"]:checked').length == 0) {
				alert('You must select which best describes you.');
				return false;
			} else {
				$('#step-1').fadeOut('fast', function() {
					$('#step-2').fadeIn('normal');
					$('#progress-bar-fill').removeClass('progress-bar-fill-10').addClass('progress-bar-fill-50');
					$('#progress-bar span:first').text('50% Complete');
				});
			}
		});
		
		$('#next-2').click(function() {
			var ok = true;
			
			if ($('input[name="00N80000003aB3Y"]:checked').length == 0) {
				alert('You must select the program you are interested in.')
				ok = false;
			}
			
			if (ok) {
				if ($('#education2').val() == '') {
					alert('Please select your highest level of education.');
					$('#education2').focus();
					ok = false;
				}
			}
			
			if (ok) {
				if ($('#gpaRange').val() == '') {
					alert('Please select your Undergraduate GPA range.');
					$('#gpaRange').focus();
					ok = false;
				}
			}
			
			if (ok) {
				$('#step-2').fadeOut('fast', function() {
					$('#progress-bar-fill').removeClass('progress-bar-fill-50').addClass('progress-bar-fill-90');
					$('#progress-bar span:first').text('90% Complete');
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
			
			if ($('#emailfield').val() == '') {
				alert('Please enter your email address.');
				$('#emailfield').focus();
				return false;
			}
			
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			if (!pattern.test($('#emailfield').val())) {
				alert('Please enter a valid email address.');
				$('#emailfield').focus();
				return false;
			}
			
			if ($('#phone2').val() == '') {
				alert('Please enter your phone number.');
				$('#phone2').focus();
				return false;
			}
			
			if ($('#city').val() == '') {
				alert('Please enter your city.');
				$('#city').focus();
				return false;
			}
			
			if ($('#country').val() == '') {
				alert('Please select your country.');
				$('#country').focus();
				return false;
			}
			
			$('#progress-bar-fill').removeClass('progress-bar-fill-90').addClass('progress-bar-fill-100');
			$('#progress-bar span:first').addClass('complete').text('100% Complete');
			
			return true;
		});
	}
	
	return {
		init: function() { _init(); }
	}
}();

$(document).ready(function() {
	MAT.International.init();
});