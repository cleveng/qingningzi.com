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
            <li class="breadcrumb-item text-nowrap @if(request()->routeIs('dashboard'))active @endif"
                aria-current="page"> 创建记录
            </li>
        </ol>
    </nav>

    @if (session('message'))
        <div class="alert alert-success mb-3" role="alert">
            {{session('message')}}
        </div>
    @endif

    @if ($errors->any())
        @foreach ((array) $errors->all() as $error)
            <div class="alert alert-danger mb-3" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{url('/dashboard/records')}}" method="post" autocomplete="off">
                @csrf
                <div>
                    <label class="form-label" for="platform_id">平台</label>
                    <select class="form-select" id="platform_id" name="platform_id">
                        @foreach($platforms as $item)
                            <option @if($item->id === 20) selected
                                    @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="uid">用户id</label>
                    <input class="form-control" type="number" id="uid" name="uid" value="">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="category_id">分类</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($navs->parents() as $parent)
                            <optgroup label="{{$parent->title}}">
                                @if($parent->children)
                                    @foreach($parent->children as $children)
                                        <option @if($children->id === 13) selected
                                                @endif value="{{$children->id}}">{{$children->title}}</option>
                                    @endforeach
                                @endif
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="writer">作者</label>
                    <input class="form-control" type="text" id="writer" name="writer"
                           value="{{env('APP_NAME')}}">
                </div>
                <div class="mt-3">
                    <label for="rate" class="form-label">评分 (1~5)</label>
                    <input class="form-range" type="range" id="rate" name="rate" min="1" max="5" value="2">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="is_valid">是否有效</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_valid" name="is_valid"
                               checked>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="except_words">排除词 (多个以,分割)</label>
                    <textarea class="form-control" rows="7" id="except_words"
                              name="except_words"></textarea>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="sample_link">示例链接</label>
                    <input class="form-control" type="text" id="sample_link" name="sample_link"
                           placeholder="https://***" value="">
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary rounded-0" type="submit">提交</button>
                </div>
            </form>
        </div>
    </div>
@endsection
