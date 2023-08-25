@extends('layouts.app')
@section('content')
    <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap">
            <li class="breadcrumb-item">
                <a class="text-nowrap" href="{{ route('dashboard') }}">
                    <i class="ci-home"></i> 控制面板
                </a>
            </li>
            <li class="breadcrumb-item text-nowrap @if(request()->routeIs('dashboard'))active @endif"
                aria-current="page">
                <a class="text-nowrap" href="{{ url('dashboard/records/create') }}">
                    创建记录
                </a>
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            Your are login in!
        </div>
    </div>
@endsection
