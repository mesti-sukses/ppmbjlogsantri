$(function(){
	$('.media-item').on('click', function(){
		var imgSrc = $(this).find('img');

		$('.img-featured').attr('src', imgSrc.attr('src'));
		$('.description p').text(imgSrc.attr('alt'));
		$('.delete-btn').attr('href', imgSrc.data('id'));

		$('.media-item').removeClass('active');
		$(this).addClass('active');
		// alert(imgSrc.attr('alt'));
	});
});