@inject('tags', 'App\Services\TagsService')

<!-- Popular tags-->
<div class="widget pb-grid-gutter mx-lg-2">
    <h3 class="widget-title">热门标签</h3>
    @foreach ($tags->random(Request::getRequestUri()) as $key=>$tag)
        <a rel="@if($key%5 === 0) nofollow @endif" class="btn-tag me-2 mb-2"
           href="{{ url('search?tag=' . urlencode($tag->name)) }}">#{{$tag->name}}</a>
    @endforeach
</div>
