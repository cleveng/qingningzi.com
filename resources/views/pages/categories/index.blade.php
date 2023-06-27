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
        <li class="active">
            {{$category->title}}
        </li>
    @endsection
    @inject('article', 'App\Services\ArticlesService')
    <div class="container space-2-bottom--lg">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div>
                    @foreach($data as $key=>$item)
                        <div class="blog-post">
                            <div
                                    class="blog-post-meta unit unit-xs-horizontal unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                                <div class="unit-left">
                                    <div class="center-block blog-post-meta-date">
                                    <span class='blog-post-meta-date-big reveal-block'>
                                        {{$item->created_at->format('d')}}
                                    </span>
                                        <span>{{$item->created_at->format('M')}}</span>
                                    </div>
                                </div>
                                <div class="unit-body">
                                    <h3 class="blog-post-meta-title">
                                        <a href="{{url($url_prefix.$item->shortcode)}}" class="text-base"
                                           title="{{$item->title}}">{{$item->title}}</a></h3>
                                    <p class="d-none d-sm-block mb-0">
                                        @if($item->platform)
                                            <span class='fst-italic'>Posted by </span>
                                            <span>{{$item->platform->name}}</span>
                                            &#8226;
                                        @endif
                                        @if($item->rate)
                                            <span class='fst-italic'>Hot：</span>
                                            <span class="text-primary">
                                            {!! $article->rates($item->url,$item->rate) !!}
                                        </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="blog-post-media">
                                @if($key%3 == 0)
                                    <a title="{{$item->title}}" data-lightbox="image" href="{{$item->thumb}}"
                                       class="thumbnail">
                                        <img alt="{{$item->title}}"
                                             src="{{$item->thumb}}" class="img-fluid w-100"/>
                                        <span class="caption"></span>
                                    </a>
                                @else
                                    <a href="{{url('p/'.$item->shortcode)}}"
                                       title="{{$item->title}}">
                                        <img alt="{{$item->title}}"
                                             src="{{$item->thumb}}"
                                             class="img-fluid w-100">
                                    </a>
                                @endif
                            </div>
                            <p class="blog-post-desc">{{$item->description}}</p>
                            <div class="d-flex justify-content-end justify-content-md-between align-content-center">
                                @include('components.social',['item'=>$item])
                                <div>
                                    <a href="{{url('p/'.$item->shortcode)}}" class="btn btn-primary">马上围观</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$data->render()}}
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
