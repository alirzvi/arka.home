/* global woodmart_settings */
(function($) {
	woodmartThemeModule.callPhotoSwipe = function(index, items) {
		if (woodmartThemeModule.$body.hasClass('rtl')) {
			index = items.length - index - 1;
			items = items.reverse();
		}

		var options = {
			index        : index,
			shareButtons : [
				{
					id   : 'facebook',
					label: woodmart_settings.share_fb,
					url  : 'https://www.facebook.com/sharer/sharer.php?u={{url}}'
				},
				{
					id   : 'twitter',
					label: woodmart_settings.tweet,
					url  : 'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'
				},
				{
					id   : 'pinterest',
					label: woodmart_settings.pin_it,
					url  : 'http://www.pinterest.com/pin/create/button/' +
						'?url={{url}}&media={{image_url}}&description={{text}}'
				},
				{
					id      : 'download',
					label   : woodmart_settings.download_image,
					url     : '{{raw_image_url}}',
					download: true
				}
			],
			closeOnScroll: woodmart_settings.photoswipe_close_on_scroll
		};

		woodmartThemeModule.$body.find('.pswp').remove();
		woodmartThemeModule.$body.append(woodmart_settings.photoswipe_template);
		var pswpElement = document.querySelectorAll('.pswp')[0];

		// Initializes and opens PhotoSwipe
		var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
		gallery.init();
	};
})(jQuery);
