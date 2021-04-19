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
		var hash = location.hash.match(/^(#.+)$/);
		if (hash && $(hash[0]).length > 0) {
			$(hash[0]).removeClass('collapsed');
			$(hash[0])[0].scrollIntoView();
		}
	});

})(jQuery);
