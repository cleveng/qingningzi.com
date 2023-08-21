@extends('layouts.default')
@section('search')
    <form action="{{url('/search')}}" class="w-100" autocomplete="off" method="get" target="_blank">
        @csrf
        <div class="input-group">
            <label for="keyword" class="sr-only"></label>
            <input id="keyword" name="keyword" class="form-control rounded-end pe-5" type="text"
                   placeholder="{{$tag->name}}"/>
            <i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
        </div>
    </form>
@endsection

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
                            <li class="breadcrumb-item text-nowrap active">
                                {{ $tag->name }}
                            </li>
                        </ol>
                    </nav>
                </div>

                <div>
                    <article>
                        <div class="d-flex align-items-start">
                            <div class="blog-entry-meta-label">
                                <span class='date'>{{ $data->created_at->format('d') }}</span>
                                <span class="year">{{ $data->created_at->format('M') }}</span>
                            </div>
                            <div class="blog-entry-meta-title">
                                <h2 class="h4 blog-entry-title mb-0">
                                    <a href="{{ url($data->shortcode) }}">{{ $data->title }}</a>
                                </h2>
                                <div class="d-flex align-items-center fs-sm">
                                    @if ($data->platform)
                                        <span class='fst-italic'>Posted by：</span>
                                        <span>{{ $data->platform->name }}</span>
                                        <span class="blog-entry-meta-divider"></span>
                                    @endif
                                    @if ($data->rate)
                                        <span class='fst-italic'>Hot：</span>
                                        <span class="text-primary">
                                                {!! $article->rates($data->url, $data->rate) !!}
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a class="blog-entry-thumb mb-3 mt-1 position-relative" href="{{ url($data->shortcode) }}">
                            <img src="{{ $data->thumb }}" alt="{{ $data->title }}"/>
                        </a>
                        <p class="fs-md">{{ $data->description }}</p>
                        <div class="d-flex justify-content-end justify-content-sm-between align-content-center">
                            @include('components.social', ['item' => $data])
                            <a href="{{ url($data->shortcode) }}" class="btn btn-primary rounded-0">马上围观</a>
                        </div>
                    </article>
                </div>
            </div>

            @inject('tags', 'App\Services\TagsService')
            <aside class="col-md-12 col-lg-4">
                <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto">
                    <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4">
                        <div class="widget pb-grid-gutter mx-lg-2">
                            <h3 class="widget-title">猜你喜欢</h3>
                            @foreach ($tags->popular(Request::getRequestUri(), $tag->name) as $tag)
                                <a class="btn-tag me-2 mb-2"
                                   href="{{ url('search?tag=' . urlencode($tag->name)) }}">#{{$tag->name}}</a>
                            @endforeach
                        </div>
                        @include('components.right-bar')
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
