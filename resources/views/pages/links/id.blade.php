@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li><a href="{{url('links?t='.$data->link_type)}}" rel="nofollow">友情链接</a></li>
        <li class="active">{{$data->name}}</li>
    @endsection
    <div class="container space-2-bottom--lg">
        <div class="row mx-auto text-center">
            <div class="col-md-12 col-lg-8">
                <h1 class="offset-top-45 text-truncate">{{$data->name}}</h1>
                <h2 class="offset-top-0 text-truncate">{{$data->url}}</h2>
                <p><span class="badge badge-primary">8</span> 秒后跳转</p>
                <script type="application/javascript">
                    //                    +jQuery(function () {
                    //                        "use strict";
                    //                        jshref(8,"{{url('/')}}");
                    //                    });
                    //                    function jshref(secs,surl) {
                    //                        var jumpTo = jQuery("span.badge-primary");
                    //                        jumpTo.text(secs);
                    //                        if(--secs>0){
                    //                            setTimeout("jshref("+secs+",'"+surl+"')",1000);
                    //                        }
                    //                        else{
                    //                            location.href=surl;
                    //                        }
                    //                    }
                </script>
                <a rel="nofollow" href="{{url('/')}}" class="offset-top-30 btn btn-primary">返回首页</a>
                <hr class="my-5">
                <section class="space-3-top text-center">
                    <div class="shell">
                        <h3 style="color:darkgray;">灰色轨迹</h3>
                        <hr class="divider divider-base divider-bold">
                        <div class="range offset-top-30">
                            <div class="col-md-4 col-xs-6">
                                <a target="_blank" href="" class="post-img"
                                   title="最完美的状态，是像烟灰一样松散">
                                    <img alt="最完美的状态，是像烟灰一样松散"
                                         src="https://www.qingningzi.com/uploadfile/2016/1009/20161009122028626.jpg"
                                         width="270" height="363" class="img-fluid animate__animated">

                                </a>
                            </div>
                            <div class="offset-top-30 offset-xs-top-0 col-md-4 col-xs-6">
                                <a target="_blank" href="" class="post-img"
                                   title="人生和电影不同，人生辛苦多了">
                                    <img alt="人生和电影不同，人生辛苦多了"
                                         src="https://www.qingningzi.com/uploadfile/2016/0720/20160720084633940.jpg"
                                         width="270"
                                         height="363"
                                         class="img-fluid animate__animated">
                                </a>
                            </div>
                            <div class="offset-top-30 offset-xs-top-0 col-md-4 col-xs-6">
                                <a target="_blank" href="" class="post-img"
                                   title="《乱世佳人》：斯佳丽，我爱你胜过爱任何女人">
                                    <img alt="《乱世佳人》：斯佳丽，我爱你胜过爱任何女人"
                                         src="https://www.qingningzi.com/uploadfile/2016/0708/20160708084440355.jpg"
                                         width="270"
                                         height="363"
                                         class="img-fluid animate__animated">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 col-md-preffix-1 sidebar sidebar-sm sidebar-right text-md-left">
                <div class="range">
                    @include('components.search')
                    @include('components.right-bar')
                    <div class="col-md-12 col-sm-6 col-md-push-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>爱情，惹的祸</h4>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="分手了，也要好好生活">分手了，也要好好生活</a>
                        </p>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="你什么都不需要，那你要他做什么呢">你什么都不需要，那你要他做什么呢</a>
                        </p>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="这么巧，你也买不起房">这么巧，你也买不起房</a>
                        </p>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="今天我们复合吧，好吗？">今天我们复合吧，好吗？</a>
                        </p>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="女人嫁一次人，其实是结三次婚">女人嫁一次人，其实是结三次婚</a>
                        </p>
                        <div class="space-1-top p fst-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="" class="text-base" target="_blank"
                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="要么给我爱，要么给我滚">要么给我爱，要么给我滚</a>
                        </p>
                        <hr class="my-5 veil-sm">
                    </div>
                    <div class="col-md-12 col-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>蓝色忧郁</h4>
                        <ul class="list-unstyled list-ordered list-terms mt-3">
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="为什么你的脸配不上你的心？" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">为什么你的脸配不上你的心？</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="婚姻就是互相妥协、努力经营的循环往复" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">婚姻就是互相妥协、努力经营的循环往复</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="有趣是最高级的社交方式" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">有趣是最高级的社交方式</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="分手后，哪几种男人最不值得挽回" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">分手后，哪几种男人最不值得挽回</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="其实我想要的并不多，最好的爱情是陪伴与懂得"
                                   target="_blank" data-bs-container="body"
                                   data-bs-placement="bottom">其实我想要的并不多，最好的爱情是陪伴与懂得</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="想要被人尊重，大声吼就够了吗" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">想要被人尊重，大声吼就够了吗</a>
                            </li>
                        </ul>
                        <hr class="my-5 veil-sm reveal-md-block">
                    </div>
                    <div class="col-md-12 offset-top-0 offset-sm-top-45 text-start offset-md-top-0">
                        <h4 class="text-center text-md-left">橘色的梦境</h4>
                        <div class="range space-1-top">
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="哪啊哪啊神去村" data-bs-container="body"
                                       data-bs-placement="bottom">
                                        <img alt="哪啊哪啊神去村"
                                             src="https://www.qingningzi.com/uploadfile/2016/0729/20160729100710143.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="青柠推荐:电影《巴尔扎克和小裁缝》"
                                       data-bs-container="body" data-bs-placement="bottom">
                                        <img alt="青柠推荐:电影《巴尔扎克和小裁缝》"
                                             src="https://www.qingningzi.com/uploadfile/2016/0810/20160810050726437.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="唯独爱情，我不想将就" data-bs-container="body"
                                       data-bs-placement="bottom">
                                        <img alt="唯独爱情，我不想将就"
                                             src="https://www.qingningzi.com/uploadfile/2016/0729/20160729021331398.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="林青霞：十四年后看懂了东邪西毒" data-bs-container="body"
                                       data-bs-placement="bottom">
                                        <img alt="林青霞：十四年后看懂了东邪西毒"
                                             src="https://www.qingningzi.com/uploadfile/2016/1007/20161007112339588.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="错过了黄昏，便错过了她的寂寞和美丽"
                                       data-bs-container="body" data-bs-placement="bottom">
                                        <img alt="错过了黄昏，便错过了她的寂寞和美丽"
                                             src="https://www.qingningzi.com/uploadfile/2016/0910/20160910113841874.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="" target="_blank" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" title="《移魂女郎》：光照在黑暗里，黑暗却不接受光"
                                       data-bs-container="body" data-bs-placement="bottom">
                                        <img alt="《移魂女郎》：光照在黑暗里，黑暗却不接受光"
                                             src="https://www.qingningzi.com/uploadfile/2016/0911/20160911114553435.jpg"
                                             class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5 veil-sm reveal-md-block">
                    </div>
                    <div class="col-md-12 col-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>零落的点滴</h4>
                        <ul class="list-marked mt-3">
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="我大好一个人，凭什么跑进别人的生命里做插曲？"
                                   target="_blank" data-bs-container="body"
                                   data-bs-placement="bottom">我大好一个人，凭什么跑进别人的生命里做插曲？</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="我只是暂时看上去和你们一样" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">我只是暂时看上去和你们一样</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="婚姻对于男人是赌自由，对于女人是赌幸福" target="_blank"
                                   data-bs-container="body"
                                   data-bs-placement="bottom">婚姻对于男人是赌自由，对于女人是赌幸福</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="于丹话中秋：家是一生的烙印" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">于丹话中秋：家是一生的烙印</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="季羡林：月是故乡明" target="_blank" data-bs-container="body"
                                   data-bs-placement="bottom">季羡林：月是故乡明</a>
                            </li>
                            <li class="text-truncate">
                                <a href="" class="text-base" data-bs-toggle="tooltip"
                                   data-bs-trigger="hover" title="穷人就不能有梦想了吗？" target="_blank"
                                   data-bs-container="body" data-bs-placement="bottom">穷人就不能有梦想了吗？</a>
                            </li>
                        </ul>
                        <hr class="my-5 veil-sm reveal-md-block">
                    </div>
                    {{--                    @include('home.templates.calendar')--}}
                </div>
                <div class="rd-mailform-validate"></div>
            </div>
        </div>
    </div>
@endsection
