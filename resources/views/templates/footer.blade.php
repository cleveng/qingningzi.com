<!-- Footer-->
<footer class="footer pt-5 border-top">
    <div class="container text-center">
        <div class="widget widget-links d-none d-md-block">
            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                <li class="widget-list-item me-2">
                    <a class="widget-list-link active" href="{{url('/links')}}">友情链接</a>
                </li>
                @inject('links', 'App\Services\LinksService')
                @foreach($links->items() as $item)
                    <li class="widget-list-item me-2">
                        <a @if($item->link_type != \App\Enums\LinkType::EMOTION) rel="nofollow"
                           @endif data-bs-original-title="{{$item->introduce}}"
                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                           href="{{$item->url}}" target="_blank" class="widget-list-link">
                            {{$item->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-2">
            <a title="{{env('APP_NAME')}}" href="{{env('APP_URL')}}">
                <img alt="{{env('APP_NAME')}}" src="{{asset('images/logo.png')}}" width="163" height="41"
                     class="d-inline-block img-fluid">
            </a>
            <p class="mt-3 fs-sm d-none d-md-block">{{env('APP_NAME')}}
                网上提供的所有内容（除有注明原创之外）均由网络转载或网友提供，{{env('APP_NAME')}}网只是一个展示方，
                <br class='d-none d-md-inline-block'>
                仅为社交团体提供健康、合理、绿色等方面的内容，不承担任何法律责任。
                <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="nofollow" target="_blank">CC BY-NC-ND
                    4.0</a>
            </p>
        </div>

        <ul class="d-none d-md-flex justify-content-center list-unstyled">
            <li class="px-3">
                <a data-bs-original-title="Tiktok" data-bs-toggle="tooltip" data-bs-trigger="hover" target="_blank">
                    <i class="text-base ci-tiktok"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="Pinterest" data-bs-toggle="tooltip" data-bs-trigger="hover"
                   target="_blank">
                    <i class="text-base ci-pinterest"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="Google" data-bs-toggle="tooltip" data-bs-trigger="hover" target="_blank">
                    <i class="text-base ci-google"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="Linkedin" data-bs-toggle="tooltip" data-bs-trigger="hover"
                   target="_blank">
                    <i class="text-base ci-linkedin"></i>
                </a>
            </li>
            <li class="px-3">
                <a target="_blank" data-bs-original-title="给我打赏" data-bs-toggle="tooltip"
                   data-bs-trigger="hover"
                   href="https://www.paypal.me/qingningzi" rel="nofollow">
                    <i class="text-base ci-paypal"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="邮件订阅" data-bs-toggle="tooltip" data-bs-trigger="hover"
                   href="{{url('emails')}}"
                   target="_blank">
                    <i class="text-base ci-mail"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="合作媒体" data-bs-toggle="tooltip" data-bs-trigger="hover"
                   href="{{url('platforms')}}"
                   target="_blank">
                    <i class="text-base ci-sound-waves"></i>
                </a>
            </li>
            <li class="px-3">
                <a data-bs-original-title="微信打赏" data-bs-toggle="popover"
                   data-bs-trigger="hover" data-bs-html="true"
                   data-bs-content="<img src='{{asset("images/weichat_pay.jpg")}}' alt='微信打赏' class='img-fluid'>"
                   href="javascript:;" target="_blank" data-bs-placement="top">
                    <i class="text-base ci-wechat"></i>
                </a>
            </li>
        </ul>

        @inject('category', 'App\Services\CategoriesService')
        <p class="fs-sm my-1">
            <span class='text-bold text-dark'>Qingningzi v{{getPackageVersion()}}</span>
            &copy; 2015 - {{\Carbon\Carbon::now()->year}}
            <span class="vertical-divider"></span>
            @if($category->about())
                <a href='{{url($category->about()->url)}}' rel="nofollow"
                   class="text-dark">{{$category->about()->title}}</a>
                <span class="vertical-divider"></span>
            @endif
            <a href="https://www.miitbeian.gov.cn" rel="nofollow" target="_blank" class="text-dark">
                粤ICP备16058900号-1
            </a>
            <span class="vertical-divider"></span>
            <a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602001797" rel="nofollow"
               target="_blank" class="text-dark">
                粤公网安备44010602001797号
            </a>
        </p>

        <p class="d-none d-sm-block fs-sm">
            Powered By <a href="https://www.laravel.com" rel="nofollow" target="_blank" class="text-dark">Laravel
                v{{app()->version()}}
            </a>
            <span class="vertical-divider"></span>
            <a href="https://github.com/cleveng/qingningzi.com" rel="nofollow" target="_blank" class="text-dark">
                Github
            </a>
            <span class="vertical-divider"></span>
            {{env('APP_NAME')}}网由 <a
                href="https://portal.qiniu.com/signup?code=3lid1ik02lidu" rel="nofollow"
                target="_blank" class="text-dark">七牛云加速</a>、
            <a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" rel="nofollow" target="_blank"
               class="text-dark">又拍云</a>
            提供CDN服务
        </p>
    </div>
</footer>

<!-- Back To Top Button-->
<a class="btn-scroll-top" href="#top" data-scroll><span
        class="btn-scroll-top-tooltip text-dark fs-sm me-2">Top</span><i
        class="btn-scroll-top-icon ci-arrow-up"> </i></a>
