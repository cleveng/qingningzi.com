<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Boolean;

class SitesService extends BaseService
{

    public function config()
    {
        return Site::first();
    }

    public function ads_enabled() :bool {
        return $this->config()->ads_enabled;
    }

    public function gtm_code() :string {
        return $this->config()->gtm_code;
    }
}
