@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li>
            <a href="{{url($url)}}" rel="nofollow">
                {{$title}}
            </a>
        </li>
        <li>
            最新资讯
        </li>
    @endsection
    <div class="shell section-bottom-60 offset-top-10">
        <div class="range">
            @foreach($data as $key=>$email)
                <div
                    class="@if($key>0) offset-top-60 @else offset-top-0 @endif @if($key>0 && $key < 3) offset-sm-top-0 @endif cell-sm-6 cell-md-4 blog-post blog-post-grid">
                    <div class="blog-post-media">
                        @if($key%3 == 0)
                            <a href="{{url($path.'/'.$email->id)}}" title="{{$email->title}}" target="_blank">
                                <img alt="{{$email->title}}" width="770" height="562"
                                     src="{{$email->thumb}}"
                                     class="img-fluid">
                                <div class="blog-post-caption">
                                    <div class="blog-post-meta-date">
                                        <span
                                            class='blog-post-meta-date-big reveal-block'>{{date('d',$email->inputtime)}}</span> {{date('M',$email->inputtime)}}
                                    </div>
                                </div>
                            </a>
                        @else
                            <a title="{{$email->title}}" rel="help" data-lightbox="image"
                               href="{{$email->thumb}}" class="thumbnail">
                                <img alt="{{$email->title}}" width="770" height="564"
                                     src="{{$email->thumb}}" class="img-fluid">
                                <span class="caption"></span>
                            </a>
                            <div class="blog-post-caption">
                                <a href="{{url($path.'/'.$email->id)}}" class="blog-post-meta-date" target="_blank">
                                    <span
                                        class="blog-post-meta-date-big reveal-block">{{date('d',$email->inputtime)}}</span> {{date('M',$email->inputtime)}}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="blog-post-meta">
                        <h5 class="blog-post-meta-title blog-post-limit-title">
                            <a href="{{url($path.'/'.$email->id)}}" class="text-base"
                               title="{{$email->title}}"
                               target="_blank">{{$email->title}}</a>
                        </h5>
                        <p>
                            <span class='fst-italic'>Writer by </span>
                            <span class="text-primary">
                          {{$email->original}}
                    </span> &#8226;
                            <span class='fst-italic'>View </span>
                            <a href='javascript:;' data-bs-toggle="tooltip"
                               data-bs-placement="right" title="好评：{{$email->status}} 星级"
                               class="mdi mdi-mdi-heart-outline"></a>
                        </p>
                    </div>
                    <p>{{Str::limit($email->description,86)}}</p>
                    <div>
                        <a href="{{url($path.'/'.$email->id)}}" class="btn btn-link" rel="nofollow"
                           target="_blank">
                            <span class="btn-text">read more</span>
                        </a>
                    </div>
                    <hr class="my-5">
                </div>
            @endforeach
        </div>
        <div class="text-center offset-top-45">
            {{$data->render()}}
        </div>
    </div>
@endsection
