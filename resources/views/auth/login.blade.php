@extends('layouts.guest')
@section('content')
    <div class="accordion">
        <div class="accordion-control align-items-center" aria-hidden="true">
            <h4 class="mb-0">帐户登录</h4>
            <div class="fs-sm">
                @if(Route::has('register'))
                    <a href="{{ route('register') }}">新用户</a>
                    <span class="blog-entry-meta-divider"></span>
                @endif
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
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
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

                    <div class="mt-3">
                        <label for="password" class="form-label">
                            密码
                            <b class="text-danger">*</b>
                        </label>
                        <input class="form-control @if($errors->get('password')) is-invalid @endif"
                               type="password" name="password" id="password" required
                               autocomplete="current-password">
                        @if ($errors->get('password'))
                            @foreach ((array) $errors->get('password') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="d-flex flex-wrap justify-content-between mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked=""
                                   id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">保持登录</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="nav-link-inline fs-sm"
                               href="{{ route('password.request') }}">忘记密码?</a>
                        @endif
                    </div>

                    <div class="text-end pt-4">
                        <button class="btn btn-primary rounded-0 w-100 d-block" type="submit">
                            <i class="ci-sign-in me-2 ms-n21"></i> 登录
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
