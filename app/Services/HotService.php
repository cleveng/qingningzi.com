<?php

namespace App\Services;


use Illuminate\Support\Facades\Cache;

class HotService extends BaseService
{

    public function stars($star, $catid, $id)
    {
        $max = ($star > 5) ? 5 : $star;
        return Cache::remember('h_' . $catid . '_' . $id, $this->expiredAt, function () use ($max) {
            $result = str_repeat("<i class='ci-star-filled'></i>", $max);
            $result .= str_repeat("<i class='ci-star'></i>", 5 - $max);
            return $result;
        });
    }
}
