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
        let element = $('.main-video'),
            filter = $('.scroll-top');
        $(window).scroll(function () {
            let scroll = $(window).scrollTop(),
                offset = element.offset().top;
            (scroll > offset) ? filter.addClass('show') : filter.removeClass('show');
        });
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

        new WOW().init();
    })();
});