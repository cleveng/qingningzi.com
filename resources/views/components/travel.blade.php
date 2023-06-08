<div class="cell-md-12 offset-top-0 offset-sm-top-45 text-start offset-md-top-0">
    @inject('travel', 'App\Services\PositionService')
    @inject('url', 'App\Services\UrlService')
    <h4 class="text-center text-md-left">{{$travel->name(12)}}</h4>
    <div class="range space-1-top">
        @foreach($travel->content(12) as $content)
            <div class="cell-md-12 cell-sm-6 offset-top-30">
                <div class="unit unit-horizontal unit-spacing-21">
                    <a href="{{$url->pos_url($content->id,$content->catid)}}" target="_blank" data-bs-toggle="tooltip"
                       data-bs-trigger="hover"
                       data-bs-container="body"
                       data-bs-placement="bottom"
                       data-bs-original-title="{{$content->title}}">
                        <img alt="{{$content->title}}" src="{{$content->thumb}}" class="img-fluid">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <hr class="my-5 veil-sm reveal-md-block">
</div>
