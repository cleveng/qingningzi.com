<!-- Promo banner 格子广告 -->
<div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
    <div class="masonry-grid-item">
        <div class="card border text-center">
            <div class="card-body">
                <h5 class="mb-2">广告位招租</h5>
                <p class="fs-sm text-muted">列表、文章页位置统招</p>
                <a class="btn btn-primary btn-shadow rounded-0 btn-sm"
                   href="mailto:{{env('MAIL_MONITOR')}}">马上联系</a>
            </div>
        </div>
    </div>
</div>

<!-- Promo Hot banner -->
<div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
    <h3 class="widget-title">精选产品</h3>
    @inject('prom', 'App\Services\PromotionsService')
    @foreach ($prom->random() as $key => $m)
        <a href="{{ url('/redirect?target_id=' . $m->id) }}" rel="nofollow" target="_blank"
           class="card @if ($key > 0) mt-3 @endif">
            @if($key > 1)
                <img alt="{{ $m->title }}" data-src="{{ asset($m->cover_image) }}" class="lazy card-img">
            @else
                <img alt="{{ $m->title }}" src="{{ asset($m->cover_image) }}" class="card-img">
            @endif
        </a>
    @endforeach
</div>

<!-- Trending posts-->
@inject('tags', 'App\Services\TagsService')
<div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
    <h3 class="widget-title">精彩内容</h3>
    @foreach ($tags->lastest(Request::getRequestUri(), 5) as $key=>$tag)
        <div class="d-flex align-items-start mb-3">
            <?php $thumb = $tag->taggable->thumb ? asset($tag->taggable->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key; ?>
            <a class="flex-shrink-0" href="{{url($tag->taggable->shortcode)}}" title="{{$tag->taggable->title}}">
                <img alt="{{$tag->taggable->title}}"
                     class="lazy img-fluid"
                     data-src="{{ $thumb }}"
                     width="64">
            </a>
            <div class="ps-3">
                <h6 class="blog-entry-title fs-sm mb-0">
                    <a href="{{url($tag->taggable->shortcode)}}"
                       title="{{$tag->taggable->title}}">{{$tag->taggable->title}}</a>
                </h6>
                @if ($tag->taggable->platform)
                    <span class="fs-sm text-muted fst-italic">
                    Posted by： <a rel="nofollow" href="{{url($tag->taggable->shortcode)}}"
                                  title="{{$tag->taggable->title}}"
                                  class="blog-entry-meta-link">{{ $tag->taggable->platform->name }}</a>
                </span>
                @endif
            </div>
        </div>
    @endforeach
</div>

<!-- Popular tags-->
<div class="widget pb-grid-gutter mx-lg-2">
    <h3 class="widget-title">热门标签</h3>
    @foreach ($tags->random(Request::getRequestUri()) as $key=>$tag)
        <a rel="@if($key%5 === 0) nofollow @endif" class="btn-tag me-2 mb-2"
           href="{{ url('search?tag=' . urlencode($tag->name)) }}">#{{$tag->name}}</a>
    @endforeach
</div>
