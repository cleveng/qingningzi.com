<div class="cell-md-12 cell-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    <h4>
        青柠搜索
    </h4>
    <ul class="offset-top-20 list-dividers">
        @inject('rightbar', 'App\Services\MenuService')
        @foreach($rightbar->menus() as $right)
            <li><a href="{{url('category/'.$right->catid)}}" target="_blank">{{$right->catname}}</a></li>
        @endforeach
    </ul>
    <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
</div>
