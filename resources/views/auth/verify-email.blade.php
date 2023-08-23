@extends('layouts.guest')
@section('content')
    <div class="accordion">
        <div class="accordion-control" aria-hidden="true" style="display: block!important;">
            <h4 class="mb-0">验证邮箱!!!</h4>
            <p class="small mb-0 text-muted">点击我们刚刚发给您的链接来验证您的电子邮件地址!
                如果您没有收到这封邮件，我们可以再发一封给您。</p>
        </div>
        <div class="accordion-content">
            <div class="accordion-content-wrapper">
                @if (session('status'))
                    <div class="alert alert-danger mb-3" role="alert">
                        验证链接已发送到指定邮箱地址!!!
                    </div>
                @endif
                <form method="POST" action="{{ route('verification.send') }}" autocomplete="off">
                    @csrf
                    <button class="btn btn-dark rounded-0 w-100 d-block" type="submit">
                        重新发送
                    </button>
                </form>
                <form method="POST" action="{{ route('logout') }}" autocomplete="off" class="mt-3">
                    @csrf
                    <button class="btn btn-outline-dark rounded-0 w-100 d-block" type="submit">
                        <i class="ci-sign-out me-1"></i>退出登录
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
