(function($) {

	$(window).scroll(function() {

		// If user is scrolling down.
		if(($(window).scrollTop() > 520)&&(($(window).scrollTop() < 5600))) {

			$("#mois_fixed").fadeIn('fast')

		}


		else {
			$("#mois_fixed").fadeOut('fast')
		}

	});
}(jQuery));


