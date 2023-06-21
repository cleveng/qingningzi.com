<?php
declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Enums\LinkType;
use App\Models\Link;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LinksController extends BaseController
{
    protected array $linkTypes;

    public function __construct()
    {
        parent::__construct();
        $this->title = '友情链接';
        $this->url = url('/links');
        $this->linkTypes = LinkType::asSelectArray();
    }

    public function index(Request $request): \Illuminate\View\View
    {
        SEOMeta::setTitle($this->title);
        SEOMeta::addKeyword($this->keywords);
        SEOMeta::setDescription($this->description);
        SEOMeta::setCanonical($this->url);

        $t = $request->has('t') ? intval($request->get('t')) : null;
        if (LinkType::hasValue($t)) {
            $types = Cache::remember('like_type_' . $t, $this->duration, function () use ($t) {
                return [$t => LinkType::getDescription($t)];
            });
            $data = Cache::remember('link_data' . $t, $this->duration, function () use ($t) {
                return Link::where("link_type", $t)->orderBy('order', 'desc')->get();
            });
        } else {
            $types = $this->linkTypes;
            $data = Cache::remember('link_data_all', $this->duration, function () {
                return Link::orderBy('order', 'desc')->get();
            });
        }

        return view('pages.links.index', [
            'data' => $data,
            'types' => $types,
            'url' => $this->url
        ]);
    }

    public function show(Request $request, $id): \Illuminate\View\View
    {
        $data = Link::find($id);
        if (!$data) {
            abort(404);
        }

        return view('pages.links.id', [
            'data' => $data,
        ]);
    }
}
