@extends('layouts.blank')
@section('content')
    @inject('navs', 'App\Services\CategoriesService')
    <div class="container my-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
            <div class="row">
                <aside class="col-lg-4 pe-xl-5">
                    <div class="d-block d-lg-none p-4">
                        <a class="btn btn-outline-accent d-block" href="#account-menu" data-bs-toggle="collapse">
                            <i class="ci-menu me-2"></i>Account menu
                        </a>
                    </div>
                    <div class="h-100 border-end mb-2">
                        <div class="d-lg-block collapse" id="account-menu">
                            <div class="bg-secondary p-4 d-none">
                                <h3 class="fs-sm mb-0 text-muted">管理中心</h3>
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li class="border-bottom mb-0">
                                    <a class="nav-link-style d-flex align-items-center px-4 py-3 active"
                                       href="/account">
                                        <i class="ci-arrow-right opacity-60 me-2"></i> 添加记录
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                        <h2 class="h3 py-2 text-center text-sm-start">新增记录</h2>
                        @if ($errors->any())
                            @foreach ($errors->all() as $key=>$error)
                                <div class="alert alert-danger @if($key > 0 ) mt-3 @endif" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{url('/records')}}" method="post" autocomplete="off">
                            @csrf
                            <input name="signature" type="hidden" value="{{$signature}}">
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
                                <input class="form-control" type="number" id="uid" name="uid" value="22999">
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
                                <button class="btn btn-primary rounded-0 w-100 d-block" type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
