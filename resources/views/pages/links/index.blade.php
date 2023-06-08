@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active">友情链接</li>
    @endsection
    <div class="container space-2-bottom">
        <div class="row">
            <div class="col-md-12">
                @foreach($types as $key=>$type)
                    <h3>
                        <a href="{{url('links?t='.$key)}}" class="text-muted fw-light">{{$type}}</a>
                    </h3>
                    <p class="list-terms">
                        @foreach($data as $item)
                            @if($item->link_type == $key)
                                @if(!$item->logo)
                                    <a data-bs-original-title="{{$item->name}}" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover"
                                       href="{{url('links/'.$item->id)}}" target="_blank"
                                       data-bs-placement="top">{{$item->name}}</a>
                                @else
                                    <a data-bs-original-title="{{$item->name}}" data-bs-toggle="popover"
                                       data-bs-trigger="hover"
                                       data-bs-html="true"
                                       data-bs-content="<img src='{{asset($item->logo)}}' alt='{{$item->name}}' class='img-fluid'>"
                                       href="{{url('links/'.$item->id)}}" target="_blank"
                                       data-bs-placement="top">{{$item->name}}</a>
                                @endif
                            @endif
                        @endforeach
                    </p>
                    <hr class="divider divider-gray divider-offset-lg">
                @endforeach
            </div>
        </div>
        @include('pages.links.apply')
    </div>
@endsection

