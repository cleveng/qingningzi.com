@extends('layouts.default')
@section('content')
    <div class="container py-5 mb-lg-3">
        <div class="row justify-content-center pt-lg-4 text-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <h1 class="display-404 py-lg-3">{{$statusCode ?? 404}}</h1>
                <h2 class="h3 mb-4">抱歉，您访问的页面不存在</h2>
                <div>
                    <a rel="nofollow" href="{{url(env('APP_URL'))}}" class="btn btn-primary rounded-0">返回首页</a>
                </div>
            </div>
        </div>
    </div>
@endsection
