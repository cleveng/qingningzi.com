@extends('layouts.default')
@section('content')
    @inject('article', 'App\Services\ArticlesService')
    @inject('prom', 'App\Services\PromotionsService')
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

                <?php $topBar = $prom->item(\App\Enums\PromotionType::TopBar); ?>
                @if ($topBar)
                    <a href="{{ url('/redirect?target_id=' . $topBar->id) }}" rel="nofollow" target="_blank"
                       class="card" title="{{ $topBar->title }}">
                        <img alt="{{ $topBar->title }}" src="{{ asset($topBar->cover_image) }}" class="card-img">
                    </a>
                @endif

                <div class="my-5 mb-md-0">
                    @foreach ($data as $key => $item)
                        @include('components.article-item', ['data'=>$item, 'key'=>$key])
                    @endforeach
                </div>

                {{ $data->render() }}

                <?php $bottomBar = $prom->item(\App\Enums\PromotionType::TopBar, $topBar->id); ?>
                @if ($bottomBar)
                    <a href="{{ url('/redirect?target_id=' . $bottomBar->id) }}" rel="nofollow" target="_blank"
                       class="card mt-5" title="{{ $bottomBar->title }}">
                        <img alt="{{ $bottomBar->title }}" src="{{ asset($bottomBar->cover_image) }}"
                             class="card-img">
                    </a>
                @endif
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
