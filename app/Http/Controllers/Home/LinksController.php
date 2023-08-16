<?php
declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Enums\LinkType;
use App\Models\Link;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

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

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        SEOMeta::setTitle($this->title);
        SEOMeta::addKeyword($this->keywords);
        SEOMeta::setDescription($this->description);
        SEOMeta::setCanonical($this->url);

        $data = Cache::remember('link_fetch_all', $this->duration, function () {
            $data = [];
            foreach ($this->linkTypes as $key => $value) {
                $data[$key]['title'] = $value;
                $data[$key]['items'] = Link::where('status', true)->where('link_type', $key)->orderBy('order', 'desc')->get();
            }
            return $data;
        });

        return view('pages.links.index', [
            'data' => $data,
        ]);
    }
}
