<div class="col-md-12 col-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    @inject('week', 'App\Services\PositionService')
    @inject('url', 'App\Services\UrlService')
    <h4>{{$week->name(13)}}</h4>
    <ul class="list-unstyled list-ordered list-terms mt-3">
        @foreach($week->len(13,6) as $day)
            <li class="text-truncate">
                <a href="{{$url->pos_url($day->id,$day->catid)}}" class="text-base" data-bs-toggle="tooltip"
                   data-bs-trigger="hover"
                   target="_blank" data-bs-container="body" data-bs-placement="bottom"
                   data-bs-original-title="{{$day->title}}">
                    {{$day->title}}
                </a>
            </li>
        @endforeach
    </ul>
    <hr class="my-5 veil-sm reveal-md-block">
</div>
