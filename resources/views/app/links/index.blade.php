@extends('layouts.default')
@section('content')
    <div class="container space-2">
        <div class="row">
            <div class="col-md-12">
                <div class="space-1-bottom">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-nowrap" rel="nofollow">
                                    <i class="ci-home"></i> 首页
                                </a>
                            </li>
                            <li class="breadcrumb-item text-nowrap">
                                <a href="{{url('links')}}">友情链接</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <section>
                    @foreach($data as $key=>$value)
                        <div class="space-1 border-bottom">
                            <h3>{{$value['title']}}</h3>
                            <p class="list-terms">
                                @foreach($value['items'] as $item)
                                    @if($item->logo)
                                        <a data-bs-original-title="{{$item->name}}" data-bs-toggle="popover"
                                           data-bs-trigger="hover"
                                           data-bs-html="true"
                                           data-bs-content="<img src='{{url($item->logo)}}' alt='{{$item->name}}' class='img-fluid'>"
                                           href="{{$item->url}}"
                                           target="_blank"
                                           @if($item->link_type !== \App\Enums\LinkType::EMOTION) rel="nofollow"
                                           @endif
                                           data-bs-placement="top">{{$item->name}}</a>
                                    @else
                                        <a data-bs-original-title="{{$item->name}}" data-bs-toggle="tooltip"
                                           data-bs-trigger="hover"
                                           href="{{$item->url}}"
                                           target="_blank"
                                           @if($item->link_type !== \App\Enums\LinkType::EMOTION) rel="nofollow"
                                           @endif
                                           data-bs-placement="top">{{$item->name}}</a>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    @endforeach
                </section>

                <section class="fs-md space-1-top">
                    <h4 class="fw-normal">友情链接申请须知！</h4>
                    <p class="text-dark">请务必先挂上本站链接（<strong>{{env('APP_URL')}}</strong> 关键词:
                        <strong>{{env('APP_NAME')}}</strong>
                        ），并通知 <a
                            href="mailto:{{env('MAIL_MONITOR')}}" title="联系管理员">本站管理员</a>，管理员看到后会在24小时内回复是否互链。
                    </p>
                    <ul class="list-marked list-unstyled fs-sm">
                        <li>优先互换收录正常，没有被百度拔毛；</li>
                        <li>优先互换 Alexa中国排名10万内或同域名 Alexa世界排名200万内的优质站点。</li>
                        <li>优先互换同行情感类、情感交友、恋爱心理、恋爱电影、心理交流、恋爱分享/博客/日志、富媒体等；</li>
                        <li>优先互换个人站长；</li>
                        <li>优先互换主域名、<code>www</code>域名；</li>
                        <li>本站仅支持2种友情链接，文字链 / 图片链 ，其中 文字链 可以带132字内描述，示例：<a
                                data-bs-original-title="爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？"
                                data-bs-toggle="tooltip" data-bs-trigger="hover" href="{{env('APP_URL')}}"
                                target="_blank"
                                data-bs-placement="top">{{env('APP_NAME')}}</a>
                            <small class="text-muted">鼠标移动</small>
                        </li>
                        <li>图片链尺寸大小必须是 <code>121px * 75px</code> ，背景色必须为 <code>纯白色</code> 且格式只能为
                            <code>jpg</code>，不支持
                            <code>gif/png</code>，示例：<a
                                data-bs-original-title="{{env('APP_NAME')}}" data-bs-toggle="popover"
                                data-bs-trigger="hover"
                                data-bs-html="true"
                                data-bs-content="<img src='{{url("uploadfile/video/qingningzi_logo.jpg")}}' alt='{{env("APP_NAME")}}' class='img-fluid'>"
                                href="{{env('APP_URL')}}" target="_blank"
                                data-bs-placement="top">{{env('APP_NAME')}}</a>
                            <small class="text-muted">鼠标移动</small>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
@endsection
