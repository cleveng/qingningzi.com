<div class="cell-md-12 cell-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    @inject('week', 'App\Services\PositionService')
    @inject('url', 'App\Services\UrlService')
    <h4>{{$week->name(13)}}</h4>
    <ul class="list-unstyled list-ordered list-terms offset-top-10">
        @foreach($week->len(13,6) as $day)
            <li class="text-limit">
                <a href="{{$url->pos_url($day->id,$day->catid)}}" class="text-base" data-toggle="tooltip"
                   data-trigger="hover"
                   target="_blank" data-container="body" data-placement="bottom"
                   data-original-title="{{$day->title}}">
                    {{$day->title}}
                </a>
            </li>
        @endforeach
    </ul>
    <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
</div>
