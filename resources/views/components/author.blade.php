@if($data->platform && $data->platform->qrcode)
    <div class="offset-top-20 text-center visible-sm visible-xs">
        <div class="img-thumbnail" style="border-radius: 3px;">
            <img src="{{$data->platform->qrcode}}" alt="微信扫一扫" class="img-responsive" style="max-width: 214px;">
            <div>微信扫一扫</div>
        </div>
    </div>
    <hr class="divider divider-gray divider-offset-md hidden-lg hidden-md hidden-xs hidden-sm">
@endif
@inject('category', 'App\Services\CategoriesService')
<div class="unit unit-xs-horizontal unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
    <div class="unit-left">
        <img alt="青柠子矜" src="{{asset('images/author.jpg')}}" width="97" height="97" class="img-circle">
    </div>
    <div class="unit-body">
        <h4 class="hidden-xs">编辑：
            <span class='text-primary'>{{env('APP_NAME')}}</span>
        </h4>
        <p>
            本栏目所有文章目的在于传递更多信息，并不代表本网赞同其观点和对其真实性负责。凡本网
            @if($category->about())
                <a
                    href="{{url($category->about()->url)}}" rel="nofollow" title="存有内容版权纠纷"
                    data-toggle="tooltip" data-trigger="hover" data-container="body"
                    data-placement="top">注明版权</a>
            @endif
            所有的作品，版权均属于{{env('APP_NAME')}}网，凡署名来源作者的，版权则属原作者或出版方所有，未经本网或作者授权不得转载、摘编或利用其它方式使用上述作品。
        </p>
    </div>
</div>
