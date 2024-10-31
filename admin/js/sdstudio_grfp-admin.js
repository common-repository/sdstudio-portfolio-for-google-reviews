(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	var sds_google_reviews_image_url_IMG_LINK_LOAD = $('[data-info="sds_google_reviews_image_url"]').attr('value');
    $('.sds_google_reviews_image_url_INSERT').attr('src',sds_google_reviews_image_url_IMG_LINK_LOAD);
	
	// Carbon Fields
	// START 
	// jQuery(function ($) {
		var $container = $('.carbon-errors-log');

		$('.carbon-errors-expand').on('click', function () {
			$container.addClass('expanded');
		});

		$('.carbon-errors-dismiss').on('click', function () {
			$container.slideUp();
			carbon.docCookies.setItem(<?php echo json_encode( $hideErrorsCookieName ) ?>, "1", Infinity);
		});
	// })
	// END
	// Carbon Fields
	
})( jQuery );
