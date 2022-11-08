@extends('layouts.default')
@section('content')
    @section('breadcrumb')
        <li class="active">
            {{$category->title}}
        </li>
    @endsection
    <div class="shell section-bottom-60">
        <div class="range">
            <div class="cell-md-8 text-xs-left">
                <h4>免责声明</h4>
                <p class="list-terms">
                    1、青柠子矜网上提供的所有内容（除有注明原创之外）均由网络转载或网友提供，青柠子矜网只是一个展示方，仅为社交团体提供健康、合理、绿色等方面的内容，不承担任何法律责任。</p>
                <p class="list-terms">
                    2、青柠子矜网上的第三方(如微博、QQ、微信等平台)会员评论仅代表第三方会员个人观点，并不代表青柠子矜网同意或认可其言论，青柠子矜网不承担由此言论所导致的任何法律责任。</p>
                <p class="list-terms">
                    3、任何单位或个人认为青柠子矜网的内容可能涉嫌侵犯其合法权益，请及时向本站管理员(QQ:211321136)投诉，并提供权属证明及详细侵权情况证明，本站管理员受理后将会尽快移除相关涉嫌侵权内容。</p>
                <p class="list-terms">4、操作规则</p>
                <p class="list-terms">
                    下面的条款和前面所述的条款均适用于本网站上的留言帖，公告板和任何在网站上发生有相互影响作用区域的行为。网上用户使用、进入或参与上述区域或网站上的任何其他具有相互影响作用区域，则表示同意所有这些条款。</p>
                <p class="list-terms">
                    您参与的在线评论是实时发生的，没有经过任何来自本网站的编辑、压缩、或任何其他形式的控制。本网站不能也没有甄别所有网站用户提供的内容。但本网站保留对本网站上内容的监控权，并对本网站认为具有危害性，引起争议性的或违反本操作规则的其他内容进行删除的权利。为了提供满足本网站用户需求的高价值信息的服务，并避免本网站用户遭受因对他人权利的不实、恶意攻击或其他有害陈述而引起的损失，本网站有必要建立下列操作规则以避免本网站之被滥用。</p>
                <p class="list-terms"><b>当您使用本网站服务时，您不可以：</b></p>
                <ol class="list-unstyled list-ordered list-terms">
                    <li>
                        粘贴或传播任何非法的，具威胁性的，诽谤性的，贬损的，报复的、亵渎的或任何其他法律禁止的信息，包括但不限于传播任何煽动性鼓励犯罪的，或违反公民义务或任何其他违反地方法规、国家法律、法规或国际法律、惯例或公约的内容。
                    </li>
                    <li>粘贴或传播任何散布任何他人的私人事件，粘贴或传播带有病毒，或任何带有贬损或损害性特征的内容；</li>
                    <li>
                        粘贴或传播任何可能侵害其他人财产权利的数据、图形或程序，包括以非法形式使用未经注册的版权文本、图形或程序，商业秘密及其他保密信息、商标、服务标识等；
                    </li>
                    <li>以任何形式干扰本网站的其他用户。</li>
                </ol>
                <p class="list-terms">5、适用法律</p>
                <p class="list-terms">
                    青柠子矜网适用中华人民共和国法律。我们保留随时更改我们的网站和上述免责及条款的权利。如果您对本免责声明在使用中的问题有任何意见和建议请和我们联系(QQ:211321136)，我们真诚期待各位的通力合作，共同打造一个干净良好的上网环境。</p>
                <p class="list-terms">6、图片版权</p>
                <p class="list-terms">青柠子矜网使用的任何图片，包含但不局限于人物、场景、写真、艺术等，所有版权都归于 <a
                        title="图片版权" href="https://pixabay.com/zh/users/AdinaVoicu-485024/" rel="copyright">AdinaVoicu</a>
                    所有，青柠子矜网获得授权，<span
                        class="text-danger">任何未经青柠子矜网或原作者授权，禁止转载任何图片</span>，青柠子矜网保留法律诉讼权利！
                </p>
                <p class="list-terms">7、文章授权规约与转授权</p>
                <ol class="list-marked offset-top-10">
                    <li>青柠子矜网一般会对授权的文章出处进行标注、作者署名。</li>
                    <li>青柠子矜网一般会对授权的文章中内容进行二次演绎，编译幅度不超过5%。<br/>其中所具有的独特样式、展现风格、图片(<span
                            class="badge" style="background: #7FCBC9">遵循免责声明6</span>)归青柠子矜网所有，文字、文章为作者所有。
                    </li>
                    <li>
                        青柠子矜网演绎后的文章禁止任何个体/企业转载(版权同上)，青柠子矜网不授权、不提供二次授权，对于非法采集、抄袭、转载、仿站等行为，保留法律诉讼权利。
                    </li>
                    <li>青柠子矜网承诺对于授权的文章不用于商业、盈利、非法性质等，仅适用于青柠子矜网。</li>
                    <li>青柠子矜网“仅”对提供文章授权的个体/企业提供便利性著作权保护，其中体现于手机端浏览时具有独特<a
                            data-placement="top" target="_blank" href="{APP_PATH}"
                            data-content="<img src='{IMG_PATH}qr_right.jpg' alt='青柠子矜' class='img-responsive'>"
                            data-html="true" data-trigger="hover" data-toggle="popover" data-original-title="青柠子矜">二维码</a>(<small>鼠标移入</small>)展示。
                    </li>
                    <li>
                        青柠子矜网文章授权为双方洽谈所得，取消授权需双方同意，作者(个体/企业)单方面取消，必须提前72小时联系站长；对于授权之前的文章，站长拥有保留不做删除的权利。
                    </li>
                    <li>
                        青柠子矜网对于已经授权的个体/企业，本着为授权方保密的性质，不在网上提供证明性的条约/证函，但保留双方洽谈内容。
                    </li>
                    <li>
                        因存在不可抗力等因素，授权的文章若被他人非法采集、仿站、镜像、篡改所造成的负面影响，与青柠子矜网无关。
                    </li>
                    <li>青柠子矜网除非运营不下去或面临转型(非商业)，不会主动取消对授权方的合作。</li>
                    <li>文章授权及联系方式(<span class="badge" style="background: #7FCBC9">同下</span>)</li>
                </ol>
                <p class="list-terms offset-top-10">8、补充声明 [2016/09/12 ]</p>
                <ol class="list-marked offset-top-10">
                    <li>青柠子矜网 “给我留言” 版块由 www.olark.com 提供，旨在给在网用户一个反馈机制。</li>
                    <li>“给我留言” 版块不会收集、泄露用户隐私。</li>
                    <li>青柠子矜网 ({{env('APP_URL')}}) 已在公安部备案[粤公网安备44010602001797号]，遵守互联网相关规定。
                    </li>
                    <li>违法和不良信息举报电话 <i class="fa fa-phone"></i>：110 、 010-12321 、12377。</li>
                    <li>违法和不良信息举报邮箱 <i class="fa fa-envelope-o"></i>：jubao@12377.cn 。</li>
                    <li><a target="_blank" href="https://creativecommons.org/licenses/by-nc-nd/4.0/">知识共享署名-非商业性使用-禁止演绎
                            4.0 国际许可协议</a></li>
                </ol>
                <hr class="divider divider-gray divider-offset-lg">
                <h4>联系方式：</h4>
                <dl class="list-terms offset-top-10">
                    <dt>邮箱 <i class="fa fa-envelope-o" aria-hidden="true"></i></dt>
                    <dd><a rel="nofollow" target="_blank"
                           href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=gbOwsLKzsLCyt8Hw8K-i7uw"
                           class="text-base">给我写信</a></dd>
                </dl>
                <dl class="list-terms">
                    <dt>扣扣 <i class="fa fa-qq" aria-hidden="true"></i></dt>
                    <dd><a rel="nofollow" href="http://wpa.qq.com/msgrd?v=3&uin=211321136&site=qq&menu=yes"
                           class="text-base" data-original-title="QQ扫一扫" data-toggle="popover" data-trigger="hover"
                           data-html="true"
                           data-content="<img src='{{asset("images/qq.jpg")}}' alt='' class='img-responsive'>"
                           target="_blank" data-placement="right">211321136</a></dd>
                </dl>
                <dl class="list-terms">
                    <dt>微信 <i class="fa fa-wechat" aria-hidden="true"></i></dt>
                    <dd><a class="text-base" data-original-title="微信扫一扫" data-toggle="popover" data-trigger="hover"
                           data-html="true"
                           data-content="<img src='{{asset("images/qrcode_for_gh_a0e3856031fe_1280.jpg")}}' alt='' class='img-responsive'>"
                           href="javascript:;" target="_blank" data-placement="right">qingningzijin(微信号)</a></dd>
                </dl>
                <dl class="list-terms">
                    <dt>微博 <i class="fa fa-weibo" aria-hidden="true"></i></dt>
                    <dd><a rel="nofollow" href="https://www.weibo.com/qingningzi" data-original-title="微博扫一扫"
                           data-toggle="popover" data-trigger="hover" data-html="true"
                           data-content="<img src='{{asset("images/weibo_qr_code.png")}}' alt='' class='img-responsive'>"
                           target="_blank" data-placement="right">青柠子矜</a></dd>
                </dl>
                <dl class="list-terms">
                    <dt>聚合 <i class="fa fa-rss" aria-hidden="true"></i></dt>
                    <dd><a href="{{url('rss')}}" target="_blank">我要订阅</a></dd>
                </dl>
                @include('components.changyan')
            </div>
            @include('components.sidebar')
        </div>
    </div>
@endsection
