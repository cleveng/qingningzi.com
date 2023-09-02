<?php $hideSidebar = Arr::has(request()->cookie(), 'hideSidebar') ?>
<nav aria-label="nav" class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-switch  @if($hideSidebar) active @endif" href="javascript:;">
        <i class="hamburger align-self-center"></i>
    </a>
    <form class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
            <button class="btn" type="button">
                <i class="align-middle" data-feather="search"></i>
            </button>
        </div>
    </form>
    <div class="navbar-collapse collapse">
        <div class="navbar-toolbar d-flex align-items-center order-lg-3 navbar-align">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-tool d-none d-lg-flex" href="{{ url('dashboard/notifications') }}"><span
                    class="navbar-tool-tooltip">站内信</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-message"></i></div>
            </a>
            <div class="navbar-tool dropdown ms-2">
                <a class="navbar-tool-icon-box border dropdown-toggle" href="#">
                    <img src="{{ Auth::user()->profile_url }}" class="img-fluid rounded-circle"
                         alt="{{ Auth::user()->name }}">
                </a>
                <a class="navbar-tool-text ms-n1" href="#">
                    <small>{{ Auth::user()->name }}</small>{{ Auth::user()->email }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div style="min-width: 14rem;">
                        <h6 class="dropdown-header">我的账户</h6>
                        <a class="dropdown-item d-flex align-items-center"
                           href="{{ url('dashboard/profile') }}">
                            <i class="ci-settings opacity-60 me-2"></i> 设置中心
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" autocomplete="off">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center" type="submit">
                                <i class="ci-sign-out opacity-60 me-2"></i> 退出登录
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
