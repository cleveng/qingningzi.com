@extends('layouts.default')
@section('content')
    @inject('articles', 'App\Services\ArticlesService')
    @inject('idols', 'App\Services\IdolsService')
    <div class="shell">
        <div class="range">
            <div class="cell-md-8">
                <section data-slide-effect="fade" data-min-height="430px" class="swiper-container swiper-slider">
                    <div class="swiper-wrapper">
                        <?php $sa = $articles->item(12); ?>
                        @if($sa)
                            <div data-slide-bg="{{asset('uploadfile/2016/0624/PBBSPxhQsp0CzbP2iLMe2kofh3IQZP74.jpg')}}"
                                 class="slide-mobile-overlay swiper-slide">
                                <div class="swiper-slide-caption">
                                    <div class="container text-sm-left">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-7">
                                                <hr data-caption-animate="fadeInLeft"
                                                    class="divider divider-primary divider-sm-left divider-bold">
                                                <h2 class="text-white offset-top-30" data-caption-delay="100"
                                                    data-caption-animate="fadeInUp"
                                                >分开的旅行</h2>
                                                <h3 class="text-white" data-caption-delay="600"
                                                    data-caption-animate="fadeInUp"
                                                    title="{{$sa->title}}">{{Str::limit($sa->title,36)}}</h3>
                                                <a title="{{$sa->title}}"
                                                   href="{{url('p/'.$sa->shortcode)}}"
                                                   data-caption-delay="900"
                                                   data-caption-animate="fadeInUp"
                                                   class="offset-top-45 btn btn-primary">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <?php $sb = $articles->item(17); ?>
                        @if($sb)
                            <div data-slide-bg="{{asset('uploadfile/2016/0624/diTRvUaksOju3EijkJPfZy1SqAaLf51I.jpg')}}"
                                 class="bg-position-left bg-position-center slide-mobile-overlay swiper-slide">
                                <div class="swiper-slide-caption text-sm-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                                                <hr data-caption-animate="fadeInDown"
                                                    class="divider-sm-left divider divider-white divider-bold">
                                                <h2 class="text-white offset-top-30" data-caption-delay="300"
                                                    data-caption-animate="fadeInUp">
                                                    爱过，始终</h2>
                                                <h3 class="text-white" title="{{$sb->title}}"
                                                    data-caption-delay="300"
                                                    data-caption-animate="fadeInUp">{{$sb->title}}</h3>
                                                <a title="{{$sb->title}}"
                                                   href="{{url('p/'.$sb->shortcode)}}"
                                                   data-caption-delay="600" data-caption-animate="fadeInUp"
                                                   class="offset-top-45 btn btn-primary">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <?php $sc = $articles->item(18); ?>
                        @if($sc)
                            <div data-slide-bg="{{asset('uploadfile/2016/0624/xnSkKb1ZZCR4JUEWWqbwUmo3iOlpkYYl.jpg')}}"
                                 class="bg-position-center-sm slide-mobile-overlay swiper-slide">
                                <div class="swiper-slide-caption text-sm-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-offset-6 col-sm-6 col-lg-offset-5 col-lg-8">
                                                <hr data-caption-animate="fadeInLeft"
                                                    class="divider divider-white divider-sm-left divider-bold">
                                                <h2 class="text-white" data-caption-delay="100"
                                                    data-caption-animate="fadeInUp"
                                                    title="{{$sb->title}}">{{Str::limit($sb->title,20)}}</h2>
                                                <a data-caption-delay="600" data-caption-animate="fadeInUp"
                                                   title="{{$sb->title}}"
                                                   href="{{url('p/'.$sb->shortcode)}}"
                                                   class="offset-top-45 btn btn-primary">马上围观!</a>
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
                </section>
            </div>
            <div class="cell-md-4">
                <div class="range">
                    <div class="cell-sm-6 cell-md-12 visible-xs visible-sm">
                        <?php $ha = $articles->item(14); ?>
                        @if($ha)
                            <a data-toggle="tooltip" data-trigger="hover" data-container="body"
                               data-placement="bottom"
                               title="{{$ha->title}}"
                               href="{{url('p/'.$ha->title)}}"
                               class="thumbnail-variant-4 reveal-inline-block inset-md-bottom-7-p">
                                <img alt="{{$ha->title}}" src="{{asset('uploadfile/2016/0624/woman_b.jpg')}}"
                                     class="img-responsive"
                                     height="320" width="370">
                            </a>
                        @endif
                    </div>
                    <div class="cell-sm-6 cell-md-12">
                        <?php $hb = $articles->item(10); ?>
                        @if($hb)
                            <a data-toggle="tooltip" data-trigger="hover" data-container="body"
                               data-placement="bottom"
                               title="{{$hb->title}}"
                               href="{{url('p/'.$hb->shortcode)}}"
                               class="thumbnail-variant-4 reveal-inline-block inset-md-bottom-7-p">
                                <img alt="{{$hb->title}}" src="{{asset('uploadfile/2016/0624/woman_a.jpg')}}"
                                     class="img-responsive"
                                     height="320" width="370">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-top-45">
        <div class="shell">
            <h3>情感的森林</h3>
            <hr class="divider divider-base divider-bold">
            <div class="range offset-top-30">
                <div class="cell-md-4 cell-sm-6">
                    <?php $tf = $articles->find(247); ?>
                    @if($tf)
                        <a data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="top"
                           title="{{$tf->title}}" href="{{url('p/'.$tf->shortcode)}}"
                           class="thumbnail-variant-4 reveal-inline-block">
                            <img alt="{{$tf->title}}" data-original="{{asset('uploadfile/2016/0624/lover_a.jpg')}}"
                                 width="370"
                                 height="670" class="img-responsive"/>
                        </a>
                    @endif
                </div>
                <div class="cell-md-4 cell-sm-6 cell-md-push-1">
                    <?php $ts = $articles->find(242); ?>
                    @if($ts)
                        <a data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="left"
                           title="{{$ts->title}}" href="{{url('p/'.$ts->shortcode)}}"
                           class="thumbnail-variant-4 reveal-inline-block">
                            <img alt="{{$ts->title}}"
                                 data-original="{{asset('/uploadfile/2016/0624/lover_d.jpg')}}" width="370"
                                 height="670"
                                 class="img-responsive">
                        </a>
                    @endif
                </div>
                <div class="cell-md-4">
                    <div class="range">
                        <div class="cell-sm-6 cell-md-12">
                            <?php $th = $articles->find(252); ?>
                            @if($th)
                                <a data-toggle="tooltip" data-trigger="hover" data-container="body"
                                   data-placement="right"
                                   title="{{$th->title}}"
                                   href="{{url('p/'.$th->shortcode)}}"
                                   class="thumbnail-variant-4 reveal-inline-block inset-md-bottom-7-p">
                                    <img alt="{{$th->title}}"
                                         data-original="{{asset('uploadfile/2016/0624/lover_b.jpg')}}" width="370"
                                         height="320" class="img-responsive">
                                </a>
                            @endif
                        </div>
                        <div class="cell-sm-6 cell-md-12 offset-top-30 offset-sm-top-0">
                            <?php $ts = $articles->find(2); ?>
                            @if($ts)
                                <a data-toggle="tooltip" data-trigger="hover" data-container="body"
                                   data-placement="bottom"
                                   title="{{$ts->title}}"
                                   href="{{url('p/'.$ts->shortcode)}}"
                                   class="thumbnail-variant-4 reveal-inline-block">
                                    <img alt="{{$ts->title}}"
                                         data-original="{{asset('uploadfile/2016/0624/lover_c.jpg')}}" width="370"
                                         height="320" class="img-responsive">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-top-60">
        <div class="shell">
            <h3>放空心灵去旅行</h3>
            <hr class="divider divider-base divider-bold">
            <div class="range offset-top-30">
                @foreach($articles->items(13,4) as $key=>$item)
                    <div class="cell-md-3 cell-xs-6 @if($key > 0) offset-xs-top-0 @endif">
                        <a data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                           href="{{url('s/'.$item->shortcode)}}"
                           class="thumbnail-variant-1" title="{{$item->title}}">
                            <img alt="{{$item->title}}"
                                 data-original="{{asset($item->thumb)}}"
                                 width="270" height="363" class="img-responsive">
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

    <section class="section-top-60">
        <div class="shell">
            <h3>每周推荐视频</h3>
            <hr class="divider divider-base divider-bold">
            <div data-mouse-drag="false" data-autoplay="true" data-md-items="3" data-sm-items="3" data-xs-items="2"
                 data-margin="30" data-nav="true" class="owl-carousel offset-top-30">
                @foreach($articles->items(13,6) as $item)
                    <div class="product reveal-inline-block" style="width:100%;overflow: hidden;">
                        <div class="product-media">
                            <a href="{{url('s/'.$item->shortcode)}}">
                                <img alt="{{$item->title}}" data-original="{{asset($item->thumb)}}"
                                     class="img-responsive">
                            </a>
                            <div class="product-overlay">
                                <a title="{{$item->title}}"
                                   href="{{url('s/'.$item->shortcode)}}"
                                   class="icon icon-circle icon-base mdi mdi-magnify"></a>
                            </div>
                            <div class="product-overlay-variant-2">
                                <a href="{{url('category/'.$item->category_id)}}" class="label label-default"
                                   rel="nofollow">
                                    {{$item->category->title}}
                                </a>
                            </div>
                        </div>
                        <div class="product-price text-bold text-limit offset-top-10">
                            <a href="{{url('s/'.$item->shortcode)}}" class="text-primary text-limit"
                               title="{{$item->title}}">
                                {{$item->title}}
                            </a>
                        </div>
                        <div class="product-rating">
                            <div class="text-primary">
                                @if($item->rate)
                                    <span class='text-italic'>Hot：</span>
                                    <span class="text-primary">
                                       {!! $articles->rates($item->shortcode,$item->rate) !!}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="product-actions elements-group-10">
                            <a href='javascript:;' data-toggle="tooltip" data-placement="right"
                               title="好评：{{$item->views_count}}"
                               class="icon mdi mdi-heart-outline icon-gray icon-sm">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="offset-top-45">
        <div
            style="background-image: url('{{asset("uploadfile/2016/0717/20160717115428278.jpg")}}'); background-repeat: no-repeat; background-size: cover;"
            class="shell well-variant-1">
            <h3 class="text-white">关于爱情</h3>
            <hr class="divider divider-base divider-bold">
            <?php $l = $articles->item(16) ?>
            <div class="text-regular text-uppercase text-white">
                有些人的爱，像风，看不到，却感受的到 - <a href="{{url('p/'.$l->shortcode)}}">{{$l->title}}</a>
            </div>
            <p class="offset-top-20 text-white">
                等待太久得来的东西，多半已经不是当初自己想要的样子了。世上最珍贵的不是永远得不到或已经得到的，而是你已经得到并且随时都有可能失去的东西！</p>
        </div>
    </section>

    <section class="section-top-60">
        <div class="shell">
            <h3>失去爱寻找爱</h3>
            <hr class="divider divider-base divider-bold">
            <div data-mouse-drag="false" data-autoplay="true" data-md-items="3" data-sm-items="2" data-xs-items="2"
                 data-margin="30" data-dots="true" data-nav="true"
                 class="owl-mobile-dots owl-nav-md owl-nav-position-top owl-carousel offset-top-30">
                @foreach($articles->items(15, 10) as $item)
                    <div class="blog-post blog-post-grid">
                        <div class="blog-post-media">
                            <a href="{{url('p/'.$item->shortcode)}}" title="{{$item->title}}">
                                <img width="1170" height="854" alt="{{$item->title}}"
                                     data-original="{{$item->thumb}}" class="img-responsive">
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
                                <a href='javascript:;' data-toggle="tooltip" data-placement="right"
                                   title="好评：{{$item->views_count}}"
                                   class="icon mdi mdi-heart-outline icon-gray icon-sm text-primary"></a>
                            </p>
                        </div>
                        <p class="desc">{{Str::limit($item->description,84)}}</p>
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

    <section class="offset-top-30 offset-md-top-0">
        <div class="shell">
            <h3>
                人物志
            </h3>
            <hr class="divider divider-base divider-bold">
            <div class="bg-primary section-60">
                <div data-mouse-drag="false" data-items="1" data-drag="false" data-nav="true" data-dots="true"
                     class="owl-nav-center owl-mobile-dots owl-nav-md owl-carousel">
                    @foreach($idols->items(3) as $item)
                        <blockquote class="quote quote-variant-1">
                            <img alt="{{$item->username}}" src="{{asset($item->profile_url)}}" width="97" height="97"
                                 class="img-circle">
                            <h4 class="offset-top-20">
                                <q>&#34;{{$item->description}}&#34;</q>
                            </h4>
                            <p>
                                <cite class="text-normal">&#8212;
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

    <section class="section-top-60">
        <div class="shell">
            <h3>爱情，惹的祸</h3>
            <hr class="divider divider-base divider-bold">
            <div class="range offset-top-30">
                @foreach($articles->items(25,4) as $item)
                    <div class="cell-md-3 cell-xs-6">
                        <a href="{{url('p/'.$item->shortcode)}}"
                           class="post-img" title="{{$item->title}}">
                            <img alt="{{$item->title}}" data-original="{{$item->thumb}}"
                                 class="img-responsive animate__animated">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-60">
        <div class="shell text-left">
            <div class="range">
                <div class="cell-md-4 cell-sm-6">
                    <h3 class="text-center text-sm-left">眼见为实</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <ul class="list-marked offset-top-20">
                        @foreach($articles->items(13,10) as $item)
                            <li class="text-limit">
                                <a href="{{url('s/'.$item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="cell-md-4 cell-sm-6 offset-top-45 offset-md-top-0 offset-sm-top-0">
                    <h3 class="text-center text-sm-left">视觉的体验</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <ul class="list-ordered list-unstyled offset-top-20">
                        @foreach($articles->items(29,10) as $item)
                            <li class="text-limit">
                                <a href="{{url('p/'.$item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="cell-md-4 offset-top-45 offset-md-top-0">
                    <h3 class="text-center text-sm-left">有书的世界</h3>
                    <hr class="divider divider-sm-left divider-base divider-bold">
                    <div class="range offset-top-20">
                        <div class="cell-md-12 cell-sm-12">
                            @foreach($articles->items(30,7) as $key=>$item)
                                @if($key==0)
                                    <div class="unit unit-horizontal unit-spacing-21">
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
                                    <p class="text-limit offset-top-10">
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

    <section class="section-bottom-60 hidden-xs hidden-sm">
        <div class="shell">
            <div class="well">
                <h4>爱情，是否如你臆想的一样？</h4>
                <p class="offset-top-10">我们<b class="text-danger">不</b>会将最新资讯直接发送到您指定的收件箱！</p>
                <form autocomplete="off" id="rssmail"
                      class="offset-top-10 form-inline-flex reveal-xs-flex rd-mailform">
                    <div class="form-group">
                        <input disabled type="text" name="email" placeholder="请输入您的邮箱地址..."
                               class="form-control">
                    </div>
                    <botton disabled data-token="{{csrf_token()}}" type="reset"
                            class="btn btn-primary offset-top-0">邮件订阅
                    </botton>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>
@endsection
