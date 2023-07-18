'use strict'

// [document](https://laravel.com/docs/10.x/vite#blade-processing-static-assets)
import.meta.glob([
    '../fonts/**',
]);

// 导入 jQuery
import $ from 'jquery'

// Common (required)
import './modules/bootstrap'
import './modules/scroll-top-button'
import './modules/sticky-navbar'

// Common (optional)
import './modules/carousel'
import './modules/device'

// magnificPopup
import 'magnific-popup'

// owl.carousel
import 'owl.carousel'

(function () {
    'use strict'
    /**
     * Magnific
     */
    let Magnific = function () {
        let mfp = $('[data-lightbox]').not('[data-lightbox="gallery"][data-lightbox]'),
            mfpGallery = $('[data-lightbox^="gallery"]')
        if (mfp.length === 0 && mfpGallery.length === 0) return

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