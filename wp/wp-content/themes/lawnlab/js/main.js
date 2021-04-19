(function($) {

	$(window).ready(function() {
		$('.locations__item').click(function(e) {
			$('.locations__item').addClass('collapsed');
			$item = $(e.target);
			if (! $item.hasClass('.locations__item')) {
				$item = $item.closest('.locations__item');
			}
			$item.removeClass('collapsed');
			window.location = '#' + $item.attr('id');
		});
	});

})(jQuery);
