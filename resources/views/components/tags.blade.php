<div class="cell-md-12 text-left text-center text-md-left cell-md-push-5 offset-top-0 offset-sm-top-45 offset-md-top-0">
    <h4>Hot Tags</h4>
    <div class="offset-top-20">
        <ul class="elements-group-10">
            @inject('tags', 'App\Services\TagService')
            @foreach($tags->tags() as $keyword)
                <li>
                    <a target="_blank"
                       href="{{url('https://www.so.com/s?q='.urlencode($keyword).'&ie=utf8&src='.env('APP_DOMIAN').'&site='.env('APP_DOMIAN').'&rg=1')}}"
                       class="text-bold-onhover" rel="nofollow">
                        {{$keyword}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
</div>
