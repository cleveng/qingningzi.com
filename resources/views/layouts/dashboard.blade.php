<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/scss/dashboard.scss', 'resources/js/dashboard.js'])
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="fixed">
<div class="wrapper">
    @include('dashboard.templates.sidebar')
    <div class="main">
        @include('dashboard.templates.navbar')
        <main class="content">
            <nav class="mb-4" aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap">
                    <li class="breadcrumb-item">
                        <a class="text-nowrap" href="{{ route('dashboard') }}">
                            <i class="ci-home"></i> 控制面板
                        </a>
                    </li>
                    @section('breadcrumb')
                    @show
                </ol>
            </nav>
            <div class="container-fluid p-0">
                @section('content')
                @show
            </div>
        </main>
        @include('dashboard.templates.footer')
    </div>
</div>
</body>
</html>
