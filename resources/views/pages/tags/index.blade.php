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
    @inject('prom', 'App\Services\PromotionsService')
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

                <div class="mb-5">
                    @include('components.article-item', ['data'=>$data, 'key'=>-1])
                </div>

                <?php $topBar = $prom->item(\App\Enums\PromotionType::TopBar); ?>
                @if ($topBar)
                    <a href="{{ url('/redirect?target_id=' . $topBar->id) }}" rel="nofollow" target="_blank"
                       class="card" title="{{ $topBar->title }}">
                        <img alt="{{ $topBar->title }}" src="{{ asset($topBar->cover_image) }}" class="card-img">
                    </a>
                @endif

                <div class="my-5">
                    <h2 class="mb-4 pb-md-3 pb-2 h4">推荐内容</h2>
                    @foreach($article->popular($tag->taggable_id, 3) as $key=>$item)
                        @include('components.article-item', ['data'=>$item, 'key'=>$key])
                    @endforeach
                </div>

                <?php $bottomBar = $prom->item(\App\Enums\PromotionType::TopBar, $topBar->id); ?>
                @if ($bottomBar)
                    <a href="{{ url('/redirect?target_id=' . $bottomBar->id) }}" rel="nofollow" target="_blank"
                       class="card mt-5" title="{{ $bottomBar->title }}">
                        <img alt="{{ $bottomBar->title }}" src="{{ asset($bottomBar->cover_image) }}"
                             class="card-img">
                    </a>
                @endif
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
