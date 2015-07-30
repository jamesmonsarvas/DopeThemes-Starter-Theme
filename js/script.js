(function($) {

	/* Toggle menu for mobile. */
	$('a.menu-toggle').on('click', function(event) {
		var target = $(this).attr('href');
		$(target).toggleClass('toggle');
		event.preventDefault();		
	});

})(jQuery);