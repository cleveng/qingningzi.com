@if(isset($item))
    <div class="flex-fill">
        @if($item->qrcode)
            <a class="btn-social bs-wechat me-2" data-bs-original-title="微信扫一扫"
               data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
               data-bs-content="<img src='{{asset($item->qrcode)}}' alt='' class='img-fluid'>"
               href="javascript:;" data-bs-container="body"
               data-bs-placement="bottom">
                <i class="ci-wechat"></i>
            </a>
        @endif
        <a class="btn-social bs-google me-2" href="javascript:;" data-bs-toggle="tooltip"
           data-bs-placement="right"
           title="阅读数：{{$item->views_count}}">
            <i class="ci-heart"></i>
        </a>
    </div>
@endif

