<ul class="rd-share-socials">
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs mdi mdi-linkedin"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs mdi mdi-qqchat"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs mdi mdi-sina-weibo"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs mdi mdi-wechat"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs mdi mdi-plus"></a></li>
    @if(isset($item))
        <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="right"
               title="阅读数：{{$item->views_count}}"
               class="text-gray icon icon-xs mdi mdi-heart"></a></li>
    @endif
</ul>
