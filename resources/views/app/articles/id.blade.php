@inject('article', 'App\Services\ArticlesService')

@extends('layouts.blog')
@section('breadcrumb')
    @if ($category->parent())
        <li class="breadcrumb-item text-nowrap">
            <a rel="nofollow" href="{{ url('categories/' . $category->parent()->id) }}">
                {{ $category->parent()->title }}
            </a>
        </li>
    @endif
    <li class="breadcrumb-item text-nowrap">
        <a rel="nofollow" href="{{ url('categories/' . $category->id) }}">
            {{ $category->title }}
        </a>
    </li>
    <li class="breadcrumb-item text-nowrap active">
        {{ $data->title }}
    </li>
@endsection

@section('content')
    <div class="blog-post mt-4">
        <div class="d-flex align-items-start">
            <div class="blog-entry-meta-label">
                <span class='date'>{{ $data->created_at->format('d') }}</span>
                <span class="year">{{ $data->created_at->format('M') }}</span>
            </div>
            <div class="blog-entry-meta-title">
                <h2 class="h3 blog-entry-title mb-0">{{ $data->title }}</h2>
                <div class="d-none d-md-flex align-items-center fs-sm">
                    @if ($data->platform)
                        <span class='fst-italic'>Posted by：</span>
                        <a href="{{url('/platforms/'.$data->platform_id)}}">{{ $data->platform->name }}</a>
                        <span class="blog-entry-meta-divider"></span>
                    @endif
                    @if ($data->rate)
                        <span class='fst-italic'>Hot：</span>
                        <span class="text-primary">
                                        {!! $article->rates($data->url, $data->rate) !!}
                                    </span>
                        <span class="blog-entry-meta-divider"></span>
                    @endif
                    <span class='fst-italic'>Views：</span>
                    <span id="hits">{{ $data->views_count }} 次</span>
                    @if ($data->author)
                        <span class="blog-entry-meta-divider"></span>
                        <span class='fst-italic'>Writer：{{ $data->author }}</span>
                    @endif
                </div>
            </div>
        </div>

        <section class="mt-3">
            @if($attachment)
                @if($attachment->file_type === \App\Enums\FileType::LINK)
                    <blockquote class="quote">
                        <h6>
                            <q>
                                {{Str::limit($data->description,168)}}
                            </q>
                        </h6>
                        <p class="d-none d-sm-block text-truncate">
                            相关资源：<cite class="text-muted">-
                                @if($attachment->file_url)
                                    <a href="{{$attachment->file_url}}" rel="nofollow"
                                       target="_blank">点击获取</a>
                                @else
                                    暂无内容
                                @endif
                            </cite>
                        </p>
                    </blockquote>
                @endif

                @if($attachment->file_type === \App\Enums\FileType::CAROUSEL)
                    <div class="tns-carousel tns-nav-enabled">
                        <div class="tns-carousel-inner"
                             data-carousel-options='{"mode": "gallery", "speed": 1000}'>
                            @foreach($attachment->media as $medium)
                                <img alt="{{$medium['display_name']}}"
                                     src="{{url($medium['display_url'])}}"
                                     class="img-fluid">
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($attachment->file_type === \App\Enums\FileType::MP4)
                    <div class="blog-post-media">
                        <video src="{{$attachment->file_url}}" style="width: 100%;height: auto"
                               poster="{{$attachment->thumb}}" controls=""
                               webkit-playsinline=""></video>
                    </div>
                @endif
            @endif

            <div class="blog-post-media mt-3">
                @if ($data->detail)
                    {!! $data->detail->content !!}
                @else
                    {{ $data->description }}
                @endif
            </div>

            @if($attachment && in_array($attachment->file_type, [\App\Enums\FileType::LINK, \App\Enums\FileType::BOOK]))
                <a href="{{$attachment->file_url}}" rel="nofollow" target="_blank"
                   class="btn btn-primary rounded-0">
                    <i class="ci-search"></i> 获取资源
                </a>
            @endif
        </section>

        <!-- Post tags + sharing-->
        <div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
            <div class="mt-3 me-3">
                @foreach($tags as $tag)
                    <a class="btn-tag me-2 mb-2" href="{{ url('search?keyword=' . urlencode($tag)) }}">
                        {{ $tag }}
                    </a>
                @endforeach
            </div>
            <div class="mt-3">
                <span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">内容分享:</span>
                @if ($data->qrcode)
                    <a class="btn-social bs-wechat me-2 mb-2" data-bs-original-title="微信扫一扫"
                       data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                       data-bs-content="<img src='{{ url($data->qrcode) }}' alt='' class='img-fluid'>"
                       href="javascript:;" data-bs-container="body" data-bs-placement="bottom">
                        <i class="ci-wechat"></i>
                    </a>
                @endif
                <a class="btn-social bs-google me-2 mb-2" href="javascript:;" data-bs-toggle="tooltip"
                   data-bs-placement="right" title="阅读数：{{ $data->views_count }}">
                    <i class="ci-heart"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('post-navigation')
    <!-- Post navigation-->
    <nav class="entry-navigation mt-4" aria-label="Post navigation">
        <a data-bs-original-title="{{ $previous ? $previous->title : '暂无上一条' }}"
           data-bs-toggle="tooltip"
           data-bs-trigger="hover" data-bs-container="body" data-bs-placement="top"
           class="entry-navigation-link"
           href=" {{ $previous ? url($previous->shortcode) : 'javascript:;' }}">
            <i class="ci-arrow-left me-2"></i>
            <span class="d-none d-sm-inline">上一条</span>
        </a>

        <a class="entry-navigation-link" href="{{ url('categories/' . $data->category_id) }}">
            <i class="ci-view-list me-2"></i>
            <span class="d-none d-sm-inline">所有文章</span>
        </a>
        <a data-bs-original-title="{{ $next ? $next->title : '暂无下一条' }}" data-bs-toggle="tooltip"
           data-bs-trigger="hover" data-bs-container="body" data-bs-placement="top"
           class="entry-navigation-link" href="{{ $next ? url($next->shortcode) : 'javascript:;' }} ">
            <span class="d-none d-sm-inline">下一条</span>
            <i class="ci-arrow-right ms-2"></i>
        </a>
    </nav>
@endsection

@section('comments')
    @include('app.components.comments', ['data'=>$data, 'comments'=>$comments])
@endsection
