<?php

namespace App\Services;

use App\Models\Site;

class SitesService extends BaseService
{

    public function config()
    {
        return Site::first();
    }

    public function ads_enabled(): bool
    {
        return $this->config()->ads_enabled;
    }

    public function allow_registration(): bool
    {
        return $this->config()->allow_registration;
    }

    public function gtm_code(): string
    {
        return $this->config()->gtm_code;
    }
}
