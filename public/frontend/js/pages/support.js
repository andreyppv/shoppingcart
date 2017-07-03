$(".how-order-sidebar ul").sticky({
    topSpacing: 0,
    bottomSpacing: 750
});

$('.how-order-sidebar-menu li a').click(function() {
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top
    }, 200);
    return false;
    e.preventDefault();
});

$('.faq-list > h2').unbind('click').click(
    function() {
        if (!$(this).hasClass('active-menu')) {
            $('.faq-list > h2').removeClass('active-menu')
                .next('.faq-list-cont')
                .slideUp();
                $(this).addClass('active-menu');
                $(this).next('.faq-list-cont').slideDown();
        } else {
            $(this).removeClass('active-menu')
                .next('.faq-list-cont')
                .slideUp();
        }
    }
);