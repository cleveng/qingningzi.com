<!-- Page Header-->
<header class="page-header" data-scroll-header>
    <!-- RD Navbar-->
    @inject('navs', 'App\Services\CategoriesService')
    <div class="rd-navbar-wrap">
        <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static"
             class="rd-navbar" data-stick-up-offset="50" data-md-layout="rd-navbar-fullwidth">
            <div class="rd-navbar-toppanel">
                <div class="container">
                    <div class="rd-navbar-toppanel-inner">
                        <div class="rd-navbar-toppanel-submenu">
                            <a href="javascript:;" data-rd-navbar-toggle=".rd-navbar-toppanel-submenu"
                               class="rd-navbar-toppanel-submenu-toggle"></a>
                            <ul class="list-unstyled">
                                @foreach($navs->submenu() as $submenu)
                                    <li><a href="{{url($submenu->url)}}">{{$submenu->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="rd-navbar-toppanel-wrapper">
                            @include('components.mood')
                            <div class="rd-navbar-toppanel-search">
                                <!-- RD Navbar Search-->
                                <div class="rd-navbar-search-wrap">
                                    <div class="rd-navbar-search">
                                        <form action="https://www.so.com/s" id="so360form"
                                              autocomplete="off" method="GET"
                                              class="rd-navbar-search-form">
                                            <label class="rd-navbar-search-form-input">
                                                <input type="text" autocomplete="off" name="q" placeholder="搜 索..."
                                                       id="so360_keyword">
                                                <input type="hidden" name="ie" value="utf8">
                                                <input type="hidden" name="src" value="qingningzi.com">
                                                <input type="hidden" name="site" value="qingningzi.com">
                                                <input type="hidden" name="rg" value="1">
                                            </label>
                                            <button type="submit" id="so360_submit"
                                                    class="rd-navbar-search-form-submit"></button>
                                            <div data-rd-navbar-toggle=".rd-navbar-search"
                                                 class="rd-navbar-search-toggle"></div>
                                        </form>
                                        <span class="rd-navbar-live-search-results"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rd-navbar-inner">
                <div class="container">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span>
                        </button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <a href="{{url('/')}}" class="navbar-brand">
                                <img alt="{{env('APP_NAME')}}" class="img-fluid" src="{{asset('images/logo.png')}}">
                            </a>
                        </div>
                        <div class="rd-navbar-elements-wrap text-end">
                            <ul class="rd-navbar-socials">
                                <li><a href="javascript:;" class="text-gray mdi mdi-twitter"></a></li>
                                <li>
                                    <a href="{{url('/emails')}}" class="text-base mdi mdi-email-outline"></a>
                                </li>
                                <li><a class="text-gray mdi mdi-sina-weibo" data-bs-original-title="微博扫一扫"
                                       data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                                       data-bs-content="<img src='{{asset("images/weibo_qr_code.jpg")}}' alt='' class='img-fluid'>"
                                       href="javascript:;" rel="nofollow"
                                       data-bs-container="body" data-bs-placement="bottom"></a></li>
                                <li>
                                    <a class="text-base mdi mdi-wechat" data-bs-original-title="微信扫一扫"
                                       data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                                       data-bs-content="<img src='{{asset("images/qrcode_for_gh_a0e3856031fe_1280.jpg")}}' alt='' class='img-fluid'>"
                                       href="javascript:;" data-bs-container="body"
                                       data-bs-placement="bottom"></a></li>
                            </ul>
                            <div class="rd-navbar-shop text-middle text-start">
                                <a href="javascript:;" class="rd-navbar-shop-toggle"
                                   data-rd-navbar-toggle=".rd-navbar-shop">
                                    <i class="text-middle mdi mdi-lead-pencil icon icon-primary"></i>
                                    <span class="text-middle badge rounded-pill bg-primary">1</span>
                                </a>
                                <div class="rd-navbar-shop-panel">
                                    <h4>我要投稿</h4>
                                    <div class="unit unit-spacing-15 unit-horizontal rd-navbar-shop-product">
                                        <div class="unit-left"><a href="javascript:;" class="text-dark">
                                                <img alt="扫码联系" src="{{asset('images/qq.jpg')}}"
                                                     class="img-fluid"></a>
                                        </div>
                                        <div class="unit-body p">
                                            <i class="rd-navbar-shop-close mdi mdi-close"></i>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <h4>
                                        我<span class="text-primary text-spacing-40">有故事！</span>
                                    </h4>
                                    <div class="d-flex align-content-center justify-content-start">
                                        <a rel="nofollow"
                                           href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gbOwsLKzsLCyt8Hw8K-i7uw"
                                           class="btn btn-dark btn-sm me-2">马上投稿</a>
                                        <a href="javascript:;"
                                           class="btn btn-primary btn-sm rd-navbar-shop-cancel">取消</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rd-navbar-nav-wrap">
                        <!-- RD Navbar Nav-->
                        <ul class="rd-navbar-nav">
                            <li class="{{Request::is('/') ? 'active' : ''}}">
                                <a href="{{url('/')}}">首页</a>
                            </li>
                            @foreach($navs->parents() as $parent)
                                <li class="{{($parent_id == $parent->id) ? 'active' : ''}}">
                                    <a href="{{url('categories/'.$parent->id)}}">
                                        {{$parent->title}}
                                    </a>
                                    @if($parent->children)
                                        <ul class="rd-navbar-dropdown list-unstyled">
                                            @foreach($parent->children as $children)
                                                <li>
                                                    <a href="{{url('categories/'.$children->id)}}"
                                                    >
                                                        {{$children->title}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            @if($navs->about())
                                <li class="veil rd-navbar-fixed--visible">
                                    <a href="{{url($navs->about()->url)}}">{{$navs->about()->title}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
