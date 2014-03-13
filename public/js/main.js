
var thumbs = function() {
	var init, saveVote, nextImage;

	init = function() {
		var thumbButtons, nextLink, prevLink;

		thumbButtons = $('#votes').find('a.thumb');

		thumbButtons.click(function() {
			saveVote($(this));
			return false;
		});

		nextLink = $('a.next,a.prev');

		nextLink.click(function() {
			var dir = $(this).hasClass('next') ? 'next' : 'prev';
			nextImage(dir);
			return false;
		});
	}

	saveVote = function(button) {
		$.get($(button).attr('href'), function(data) {
			$(button).find('.percent').html(data + '%');
			$(button).siblings().find('.percent').html((100 - data) + '%');
		});
	}

	nextImage = function(dir) {
		var current, next;

		current = $('.imageBlock:visible');

		if (dir == 'next') {
			next = current.next();

			if (next.length < 1) {
				next = $('.imageBlock').first();
			}
		} else {
			next = current.prev();

			if (next.length < 1) {
				next = $('.imageBlock').last();
			}
		}

		current.hide();
		next.show();
	}

	return {
		init: init
	}

}();