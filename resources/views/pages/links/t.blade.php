@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active"><a href="{{url('links')}}">友情链接</a></li>
    @endsection
    <div class="container space-2-bottom--lg">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    <a href="{{url('links?typeid='.$type->typeid)}}">{{$type->name}}</a>
                </h3>
                <p class="list-terms">
                    @foreach($data as $link)
                        @if(!$link->logo)
                            <a data-bs-original-title="{{$link->name}}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                               href="{{url('links/'.$link->linkid)}}" target="_blank"
                               data-bs-placement="top">{{$link->name}}</a>
                        @else
                            <a data-bs-original-title="{{$link->name}}" data-bs-toggle="popover" data-bs-trigger="hover"
                               data-bs-html="true"
                               data-bs-content="<img src='{{$link->logo}}' alt='{{$link->name}}' class='img-fluid'>"
                               href="{{url('links/'.$link->linkid)}}" target="_blank"
                               data-bs-placement="top">{{$link->name}}</a>
                        @endif
                    @endforeach
                </p>
                <hr class="divider divider-gray divider-offset-lg">
            </div>
        </div>
        @include('pages.links.apply')
    </div>
@endsection
