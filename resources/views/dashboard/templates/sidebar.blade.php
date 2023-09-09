<nav id="sidebar" class="sidebar @if($hideSidebar) collapsed @endif" aria-label="Sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{url('/dashboard')}}">
            <img src="{{Vite::image('logo.png')}}" alt="{{env('APP_NAME')}}"
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
