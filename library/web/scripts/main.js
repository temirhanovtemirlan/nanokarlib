/*
 * Projects - Main JS
 *
 * ------------------------------------------------------------------- */
'use strict';

$(function () {

    /* Variables
    * ---------------------------------------------------- */
    let $win = $(window);


    /* Sliders
    * ---------------------------------------------------- */

    function libsSlides() {

        /* Слайдер на главной странице - блок видео */
        $(".video-slide").slick({
            arrows: true,
            dots: true,
            prevArrow: '<button class="slide-left"></button>',
            nextArrow: '<button class="slide-right"></button>',
            responsive: [
                {
                    breakpoint: 640,
                    settings: {
                        arrows: false
                    }
                },
            ]
        });

        /* Слайдер на главной странице - блок FAQ */
        $(".fag-slide").slick({
            dots: true,
            arrows: false
        });

        /* Слайдер на главной странице - блок отзывы */
        $(".review-slide").slick({
            dots: true,
            arrows: false
        });

    }


    /* Scroll filter to footer
        * ---------------------------------------------------- */

    function scrollToTop() {
        let element = $('.scroll-top'),
            win = ($win.width() > 768) ? '120px' : '44px';

        $(window).scroll(function() {
            if($(this).scrollTop() > 100){
                element.stop().animate({
                    bottom: win
                }, 750);
            }
            else{
                element.stop().animate({
                    bottom: '-100px'
                }, 750);
            }
        });

        element.click(function() {
            $('html, body').stop().animate({
                scrollTop: 0
            }, 750, function() {
                element.stop().animate({
                    bottom: '-100px'
                }, 750);
            });
        });
    }


    /* Header clone sticky
       * ---------------------------------------------------- */

    function headhesive() {
        let options = {
            classes: {
                clone: 'header-clone',
                stick: 'header-stick',
                unstick: 'header-unstick'
            }
        };
        let headhesive = new Headhesive('.the-header', options);
        $('.header-clone').removeClass('the-origin-header');
    }


    /* Navigation menu
        * ---------------------------------------------------- */

    function navMenu() {
        let menu_btn = $(".the-header .menu-toggle"),
            nav_close = $(".nav-close"),
            nav = $(".nav-wrapper");

        nav_close.on('click', function (e) {
            nav.removeClass('nav-opened');
        });
        menu_btn.on("click", function (e) {
            nav.toggleClass('nav-opened');
        });

        // $(document).on('click', function(f){
        //     if(!(
        //         ($(f.target).parents('.nav-wrapper').length)
        //         || ($(f.target).hasClass('.nav-wrapper'))
        //         || ($(f.target).hasClass('.the-header .menu-toggle')))
        //     ) {
        //         nav.removeClass('nav-opened');
        //     }
        // });

    }


    /* Custom modal
        * ---------------------------------------------------- */

    function customModal(popup) {
        let overlay = $('.modal_overlay');
        popup.addClass('popup--active');

        overlay.css({
            'visibility': 'visible',
            'opacity': 1
        });
        $(this).css({
            'z-index': '-1'
        });

        popup.find('.close').on('click', function () {
            $(this).parent().siblings('.btn').css({
                'z-index': '1'
            });
            popup.removeClass('popup--active');
            setTimeout(function () {
                overlay.css({
                    'visibility': 'hidden',
                    'opacity': 0
                });
            }, 200)
        });
    }


    /* Initialize
   * ------------------------------------------------------ */
    (function Init() {
        libsSlides();
        scrollToTop();
        headhesive();
        navMenu();

        new WOW().init();
    })();
});