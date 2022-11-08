@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li>
            <a href="">异常反馈</a>
        </li>
    @endsection
    <div class="shell section-bottom-60 offset-top-10">
        <div class="range range-center">
            <div class="cell-md-8">
                <h1 class="offset-top-45 text-limit">404</h1>
                <h4 class="offset-top-0 text-limit">抱歉，您访问的页面不存在</h4>

                <p><span class="badge badge-primary">5</span> 秒后跳转</p>
                <a rel="nofollow" href="{{url(env('APP_URL'))}}" class="offset-top-30 btn btn-primary">返回首页</a>
                <hr class="divider divider-offset-lg divider-gray">
            </div>
            {{--            @include('components.sidebar')--}}
        </div>
    </div>
@endsection
