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
           class="text-gray icon icon-xs mdi mdi-plus"></a></li>
    @if(isset($item))
        @if($item->qrcode)
            <li><a data-bs-original-title="微信扫一扫"
                   data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                   data-bs-content="<img src='{{asset($item->qrcode)}}' alt='' class='img-fluid'>"
                   href="javascript:;" data-bs-container="body"
                   data-bs-placement="bottom"
                   class="text-gray icon icon-xs mdi mdi-wechat"></a></li>
            <li><a data-bs-original-title="手机扫一扫"
                   data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                   data-bs-content="<img src='{{asset($item->qrcode)}}' alt='' class='img-fluid'>"
                   href="javascript:;" data-bs-container="body"
                   data-bs-placement="bottom"
                   class="text-gray icon icon-xs mdi mdi-qrcode"></a></li>
        @endif
        <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="right"
               title="阅读数：{{$item->views_count}}"
               class="text-gray icon icon-xs mdi mdi-heart"></a></li>
    @endif
</ul>
