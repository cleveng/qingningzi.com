@foreach($items as $key => $item)
<a class="card @if($key >0) mt-3 @endif" href="{{ url('/promotions/' . $item['id']) }}" rel="nofollow" target="_blank">
    @if($showTitle)
        <span class="bg-dark badge position-absolute top-0 start-0">{{$item['title']}}</span>
    @endif
    <img alt="{{$item['description']}}" class="card-img" src="{{url($item['cover_image'])}}">
</a>
@endforeach
<div wire:loading.delay.long>
    <div class="loader"></div>
</div>
