(function ($) {

  "use strict";

  // remove ads on theme options panel
  jQuery(window).load(function(){
    jQuery('#redux-header .rAds').hide();
  });

/*-----------------------------------------------------------------------------------

 	Custom JS - All back-end jQuery

-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

/*----------------------------------------------------------------------------------*/
/*	Gallery Options
/*----------------------------------------------------------------------------------*/

	var galleryOptions = jQuery('#gallery-settings');
	var galleryTrigger = jQuery('#post-format-gallery');

	galleryOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var embedOptions = jQuery('#embed-settings');
	var embedTrigger = jQuery('#post-format-video');
	var embedTrigger2 = jQuery('#post-format-audio');

	embedOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	The Brain
/*----------------------------------------------------------------------------------*/

	var group = jQuery('#post-formats-select input');

	group.change( function() {

		if (jQuery(this).val() == 'gallery') {
			galleryOptions.css('display', 'block');
			ninethemeHideAll(galleryOptions);

		} else if(jQuery(this).val() == 'video') {
			embedOptions.css('display', 'block');
			ninethemeHideAll(embedOptions);

		} else if(jQuery(this).val() == 'audio') {
			embedOptions.css('display', 'block');
			ninethemeHideAll(embedOptions);

		} else {
			embedOptions.css('display', 'none');
			galleryOptions.css('display', 'none');
		}

	});

	if(galleryTrigger.is(':checked'))
		galleryOptions.css('display', 'block');

	if(embedTrigger.is(':checked'))
		embedOptions.css('display', 'block');

	if(embedTrigger2.is(':checked'))
		embedOptions.css('display', 'block');

	function ninethemeHideAll(notThisOne) {
		embedOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}

});
})(jQuery);
