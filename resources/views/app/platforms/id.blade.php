@inject('site', 'App\Services\SitesService')
@inject('article', 'App\Services\ArticlesService')

@extends('layouts.blog')
@section('breadcrumb')
    <li class="breadcrumb-item text-nowrap">
        <a href="{{url('platforms')}}">合作媒体</a>
    </li>
    <li class="breadcrumb-item text-nowrap active" aria-current="page">
        {{$platform->name}}
    </li>
@endsection

@section('content')
    <div class="@if($site->ads_enabled()) my-5 @else mb-5 @endif mb-md-0">
        @forelse($data as $key => $item)
            @include('pages.components.article-item', ['data'=>$item, 'key'=>$key])
        @empty
            <div class="alert alert-secondary py-5 px-lg-5 text-center mb-5">
                <h1 class="h4 pb-2">O(∩_∩)O~</h1>
                <p class="fs-md pb-2">列表为空，访问受限</p>
                <a class="btn btn-primary rounded-0" href="{{url('/')}}">
                    <i class="ci-arrow-left mt-n1 me-2"></i> 返回首页
                </a>
            </div>
        @endforelse
    </div>
    {{ $data->render() }}
@endsection
