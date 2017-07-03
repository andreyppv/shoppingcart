var menu = $('.menu');

$(document).ready(function() {
    
    $('#touch-menu').on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });

    $("#touch-menu").click(function() {
        $("#touch-menu").toggleClass("on");
        $(".basket-menu").removeClass('open-basket-menu');
        $('.menu-overlay').toggleClass('menu-overlay-open');
    });

    $('.menu-overlay').click(function() {
        menu.slideUp();
        $("#touch-menu").removeClass("on");
        $(".basket-menu").removeClass('open-basket-menu');
        $('.menu-overlay').removeClass('menu-overlay-open');
    });         

    $(window).resize(function() {
        var w = $(window).width();
        if (w > 767 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
    
    //when click search icon on topmenu
    $(".searchTriger").click(function() {
        $(".body").addClass("pageLock modalVisible");
        $("#Search").addClass("makeVisible activeModal fadeModal");
        $("#SearchTerm").focus();
    });
    
    $(".canClose").click(function() {
        $(".body").removeClass("pageLock modalVisible");
        $("#Search").removeClass("makeVisible activeModal fadeModal");
        $(".sign-wind").removeClass("makeVisible activeModal fadeModal");
    });
    
    $("#sidebar-menu-toggle").click(function() {
        $(".page-sidebar").toggleClass("mobile-display");
        $(".page").toggleClass("mobile-display");
        $(".body").toggleClass("pageLock");
        $(".admin-panel footer").toggleClass("mobile-display");
        $(".sidebar-mobile-mnu").toggleClass("mobile-display");
        $("#sidebar-menu-toggle").toggleClass("on");
    });
    
    heightDetect();
    openMenu();
    footerMenu();
    
    loginModal(); 
    $(".log-res-pass").click(function() {
        $('.sign-bl-pass').val('');
    });

    $(".res-icon").click(function() {
        $('.sign-bl-login').val('');
    }); 
    
    //load addthis js
    if($('.addthis_sharing_toolbox').length > 0) 
    {
        str = '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56662d8a2ed90913"></script>';
        $(str).appendTo(document.body);
    }
});


$(window).resize(function() {
    heightDetect();
    footerMenu();
    openMenu();
});

////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////
function heightDetect() {
    var w = $(window).width();
    if (w > 1500) {
        $(".sign-wind .sign-in-cont-wrap").css("height", $(window).height() - 50);
    } else {
        $(".sign-wind .sign-in-cont-wrap").css("height", "auto");
    }
};     

function openMenu() {
    var w = $(window).width();
    if (w < 1000) {
        $('.menu-parent-item > a').unbind('click').click(function() {
            if (!$(this).hasClass('active-menu')) {
                $('.menu-parent-item > a').removeClass('active-menu').next('.sub-menu').slideUp();
                $(this).addClass('active-menu');
                $(this).next('.sub-menu').slideDown();
            } else {
                $(this).removeClass('active-menu').next('.sub-menu').slideUp();
            }
        });
    } else {
        $('.menu-parent-item > a').unbind('click').click(function() {
            $('.menu-parent-item .sub-menu').css("display", "block");
        });
    }
};

function footerMenu() {
    var w = $(window).width();
    if (w < 780) {
        $('.footer-menu-wrap .menu-column > h3').unbind('click').click(
            function() {
                if (!$(this).hasClass('active-menu')) {
                    $('.footer-menu-wrap .menu-column > h3').removeClass('active-menu').next('ul').slideUp();
                    $(this).addClass('active-menu');
                    $(this).next('ul').slideDown();
                } else {
                    $(this).removeClass('active-menu').next('ul').slideUp();
                }
            });
    } else {
        $('.footer-menu-wrap .menu-column > h3').unbind('click').click(
            function() {
                $('.footer-menu-wrap .menu-column > h3').removeClass('active-menu');
            });
    }
};

function loginModal() {
    $(".loginTriger").click(function() {
        $("#uploadModal").removeClass("makeVisible activeModal fadeModal");
        
        $(".body").addClass("modalVisible");
        $(".sign-wind").addClass("makeVisible activeModal fadeModal");
        $(".sign-bl-login").focus();
        $("#touch-menu").removeClass("on");
        menu.css("display", "none");
        $('.menu-overlay').removeClass('menu-overlay-open');
    });
    
    $(".top_menu .log-block .basket-wrap").click(function() {
        $("#touch-menu").removeClass("on");
        menu.css("display", "none");
        $('.menu-overlay').removeClass('menu-overlay-open');
        $(".basket-menu").toggleClass('open-basket-menu');
    });
    /*var w = $(window).width();
    if (w < 975) {

        $(".loginTriger").click(function() {
            $(".body").addClass("modalVisible");
            $(".sign-wind").addClass("makeVisible activeModal fadeModal");
            $(".sign-bl-login").focus();
            $("#touch-menu").removeClass("on");
            menu.css("display", "none");
            $('.menu-overlay').removeClass('menu-overlay-open');

        });

        $(".top_menu .log-block .basket-wrap").click(function() {
            $("#touch-menu").removeClass("on");
            menu.css("display", "none");
            $('.menu-overlay').removeClass('menu-overlay-open');
            $(".basket-menu").toggleClass('open-basket-menu');
        });

    } else {

        $(".loginTriger").click(function() {
            $(".body").addClass("modalVisible");
            $(".sign-wind").addClass("makeVisible activeModal fadeModal");
            $(".sign-bl-login").focus();
            menu.css("display", "none");
            $('.menu-overlay').removeClass('menu-overlay-open');
            $("#touch-menu").removeClass("on");
        });

        $(".top_menu .log-block .basket-wrap").click(function() {
            $("#touch-menu").removeClass("on");
            menu.css("display", "none");
            $('.menu-overlay').removeClass('menu-overlay-open');
            $(".basket-menu").toggleClass('open-basket-menu');
        });

    } */
};

function topImgWrap() {
    $(".top-img-wrap").css("height", $(window).height() - 200);
};

function formatCurrency(number) {
    return '$ ' + number.toFixed(2);
}

//////////////////////////////////////////////////////////////////////////////////
//Common Actions
//////////////////////////////////////////////////////////////////////////////////


function designService() {
  $(".ld-sect-wrap").css("min-height", $('.ld-design-package-wrap').height());
};
designService();


$('.skip-link, .next-step-but').click(function() {
    $('html, body').scrollTop(0);
});

