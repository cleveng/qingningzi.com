<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! SEO::generate() !!}
    <link rel="shortcut icon" href="{{ Vite::image('favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ Vite::image('favicon.png') }}">
    @vite(['resources/scss/app.scss', 'resources/js/main.js'])
</head>
<body>
<div class="page">
    @include('app.templates.header')
    <main x-data="{}">
        <div class="container space-2">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="space-1-bottom">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb flex-lg-nowrap justify-content-start justify-content-md-center justify-content-lg-start overflow-hidden">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" class="text-nowrap" rel="nofollow">
                                        <i class="ci-home"></i> 首页
                                    </a>
                                </li>
                                @section('breadcrumb')
                                @show
                            </ol>
                        </nav>
                    </div>
                    @section('search-result')
                    @show

                    <!-- Top ads-->
                    <a id="prev-ads" class="loader card" rel="nofollow" target="_blank"></a>

                    @section('content')
                    @show

                    <!-- Bottom ads-->
                    <a id="next-ads" class="loader card" rel="nofollow" target="_blank"></a>

                    @section('post-navigation')
                    @show

                    @section('comments')
                    @show
                </div>
                <aside class="col-md-12 col-lg-4">
                    <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto">
                        <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4">
                            @section('guest-tag')
                                @include('app.components.search')
                            @show
                            @include('app.components.ads-rental')
                            @include('app.components.ads-product')
                            @include('app.components.trending-post')
                            @include('app.components.popular-tags')
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
    @include('app.templates.footer')
</div>
</body>
</html>
