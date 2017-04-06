
/*  
    Name: gggalery
    By: Gaël Gouault
    Version: 1.0
    Date: nov 2014
*/

$(document).ready(function() {

	var select = 1;
	var images = $('.galerie-list li');

	$('.galerie-control').append(
		'<a class="name">…</a>' +
		'<a class="prev"></a>' +
		'<a class="next"></a>' +
		'<a class="number"></a>');

	$('.number').text(select + " - " + images.length);
	$('.galerie-list li:nth-child(1)').show();
	$('.name').text($('.galerie-list li:nth-child(1) img').attr('alt'));

	$('.prev').click(function() {
		select --;
		if (select <= 0) select = images.length;
		$('.galerie-list li:nth-child(1)').hide();
		view_image();
	});

	$('.next, .galerie-list img').click(function() {
		if (select >= images.length) select = 0;
		select ++;
		view_image();
		$('.galerie-list li:nth-child('+(select + (images.length - 1))+')').hide();
	});

	$(document).keydown(function(key) {
        switch(parseInt(key.which,10)) {

            case 37: // Left -> Prev
                select --;
				if (select <= 0) select = images.length;
				$('.galerie-list li:nth-child(1)').hide();
				view_image();
            break;

            case 39: // Right -> Next
            	if (select >= images.length) select = 0;
                select ++;
				view_image();
				$('.galerie-list li:nth-child('+(select + (images.length - 1))+')').hide();
            break;
        }
    });

	function view_image() {

		$('.galerie-list li:nth-child('+select+')').show();
		$('.galerie-list li:nth-child('+(select + 1)+')').hide();
		$('.galerie-list li:nth-child('+(select - 1)+')').hide();
		$('.name').text($('.galerie-list li:nth-child('+select+') img').attr('alt'));
		$('.number').text(select + " - " + images.length);
	}

});
