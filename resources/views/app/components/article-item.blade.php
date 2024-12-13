@php use Carbon\Carbon; @endphp
@if($data)
    @php
        $key = isset($key) ? $key : Carbon::now();
    @endphp
    @inject('article', 'App\Services\ArticlesService')
    <article class="@if($key > 0) mt-5 pt-5 border-top @endif">
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
                        <div class="d-none d-md-inline-block">
                            <span class='fst-italic'>Posted by：</span>
                            <span>{{ $data->platform->name }}</span>
                            <span class="blog-entry-meta-divider"></span>
                        </div>
                    @endif
                    <span class='fst-italic'>Hot：</span>
                    <span class="text-primary">
                        {!! getArticleRate($data->rate) !!}
                    </span>
                </div>
            </div>
        </div>
        <a class="blog-entry-thumb mb-3 mt-1 position-relative" href="{{ url($data->shortcode) }}">
            @php
                $thumb = $data->thumb ? url($data->thumb) : "https://loremflickr.com/720/368?random=1&key=" . $key;
            @endphp
            <img @if($key >= 2) class="lazy" data-src="{{ $thumb }}"
                 @else src="{{ $thumb }}" @endif alt="{{ $data->title }}" />
        </a>
        <p class="fs-md">{{ $data->description }}</p>
        <div class="d-flex justify-content-end justify-content-sm-between align-content-center">
            <div class="flex-fill">
                @if($data->qrcode)
                    <a class="btn-social bs-wechat me-2" data-bs-original-title="微信扫一扫"
                       data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                       data-bs-content="<img src='{{url($data->qrcode)}}' alt='' class='img-fluid'>"
                       href="javascript:" data-bs-container="body"
                       data-bs-placement="bottom">
                        <i class="ci-wechat"></i>
                    </a>
                @endif
                <a class="btn-social bs-google me-2" href="javascript:" data-bs-toggle="tooltip"
                   data-bs-placement="right"
                   title="阅读数：{{$data->views_count}}">
                    <i class="ci-heart"></i>
                </a>
            </div>
            <a href="{{ url($data->shortcode) }}" class="btn btn-primary rounded-0">马上围观</a>
        </div>
    </article>
@endif
