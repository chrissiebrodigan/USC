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

jQuery.preLoadImages('images/feature-2.jpg', 'images/feature-3.jpg', 'images/person-2.jpg', 'images/person-3.jpg', 'images/person-4.jpg', 'images/person-5.jpg');

USC = window.USC || {};
USC.SSW = window.USC.SSW || {};

USC.SSW.Home = function() {
	function _init() {		
		_init_features();
		_init_feeds();
		_init_search();
		_init_featured_people();
	}
	
	function _init_featured_people() {
		$('#featured-people a').click(function(e) {
			e.preventDefault();
			
			// get new full image source
			var new_img = $(this).find('img:first').attr('src');
			new_img = new_img.replace(/_thumb/gi, '');
			
			// get new full image description
			var new_desc = $(this).find('img:first').attr('alt');
			new_desc = new_desc.replace(/\-/gi, '<br />');
			
			// set active style
			$('#featured-people a').removeClass('active');
			$(this).addClass('active');
			
			$('#featured-person img:first').attr('src', new_img);
			$('#featured-person span:first').html(new_desc);
		});
	}
	
	function _init_search() {
		$('#search').focus(function() {
			if ($(this).val() == 'Search the Site') {
				$(this).val('');
			}
		});
		
		$('#search').blur(function() {
			if ($(this).val() == '') {
				$(this).val('Search the Site');
			}
		});
	}
	
	function _init_feeds() {
		$('#feeds-nav a').click(function(e) {
			e.preventDefault();
			
			// set tab styles
			$('#feeds-nav a').removeClass('active');
			$(this).addClass('active');
			
			// get panel to show
			var to_show = $(this).attr('id');
			to_show = to_show.replace(/-nav/gi, '');
			
			$('.feed').hide();
			$('#' + to_show).show();
		});
	}
	
	function _init_features() {
		$('#feature-nav a').click(function(e) {
			e.preventDefault();
			
			// do nothing with currently active feature
			if (!$(this).hasClass('active')) {
				// determine which feature # to show
				var to_show = $(this).text();
				
				// fade out currently active feature
				var to_hide = $('#feature-nav a.active:first').text();
				
				$('#feature-' + to_hide).css('z-index', 10);
				
				$('#feature-' + to_show).css('z-index', 9).show();
				
				$('#feature-' + to_hide).fadeOut('fast');
				
				$('#feature-nav a').removeClass('active');
				$(this).addClass('active');
			}
		});
	}
	
	return {
		init: function() { _init(); }
	}
}();

$(document).ready(function() {
	USC.SSW.Home.init();
});