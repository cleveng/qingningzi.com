<div class="col-md-12 text-start text-center text-md-left col-md-push-5 offset-top-0 offset-sm-top-45 offset-md-top-0">
    <h4>Hot Tags</h4>
    <div class="space-1-top">
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
    <hr class="my-5 veil-sm reveal-md-block">
</div>
