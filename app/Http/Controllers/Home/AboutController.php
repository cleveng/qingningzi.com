<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $record = Category::where('content_type', ContentType::DEFAULT)->first();
        if(!$record) {
            abort(404);
        }

        $data = $record->content;
        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($data->keywords);
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical($request->getRequestUri());

        return view($this->tmpl.'about.index', [
            'data' => $data,
            'parent_id' => $record->parent_id,
        ]);
    }
}
