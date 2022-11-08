@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li>
            <a href="{{url($url)}}" rel="nofollow">
                {{$title}}
            </a>
        </li>
        <li class="active">
            合作媒体列表(部分有二维码展示)
        </li>
    @endsection
    <div class="shell section-bottom-60 offset-top-10">
        <div class="range">
            @foreach($data as $key=>$media)
                @if($key == 0)
                    <div class="offset-top-0 cell-sm-6 cell-md-3 blog-post blog-post-grid">
                        @elseif($key>0 && $key <=3 )
                            <div class="offset-top-60 offset-sm-top-0 cell-sm-6 cell-md-3 blog-post blog-post-grid">
                                @elseif($key>3)
                                    <div class="offset-top-60 cell-sm-6 cell-md-3 blog-post blog-post-grid">
                                        @endif
                                        <div class="blog-post-media">
                                            <a title="{{$media->name}}" rel="help" data-lightbox="image"
                                               href="@if($media->qrcode){{asset($media->qrcode)}} @else {{asset($media->thumb)}} @endif"
                                               class="thumbnail">
                                                <img alt="{{$media->name}}"
                                                     data-original="{{asset($media->thumb)}}"
                                                     class="img-responsive">
                                                <span class="caption"></span>
                                            </a>
                                        </div>
                                        <div class="blog-post-meta">
                                            <p>
                                                @if($media->name)
                                                    <span class='text-italic'>Called </span>
                                                    <a class="text-primary" href="{{url($url.'/'.$media->id)}}"
                                                       target="_blank">
                                                        {{$media->name}}
                                                    </a> &#8226;
                                                @endif
                                                <span class='text-italic'>View </span>
                                                <a href='javascript:;' data-toggle="tooltip"
                                                   data-placement="right"
                                                   title="质量度：{{ceil(abs($media->id - 17)/3)}}"
                                                   class="fa fa-heart"></a>
                                            </p>
                                        </div>
                                        @if(!stripos($media->url,'qingningzi'))
                                            <p>
                                                <a href="{{$media->url}}" title="{{$media->name}}"
                                                   target="_blank" rel="nofollow">
                                                    {{$media->name}}官网
                                                </a>
                                            </p>
                                        @else
                                            <p>{{$media->name}}</p>
                                        @endif
                                        <div><a href="{{url($url.'/'.$media->id)}}" class="btn btn-link"
                                                target="_blank">
                                                <span class="btn-text">查看更多</span>
                                            </a>
                                        </div>
                                        <hr class="divider divider-offset-lg divider-gray">
                                    </div>
                                    @endforeach
                                    <div class="text-center offset-top-45">
                                        {{$data->render()}}
                                    </div>
                            </div>
@endsection
