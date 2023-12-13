function targetLink(container) {
	$(container).find('a').each(function() {
		if (location.hostname !== this.hostname || !this.hostname.length) {
			if ($(this).attr('target') != '_blank') {
				$(this).attr('target','_blank');
			}
		}
	});
}

$(document).ready(function(){

	targetLink('body');

	$('.project .images').each(function(){
		var container = $(this);
		var images = container.children();
		var amount = images.length;
		var counter = 0;

		var firstImg = images.eq(counter);
		var firstImgSrc = firstImg.attr('data-src');
		firstImg.attr('src', firstImgSrc);

		if (amount > 1) {
			images.css('cursor','e-resize');

			container.on('click', 'img', function(){

				$(this).css('opacity','.75').css('pointer-events','none').css('cursor','none');

				counter = counter + 1 == amount ? 0 : counter + 1;

				var nextImg = images.eq(counter);
				var nextImgSrc = nextImg.attr('data-src');
				$('<img />').attr('src', nextImgSrc).on('load', function(){
					images.attr('src','').css('display','none').css('opacity','').css('pointer-events','').css('cursor','');
					nextImg.attr('src', nextImgSrc).css('cursor','e-resize').css('display','block');
				});

				nextCounter = counter + 1 == amount ? false : counter + 1;
				if (nextCounter) {
					$('<img />').attr('src', images.eq(counter+1).attr('data-src'));
				}
			});
		}
	});

});