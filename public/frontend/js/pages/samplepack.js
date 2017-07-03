var samplePackageSlider = new Swiper('.sample-package-slider', {
	direction: 'horizontal',
	loop: true,
	slidesPerView: 1,
	paginationClickable: true,
	autoplay: 3000,
	speed: 500,
	pagination: '.swiper-pagination',
});

$('.samp-exmpl-bl').viewportChecker({
    classToAdd: 'empl-visible',
    offset: ($(window).height() * .2),
});

$('.get-now-but, .get-now-but-fill').click(function() {
    targetId = '#' + $(this).data('target');
    
    $(targetId).addClass("get-now-form-wrap-visible"); 
    $(".body").addClass("pageLock modalVisible"); 
});
$('.overlay-bg, .get-now-form-close').click(function() {
    $(".get-now-form-wrap").removeClass("get-now-form-wrap-visible"); 
    $(".body").removeClass("pageLock modalVisible"); 
});

$('.shipping-type').change(function() {
    box = $(this).parents('.get-now-form-wrap');
    price = $(':selected', $(this)).data('price');
    
    $('.currency-value', box).html(price);
});

$('.get-now-form-wrap .shipping-type').trigger('change');