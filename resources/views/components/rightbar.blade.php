<div class="col-md-12 col-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    <h4>
        青柠搜索
    </h4>
    <ul class="space-1-top list-dividers">
        @inject('menu', 'App\Services\MenuService')
        @foreach($menu->menus() as $m)
            <li><a href="{{url($m->url)}}" target="_blank">{{$m->title}}</a></li>
        @endforeach
    </ul>
    <hr class="my-5 veil-sm reveal-md-block">
</div>
