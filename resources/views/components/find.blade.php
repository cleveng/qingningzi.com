<div class="col-md-12 col-sm-6 col-md-push-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
    @inject('love', 'App\Services\PositionService')
    @inject('url', 'App\Services\UrlService')
    @inject('hot', 'App\Services\HotService')
    <h4>{{$love->name(25)}}</h4>
    @foreach($love->len(25,6,true) as $cont)
        <div class="offset-top-20 p fst-italic">
            @if($cont->stars)
                推荐星级：
                <span class="text-primary">
            {!! $hot->stars($cont->stars,$cont->catid,$cont->id) !!}
            </span>
            @endif
        </div>
        <p class="big text-truncate">
            <a href="{{$url->pos_url($cont->id,$cont->catid)}}" class="text-base"
               target="_blank" data-bs-toggle="tooltip" data-bs-trigger="hover"
               data-bs-container="body" data-bs-placement="bottom"
               data-bs-original-title="{{$cont->title}}">
                {{$cont->title}}
            </a>
        </p>
    @endforeach
    <hr class="my-5 veil-sm">
</div>
