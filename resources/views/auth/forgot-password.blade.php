@extends('layouts.guest')
@section('content')
    <div class="accordion">
        <div class="accordion-control align-items-center" aria-hidden="true">
            <h4 class="mb-0">找回帐号</h4>
            <div class="fs-sm">
                <a class="fs-sm" href="{{ route('login') }}">前往登录</a>
                <span class="blog-entry-meta-divider"></span>
                <a href="{{ url('/') }}">首页</a>
            </div>
        </div>
        <div class="accordion-content">
            <div class="accordion-content-wrapper">
                @if (session('status'))
                    <div class="alert alert-danger mb-3" role="alert">
                        {{session('status')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
                    @csrf
                    <div>
                        <label for="email" class="form-label">
                            邮箱
                            <b class="text-danger">*</b>
                        </label>
                        <input class="form-control @if($errors->get('email')) is-invalid @endif"
                               type="email" name="email"
                               id="email" value="{{old('email')}}" required autofocus/>
                        @if ($errors->get('email'))
                            @foreach ((array) $errors->get('email') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="text-end pt-4">
                        <button class="btn btn-dark rounded-0 w-100 d-block" type="submit">
                            提交
                        </button>
                    </div>
                    <div class="mt-3 fs-sm">
                        <small>系统会给您的邮箱发送密码<span class="text-danger">重置链接</span>，点击链接进行重置密码操作。</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
