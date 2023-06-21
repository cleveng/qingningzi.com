'use strict'

// Popper
import * as Popper from '@popperjs/core'
// 导入 jQuery
import $ from 'jquery'
// window.jQuery = window.$ = $
// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

import { device } from 'device.js'

import './libs/rd-navbar.min'

import SmoothScroll from 'smooth-scroll'

// magnificPopup
import 'magnific-popup'

// owl.carousel
import 'owl.carousel'

// 导入 Swiper 的 JavaScript 文件
import Swiper from 'swiper/bundle'

window.Popper = Popper

(function () {
    'use strict'
    /**
     * Anchor smooth scrolling
     * @requires https://github.com/cferdinandi/smooth-scroll/
     */
    let smoothScroll = function () {
        let selector = '[data-scroll]',
            fixedHeader = '[data-scroll-header]',
            scroll = new SmoothScroll(selector, {
                speed: 800,
                speedAsDuration: true,
                offset: 40,
                header: fixedHeader,
                updateURL: false
            })
    }()

    /**
     * Animate scroll to top button in/off view
     */
    let scrollTopButton = function () {
        var element = document.querySelector('.ui-to-top'),
            scrollOffset = 600
        if (element == null) return
        var offsetFromTop = parseInt(scrollOffset, 10)
        window.addEventListener('scroll', function (e) {
            if (e.currentTarget.pageYOffset > offsetFromTop) {
                element.classList.add('active')
            } else {
                element.classList.remove('active')
            }
        })
    }()

    /**
     * Tooltip
     * @requires https://getbootstrap.com
     * @requires https://popper.js.org/
     */
    let tooltip = function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                trigger: 'hover'
            })
        })
    }()

    /**
     * Popover
     * @requires https://getbootstrap.com
     * @requires https://popper.js.org/
     */
    let popover = function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    }()

    /**
     * Toast
     * @requires https://getbootstrap.com
     */
    let toast = function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })
    }()

    /**
     * Shop    投稿
     */
    let shopButton = function () {
        let element = document.querySelector('.rd-navbar-shop')
        if (element == null) return
        element.addEventListener('click', function (event) {
            let el = event.target,
                closeOrCancel = el.classList.contains('rd-navbar-shop-close') || el.classList.contains('rd-navbar-shop-cancel')
            if (closeOrCancel) {
                element.classList.remove('active')
            }
        })
    }()

    let deviceEvent = function () {
        device.addClasses(document.documentElement)
    }()

    /**
     * Magnific
     */
    let Magnific = function () {
        let mfp = $('[data-lightbox]').not('[data-lightbox="gallery"][data-lightbox]'),
            mfpGallery = $('[data-lightbox^="gallery"]')
        if (mfp.length === 0 || mfpGallery.length === 0) return

        if (mfp.length) {
            for (let i = 0; i < mfp.length; i++) {
                let mfpItem = mfp[i]
                $(mfpItem).magnificPopup({
                    type: mfpItem.getAttribute('data-lightbox')
                })
            }
        }
        if (mfpGallery.length) {
            for (let i = 0; i < mfpGallery.length; i++) {
                let mfpGalleryItem = $(mfpGallery[i]).find('[data-lightbox]')
                for (let c = 0; c < mfpGalleryItem.length; c++) {
                    $(mfpGalleryItem).addClass('mfp-' + $(mfpGalleryItem).attr('data-lightbox'))
                }

                mfpGalleryItem.end()
                    .magnificPopup({
                        delegate: '[data-lightbox]',
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    })
            }
        }
    }()


    /**
     * swiper
     */
    let swiperEvent = function () {
        let element = document.querySelector('.swiper')
        if (element == null) return

        let swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        })
    }()


})()

// [magnificPopup](http://dimsemenov.com/plugins/magnific-popup/) 使用cdn
let userAgent = navigator.userAgent.toLowerCase(),
    isTouch = 'ontouchstart' in window,
    $document = $(document),
    plugins = {
        owl: jQuery('.owl-carousel'),
        navbar: jQuery('.rd-navbar'),
    },
    i = 0

$document.ready(function () {
    /**
     * @module       RD Navbar
     */
    if (plugins.navbar.length) {
        plugins.navbar.RDNavbar({
            stickUpClone: false,
            stickUpOffset: plugins.navbar.data('stick-up-offset') || 1
        })
    }

    function preventScroll(e) {
        e.preventDefault()
    }

    /**
     * @module       Owl carousel
     */
    if (plugins.owl.length) {
        for (i = 0; i < plugins.owl.length; i++) {
            let c = jQuery(plugins.owl[i]),
                responsive = {}

            let aliaces = ['-', '-xs-', '-sm-', '-md-', '-lg-'],
                values = [0, 480, 768, 992, 1200], k

            for (let j = 0; j < values.length; j++) {
                responsive[values[j]] = {}
                for (k = j; k >= -1; k--) {
                    if (!responsive[values[j]]['items'] && c.attr('data' + aliaces[k] + 'items')) {
                        responsive[values[j]]['items'] = k < 0 ? 1 : parseInt(c.attr('data' + aliaces[k] + 'items'))
                    }
                    if (!responsive[values[j]]['stagePadding'] && responsive[values[j]]['stagePadding'] !== 0 && c.attr('data' + aliaces[k] + 'stage-padding')) {
                        responsive[values[j]]['stagePadding'] = k < 0 ? 0 : parseInt(c.attr('data' + aliaces[k] + 'stage-padding'))
                    }
                    if (!responsive[values[j]]['margin'] && responsive[values[j]]['margin'] !== 0 && c.attr('data' + aliaces[k] + 'margin')) {
                        responsive[values[j]]['margin'] = k < 0 ? 30 : parseInt(c.attr('data' + aliaces[k] + 'margin'))
                    }
                }
            }

            c.owlCarousel({
                autoplay: c.attr('data-autoplay') === 'true',
                loop: c.attr('data-loop') !== 'false',
                items: 1,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                dotsContainer: c.attr('data-pagination-class') || false,
                navContainer: c.attr('data-navigation-class') || false,
                mouseDrag: c.attr('data-mouse-drag') !== 'false',
                nav: c.attr('data-nav') === 'true',
                dots: c.attr('data-dots') === 'true',
                dotsEach: c.attr('data-dots-each') ? parseInt(c.attr('data-dots-each')) : false,
                responsive: responsive,
                navText: [],
                onInitialized: function () {
                    if ($.fn.magnificPopup) {
                        var o = this.$element.attr('data-lightbox') !== undefined && this.$element.attr('data-lightbox') !== 'gallery',
                            g = this.$element.attr('data-lightbox') === 'gallery'
                        if (o) {
                            for (var m = 0; m < (this.$element).length; m++) {
                                var $this = $(this.$element[m])
                                $this.magnificPopup({
                                    type: $this.attr('data-lightbox'),
                                    callbacks: {
                                        open: function () {
                                            if (isTouch) {
                                                $document.on('touchmove', preventScroll)
                                                $document.swipe({
                                                    swipeDown: function () {
                                                        $.magnificPopup.close()
                                                    }
                                                })
                                            }
                                        },
                                        close: function () {
                                            if (isTouch) {
                                                $document.off('touchmove', preventScroll)
                                                $document.swipe('destroy')
                                            }
                                        }
                                    }
                                })
                            }
                        }
                        if (g) {
                            for (var k = 0; k < (this.$element).length; k++) {
                                var $gallery = $(this.$element[k]).find('[data-lightbox]')
                                for (var j = 0; j < $gallery.length; j++) {
                                    var $item = $($gallery[j])
                                    $item.addClass('mfp-' + $item.attr('data-lightbox'))
                                }
                                $gallery.end()
                                    .magnificPopup({
                                        delegate: '.owl-item [data-lightbox]',
                                        type: 'image',
                                        gallery: {
                                            enabled: true
                                        },
                                        callbacks: {
                                            open: function () {
                                                if (isTouch) {
                                                    $document.on('touchmove', preventScroll)
                                                    $document.swipe({
                                                        swipeDown: function () {
                                                            $.magnificPopup.close()
                                                        }
                                                    })
                                                }
                                            },
                                            close: function () {
                                                if (isTouch) {
                                                    $document.off('touchmove', preventScroll)
                                                    $document.swipe('destroy')
                                                }
                                            }
                                        }
                                    })
                            }
                        }
                    }
                }
            })
        }
    }

})