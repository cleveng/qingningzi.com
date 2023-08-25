@extends('layouts.app')
@section('content')
    @inject('navs', 'App\Services\CategoriesService')
    <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap">
            <li class="breadcrumb-item">
                <a class="text-nowrap" href="{{ route('dashboard') }}">
                    <i class="ci-home"></i> 控制面板
                </a>
            </li>
            <li class="breadcrumb-item text-nowrap" aria-current="page">
                <a class="text-nowrap" href="{{ url('dashboard/records/create') }}">
                    创建记录
                </a>
            </li>
        </ol>
    </nav>

    <div class="card mb-5">
        <div class="card-body">
            <table class="table table-bordered" aria-describedby="records">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">关联UID</th>
                    <th scope="col">关联栏目</th>
                    <th scope="col">关联平台</th>
                    <th scope="col">默认作者</th>
                    <th scope="col">获取量</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->uid}}</td>
                        <td>{{$item->category->title}}</td>
                        <td>{{$item->platform->name}}</td>
                        <td>{{$item->writer}}</td>
                        <td>{{$item->fetch_count}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm"
                               href="{{url('dashboard/records/'.$item->id.'/edit')}}">编辑</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $data->render() }}
            </div>
        </div>
    </div>
@endsection
