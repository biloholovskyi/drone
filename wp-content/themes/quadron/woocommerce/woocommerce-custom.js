(function($) {

	/*-- Strict mode enabled --*/
	'use strict';

	/* svg load and animation
	================================================== */
	function _wrapRelatedTitle () {

		var text = $('.related.products > h2').text();
		$('.related.products > h2').addClass('__title');
		var split = text.split(' ');
		var firstLetter = split[0];
		var rest = split.splice(1,split.length)
		$('.related.products > h2').html('<span>' + firstLetter +'</span> ' + rest.join(''));
		$('.related.products > h2').wrap('<div class="section-heading"></div>');

	}
	$(document).ready(function() {

		/* wrapRelatedTitle
		================================================== */
		_wrapRelatedTitle();

	});
}(jQuery));


/*
	Carusel News
*/
(function($){
	var $jsCarouselProducts = $('#mainContent .js-carousel-products');
	if ($jsCarouselProducts.length){
		$jsCarouselProducts.slick({
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			adaptiveHeight: true,
			responsive: [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
	};
})(jQuery);