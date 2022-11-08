<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Idol;
use App\Models\iModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IdolsService extends BaseService
{
    public function items(int $len)
    {
        return Cache::remember('idols:items', $this->duration, function () use($len){
            return Idol::inRandomOrder()->take($len)->get();
        });
    }
}