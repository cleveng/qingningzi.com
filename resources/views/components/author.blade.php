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
<div class="pt-2 mt-5 d-none d-sm-block">
    <h2 class="h4">本文编辑</h2>
    <div class="d-flex align-items-start py-4">
        <img class="rounded-circle" src="{{asset('images/author.jpg')}}" width="50" height="50"
             alt="{{env('APP_NAME')}}">
        <div class="ps-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fs-md mb-0">{{env('APP_NAME')}}</h6>
                @if($category->about())
                    <a class="nav-link-style fs-sm fw-medium" rel="nofollow" href="{{url($category->about()->url)}}">
                        <i class="ci-edit me-2"></i>侵权投诉
                    </a>
                @endif
            </div>
            <p class="fs-sm mb-1">
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
</div>
