@extends('layouts.default')
@section('content')
    @inject('article', 'App\Services\ArticlesService')
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
                            @if ($category->parent())
                                <li class="breadcrumb-item text-nowrap">
                                    <a rel="nofollow" href="{{ url('categories/' . $category->parent()->id) }}">
                                        {{ $category->parent()->title }}
                                    </a>
                                </li>
                            @endif
                            <li class="breadcrumb-item text-nowrap active">
                                {{ $category->title }}
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-5 mb-md-0">
                    @foreach ($data as $key => $item)
                        <article class="@if($key > 0) mt-5 pt-5 border-top @endif">
                            <div class="d-flex align-items-start">
                                <div class="blog-entry-meta-label">
                                    <span class='date'>{{ $item->created_at->format('d') }}</span>
                                    <span class="year">{{ $item->created_at->format('M') }}</span>
                                </div>
                                <div class="blog-entry-meta-title">
                                    <h2 class="h4 blog-entry-title mb-0">
                                        <a href="{{ url($item->shortcode) }}">{{ $item->title }}</a>
                                    </h2>
                                    <div class="d-flex align-items-center fs-sm">
                                        @if ($item->platform)
                                            <div>
                                                <span class='fst-italic'>Posted by：</span>
                                                <a rel="nofollow" href="{{url('/platforms/'.$item->platform_id)}}">{{ $item->platform->name }}</a>
                                            </div>
                                        @endif
                                        @if ($item->rate)
                                            <div class="d-none d-md-inline-flex">
                                                <span class="blog-entry-meta-divider"></span>
                                                <span class='fst-italic'>Hot：</span>
                                                <span class="text-primary">
                                                {!! $article->rates($item->url, $item->rate) !!}
                                            </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a class="blog-entry-thumb mb-3 mt-1" href="{{ url($item->shortcode) }}">
                                <img alt="{{ $item->title }}"
                                     @if($key >= 2) class="lazy" data-src="{{ $item->thumb }}"
                                     @else src="{{ $item->thumb }}" @endif >
                            </a>
                            <p class="fs-md">{{ $item->description }}</p>
                            <div class="d-flex justify-content-end justify-content-sm-between align-content-center">
                                @include('components.social', ['item' => $item])
                                <a href="{{ url($item->shortcode) }}" class="btn btn-primary rounded-0">马上围观</a>
                            </div>
                        </article>
                    @endforeach
                </div>
                {{ $data->render() }}
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
