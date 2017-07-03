//slider
var mySwiper3 = new Swiper('.logo-design-slider', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    paginationClickable: true,
    autoplay: 3000,
    spaceBetween: 10,
    pagination: '.swiper-pagination',
});

//update price
$('input.design-package').click(function() {
    price = $(this).data('price');
    $('#total-price').html(price);
});

$('.ld-item-wrap').click(function() {
    $('.ld-item-wrap').removeClass('ld-item-wrap-active');
    $(this).addClass('ld-item-wrap-active');
});