<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/scss/dashboard.scss', 'resources/js/dashboard.js'])
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="fixed">
<div class="wrapper">
    <?php $hideSidebar = Arr::has(request()->cookie(), 'hideSidebar') ?>
    <nav id="sidebar" class="sidebar @if($hideSidebar) collapsed @endif" aria-label="Sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{url('/dashboard')}}">
                <img src="{{asset('images/logo.png')}}" alt="{{env('APP_NAME')}}"
                     style="height: 25px; filter: brightness(0) invert(1);"/>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    导航
                </li>
                <li class="sidebar-item active">
                    <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">控制台</span>
                        <span class="badge badge-sidebar-primary">5</span>
                    </a>
                    <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{url('dashboard/records')}}">记录列表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        <nav aria-label="nav" class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-switch  @if($hideSidebar) active @endif" href="javascript:;">
                <i class="hamburger align-self-center"></i>
            </a>
            <form class="d-none d-sm-inline-block">
                <div class="input-group input-group-navbar">
                    <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
                    <button class="btn" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-search align-middle">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </form>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-settings align-middle">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </a>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{ Auth::user()->profile_url }}" class="avatar img-fluid rounded-circle me-1"
                                 alt="{{ Auth::user()->name }}">
                            <span class="text-dark">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <form method="POST" action="{{ route('logout') }}" autocomplete="off">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="ci-sign-out me-2"></i> 退出登录
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="content">
            <div class="container-fluid p-0">
                @inject('article', 'App\Services\ArticlesService')
                <div class="card bg-white">
                    <div class="card-body position-relative">
                            <span class="badge bg-success position-absolute top-0 start-0">
                               正常
                            </span>
                        <h5 class="card-title">文章数量</h5>
                        <div>{{$article->count()}}</div>
                    </div>
                </div>
                <div class="my-3 card bg-white">
                    <div class="card-body position-relative">
                                    <span class="badge bg-secondary position-absolute top-0 start-0">
                                       待更新
                                    </span>
                        <h5 class="card-title">文章数量</h5>
                        <div>{{$article->count(false)}}</div>
                    </div>
                </div>

                @section('content')
                @show
            </div>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted fs-sm">
                    <div class="col-6 text-start">
                        Laravel v{{app()->version()}}
                    </div>
                    <div class="col-6 text-end">
                        Qingningzi v{{getPackageVersion()}}
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
