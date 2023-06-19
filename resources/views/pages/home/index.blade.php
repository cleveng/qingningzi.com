@extends('layouts.default')
@section('content')
    @inject('articles', 'App\Services\ArticlesService')
    @inject('idols', 'App\Services\IdolsService')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php $sa = $articles->item(12); ?>
                        @if($sa)
                            <div class="swiper-slide">
                                <img class="swiper-slide-img"
                                     src="{{asset('uploadfile/2016/0624/PBBSPxhQsp0CzbP2iLMe2kofh3IQZP74.jpg')}}"
                                     alt="">
                                <div class="swiper-slide-caption">
                                    <div class="container text-sm-start">
                                        <div class="row">
                                            <div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7">
                                                <hr class="divider divider-primary divider-sm-left divider-bold">
                                                <h2 class="text-white mt-3 display-1 fw-normal">分开的旅行</h2>
                                                <h3 class="text-white mt-2 fs-lg fw-light">
                                                    《天堂电影院》那被放逐的梦！</h3>
                                                <a title="《天堂电影院》那被放逐的梦！"
                                                   href="https://www.qingningzi.com/p/mq8zNp6Vn6b"
                                                   class="offset-top-45 btn btn-primary">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <?php $sb = $articles->item(17); ?>
                        @if($sb)
                            <div class="swiper-slide">
                                <img class="swiper-slide-img"
                                     src="{{asset('uploadfile/2016/0624/diTRvUaksOju3EijkJPfZy1SqAaLf51I.jpg')}}"
                                     alt="">
                                <div class="swiper-slide-caption text-sm-start">
                                    <div class="container">
                                        <div class="row">
                                            <div class="offset-sm-2 col-sm-10 offset-md-2 col-md-10">
                                                <hr class="divider-sm-left divider divider-white divider-bold fadeInDown animated">
                                                <h2 class="text-white mt-3 display-1 fw-normal">爱过，始终</h2>
                                                <h3 class="text-white mt-2 fs-lg fw-light">
                                                    当你遇上你的挚爱时，时间会暂停</h3>
                                                <a title="当你遇上你的挚爱时，时间会暂停"
                                                   href="https://www.qingningzi.com/p/NeGVmXwVqL3"
                                                   class="offset-top-45 btn btn-primary fadeInUp animated">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <?php $sc = $articles->item(18); ?>
                        @if($sc)
                            <div class="swiper-slide">
                                <img class="swiper-slide-img"
                                     src="{{asset('uploadfile/2016/0624/xnSkKb1ZZCR4JUEWWqbwUmo3iOlpkYYl.jpg')}}"
                                     alt="">
                                <div class="swiper-slide-caption text-sm-start">
                                    <div class="container">
                                        <div class="row">
                                            <div class="offset-sm-6 col-sm-6 offset-lg-5 col-lg-8">
                                                <hr class="divider divider-white divider-sm-left divider-bold">
                                                <h2 class="text-white mt-2 fs-lg fw-normal">当你遇上你的挚爱时，...</h2>
                                                <a title="当你遇上你的挚爱时，时间会暂停"
                                                   href="https://www.qingningzi.com/p/NeGVmXwVqL3"
                                                   class="offset-top-45 btn btn-primary fadeInUp animated">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-6 col-md-12 d-block d-md-none">
                        <?php $ha = $articles->item(14); ?>
                        @if($ha)
                            <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                               data-bs-placement="bottom"
                               title="{{$ha->title}}"
                               href="{{url('p/'.$ha->title)}}">
                                <img alt="{{$ha->title}}" src="{{asset('uploadfile/2016/0624/woman_b.jpg')}}"
                                     height="336">
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <?php $hb = $articles->item(10); ?>
                        @if($hb)
                            <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                               data-bs-placement="bottom"
                               title="{{$hb->title}}"
                               href="{{url('p/'.$hb->shortcode)}}"
                               class="thumbnail-variant-4 d-block">
                                <img alt="{{$hb->title}}" src="{{asset('uploadfile/2016/0624/woman_a.jpg')}}"
                                     height="336" class="w-100">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="space-2-top text-center">
        <div class="container">
            <h3 class="fw-light">情感的森林</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div class="row offset-top-30">
                <div class="col-md-4 col-sm-6">
                    <div class="row">
                        <?php $tf = $articles->find(247); ?>
                        @if($tf)
                            <a data-bs-toggle="tooltip" data-bs-placement="top"
                               title="{{$tf->title}}" href="{{url('p/'.$tf->shortcode)}}"
                               class="thumbnail-variant-4 reveal-inline-block">
                                <img alt="{{$tf->title}}" src="{{asset('uploadfile/2016/0624/lover_a.jpg')}}"
                                     width="370"
                                     height="670" class="img-fluid"/>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-md-push-1">
                    <?php $ts = $articles->find(242); ?>
                    @if($ts)
                        <a data-bs-toggle="tooltip" data-bs-placement="left"
                           title="{{$ts->title}}" href="{{url('p/'.$ts->shortcode)}}"
                           class="thumbnail-variant-4 reveal-inline-block">
                            <img alt="{{$ts->title}}"
                                 src="{{asset('/uploadfile/2016/0624/lover_d.jpg')}}" width="370"
                                 height="670"
                                 class="img-fluid">
                        </a>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <?php $th = $articles->find(252); ?>
                            @if($th)
                                <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                   data-bs-placement="right"
                                   title="{{$th->title}}"
                                   href="{{url('p/'.$th->shortcode)}}"
                                   class="thumbnail-variant-4 reveal-inline-block inset-md-bottom-7-p">
                                    <img alt="{{$th->title}}"
                                         src="{{asset('uploadfile/2016/0624/lover_b.jpg')}}" width="370"
                                         height="320" class="img-fluid">
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-12 mt-4">
                            <?php $ts = $articles->find(2); ?>
                            @if($ts)
                                <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                   data-bs-placement="bottom"
                                   title="{{$ts->title}}"
                                   href="{{url('p/'.$ts->shortcode)}}"
                                   class="thumbnail-variant-4 reveal-inline-block">
                                    <img alt="{{$ts->title}}"
                                         src="{{asset('uploadfile/2016/0624/lover_c.jpg')}}" width="370"
                                         height="320" class="img-fluid">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3 class="fw-light">放空心灵去旅行</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div class="row offset-top-30">
                @foreach($articles->items(13,4) as $key=>$item)
                    <div class="col-md-3 col-xs-6 @if($key > 0) offset-xs-top-0 @endif">
                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{$item->title}}"
                           href="{{url('s/'.$item->shortcode)}}"
                           class="thumbnail-variant-1">
                            <img alt="{{$item->title}}"
                                 src="{{asset($item->thumb)}}"
                                 width="270" height="363" class="img-fluid">
                            <div class="caption">
                                <h5 class="caption-title">{{$item->category->title}}</h5>
                                <p class="caption-descr">
                                    {{$item->created_at->format('d, M, Y')}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3 class="fw-light">每周推荐视频</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div class="row offset-top-30">
                <div data-mouse-drag="false" data-autoplay="true" data-md-items="3" data-sm-items="3" data-xs-items="2"
                     data-margin="30" data-nav="true" class="owl-carousel">
                    @foreach($articles->items(13,6) as $item)
                        <div class="product reveal-inline-block" style="width:100%;overflow: hidden;">
                            <div class="product-media">
                                <a href="{{url('s/'.$item->shortcode)}}">
                                    <img alt="{{$item->title}}" src="{{asset($item->thumb)}}"
                                         class="img-fluid">
                                </a>
                                <div class="product-overlay">
                                    <a title="{{$item->title}}"
                                       href="{{url('s/'.$item->shortcode)}}"
                                       class="icon icon-circle icon-base mdi mdi-magnify"></a>
                                </div>
                                <div class="product-overlay-variant-2">
                                    <a href="{{url('category/'.$item->category_id)}}" class="badge bg-secondary"
                                       rel="nofollow">
                                        {{$item->category->title}}
                                    </a>
                                </div>
                            </div>
                            <div class="product-price text-bold text-truncate">
                                <a href="{{url('s/'.$item->shortcode)}}" class="text-primary text-truncate"
                                   title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </div>
                            <div class="product-rating">
                                <div class="text-primary">
                                    @if($item->rate)
                                        <span class='fst-italic'>Hot：</span>
                                        <span class="text-primary">
                                       {!! $articles->rates($item->shortcode,$item->rate) !!}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-actions elements-group-10">
                                <a href='javascript:;' data-bs-toggle="tooltip" data-bs-placement="right"
                                   title="好评：{{$item->views_count}}"
                                   class="icon mdi mdi-heart-outline icon-gray icon-sm">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div
                style="background-image: url('{{asset("uploadfile/2016/0717/20160717115428278.jpg")}}'); background-repeat: no-repeat; background-size: cover;"
                class="container well-variant-1">
            <h3 class="text-white">关于爱情</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <?php $l = $articles->item(16) ?>
            <div class="text-regular text-uppercase text-white">
                有些人的爱，像风，看不到，却感受的到 - <a href="{{url('p/'.$l->shortcode)}}">{{$l->title}}</a>
            </div>
            <p class="mt-1 text-white fs-sm">
                等待太久得来的东西，多半已经不是当初自己想要的样子了。世上最珍贵的不是永远得不到或已经得到的，而是你已经得到并且随时都有可能失去的东西！</p>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3>失去爱寻找爱</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div data-mouse-drag="false" data-autoplay="true" data-md-items="3" data-sm-items="2" data-xs-items="2"
                 data-margin="30" data-dots="true" data-nav="true"
                 class="owl-mobile-dots owl-nav-md owl-nav-position-top owl-carousel">
                @foreach($articles->items(15, 10) as $item)
                    <div class="blog-post blog-post-grid">
                        <div class="blog-post-media">
                            <a href="{{url('p/'.$item->shortcode)}}" title="{{$item->title}}">
                                <img width="1170" height="854" alt="{{$item->title}}"
                                     src="{{$item->thumb}}" class="img-fluid">
                                <div class="blog-post-caption">
                                    <div class="blog-post-meta-date">
                                    <span class='blog-post-meta-date-big reveal-block'>
                                        {{$item->created_at->format('d')}}
                                    </span>
                                        <span>{{$item->created_at->format('M')}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="blog-post-meta">
                            <h5 class="blog-post-meta-title blog-post-limit-title">
                                <a href="{{url('p/'.$item->shortcode)}}" class="text-base"
                                   title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </h5>
                            <p>Category by <a href="{{url('categories/'.$item->category_id)}}" rel="nofollow">
                                    {{$item->category->title}}
                                </a> &#8226;
                                <a href='javascript:;' data-bs-toggle="tooltip" data-bs-placement="right"
                                   title="好评：{{$item->views_count}}"
                                   class="icon mdi mdi-heart-outline icon-gray icon-sm text-primary"></a>
                            </p>
                        </div>
                        <p class="fs-sm text-muted">{{Str::limit($item->description,84)}}</p>
                        <div>
                            <a href="{{url('p/'.$item->shortcode)}}" class="btn btn-link" rel="nofollow">
                                <span class="btn-text">阅读更多</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h3 class="text-center fw-light">
                人物志
            </h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div class="bg-primary space-2--md text-center">
                <div data-mouse-drag="false" data-items="1" data-drag="false" data-nav="true" data-dots="false"
                     class="owl-nav-center owl-mobile-dots owl-nav-md owl-carousel">
                    @foreach($idols->items(3) as $item)
                        <blockquote class="quote quote-variant-1">
                            <img alt="{{$item->username}}" src="{{asset($item->profile_url)}}" class="rounded-circle">
                            <h4 class="space-1-top text-light">
                                <q>&#34;{{$item->description}}&#34;</q>
                            </h4>
                            <p>
                                <cite class="text-white">&#8212;
                                    <a href="{{$item->shortcode}}" title="{{$item->title}}"
                                       class="text-white">{{$item->username}}</a>
                                </cite>
                            </p>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3>爱情，惹的祸</h3>
            <hr class="divider divider-base divider-bold mx-auto">
            <div class="row offset-top-30">
                @foreach($articles->items(25,4) as $item)
                    <div class="col-md-3 col-xs-6">
                        <a href="{{url('p/'.$item->shortcode)}}" title="{{$item->title}}" class="animate__link">
                            <img alt="{{$item->title}}" src="{{$item->thumb}}"
                                 class="img-fluid animate__animated">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-2--md">
        <div class="container">
            <div class="row fs-sm">
                <div class="col-md-4 col-sm-6">
                    <h3 class="text-center text-sm-start">眼见为实</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <ul class="list-marked">
                        @foreach($articles->items(13,10) as $item)
                            <li class="text-truncate">
                                <a href="{{url('s/'.$item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-sm-start">视觉的体验</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <ul class="list-ordered list-unstyled">
                        @foreach($articles->items(29,10) as $item)
                            <li class="text-truncate">
                                <a href="{{url('p/'.$item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-sm-start">有书的世界</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @foreach($articles->items(30,7) as $key=>$item)
                                @if($key==0)
                                    <div class="unit unit-horizontal unit-spacing-21 mb-2">
                                        <div class="unit-left">
                                            <a href="{{url('p/'.$item->shortcode)}}"
                                               title="{{$item->title}}">
                                                <img alt="{{$item->title}}" width="168px" src="{{asset($item->thumb)}}">
                                            </a>
                                        </div>
                                        <div class="unit-body">
                                            <a href="{{url('p/'.$item->shortcode)}}"
                                               title="{{$item->title}}">
                                                {{$item->title}}
                                            </a>
                                            <p class="offset-top-10">[ {{$item->category->title}} ]</p>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-truncate mb-2">
                                        <a href="{{url('p/'.$item->shortcode)}}"
                                           title="{{$item->title}}">
                                            {{$item->title}}
                                        </a>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="d-none d-sm-block space-2-bottom">
        <div class="container mx-auto text-center">
            <div class="row page-subscribe py-5">
                <h4 class="fw-normal">爱情，是否如你臆想的一样？</h4>
                <p class="text-muted fs-sm">我们会将最新资讯直接发送到您指定的收件箱！</p>
                <form autocomplete="off">
                    <div class="input-group">
                        <label for="email" class="sr-only"></label>
                        <input type="text" id="email" name="email" placeholder="请输入您的邮箱地址..."
                               class="form-control"/>
                        @csrf
                        <button type="submit" class="btn btn-primary ms-1">邮件订阅</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
