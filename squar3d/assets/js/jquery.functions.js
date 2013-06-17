jQuery(function ($) {
	$(document).ready(function () {

		//SEARCH CLEAR AND RESTORE VALUE
	    var el = $('input[type=text], input[type=email], textarea, input.header-search');
	    el.focus(function(e) {
	        if (e.target.value == e.target.defaultValue)
	            e.target.value = '';
	    });
	    el.blur(function(e) {
	        if (e.target.value == '')
	            e.target.value = e.target.defaultValue;
	    });

	    //HIDE COMMENTS MOBILE ON LOAD
		$('a.button.hide-show').click(function () {
		    if ($('.comments').is(':visible')) {
		        $('.comments').slideUp('slow',function () {
		            $('a.button.hide-show').text('Show Comments');
		        });
		        return false;
		    } else {
		        $('.comments').slideDown('slow', function () {
		            $('a.button.hide-show').text('Hide Comments');
		        });
		        return false;
		    }
		});

	});
});