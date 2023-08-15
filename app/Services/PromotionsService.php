<?php

namespace App\Services;

use App\Enums\PromotionType;
use App\Models\Promotion;

/**
 *
 */
class PromotionsService extends BaseService
{
    public function random(int $len = 4, int $pos = PromotionType::RightBar)
    {
        return Promotion::where('is_visible', true)->where('promotion_type', $pos)->inRandomOrder()->take($len)->get();
    }

    public function item(int $pos = PromotionType::RightBar, int $expect = 0)
    {
        // TODO: orderBy('hit_count', 'desc')
        return Promotion::where('is_visible', true)
            ->where('id', '<>', $expect)
            ->where('promotion_type', $pos)
            ->inRandomOrder()
            ->first();
    }
}
