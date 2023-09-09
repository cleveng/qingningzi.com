@php
    $parent_id = isset($parent_id) ? $parent_id : null;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! SEO::generate() !!}
    <link rel="shortcut icon" href="{{ Vite::image('favicon.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" href="{{ Vite::image('favicon.png') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="page">
    @include('app.templates.header')
    <main>
        @section('content')
        @show
    </main>
    @include('app.templates.footer')
</div>
</body>
</html>
