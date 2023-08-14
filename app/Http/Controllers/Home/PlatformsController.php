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


    public function show(Request $request, $id)
    {
        $platform = Platform::where('id', $id)->first();
        if (!$platform) {
            abort(404);
        }

        $platform->increment('views_count');

        // seo
        SEOMeta::setTitle($platform->name);
        SEOMeta::addKeyword($platform->name);
        SEOMeta::setDescription($platform->name);
        SEOMeta::setCanonical($request->getRequestUri());

        // TODO: ContentType::asSelectArray() tabs
        //       articles() right-bar
        $data = $platform->posts()->orderBy('id', 'desc')->paginate(3);
        return view('pages.platforms.id', [
            'data' => $data,
            'platform' => $platform,
        ]);
    }
}
