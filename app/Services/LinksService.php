<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Facades\Cache;

class LinksService extends BaseService
{

    public function items()
    {
        return Cache::remember('link_all', $this->duration, function () {
            return Link::where('status', true)->orderBy('order', 'desc')->get();
        });
    }
}
