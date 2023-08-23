@extends('layouts.guest')
@section('content')
    <div class="accordion">
        <div class="accordion-control align-items-center" aria-hidden="true">
            <h4 class="mb-0">确认</h4>
        </div>
        <div class="accordion-content">
            <div class="accordion-content-wrapper">
                <form method="POST" action="{{ route('password.confirm') }}" autocomplete="off">
                    @csrf
                    <div>
                        <label for="password" class="form-label">
                            密码
                            <b class="text-danger">*</b>
                        </label>
                        <input class="form-control @if($errors->get('password')) is-invalid @endif"
                               type="password" name="password" id="password" required autocomplete="current-password">
                        @if ($errors->get('password'))
                            @foreach ((array) $errors->get('password') as $message)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-dark rounded-0 w-100 d-block" type="submit">
                            提交
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
