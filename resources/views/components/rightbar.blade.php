<div class="col-md-12 col-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    <h4>
        青柠搜索
    </h4>
    <ul class="space-1-top list-dividers">
        @inject('rightbar', 'App\Services\MenuService')
        @foreach($rightbar->menus() as $right)
            <li><a href="{{url('category/'.$right->catid)}}" target="_blank">{{$right->catname}}</a></li>
        @endforeach
    </ul>
    <hr class="my-5 veil-sm reveal-md-block">
</div>
