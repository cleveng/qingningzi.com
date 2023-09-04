<?php

namespace App\Http\Controllers\Home;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class IndexController extends BaseController
{

    /**
     * @param Request $request
     * @return View|Factory|Redirector|RedirectResponse|Application
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $domain = env('APP_DOMAIN') ? env('APP_DOMAIN') : env('APP_URL');
        if ($request->has('tag')) {
            $url = 'https://www.so.com/s?ie=utf8&src=' . $domain . '&site=' . $domain . '&rg=1&q=' . urlencode($request->get('tag'));
            return redirect(url($url), 301);
        }

        SEOMeta::setTitle('首页');
        SEOMeta::addKeyword($this->keywords);
        SEOMeta::setDescription($this->description);
        SEOMeta::setCanonical(url('/'));

        return view($this->tmpl.'home.index', [
            'catid' => 0
        ]);
    }
}
