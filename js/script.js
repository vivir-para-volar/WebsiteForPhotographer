$(document).ready(function(){
	$('.slider').slick({
		centerMode: true,
		centerPadding: '60px',
		slidesToShow: 2,
		autoplay: true,
		speed: 1000,
		autoplaySpeed: 2000,
		responsive: [
		{
			breakpoint: 768,
			settings: {
				centerMode: true,
				slidesToShow: 1,
				centerPadding: '30px',
			}
		},
		]
	});



	$('.slider_2').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true
	});

	
});
