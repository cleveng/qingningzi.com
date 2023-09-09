@inject('site', 'App\Services\SitesService')
@php
    $ads_enabled = $site->ads_enabled();
@endphp

@extends('layouts.blog')
@section('breadcrumb')
    @if ($category->parent())
        <li class="breadcrumb-item text-nowrap">
            <a rel="nofollow" href="{{ url('categories/' . $category->parent()->id) }}">
                {{ $category->parent()->title }}
            </a>
        </li>
    @endif
    <li class="breadcrumb-item text-nowrap active">
        {{ $category->title }}
    </li>
@endsection

@section('content')
    <div class="@if($ads_enabled) my-5 @else mb-5 @endif mb-md-0">
        @foreach ($data as $key => $item)
            @include('app.components.article-item', ['data'=>$item, 'key'=>$key])
        @endforeach
    </div>
    {{ $data->render() }}
@endsection
