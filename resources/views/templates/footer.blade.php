<footer class="page-footer section-60">
    <div class="shell hidden-xs">
        <ul class="breadcrumb" style="padding:15px 0;">
            <li class="active"><a href="{{url('links')}}">友情链接</a>：</li>
            @inject('links', 'App\Services\LinksService')
            @foreach($links->items() as $item)
                <li>
                    <a @if($item->typeid == 56) rel="nofollow" @endif  data-original-title="{{$item->introduce}}"
                       data-toggle="tooltip" data-trigger="hover"
                       href="{{$item->url}}" target="_blank" data-placement="top">
                        {{$item->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="shell"><a title="{{env('APP_NAME')}}" href="{{env('APP_URL')}}" class="brand">
            <img alt="{{env('APP_NAME')}}" src="{{asset('images/logo.png')}}" width="163" height="41"
                 class="reveal-inline-block img-responsive"></a>
        <p>{{env('APP_NAME')}}网上提供的所有内容（除有注明原创之外）均由网络转载或网友提供，{{env('APP_NAME')}}网只是一个展示方，
            <br class='veil reveal-lg-block'>
            仅为社交团体提供健康、合理、绿色等方面的内容，不承担任何法律责任。 <a
                    href="https://creativecommons.org/licenses/by-nc-nd/4.0/"
                    rel="nofollow" target="_blank">CC BY-NC-ND 4.0</a>
        </p>
        <ul class="elements-group-20 offset-top-20 hidden-xs hidden-sm">
            <li>
                <a href="javascript:;">
                    <i class="text-base mdi mdi-facebook fs-2"></i>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="text-base mdi mdi-twitter fs-2"></i>
                </a>
            </li>
            <li>
                <a target="_blank" data-original-title="给我打赏" data-toggle="tooltip" data-trigger="hover"
                   href="https://www.paypal.me/qingningzi" rel="nofollow">
                    <i class="text-base mdi mdi-currency-usd fs-2"></i>
                </a>
            </li>
            <li>
                <a data-original-title="邮件订阅" data-toggle="tooltip" data-trigger="hover"
                   href="{{url('emails')}}"
                   target="_blank">
                    <i class="text-base mdi mdi-email-outline fs-2"></i>
                </a>
            </li>
            <li><a data-original-title="合作媒体" data-toggle="tooltip" data-trigger="hover" target="_blank">
                    <i class="text-base mdi mdi-link-variant fs-2"></i>
                </a>
            </li>
            <li>
                <a data-original-title="微博关注" data-toggle="popover"
                   data-trigger="hover" data-html="true"
                   data-content="<img src='{{asset("images/weibo_qr_code.jpg")}}' alt='微博关注' class='img-responsive'>"
                   href="javascript:;" target="_blank" data-placement="top">
                    <i class="text-base mdi mdi-sina-weibo fs-2"></i>
                </a>
            </li>
            <li>
                <a data-original-title="微信打赏" data-toggle="popover"
                   data-trigger="hover" data-html="true"
                   data-content="<img src='{{asset("images/weichat_pay.jpg")}}' alt='微信打赏' class='img-responsive'>"
                   href="javascript:;" target="_blank" data-placement="top">
                    <i class="text-base mdi mdi-wechat fs-2"></i>
                </a>
            </li>
        </ul>
        @inject('category', 'App\Services\CategoriesService')
        <p class="offset-top-20 text-muted">
            <span class='text-bold'><a href="{{env('APP_URL')}}">Qingningzi v{{getPackageVersion()}}</a></span>
            <i class="mdi mdi-copyright"></i> 2015 - {{\Carbon\Carbon::now()->year}} |
            @if($category->about())
                <a href='{{url($category->about()->url)}}' rel="nofollow">{{$category->about()->title}}</a> |
            @endif
            <a href="https://www.miitbeian.gov.cn" rel="nofollow" target="_blank">粤ICP备16058900号-1</a> |
            <a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001797" rel="nofollow"
               target="_blank"><i class="beian"></i> 粤公网安备 44010602001797号</a>
        </p>
        <p class="offset-top-10 text-muted hidden-xs hidden-sm">
            Powered By <a href="https://www.laravel.com">Laravel v{{app()->version()}}</a> |
            <a href="https://github.com/cleveng/qingningzi.com" class="text-dark" rel="nofollow" target="_blank">
                <i class="icon icon-xs mdi mdi-github"></i> Github
            </a> |
            {{env('APP_NAME')}}网由 <a
                    href="https://portal.qiniu.com/signup?code=3lid1ik02lidu" rel="nofollow"
                    target="_blank">七牛云加速</a>、
            <a href="https://www.bootcdn.cn/" rel="nofollow" target="_blank">BootCDN</a> 提供CDN服务
        </p>
    </div>
</footer>
