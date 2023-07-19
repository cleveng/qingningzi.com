<ul class="rd-share-socials">
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs ci-tiktok"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs ci-pinterest"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs ci-google"></a></li>
    <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top"
           title="不支持"
           class="text-gray icon icon-xs ci-linkedin"></a></li>
    @if(isset($item))
        @if($item->qrcode)
            <li><a data-bs-original-title="微信扫一扫"
                   data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                   data-bs-content="<img src='{{asset($item->qrcode)}}' alt='' class='img-fluid'>"
                   href="javascript:;" data-bs-container="body"
                   data-bs-placement="bottom"
                   class="text-gray icon icon-xs ci-wechat"></a></li>
        @endif
        <li><a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="right"
               title="阅读数：{{$item->views_count}}"
               class="text-gray icon icon-xs ci-heart"></a></li>
    @endif
</ul>
