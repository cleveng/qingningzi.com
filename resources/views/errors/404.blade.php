@extends('layouts.default')
@section('content')
    <div class="container space-3">
        <div class="row text-center">
            <div class="col">
                <h1 class="space-1-top display-1">404</h1>
                <h4 class="mt-0 text-truncate fs-lg">抱歉，您访问的页面不存在</h4>
                <div class="mt-3">
                    <a rel="nofollow" href="{{url(env('APP_URL'))}}" class="btn btn-primary rounded-0">返回首页</a>
                </div>
            </div>
        </div>
    </div>
@endsection
