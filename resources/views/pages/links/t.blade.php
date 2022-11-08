@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active"><a href="{{url('links')}}">友情链接</a></li>
    @endsection
    <div class="shell section-bottom-60">
        <div class="range">
            <div class="cell-md-12 text-xs-left">
                <h3>
                    <a href="{{url('links?typeid='.$type->typeid)}}">{{$type->name}}</a>
                </h3>
                <p class="list-terms">
                    @foreach($data as $link)
                        @if(!$link->logo)
                            <a data-original-title="{{$link->name}}" data-toggle="tooltip" data-trigger="hover"
                               href="{{url('links/'.$link->linkid)}}" target="_blank"
                               data-placement="top">{{$link->name}}</a>
                        @else
                            <a data-original-title="{{$link->name}}" data-toggle="popover" data-trigger="hover"
                               data-html="true"
                               data-content="<img src='{{$link->logo}}' alt='{{$link->name}}' class='img-responsive'>"
                               href="{{url('links/'.$link->linkid)}}" target="_blank"
                               data-placement="top">{{$link->name}}</a>
                        @endif
                    @endforeach
                </p>
                <hr class="divider divider-gray divider-offset-lg">
            </div>
        </div>
        @include('pages.links.apply')
    </div>
@endsection

