@extends('layouts.dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item text-nowrap @if(request()->routeIs('dashboard'))active @endif" aria-current="page">
        数据报表
    </li>
@endsection

@section('content')
    @inject('article', 'App\Services\ArticlesService')
    <div class="row">
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">{{$article->count()}}</h3>
                            <p class="mb-2">文章数量</p>
                            <div class="mb-0">
                                <span class="badge bg-success me-2"> 正常 </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-success" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">{{$article->count(false)}}</h3>
                            <p class="mb-2">数量</p>
                            <div class="mb-0">
                                <span class="badge bg-secondary me-2"> 待更新 </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat"
                                 data-bs-toggle="tooltip"
                                 aria-label="Remove from Favorites"
                                 data-bs-original-title="更新数据">
                                <i class="align-middle text-success" data-feather="refresh-cw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
