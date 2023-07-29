<hr class="my-5">
<div class="col-md-12 col-sm-12">
    <h4 class="fw-normal">
        青柠精选
    </h4>
    @inject('prom', 'App\Services\PromotionsService')
    @foreach($prom->random() as $key=>$m)
        <a href="{{url('/redirect?target_id=' . $m->id)}}" target="_blank" class="card @if($key > 0) mt-3 @endif">
            <img src="{{asset($m->cover_image)}}" class="card-img" alt="{{$m->title}}">
        </a>
    @endforeach
</div>
