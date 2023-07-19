<?php $parent_id = isset($parent_id) ? $parent_id : null ?>
<!DOCTYPE html>
<html lang="zh-Hans-CN" class="wide ">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="max-age=7200"/>
    {!! SEO::generate() !!}
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon.png')}}">
    @vite('resources/scss/app.scss')
    <!--[if lt IE 10]>
    <div class="lt-ie-10">
        <a href="https://windows.microsoft.com/en-US/internet-explorer/">
            <img src="{{asset('images/warning_bar_0000_us.jpg')}}" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<div class="page">
    @include('templates.header')
    <main class="page-content">
        @unless(Request::is('/'))
            <div class="container">
                <ol class="breadcrumb space-2 text-xs-center">
                    <li>
                        <a href="{{url('/')}}" rel="nofollow">
                            <i class="ci-home"></i> 首页
                        </a>
                    </li>
                    @section('breadcrumb')
                    @show
                </ol>
            </div>
        @endunless
        @section('content')
        @show
    </main>
    @include('templates.footer')
</div>
@vite('resources/js/app.js')
</body>
</html>
