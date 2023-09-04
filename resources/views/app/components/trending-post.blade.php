@inject('tags', 'App\Services\TagsService')

<!-- Trending posts-->
<div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
    <h3 class="widget-title">精彩内容</h3>
    @foreach ($tags->lastest(Request::getRequestUri(), 5) as $key=>$tag)
        <div class="d-flex align-items-start mb-3">
                <?php $thumb = $tag->taggable->thumb ? asset($tag->taggable->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key; ?>
            <a class="flex-shrink-0" href="{{url($tag->taggable->shortcode)}}"
               title="{{$tag->taggable->title}}">
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
                    <div class="fs-sm text-muted fst-italic">
                        Posted by： <a rel="nofollow"
                                      href="{{url($tag->taggable->shortcode)}}"
                                      title="{{$tag->taggable->title}}"
                                      class="blog-entry-meta-link">{{ $tag->taggable->platform->name }}</a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
