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

                    @if($data->file_type === \App\Enums\FileType::LINK)
                        <blockquote class="quote">
                            <h6>
                                <q>
                                    {{Str::limit($data->description,168)}}
                                </q>
                            </h6>
                            <p class="hidden-xs hidden-sm text-limit">
                                相关资源：<cite class="text-muted">-
                                    @if($data->file_url)
                                        <a href="{{$data->file_url}}" rel="nofollow" target="_blank">点击获取</a>
                                    @else
                                        暂无内容
                                    @endif
                                </cite>
                            </p>
                        </blockquote>
                    @endif

                    @if($data->file_type === \App\Enums\FileType::CAROUSEL)
                        <div class="blog-post-media">
                            <div data-nav="true" data-items="1" data-lightbox="gallery"
                                 class="owl-nav-center owl-carousel">
                                @foreach($data->media as $medium)
                                    <a data-lightbox="image" href="{{asset($medium['display_url'])}}" class="thumbnail"
                                       title="{{$medium['display_name']}}">
                                        <img width="770" height="564" alt="{{$medium['display_name']}}"
                                             data-original="{{asset($medium['display_url'])}}"
                                             class="img-responsive">
                                        <div class="caption"></div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($data->file_type === \App\Enums\FileType::BOOK)
                        <div class="blog-post-media blog-post-media-link thumbnail-variant-3">
                            <img alt="{{$data->title}}" src="{{asset($data->thumb)}}" class="img-responsive"
                                 style="opacity: 0.9;width:100%;">
                            <div class="caption">
                                <h4 class="text-center"><span class="icon icon-white"></span>
                                    <a rel="nofollow" href="{{$data->file_url}}">{{$data->title}} 书籍链接</a>
                                </h4>
                            </div>
                        </div>
                    @endif

                    @if($data->file_type === \App\Enums\FileType::MP4)
                        <div class="blog-post-media">
                            <video src="{{$data->file_url}}" style="width: 100%;height: auto"
                                   poster="{{$data->thumb}}" controls=""
                                   webkit-playsinline=""></video>
                        </div>
                    @endif

                    <div class="blog-post-media">
                        @if($data->content)
                            {!! $data->content !!}
                        @else
                            {{$data->description}}
                        @endif
                    </div>

                    @if($data->file_type === \App\Enums\FileType::LINK)
                        <a href="{{$data->file_url}}" rel="nofollow" target="_blank"
                           class="hidden-xs hidden-sm btn btn-primary">
                            <i class="mdi mdi-magnify"></i> 获取资源
                        </a>
                    @endif

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


