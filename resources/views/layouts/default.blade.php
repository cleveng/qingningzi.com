<?php $parent_id = isset($parent_id) ? $parent_id : null ?>
    <!DOCTYPE html>
<html lang="zh-Hans-CN" class="wide wow-animation">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="max-age=7200"/>
    {!! SEO::generate() !!}
    <link href="{{asset('images/favicon.ico')}}" rel="shortcut icon"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fl-line-icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdi-icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/rd-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/easy-responsive-tabs.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/TimeCircles.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/rd-range.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.countdown.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/qingningzi.min.css')}}">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;">
        <a href="https://windows.microsoft.com/en-US/internet-explorer/">
            <img src="{{asset('images/warning_bar_0000_us.jpg')}}" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<div class="page text-center">
    @include('templates.header')
    <main class="page-content">
        @unless(Request::is('/'))
            <div class="shell">
                <div>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}" class="text-primary" rel="nofollow">
                                <i class="icon icon-sm fa-home"></i> 首页
                            </a>
                        </li>
                        @section('breadcrumb')
                        @show
                    </ol>
                </div>
            </div>
        @endunless
        @section('content')
        @show
    </main>
    @include('templates.footer')
</div>
<script src="//cdn.bootcss.com/jquery_lazyload/1.9.5/jquery.lazyload.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/jquery-cookie/1.3.1/jquery.cookie.min.js"></script>
<script src="//cdn.bootcss.com/device.js/0.2.6/device.min.js"></script>
<script src="//cdn.bootcss.com/jquery-resize/1.0/jquery.ba-resize.min.js"></script>
<script src="//cdn.bootcss.com/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdn.bootcss.com/jquery.touchswipe/1.6.16/jquery.touchSwipe.min.js"></script>
<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>
<script src="//cdn.bootcss.com/Swiper/3.1.7/js/swiper.jquery.min.js"></script>
<script src="//cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>
<script src="//cdn.bootcss.com/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
<script src="//cdn.bootcss.com/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
<script src="//cdn.bootcss.com/slick-carousel/1.5.9/slick.min.js"></script>
<script src="//cdn.bootcss.com/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="//cdn.bootcss.com/select2/4.0.2/js/select2.min.js"></script>
<script src="//cdn.bootcss.com/progressbar.js/0.9.0/progressbar.min.js"></script>
<script src="//cdn.bootcss.com/timecircles/1.5.3/TimeCircles.min.js"></script>
<script src="//cdn.bootcss.com/jquery-countdown/2.0.2/jquery.plugin.min.js"></script>
<script src="//cdn.bootcss.com/jquery-countdown/2.0.2/jquery.countdown.min.js"></script>
<script src="//cdn.bootcss.com/OwlCarousel2/2.1.6/owl.carousel.min.js"></script>
<script src="{{asset('js/jquery.ui.totop.min.js')}}"></script>
<script src="{{asset('js/easyResponsiveTabs.min.js')}}"></script>
<script src="{{asset('js/jquery.countTo.js')}}"></script>
<script src="{{asset('js/rd-calendar.min.js')}}"></script>
<script src="{{asset('js/stacktable.min.js')}}"></script>
<script src="{{asset('js/rd-toggle.min.js')}}"></script>
<script src="{{asset('js/rd-navbar.min.js')}}"></script>
<script src="{{asset('js/core.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    +$(function () {
        "use strict";
        var postImg = jQuery("a.post-img");
        $("img.img-responsive").lazyload({
            placeholder: "{{asset('images/default_thumb.jpg')}}",
            effect: "fadeIn",
            threshold: 200,
        });
        $("[data-toggle='tooltip']").tooltip({
            container: 'body'
        });
        // 我要投稿
        var _shop = $(".rd-navbar-shop");
        var _toggle = $(".rd-navbar-shop-toggle");
        var _panel = $(".rd-navbar-shop-panel");
        _panel.find("div.unit-body").on("click", "a", function (e) {
            e.preventDefault();
            _shop.removeClass("active");
            _toggle.children("a").removeClass("active");
        });
        var _cancel = $("#panel-cancel");
        _cancel.on("click", function (e) {
            e.preventDefault();
            _shop.removeClass("active");
            _toggle.children("a").removeClass("active");
        });
        // 投稿结束
        postImg.on("mouseover", "img", function (e) {
            e.preventDefault();
            var $this = jQuery(this);
            $this.addClass("pulse");
        });
        postImg.on("mouseout", "img", function (e) {
            e.preventDefault();
            var $this = jQuery(this);
            $this.removeClass("pulse");
        });
    });
</script>
</body>
</html>
