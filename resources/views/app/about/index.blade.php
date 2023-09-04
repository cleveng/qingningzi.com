@extends('layouts.default')
@section('content')
    <div class="container space-2">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
                <div class="space-1-bottom">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-nowrap" rel="nofollow">
                                    <i class="ci-home"></i> 首页
                                </a>
                            </li>
                            <li class="breadcrumb-item text-nowrap active">
                                {{$data->title}}
                            </li>
                        </ol>
                    </nav>
                </div>

                {!! $data->content !!}

                <p class="fs-sm text-end d-none d-md-block">
                    更新时间: {{ $data->updated_at->format('Y/m/d') }}
                </p>

                <hr class="hr-dark my-5">
                <h4>联系方式：</h4>
                <dl class="list-style mt-3">
                    <dt>邮箱 <i class="ci-mail" aria-hidden="true"></i></dt>
                    <dd><a rel="nofollow" target="_blank"
                           href="mailto:{{env('MAIL_MONITOR')}}"
                           class="text-base">给我写信</a></dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
