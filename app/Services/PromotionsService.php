<?php

namespace App\Services;

use App\Models\Promotion;

/**
 *
 */
class PromotionsService extends BaseService
{
    public function random(int $len = 4)
    {
        return Promotion::where('is_visible', true)->inRandomOrder()->take($len)->get();
    }
}
