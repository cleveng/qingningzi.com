<?php

namespace App\Services;


class BaseService
{
    protected int $expiredAt;
    protected int $duration;
    protected string $categoryURL;

    public function __construct()
    {
        $this->expiredAt = env('APP_DEBUG') ? 0 : 3600 * 24;
        $this->duration = env('APP_DEBUG') ? 0 : 3600 * 24 * 31;
        $this->categoryURL = 'categories';
    }
}
