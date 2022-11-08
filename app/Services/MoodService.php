<?php

namespace App\Services;

use App\Models\Mood;

class MoodService extends BaseService
{

    public function random()
    {
        return Mood::inRandomOrder()->first();
    }
}
