@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        @if($category->parent())
            <li>
                <a rel="nofollow" href="{{url('categories/'.$category->parent()->id)}}">
                    {{$category->parent()->title}}
                </a>
            </li>
        @endif
        <li>
            <a rel="nofollow" href="{{url('categories/'.$category->id)}}">
                {{$category->title}}
            </a>
        </li>
        <li>
            {{$data->title}}
        </li>
    @endsection
    @inject('article', 'App\Services\ArticlesService')
    <div class="container space-2-bottom">
        <div class="row">
            <div class="col-md-8 text-xs-start">
                <div class="blog-post">
                    <div
                            class="blog-post-meta unit unit-xs-horizontal unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                        <div class="unit-left">
                            <div class="center-block blog-post-meta-date">
                                    <span class='blog-post-meta-date-big reveal-block'>
                                        {{$data->created_at->format('d')}}
                                    </span>
                                <span>{{$data->created_at->format('M')}}</span>
                            </div>
                        </div>
                        <div class="unit-body">
                            <h3 class="blog-post-meta-title">{{$data->title}}</h3>
                            <p class="d-none d-sm-block">
                                @if($data->platform)
                                    <span class='fst-italic'>Posted by </span>
                                    <span>{{$data->platform->name}}</span>
                                    &#8226;
                                @endif
                                @if($data->rate)
                                    <span class='fst-italic'>Hot：</span>
                                    <span class="text-primary">
                                       {!! $article->rates($data->url,$data->rate) !!}
                                    </span>
                                    &#8226;
                                @endif
                                <span class='fst-italic'>Views：</span>
                                <span id="hits">{{$data->views_count}} 次</span>
                                &#8226;
                                @if($data->author)
                                    <span class='fst-italic'>Writer：{{$data->author}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="blog-post-media">
                        @if($data->content)
                            {!! $data->content !!}
                        @else
                            {{$data->description}}
                        @endif
                    </div>
                    @inject('tag', 'App\Services\TagsService')
                    <p class="space-1-top d-none d-sm-block hidden-sm">相关热词:
                        @foreach($tag->keywords($data->keywords, $data->shortcode) as $item)
                            <a href="{{url('search?keyword='.urlencode($item))}}">
                                {{$item}}
                            </a>
                        @endforeach
                    </p>
                    @include('components.social',['item'=>$data])
                    <hr class="my-5 @if($data->platform->qrcode) d-none d-sm-block hidden-sm @endif">
                    @include('components.author')
                    @include('components.changyan')
                </div>
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection


