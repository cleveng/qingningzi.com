@inject('site', 'App\Services\SitesService')
@inject('prom', 'App\Services\PromotionsService')
@php
    $ads_enabled = $site->ads_enabled();
@endphp
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
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="page">
    @include('app.templates.header')
    <main>
        <div class="container space-2">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="space-1-bottom">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
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
                    @php
                        $top_ads = $ads_enabled ? $prom->item(\App\Enums\PromotionType::TopBar) : null;
                    @endphp
                    @if ($top_ads)
                        <a href="{{ url('/redirect?target_id=' . $top_ads->id) }}" rel="nofollow" target="_blank"
                           class="card" title="{{ $top_ads->title }}">
                            <img alt="{{ $top_ads->title }}" src="{{ url($top_ads->cover_image) }}" class="card-img">
                        </a>
                    @endif

                    @section('content')
                    @show

                    <!-- Bottom ads-->
                    @php
                        $bottom_ads = $top_ads ? $bottom_ads = $prom->item(\App\Enums\PromotionType::TopBar, $top_ads->id) : null;
                    @endphp
                    @if($bottom_ads)
                        <a href="{{ url('/redirect?target_id=' . $bottom_ads->id) }}" rel="nofollow" target="_blank"
                           class="card mt-5" title="{{ $bottom_ads->title }}">
                            <img alt="{{ $bottom_ads->title }}" src="{{ url($bottom_ads->cover_image) }}"
                                 class="card-img">
                        </a>
                    @endif

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
