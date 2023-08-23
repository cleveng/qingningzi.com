@extends('layouts.guest')
@section('content')
    <div class="accordion">
        <div class="accordion-control align-items-center" aria-hidden="true">
            <h4 class="mb-0">帐户注册</h4>
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
                <form method="POST" action="{{ route('register') }}" autocomplete="off">
                    @csrf
                    <div>
                        <label for="name" class="form-label">
                            用户名
                            <b class="text-danger">*</b>
                        </label>
                        <input class="form-control @if($errors->get('name')) is-invalid @endif"
                               type="text" name="name"
                               id="name" value="{{old('name')}}" required autofocus/>
                        @if ($errors->get('name'))
                            @foreach ((array) $errors->get('name') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div>
                        <label for="email" class="form-label">
                            邮箱
                            <b class="text-danger">*</b>
                        </label>
                        <input class="form-control @if($errors->get('email')) is-invalid @endif"
                               type="email" name="email"
                               id="email" value="{{old('email')}}" required/>
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
                               type="password" name="password" id="password" required>
                        @if ($errors->get('password'))
                            @foreach ((array) $errors->get('password') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="password_confirmation" class="form-label">
                            确认密码
                            <b class="text-danger">*</b>
                        </label>
                        <input
                            class="form-control @if($errors->get('password_confirmation')) is-invalid @endif"
                            type="password" name="password_confirmation" id="password_confirmation"
                            required>
                        @if ($errors->get('password_confirmation'))
                            @foreach ((array) $errors->get('password_confirmation') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text-end pt-4">
                        <button class="btn btn-dark rounded-0 w-100 d-block" type="submit">
                            <i class="ci-sign-in me-2 ms-n21"></i> 注册
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
