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
    <div class="shell section-bottom-60">
        <div class="range">
            <div class="cell-md-8 text-xs-left">
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
                            <p class="hidden-xs">
                                @if($data->platform)
                                    <span class='text-italic'>Posted by </span>
                                    <span>{{$data->platform->name}}</span>
                                    &#8226;
                                @endif
                                @if($data->rate)
                                    <span class='text-italic'>Hot：</span>
                                    <span class="text-primary">
                                       {!! $article->rates($data->url,$data->rate) !!}
                                    </span>
                                    &#8226;
                                @endif
                                <span class='text-italic'>Views：</span>
                                <span id="hits">{{$data->views_count}} 次</span>
                                &#8226;
                                @if($data->author)
                                    <span class='text-italic'>Writer：{{$data->author}}</span>
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
                    <p class="offset-top-20 hidden-xs hidden-sm">相关热词:
                        @foreach($tag->keywords($data->keywords, $data->shortcode) as $item)
                            <a href="{{url('search?keyword='.urlencode($item))}}">
                                {{$item}}
                            </a>
                        @endforeach
                    </p>
                    @include('components.social')
                    <hr class="divider divider-offset-lg divider-gray @if($data->platform->qrcode) hidden-xs hidden-sm @endif">
                    @include('components.author')
                    @include('components.changyan')
                </div>
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection


