<?php $parent_id = isset($parent_id) ? $parent_id : null; ?>
    <!DOCTYPE html>
<html lang="zh-Hans-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/scss/theme.scss', 'resources/js/app.js'])
</head>
<body class="bg-secondary">
<main class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <section class="ps-lg-4 pe-lg-3 pt-4">
                <div class="px-3 pt-2">
                    <h2 class="h5 mb-3">当前用户</h2>
                    <div
                        class="d-flex flex-wrap justify-content-between align-items-center rounded-3 bg-white shadow py-2 px-3 mb-4">
                        <div class="d-flex align-items-center me-3 py-2">
                            <img class="rounded-circle" src="{{ Auth::user()->profile_url }}" width="50"
                                 alt="{{ Auth::user()->name }}">
                            <div class="ps-3">
                                <div class="fs-ms text-muted">{{ Auth::user()->name }}</div>
                                <div class="fs-md fw-medium text-heading">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}" autocomplete="off">
                                @csrf
                                <button class="btn btn-outline-dark btn-sm" type="submit">
                                    <i class="ci-sign-out me-2"></i>退出登录
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-9">
            <div class="ps-lg-4 pe-lg-3 pt-4">
                <div class="px-3 pt-2">
                    @section('content')
                    @show
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
