@extends('layouts.default')
@section('content')
    @inject('articles', 'App\Services\ArticlesService')
    @inject('idols', 'App\Services\IdolsService')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="tns-carousel">
                    <div class="tns-carousel-inner"
                         data-carousel-options="{&quot;items&quot;: 1, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;700&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 20},&quot;991&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 30}}}">
                       @php
                           $sa = $articles->item(12);
                       @endphp
                        @if($sa)
                            <div class="tns-carousel-slide">
                                <img src="{{env('ASSET_URL')}}/images/PBBSPxhQsp0CzbP2iLMe2kofh3IQZP74.jpg"
                                     class="w-100"
                                     alt="{{$sa->title}}">
                                <div class="tns-carousel-caption">
                                    <div class="container text-sm-start">
                                        <div class="row">
                                            <div class="col-sm-6 offset-3 col-md-5 offset-md-5">
                                                <h2 class="text-white mt-3 fs-xl">分开的旅行</h2>
                                                <h3 class="text-white mt-2 fs-lg">{{$sa->title}}</h3>
                                                <a title="{{$sa->title}}"
                                                   href="{{url($sa->shortcode)}}"
                                                   class="btn btn-primary rounded-0">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php
                            $sb = $articles->item(17);
                        @endphp
                        @if($sb)
                            <div class="tns-carousel-slide">
                                <img src="{{env('ASSET_URL')}}/images/diTRvUaksOju3EijkJPfZy1SqAaLf51I.jpg"
                                     class="w-100"
                                     alt="{{$sb->title}}">
                                <div class="tns-carousel-caption">
                                    <div class="container">
                                        <div class="row">
                                            <div class="offset-sm-2 col-sm-10 offset-md-2 col-md-10 text-start">
                                                <h2 class="text-white mt-3 fs-xl">爱过，始终</h2>
                                                <h3 class="text-white mt-2 fs-lg">{{$sb->title}}</h3>
                                                <a title="{{$sb->title}}"
                                                   href="{{url($sb->shortcode)}}"
                                                   class="btn btn-primary rounded-0">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php
                            $sc = $articles->item(18);
                        @endphp
                        @if($sc)
                            <div class="tns-carousel-slide">
                                <img src="{{env('ASSET_URL')}}/images/xnSkKb1ZZCR4JUEWWqbwUmo3iOlpkYYl.jpg"
                                     class="w-100"
                                     alt="{{$sc->title}}">
                                <div class="tns-carousel-caption">
                                    <div class="container">
                                        <div class="row">
                                            <div class="offset-sm-6 col-sm-6 offset-lg-4 col-lg-8">
                                                <h2 class="text-white mt-2 fs-lg text-truncate">{{$sc->title}}</h2>
                                                <a title="{{$sc->title}}"
                                                   href="{{url($sc->shortcode)}}"
                                                   class="btn btn-primary rounded-0">马上围观!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-6 col-md-12 d-block d-md-none mt-3 mt-md-0">
                        @php
                            $ha = $articles->item(14);
                        @endphp
                        @if($ha)
                            <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                               data-bs-placement="bottom"
                               title="{{$ha->title}}"
                               href="{{url($ha->shortcode)}}">
                                <img alt="{{$ha->title}}" src="{{env('ASSET_URL')}}/images/woman_b.jpg"
                                     class="img-fluid">
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-12 mt-3 mt-md-0">
                        @php
                            $hb = $articles->item(10);
                        @endphp
                        @if($hb)
                            <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                               data-bs-placement="bottom"
                               title="{{$hb->title}}"
                               href="{{url($hb->shortcode)}}"
                               class="thumbnail-variant-4 d-block">
                                <img alt="{{$hb->title}}" src="{{env('ASSET_URL')}}/images/woman_a.jpg"
                                     height="336" class="w-100">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="space-2-top container text-center">
        <div>
            <h3>情感的森林</h3>
            <div class="row mt-4">
                <div class="col-md-4 col-sm-6 flex-fill">
                    @php
                        $jc = $articles->find(247);
                    @endphp
                    @if($jc)
                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                           title="{{$jc->title}}" href="{{url($jc->shortcode)}}"
                           class="d-block">
                            <img alt="{{$jc->title}}" src="{{env('ASSET_URL')}}/images/lover_a.jpg"
                                 class="img-fluid w-100"/>
                        </a>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6 col-md-push-1 flex-fill mt-3 mt-md-0">
                    @php
                        $jx = $articles->find(242);
                    @endphp
                    @if($jx)
                        <a data-bs-toggle="tooltip" data-bs-placement="left"
                           title="{{$jx->title}}" href="{{url($jx->shortcode)}}"
                           class="d-block">
                            <img alt="{{$jx->title}}" src="{{env('ASSET_URL')}}/images/lover_d.jpg"
                                 class="img-fluid w-100">
                        </a>
                    @endif
                </div>
                <div class="col-md-4 flex-fill mt-3 mt-md-0">
                    <div class="row h-100 flex-column">
                        <div class="col-sm-6 col-md-12">
                            @php
                                $jq = $articles->find(252);
                            @endphp
                            @if($jq)
                                <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                   data-bs-placement="right"
                                   title="{{$jq->title}}"
                                   href="{{url($jq->shortcode)}}"
                                   class="d-block">
                                    <img alt="{{$jq->title}}"
                                         src="{{env('ASSET_URL')}}/images/lover_b.jpg" class="img-fluid w-100">
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-12 mt-3 mt-md-auto">
                            @php
                                $ju = $articles->find(2);
                            @endphp
                            @if($ju)
                                <a data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                   data-bs-placement="bottom"
                                   title="{{$ju->title}}"
                                   href="{{url($ju->shortcode)}}"
                                   class="d-block">
                                    <img alt="{{$ju->title}}"
                                         src="{{env('ASSET_URL')}}/images/lover_c.jpg" class="img-fluid w-100">
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
            <h3>放空心灵去旅行</h3>
            <div class="row mt-0 mt-md-4">
                @foreach($articles->items(13,4) as $key=>$item)
                    @php
                        $thumb = $item->thumb ? url($item->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key;
                    @endphp
                    <div class="col-md-3 col-sm-12 col-xs-12 @if($key > 0) mt-2 mt-md-0 @endif">
                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="{{$item->title}}"
                           href="{{url($item->shortcode)}}"
                           class="card">
                            <img alt="{{$item->title}}" src="{{ $thumb }}" class="img-fluid">
                            <div
                                class="position-absolute top-0 start-0 end-0 d-flex justify-content-between align-items-center">
                                <div class="badge bg-primary rounded-0">{{$item->category->title}}</div>
                                <div
                                    class="badge bg-dark opacity-50 rounded-0">{{$item->created_at->format('d, M')}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3>每周推荐视频</h3>
            <div class="row mt-0 mt-md-4">
                <div class="tns-carousel tns-controls-static">
                    <div class="tns-carousel-inner"
                         data-carousel-options='{"items": 3, "nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"gutter": 24}}}'>
                        @foreach($articles->items(13,6) as $key=>$item)
                            @php
                                $thumb = $item->thumb ? url($item->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key;
                            @endphp
                            <div class="card product-card-alt">
                                <div class="product-thumb">
                                    <a href="{{url('category/'.$item->category_id)}}"
                                       class="badge bg-secondary rounded-0" rel="nofollow">
                                        {{$item->category->title}}
                                    </a>
                                    <a class="product-thumb-overlay" href="{{url($item->shortcode)}}"
                                       title="{{$item->title}}"></a>
                                    <img src="{{ $thumb }}" alt="{{$item->title}}">
                                </div>
                                <div class="card-body mt-n2">
                                    <div class="d-flex flex-wrap justify-content-between align-items-start pb-1 fs-sm">
                                        @if ($item->platform)
                                            <div>
                                                <span class='fst-italic'>Posted by：</span>
                                                <span>{{ $item->platform->name }}</span>
                                            </div>
                                        @endif
                                        <div>
                                            @if($item->rate)
                                                <span class='fst-italic'>Hot：</span>
                                                <div class="text-primary d-inline-block">
                                                    {!! $articles->rates($item->shortcode,$item->rate) !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 class="product-title fs-md mb-0 text-truncate text-start">
                                        <a href="{{url($item->shortcode)}}">{{$item->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top container text-center">
        <div class="card product-card-alt">
            <div class="product-thumb">
                <img src="{{env('ASSET_URL')}}/images/20160717115428278.jpg" alt="关于爱情"
                     style="object-fit: cover; max-height: 540px;">
                <a class="product-thumb-overlay opacity-100"></a>
            </div>
            <div
                class="position-absolute top-0 start-0 end-0 bottom-0 d-flex justify-content-between align-items-center zindex-5">
                <div class="mx-auto text-center text-white" style="max-width: 42rem;">
                    <h3 class="text-white">关于爱情</h3>
                    @php
                        $l = $articles->item(16);
                    @endphp
                    <div class="text-regular text-uppercase">
                        有些人的爱，像风，看不到，却感受的到 - <a href="{{url($l->shortcode)}}">{{$l->title}}</a>
                    </div>
                    <p class="mt-1 fs-sm d-none d-md-block">
                        等待太久得来的东西，多半已经不是当初自己想要的样子了。世上最珍贵的不是永远得不到或已经得到的，而是你已经得到并且随时都有可能失去的东西！</p>
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top text-center">
        <div class="container">
            <h3>失去爱寻找爱</h3>
            <div class="tns-carousel mt-0 mt-md-4">
                <div class="tns-carousel-inner"
                     data-carousel-options="{&quot;items&quot;: 2, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;700&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20},&quot;991&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
                    @foreach($articles->items(15, 10) as $key=>$item)
                        @php
                            $thumb = $item->thumb ? url($item->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key;
                        @endphp
                        <article>
                            <a class="blog-entry-thumb mb-1" href="{{url($item->shortcode)}}">
                                <img src="{{ $thumb }}" alt="{{$item->title}}">
                            </a>
                            <h2 class="h6 blog-entry-title mb-0 text-truncate">
                                <a class="fs-sm" href="{{url($item->shortcode)}}">{{$item->title}}</a>
                            </h2>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="container space-2-top">
        <h3 class="text-center">
            人物志
        </h3>
        <div class="bg-primary pt-4 py-md-4 text-center">
            <div class="tns-carousel">
                <div class="tns-carousel-inner" data-carousel-options='{"nav": false}'>
                    @foreach($idols->items(3) as $item)
                        <article>
                            <img alt="{{$item->username}}" src="{{url($item->profile_url)}}" class="rounded-circle">
                            <h4 class="fs-base text-white mt-4 mx-auto" style="max-width: 32rem;">
                                {{$item->description}}
                            </h4>
                            <p class="mb-0">
                                <cite class="text-white">&#8212;
                                    <a href="{{$item->shortcode}}" title="{{$item->title}}"
                                       class="text-white">{{$item->username}}</a>
                                </cite>
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top container">
        <div>
            <h2 class="h3 text-center">爱情，惹的祸</h2>
            <div class="mt-0 mt-md-4">
                <div class="tns-carousel">
                    <div class="tns-carousel-inner"
                         data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;992&quot;:{&quot;items&quot;:4}}}">
                        @foreach($articles->items(25,8) as $key=>$item)
                            @php
                                $thumb = $item->thumb ? url($item->thumb) : "https://source.unsplash.com/featured/720x368?t=" . $key;
                            @endphp
                            <article class="mb-4">
                                <div class="card product-card">
                                    <a class="btn-wishlist btn-sm" href="{{url($item->shortcode)}}"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="left" aria-label="{{$item->title}}"
                                       data-bs-original-title="{{$item->title}}">
                                        <i class="ci-link"></i>
                                    </a>
                                    <a class="card-img-top d-block overflow-hidden" href="{{url($item->shortcode)}}">
                                        <img alt="{{$item->title}}" data-src="{{ $thumb }}" class="lazy">
                                    </a>
                                    <div class="card-body py-2">
                                        @if($item->category)
                                            <a class="product-meta d-block fs-xs pb-1" href="{{url($item->shortcode)}}">
                                                [ {{$item->category->title}} ]
                                            </a>
                                        @endif
                                        <h3 class="product-title fs-sm text-truncate">
                                            <a href="{{url($item->shortcode)}}">{{$item->title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-2-top container">
        <div>
            <div class="row fs-sm">
                <div class="col-md-4 col-sm-6">
                    <h3 class="text-center text-sm-start">眼见为实</h3>
                    <ul class="list-marked list-unstyled">
                        @foreach($articles->items(13,10) as $item)
                            <li class="text-truncate">
                                <a href="{{url($item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-sm-start">视觉的体验</h3>
                    <ul class="list-ordered list-unstyled">
                        @foreach($articles->items(29,10) as $item)
                            <li class="text-truncate">
                                <a href="{{url($item->shortcode)}}" title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-sm-start">有书的世界</h3>
                    <ul class="list-marked list-unstyled">
                        @foreach($articles->items(30,10) as $key=>$item)
                            <li class="text-truncate mb-2">
                                <a href="{{url($item->shortcode)}}"
                                   title="{{$item->title}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mail subscription-->
    <section class="container space-2-top pb-5 d-none d-md-block">
        <div class="card bg-secondary border-secondary py-5 ">
            <div class="card-body py-md-4 py-3 px-4 text-center">
                <h3 class="mb-3">爱情，是否如你臆想的一样？</h3>
                <p class="mb-4 pb-2">我们会将最新资讯直接发送到您指定的收件箱！</p>
                <div class="widget mx-auto" style="max-width: 500px;" x-data="subscribe">
                    <form id="subscribeForm" autocomplete="off" method="post" action="{{url('subscribe')}}">
                        @csrf
                        <div class="input-group flex-nowrap">
                            <label for="email" class="sr-only"></label>
                            <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                            <input
                                x-bind:class="{ 'is-invalid': error, 'is-valid': success }"
                                class="form-control rounded-start"
                                type="email" readonly name="email" id="email" required placeholder="请输入您的邮箱地址...." x-model="email">
                            <button class="btn btn-primary" type="button" @click="onSubmit">邮件订阅*</button>
                        </div>
                        <div class="invalid-feedback text-start d-block" x-show="error" x-text="error"></div>
                        <div class="valid-feedback text-start d-block" x-show="success" x-text="success"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function subscribe() {
            return {
                email:'',
                success: '',
                error: '',
                async onSubmit() {
                    const form = document.querySelector('#subscribeForm')
                    const formData = new FormData(form)
                    try {
                        const { data: { message } } = await axios.post('/subscribe', formData)
                        this.success = message
                    } catch (e) {
                        const { message } = e.response.data
                        this.error = message
                    }
                }
            }
        }
    </script>
@endsection
