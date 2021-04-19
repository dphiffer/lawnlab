(function($) {

	$(window).ready(function() {
		$('.locations__item').click(function(e) {
			$item = $(e.target);
			if (! $item.hasClass('.locations__item')) {
				$item = $item.closest('.locations__item');
			}
			if (! $item.hasClass('collapsed')) {
				return;
			}
			$('.locations__item').addClass('collapsed');
			$item.removeClass('collapsed');
			window.location = '#' + $item.attr('id');
		});
		var hash = location.hash.match(/^(#.+)$/);
		if (hash && $(hash[0]).length > 0) {
			$(hash[0]).removeClass('collapsed');
			$(hash[0])[0].scrollIntoView();
		}

		$('.locations__close').click(function(e) {
			$('.locations__item').addClass('collapsed');
			e.stopPropagation();
		});
	});

})(jQuery);
