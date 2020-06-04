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


    /* Ymaps (yandex)
    * ---------------------------------------------------- */

    function maps(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчнию: «широта, долгота».
            center: [49.815983, 73.099758],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 17
        });

        var placemark = new ymaps.Placemark([49.815983, 73.099758], {
            balloonContent: '<div class="ballon"><div class="logo"></div><div class="ball-00">Гоголя, 34 көшесі <br>+7 (7212) 56-70-84 <br>langcenterkar@mail.ru</div></div>',
            iconImageHref: '../images/map-label.png',
            iconImageSize: [64, 64],
            iconImageOffset: [-32, -64],
            balloonContentSize: [320, 120],
            balloonLayout: "default#imageWithContent",
            balloonImageHref: '/images/map-label.png',
            balloonImageOffset: [-65, -89],
            balloonImageSize: [310, 110],
            balloonShadow: false,
            balloonAutoPan: false
        });

        myMap.geoObjects.add(placemark);
    }

    /* Initialize
   * ------------------------------------------------------ */
    (function Init() {
        libsSlides();
        ymaps.ready(maps);
        scrollToTop();

        new WOW().init();
    })();
});