@inject('mood', 'App\Services\MoodService')
<div class="topbar topbar-light bg-light d-none d-md-block">
    <div class="container justify-content-between">
        <div class="topbar-text dropdown disable-autohide">
            <a class="topbar-link" href="javascript:;" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ci-menu"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                @foreach($navs->submenu() as $submenu)
                    <li>
                        <a class="dropdown-item" href="{{url($submenu->url)}}">{{$submenu->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="text-nowrap">
            {{$mood->random()->description}}
            <span class='text-muted fst-italic'>- {{$mood->random()->author}}</span>
        </div>
    </div>
</div>
