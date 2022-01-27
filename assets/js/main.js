(function ($) {
    "use strict";


    //slider

    if (typeof $.fn.owlCarousel == 'function') {

        $(".axil-papr-carousel").each(function () {
            var options = $(this).data('carousel-options');
            if (AxilObj.rtl == 'yes') {
                options['rtl'] = true;
                options['navText'] = ["<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"];
            }
            $(this).owlCarousel(options);
        });
        $(".owl-custom-nav .owl-next").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });
    }

    axil_paprready_scripts();
    $(window).on('load', function () {
        axil_paprload_scripts();
        console.log("Window Loaded");

        var postimages = jQuery(".rt-holder .rt-img-holder img");

        for (let i = 0; i < postimages.length; i++) {

            let img = jQuery(postimages[i]);
            if (img.width() / img.height() < (256 / 175)) {
                console.log(i, " ", img.width() / img.height())
                img.css("width", "100%").css("maxHeight", "none");
            } else {
                var leftOverWidth = img.width() - (256 / 175 * img.height());
                img.css("height", "100%").css("maxWidth", "none").css("left", -1 * leftOverWidth / 2);
            }
        }
    });
    // Elementor
    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                axil_paprready_scripts();
                axil_paprload_scripts();
            });
        }
    });

    //Sticky Menu
    var calculateWpAdminHeight = function () {
        var wpadminbar = $('#wpadminbar');
        var wpadminbarHeight = 0;
        if (wpadminbar) {
            wpadminbarHeight = wpadminbar.outerHeight();
        }
        return wpadminbarHeight;
    }

    //axil_stick_menu
    $(window).on('load resize', function () {
        console.log("resize triggered ----");
        if ($('body').hasClass('axil-sticky-menu')) {
            $('body').css({
                "padding-top": $(".page-header").height()
            });
            $('.page-header').css({
                "top": 0 + calculateWpAdminHeight()
            });
        }
        var gapHeight;
        $(window).width() > 992 ? gapHeight = -(jQuery('.header-top').outerHeight() + jQuery('.header-mid').outerHeight()) + $('#wpadminbar').outerHeight() : gapHeight = $('#wpadminbar').outerHeight() - jQuery('.header-mid').outerHeight() - jQuery('.header-top').outerHeight();

        var axil_stick_menu = function () {
            $(window).on('scroll', () => {
                if ($(window).scrollTop() > 0) {
                    $(".page-header").addClass("is-menu-stuck");
                    $('.is-menu-stuck').css({
                        "top": gapHeight
                    });
                } else {
                    $('.is-menu-stuck').removeAttr('style')
                    $(".page-header").removeClass("is-menu-stuck")
                }
            });
        }

        if ($('body').hasClass('axil-sticky-menu')) {
            axil_stick_menu();
        }
    });

})(jQuery);

function axil_paprload_scripts() {
    //variables
    var $ = jQuery,
        _window = $(window),
        _document = $(document),
        _body = $('body'),
        _html = $('html'),
        sideNav = $('.side-nav'),
        zoomGallery = $('.zoom-gallery'),
        niceScrollContainer = $('.nicescroll-container'),
        yScrollContainer = $('.y-scroll-container'),
        _bannerSidebarMediaWrapper = $(".axil-banner-sidebar-media-wrapper"),
        _navbarSearch = $(".navbar-search"),
        _subscribePopUp = $('.subscribe-popup'),
        videoPopup = $('.video-popup');


    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    //text animation
    var textAnim = function () {
        var _loadAnimWrapper = $('.load-anim-wrapper');
        _loadAnimWrapper.each(function () {
            $(this).find('.load-anim').each(function (index) {
                $(this).delay(200 * index)
                    .animate({
                        opacity: "1",
                        top: '0'
                    }, 800);
            });
        })
    };
    textAnim();

    //Popup
    var yPopup = $(".video-popup");
    if (yPopup.length) {
        yPopup.magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }

    //add focus when input has value
    (function () {
        _document.find('input').each(function () {
            if ($(this).val()) {
                $(this).parents('.form-group').addClass('focused');
            }
        });
    })();

    //slider
    if (typeof $.fn.owlCarousel == 'function') {

        $(".axil-papr-carousel").each(function () {
            var options = $(this).data('carousel-options');
            if (AxilObj.rtl == 'yes') {
                options['rtl'] = true;
                options['navText'] = ["<i class='fa fa-angle-right'></i>", "<i class='fa fa-angle-left'></i>"];
            }
            $(this).owlCarousel(options);
        });
        $(".owl-custom-nav .owl-next").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });
    }

    //openSideNav
    var openSideNav = function (e) {
        e.preventDefault();
        sideNav.addClass('opened');
        _html.addClass('side-nav-opened');

        setTimeout(function () {
            $('.side-nav-opened .side-navigation').children('li').each(function (index) {
                $(this).delay(100 * index)
                    .animate({
                        opacity: "1",
                        left: '0'
                    }, 100);

                if (_body.hasClass('rtl')) {
                    $(this).delay(100 * index)
                        .animate({
                            opacity: "1",
                            right: '0'
                        }, 100);
                }
            });
        }, 500);
    };

    //closeSideNav
    var closeSideNav = function (e) {
        if (!$('.side-nav, .side-nav *:not(".close-sidenav")').is(e.target) && !$('.side-nav-toggler, .side-nav-toggler *').is(e.target)) {
            sideNav.removeClass('opened');
            _html.removeClass('side-nav-opened');
            $('.side-navigation').children('li').removeAttr('style');
        }
    };

    //inputFocus
    var inputFocus = function (e) {
        $(this).parents(".form-group").addClass('focused');
    };

    //inputblur
    var inputblur = function (e) {
        if (!$(this).val()) {
            $(this).parents(".form-group").removeClass('focused');
        }
    };

    //openMainNav
    var openMainNav = function () {

        if (_html.hasClass('main-menu-opened')) {
            _html.removeClass('main-menu-opened');
            $(this).removeClass('expanded');
            $('.main-navigation').children('li').removeAttr('style');
        } else {
            $(this).addClass('expanded');

            setTimeout(function () {
                _html.addClass('main-menu-opened');
                $('.main-menu-opened .main-navigation').children('li').each(function (index) {
                    $(this).delay(80 * index)
                        .animate({
                            opacity: "1",
                            top: '0'
                        }, 300);
                });
            }, 800);
        }
    };

    //openSubmenu
    var openSubmenu = function (e) {
        var isOnClick = $('.menu-open-click');

        $(this).attr('href') === "#" ? e.preventDefault() : "";

        _window.width() > 992 ? (
            isOnClick.length ? (
                e.preventDefault(),
                $(this).siblings('.submenu').toggleClass('opened').parent('li').toggleClass('active'),
                $(this).parents('li').siblings('.has-dropdown').removeClass('active').find('.submenu').removeClass('opened')
            ) : ""
        ) : (
            $(this).siblings('.submenu').slideToggle(500, "easeInOutQuint").parent('li').toggleClass('active'),
            $(this).parents('li').siblings().removeClass('active').find('.submenu').slideUp(500, "easeInOutQuint")
        );
    };

    //closeSubmenu
    var closeSubmenu = function (e) {
        !$('.main-navigation li, .main-navigation li a').is(e.target) ? $('.submenu').removeClass('opened').parent('li').removeClass('active') : ""
    };

    //loadSubscribePopup
    var loadSubscribePopup = function () {
        setTimeout(function () {
            _subscribePopUp.addClass('show-popup');
        }, 3000);
    }
    loadSubscribePopup();

    //subscribePopupHide
    var subscribePopupHide = function (e) {
        if (!$('.subscribe-popup-inner, .subscribe-popup-inner *:not(.close-popup,.close-popup i)').is(e.target)) {
            _subscribePopUp.fadeOut("300");
        }
    };

    //slickSync
    var slickSync = function () {
        var _slickCont = $('.slick-slider'),
            _slickFor = $('.slick-slider-nav');

        if (_slickCont.length) {

            var _defaults = {
                items: 1,
                dots: false,
                arrows: false,
                infinite: true,
                centerMode: false,
                variableWidth: false
            }

            if (AxilObj.rtl == 'yes') {
                var _rtl = true,
                    _prevArrow = '<button type="button" class="slick-prev"><i class="feather icon-chevron-right"></i></button>',
                    _nextArrow = '<button type="button" class="slick-next"><i class="feather icon-chevron-left"></i></button>';

            } else {
                var _rtl = false,
                    _prevArrow = '<button type="button" class="slick-prev"><i class="feather icon-chevron-left"></i></button>',
                    _nextArrow = '<button type="button" class="slick-next"><i class="feather icon-chevron-right"></i></button>';
            }

            //vars
            var _items = _slickFor[0].hasAttribute("data-slick-items") ? _slickFor.data('slick-items') : _defaults.items,
                _dots = _slickFor[0].hasAttribute("data-slick-dots") ? _slickFor.data('slick-dots') : _defaults.dots,
                _loop = _slickFor[0].hasAttribute("data-slick-loop") ? _slickFor.data('slick-loop') : _defaults.infinite,
                _center = _slickFor[0].hasAttribute("data-slick-center") ? _slickFor.data('slick-center') : _defaults.centerMode,
                _autoWidth = _slickFor[0].hasAttribute("data-slick-autowidth") ? _slickFor.data('slick-autowidth') : _defaults.variableWidth,
                _arrows = _slickFor[0].hasAttribute("data-slick-arrows") ? _slickFor.data('slick-arrows') : _defaults.arrows;
            console.log(_center);

            $('.slick-slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: true,
                // vertical: true,
                asNavFor: '.slick-slider-nav,.banner-share-slider',
                // autoplay: true,
                // variableWidth: true,
                adaptiveHeight: true,
                rtl: _rtl,
                autoplaySpeed: 2000,
                centerMode: true,
                centerPadding: "0"
            });
            $('.slick-slider-nav').slick({
                slidesToShow: _items,
                slidesToScroll: 1,
                asNavFor: '.slick-slider-for,.banner-share-slider',
                prevArrow: _prevArrow,
                nextArrow: _nextArrow,
                rtl: _rtl,
                arrows: true,
                dots: false,
                infinite: _loop,
                centerMode: true,
                centerPadding: "0",
                // variableWidth: _autoWidth,
                // autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $('.banner-share-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                vertical: true,
                // autoplay: true,
                autoplaySpeed: 2000,
                centerMode: true,
                centerPadding: "0"
            });

        }
    }

    slickSync();

    //toggleShares
    var toggleShares = function () {
        $(this).siblings('.social-share-wrapper').toggleClass('show-shares');
    };


    // Start Off-canvas
    var navSearchShow = function (e) {
        e.preventDefault();
        _navbarSearch.addClass('show-nav-search');
    };

    //navSearchHide
    var navSearchHide = function (e) {
        e.preventDefault();
        _navbarSearch.removeClass('show-nav-search');
    };

    //sideNavHover
    var sideNavHover = function (e) {
        e.preventDefault();
        $(this).removeClass('hover-removed').addClass('hovered').siblings('li').addClass('hover-removed').removeClass('hovered');
    };

    //removeHoverEffect
    var removeHoverEffect = function (e) {
        e.preventDefault();
        $(this).find('li').removeClass('hover-removed hovered');
    };

    //perfectSquare
    var perfectSquare = function () {
        var _square = $('.perfect-square');
        _square.each(function () {
            var squareWidth = $(this).width();
            $(this).height(squareWidth);
        });
    };

    // perfectSquare();

    // End Off-canvas
    $(document).on('click', '.toggle-shares', toggleShares)
        .on('mouseenter', '.side-navigation li', sideNavHover)
        .on('mouseout', '.side-navigation', removeHoverEffect)
        .on('click', '.nav-search-field-toggler', navSearchShow)
        .on('click', '.close-popup', subscribePopupHide)
        .on('click', subscribePopupHide)
        .on('click', '.navbar-search-close', navSearchHide)
        .on('click', '.main-navigation .has-dropdown > a', openSubmenu)
        .on('focus', 'input:not([type="radio"]),input:not([type="checkbox"]),textarea,select', inputFocus)
        .on('blur', 'input,textarea,select', inputblur)
        .on('click', '#main-nav-toggler', openMainNav)
        .on('click', '#side-nav-toggler', openSideNav)
        .on('click', '#close-sidenav', closeSideNav)
        .on('click', closeSideNav)
        .on('click', closeSubmenu);


    if (_body.find('div.masonry-grid').length !== 0) {

        var $grid = $('.masonry-grid').imagesLoaded(function () {
            masonaryGrid = $grid.masonry({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                percentPosition: true,
                isAnimated: true,
                isRTL: true,
                //originLeft: false,
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
            masonaryGrid.masonry('layout');
        });
    }

    // Minimal Slider       
    var _bannerSidebarMediaWrapper = $(".axil-banner-sidebar-media-wrapper");

    var scrollPostDown = function (e) {
        e.preventDefault();
        _bannerSidebarMediaWrapper.animate({
            scrollTop: '+=200'
        }, 800, "easeInOutExpo");
    };

    var scrollPostUp = function (e) {
        e.preventDefault();
        _bannerSidebarMediaWrapper.animate({
            scrollTop: '-=200'
        }, 800, "easeInOutExpo");
    };

    $(document).on('click', '.axil-post-scroll-down', scrollPostDown)
        .on('click', '.axil-post-scroll-up', scrollPostUp);

    // Nice Scroll
    var niceScrollContainer = $('.nicescroll-container');
    var niceScrollInit = function () {
        if (niceScrollContainer.length) {
            niceScrollContainer.niceScroll({
                cursorcolor: "#D3D7DA",
                // cursorwidth: "5px",
                // cursorborder: "1px solid #fff",
                cursorborderradius: "0"
                // background: ""
            });
        }
    };
    niceScrollInit();

    //yScrollInit
    var yScrollInit = function () {
        if (_window.width() > 991 && yScrollContainer.length) {
            yScrollContainer.niceScroll({
                cursorcolor: "#D3D7DA",
                cursorborderradius: "0",
                horizrailenabled: false
            });
        }
    }
    yScrollInit();

    //_masonryInit
    var _masonryInit = function () {
        var _masonryGrid = $('.masonry-holder');
        if (_masonryGrid.length) {
            _masonryGrid.isotope({
                itemSelector: '.masonry-item',
                layoutMode: 'masonry',
                percentPosition: true
            });
        }

    };
    _masonryInit();


    $('.axil-main, .axil-sidebar').theiaStickySidebar({
        // Settings
        additionalMarginTop: 60,
        additionalMarginBottom: 60
    });

    $('.loadmore').on('click', 'a.axil-loadmore', function (e) {
        e.preventDefault();
        var _this = $(this),
            container = _this.parents('.axil-news-posts'),
            catID = container.data("tab-cat"),
            template = container.data("template"),
            contentWrap = container.find('.axil-tab-news-holder'),
            wtgetData = container.data("settings"),
            paged = container.attr('data-paged'),
            contentWrap = container.find('.menu-list'),
            loadmore = container.find('.loadmore'),
            loadmorebtntxt = loadmore.find('a').text();
        $.ajax({
            url: AxilObj.ajaxurl,
            data: {
                action: 'axil_loadmore_news',
                data: wtgetData,
                page: parseInt(paged, 10)
            },
            type: 'POST',
            beforeSend: function () {
                loadmore.find('a').text('Loading...');
            },
            success: function (resp) {
                console.log(resp);
                container.attr('data-paged', parseInt(resp.page));
                if (resp.remaining) {
                    loadmore.find('a').text(loadmorebtntxt);
                } else {
                    loadmore.find('a').text('No data remaining').attr('disabled', true);
                }
                var t = $(resp.html)
                t.find('.axil-item').addClass('test');
                contentWrap.append(resp.html);
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
}

//axil_paprready_scripts
function axil_paprready_scripts() {
    var $ = jQuery;
    /* Scroll to top */
    $('.axil-top-scroll').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.axil-top-scroll').addClass('back-top');
        } else {
            $('.axil-top-scroll').removeClass('back-top');
        }
    });
    /* Counter */
    if (typeof $.fn.counterUp == 'function') {
        $('.counter-inner .axil-counter').counterUp({
            delay: 10,
            time: 5000
        });
    }
    //paprSmoothScroll
    var paprSmoothScroll = function () {
        $('a[href*="#"]')
            .not('[href="#"]')
            .not('[href="#0"]')
            .on('click', function (event) {
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 800, 'easeInOutExpo', function () {
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) {
                                return false;
                            } else {
                                $target.attr('tabindex', '-1');
                                $target.focus();
                            };
                        });
                    }
                }
            });
    }
    // paprSmoothScroll();
    //resetContactform
    var resetContactform = function () {
        var _c7Form = $('.wpcf7');

        _c7Form.each(function () {
            $(this).on('mailsent.wpcf7', function (e) {
                $(this).find('.form-group').removeClass('focused');
            });
        });
    }
    resetContactform();

    var _countPosts = function ($color) {
        var _xxx = $('.social-count-plus li .items > span');

        _xxx.removeAttr("style");
    }

    _countPosts();


}