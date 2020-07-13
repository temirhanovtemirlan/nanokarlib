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
            autoPlay: true,
            autoplaySpeed: 6000,
            focusOnSelect: true,
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
            autoPlay: true,
            autoplaySpeed: 6000,
            dots: true,
            arrows: false
        });

        /* Слайдер на главной странице - блок отзывы */
        $(".review-slide").slick({
            autoPlay: true,
            autoplaySpeed: 6000,
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


    /* Preloader of site
       * ---------------------------------------------------- */

    function sitePreloader() {
        window.onload = function () {
            $("#cube-loader").delay(150).fadeOut('slow', function() {
                $(this).hide();
            });
        };
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

        $(document).mouseup(function (e){ // событие клика по веб-документу
            if (!nav.is(e.target) // если клик был не по нашему блоку
                && nav.has(e.target).length === 0) { // и не по его дочерним элементам
                nav.removeClass('nav-opened');
            }
        });
    }


    /* Custom Smooth Scroll For an Anchor
        * ---------------------------------------------------- */

    function scrollAnchor() {
        $('a.scroll-to').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                let target = $(this.hash);
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 50
                    }, 1000);
                    return false;
                }

                $(".nav-wrapper").removeClass('nav-opened');
            }
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


    function flipBook3D() {

        var fb3d = {
            activeModal: undefined,
            capturedElement: undefined
        };

        (function() {
            function findParent(parent, node) {
                while(parent && parent!=node) {
                    parent = parent.parentNode;
                }
                return parent;
            }
            $('body').on('mousedown', function(e) {
                fb3d.capturedElement = e.target;
            });
            $('body').on('click', function(e) {
                if(fb3d.activeModal && fb3d.capturedElement===e.target) {
                    if(!findParent(e.target, fb3d.activeModal[0]) || findParent(e.target, fb3d.activeModal.find('.cmd-close')[0])) {
                        e.preventDefault();
                        fb3d.activeModal.fb3dModal('hide');
                    }
                }
                delete fb3d.capturedElement;
            });
        })();

        $.fn.fb3dModal = function(cmd) {
            setTimeout(function() {
                function fb3dModalShow() {
                    if(!this.hasClass('visible')) {
                        $('body').addClass('fb3d-modal-shadow');
                        this.addClass('visible');
                        fb3d.activeModal = this;
                        this.trigger('fb3d.modal.show');
                    }
                }
                function fb3dModalHide() {
                    if(this.hasClass('visible')) {
                        $('body').removeClass('fb3d-modal-shadow');
                        this.removeClass('visible');
                        fb3d.activeModal = undefined;
                        this.trigger('fb3d.modal.hide');
                    }
                }
                var mdls = this.filter('.fb3d-modal');
                switch(cmd) {
                    case 'show':
                        fb3dModalShow.call(mdls);
                        break;
                    case 'hide':
                        fb3dModalHide.call(mdls);
                        break;
                }
            }.bind(this), 50);
        };
    }


    /* Initialize
   * ------------------------------------------------------ */
    (function Init() {
        libsSlides();
        scrollToTop();
        sitePreloader();
        headhesive();
        navMenu();
        scrollAnchor();
        flipBook3D();

        new WOW().init();
    })();
});