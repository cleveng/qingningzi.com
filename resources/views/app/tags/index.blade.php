@inject('prom', 'App\Services\PromotionsService')
@inject('article', 'App\Services\ArticlesService')
@inject('tags', 'App\Services\TagsService')

@extends('layouts.blog')
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

@section('breadcrumb')
    <li class="breadcrumb-item text-nowrap active">
        {{ $tag->name }}
    </li>
@endsection

@section('search-result')
    <div class="mb-5">
        @include('app.components.article-item', ['data'=>$data, 'key'=>-1])
    </div>
@endsection

@section('content')
    <div class="my-5">
        <h2 class="mb-4 pb-md-3 pb-2 h4">推荐内容</h2>
        @foreach($article->popular($tag->taggable_id, 3) as $key=>$item)
            @include('app.components.article-item', ['data'=>$item, 'key'=>$key])
        @endforeach
    </div>
@endsection

@section('guest-tag')
    <div class="widget pb-grid-gutter mx-lg-2">
        <h3 class="widget-title">猜你喜欢</h3>
        @foreach ($tags->popular(Request::getRequestUri(), $tag->name) as $tag)
            <a class="btn-tag me-2 mb-2"
               href="{{ url('search?tag=' . urlencode($tag->name)) }}">#{{$tag->name}}</a>
        @endforeach
    </div>
@endsection
