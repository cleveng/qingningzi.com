@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li><a href="{{url('links?t='.$data->link_type)}}" rel="nofollow">友情链接</a></li>
        <li class="active">{{$data->name}}</li>
    @endsection
    <div class="shell section-bottom-60">
        <div class="range range-center">
            <div class="cell-md-8">
                <h1 class="offset-top-45 text-limit">{{$data->name}}</h1>
                <h2 class="offset-top-0 text-limit">{{$data->url}}</h2>
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
                <hr class="divider divider-offset-lg divider-gray">
                <section class="section-top-60">
                    <div class="shell">
                        <h3 style="color:darkgray;">灰色轨迹</h3>
                        <hr class="divider divider-base divider-bold">
                        <div class="range offset-top-30">
                            <div class="cell-md-4 cell-xs-6">
                                <a target="_blank" href="http://app.ove/article_13_523.html" class="post-img"
                                   title="最完美的状态，是像烟灰一样松散">
                                    <img alt="最完美的状态，是像烟灰一样松散"
                                         data-original="https://www.qingningzi.com/uploadfile/2016/1009/20161009122028626.jpg"
                                         width="270" height="363" class="img-responsive animated">

                                </a>
                            </div>
                            <div class="offset-top-30 offset-xs-top-0 cell-md-4 cell-xs-6">
                                <a target="_blank" href="http://app.ove/article_13_349.html" class="post-img"
                                   title="人生和电影不同，人生辛苦多了">
                                    <img alt="人生和电影不同，人生辛苦多了"
                                         data-original="https://www.qingningzi.com/uploadfile/2016/0720/20160720084633940.jpg"
                                         width="270"
                                         height="363"
                                         class="img-responsive animated">
                                </a>
                            </div>
                            <div class="offset-top-30 offset-xs-top-0 cell-md-4 cell-xs-6">
                                <a target="_blank" href="http://app.ove/article_13_343.html" class="post-img"
                                   title="《乱世佳人》：斯佳丽，我爱你胜过爱任何女人">
                                    <img alt="《乱世佳人》：斯佳丽，我爱你胜过爱任何女人"
                                         data-original="https://www.qingningzi.com/uploadfile/2016/0708/20160708084440355.jpg"
                                         width="270"
                                         height="363"
                                         class="img-responsive animated">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="cell-md-3 cell-md-preffix-1 sidebar sidebar-sm sidebar-right text-md-left">
                <div class="range">
                    @include('components.search')
                    @include('components.rightbar')
                    <div class="cell-md-12 cell-sm-6 cell-md-push-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>爱情，惹的祸</h4>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_712.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="分手了，也要好好生活">分手了，也要好好生活</a>
                        </p>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_653.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="你什么都不需要，那你要他做什么呢">你什么都不需要，那你要他做什么呢</a>
                        </p>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_640.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="这么巧，你也买不起房">这么巧，你也买不起房</a>
                        </p>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_638.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="今天我们复合吧，好吗？">今天我们复合吧，好吗？</a>
                        </p>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_636.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="女人嫁一次人，其实是结三次婚">女人嫁一次人，其实是结三次婚</a>
                        </p>
                        <div class="offset-top-20 p text-italic">
                            推荐星级：<span class="text-primary"></span>
                        </div>
                        <p class="big">
                            <a href="http://app.ove/article_13_515.html" class="text-base" target="_blank"
                               data-toggle="tooltip" data-trigger="hover" data-container="body" data-placement="bottom"
                               title="要么给我爱，要么给我滚">要么给我爱，要么给我滚</a>
                        </p>
                        <hr class="divider divider-offset-lg divider-gray veil-sm">
                    </div>
                    <div class="cell-md-12 cell-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>蓝色忧郁</h4>
                        <ul class="list-unstyled list-ordered list-terms offset-top-10">
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_511.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="为什么你的脸配不上你的心？" target="_blank"
                                   data-container="body" data-placement="bottom">为什么你的脸配不上你的心？</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_510.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="婚姻就是互相妥协、努力经营的循环往复" target="_blank"
                                   data-container="body" data-placement="bottom">婚姻就是互相妥协、努力经营的循环往复</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_481.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="有趣是最高级的社交方式" target="_blank"
                                   data-container="body" data-placement="bottom">有趣是最高级的社交方式</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_363.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="分手后，哪几种男人最不值得挽回" target="_blank"
                                   data-container="body" data-placement="bottom">分手后，哪几种男人最不值得挽回</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_357.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="其实我想要的并不多，最好的爱情是陪伴与懂得"
                                   target="_blank" data-container="body"
                                   data-placement="bottom">其实我想要的并不多，最好的爱情是陪伴与懂得</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_350.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="想要被人尊重，大声吼就够了吗" target="_blank"
                                   data-container="body" data-placement="bottom">想要被人尊重，大声吼就够了吗</a>
                            </li>
                        </ul>
                        <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
                    </div>
                    <div class="cell-md-12 offset-top-0 offset-sm-top-45 text-left offset-md-top-0">
                        <h4 class="text-center text-md-left">橘色的梦境</h4>
                        <div class="range offset-top-20">
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_11_122.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="哪啊哪啊神去村" data-container="body"
                                       data-placement="bottom">
                                        <img alt="哪啊哪啊神去村"
                                             src="https://www.qingningzi.com/uploadfile/2016/0729/20160729100710143.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_13_84.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="青柠推荐:电影《巴尔扎克和小裁缝》"
                                       data-container="body" data-placement="bottom">
                                        <img alt="青柠推荐:电影《巴尔扎克和小裁缝》"
                                             src="https://www.qingningzi.com/uploadfile/2016/0810/20160810050726437.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_13_6.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="唯独爱情，我不想将就" data-container="body"
                                       data-placement="bottom">
                                        <img alt="唯独爱情，我不想将就"
                                             src="https://www.qingningzi.com/uploadfile/2016/0729/20160729021331398.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_29_123.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="林青霞：十四年后看懂了东邪西毒" data-container="body"
                                       data-placement="bottom">
                                        <img alt="林青霞：十四年后看懂了东邪西毒"
                                             src="https://www.qingningzi.com/uploadfile/2016/1007/20161007112339588.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_13_324.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="错过了黄昏，便错过了她的寂寞和美丽"
                                       data-container="body" data-placement="bottom">
                                        <img alt="错过了黄昏，便错过了她的寂寞和美丽"
                                             src="https://www.qingningzi.com/uploadfile/2016/0910/20160910113841874.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="cell-md-12 cell-sm-6 offset-top-30">
                                <div class="unit unit-horizontal unit-spacing-21">
                                    <a href="http://app.ove/article_29_111.html" target="_blank" data-toggle="tooltip"
                                       data-trigger="hover" title="《移魂女郎》：光照在黑暗里，黑暗却不接受光"
                                       data-container="body" data-placement="bottom">
                                        <img alt="《移魂女郎》：光照在黑暗里，黑暗却不接受光"
                                             src="https://www.qingningzi.com/uploadfile/2016/0911/20160911114553435.jpg"
                                             class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
                    </div>
                    <div class="cell-md-12 cell-sm-6 offset-top-0 offset-sm-top-45 offset-md-top-0">
                        <h4>零落的点滴</h4>
                        <ul class="list-marked offset-top-10">
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_586.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="我大好一个人，凭什么跑进别人的生命里做插曲？"
                                   target="_blank" data-container="body"
                                   data-placement="bottom">我大好一个人，凭什么跑进别人的生命里做插曲？</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_513.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="我只是暂时看上去和你们一样" target="_blank"
                                   data-container="body" data-placement="bottom">我只是暂时看上去和你们一样</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_18_379.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="婚姻对于男人是赌自由，对于女人是赌幸福" target="_blank"
                                   data-container="body"
                                   data-placement="bottom">婚姻对于男人是赌自由，对于女人是赌幸福</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_354.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="于丹话中秋：家是一生的烙印" target="_blank"
                                   data-container="body" data-placement="bottom">于丹话中秋：家是一生的烙印</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_353.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="季羡林：月是故乡明" target="_blank" data-container="body"
                                   data-placement="bottom">季羡林：月是故乡明</a>
                            </li>
                            <li class="text-limit">
                                <a href="http://app.ove/article_13_352.html" class="text-base" data-toggle="tooltip"
                                   data-trigger="hover" title="穷人就不能有梦想了吗？" target="_blank"
                                   data-container="body" data-placement="bottom">穷人就不能有梦想了吗？</a>
                            </li>
                        </ul>
                        <hr class="divider divider-offset-lg divider-gray veil-sm reveal-md-block">
                    </div>
                    {{--                    @include('home.templates.calendar')--}}
                </div>
                <div class="rd-mailform-validate"></div>
            </div>
        </div>
    </div>
@endsection