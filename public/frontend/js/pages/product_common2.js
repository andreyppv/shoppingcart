//product images gallery
var initPhotoSwipeFromDOM = function(gallerySelector) {
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item,
            ind;
        for (var i = 0; i < numNodes; i++) {
            figureEl = thumbElements[i];
            if (figureEl.nodeType !== 1) {
                continue;
            }
            linkEl = figureEl.children[0];
            size = linkEl.getAttribute('data-size').split('x');
            ind = linkEl.getAttribute('data-index');
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10),
                ind: ind,
                visible: false,
                name: figureEl.getAttribute('data-title'),
                image: figureEl.getAttribute('data-image'),
            };
            if (figureEl.children.length > 1) {
                item.title = figureEl.children[1].innerHTML;
            }
            if (linkEl.children.length > 0) {
                item.msrc = linkEl.children[0].getAttribute('src');
            }
            item.el = figureEl;
            items.push(item);
        }
        return items;
    };
    var closest = function closest(el, fn) {
        return el && (fn(el) ? el : closest(el.parentNode, fn));
    };
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        var eTarget = e.target || e.srcElement;
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });
        if (!clickedListItem) {
            return;
        }
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;
        for (var i = 0; i < numChildNodes; i++) {
            if (childNodes[i].nodeType !== 1) {
                continue;
            }
            if (childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }
        if (index >= 0) {
            openPhotoSwipe(index, clickedGallery);
        }
        return false;
    };
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
            params = {};
        if (hash.length < 5) {
            return params;
        }
        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if (!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');
            if (pair.length < 2) {
                continue;
            }
            params[pair[0]] = pair[1];
        }
        if (params.gid) {
            params.gid = parseInt(params.gid, 10);
        }
        return params;
    };
    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;
        items = parseThumbnailElements(galleryElement);
        options = {
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),
            getThumbBoundsFn: function(index) {
                var thumbnail = items[index].el.getElementsByTagName('img')[0],
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect();
                return {
                    x: rect.left,
                    y: rect.top + pageYScroll,
                    w: rect.width
                };
            }
        };
        if (fromURL) {
            if (options.galleryPIDs) {
                for (var j = 0; j < items.length; j++) {
                    if (items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }
        if (isNaN(options.index)) {
            return;
        }
        if (disableAnimation) {
            options.showAnimationDuration = 0;
        }
        gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };
    var galleryElements = document.querySelectorAll(gallerySelector);
    for (var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i + 1);
        galleryElements[i].onclick = onThumbnailsClick;
    }
    var hashData = photoswipeParseHash();
    if (hashData.pid && hashData.gid) {
        openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
    }
};
initPhotoSwipeFromDOM('#templ-det-gallery');
//end product image gallery

//toggle effect
function option_toggle() {
    $('.card-options-menu li > span').unbind('click').click(function() {

        if (!$(this).hasClass('active-menu')) {
            $('.card-options-menu li > span')
                .removeClass('active-menu')
                .next('.card-options-sub-menu')
                .slideUp();
            $(this).addClass('active-menu');
            $(this).next('.card-options-sub-menu').slideDown();
        } else {
            $(this)
                .removeClass('active-menu')
                .next('.card-options-sub-menu')
                .slideUp();
        }
    });

    $('.quantity-options-triger').unbind('click').click(function() {
        $('.det-ord-cont ul li .multiple-sets-wrap').css('display', 'none');
        $('.det-ord-cont ul li .quantity-options-wrap').css('display', 'block');
        
        $('#custom_set').val(0);
        update_price();
    });

    $('.multiple-sets-triger').unbind('click').click(function() {
        $('.det-ord-cont ul li .multiple-sets-wrap').css('display', 'block');
        $('.det-ord-cont ul li .quantity-options-wrap').css('display', 'none');
        
        $('#custom_set').val(1);
        update_price();
    });
    
    $('.add-set-triger').click(function() {
        template = $('#multiple-set-row-template').clone();
        template.removeAttr('id');
        template.show();
        
        $('div#multiple-set-row-wrap').append(template);
        update_price();
    });
    $(document).on('click', '.remove-set-row', function() {
        box = $(this).parents('.multiple-set-row');
        box.remove();
        
        update_price();
    });
    
    $(document).on('change', '.set-quant', function() {
        update_price();     
    });
    
    if($('#custom_set').val() == '1') {
        $('.multiple-sets-triger').trigger('click');    
    }
}
option_toggle();
//end toggle effect

//template card slider
if(hasCardTemplate)
{
    //business card templates slider
    var w = $(window).width();
    if (w > 660) {
        var mySwiper2 = new Swiper('.card-tepl-slider', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 3,
            paginationClickable: true,
            slidesPerGroup: 3,
            autoplay: 3000,
            spaceBetween: 20,
            pagination: '.swiper-pagination',
        });
    } else {
        var mySwiper2 = new Swiper('.card-tepl-slider', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            paginationClickable: true,
            slidesPerGroup: 1,
            autoplay: 3000,
            spaceBetween: 20,
            pagination: '.swiper-pagination',
        });
    }
}