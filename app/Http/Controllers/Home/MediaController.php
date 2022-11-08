<?php

namespace App\Http\Controllers\Home;

use App\Models\Platform;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MediaController extends BaseController
{
    const __TITLE__ = '合作媒体列表',
        __TYPE__ = '官方活动',
        __FLAG__ = 2,
        __PAGE__ = 12,
        __FONT__ = 'fa-align-justify',
        __URL__ = '/media',
        __KEYWORDS__ = '合作媒体,合作媒体列表,青柠合作媒体,青柠子矜合作媒体',
        __DESCRIPTION__ = '青柠子矜合作媒体，目前合作的友商有银幕穿越者、时光网、哔哩梦工厂、前瞻网、十点阅读、光明网、知乎、新华网、豆瓣电影、北晚新视觉、暴风影音、一点资讯、阅读时间、AcFUN、 北京时间、有书等等';

    public function index(Request $request)
    {
        SEOMeta::setTitle(self::__TITLE__);
        SEOMeta::addKeyword(self::__TITLE__);
        SEOMeta::setDescription(self::__TITLE__);
        SEOMeta::setCanonical(url('/'));
        $page = $request->has('page') ? $request->get('page') : 1;
        $publish = Cache::remember('publish_' . $page, $this->expiredAt, function () {
            return Platform::orderBy('id', 'desc')->paginate($this->prePage);
        });
        return view('pages.media.index', [
            'data' => $publish,
            'catid' => null,
            'url' => self::__URL__,
            'title' => self::__TITLE__,
        ]);
    }

    public function show(Request $request, $id)
    {
        SEOMeta::setTitle(self::__TITLE__);
        SEOMeta::addKeyword(self::__TITLE__);
        SEOMeta::setDescription(self::__TITLE__);
        SEOMeta::setCanonical(url('/'));
        $publish = Cache::remember('publish_' . $id, $this->expiredAt, function () use ($id) {
            return Platform::where('id', $id)->first();
        });
        return view('pages.media.id', [
            'data' => $publish,
            'catid' => null,
            'url' => self::__URL__,
            'title' => self::__TITLE__,
        ]);
    }
}
