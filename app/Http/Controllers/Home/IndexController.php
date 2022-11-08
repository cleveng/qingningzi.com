<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    const __TITLE__ = '首页',
        __TYPE__ = '官方活动',
        __FLAG__ = 2,
        __PAGE__ = 12,
        __FONT__ = 'fa-align-justify',
        __URL__ = '/announces';

    public function index(Request $request)
    {
        $domain = env('APP_DOMAIN') ? env('APP_DOMAIN') : env('APP_URL');
        if ($request->has('tag')) {
            $url = "https://www.so.com/s?ie=utf8&src=" . $domain . "&site=" . $domain . "&rg=1&q=" . urlencode($request->get('tag'));
            return redirect(url($url), 301);
        }

        SEOMeta::setTitle(self::__TITLE__);
        SEOMeta::addKeyword($this->keywords);
        SEOMeta::setDescription($this->description);
        SEOMeta::setCanonical(url('/'));

        return view('pages.home.index', [
            'catid' => 0
        ]);
    }
}
