<?php $catid = null; ?>
@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active">
            {{$data->name}}
        </li>
    @endsection
    <div class="shell section-bottom-60 offset-top-10">
        <div class="range range-center">
            <div class="cell-md-8">
                <h1 class="offset-top-45 text-limit">{{$data->name}}</h1>
                <h2 class="offset-top-0 text-limit">{{$data->url}}</h2>
                <p><span class="badge badge-primary">{{$data->id}}</span> 秒后跳转</p>
                <script type="application/javascript">
                    +jQuery(function () {
                        "use strict";
                        jshref("{{$data->id}}", "{{$data->url}}");
                    });

                    function jshref(secs, surl) {
                        var jumpTo = jQuery("span.badge-primary");
                        jumpTo.text(secs);
                        if (--secs > 0) {
                            setTimeout("jshref(" + secs + ",'" + surl + "')", 1000);
                        }
                        else {
                            location.href = surl;
                        }
                    }
                </script>
                <a rel="nofollow" href="{{url(env('APP_URL'))}}" class="offset-top-30 btn btn-primary">返回首页</a>
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
