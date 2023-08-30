@inject('site', 'App\Services\SitesService')

@extends('layouts.blog')
@section('breadcrumb')
    @if($category->parent())
        <li class="breadcrumb-item text-nowrap">
            <a rel="nofollow" href="{{url('categories/'.$category->parent()->id)}}">
                {{$category->parent()->title}}
            </a>
        </li>
    @endif
    <li class="breadcrumb-item text-nowrap active">
        {{$category->title}}
    </li>
@endsection

@section('content')
    <div class="@if($site->ads_enabled()) my-5 @else mb-5 @endif mb-md-0">
        @foreach ($data as $key => $item)
            <article class="@if($key > 0) mt-5 pt-5 border-top @endif">
                <div class="d-flex align-items-start">
                    <div class="blog-entry-meta-label">
                        <span class='date'>{{ $item->created_at->format('d') }}</span>
                        <span class="year">{{ $item->created_at->format('M') }}</span>
                    </div>
                    <div class="blog-entry-meta-title">
                        <h2 class="h4 blog-entry-title mb-0">
                            {{ $item->username }}
                        </h2>
                        <div class="d-flex align-items-center fs-sm">
                            <div>
                                <span class='fst-italic'>Posted by：</span>
                                <span>{{env('APP_NAME')}}</span>
                            </div>
                            <div class="d-none d-md-inline-flex">
                                <span class="blog-entry-meta-divider"></span>
                                <span class='fst-italic'>Date at：</span>
                                <span class="text-primary">
                                     {{$item->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="blog-entry-thumb mb-3 mt-1">
                    <img alt="{{ $item->username }}"
                         @if($key >= 2) class="lazy" data-src="{{ $item->thumb }}"
                         @else src="{{ $item->thumb }}" @endif >
                </a>
                <p class="fs-md">{{ $item->description }}</p>
            </article>
        @endforeach
    </div>
    {{$data->render()}}
@endsection
