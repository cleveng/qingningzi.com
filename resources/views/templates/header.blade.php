@inject('navs', 'App\Services\CategoriesService')
<header class="page-header shadow-sm" data-scroll-header>
    @include('components.mood')
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                {{-- logo start --}}
                <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{url('/')}}">
                    <img src="{{asset('images/logo.png')}}" alt="{{env('APP_NAME')}}">
                </a>
                <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{url('/')}}">
                    <img src="{{asset('images/logo.png')}}" alt="{{env('APP_NAME')}}">
                </a>
                {{-- logo end --}}
                {{-- search start --}}
                <div class="input-group d-none d-lg-flex mx-4">
                    <form action="{{url('/search')}}" class="w-100" autocomplete="off">
                        <div class="input-group">
                            <label for="keyword" class="sr-only"></label>
                            <input id="keyword" name="keyword" class="form-control rounded-end pe-5" type="text" placeholder="搜索你喜欢的内容.."/>
                            <i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
                        </div>
                    </form>
                </div>
                {{-- search end --}}
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-tool d-none d-lg-flex" data-bs-original-title="微信扫一扫"
                       data-bs-toggle="popover" data-bs-trigger="hover" title="" data-bs-html="true"
                       data-bs-content="<img src='{{asset("images/qrcode_for_gh_a0e3856031fe_1280.jpg")}}' alt='' class='img-fluid'>"
                       href="javascript:;" data-bs-container="body"
                       data-bs-placement="bottom">
                        <span class="navbar-tool-tooltip">微信分享</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon ci-wechat"></i>
                        </div>
                    </a>

                    <div class="navbar-tool dropdown ms-3 d-none d-md-flex">
                        <a class="navbar-tool-icon-box bg-primary dropdown-toggle" href="javascript:;">
                            <span class="navbar-tool-label">99</span>
                            <i class="navbar-tool-icon ci-edit text-white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                <h4>我要投稿</h4>
                                <div class="unit unit-spacing-15 unit-horizontal rd-navbar-shop-product">
                                    <div class="unit-left">
                                        <img alt="扫码联系" src="{{asset('images/qq.jpg')}}" class="img-fluid">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <h4>
                                    我<span class="text-primary text-spacing-40">有故事！</span>
                                </h4>
                                <div class="d-flex align-content-center justify-content-start">
                                    <a rel="nofollow"
                                       href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gbOwsLKzsLCyt8Hw8K-i7uw"
                                       class="btn btn-primary btn-sm me-2">马上投稿</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <div class="input-group d-lg-none my-3">
                        <form action="{{url('/search')}}" class="w-100" autocomplete="off">
                            <div class="input-group">
                                <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <label for="mobile-keyword" class="sr-only"></label>
                                <input id="mobile-keyword" name="keyword" class="form-control rounded-start" type="text" placeholder="搜索你喜欢的内容.." />
                            </div>
                        </form>
                    </div>
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/')}}">首页</a>
                        </li>
                        @foreach($navs->parents() as $parent)
                            <li class="nav-item dropdown {{($parent_id == $parent->id) ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{url('categories/'.$parent->id)}}"
                                   data-bs-toggle="dropdown"
                                   data-bs-auto-close="outside">{{$parent->title}}</a>
                                @if($parent->children)
                                    <ul class="dropdown-menu">
                                        @foreach($parent->children as $children)
                                            <li><a class="dropdown-item"
                                                   href="{{url('categories/'.$children->id)}}"> {{$children->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @if($navs->about())
                        <li class="nav-item d-md-none {{Request::is('/about') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url($navs->about()->url)}}">{{$navs->about()->title}}</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
