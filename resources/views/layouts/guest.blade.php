<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ Vite::image('favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ Vite::image('favicon.png') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="position-relative overflow-hidden vh-100">
    <div class="bg-image-cover" style="background-image: url({{Vite::image('bg.jpeg')}});"></div>
    <div class="container">
        <div class="justify-content-center align-items-center vh-100 row">
            <div class="col-lg-5 col-md-7">
                <div class="accordion-group accordion-group-portal">
                    @section('content')
                    @show
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
