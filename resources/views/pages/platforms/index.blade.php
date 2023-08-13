@extends('layouts.default')
@section('content')
    <div class="container space-2">
        <div class="row">
            <div class="space-1-bottom">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-nowrap" rel="nofollow">
                                <i class="ci-home"></i> 首页
                            </a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active">
                            {{$title}}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                @foreach($data as $key=>$item)
                    <div class="col-sm-12 col-md-3 mb-3">
                        <div class="card border-1">
                            <div class="card-img-top position-relative overflow-hidden">
                                <a class="d-block" target="_blank" rel="nofollow" href="{{$item->url}}">
                                    <img src="{{asset($item->thumb)}}" alt="{{$item->name}}" class="w-100">
                                </a>
                            </div>
                            <div class="badge bg-dark fs-sm position-absolute top-0 end-0 zindex-5 opacity-50">
                                {{$item->name}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$data->render()}}
        </div>
@endsection
