@if($data->platform && $data->platform->qrcode)
    <section class="d-sm-none d-xs-block">
        <div class="space-1-top text-center">
            <div class="img-thumbnail" style="border-radius: 3px;">
                <img src="{{asset($data->platform->qrcode)}}" alt="微信扫一扫" class="img-fluid"
                     style="max-width: 214px;">
                <div>微信扫一扫</div>
            </div>
        </div>
        <hr class="divider divider-gray divider-offset-md">
    </section>
@endif

@inject('category', 'App\Services\CategoriesService')
<div class="widget pb-grid-gutter mx-lg-2">
    <h3 class="widget-title">本文编辑</h3>
    <div class="text-start">
        <img src="{{Vite::image('author.jpg')}}" class="d-inline-block rounded mb-3" width="96" alt="{{env('APP_NAME')}}">
        <h6 class="pt-1 mb-1">{{env('APP_NAME')}}</h6>
        <p class="fs-sm text-muted">
            本栏目所有文章目的在于传递更多信息，并不代表本网赞同其观点和对其真实性负责。凡本网
            @if($category->about())
                <a
                    href="{{url($category->about()->url)}}" rel="nofollow" data-bs-original-title="存有内容版权纠纷"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                    data-bs-placement="top">注明版权</a>
            @endif
            所有的作品，版权均属于{{env('APP_NAME')}}网，凡署名来源作者的，版权则属原作者或出版方所有，未经本网或作者授权不得转载、摘编或利用其它方式使用上述作品。
        </p>
    </div>
</div>
