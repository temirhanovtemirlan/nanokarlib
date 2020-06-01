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
            arrows: false,
            asNavFor: '.review-social-slide'
        });

        /* Слайдер на главной странице - блок отзывы (соц. сети) */
        $(".review-social-slide").slick({
            fade: true,
            arrows: false,
            asNavFor: '.review-slide'
        });

        /* Главный слайдер на странице товара */
        let product_slide = $(".product-slide"),
            nav = $(".product-color-nav");
        $.each(nav, function () {
            let item = $(this);
        });
        product_slide.slick({
            centerMode: true,
            centerPadding: '128px',
            responsive: [
                {breakpoint: 768, settings: {centerPadding: '80px',}},
                {breakpoint: 640, settings: {centerPadding: '40px',}},
            ]
        });
    }


    /* Scroll filter to footer
        * ---------------------------------------------------- */

    function scrollToFooter() {
        let element = $('#footer'),
            filter = $('.mobile-filter');
        $(window).scroll(function () {
            let scroll = $(window).scrollTop() + $(window).height(),
                offset = element.offset().top;
            (scroll > offset) ? filter.addClass('--foot') : filter.removeClass('--foot');
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
            iconImageHref: '../../images/map-label.png',
            iconImageSize: [64, 64],
            iconImageOffset: [-32, -64],
            balloonContentSize: [320, 120],
            balloonLayout: "default#imageWithContent",
            balloonImageHref: 'assets/images/map-label.png',
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
    })();
});