@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active"><a href="{{$url}}">友情链接</a></li>
    @endsection
    <div class="shell section-bottom-60">
        <div class="range">
            <div class="cell-md-12 text-xs-left">
                @foreach($types as $key=>$type)
                    <h3>
                        <a href="{{url('links?t='.$key)}}" class="text-muted">{{$type}}</a>
                    </h3>
                    <p class="list-terms">
                        @foreach($data as $item)
                            @if($item->link_type == $key)
                                @if(!$item->logo)
                                    <a data-original-title="{{$item->name}}" data-toggle="tooltip" data-trigger="hover"
                                       href="{{url('links/'.$item->id)}}" target="_blank"
                                       data-placement="top">{{$item->name}}</a>
                                @else
                                    <a data-original-title="{{$item->name}}" data-toggle="popover" data-trigger="hover"
                                       data-html="true"
                                       data-content="<img src='{{asset($item->logo)}}' alt='{{$item->name}}' class='img-responsive'>"
                                       href="{{url('links/'.$item->id)}}" target="_blank"
                                       data-placement="top">{{$item->name}}</a>
                                @endif
                            @endif
                        @endforeach
                    </p>
                    <hr class="divider divider-gray divider-offset-lg">
                @endforeach
            </div>
        </div>
        <div class="text-left">
            <h4>友情链接申请须知！</h4>
            <p>请务必先挂上本站链接（<strong>{{env('APP_URL')}}</strong> 关键词: <strong>{{env('APP_NAME')}}</strong>
                ），并通知 <a
                    href="mailto:{{env('MAIL_USERNAME')}}" title="联系管理员" target="_blank">本站管理员</a>，管理员看到后会在24小时内回复是否互链。
            </p>
            <ul class="list-marked">
                <li>优先互换收录正常，没有被百度拔毛；</li>
                <li>优先互换 Alexa中国排名10万内或同域名 Alexa世界排名200万内的优质站点。</li>
                <li>优先互换同行情感类、情感交友、恋爱心理、恋爱电影、心理交流、恋爱分享/博客/日志、富媒体等；</li>
                <li>优先互换个人站长；</li>
                <li>优先互换主域名、<code>www</code>域名；</li>
                <li>本站仅支持2种友情链接，文字链 / 图片链 ，其中 文字链 可以带132字内描述，示例：<a
                        data-original-title="爱情将两个人由陌生变成熟悉，又由熟悉变成陌生。爱情正是一个将一对陌生人变成情侣，又将一对情侣变成陌生人的游戏？"
                        data-toggle="tooltip" data-trigger="hover" href="{{env('APP_URL')}}" target="_blank"
                        data-placement="top">{{env('APP_NAME')}}</a>
                    <small class="text-muted">鼠标移动</small>
                </li>
                <li>图片链尺寸大小必须是 <code>121px * 75px</code> ，背景色必须为 <code>纯白色</code> 且格式只能为 <code>jpg</code>，不支持
                    <code>gif/png</code>，示例：<a
                        data-original-title="{{env('APP_NAME')}}" data-toggle="popover" data-trigger="hover"
                        data-html="true"
                        data-content="<img src='{{asset("uploadfile/video/qingningzi_logo.jpg")}}' alt='{{env("APP_NAME")}}' class='img-responsive'>"
                        href="{{env('APP_URL')}}" target="_blank" data-placement="top">{{env('APP_NAME')}}</a>
                    <small class="text-muted">鼠标移动</small>
                </li>
            </ul>
        </div>
    </div>
@endsection

