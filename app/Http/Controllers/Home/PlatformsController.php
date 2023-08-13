<?php

namespace App\Http\Controllers\Home;

use App\Models\Platform;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlatformsController extends BaseController
{
    public function index(Request $request)
    {
        $title = "合作媒体";
        SEOMeta::setTitle($title);
        SEOMeta::addKeyword($title);
        SEOMeta::setDescription($title);
        SEOMeta::setCanonical(url('platforms'));

        $page = $request->has('page') ? $request->get('page') : 1;
        $data = Cache::remember('platform_' . $page, $this->expiredAt, function () {
            return Platform::where('status', true)->orderBy('id', 'desc')->paginate($this->prePage);
        });

        return view('pages.platforms.index', [
            'title' => $title,
            'data' => $data,
        ]);
    }
}
