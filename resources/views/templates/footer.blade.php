<footer class="page-footer space-1--md mx-auto text-center">
    <div class="container">
        <div class="row">
            <div class="d-none d-sm-block">
                <ul class="breadcrumb">
                    <li class="active"><a href="{{url('links')}}">友情链接</a>：</li>
                    @inject('links', 'App\Services\LinksService')
                    @foreach($links->items() as $item)
                        <li>
                            <a @if($item->typeid == 56) rel="nofollow"
                               @endif data-bs-original-title="{{$item->introduce}}"
                               data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                               href="{{$item->url}}" target="_blank">
                                {{$item->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="d-flex justify-content-center align-content-center">
                <a title="{{env('APP_NAME')}}" href="{{env('APP_URL')}}">
                    <img alt="{{env('APP_NAME')}}" src="{{asset('images/logo.png')}}" width="163" height="41"
                         class="d-inline-block img-fluid">
                </a>
            </div>
            <p class="mt-3 fs-sm text-dark d-none d-md-block">{{env('APP_NAME')}}
                网上提供的所有内容（除有注明原创之外）均由网络转载或网友提供，{{env('APP_NAME')}}网只是一个展示方，
                <br class='d-none d-md-inline-block'>
                仅为社交团体提供健康、合理、绿色等方面的内容，不承担任何法律责任。
                <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="nofollow" target="_blank">CC BY-NC-ND
                    4.0</a>
            </p>
            <ul class="d-none d-md-flex justify-content-center list-unstyled">
                <li class="px-3">
                    <a href="javascript:;">
                        <i class="text-base mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="px-3">
                    <a href="javascript:;">
                        <i class="text-base mdi mdi-twitter"></i>
                    </a>
                </li>
                <li class="px-3">
                    <a target="_blank" data-bs-original-title="给我打赏" data-bs-toggle="tooltip"
                       data-bs-trigger="hover"
                       href="https://www.paypal.me/qingningzi" rel="nofollow">
                        <i class="text-base mdi mdi-currency-usd"></i>
                    </a>
                </li>
                <li class="px-3">
                    <a data-bs-original-title="邮件订阅" data-bs-toggle="tooltip" data-bs-trigger="hover"
                       href="{{url('emails')}}"
                       target="_blank">
                        <i class="text-base mdi mdi-email-outline"></i>
                    </a>
                </li>
                <li class="px-3"><a data-bs-original-title="合作媒体" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    target="_blank">
                        <i class="text-base mdi mdi-link-variant"></i>
                    </a>
                </li>
                <li class="px-3">
                    <a data-bs-original-title="微博关注" data-bs-toggle="popover"
                       data-bs-trigger="hover" data-bs-html="true"
                       data-bs-content="<img src='{{asset("images/weibo_qr_code.jpg")}}' alt='微博关注' class='img-fluid'>"
                       href="javascript:;" target="_blank" data-bs-placement="top">
                        <i class="text-base mdi mdi-sina-weibo"></i>
                    </a>
                </li>
                <li class="px-3">
                    <a data-bs-original-title="微信打赏" data-bs-toggle="popover"
                       data-bs-trigger="hover" data-bs-html="true"
                       data-bs-content="<img src='{{asset("images/weichat_pay.jpg")}}' alt='微信打赏' class='img-fluid'>"
                       href="javascript:;" target="_blank" data-bs-placement="top">
                        <i class="text-base mdi mdi-wechat"></i>
                    </a>
                </li>
            </ul>

            @inject('category', 'App\Services\CategoriesService')
            <p class="fs-sm my-1">
                <span class='text-bold text-dark'>Qingningzi v{{getPackageVersion()}}</span>
                <i class="mdi mdi-copyright"></i> 2015 - {{\Carbon\Carbon::now()->year}} |
                @if($category->about())
                    <a href='{{url($category->about()->url)}}' rel="nofollow"
                       class="text-base">{{$category->about()->title}}</a> |
                @endif
                <a href="https://www.miitbeian.gov.cn" rel="nofollow" target="_blank" class="text-base">
                    粤ICP备16058900号-1
                </a> |
                <a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001797" rel="nofollow"
                   target="_blank" class="text-base">粤公网安备44010602001797号
                </a>
            </p>

            <p class="d-none d-sm-block fs-sm mb-0">
                Powered By <a href="https://www.laravel.com" class="text-base">Laravel v{{app()->version()}}</a> |
                <a href="https://github.com/cleveng/qingningzi.com" rel="nofollow" target="_blank" class="text-base">
                    <i class="mdi mdi-github"></i> Github
                </a> |
                {{env('APP_NAME')}}网由 <a
                        href="https://portal.qiniu.com/signup?code=3lid1ik02lidu" rel="nofollow"
                        target="_blank">七牛云加速</a>、
                <a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" rel="nofollow" target="_blank">又拍云</a>
                提供CDN服务
            </p>
        </div>
    </div>
    <a href="#top" class="ui-to-top mdi mdi-chevron-double-up" data-scroll></a>
</footer>