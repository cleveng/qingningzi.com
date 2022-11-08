@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        @if($category->parent())
            <li>
                <a rel="nofollow" href="{{url('categories/'.$category->parent()->id)}}">
                    {{$category->parent()->title}}
                </a>
            </li>
        @endif
        <li>
            {{$category->title}}
        </li>
    @endsection
    <div class="shell section-bottom-60">
        <div class="range">
            <div class="cell-md-8 text-xs-left">
                @foreach($data as $key=>$item)
                    <div class="blog-post">
                        <div
                            class="blog-post-meta unit unit-xs-horizontal unit-sm-horizontal unit-md-horizontal unit-lg-horizontal">
                            <div class="unit-left">
                                <div class="center-block blog-post-meta-date">
                                    <span class='blog-post-meta-date-big reveal-block'>
                                        {{$item->created_at->format('d')}}
                                    </span>
                                    <span>{{$item->created_at->format('M')}}</span>
                                </div>
                            </div>
                            <div class="unit-body">
                                <h3 class="blog-post-meta-title">
                                    <a href="{{url($item->url)}}" class="text-base"
                                       title="{{$item->title}}" target="_blank">{{$item->username}}</a></h3>
                                <p class="hidden-xs">
                                    <span class='text-italic'>Posted by </span>
                                    <a>
                                        {{env('APP_NAME')}}
                                    </a> &#8226;
                                    <span class='text-italic'>Date at</span>
                                    <span class="text-primary">{{$item->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="blog-post-media">
                            @if($key%3 == 0)
                                <a title="{{$item->title}}" data-lightbox="image" href="{{$item->thumb}}"
                                   class="thumbnail">
                                    <img width="770" height="564" alt="{{$item->title}}"
                                         data-original="{{$item->thumb}}" class="img-responsive"><span
                                        class="caption"></span></a>
                            @else
                                <a href="{{url($item->url)}}"
                                   title="{{$item->title}}">
                                    <img width="770" height="562" alt="{{$item->title}}"
                                         data-original="{{$item->thumb}}"
                                         class="img-responsive">
                                </a>
                            @endif
                        </div>
                        <p class="desc">{{$item->description}}</p>
                        <div class="reveal-xs-flex range-xs-bottom range-xs-justify">
                            <div class="veil reveal-xs-block">
                                <ul class="rd-navbar-socials elements-group-18 reveal-inline-block text-middle">
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-linkedin"></a></li>
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-qq"></a></li>
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-weibo"></a></li>
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-renren"></a></li>
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-wechat"></a></li>
                                    <li><a href="javascript:;" data-toggle="tooltip" data-placement="top" title="不支持"
                                           class="text-gray icon icon-xs fa-plus"></a></li>
                                </ul>
                            </div>
                            <div><a href="{{url($item->url)}}" class="btn btn-primary"
                                    rel="nofollow">马上围观</a></div>
                        </div>
                    </div>
                    <hr class="divider divider-offset-lg divider-gray">
                @endforeach
                <ul class="pagination">
                    {{$data->render()}}
                </ul>
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
